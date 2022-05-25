<?php

namespace app\models;

use PDO;
use app\Database;
use app\utils\Logger;


class JobPaymentDispatchModel extends _BaseModel
{
    private $db;
    private int $id;
    private int $job_payment_id;
    private bool $is_refund;
    private string $phone_number;
    private float $amount;
    private bool $is_dispatch_successful;
    private ?string $response_conversation_id;
    private ?string $response_originator_conversation_id;
    private ?string $response_response_code;


    public function __construct(?int $id)
    {
        $this->db = $this->connectToDb();

        $sql = 'SELECT * FROM job_payment_dispatch WHERE id = :id';
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $payment = $statement->fetch();

        $this->id = $id;
        $this->job_payment_id = $payment['job_payment_id'];
        $this->is_refund = $payment['is_refund'];
        $this->phone_number = $payment['phone_number'];
        $this->amount = $payment['amount'];
        $this->is_dispatch_successful = $payment['is_dispatch_successful'];
        $this->response_conversation_id = $payment['response_conversation_id'];
        $this->response_originator_conversation_id = $payment['response_originator_conversation_id'];
        $this->response_response_code = $payment['response_response_code'];
    }

    public static function create(
        int $job_payment_id,
        bool $is_refund,
        string $phone_number,
        float $amount,
        bool $is_dispatch_successful,
        ?string $response_conversation_id,
        ?string $response_originator_conversation_id,
        ?string $response_response_code,
    ): JobPaymentDispatchModel {
        $db = (new Database)->connectToDb();

        $sql = 'INSERT INTO job_payment_dispatch (job_payment_id, is_refund, phone_number, amount, is_dispatch_successful, response_conversation_id, response_originator_conversation_id, response_response_code)';
        $sql .= 'VALUES (:job_payment_id, :is_refund, :phone_number, :amount, :is_dispatch_successful, :response_conversation_id, :response_originator_conversation_id, :response_response_code)';
        $statement = $db->prepare($sql);
        $statement->bindParam(':job_payment_id', $job_payment_id);
        $is_refund_int = $is_refund ? 1 : 0;
        $statement->bindParam(':is_refund', $is_refund_int);
        $statement->bindParam(':phone_number', $phone_number);
        $statement->bindParam(':amount', $amount);
        $is_dispatch_successful_int = $is_dispatch_successful ? 1 : 0;
        $statement->bindParam(':is_dispatch_successful', $is_dispatch_successful_int);
        $statement->bindParam(':response_conversation_id', $response_conversation_id);
        $statement->bindParam(':response_originator_conversation_id', $response_originator_conversation_id);
        $statement->bindParam(':response_response_code', $response_response_code);
        $statement->execute();

        $id = $db->lastInsertId();

        Logger::log("Job Payment Dispatch with id $id has been created for job payment $job_payment_id");

        return new JobPaymentDispatchModel($db->lastInsertId());
    }
}