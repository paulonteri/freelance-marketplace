<?php

namespace app\controllers;

use app\Router;


class MainController
{

    public static function  index(Router $router)
    {
        $router->renderView('index');
    }
}