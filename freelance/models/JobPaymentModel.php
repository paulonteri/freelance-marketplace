<?php

namespace app\models;

use app\Database;


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

        $sql = 'SELECT * FROM skill WHERE id = :id';
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $skill = $statement->fetch();

        $this->id = $id;
        $this->name = $skill['name'];
    }

    public static function create(
        string $name,
    ): JobPaymentModel {
        $db = (new Database)->connectToDb();

        $sql = 'INSERT INTO skill (name) VALUES (:name)';
        $statement = $db->prepare($sql);
        $statement->bindParam(':name', $name);
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