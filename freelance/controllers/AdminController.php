<?php

namespace app\controllers;

use app\Router;



class AdminController
{
    private static string $basePath = 'admin/';

    public static function quotes(Router $router)
    {
        $router->renderView(self::$basePath . 'quotes');
    }

    public static function jobs(Router $router)
    {
        $router->renderView(self::$basePath . 'jobs');
    }
}