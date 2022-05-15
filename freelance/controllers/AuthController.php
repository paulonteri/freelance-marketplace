<?php

namespace app\controllers;

use app\models\AuthModel;
use app\models\ResetPasswordTokenModel;
use app\models\UserModel;
use app\Router;
use app\utils\DisplayAlert;
use app\utils\ImageUploader;


class AuthController extends _BaseController
{

    public static function redirectIfLoggedIn()
    {
        $user = UserModel::getCurrentUser();
        if ($user != null) {
            if ($user->getIsAdmin()) {
                header('location:/admin?alert=Logged in successfully!');
            } else if ($user->isFreelancer()) {
                header('location:/dashboard/freelancer?alert=Logged in successfully!');
            } else if ($user->isClient()) {
                header('location:/dashboard/client?alert=Logged in successfully!');
            } else {
                header('location:/dashboard?alert=Logged in successfully!');
            }
        }
    }

    public static function logout(Router $router)
    {
        $authModel = new AuthModel();
        $authModel->logout();
        header('location:/login?alert=Logged out successfully!');
    }

    public static function login(Router $router)
    {

        AuthController::redirectIfLoggedIn();
        $authModel = new AuthModel();

        $data = [
            'pageTitle' => "Login",
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

            $data['email'] = trim($_POST['email']);
            $data['password'] = trim($_POST['password']);
            $data['emailError'] = '';
            $data['passwordError'] = '';

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
                    AuthController::redirectIfLoggedIn();
                }
            }
        } else {
            $data['email'] = '';
            $data['password'] = '';
            $data['emailError'] = '';
            $data['passwordError'] = '';
        }

        $router->renderView('login', $data);
    }

    public static function register(Router $router)
    {
        AuthController::redirectIfLoggedIn();
        $authModel = new AuthModel();

        $data = [
            'pageTitle' => "Register",
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'first_name'  => '',
            'middle_name'  => '',
            'last_name'  => '',
            'phone'  => '',
            'county'  => '',
            'city'  => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => '',
            'first_nameError'  => '',
            'middle_nameError'  => '',
            'last_nameError'  => '',
            'phoneError'  => '',
            'imageError'  => '',
            'countyError'  => '',
            'cityError'  => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data['email'] = trim($_POST['email']);
            $data['password'] = trim($_POST['password']);
            $data['confirmPassword'] = trim($_POST['confirmPassword']);
            $data['first_name'] = trim($_POST['first_name']);
            $data['middle_name'] = trim($_POST['middle_name']);
            $data['last_name'] = trim($_POST['last_name']);
            $data['phone'] = trim($_POST['phone']);
            $data['county'] = trim($_POST['county']);
            $data['city'] = trim($_POST['city']);

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

            // middle_name
            if (empty($data['middle_name'])) {
                $data['middle_nameError'] = 'Required';
            } elseif (strlen($data['middle_name']) < 2) {
                $data['middle_nameError'] = 'Too short';
            } elseif (strlen($data['middle_name']) > 20) {
                $data['middle_nameError'] = 'Too long';
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

            // county
            if (empty($data['county'])) {
                $data['countyError'] = 'Required';
            } elseif (strlen($data['county']) < 2) {
                $data['countyError'] = 'Too short';
            } elseif (strlen($data['county']) > 20) {
                $data['countyError'] = 'Too long';
            }

            // city
            if (empty($data['city'])) {
                $data['cityError'] = 'Required';
            } elseif (strlen($data['city']) < 2) {
                $data['cityError'] = 'Too short';
            } elseif (strlen($data['city']) > 20) {
                $data['cityError'] = 'Too long';
            }

            // make sure that errors are empty
            if (
                empty($data['emailError'])
                && empty($data['passwordError'])
                && empty($data['confirmPasswordError'])
                && empty($data['first_nameError'])
                && empty($data['middle_nameError'])
                && empty($data['last_nameError'])
                && empty($data['phoneError'])
                && empty($data['imageError'])
                && empty($data['countyError'])
                && empty($data['cityError'])
            ) {

                // upload image and get the path
                $imageUploader = new ImageUploader($_FILES['image']);
                $imagePath = $imageUploader->uploadImage("ProfileImage");

                // Register user from model function
                if ($authModel->register(
                    $data['email'],
                    $data['password'],
                    $data['first_name'],
                    $data['middle_name'],
                    $data['last_name'],
                    $data['phone'],
                    $imagePath,
                    $data['county'],
                    $data['city'],
                )) {
                    // Redirect to the login page
                    header('location:/login?alert=Registered successfully!');
                } else {
                    DisplayAlert::displayError('Something went wrong. Please try again.');
                }
            }
        }

        $router->renderView('register', $data);
    }


    public static function requestResetPassword(Router $router)
    {

        AuthController::redirectIfLoggedIn();

        $data = [
            'email' => '',
            'emailError' => '',
        ];
        $alert = null;

        // Check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize post data (prevent XSS)
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data['email'] = trim($_POST['email']);
            $data['emailError'] = '';

            // email
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter a email.';
            }

            // Check if all errors are empty
            if (empty($data['emailError'])) {
                ResetPasswordTokenModel::generateToken($data['email']);
                $alert = 'Password reset link has been sent to your email address if the email you entered is in the database.';
                $data['email'] = '';
                $data['emailError'] = '';
            }
        } else {
            $data['email'] = '';
            $data['emailError'] = '';
        }

        $router->renderView('reset-password/index', $data, $alert);
    }


    public static function resetPassword(Router $router)
    {
        AuthController::redirectIfLoggedIn();
        $authModel = new AuthModel();
        $alert = null;

        $data = [
            'pageTitle' => "Reset password",
            'password' => '',
            'confirmPassword' => '',
            'passwordError' => '',
            'confirmPasswordError' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data['token'] = trim($_POST['token']);
            $data['password'] = trim($_POST['password']);
            $data['confirmPassword'] = trim($_POST['confirmPassword']);

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

            // make sure that errors are empty
            if (
                empty($data['passwordError'])
                && empty($data['confirmPasswordError'])
            ) {
                //
                if ($authModel->resetPassword($data['token'], $data['password'])) {
                    // Redirect to the login page
                    header('location:/login?alert=Password reset successfully!');
                } else {
                    DisplayAlert::displayError('Something went wrong. Please try again.');
                }
            }
        }

        $router->renderView('reset-password/reset', $data, $alert);
    }
}