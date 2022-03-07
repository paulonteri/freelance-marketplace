<?php

namespace app\controllers;

use app\Router;


class DashboardMainController
{
    private static string $basePath = 'dashboard/';

    public static function index(Router $router)
    {
        $router->renderView(self::$basePath . 'index');
    }
}