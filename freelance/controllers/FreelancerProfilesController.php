<?php

namespace app\controllers;

use app\Router;


class FreelancerProfilesController extends _BaseController
{

    private static string $basePath = 'freelancers/';

    public static function index(Router $router)
    {
        $router->renderView(self::$basePath . 'index');
    }

    public static function detail(Router $router)
    {
        FreelancerProfilesController::requireUserIsLoggedIn($router);
        $router->renderView(self::$basePath . 'id');
    }
}