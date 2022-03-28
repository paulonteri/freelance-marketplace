<?php

namespace app\controllers;

use DateTime;
use app\Router;
use app\utils\ImageUploader;
use app\models\UserModel;
use app\models\ClientModel;
use app\models\JobModel;
use app\models\SkillModel;

class DashboardClientController extends _BaseController
{

    private static string $basePath = 'dashboard/client/';

    public static function index(Router $router)
    {
        DashboardClientController::requireUserIsClient($router);
        $router->renderView(self::$basePath . 'index');
    }

    public static function onboarding(Router $router)
    {
        DashboardClientController::requireUserIsLoggedIn($router);

        $data = [
            'title' => '',
            'description' => '',
            'imageError' => '',
            'titleError' => '',
            'descriptionError' => '',
        ];

        // Check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize post data (prevent XSS)
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $user = UserModel::getCurrentUser();

            $data['title'] = trim($_POST['title']);
            $data['description'] = trim($_POST['description']);

            // validate title
            if (empty($data['title'])) {
                $data['titleError'] = 'Required.';
            }

            // validate image
            if (empty($_FILES['image'])) {
                $data['imageError'] = 'Please select image.';
            } else {
                $imageUploader = new ImageUploader($_FILES['image']);
                $data['imageError'] = $imageUploader->validateImage();
            }

            // validate description
            if (empty($data['description'])) {
                $data['descriptionError'] = 'Required.';
            }

            // Check if all errors are empty
            if (
                empty($data['titleError'])
                && empty($data['imageError'])
                && empty($data['descriptionError'])
                && empty($data['imageError'])
            ) {

                // upload image and get the path
                $imageUploader = new ImageUploader($_FILES['image']);
                $imagePath = $imageUploader->uploadImage("ClientImage");

                $isCreated = ClientModel::create(
                    $data['title'],
                    $data['description'],
                    $user->getId(),
                    $imagePath
                );

                if (!$isCreated) {
                    $data['titleError'] = 'Something went wrong. Please try again.';
                } else {
                    header('location:/dashboard/client?alert="Client profile created successfully!"');
                }
            }
        }

        $router->renderView(self::$basePath . 'onboarding', $data);
    }

    public static function jobs(Router $router)
    {
        DashboardClientController::requireUserIsClient($router);
        $client = UserModel::getCurrentUser()->getClient();
        $data = [
            'jobs' => JobModel::getClientJobs($client->getId()),
        ];
        $router->renderView(self::$basePath . 'jobs/index', $data);
    }

    public static function jobId(Router $router)
    {
        DashboardClientController::requireUserIsClient($router);
        $data = [
            'pageTitle' => "Job Details",
        ];
        $errors = array();

        if (isset($_GET['jobId'])) {
            $data['id'] = $_GET['jobId'];
            $job = JobModel::tryGetById($data['id']);

            if ($job == null || $job->getClientId() != UserModel::getCurrentUser()->getClient()->getId()) {
                $errors = ['Job not found.'];
            } else {
                $data['job'] = $job;
                $data['pageTitle'] = "Job " . $job->getTitle();
            }
        } else {
            $errors = ['Job id not found.'];
        }

        $router->renderView(self::$basePath . 'jobs/id/index', $data, null, $errors);
    }

    public static function jobCreate(Router $router)
    {
        DashboardClientController::requireUserIsClient($router);

        $data = [
            'title' => '',
            'description' => '',
            'payRatePerHour' => '',
            'expectedDurationInHours' => '',
            'receiveJobProposalsDeadline' => '',
            'skills' => [],
            'imageError' => '',
            'titleError' => '',
            'descriptionError' => '',
            'payRatePerHourError' => '',
            'expectedDurationInHoursError' => '',
            'receiveJobProposalsDeadlineError' => '',
            'skillsError' => '',
        ];
        $data['allSkills'] =  SkillModel::getAll();

        // Check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize post data (prevent XSS)
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $user = UserModel::getCurrentUser();

            $data['title'] = trim($_POST['title']);
            $data['description'] = trim($_POST['description']);
            $data['payRatePerHour'] = trim($_POST['payRatePerHour']);
            $data['expectedDurationInHours'] = trim($_POST['expectedDurationInHours']);
            $data['receiveJobProposalsDeadline'] = trim($_POST['receiveJobProposalsDeadline']);
            $data['skills'] = $_POST['skills'];

            // validate title
            if (empty($data['title'])) {
                $data['titleError'] = 'Required.';
            } elseif (strlen($data['title']) < 4) {
                $data['titleError'] = 'Too short';
            } elseif (strlen($data['title']) > 100) {
                $data['titleError'] = 'Too long';
            }

            // validate description
            if (empty($data['description'])) {
                $data['descriptionError'] = 'Required.';
            } elseif (strlen($data['description']) < 10) {
                $data['descriptionError'] = 'Too short';
            } elseif (strlen($data['description']) > 1000) {
                $data['descriptionError'] = 'Too long';
            }

            // validate payRatePerHour
            if (empty($data['payRatePerHour'])) {
                $data['payRatePerHourError'] = 'Required.';
            } elseif (!is_numeric($data['payRatePerHour'])) {
                $data['payRatePerHourError'] = 'Must be a number.';
            } elseif ($data['payRatePerHour'] < 0) {
                $data['payRatePerHourError'] = 'Must be positive.';
            } elseif ($data['payRatePerHour'] > 100000) {
                $data['payRatePerHourError'] = 'Too high.';
            }

            // validate expectedDurationInHours
            if (empty($data['expectedDurationInHours'])) {
                $data['expectedDurationInHoursError'] = 'Required.';
            } elseif (!is_numeric($data['expectedDurationInHours'])) {
                $data['expectedDurationInHoursError'] = 'Must be a number.';
            } elseif ($data['expectedDurationInHours'] < 1) {
                $data['expectedDurationInHoursError'] = 'Too short.';
            } elseif ($data['expectedDurationInHours'] > 100000) {
                $data['expectedDurationInHoursError'] = 'Too high.';
            }

            // validate receiveJobProposalsDeadline
            if (empty($data['receiveJobProposalsDeadline'])) {
                $data['receiveJobProposalsDeadlineError'] = 'Required.';
            } elseif (!DateTime::createFromFormat('Y-m-d\TH:i', $data['receiveJobProposalsDeadline'])) {
                $data['receiveJobProposalsDeadlineError'] = 'Invalid date.';
            } elseif (strtotime($data['receiveJobProposalsDeadline']) < time()) {
                $data['receiveJobProposalsDeadlineError'] = 'Date must be in the future.';
            }

            // validate image
            if (empty($_FILES['image'])) {
                $data['imageError'] = 'Please select image.';
            } else {
                $imageUploader = new ImageUploader($_FILES['image']);
                $data['imageError'] = $imageUploader->validateImage();
            }

            // todo: validate skills

            // Check if all errors are empty
            if (
                empty($data['titleError'])
                && empty($data['imageError'])
                && empty($data['descriptionError'])
                && empty($data['imageError'])
                && empty($data['payRatePerHourError'])
                && empty($data['expectedDurationInHoursError'])
                && empty($data['receiveJobProposalsDeadlineError'])
            ) {

                // upload image and get the path
                $imageUploader = new ImageUploader($_FILES['image']);
                $imagePath = $imageUploader->uploadImage("ClientJobImage");

                $job = JobModel::create(
                    $user->getClient()->getId(),
                    $data['title'],
                    $data['description'],
                    $imagePath,
                    $data['payRatePerHour'],
                    $data['expectedDurationInHours'],
                    $data['receiveJobProposalsDeadline']
                );
                $job->addSkills($data['skills']);

                if (!$job) {
                    $router->renderView(self::$basePath . 'jobs/create', $data, null, array('Something went wrong. Please try again.',));
                    return;
                } else {
                    $data['title'] = '';
                    $data['description'] = '';
                    $data['payRatePerHour'] = '';
                    $data['expectedDurationInHours'] = '';
                    $data['receiveJobProposalsDeadline'] = '';
                    $router->renderView(self::$basePath . 'jobs/create', $data, "Job created successfully!");
                    return;
                }
            }
        }

        $router->renderView(self::$basePath . 'jobs/create', $data);
    }

    public static function jobProposals(Router $router)
    {
        DashboardClientController::requireUserIsClient($router);
        $router->renderView(self::$basePath . 'jobs/id/proposals');
    }

    public static function jobReviewAndComplete(Router $router)
    {
        DashboardClientController::requireUserIsClient($router);
        $router->renderView(self::$basePath . 'jobs/id/review-and-complete');
    }
}