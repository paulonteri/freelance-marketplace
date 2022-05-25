<?php

namespace app\models;

use PDO;
use app\Database;
use app\utils\Logger;


class JobPaymentModel extends _BaseModel
{
    private $db;

    private int $id;
    private int $job_id;
    private string $phone_number;
    private float $amount;
    private bool $is_payment_successful;
    private string $response_merchant_request_id;
    private string $response_checkout_request_id;
    private int $response_response_code;
    private ?int $callback_result_code;
    private ?string $callback_result_desc;


    public function __construct(int $id)
    {
        $this->db = $this->connectToDb();

        $sql = 'SELECT * FROM job_payment WHERE id = :id';
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $job_payment = $statement->fetch();

        $this->id = $id;
        $this->job_id = $job_payment['job_id'];
        $this->phone_number = $job_payment['phone_number'];
        $this->amount = $job_payment['amount'];
        $this->is_payment_successful = $job_payment['is_payment_successful'];
        $this->response_merchant_request_id = $job_payment['response_merchant_request_id'];
        $this->response_checkout_request_id = $job_payment['response_checkout_request_id'];
        $this->response_response_code = $job_payment['response_response_code'];
        $this->callback_result_code = $job_payment['callback_result_code'];
        $this->callback_result_desc = $job_payment['callback_result_desc'];
    }

    public static function create(
        int $job_id,
        string $phone_number,
        float $amount,
        ?string $response_response_code,
        ?string $response_merchant_request_id,
        ?string $response_checkout_request_id,
    ): JobPaymentModel {
        $db = (new Database)->connectToDb();

        $sql = 'INSERT INTO job_payment (job_id, phone_number, amount, is_payment_successful, response_response_code, response_merchant_request_id, response_checkout_request_id)';
        $sql .= 'VALUES (:job_id, :phone_number, :amount, :is_payment_successful, :response_response_code, :response_merchant_request_id, :response_checkout_request_id)';
        $statement = $db->prepare($sql);
        $statement->bindParam(':job_id', $job_id);
        $statement->bindParam(':phone_number', $phone_number);
        $statement->bindParam(':amount', $amount);
        $is_payment_successful_int = 0;
        $statement->bindParam(':is_payment_successful', $is_payment_successful_int, PDO::PARAM_INT);
        $statement->bindParam(':response_response_code', $response_response_code);
        $statement->bindParam(':response_merchant_request_id', $response_merchant_request_id);
        $statement->bindParam(':response_checkout_request_id', $response_checkout_request_id);
        $statement->execute();

        $id = $db->lastInsertId();

        Logger::log("Job payment with id $id has been created for job with id $job_id");

        return new JobPaymentModel($id);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getJobId(): int
    {
        return $this->job_id;
    }

    public function getJob(): ?JobModel
    {
        return JobModel::tryGetById($this->job_id);
    }

    public function getPhoneNumber(): string
    {
        return $this->phone_number;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getIsPaymentSuccessful(): bool
    {
        return $this->is_payment_successful;
    }

    public function getResponseMerchantRequestId(): string
    {
        return $this->response_merchant_request_id;
    }

    public function getResponseCheckoutRequestId(): string
    {
        return $this->response_checkout_request_id;
    }

    public function getResponseResponseCode(): int
    {
        return $this->response_response_code;
    }

    public function getCallbackResultCode(): int
    {
        return $this->callback_result_code;
    }

    public function getCallbackResultDesc(): string
    {
        return $this->callback_result_desc;
    }

    public static function tryGetByMerchantRequestId(string $merchant_request_id): ?JobPaymentModel
    {
        $db = (new Database)->connectToDb();

        $sql = 'SELECT * FROM job_payment WHERE response_merchant_request_id = :merchant_request_id';
        $statement = $db->prepare($sql);
        $statement->bindParam(':merchant_request_id', $merchant_request_id);
        $statement->execute();
        $job_payment = $statement->fetch();

        if ($job_payment === false) {
            return null;
        }

        return new JobPaymentModel($job_payment['id']);
    }

    public function addCallBackInfo(
        bool $is_payment_successful,
        int $result_code,
        string $result_desc,
    ): void {

        $sql = 'UPDATE job_payment SET is_payment_successful = :is_payment_successful, callback_result_code = :callback_result_code, callback_result_desc = :callback_result_desc WHERE id = :id';
        $statement = $this->db->prepare($sql);
        $is_payment_successful_int = $is_payment_successful ? 1 : 0;
        $statement->bindParam(':is_payment_successful', $is_payment_successful_int, PDO::PARAM_INT);
        $statement->bindParam(':callback_result_code', $result_code);
        $statement->bindParam(':callback_result_desc', $result_desc);
        $statement->bindParam(':id', $this->id);
        $statement->execute();

        $this->is_payment_successful = $is_payment_successful;
        $this->callback_result_code = $result_code;
        $this->callback_result_desc = $result_desc;

        Logger::log("Callback info has been added to job payment with id {$this->id}");
    }

    public function hasBeenRefunded(): bool
    {
        $sql = "SELECT * FROM job_payment_dispatch WHERE job_payment_id = :job_payment_id AND is_refund = 1 AND is_dispatch_successful = 1";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':job_payment_id', $this->id);
        $statement->execute();
        $job_payment_dispatch = $statement->fetch();

        if ($job_payment_dispatch) {
            return true;
        }
        return false;
    }

    public function hasFreelancerBeenPaid(): bool
    {
        $sql = "SELECT * FROM job_payment_dispatch WHERE job_payment_id = :job_payment_id AND is_refund = 0 AND is_dispatch_successful = 1";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':job_payment_id', $this->id);
        $statement->execute();
        $job_payment_dispatch = $statement->fetch();

        if ($job_payment_dispatch) {
            return true;
        }
        return false;
    }
}