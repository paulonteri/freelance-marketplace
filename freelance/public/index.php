<?php

use app\Router;
use app\Database;
use app\controllers\AuthController;
use app\controllers\IndexController;
use app\controllers\AdminController;
use app\controllers\DashboardMainController;
use app\controllers\DashboardClientController;
use app\controllers\DashboardProfilesController;
use app\controllers\FreelancerProfilesController;
use app\controllers\DashboardFreelancerController;

require_once __DIR__ . '/../vendor/autoload.php';

$database = new Database();
$router = new Router($database);

// IndexController
$router->get('', [IndexController::class, 'index']);
$router->get('/', [IndexController::class, 'index']);

// AuthController
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->get('/register', [AuthController::class, 'register']);
$router->post('/register', [AuthController::class, 'register']);
$router->get('/logout', [AuthController::class, 'logout']);


// FreelancerProfilesController
$router->get('/freelancers', [FreelancerProfilesController::class, 'index']);
$router->get('/freelancers/id', [FreelancerProfilesController::class, 'detail']);

// DashboardMainController
$router->get('/dashboard', [DashboardMainController::class, 'index']);

// DashboardFreelancerController
$router->get('/dashboard/freelancer', [DashboardFreelancerController::class, 'index']);
$router->get('/dashboard/freelancer/onboarding', [DashboardFreelancerController::class, 'onboarding']);
$router->post('/dashboard/freelancer/onboarding', [DashboardFreelancerController::class, 'onboarding']);
$router->get('/dashboard/freelancer/jobs/proposals', [DashboardFreelancerController::class, 'proposals']);
$router->get('/dashboard/freelancer/jobs', [DashboardFreelancerController::class, 'jobs']);
$router->get('/dashboard/freelancer/jobs/my-jobs', [DashboardFreelancerController::class, 'myJobs']);
$router->get('/dashboard/freelancer/jobs/id', [DashboardFreelancerController::class, 'jobId']);
$router->get('/dashboard/freelancer/jobs/id/proposal', [DashboardFreelancerController::class, 'jobIdProposal']);
$router->post('/dashboard/freelancer/jobs/id/proposal', [DashboardFreelancerController::class, 'jobIdProposal']);
$router->get('/dashboard/freelancer/jobs/id/submit-work', [DashboardFreelancerController::class, 'jobIdSubmitWork']);
$router->post('/dashboard/freelancer/jobs/id/submit-work', [DashboardFreelancerController::class, 'jobIdSubmitWork']);
$router->get('/dashboard/freelancer/jobs/id/rate-client', [DashboardFreelancerController::class, 'jobIdRateClient']);
$router->post('/dashboard/freelancer/jobs/id/rate-client', [DashboardFreelancerController::class, 'jobIdRateClient']);
$router->get('/dashboard/freelancer/clients/id', [DashboardFreelancerController::class, 'clientId']);

// DashboardClientController
$router->get('/dashboard/client', [DashboardClientController::class, 'index']);
$router->get('/dashboard/client/onboarding', [DashboardClientController::class, 'onboarding']);
$router->post('/dashboard/client/onboarding', [DashboardClientController::class, 'onboarding']);
$router->get('/dashboard/client/jobs', [DashboardClientController::class, 'jobs']);
$router->get('/dashboard/client/jobs/create', [DashboardClientController::class, 'jobCreate']);
$router->post('/dashboard/client/jobs/create', [DashboardClientController::class, 'jobCreate']);
$router->get('/dashboard/client/proposals/id', [DashboardClientController::class, 'proposalId']); // shows proposal details
$router->get('/dashboard/client/jobs/id', [DashboardClientController::class, 'jobId']); // shows job details
// $router->get('/dashboard/client/jobs/id/pay', [DashboardClientController::class, 'jobId']);
$router->get('/dashboard/client/jobs/id/proposals', [DashboardClientController::class, 'jobProposals']);
$router->get('/dashboard/client/jobs/id/review-and-complete', [DashboardClientController::class, 'jobReviewAndComplete']);
$router->post('/dashboard/client/jobs/id/review-and-complete', [DashboardClientController::class, 'jobReviewAndComplete']);

// DashboardProfilesController
$router->get('/dashboard/profile', [DashboardProfilesController::class, 'index']);
$router->get('/dashboard/profile/edit', [DashboardProfilesController::class, 'edit']);
$router->post('/dashboard/profile/edit', [DashboardProfilesController::class, 'edit']);

// AdminController
$router->get('/admin/proposals', [AdminController::class, 'proposals']);
$router->get('/admin/jobs', [AdminController::class, 'jobs']);
$router->get('/admin/skills/create', [AdminController::class, 'skillsCreate']);
$router->post('/admin/skills/create', [AdminController::class, 'skillsCreate']);


$router->resolve();
