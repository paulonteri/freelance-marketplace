<?php

namespace app\utils;

use app\Settings;
use app\models\JobModel;
use app\models\JobPaymentModel;

/**
 * Class JobMpesaPaymentHelpers
 * @package app\utils
 * 
 * https://developer.safaricom.co.ke/Documentation
 */
class JobMpesaPaymentHelper
{
    private $config = array(
        "AccountReference"  => "Freelance Marketplace",
        "TransactionDesc"   => "Payment for job",
        "passkey"           => null,
        "env"               => "sandbox",
        "BusinessShortCode" => null,
        "secret"            => null,
        "key"               => null,
        // "username"       => "apitest",
    );
    private string $paymentCallbackPath = "/callbacks/job-payment";


    public function __construct()
    {
        $this->config["env"] = getenv("MPESA_ENV") ? getenv("MPESA_ENV") : "sandbox"; // sandbox or live
        $this->config["BusinessShortCode"] = getenv("MPESA_BUSINESS_SHORT_CODE") ? getenv("MPESA_BUSINESS_SHORT_CODE") : "174379";
        $this->config["key"] = getenv("MPESA_CONSUMER_KEY") ? getenv("MPESA_CONSUMER_KEY") : null;
        $this->config["secret"] = getenv("MPESA_CONSUMER_SECRET") ? getenv("MPESA_CONSUMER_SECRET") : null;
        $this->config["passkey"] = getenv("MPESA_PASSKEY") ? getenv("MPESA_PASSKEY") : null;
    }

    /**
     * Used to create a payment request via a STK Push.
     * The LIPA NA M-PESA ONLINE API also know as M-PESA express (STK Push) is a Merchant/Business initiated C2B (Customer to Business) Payment.
     */
    public function makePaymentRequest(string $phone, JobModel $job)
    {
        $amount = 1;

        if ($job->hasBeenPaidFor()) {
            DisplayAlert::displayError("Job already paid for.");
            return false;
        }

        if (!$this->checkIfConfigIsValid()) {
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

        $formattedPhone = (substr($phone, 0, 1) == "0") ? preg_replace("/^0/", "254", $phone) : $phone;
        $timestamp = date("YmdHis");
        $password  = base64_encode($this->config['BusinessShortCode'] . "" . $this->config['passkey'] . "" . $timestamp);

        $curlPostData = array(
            "BusinessShortCode" => $this->config['BusinessShortCode'],
            "Password" => $password,
            "Timestamp" => $timestamp,
            "TransactionType" => "CustomerPayBillOnline",
            "Amount" => $amount,
            "PartyA" => $formattedPhone,
            "PartyB" => $this->config['BusinessShortCode'],
            "PhoneNumber" => $formattedPhone,
            "CallBackURL" => Settings::$host . $this->paymentCallbackPath, // Enter your callback url here
            "AccountReference" => $this->config['AccountReference'],
            "TransactionDesc" => $this->config['TransactionDesc'],
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
    public function handleMakePaymentCallBack($response)
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

        if ($response && isset($response->{'Body'}) && isset($response->{'Body'}->{'stkCallback'})) {
            $resultCode = $response->{'Body'}->{'stkCallback'}->{'ResultCode'};
            // $resultDesc = $response->{'Body'}->{'stkCallback'}->{'ResultDesc'};
            // $callbackMetadata = $response->{'Body'}->{'stkCallback'}->{'CallbackMetadata'};
            // $merchantRequestId = $response->{'Body'}->{'stkCallback'}->{'MerchantRequestID'};
            // $checkoutRequestId = $response->{'Body'}->{'stkCallback'}->{'CheckoutRequestID'};

            // payment was a success
            if ($resultCode == 0) {
                //
            }
            // payment was a success
            else {
                // 
            }
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
}