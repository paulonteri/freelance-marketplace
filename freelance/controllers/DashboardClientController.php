<?php

namespace app\controllers;

use app\Router;


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
        $router->renderView(self::$basePath . 'onboarding');
    }

    public static function jobs(Router $router)
    {
        DashboardClientController::requireUserIsClient($router);
        $router->renderView(self::$basePath . 'jobs/index');
    }

    public static function jobId(Router $router)
    {
        DashboardClientController::requireUserIsClient($router);
        $router->renderView(self::$basePath . 'jobs/id/index');
    }

    public static function jobCreate(Router $router)
    {
        DashboardClientController::requireUserIsClient($router);
        $router->renderView(self::$basePath . 'jobs/create');
    }

    public static function jobQuotes(Router $router)
    {
        DashboardClientController::requireUserIsClient($router);
        $router->renderView(self::$basePath . 'jobs/id/quotes');
    }

    public static function jobReviewAndComplete(Router $router)
    {
        DashboardClientController::requireUserIsClient($router);
        $router->renderView(self::$basePath . 'jobs/id/review-and-complete');
    }
}