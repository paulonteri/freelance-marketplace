<?php

namespace app\models;

use app\Database;
use app\Settings;
use app\utils\Mailer;
use DateTime;

class ResetPasswordTokenModel extends _BaseModel
{
    private $db;

    private int $id;
    private int $user_id;
    private string $token;
    private string $time_expires;


    public function __construct(int $id)
    {
        $this->db = $this->connectToDb();

        $sql = 'SELECT * FROM reset_password_token WHERE id = :id';
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $reset_password_token = $statement->fetch();

        $this->id = $id;
        $this->user_id = $reset_password_token['user_id'];
        $this->token = $reset_password_token['token'];
        $this->time_expires = $reset_password_token['time_expires'];
    }

    public static function generateToken(string $email)
    {
        $user = UserModel::tryGetByEmail($email);
        if ($user == null) {
            return false;
        }

        $time_expires_dt = new DateTime('+5minutes'); // time five minutes from now
        $time_expires = $time_expires_dt->format('Y-m-d H:i:s');
        $user_id = $user->getId();
        $token = bin2hex(random_bytes(16));

        $db = (new Database)->connectToDb();
        $sql = 'INSERT INTO reset_password_token (user_id, token, time_expires) VALUES (:user_id, :token, :time_expires)';
        $statement = $db->prepare($sql);
        $statement->bindParam(':user_id', $user_id);
        $statement->bindParam(':token', $token);
        $statement->bindParam(':time_expires', $time_expires);
        $statement->execute();

        // send mail
        $mailBody = '<p>You requested a password reset. Please click the link below to reset your password.</p>';
        $mailBody .= '<p><a href="' . Settings::$host . '/reset-password/reset?token=' . $token . '">Reset Password</a></p>';

        Mailer::sendMail($email, 'Reset password', $mailBody);

        return new ResetPasswordTokenModel($db->lastInsertId());
    }

    public function getId(): mixed
    {
        return $this->id;
    }

    public function getUserId(): mixed
    {
        return $this->user_id;
    }

    public function getToken(): mixed
    {
        return $this->token;
    }

    public function getTimeExpires(): mixed
    {
        return $this->time_expires;
    }

    public static function getUserIfTokenIsValid(string $token): ?UserModel
    {
        $db = (new Database)->connectToDb();
        $sql = 'SELECT * FROM reset_password_token WHERE token = :token AND time_expires > NOW()';
        $statement = $db->prepare($sql);
        $statement->bindParam(':token', $token);
        $statement->execute();
        $reset_password_token = $statement->fetch();

        if ($reset_password_token == null) {
            return null;
        }

        return new UserModel($reset_password_token['user_id']);
    }

    public static function deleteAllTokensForUser(int $user_id)
    {
        $db = (new Database)->connectToDb();
        $sql = 'DELETE FROM reset_password_token WHERE user_id = :user_id';
        $statement = $db->prepare($sql);
        $statement->bindParam(':user_id', $user_id);
        $statement->execute();
    }
}