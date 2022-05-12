<?php

namespace app\controllers;

use app\Router;
use app\models\SkillModel;
use app\models\FreelancerModel;
use app\models\ClientModel;
use app\models\JobModel;


class AdminController extends _BaseController
{
    private static string $basePath = 'admin/';

    public static function index(Router $router)
    {
        AdminController::requireUserIsAdmin($router);
        $router->renderView(self::$basePath . 'index');
    }

    public static function freelancers(Router $router)
    {
        AdminController::requireUserIsAdmin($router);
        $data = [
            'pageTitle' => "Freelancers | Admin",
            'freelancers' => FreelancerModel::getAll()
        ];
        $router->renderView(self::$basePath . 'freelancers/index', $data);
    }

    public static function freelancerId(Router $router)
    {
        AdminController::requireUserIsAdmin($router);

        $data = [
            'pageTitle' => "Freelancer Details | Admin",

        ];
        $errors = array();

        if (isset($_GET['freelancerId'])) {
            $data['id'] = $_GET['freelancerId'];
            $freelancer = FreelancerModel::tryGetById($data['id']);

            if ($freelancer != null) {
                $data['freelancer'] = $freelancer;
                $data['pageTitle'] = "Freelancer " . $freelancer->getTitle();
            }
        } else {
            $errors = ['Freelancer id not found.'];
        }

        $router->renderView(self::$basePath . 'freelancers/id', $data, null, $errors);
    }

    public static function clients(Router $router)
    {
        AdminController::requireUserIsAdmin($router);
        $data = [
            'pageTitle' => "Clients | Admin",
            'clients' => ClientModel::getAll()
        ];
        $router->renderView(self::$basePath . 'clients/index', $data);
    }

    public static function clientId(Router $router)
    {
        AdminController::requireUserIsAdmin($router);

        $data = [
            'pageTitle' => "Client Details | Admin",

        ];
        $errors = array();

        if (isset($_GET['clientId'])) {
            $data['id'] = $_GET['clientId'];
            $client = ClientModel::tryGetById($data['id']);

            if ($client != null) {
                $data['client'] = $client;
                $data['pageTitle'] = "Client " . $client->getTitle();
            }
        } else {
            $errors = ['Client id not found.'];
        }

        $router->renderView(self::$basePath . 'clients/id', $data, null, $errors);
    }

    public static function jobs(Router $router)
    {
        AdminController::requireUserIsAdmin($router);
        $data = [
            'pageTitle' => "Jobs | Admin",
            'jobs' => JobModel::getAll()
        ];
        $router->renderView(self::$basePath . 'jobs/index', $data);
    }

    public static function jobId(Router $router)
    {
        AdminController::requireUserIsAdmin($router);

        $data = [
            'pageTitle' => "Job Details | Admin",

        ];
        $errors = array();

        if (isset($_GET['jobId'])) {
            $data['id'] = $_GET['jobId'];
            $job = JobModel::tryGetById($data['id']);

            if ($job != null) {
                $data['job'] = $job;
                $data['pageTitle'] = "Job " . $job->getTitle();
            }
        } else {
            $errors = ['Job id not found.'];
        }

        $router->renderView(self::$basePath . 'jobs/id', $data, null, $errors);
    }

    public static function proposals(Router $router)
    {
        AdminController::requireUserIsAdmin($router);
        $router->renderView(self::$basePath . 'proposals');
    }

    public static function skillsCreate(Router $router)
    {
        AdminController::requireUserIsAdmin($router);

        $data = [
            'name' => '',
            'nameError' => '',
        ];

        // Check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize post data (prevent XSS)
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data['name'] = trim($_POST['name']);

            // validate name
            if (empty($data['name'])) {
                $data['nameError'] = 'Please enter a name.';
            }

            // Check if all errors are empty
            if (empty($data['nameError'])) {
                $isCreated = SkillModel::create(
                    $data['name'],
                );

                if (!$isCreated) {
                    $data['nameError'] = 'Something went wrong. Please try again.';
                } else {
                    $router->renderView(self::$basePath . 'skills/create', $data, "Skill added");
                }
            }
        } else {
            $router->renderView(self::$basePath . 'skills/create', $data);
        }
    }
}
