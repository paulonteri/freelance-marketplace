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


        $data = [
            'pageTitle' => "Freelancer Details",

        ];
        $errors = array();

        if (isset($_GET['freelancerId'])) {
            $data['id'] = $_GET['freelancerId'];
            $freelancer = FreelancerModel::tryGetById($data['id']);

            if ($freelancer != null) {
                $data['freelancer'] = $freelancer;
                $data['pageTitle'] = "Freelancer " . $freelancer->getTitle();
            }
        } else {
            $errors = ['Freelancer id not found.'];
        }

        $router->renderView(self::$basePath . 'id', $data, null, $errors);
    }
}