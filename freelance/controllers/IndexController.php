<?php

namespace app\controllers;

use app\Router;


class IndexController
{

    public static function index(Router $router)
    {
        $router->renderView('index');
    }

}