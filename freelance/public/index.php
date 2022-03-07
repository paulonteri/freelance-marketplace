<?php

use app\Router;
use app\controllers\MainController;

require_once __DIR__.'/../vendor/autoload.php';

$router = new Router();

$router->get('/', [MainController::class, 'index']);
$router->get('/hello', [MainController::class, 'index']);

$router->resolve();