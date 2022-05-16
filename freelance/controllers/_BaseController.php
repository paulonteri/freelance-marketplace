<?php

namespace app\controllers;

use app\models\UserModel;
use app\Router;

abstract class _BaseController
{
    protected static int $totalRecordsPerPage = 2;

    public static function requireUserIsLoggedIn(Router $router)
    {
        if (!$router->isUserLoggedIn) {
            header('location:/login?errorAlert=Please log in first!');
        }
    }

    public static function requireUserIsFreelancer(Router $router)
    {
        _BaseController::requireUserIsLoggedIn($router);

        $user = UserModel::getCurrentUser();
        if (!$user->isFreelancer()) {
            header('location:/dashboard/freelancer/onboarding?errorAlert=You are not a freelancer!');
        }
    }

    public static function requireUserIsClient(Router $router)
    {
        _BaseController::requireUserIsLoggedIn($router);

        $user = UserModel::getCurrentUser();
        if (!$user->isClient()) {
            header('location:/dashboard/client/onboarding?errorAlert=You are not a client!');
        }
    }

    public static function requireUserIsAdmin(Router $router)
    {
        _BaseController::requireUserIsLoggedIn($router);

        $user = UserModel::getCurrentUser();
        if (!$user->getIsAdmin()) {
            header('location:/dashboard?errorAlert=You are not an admin!');
        }
    }
}