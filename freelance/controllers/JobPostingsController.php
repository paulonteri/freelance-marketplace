<?php

namespace app\controllers;

use app\Router;


class JobPostingsController
{

    private static string $basePath = 'jobs/';

    public static function index(Router $router)
    {
        $router->renderView(self::$basePath . 'index');
    }

    public static function detail(Router $router)
    {
        $router->renderView(self::$basePath . 'id');
    }
}