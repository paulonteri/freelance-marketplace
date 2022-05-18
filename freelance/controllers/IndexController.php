<?php

namespace app\controllers;

use app\Router;


class IndexController extends _BaseController
{

    public static function index(Router $router)
    {
        $router->renderView('index');
    }
}