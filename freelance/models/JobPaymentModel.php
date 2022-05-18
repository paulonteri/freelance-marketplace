<?php

namespace app\models;

use app\Database;
use PDO;


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

        return new JobPaymentModel($db->lastInsertId());
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
}