<?php

namespace app\controllers;

use app\Router;
use app\models\FreelancerModel;


class FreelancerProfilesController extends _BaseController
{

    private static string $basePath = 'freelancers/';

    public static function index(Router $router)
    {
        $data = [
            'freelancers' => FreelancerModel::getAll()
        ];
        $router->renderView(self::$basePath . 'index', $data);
    }

    public static function detail(Router $router)
    {
        FreelancerProfilesController::requireUserIsLoggedIn($router);
        $router->renderView(self::$basePath . 'id');
    }
}