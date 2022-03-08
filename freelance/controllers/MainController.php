<?php

namespace app\controllers;

use app\Router;


class MainController
{

    public static function index(Router $router)
    {
        $router->renderView('index');
    }

    public static function login(Router $router)
    {
        $router->renderView('login');
    }

    public static function register(Router $router)
    {
        $router->renderView('register');
    }
}