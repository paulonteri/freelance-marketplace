<?php

namespace app\controllers;

use PDOException;
use app\Router;
use app\models\SkillModel;
use app\models\UserModel;
use app\models\FreelancerModel;
use app\models\JobModel;
use app\models\JobProposalModel;
use app\models\ClientModel;


class DashboardFreelancerController extends _BaseController
{

    private static string $basePath = 'dashboard/freelancer/';

    public static function index(Router $router)
    {
        DashboardFreelancerController::requireUserIsFreelancer($router);
        $router->renderView(self::$basePath . 'index');
    }

    public static function onboarding(Router $router)
    {
        DashboardFreelancerController::requireUserIsLoggedIn($router);

        $user = UserModel::getCurrentUser();

        $data = [
            'title' => '',
            'years_of_experience' => '',
            'description' => '',
            'skills' => [],
            'titleError' => '',
            'years_of_experienceError' => '',
            'descriptionError' => '',
            'skillsError' => '',
        ];
        $data['allSkills'] =  SkillModel::getAll();

        // Check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize post data (prevent XSS)
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data['title'] = trim($_POST['title']);
            $data['years_of_experience'] = trim($_POST['years_of_experience']);
            $data['description'] = trim($_POST['description']);
            $data['skills'] = $_POST['skills'];

            // validate title
            if (empty($data['title'])) {
                $data['titleError'] = 'Please enter a title.';
            }

            // validate years_of_experience
            if (empty($data['years_of_experience'])) {
                $data['years_of_experienceError'] = 'Please enter a years_of_experience.';
            }

            // validate description
            if (empty($data['description'])) {
                $data['descriptionError'] = 'Please enter a description".';
            }

            // todo: validate skills

            // Check if all errors are empty
            if (
                empty($data['titleError'])
                && empty($data['years_of_experienceError'])
                && empty($data['descriptionError'])
                && empty($data['skillsError'])
            ) {

                try {
                    $freelancer = FreelancerModel::create(
                        $data['title'],
                        $data['description'],
                        $user->getId(),
                        $data['years_of_experience']  / 1,
                    );
                    $freelancer->addSkills($data['skills']);

                    if (!$freelancer) {
                        $router->renderView(self::$basePath . 'onboarding', $data, null, ["Something went wrong. Please try again."]);
                        return;
                    } else {
                        header('location:/dashboard/freelancer?alert="Freelancer profile created successfully!"');
                    }
                } catch (PDOException $e) {
                    if ($e->errorInfo[1] == 1062) {
                        $router->renderView(self::$basePath . 'onboarding', $data, null, ["Error: Duplicate entry. User can only have one freelancer entry."]);
                    } else {
                        $router->renderView(self::$basePath . 'onboarding', $data, null, ["Something went wrong. Please try again."]);
                    }
                    return;
                }
            }
        }

        $router->renderView(self::$basePath . 'onboarding', $data);
    }

    public static function proposals(Router $router)
    {
        DashboardFreelancerController::requireUserIsFreelancer($router);
        $router->renderView(self::$basePath . 'proposals');
    }

    public static function jobs(Router $router)
    {
        DashboardFreelancerController::requireUserIsFreelancer($router);
        $data = [
            'jobs' => JobModel::getAll()
        ];
        $router->renderView(self::$basePath . 'jobs/index', $data);
    }

    public static function myJobs(Router $router)
    {
        DashboardFreelancerController::requireUserIsFreelancer($router);
        $freelancer = UserModel::getCurrentUser()->getFreelancer();
        $data = [
            'pageTitle' => 'My Jobs',
            'pageSubTitle' => 'Jobs you submitted quotes to',
            'jobs' => JobModel::getFreelancerJobs($freelancer->getId())
        ];
        $router->renderView(self::$basePath . 'jobs/index', $data);
    }

    public static function jobId(Router $router)
    {
        DashboardFreelancerController::requireUserIsFreelancer($router);

        $data = [
            'pageTitle' => "Job Details",
        ];
        $errors = array();

        if (isset($_GET['jobId'])) {
            $data['id'] = $_GET['jobId'];
            $job = JobModel::tryGetById($data['id']);

            if ($job == null) {
                $errors = ['Job not found.'];
            } else {
                $data['job'] = $job;
                $data['pageTitle'] = "Job " . $job->getTitle();
            }
        } else {
            $errors = ['Job id not found.'];
        }


        $router->renderView(self::$basePath . 'jobs/id/index',  $data, null, $errors);
    }

    public static function jobIdProposal(Router $router)
    {
        DashboardFreelancerController::requireUserIsFreelancer($router);

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
                    $router->renderView(self::$basePath . 'jobs/id/proposal', $data, "Proposal received successfully!");
                    return;
                }
            }
        } else {
            if (isset($_GET['jobId'])) {
                $data['id'] = $_GET['jobId'];
                $job = JobModel::tryGetById($data['id']);

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

        $router->renderView(self::$basePath . 'jobs/id/proposal', $data, null, $errors);
    }



    public static function clientId(Router $router)
    {
        DashboardFreelancerController::requireUserIsFreelancer($router);

        $data = [
            'pageTitle' => "Client Details",

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
}