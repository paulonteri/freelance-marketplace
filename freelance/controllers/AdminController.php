<?php

namespace app\controllers;

use app\Router;

use app\models\JobModel;
use app\models\UserModel;
use app\models\SkillModel;
use app\models\ClientModel;
use app\models\FreelancerModel;
use app\models\JobProposalModel;
use app\models\LogModel;


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

        $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // get skills
        $skillIds = [];
        foreach (SkillModel::getAll() as $skill) {
            $skillIds[] = $skill->getId();
        }
        if (isset($_GET['skills'])) {
            $skillIds = $_GET['skills'];
        }

        // pagination
        $pageNumber = 1;
        if (isset($_GET['pageNumber']) && $_GET['pageNumber'] != "") {
            $pageNumber = $_GET['pageNumber'];
        }
        $limit = self::$totalRecordsPerPage;
        $offset = ($pageNumber - 1) * $limit;
        $previousPageNumber = $pageNumber - 1;
        $nextPageNumber = $pageNumber + 1;
        $recordsCount =  FreelancerModel::getAllCount($skillIds);
        $lastPageNumber = ceil($recordsCount / $limit);

        $data = [
            'pageTitle' => "Freelancers | Admin",
            'freelancers' => FreelancerModel::getAll($limit, $offset, $skillIds),

            'allSkills' => SkillModel::getAll(),
            'skills' => $skillIds,
            'skillsError' => '',

            'pageNumber' => $pageNumber,
            'previousPageNumber' => $previousPageNumber,
            'nextPageNumber' => $nextPageNumber,
            'lastPageNumber' => $lastPageNumber,
            'recordsCount' => $recordsCount,
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
                $data['pageTitle'] = "Freelancer " . $freelancer->getTitle() . " | Admin";
            }
        } else {
            $errors = ['Freelancer id not found.'];
        }

        $router->renderView(self::$basePath . 'freelancers/id', $data, null, $errors);
    }

    public static function clients(Router $router)
    {
        AdminController::requireUserIsAdmin($router);

        $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // pagination
        $pageNumber = 1;
        if (isset($_GET['pageNumber']) && $_GET['pageNumber'] != "") {
            $pageNumber = $_GET['pageNumber'];
        }
        $limit = self::$totalRecordsPerPage;
        $offset = ($pageNumber - 1) * $limit;
        $previousPageNumber = $pageNumber - 1;
        $nextPageNumber = $pageNumber + 1;
        $recordsCount =  ClientModel::getAllCount();
        $lastPageNumber = ceil($recordsCount / $limit);

        $data = [
            'pageTitle' => "Clients | Admin",
            'clients' => ClientModel::getAll($limit, $offset),

            //
            'pageNumber' => $pageNumber,
            'previousPageNumber' => $previousPageNumber,
            'nextPageNumber' => $nextPageNumber,
            'lastPageNumber' => $lastPageNumber,
            'recordsCount' => $recordsCount,

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
                $data['pageTitle'] = "Client " . $client->getTitle() . " | Admin";
            }
        } else {
            $errors = ['Client id not found.'];
        }

        $router->renderView(self::$basePath . 'clients/id', $data, null, $errors);
    }

    public static function jobProposals(Router $router)
    {
        AdminController::requireUserIsAdmin($router);
        $data = [
            'pageTitle' => "Proposals | Admin",
            'proposals' => ''
        ];
        if (isset($_GET['jobId'])) {
            $data['proposals'] = JobProposalModel::getProposalsByJob($_GET['jobId']);
        }
        $router->renderView(self::$basePath . 'jobs/proposals/index', $data);
    }

    public static function jobProposalId(Router $router)
    {
        AdminController::requireUserIsAdmin($router);

        $data = [
            'pageTitle' => "Proposal Details | Admin",

        ];
        $errors = array();

        if (isset($_GET['proposalId'])) {
            $data['id'] = $_GET['proposalId'];
            $proposal = JobProposalModel::tryGetById($data['id']);

            if ($proposal != null) {
                $data['proposal'] = $proposal;
                $data['pageTitle'] = "Proposal " . $proposal->getTitle() . " | Admin";
            }
        } else {
            $errors = ['Proposal id not found.'];
        }

        $router->renderView(self::$basePath . 'jobs/proposals/id', $data, null, $errors);
    }


    public static function jobs(Router $router)
    {
        AdminController::requireUserIsAdmin($router);

        $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // get skills
        $skillIds = [];
        foreach (SkillModel::getAll() as $skill) {
            $skillIds[] = $skill->getId();
        }
        if (isset($_GET['skills'])) {
            $skillIds = $_GET['skills'];
        }

        // get duration
        $maxDuration = JobModel::getJobsMaxDuration();
        if (isset($_GET['maxDuration'])) {
            $maxDuration = $_GET['maxDuration'];
        }
        $minDuration = 1;
        if (isset($_GET['minDuration'])) {
            $minDuration = $_GET['minDuration'];
        }

        // get PayRatePerHour
        $maxPayRatePerHour = JobModel::getJobsMaxPayRatePerHour();
        if (isset($_GET['maxPayRatePerHour'])) {
            $maxPayRatePerHour = $_GET['maxPayRatePerHour'];
        }
        $minPayRatePerHour = 1;
        if (isset($_GET['minPayRatePerHour'])) {
            $minPayRatePerHour = $_GET['minPayRatePerHour'];
        }

        // pagination
        $pageNumber = 1;
        if (isset($_GET['pageNumber']) && $_GET['pageNumber'] != "") {
            $pageNumber = $_GET['pageNumber'];
        }
        $limit = self::$totalRecordsPerPage;
        $offset = ($pageNumber - 1) * $limit;
        $previousPageNumber = $pageNumber - 1;
        $nextPageNumber = $pageNumber + 1;
        $recordsCount =  JobModel::getAllCount($skillIds, $maxDuration, $minDuration, $maxPayRatePerHour, $minPayRatePerHour);
        $lastPageNumber = ceil($recordsCount / $limit);

        $jobs = JobModel::getAll($limit, $offset, $skillIds, $maxDuration, $minDuration, $maxPayRatePerHour, $minPayRatePerHour);

        $data = [
            'pageTitle' => "Jobs | Admin",
            'jobs' => $jobs,
            'skillPercentages' => SkillModel::getSkillJobAllocations($jobs),

            'allSkills' => SkillModel::getAll(),

            'skills' => $skillIds,
            'skillsError' => '',
            'maxPayRatePerHour' => $maxPayRatePerHour,
            'maxPayRatePerHourError' => '',
            'minPayRatePerHour' => $minPayRatePerHour,
            'minPayRatePerHourError' => '',
            'maxDuration' => $maxDuration,
            'maxDurationError' => '',
            'minDuration' => $minDuration,
            'minDurationError' => '',

            'pageNumber' => $pageNumber,
            'previousPageNumber' => $previousPageNumber,
            'nextPageNumber' => $nextPageNumber,
            'lastPageNumber' => $lastPageNumber,
            'recordsCount' => $recordsCount,
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
                $data['pageTitle'] = "Job " . $job->getTitle() . " | Admin";
            }
        } else {
            $errors = ['Job id not found.'];
        }

        $router->renderView(self::$basePath . 'jobs/id', $data, null, $errors);
    }

    public static function users(Router $router)
    {
        AdminController::requireUserIsAdmin($router);

        $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // pagination
        $pageNumber = 1;
        if (isset($_GET['pageNumber']) && $_GET['pageNumber'] != "") {
            $pageNumber = $_GET['pageNumber'];
        }
        $limit = self::$totalRecordsPerPage;
        $offset = ($pageNumber - 1) * $limit;
        $previousPageNumber = $pageNumber - 1;
        $nextPageNumber = $pageNumber + 1;
        $recordsCount =  UserModel::getAllCount();
        $lastPageNumber = ceil($recordsCount / $limit);

        $data = [
            'pageTitle' => "Users | Admin",
            'users' => UserModel::getAll($limit, $offset),

            //
            'pageNumber' => $pageNumber,
            'previousPageNumber' => $previousPageNumber,
            'nextPageNumber' => $nextPageNumber,
            'lastPageNumber' => $lastPageNumber,
            'recordsCount' => $recordsCount,
        ];
        $router->renderView(self::$basePath . 'users/index', $data);
    }

    public static function userId(Router $router)
    {
        AdminController::requireUserIsAdmin($router);

        $data = [
            'pageTitle' => "User Details | Admin",

        ];
        $errors = array();

        if (isset($_GET['userId'])) {
            $data['id'] = $_GET['userId'];
            $user = UserModel::tryGetById($data['id']);

            if ($user != null) {
                $data['user'] = $user;
                $data['pageTitle'] = "User " . $user->getName() . " | Admin";

                $data['email'] = $user->getEmail();
                $data['first_name'] = $user->getFirstName();
                $data['middle_name'] = $user->getMiddleName();
                $data['last_name'] = $user->getLastName();
                $data['phone'] = $user->getPhone();
                $data['county'] = $user->getCounty();
                $data['city'] = $user->getCity();

                // change admin status
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $isAdmin = isset($_POST['is_admin']) ? true : false;
                    $user->setIsAdmin($isAdmin);
                }

                $data['is_admin'] = $user->getIsAdmin();
            }
        } else {
            $errors = ['User id not found.'];
        }

        $router->renderView(self::$basePath . 'users/id', $data, null, $errors);
    }

    public static function  userIdLogs(Router $router)
    {
        AdminController::requireUserIsAdmin($router);

        $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (isset($_GET['userId'])) {
            $userId = $_GET['userId'];

            // get types
            $typeIds = LogModel::getTypes();
            if (isset($_GET['types'])) {
                $typeIds = $_GET['types'];
            }

            // pagination
            $pageNumber = 1;
            if (isset($_GET['pageNumber']) && $_GET['pageNumber'] != "") {
                $pageNumber = $_GET['pageNumber'];
            }
            $limit = self::$totalRecordsPerPage * 10;
            $offset = ($pageNumber - 1) * $limit;
            $previousPageNumber = $pageNumber - 1;
            $nextPageNumber = $pageNumber + 1;
            $recordsCount =  LogModel::getAllForUserCount($userId, $typeIds);
            $lastPageNumber = ceil($recordsCount / $limit);

            $data = [
                'pageTitle' => "Logs | Admin",
                'logs' => LogModel::getAllForUser($limit, $offset, $userId, $typeIds),

                'allTypes' => LogModel::getTypes(),
                'types' => $typeIds,
                'typesError' => '',

                'pageNumber' => $pageNumber,
                'previousPageNumber' => $previousPageNumber,
                'nextPageNumber' => $nextPageNumber,
                'lastPageNumber' => $lastPageNumber,
                'recordsCount' => $recordsCount,
            ];
            $router->renderView(self::$basePath . 'users/logs', $data);
        } else {
            echo 'User id not found.';
        }
    }

    public static function skills(Router $router)
    {
        AdminController::requireUserIsAdmin($router);

        $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // pagination
        $pageNumber = 1;
        if (isset($_GET['pageNumber']) && $_GET['pageNumber'] != "") {
            $pageNumber = $_GET['pageNumber'];
        }
        $limit = self::$totalRecordsPerPage * 2;
        $offset = ($pageNumber - 1) * $limit;
        $previousPageNumber = $pageNumber - 1;
        $nextPageNumber = $pageNumber + 1;
        $recordsCount =  SkillModel::getAllCount();
        $lastPageNumber = ceil($recordsCount / $limit);

        $data = [
            'pageTitle' => "Skills | Admin",
            'skills' => SkillModel::getAll($limit, $offset),
            //
            'pageNumber' => $pageNumber,
            'previousPageNumber' => $previousPageNumber,
            'nextPageNumber' => $nextPageNumber,
            'lastPageNumber' => $lastPageNumber,
            'recordsCount' => $recordsCount,
        ];
        $router->renderView(self::$basePath . 'skills/index', $data);
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