<?php

namespace app\controllers;

use app\Router;
use app\models\FreelancerModel;
use app\models\UserModel;
use app\models\AuthModel;


class DashboardProfilesController extends _BaseController
{

    private static string $basePath = 'dashboard/profile/';

    public static function index(Router $router)
    {
        $user = UserModel::getCurrentUser();
        $data = [
            'pageTitle' => 'Your profile | ' . $user->getName(),
        ];

        $data['email'] = $user->getEmail();
        $data['first_name'] = $user->getFirstName();
        $data['middle_name'] = $user->getMiddleName();
        $data['last_name'] = $user->getLastName();
        $data['phone'] = $user->getPhone();
        $data['county'] = $user->getCounty();
        $data['city'] = $user->getCity();

        $router->renderView(self::$basePath . 'index', $data);
    }

    public static function edit(Router $router)
    {
        DashboardProfilesController::requireUserIsLoggedIn($router);

        $user = UserModel::getCurrentUser();
        $data = [
            'pageTitle' => 'Edit profile | ' . $user->getName(),
            'id' => $user->getId(),
            'email' => '',
            'first_name'  => '',
            'middle_name'  => '',
            'last_name'  => '',
            'phone'  => '',
            'county'  => '',
            'city'  => '',
            'emailError' => '',
            'first_nameError'  => '',
            'middle_nameError'  => '',
            'last_nameError'  => '',
            'phoneError'  => '',
            'countyError'  => '',
            'cityError'  => '',
        ];
        $alert = null;
        $errors = array();

        $data['email'] = $user->getEmail();
        $data['first_name'] = $user->getFirstName();
        $data['middle_name'] = $user->getMiddleName();
        $data['last_name'] = $user->getLastName();
        $data['phone'] = $user->getPhone();
        $data['county'] = $user->getCounty();
        $data['city'] = $user->getCity();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $authModel = new AuthModel();

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data['email'] = trim($_POST['email']);
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
            } elseif (strlen($data['email']) > 50) {
                $data['emailError'] = 'Too long';
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
                && empty($data['first_nameError'])
                && empty($data['middle_nameError'])
                && empty($data['last_nameError'])
                && empty($data['phoneError'])
                && empty($data['countyError'])
                && empty($data['cityError'])
            ) {

                // Update from model function
                if ($user->update(
                    $data['email'],
                    $data['first_name'],
                    $data['middle_name'],
                    $data['last_name'],
                    $data['phone'],
                    $data['county'],
                    $data['city'],
                )) {
                    $alert = 'Profile updated successfully.';
                    $authModel->createUserSession($data);
                } else {
                    $errors = ['Something went wrong.'];
                }
            }
        }

        $router->renderView(self::$basePath . 'edit', $data, $alert, $errors);
    }
}
