<?php

namespace app\models;

class AuthModel extends _BaseModel
{
    private $db;

    public function __construct()
    {
        $this->db = $this->connectToDb();
    }

    public function register(
        $username,
        $email,
        $password,
        $first_name,
        $last_name,
        $phone,
        $image,
    ) {
        $sql = "INSERT INTO user (username, email, password, first_name, last_name, phone, image) VALUES(:username, :email, :password, :first_name, :last_name, :phone, :image)";
        $statement = $this->db->prepare($sql);
        $statement->execute(
            array(
                ':username' => $username,
                ':email' => $email,
                ':password' => password_hash($password, PASSWORD_DEFAULT),
                ':first_name' => $first_name,
                ':last_name' => $last_name,
                ':phone' => $phone,
                'image' => $image,
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
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        header('location:login');
    }


    private function createUserSession($user)
    {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
    }

    public function isUserLoggedIn()
    {
        if (isset($_SESSION['user_id']) && isset($_SESSION['username']) && isset($_SESSION['email'])) {
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

    public function isUserNameRegistered($username)
    {
        $sql = "SELECT * FROM user WHERE username = :username";
        $statement =  $this->db->prepare($sql);
        $statement->execute(
            array('username' => $username)
        );
        $count = $statement->rowCount();
        return $count > 0;
    }
}