<?php

namespace app\controllers;

use app\Router;
use app\models\JobModel;
use app\models\UserModel;
use app\models\JobProposalModel;


class JobPostingsController extends _BaseController
{

    private static string $basePath = 'jobs/';

    public static function index(Router $router)
    {
        $data = [
            'jobs' => JobModel::getAll()
        ];
        $router->renderView(self::$basePath . 'index', $data);
    }

    public static function detail(Router $router)
    {
        JobPostingsController::requireUserIsLoggedIn($router);

        $data = [
            'pageTitle' => "Job Details",
            'jobId' => '',
            'title' => '',
            'description' => '',
            'titleError' => '',
            'descriptionError' => '',
        ];
        $errors = array();

        // Check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize post data (prevent XSS)
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $user = UserModel::getCurrentUser();

            $data['title'] = trim($_POST['title']);
            $data['description'] = trim($_POST['description']);
            $data['jobId'] = trim($_POST['jobId']);

            // TODO: validate user

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

            // Check if all errors are empty
            if (
                empty($data['titleError'])
                && empty($data['descriptionError'])
            ) {

                $proposal = JobProposalModel::create(
                    $data['jobId'],
                    $user->getFreelancer()->getId(),
                    $data['title'],
                    $data['description'],
                );

                if (!$proposal) {
                    $errors = array('Something went wrong. Please try again.',);
                } else {
                    $data['title'] = '';
                    $data['description'] = '';
                    $router->renderView(self::$basePath . 'id', $data, "Proposal received successfully!");
                    return;
                }
            }
        } else {



            if (isset($_GET['jobId'])) {
                $data['id'] = $_GET['jobId'];
                $job = JobModel::getJobById($data['id']);

                if ($job == null) {
                    $errors = ['Job not found.'];
                } else {
                    $data['job'] = $job;
                    $data['pageTitle'] = "Job " . $job->getTitle();
                }
            } else {
                $errors = ['Job id not found.'];
            }
        }

        $router->renderView(self::$basePath . 'id', $data, null, $errors);
    }
}