<?php

namespace app\controllers;

use app\Router;


class AuthController
{
    public static function login(Router $router)
    {
        $router->renderView('login');
    }

    public static function register(Router $router)
    {
        $router->renderView('register');
    }
}