<?php

namespace app\controllers;

use app\Router;


class DashboardClientController
{

    private static string $basePath = 'dashboard/client/';

    public static function index(Router $router)
    {
        $router->renderView(self::$basePath . 'index');
    }

    public static function onboarding(Router $router)
    {
        $router->renderView(self::$basePath . 'onboarding');
    }

    public static function jobs(Router $router)
    {
        $router->renderView(self::$basePath . 'jobs/index');
    }

    public static function jobId(Router $router)
    {
        $router->renderView(self::$basePath . 'jobs/id/index');
    }

    public static function jobCreate(Router $router)
    {
        $router->renderView(self::$basePath . 'jobs/create');
    }

    public static function jobQuotes(Router $router)
    {
        $router->renderView(self::$basePath . 'jobs/id/quotes');
    }
}