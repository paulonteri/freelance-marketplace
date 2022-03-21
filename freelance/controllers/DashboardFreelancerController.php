<?php

namespace app\controllers;

use app\Router;


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
        $router->renderView(self::$basePath . 'onboarding');
    }

    public static function quotes(Router $router)
    {
        DashboardFreelancerController::requireUserIsFreelancer($router);
        $router->renderView(self::$basePath . 'quotes');
    }

    public static function jobs(Router $router)
    {
        DashboardFreelancerController::requireUserIsFreelancer($router);
        $router->renderView(self::$basePath . 'jobs/index');
    }

    public static function jobId(Router $router)
    {
        DashboardFreelancerController::requireUserIsFreelancer($router);
        $router->renderView(self::$basePath . 'jobs/id');
    }
}