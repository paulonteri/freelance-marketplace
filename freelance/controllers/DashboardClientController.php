<?php

namespace app\controllers;

use DateTime;
use app\Router;
use app\utils\ImageUploader;
use app\models\UserModel;
use app\models\ClientModel;
use app\models\JobModel;
use app\models\SkillModel;
use app\models\JobProposalModel;
use app\models\JobRatingModel;

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
            'type' => '',
            'imageError' => '',
            'titleError' => '',
            'descriptionError' => '',
            'typeError' => '',
            'national_idError' => '',
        ];

        // Check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize post data (prevent XSS)
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $user = UserModel::getCurrentUser();

            $data['title'] = trim($_POST['title']);
            $data['description'] = trim($_POST['description']);
            $data['type'] = trim($_POST['type']);

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

            // validate national_id
            if (empty($_FILES['national_id'])) {
                $data['national_idError'] = 'Please select image.';
            } else {
                $imageUploader = new ImageUploader($_FILES['national_id']);
                $data['national_idError'] = $imageUploader->validateImage();
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
                // && empty($data['imageError'])
                && empty($data['national_idError'])
            ) {

                // upload image and get the path
                $imageUploader = new ImageUploader($_FILES['image']);
                $imagePath = $imageUploader->uploadImage("ClientImage");

                // upload image and get the path
                $nationalIdImageUploader = new ImageUploader($_FILES['national_id']);
                $nationalIdPath = $nationalIdImageUploader->uploadImage("ClientIdImage");

                $isCreated = ClientModel::create(
                    $data['title'],
                    $data['description'],
                    $user->getId(),
                    $imagePath,
                    $data['type'],
                    $nationalIdPath
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

        // -------------------- $_GET -------------------- 
        if (isset($_GET['jobId'])) {
            $data['id'] = $_GET['jobId'];
            $job = JobModel::tryGetById($data['id']);

            if ($job == null || !$job->isJobCreatedByUser(UserModel::getCurrentUser()->getId())) {
                $errors = ['Job not found.'];
            } else {
                $data['job'] = $job;
                $data['pageTitle'] = "Job " . $job->getTitle();
            }
        } else {
            $errors = ['Job id not found.'];
        }
        // -------------------- $_GET -------------------- 

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
            } elseif (strlen($data['description']) > 5000) {
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
                $mageUploader = new ImageUploader($_FILES['image']);
                $imagePath = $mageUploader->uploadImage("ClientJobImage");

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

        $data = [
            'pageTitle' => "Job Proposals",
            'proposals' => ''
        ];

        if (isset($_GET['jobId'])) {
            $data['proposals'] = JobProposalModel::getProposalsByJob($_GET['jobId']);
        }
        $router->renderView(self::$basePath . 'jobs/id/proposals', $data);
    }


    public static function proposalId(Router $router)
    {
        DashboardClientController::requireUserIsClient($router);
        $data = [
            'pageTitle' => "Proposal Details",
        ];
        $errors = array();
        $alert = null;

        // -------------------- $_GET -------------------- 
        if (isset($_GET['proposalId'])) {
            $data['id'] = $_GET['proposalId'];
            $proposal = JobProposalModel::tryGetById($data['id']);

            if (
                $proposal == null ||
                !$proposal->getJob()->isJobCreatedByUser(UserModel::getCurrentUser()->getId())
            ) {
                $errors = ['Proposal not found.'];
            } else {
                // proposal found and belongs to user
                $data['proposal'] = $proposal;
                $data['pageTitle'] = "Job " . $proposal->getTitle();

                // ----- accept proposal -----
                if (isset($_GET['acceptProposal']) && $_GET['acceptProposal'] == 'true') {
                    if ($proposal->acceptProposal()) {
                        $alert = 'Proposal accepted.';
                    } else {
                        $errors = ['Proposal not accepted. Something went wrong'];
                    }
                    $data['proposal'] = JobProposalModel::tryGetById($data['id']); // update proposal data
                }
                // ----- accept proposal -----

                // ----- reject proposal -----
                else if (isset($_GET['rejectProposal']) && $_GET['rejectProposal'] == 'true') {
                    if ($proposal->rejectProposal()) {
                        $alert = 'Proposal rejected.';
                    } else {
                        $errors = ['Proposal not rejected. Something went wrong'];
                    }
                    $data['proposal'] = JobProposalModel::tryGetById($data['id']); // update proposal data
                }
                // ----- reject proposal -----
            }
        } else {
            $errors = ['Proposal id not found.'];
        }
        // -------------------- $_GET -------------------- 

        $router->renderView(self::$basePath . 'proposals/id', $data, $alert, $errors);
    }


    public static function jobReviewAndComplete(Router $router)
    {
        DashboardClientController::requireUserIsClient($router);
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
                    'freelancer',
                    $data['comment'],
                    $data['rating']
                );

                if (!$rating) {
                    $errors = array('Something went wrong while rating. Please try again.',);
                } else {

                    if (!$jobProposal->markAsCompletedSuccessfully()) {
                        $errors = array('Something went wrong while marking job as complete. Please try again.',);
                        $rating->delete();
                    }

                    $data['comment'] = '';
                    $data['proposal'] = $job->getAcceptedProposal();
                    $router->renderView(self::$basePath . 'jobs/id/review-and-complete', $data, "Job completed successfully!");
                    return;
                }
            }
        }
        // -------------------- $_GET -------------------- 
        else if (isset($_GET['jobId'])) {
            $data['id'] = $_GET['jobId'];
            $job = JobModel::tryGetById($data['id']);

            if ($job != null && $job->isJobCreatedByUser($user->getId())) {
                $data['job'] = $job;
                $data['pageTitle'] = "Review and complete job: " . $job->getTitle();
                if ($job->hasWorkSubmitted()) {

                    // ----- reject work -----
                    if (isset($_GET['rejectWork']) && $_GET['rejectWork'] == 'true') {
                        $proposal = $job->getAcceptedProposal();

                        if ($proposal->markAsCompletedUnsuccessfully()) {
                            $alert = 'Work rejected!';
                        } else {
                            $errors = ['Work not rejected. Something went wrong'];
                        }
                    }
                    // ----- reject work -----

                    $data['proposal'] = $job->getAcceptedProposal();
                } else {
                    $errors = ['Work not submitted.'];
                }
            }
        } else {
            $errors = ['Job id not found.'];
        }
        // -------------------- $_GET -------------------- 


        $router->renderView(self::$basePath . 'jobs/id/review-and-complete', $data, $alert, $errors);
    }

    public static function profile(Router $router)
    {
        DashboardClientController::requireUserIsClient($router);
        $client = UserModel::getCurrentUser()->getClient();

        $data = [
            'pageTitle' => "Client Profile",
            'client' => $client,
        ];


        $router->renderView(self::$basePath . 'profile/index', $data);
    }

    public static function profileEdit(Router $router)
    {
        DashboardClientController::requireUserIsClient($router);
        $client = UserModel::getCurrentUser()->getClient();

        $data = [
            'pageTitle' => "Edit Client Profile",
            'title' => $client->getTitle(),
            'description' => $client->getDescription(),
            'type' => $client->getType(),
            'imageError' => '',
            'titleError' => '',
            'descriptionError' => '',
            'typeError' => '',
            'national_idError' => '',
        ];
        $alert = null;
        $errors = array();

        // Check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize post data (prevent XSS)
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data['title'] = trim($_POST['title']);
            $data['description'] = trim($_POST['description']);
            $data['type'] = trim($_POST['type']);

            // validate title
            if (empty($data['title'])) {
                $data['titleError'] = 'Required.';
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

            ) {
                // Update from model function
                if ($client->update(
                    $data['title'],
                    $data['description'],
                    $data['type']
                )) {
                    $alert = 'Profile updated successfully.';
                } else {
                    $errors = ['Something went wrong.'];
                }
            }
        }


        $router->renderView(self::$basePath . 'profile/edit', $data, $alert, $errors);
    }
}