<?php

namespace app\utils;

use app\Settings;
use app\models\JobModel;
use app\models\JobPaymentDispatchModel;
use app\models\JobPaymentModel;

/**
 * Class JobMpesaPaymentHelper
 * @package app\utils
 * 
 * Helps in MPESA payment related tasks like this library: https://github.com/safaricom/mpesa-php-sdk
 * 
 * https://developer.safaricom.co.ke/Documentation
 */
class JobMpesaPaymentHelper
{
    private $config = array(
        "AccountReference" => "Freelance Marketplace",
        "passkey" => null,
        "env" => "sandbox",
        "BusinessShortCode" => null,
        "secret" => null,
        "key" => null,
        "SecurityCredential" => null, // https://youtu.be/uWh_5-l8IVQ?t=562 Base64 encoded string of the Security Credential, which is encrypted using M-Pesa public key and validates the transaction on M-Pesa Core system.
        // "username" => "apitest",
    );


    public function __construct()
    {
        $this->config["env"] = getenv("MPESA_ENV") ? getenv("MPESA_ENV") : "sandbox"; // sandbox or live
        $this->config["BusinessShortCode"] = getenv("MPESA_BUSINESS_SHORT_CODE") ? getenv("MPESA_BUSINESS_SHORT_CODE") : "174379";
        $this->config["key"] = getenv("MPESA_CONSUMER_KEY") ? getenv("MPESA_CONSUMER_KEY") : null;
        $this->config["secret"] = getenv("MPESA_CONSUMER_SECRET") ? getenv("MPESA_CONSUMER_SECRET") : null;
        $this->config["passkey"] = getenv("MPESA_PASSKEY") ? getenv("MPESA_PASSKEY") : null;
        $this->config["SecurityCredential"] = getenv("MPESA_SECURITY_CREDENTIAL") ? getenv("MPESA_SECURITY_CREDENTIAL") : null;
    }

    /**
     * Used to create a payment request via a STK Push.
     * The LIPA NA M-PESA ONLINE API also know as M-PESA express (STK Push) is a Merchant/Business initiated C2B (Customer to Business) Payment.
     */
    public function makePaymentRequest(string $phone, JobModel $job)
    {
        $settings = new Settings();
        $amount = rand(1, 5); // manually override the amount for testing purposes
        $phone = $this->formatPhoneNumber($phone);

        if ($job->hasBeenPaidFor()) {
            DisplayAlert::displayError("Job already paid for.");
            return false;
        }
        if ($job->hasBeenRefunded()) {
            DisplayAlert::displayError("Cannot pay a job that you was paid for then refunded");
            return false;
        }

        if (!$this->checkIfConfigIsValid()) {
            // fake the payment
            DisplayAlert::displayError("Warning: Mpesa config is not valid.");
            JobPaymentModel::create(
                $job->getId(),
                $phone,
                $amount,
                null,
                null,
                null
            );
        }

        $token = $this->generateAuthToken();
        $endpoint = ($this->config['env'] == "live") ? "https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest" : "https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest";
        $timestamp = date("YmdHis");
        $password  = base64_encode($this->config['BusinessShortCode'] . "" . $this->config['passkey'] . "" . $timestamp);
        $curlPostData = array(
            "BusinessShortCode" => $this->config['BusinessShortCode'],
            "Password" => $password,
            "Timestamp" => $timestamp,
            "TransactionType" => "CustomerPayBillOnline",
            "Amount" => $amount,
            "PartyA" => $phone,
            "PartyB" => $this->config['BusinessShortCode'],
            "PhoneNumber" => $phone,
            "CallBackURL" => $settings->host . "/callbacks/job-payment", // Enter your callback url here
            "AccountReference" => $this->config['AccountReference'],
            "TransactionDesc" => "Payment for job {$job->getId()} at {$timestamp}",
        );
        $curlPostDataString = json_encode($curlPostData);

        $curlTransfer = curl_init($endpoint);

        curl_setopt($curlTransfer, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json'
        ]);
        curl_setopt($curlTransfer, CURLOPT_POST, 1);
        curl_setopt($curlTransfer, CURLOPT_POSTFIELDS, $curlPostDataString);
        curl_setopt($curlTransfer, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($curlTransfer);
        curl_close($curlTransfer);
        $result = json_decode($response);

        if ($result == null) {
            // echo var_dump($result);
            DisplayAlert::displayError("Error in payment request processing. Please try again later.");
            return false;
        } else if (isset($result->{'errorMessage'})) {
            // echo var_dump($result);
            DisplayAlert::displayError('Error from Mpesa: ' . $result->{'errorMessage'});
            return false;
        }

        JobPaymentModel::create(
            $job->getId(),
            $phone,
            $amount,
            $result->{'ResponseCode'},
            $result->{"MerchantRequestID"},
            $result->{"CheckoutRequestID"},
        );

        $isStkPushSuccessful = $result->{'ResponseCode'} === "0";
        if ($isStkPushSuccessful) {
            return true;
        } else {
            DisplayAlert::displayError("Error in payment request processing. Please try again later.");
            return false;
        }
    }

    /**
     * Used to handle the callback after a LIPA NA M-PESA ONLINE API (STK Push) request has been processed.
     */
    public static function handleMakePaymentCallBack(array $callbackDataArray)
    {
        /*
        Example response:
        
        {    
        "Body": {        
            "stkCallback": {            
                "MerchantRequestID": "29115-34620561-1",            
                "CheckoutRequestID": "ws_CO_191220191020363925",            
                "ResultCode": 0,            
                "ResultDesc": "The service request is processed successfully.",            
                "CallbackMetadata": {                
                    "Item": [{                        
                    "Name": "Amount",                        
                    "Value": 1.00                    
                    },                    
                    {                        
                    "Name": "MpesaReceiptNumber",                        
                    "Value": "NLJ7RT61SV"                    
                    },                    
                    {                        
                    "Name": "TransactionDate",                        
                    "Value": 20191219102115                    
                    },                    
                    {                        
                    "Name": "PhoneNumber",                        
                    "Value": 254708374149                    
                    }]            
                    }        
                }    
            },
        }

        */

        $jobPayment = JobPaymentModel::tryGetByMerchantRequestId($callbackDataArray['Body']['stkCallback']['MerchantRequestID']);
        if ($jobPayment == null) {
            $errMsg = "Job payment callback: Job payment not found for MerchantRequestID: " . $callbackDataArray['Body']['stkCallback']['MerchantRequestID'];
            echo $errMsg;
            Logger::log($errMsg);
            return false;
        }

        $isPaymentSuccessful = $callbackDataArray['Body']['stkCallback']['ResultCode'] == 0;

        $jobPayment->addCallBackInfo(
            $isPaymentSuccessful,
            $callbackDataArray['Body']['stkCallback']['ResultCode'],
            $callbackDataArray['Body']['stkCallback']['ResultDesc']
        );

        if ($isPaymentSuccessful) {
            $jobPayment->getJob()->activate();
        }

        return true;
    }

    /** 
     * This method is used to refund a payment to a client for a job.
     *
     * @param JobModel $job
     * @return bool
     */
    public function refund(JobModel $job)
    {
        if (!$job->hasBeenPaidFor()) {
            DisplayAlert::displayError("Cannot initiate refund. Job not paid for.");
            return false;
        } else if ($job->hasBeenRefunded()) {
            DisplayAlert::displayError("Cannot initiate refund. Job already refunded.");
            return false;
        } else if ($job->hasFreelancerBeenPaid()) {
            DisplayAlert::displayError("Cannot initiate refund. Freelancer already paid.");
            return false;
        }

        $jobPayment = $job->getPayment();
        $amount = $jobPayment->getAmount();
        $phone = $jobPayment->getPhoneNumber();

        return $this->dispatchMoney(
            $jobPayment,
            true,
            $amount,
            $phone,
            "Refund for job id: " . $job->getId(),
        );
    }

    /** 
     * This method is used to pay a freelancer for a job.
     *
     * @param JobModel $job
     * @return bool
     */
    public function payFreelancer(JobModel $job)
    {
        $acceptedProposal = $job->getAcceptedProposal();
        if ($acceptedProposal == null) {
            DisplayAlert::displayError("Cannot pay freelancer. No accepted proposal found.");
            return false;
        } else if ($job->hasBeenRefunded()) {
            DisplayAlert::displayError("Cannot initiate freelancer payment. Job has been refunded.");
            return false;
        } else if ($job->hasFreelancerBeenPaid()) {
            DisplayAlert::displayError("Cannot initiate freelancer payment. Freelancer already paid.");
            return false;
        }

        $jobPayment = $job->getPayment();
        $amount = $jobPayment->getAmount();
        $freelancer = $acceptedProposal->getFreelancer();
        $phone = $freelancer->getUser()->getPhone();

        return $this->dispatchMoney(
            $jobPayment,
            false,
            $amount,
            $phone,
            "Payment for job id: " . $job->getId(),
        );
    }


    /**
     * Used to dispatch a job's payment.
     * This can either be a payment to a freelancer or a refund to a client
     * This is done through the Mpesa Business To Customer (B2C) API https://developer.safaricom.co.ke/APIs/BusinessToCustomer
     */
    private function dispatchMoney(JobPaymentModel $jobPayment, bool $isRefund, float $amount, string $phone, string $remarks): bool
    {
        $amount = rand(1, 5); // manually override the amount for testing purposes
        $phone = $this->formatPhoneNumber($phone);
        $settings = new Settings();


        if (!$this->checkIfConfigIsValid()) {
            // fake the payment
            DisplayAlert::displayError("Warning: Mpesa config is not valid.");
            JobPaymentDispatchModel::create(
                $jobPayment->getId(),
                $isRefund,
                $phone,
                $amount,
                true,
                null,
                null,
                null,
            );
            return true;
        }


        $token = $this->generateAuthToken();
        $endpoint = ($this->config['env'] == "live") ? "https://api.safaricom.co.ke/mpesa/b2c/v1/paymentrequest" : "https://sandbox.safaricom.co.ke/mpesa/b2c/v1/paymentrequest";
        $curlPostData = array(
            "InitiatorName" => $this->config['AccountReference'],
            "SecurityCredential" => $this->config['SecurityCredential'],
            "CommandID" => "BusinessPayment", // SalaryPayment, BusinessPayment, PromotionPayment
            "Amount" =>  $amount,
            "PartyA" => $this->config['BusinessShortCode'],
            "PartyB" => $phone,
            "Remarks" => $remarks, // Comments that are sent along with the transaction.
            "QueueTimeOutURL" => $settings->host . "/callbacks/dispatch-queue-timeout",
            "ResultURL" => $settings->host . "/callbacks/dispatch-payment-result",
        );
        $curlPostDataString = json_encode($curlPostData);

        $curlTransfer = curl_init($endpoint);

        curl_setopt($curlTransfer, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json'
        ]);
        curl_setopt($curlTransfer, CURLOPT_POST, 1);
        curl_setopt($curlTransfer, CURLOPT_POSTFIELDS, $curlPostDataString);
        curl_setopt($curlTransfer, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($curlTransfer);
        curl_close($curlTransfer);
        $result = json_decode($response);

        if ($result == null) {
            echo var_dump($result);
            DisplayAlert::displayError("Error in payment request processing. Please try again later.");
            return false;
        } else if (isset($result->{'errorMessage'})) {
            echo var_dump($result);
            DisplayAlert::displayError('Error from Mpesa: ' . $result->{'errorMessage'});
            return false;
        }

        JobPaymentDispatchModel::create(
            $jobPayment->getId(),
            $isRefund,
            $phone,
            $amount,
            false, // will be changed after callback
            $result->{'ConversationID'},
            $result->{'OriginatorConversationID'},
            $result->{'ResponseCode'},
        );

        $isDispatchPushSuccessful = $result->{'ResponseCode'} === "0";
        if ($isDispatchPushSuccessful) {
            return true;
        } else {
            DisplayAlert::displayError("Error in payment request processing. Please try again later.");
            return false;
        }
    }

    /**
     * Get an authentication token that will enable us to access and interact with services provided by Safaricom Mpesa
     * https://developer.safaricom.co.ke/APIs/Authorization
     */
    private function generateAuthToken(): ?string
    {
        $tokenUrl = ($this->config['env']  == "live") ? "https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials" : "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
        $credentials = base64_encode($this->config['key'] . ':' . $this->config['secret']);

        $curlTransfer = curl_init($tokenUrl);

        curl_setopt($curlTransfer, CURLOPT_HTTPHEADER, ["Authorization: Basic " . $credentials]);
        curl_setopt($curlTransfer, CURLOPT_RETURNTRANSFER, 1); // We set it to true(1) instead of immediately displaying the transfer, return it as a string of the curl exec() return value.

        $response = curl_exec($curlTransfer);
        curl_close($curlTransfer);
        $result = json_decode($response);
        $token = isset($result->{'access_token'}) ? $result->{'access_token'} : null;

        return $token;
    }

    private function checkIfConfigIsValid(): bool
    {
        return isset($this->config['BusinessShortCode']) && isset($this->config['key']) && isset($this->config['secret']) && isset($this->config['passkey']);
    }

    private function formatPhoneNumber(string $phone,): string
    {
        $formattedPhone = (substr($phone, 0, 1) == "0") ? preg_replace("/^0/", "254", $phone) : $phone;
        return $formattedPhone;
    }
}