<?php

namespace app\controllers;

use app\Router;
use app\models\SkillModel;


class AdminController extends _BaseController
{
    private static string $basePath = 'admin/';

    public static function quotes(Router $router)
    {
        AdminController::requireUserIsAdmin($router);
        $router->renderView(self::$basePath . 'quotes');
    }

    public static function jobs(Router $router)
    {
        AdminController::requireUserIsAdmin($router);
        $router->renderView(self::$basePath . 'jobs');
    }

    public static function skillsCreate(Router $router)
    {
        AdminController::requireUserIsAdmin($router);

        $data = [
            'name' => '',
            'nameError' => '',
        ];

        // Check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize post data (prevent XSS)
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data['name'] = trim($_POST['name']);

            // validate name
            if (empty($data['name'])) {
                $data['nameError'] = 'Please enter a name.';
            }

            // Check if all errors are empty
            if (empty($data['nameError'])) {
                $isCreated = SkillModel::create(
                    $data['name'],
                );

                if (!$isCreated) {
                    $data['nameError'] = 'Something went wrong. Please try again.';
                } else {
                    $router->renderView(self::$basePath . 'skills/create', $data, "Skill added");
                }
            }
        } else {
            $router->renderView(self::$basePath . 'skills/create', $data);
        }
    }
}