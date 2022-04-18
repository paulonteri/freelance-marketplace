<?php

namespace app\controllers;

use app\models\AuthModel;
use app\Router;
use app\utils\ImageUploader;


class AuthController extends _BaseController
{

    public static function logout(Router $router)
    {
        $authModel = new AuthModel();
        $authModel->logout();
        header('location:/login?alert=Logged out successfully!');
    }

    public static function login(Router $router)
    {

        $authModel = new AuthModel();

        $data = [
            'title' => 'Login page',
            'email' => '',
            'password' => '',
            'emailError' => '',
            'passwordError' => ''
        ];

        // Check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize post data (prevent XSS)
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'emailError' => '',
                'passwordError' => '',
            ];

            // email
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter a email.';
            }

            // password
            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter a password.';
            }

            // Check if all errors are empty
            if (empty($data['emailError']) && empty($data['passwordError'])) {
                $isLoggedIn = $authModel->login($data['email'], $data['password']);

                if (!$isLoggedIn) {
                    $data['passwordError'] = 'Password or email is incorrect. Please try again.';
                } else {
                    header('location:/dashboard?alert=Logged in successfully!');
                }
            }
        } else {
            $data = [
                'email' => '',
                'password' => '',
                'emailError' => '',
                'passwordError' => ''
            ];
        }

        $router->renderView('login', $data);
    }

    public static function register(Router $router)
    {
        $authModel = new AuthModel();

        $data = [
            'username' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'first_name'  => '',
            'last_name'  => '',
            'phone'  => '',
            'usernameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => '',
            'first_nameError'  => '',
            'last_nameError'  => '',
            'phoneError'  => '',
            'imageError'  => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'first_name'  => trim($_POST['first_name']),
                'last_name'  => trim($_POST['last_name']),
                'phone'  => trim($_POST['phone']),
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => '',
                'first_nameError'  => '',
                'last_nameError'  => '',
                'phoneError'  => '',
                'imageError'  => '',
            ];


            // username
            $userNameValidation = '/^[a-zA-Z0-9]*$/';
            if (empty($data['username'])) {
                $data['usernameError'] = 'Please enter username.';
            } elseif (!preg_match($userNameValidation, $data['username'])) {
                $data['usernameError'] = 'Name can only contain letters and numbers.';
            } elseif ($authModel->isUserNameRegistered($data['username'])) {
                $data['usernameError'] = 'Username is already taken.';
            }

            // email
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter email address.';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Please enter the correct format.';
            } elseif ($authModel->isEmailRegistered($data['email'])) {
                $data['emailError'] = 'Email is already taken.';
            } elseif (strlen($data['email']) > 50) {
                $data['emailError'] = 'Too long';
            }

            // password
            if (empty($data['password'])) {
                $data['passwordError'] = 'Required';
            } elseif (strlen($data['password']) < 8) {
                $data['passwordError'] = 'Too short';
            } elseif (strlen($data['password']) > 20) {
                $data['passwordError'] = 'Too long';
            } elseif (!preg_match("#[0-9]+#", $data['password'])) {
                $data['passwordError'] = "Must Contain At Least 1 Number!";
            } elseif (!preg_match("#[A-Z]+#", $data['password'])) {
                $data['passwordError'] = "Must Contain At Least 1 Capital Letter!";
            } elseif (!preg_match("#[a-z]+#", $data['password'])) {
                $data['passwordError'] = "Must Contain At Least 1 Lowercase Letter!";
            } elseif (!preg_match("#[\W]+#", $data['password'])) {
                $data['passwordError'] = "Must Contain At Least 1 Special Character!";
            }

            // confirm password
            if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Required';
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                    $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                }
            }

            // first_name
            if (empty($data['first_name'])) {
                $data['first_nameError'] = 'Required';
            } elseif (strlen($data['first_name']) < 2) {
                $data['first_nameError'] = 'Too short';
            } elseif (strlen($data['first_name']) > 20) {
                $data['first_nameError'] = 'Too long';
            }

            // last_name
            if (empty($data['last_name'])) {
                $data['last_nameError'] = 'Required';
            } elseif (strlen($data['last_name']) < 2) {
                $data['last_nameError'] = 'Too short';
            } elseif (strlen($data['last_name']) > 20) {
                $data['last_nameError'] = 'Too long';
            }

            // phone
            if (empty($data['phone'])) {
                $data['phoneError'] = 'Required';
            } elseif (strlen($data['phone']) != 10) {
                $data['phoneError'] = 'Invalid length';
            } elseif (!preg_match("#[0-9]+#", $data['phone'])) {
                $data['phoneError'] = "Must Contain At Least 1 Number!";
            } elseif (preg_match("#[A-Z]+#", $data['phone'])) {
                $data['phoneError'] = "Must Not Contain A Capital Letter!";
            } elseif (preg_match("#[a-z]+#", $data['phone'])) {
                $data['phoneError'] = "Must Not Contain A Lowercase Letter!";
            } elseif (preg_match("#[\W]+#", $data['phone'])) {
                $data['phoneError'] = "Must Not Contain A Special Character!";
            }

            // image
            if (empty($_FILES['image'])) {
                $data['imageError'] = 'Please select image.';
            } else {
                $imageUploader = new ImageUploader($_FILES['image']);
                $data['imageError'] = $imageUploader->validateImage();
            }

            // make sure that errors are empty
            if (empty($data['usernameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError']) && empty($data['imageError'])) {

                // upload image and get the path
                $imageUploader = new ImageUploader($_FILES['image']);
                $imagePath = $imageUploader->uploadImage("ProfileImage");

                // Register user from model function
                if ($authModel->register(
                    $data['username'],
                    $data['email'],
                    $data['password'],
                    $data['first_name'],
                    $data['last_name'],
                    $data['phone'],
                    $imagePath
                )) {
                    // Redirect to the login page
                    header('location:/login?alert=Registered successfully!');
                } else {
                    die('Something went wrong.');
                }
            }
        }

        $router->renderView('register', $data);
    }
}
