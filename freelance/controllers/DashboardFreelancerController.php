<?php

namespace app\controllers;

use PDOException;
use app\Router;
use app\Settings;
use app\utils\Mailer;
use app\utils\FileUploader;
use app\models\SkillModel;
use app\models\UserModel;
use app\models\FreelancerModel;
use app\models\JobModel;
use app\models\JobProposalModel;
use app\models\ClientModel;
use app\models\JobRatingModel;
use app\utils\ImageUploader;


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
            'national_idError' => '',
        ];
        $data['allSkills'] =  SkillModel::getAll();

        // Check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize post data (prevent XSS)
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data['title'] = trim($_POST['title']);
            $data['years_of_experience'] = trim($_POST['years_of_experience']);
            $data['description'] = trim($_POST['description']);
            $data['skills'] = null;
            if (isset($_POST['skills'])) {
                $data['skills'] = $_POST['skills'];
            }

            // validate title
            if (empty($data['title'])) {
                $data['titleError'] = 'Please enter a title.';
            }

            // validate years_of_experience
            if (empty($data['years_of_experience'])) {
                $data['years_of_experienceError'] = 'Please enter a years_of_experience.';
            } else if (!is_numeric($data['years_of_experience'])) {
                $data['years_of_experienceError'] = 'Please enter a valid years of experience.';
            }

            // validate national_id
            if (empty($_FILES['national_id'])) {
                $data['national_idError'] = 'Please select image.';
            } else {
                $imageUploader = new ImageUploader($_FILES['national_id']);
                $data['national_idError'] = $imageUploader->validateImage();
            }

            // validate description
            if (empty($data['description'])) {
                $data['descriptionError'] = 'Please enter a description.';
            }

            // validate skills
            if (empty($data['skills'])) {
                $data['skillsError'] = 'Please enter skills.';
            }

            // Check if all errors are empty
            if (
                empty($data['titleError'])
                && empty($data['years_of_experienceError'])
                && empty($data['descriptionError'])
                && empty($data['skillsError'])
                && empty($data['national_idError'])
            ) {

                // upload image and get the path
                $nationalIdImageUploader = new ImageUploader($_FILES['national_id']);
                $nationalIdPath = $nationalIdImageUploader->uploadImage("ClientIdImage");

                try {
                    $freelancer = FreelancerModel::create(
                        $data['title'],
                        $data['description'],
                        $user->getId(),
                        $data['years_of_experience']  / 1,
                        $nationalIdPath
                    );
                    $freelancer->addSkills($data['skills']);

                    if (!$freelancer) {
                        $router->renderView(self::$basePath . 'onboarding', $data, null, ["Something went wrong. Please try again."]);
                        return;
                    } else {
                        // send mail
                        $email = $user->getEmail();
                        $settings = new Settings();
                        $mailBody = '<p>Your freelancer profile has been created successfully.</p>';
                        $mailBody .= '<p>Visit your dashboard <a href="' . $settings->host . '/dashboard/freelancer">here</a></p>';
                        Mailer::sendMail($email, 'Freelancer profile created', $mailBody);

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
        $freelancer = UserModel::getCurrentUser()->getFreelancer();
        $data = [
            'jobProposals' =>  JobProposalModel::getProposalsByFreelancer($freelancer->getId()) // JobModel::getFreelancerJobs($freelancer->getId())
        ];
        $router->renderView(self::$basePath . 'jobs/proposals', $data);
    }

    public static function jobs(Router $router)
    {
        DashboardFreelancerController::requireUserIsFreelancer($router);

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
        $recordsCount =  JobModel::getAllOpenJobsCount($skillIds, $maxDuration, $minDuration, $maxPayRatePerHour, $minPayRatePerHour);
        $lastPageNumber = ceil($recordsCount / $limit);

        $data = [
            'jobs' => JobModel::getAllOpenJobs($limit, $offset, $skillIds, $maxDuration, $minDuration, $maxPayRatePerHour, $minPayRatePerHour),
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

        // validate maxDuration
        if (empty($data['maxDuration'])) {
            $data['maxDurationError'] = 'Required.';
        } elseif (!is_numeric($data['maxDuration'])) {
            $data['maxDurationError'] = 'Must be a number.';
        } elseif ($data['maxDuration'] < 1) {
            $data['maxDurationError'] = 'Too short.';
        } elseif ($data['maxDuration'] > 100000) {
            $data['maxDurationError'] = 'Too high.';
        }

        // validate minDuration
        if (empty($data['minDuration'])) {
            $data['minDurationError'] = 'Required.';
        } elseif (!is_numeric($data['minDuration'])) {
            $data['minDurationError'] = 'Must be a number.';
        } elseif ($data['minDuration'] < 1) {
            $data['minDurationError'] = 'Too short.';
        } elseif ($data['minDuration'] > 100000) {
            $data['minDurationError'] = 'Too high.';
        }

        if (
            empty($data['maxDurationError'])
            && empty($data['minDurationError'])
            && $data['maxDuration'] < $data['minDuration']
        ) {
            $data['maxDurationError'] = 'Max duration must be larger than min duration.';
        }

        // validate maxPayRatePerHourError
        if (empty($data['maxPayRatePerHourError'])) {
            $data['maxPayRatePerHourErrorError'] = 'Required.';
        } elseif (!is_numeric($data['maxPayRatePerHourError'])) {
            $data['maxPayRatePerHourErrorError'] = 'Must be a number.';
        } elseif ($data['maxPayRatePerHourError'] < 0) {
            $data['maxPayRatePerHourErrorError'] = 'Must be positive.';
        } elseif ($data['maxPayRatePerHourError'] > 100000) {
            $data['maxPayRatePerHourErrorError'] = 'Too high.';
        }

        // validate minPayRatePerHourError
        if (empty($data['minPayRatePerHourError'])) {
            $data['minPayRatePerHourErrorError'] = 'Required.';
        } elseif (!is_numeric($data['minPayRatePerHourError'])) {
            $data['minPayRatePerHourErrorError'] = 'Must be a number.';
        } elseif ($data['minPayRatePerHourError'] < 0) {
            $data['minPayRatePerHourErrorError'] = 'Must be positive.';
        } elseif ($data['minPayRatePerHourError'] > 100000) {
            $data['minPayRatePerHourErrorError'] = 'Too high.';
        }

        if (
            empty($data['maxPayRatePerHourError'])
            && empty($data['minPayRatePerHourError'])
            && $data['maxPayRatePerHour'] < $data['minPayRatePerHour']
        ) {
            $data['maxPayRatePerHourError'] = 'Max pay rate must be larger than min pay rate.';
        }


        $router->renderView(self::$basePath . 'jobs/index', $data);
    }

    public static function myJobs(Router $router)
    {
        DashboardFreelancerController::requireUserIsFreelancer($router);
        $freelancer = UserModel::getCurrentUser()->getFreelancer();

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
        $recordsCount =  JobModel::getFreelancerJobsCount($freelancer->getId(), $skillIds, $maxDuration, $minDuration, $maxPayRatePerHour, $minPayRatePerHour);
        $lastPageNumber = ceil($recordsCount / $limit);

        $data = [
            'pageTitle' => 'My Jobs',
            'pageSubTitle' => 'Jobs you submitted quotes to',
            'jobs' => JobModel::getFreelancerJobs($limit, $offset, $freelancer->getId(), $skillIds, $maxDuration, $minDuration, $maxPayRatePerHour, $minPayRatePerHour),
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

        // validate maxDuration
        if (empty($data['maxDuration'])) {
            $data['maxDurationError'] = 'Required.';
        } elseif (!is_numeric($data['maxDuration'])) {
            $data['maxDurationError'] = 'Must be a number.';
        } elseif ($data['maxDuration'] < 1) {
            $data['maxDurationError'] = 'Too short.';
        } elseif ($data['maxDuration'] > 100000) {
            $data['maxDurationError'] = 'Too high.';
        }

        // validate minDuration
        if (empty($data['minDuration'])) {
            $data['minDurationError'] = 'Required.';
        } elseif (!is_numeric($data['minDuration'])) {
            $data['minDurationError'] = 'Must be a number.';
        } elseif ($data['minDuration'] < 1) {
            $data['minDurationError'] = 'Too short.';
        } elseif ($data['minDuration'] > 100000) {
            $data['minDurationError'] = 'Too high.';
        }

        if (
            empty($data['maxDurationError'])
            && empty($data['minDurationError'])
            && $data['maxDuration'] < $data['minDuration']
        ) {
            $data['maxDurationError'] = 'Max duration must be larger than min duration.';
        }

        // validate maxPayRatePerHourError
        if (empty($data['maxPayRatePerHourError'])) {
            $data['maxPayRatePerHourErrorError'] = 'Required.';
        } elseif (!is_numeric($data['maxPayRatePerHourError'])) {
            $data['maxPayRatePerHourErrorError'] = 'Must be a number.';
        } elseif ($data['maxPayRatePerHourError'] < 0) {
            $data['maxPayRatePerHourErrorError'] = 'Must be positive.';
        } elseif ($data['maxPayRatePerHourError'] > 100000) {
            $data['maxPayRatePerHourErrorError'] = 'Too high.';
        }

        // validate minPayRatePerHourError
        if (empty($data['minPayRatePerHourError'])) {
            $data['minPayRatePerHourErrorError'] = 'Required.';
        } elseif (!is_numeric($data['minPayRatePerHourError'])) {
            $data['minPayRatePerHourErrorError'] = 'Must be a number.';
        } elseif ($data['minPayRatePerHourError'] < 0) {
            $data['minPayRatePerHourErrorError'] = 'Must be positive.';
        } elseif ($data['minPayRatePerHourError'] > 100000) {
            $data['minPayRatePerHourErrorError'] = 'Too high.';
        }

        if (
            empty($data['maxPayRatePerHourError'])
            && empty($data['minPayRatePerHourError'])
            && $data['maxPayRatePerHour'] < $data['minPayRatePerHour']
        ) {
            $data['maxPayRatePerHourError'] = 'Max pay rate must be larger than min pay rate.';
        }

        $router->renderView(self::$basePath . 'jobs/my-jobs', $data);
    }

    public static function jobId(Router $router)
    {
        DashboardFreelancerController::requireUserIsFreelancer($router);

        $data = [
            'pageTitle' => "Job Details",
        ];
        $errors = array();

        // -------------------- $_GET -------------------- 
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
        // -------------------- $_GET -------------------- 


        $router->renderView(self::$basePath . 'jobs/id/index',  $data, null, $errors);
    }

    public static function jobIdProposal(Router $router)
    {
        DashboardFreelancerController::requireUserIsFreelancer($router);

        $data = [
            'pageTitle' => "Job Details",
            'proposal' => null,
            'jobId' => '',
            'title' => '',
            'description' => '',
            'titleError' => '',
            'descriptionError' => '',
        ];
        $errors = array();
        $alert = null;
        $user = UserModel::getCurrentUser();

        // Check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize post data (prevent XSS)
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);


            $data['title'] = trim($_POST['title']);
            $data['description'] = trim($_POST['description']);
            $data['jobId'] = trim($_POST['jobId']);
            $job = JobModel::tryGetById(trim($_POST['jobId']));
            $data['job'] = $job;

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
                    $data['proposal'] = $proposal;
                    $data['title'] = $proposal->getTitle();
                    $data['description'] = $proposal->getDescription();
                    $router->renderView(self::$basePath . 'jobs/id/proposal', $data, "Proposal received successfully!");
                    return;
                }
            }
        } else {
            // -------------------- $_GET -------------------- 
            if (isset($_GET['jobId'])) {
                $data['id'] = $_GET['jobId'];
                $job = JobModel::tryGetById($data['id']);

                if ($job == null) {
                    $errors = ['Job not found.'];
                } else {
                    $data['job'] = $job;
                    $data['pageTitle'] = "Job " . $job->getTitle();

                    // ----- withdraw proposal -----
                    if (isset($_GET['withdrawProposal']) && $_GET['withdrawProposal'] == 'true') {
                        $proposal = $job->getFreelancerProposal($user->getFreelancer()->getId());
                        if ($proposal->withdrawProposal()) {
                            $alert = 'Proposal withdrawn.';
                        } else {
                            $errors = ['Proposal not withdrawn. Something went wrong'];
                        }
                        $data['proposal'] = JobProposalModel::tryGetById($data['id']); // update proposal data
                    }
                    // ----- withdraw proposal -----

                    if ($job->hasFreelancerCreatedProposal($user->getFreelancer()->getId())) {
                        $proposal = $job->getFreelancerProposal($user->getFreelancer()->getId());
                        $data['proposal'] = $proposal;
                        $data['title'] = $proposal->getTitle();
                        $data['description'] = $proposal->getDescription();
                    }
                }
            } else {
                $errors = ['Job id not found.'];
            }
            // -------------------- $_GET -------------------- 
        }

        $router->renderView(self::$basePath . 'jobs/id/proposal', $data,  $alert, $errors);
    }

    public static function jobIdSubmitWork(Router $router)
    {
        DashboardFreelancerController::requireUserIsFreelancer($router);

        $data = [
            'pageTitle' => "Job Details",
            'jobId' => '',
            'description' => '',
            'attachmentError' => '',
            'descriptionError' => '',
        ];
        $errors = array();
        $alert = null;
        $user = UserModel::getCurrentUser();

        // Check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize post data (prevent XSS)
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data['description'] = trim($_POST['description']);
            $data['jobId'] = trim($_POST['jobId']);
            $data['job'] = JobModel::tryGetById($data['jobId']);
            $job = new JobModel($data['jobId']);
            $jobProposal = $job->getAcceptedProposal();

            // TODO: validate user

            // validate attachment
            if (empty($_FILES['attachment'])) {
                $data['attachmentError'] = 'Please select attachment.';
            } else {
                $fileUploader = new FileUploader($_FILES['attachment']);
                $data['attachmentError'] = $fileUploader->validateFile();
            }

            // validate description
            if (empty($data['description'])) {
                $data['descriptionError'] = 'Required.';
            } elseif (strlen($data['description']) < 5) {
                $data['descriptionError'] = 'Too short';
            } elseif (strlen($data['description']) > 1000) {
                $data['descriptionError'] = 'Too long';
            }

            // Check if all errors are empty
            if (
                empty($data['attachmentError'])
                && empty($data['descriptionError'])
            ) {

                // upload attachment and get the path
                $fileUploader = new FileUploader($_FILES['attachment']);
                $attachmentPath = $fileUploader->uploadFile("FreelancerWorkCompleteFile");

                $submission = $jobProposal->submitWorkDone($data['description'], $attachmentPath);

                if (!$submission) {
                    $errors = array('Something went wrong. Please try again.',);
                } else {

                    // send mail
                    $email = $job->getClient()->getUser()->getEmail();
                    $mailBody = "<p>Work for job id {$job->getId()} has been submitted. Visit your dashboard for more info.</p>";
                    Mailer::sendMail($email, 'Work submitted', $mailBody);

                    $data['description'] = '';
                    $router->renderView(self::$basePath . 'jobs/id/submit-work', $data, "Submission received successfully! Wait for the client to accept it.");
                    return;
                }
            }
        } else {
            // -------------------- $_GET -------------------- 
            if (isset($_GET['jobId'])) {
                $data['id'] = $_GET['jobId'];
                $job = JobModel::tryGetById($data['id']);

                if ($job == null || !$job->hasFreelancerCreatedProposal($user->getFreelancer()->getId())) {
                    $errors = ['Job not found.'];
                } else {
                    $data['job'] = $job;
                    $data['pageTitle'] = "Job work submission: " . $job->getTitle();
                }
            } else {
                $errors = ['Job id not found.'];
            }
            // -------------------- $_GET -------------------- 
        }

        $router->renderView(self::$basePath . 'jobs/id/submit-work', $data,  $alert, $errors);
    }

    public static function jobIdRateClient(Router $router)
    {
        DashboardFreelancerController::requireUserIsFreelancer($router);

        $data = [
            'pageTitle' => "Review and complete job",
            'jobId' => null,
            'comment' => '',
            'rating' => '',
            'ratingError' => '',
            'commentError' => '',
        ];
        $errors = array();
        $alert = null;
        $user = UserModel::getCurrentUser();


        // Check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize post data (prevent XSS)
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data['comment'] = trim($_POST['comment']);
            $data['rating'] = trim($_POST['rating']);
            $data['jobId'] = trim($_POST['jobId']);
            $job = new JobModel($data['jobId']);
            $data['job'] = $job;
            $data['proposal'] = $job->getAcceptedProposal();
            $jobProposal = $job->getAcceptedProposal();

            // TODO: validate user

            // validate comment
            if (empty($data['comment'])) {
                $data['commentError'] = 'Required.';
            } elseif (strlen($data['comment']) < 5) {
                $data['commentError'] = 'Too short';
            } elseif (strlen($data['comment']) > 255) {
                $data['commentError'] = 'Too long';
            }

            // validate rating
            if (empty($data['rating'])) {
                $data['ratingError'] = 'Required.';
            } elseif (!is_numeric($data['rating'])) {
                $data['ratingError'] = 'Must be a number.';
            } elseif ($data['rating'] < 1) {
                $data['ratingError'] = 'Too low.';
            } elseif ($data['rating'] > 5) {
                $data['ratingError'] = 'Too high.';
            }

            // Check if all errors are empty
            if (
                empty($data['ratingError'])
                && empty($data['commentError'])
            ) {

                $rating = JobRatingModel::create(
                    $job->getId(),
                    'client',
                    $data['comment'],
                    $data['rating']
                );

                if (!$rating) {
                    $errors = array('Something went wrong while rating. Please try again.',);
                } else {
                    $data['comment'] = '';
                    $router->renderView(self::$basePath . 'jobs/id/rate-client', $data, "client rated successfully!");
                    return;
                }
            }
        }
        // -------------------- $_GET -------------------- 
        else if (isset($_GET['jobId'])) {
            $data['id'] = $_GET['jobId'];
            $job = JobModel::tryGetById($data['id']);

            if ($job != null && $job->hasWorkSubmitted() && $job->hasFreelancerCreatedProposal($user->getFreelancer()->getId())) {
                $data['job'] = $job;
                $data['pageTitle'] = "Rate client: " . $job->getTitle();
            } else {
                $errors = ['Job id not found.'];
            }
        } else {
            $errors = ['Job id not found.'];
        }
        // -------------------- $_GET -------------------- 


        $router->renderView(self::$basePath . 'jobs/id/rate-client', $data, $alert, $errors);
    }

    public static function clientId(Router $router)
    {
        DashboardFreelancerController::requireUserIsFreelancer($router);

        $data = [
            'pageTitle' => "Client Details",

        ];
        $errors = array();

        // -------------------- $_GET -------------------- 
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
        // -------------------- $_GET -------------------- 

        $router->renderView(self::$basePath . 'clients/id', $data, null, $errors);
    }

    public static function profile(Router $router)
    {
        DashboardFreelancerController::requireUserIsFreelancer($router);
        $freelancer = UserModel::getCurrentUser()->getFreelancer();

        $data = [
            'pageTitle' => "Freelancer Profile",
            'freelancer' => $freelancer,
        ];


        $router->renderView(self::$basePath . 'profile/index', $data);
    }

    public static function profileEdit(Router $router)
    {
        DashboardFreelancerController::requireUserIsFreelancer($router);
        $freelancer = UserModel::getCurrentUser()->getFreelancer();


        $alert = null;
        $errors = array();


        $data = [
            'title' => $freelancer->getTitle(),
            'years_of_experience' => $freelancer->getYearsOfExperience(),
            'description' => $freelancer->getDescription(),
            'skills' => [],
            'titleError' => '',
            'years_of_experienceError' => '',
            'descriptionError' => '',
            'skillsError' => '',
        ];
        $data['allSkills'] =  SkillModel::getAll();
        $skillsIdsArray = [];
        foreach ($freelancer->getSkills() as $skill) {
            $skillsIdsArray[] = $skill->getId();
        }
        $data['skills'] = $skillsIdsArray;

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

            // Check if all errors are empty
            if (
                empty($data['titleError'])
                && empty($data['years_of_experienceError'])
                && empty($data['descriptionError'])
                && empty($data['skillsError'])
            ) {
                // Update from model function
                if ($freelancer->update(
                    $data['title'],
                    $data['description'],
                    $data['years_of_experience'],
                )) {
                    $alert = 'Profile updated successfully.';

                    // Update skills
                    $freelancer->addSkills($data['skills']);
                } else {
                    $errors = ['Something went wrong.'];
                }
            }
        }

        $router->renderView(self::$basePath . 'profile/edit', $data, $alert, $errors);
    }
}