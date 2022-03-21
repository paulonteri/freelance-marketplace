<?php

namespace app\controllers;

use app\models\AuthModel;
use app\Router;


class AuthController extends _BaseController
{
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

            // validate email
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter a email.';
            }

            // validate password
            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter a password.';
            }

            // Check if all errors are empty
            if (empty($data['emailError']) && empty($data['passwordError'])) {
                $isLoggedIn = $authModel->login($data['email'], $data['password']);

                if (!$isLoggedIn) {
                    $data['passwordError'] = 'Password or email is incorrect. Please try again.';
                } else {
                    header('location:/dashboard?alert="Logged in successfully!"');
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
            'image'  => '',
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
                'image'  => '', // trim($_POST['image']),
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => '',
                'first_nameError'  => '',
                'last_nameError'  => '',
                'phoneError'  => '',
                'imageError'  => '',
            ];

            $nameValidation = '/^[a-zA-Z0-9]*$/';
            $passwordValidation = '/^(.{0,7}|[^a-z]*|[^\d]*)$/i';

            // validate username on letters/numbers
            if (empty($data['username'])) {
                $data['usernameError'] = 'Please enter username.';
            } elseif (!preg_match($nameValidation, $data['username'])) {
                $data['usernameError'] = 'Name can only contain letters and numbers.';
            } elseif ($authModel->isUserNameRegistered($data['username'])) {
                $data['usernameError'] = 'Username is already taken.';
            }

            // validate email
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter email address.';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Please enter the correct format.';
            } elseif ($authModel->isEmailRegistered($data['email'])) {
                $data['emailError'] = 'Email is already taken.';
            }


            // validate password on length, numeric values,
            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter password.';
            } elseif (strlen($data['password']) < 6) {
                $data['passwordError'] = 'Password must be at least 8 characters';
            } elseif (preg_match($passwordValidation, $data['password'])) {
                $data['passwordError'] = 'Password must be have at least one numeric value.';
            }

            // validate confirm password
            if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Please enter password.';
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                    $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                }
            }

            // validate names
            // validate phone
            // validate image

            // make sure that errors are empty
            if (empty($data['usernameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {

                // Register user from model function
                if ($authModel->register(
                    $data['username'],
                    $data['email'],
                    $data['password'],
                    $data['first_name'],
                    $data['last_name'],
                    $data['phone'],
                    $data['image'],
                )) {
                    // Redirect to the login page
                    header('location:/login?alert="Registered successfully!"');
                } else {
                    die('Something went wrong.');
                }
            }
        }

        $router->renderView('register', $data);
    }
}