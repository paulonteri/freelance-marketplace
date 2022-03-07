<?php

namespace app\controllers;

use app\Router;


class FreelancerProfilesController
{

    private static string $basePath = 'freelancers/';

    public static function index(Router $router)
    {
        $router->renderView(self::$basePath . 'index');
    }

    public static function detail(Router $router)
    {
        $router->renderView(self::$basePath . 'id');
    }
}