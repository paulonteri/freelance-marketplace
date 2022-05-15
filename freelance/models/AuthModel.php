<?php

namespace app\models;

use app\Database;

class AuthModel extends _BaseModel
{
    private $db;

    public function __construct()
    {
        $this->db = $this->connectToDb();
    }

    public static function hashPassword(string $password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function register(
        $email,
        $password,
        $first_name,
        $last_name,
        $middle_name,
        $phone,
        $image,
        $county,
        $city,
    ) {
        $sql = "INSERT INTO user (email, password, first_name, middle_name, last_name, phone, image, county, city) VALUES(:email, :password, :first_name, :middle_name, :last_name, :phone, :image, :county, :city)";
        $statement = $this->db->prepare($sql);
        $statement->execute(
            array(
                ':email' => $email,
                ':password' =>  AuthModel::hashPassword($password),
                ':first_name' => $first_name,
                ':middle_name' => $middle_name,
                ':last_name' => $last_name,
                ':phone' => $phone,
                'image' => $image,
                'county' => $county,
                'city' => $city,
            )
        );

        return true;
    }

    public function login($email, $password): bool
    {
        $sql = "SELECT * FROM user WHERE email = :email";
        $statement =  $this->db->prepare($sql);
        $statement->execute(
            array(
                'email' => $email
            )
        );
        $count = $statement->rowCount();
        $user = $statement->fetch();

        if ($count == 1 && password_verify($password, $user['password'])) {
            // create session
            $this->createUserSession($user);

            // redirect to dashboard
            header("location:dashboard");

            return true;
        } else {
            return false;
        }
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['email']);
        header('location:login');
    }


    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
    }

    public function isUserLoggedIn()
    {
        if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
            return true;
        } else {
            return false;
        }
    }

    public function isEmailRegistered($email)
    {
        $sql = "SELECT * FROM user WHERE email = :email";
        $statement =  $this->db->prepare($sql);
        $statement->execute(
            array('email' => $email)
        );
        $count = $statement->rowCount();
        return $count > 0;
    }

    public static function resetPassword(string $token, string $password): bool
    {
        $user = ResetPasswordTokenModel::getUserIfTokenIsValid($token);

        if ($user) {
            $db = (new Database)->connectToDb();

            $user_id = $user->getId();
            $password_hash = AuthModel::hashPassword($password);

            $sql = 'UPDATE user SET password = :password WHERE id = :user_id';
            $statement = $db->prepare($sql);
            $statement->bindParam(':password', $password_hash);
            $statement->bindParam(':user_id', $user_id);
            $statement->execute();

            ResetPasswordTokenModel::deleteAllTokensForUser($user_id);

            return true;
        }
        return false;
    }
}