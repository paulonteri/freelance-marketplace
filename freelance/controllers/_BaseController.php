<?php

namespace app\controllers;

use app\models\UserModel;
use app\Router;

abstract class _BaseController
{

    public static function requireUserIsLoggedIn(Router $router){
        if (!$router->isUserLoggedIn){
            header('location:/login?alert="Please log in first!"');
        }
    }

    public static function requireUserIsFreelancer(Router $router){
        _BaseController::requireUserIsLoggedIn($router);

        $user = UserModel::getCurrentUser();
        if (!$user->isFreelancer()){
            header('location:/dashboard/freelancer/onboarding?alert="You are not a freelancer!"');
        }

    }

    public static function requireUserIsClient(Router $router){
        _BaseController::requireUserIsLoggedIn($router);

        $user = UserModel::getCurrentUser();
        if (!$user->isClient()){
            header('location:/dashboard/client/onboarding?alert="You are not a client!"');
        }

    }

    // todo: require is admin
}