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

date_default_timezone_set("Africa/Nairobi");

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
$router->get('/reset-password', [AuthController::class, 'requestResetPassword']);
$router->post('/reset-password', [AuthController::class, 'requestResetPassword']);
$router->get('/reset-password/reset', [AuthController::class, 'resetPassword']);
$router->post('/reset-password/reset', [AuthController::class, 'resetPassword']);


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
$router->get('/dashboard/freelancer/profile', [DashboardFreelancerController::class, 'profile']);
$router->get('/dashboard/freelancer/profile/edit', [DashboardFreelancerController::class, 'profileEdit']);
$router->post('/dashboard/freelancer/profile/edit', [DashboardFreelancerController::class, 'profileEdit']);

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
$router->get('/dashboard/client/jobs/id/pay', [DashboardClientController::class, 'jobPay']);
$router->post('/dashboard/client/jobs/id/pay', [DashboardClientController::class, 'jobPay']);
$router->get('/dashboard/client/jobs/id/confirm-payment', [DashboardClientController::class, 'jobConfirmPayment']);
$router->get('/dashboard/client/jobs/id/proposals', [DashboardClientController::class, 'jobProposals']);
$router->get('/dashboard/client/jobs/id/review-and-complete', [DashboardClientController::class, 'jobReviewAndComplete']);
$router->post('/dashboard/client/jobs/id/review-and-complete', [DashboardClientController::class, 'jobReviewAndComplete']);
$router->get('/dashboard/client/profile', [DashboardClientController::class, 'profile']);
$router->get('/dashboard/client/profile/edit', [DashboardClientController::class, 'profileEdit']);
$router->post('/dashboard/client/profile/edit', [DashboardClientController::class, 'profileEdit']);

// DashboardProfilesController
$router->get('/dashboard/profile', [DashboardProfilesController::class, 'index']);
$router->get('/dashboard/profile/edit', [DashboardProfilesController::class, 'edit']);
$router->post('/dashboard/profile/edit', [DashboardProfilesController::class, 'edit']);

// AdminController
$router->get('/admin', [AdminController::class, 'index']);
$router->get('/admin/freelancers', [AdminController::class, 'freelancers']);
$router->get('/admin/freelancers/id', [AdminController::class, 'freelancerId']);
$router->get('/admin/clients', [AdminController::class, 'clients']);
$router->get('/admin/clients/id', [AdminController::class, 'clientId']);
$router->get('/admin/jobs', [AdminController::class, 'jobs']);
$router->get('/admin/jobs/id', [AdminController::class, 'jobId']);
$router->get('/admin/jobs/proposals', [AdminController::class, 'jobProposals']);
$router->get('/admin/jobs/proposals/id', [AdminController::class, 'jobProposalId']);
$router->get('/admin/users', [AdminController::class, 'users']);
$router->get('/admin/users/id', [AdminController::class, 'userId']);
$router->post('/admin/users/id', [AdminController::class, 'userId']);
$router->get('/admin/skills', [AdminController::class, 'skills']);
$router->get('/admin/skills/create', [AdminController::class, 'skillsCreate']);
$router->post('/admin/skills/create', [AdminController::class, 'skillsCreate']);

$router->resolve();