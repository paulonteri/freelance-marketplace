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

        $data = [
            'pageTitle' => "Job Details"
        ];
        $errors = array();

        if (isset($_GET['jobId'])) {
            $data['id'] = $_GET['jobId'];
            $job = JobModel::getJobById($data['id']);

            if ($job == null) {
                $errors = ['Job not found.'];
            } else {
                $data['job'] = $job;
                $data['pageTitle'] = "Job " . $job->getTitle();
            }
        } else {
            $errors = ['Job id not found.'];
        }

        $router->renderView(self::$basePath . 'id', $data, null, $errors);
    }
}