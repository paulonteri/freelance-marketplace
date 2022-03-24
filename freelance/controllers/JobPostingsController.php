<?php

namespace app\controllers;

use app\Router;
use app\models\JobModel;


class JobPostingsController extends _BaseController
{

    private static string $basePath = 'jobs/';

    public static function index(Router $router)
    {
        $data = [
            'jobs' => JobModel::getAll()
        ];
        $router->renderView(self::$basePath . 'index', $data);
    }

    public static function detail(Router $router)
    {
        JobPostingsController::requireUserIsLoggedIn($router);
        $router->renderView(self::$basePath . 'id');
    }
}