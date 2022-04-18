<?php


use app\Router;
use app\Database;
use app\controllers\IndexController;
use app\controllers\AuthController;
use app\controllers\FreelancerProfilesController;
use app\controllers\DashboardMainController;
use app\controllers\DashboardFreelancerController;
use app\controllers\DashboardClientController;
use app\controllers\AdminController;

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

// AdminController
$router->get('/admin/proposals', [AdminController::class, 'proposals']);
$router->get('/admin/jobs', [AdminController::class, 'jobs']);
$router->get('/admin/skills/create', [AdminController::class, 'skillsCreate']);
$router->post('/admin/skills/create', [AdminController::class, 'skillsCreate']);


$router->resolve();