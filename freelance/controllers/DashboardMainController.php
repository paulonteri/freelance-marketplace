<?php

namespace app\controllers;

use app\Router;


class DashboardMainController extends _BaseController
{
    private static string $basePath = 'dashboard/';

    public static function index(Router $router)
    {
        DashboardMainController::requireUserIsLoggedIn($router);
        $router->renderView(self::$basePath . 'index');
    }
}