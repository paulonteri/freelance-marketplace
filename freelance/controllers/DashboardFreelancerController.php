<?php

namespace app\controllers;

use app\Router;
use app\models\UserModel;
use app\models\FreelancerModel;


class DashboardFreelancerController extends _BaseController
{

    private static string $basePath = 'dashboard/freelancer/';

    public static function index(Router $router)
    {
        DashboardFreelancerController::requireUserIsFreelancer($router);
        $router->renderView(self::$basePath . 'index');
    }

    public static function onboarding(Router $router)
    {
        DashboardFreelancerController::requireUserIsLoggedIn($router);

        $user = UserModel::getCurrentUser();

        $data = [
            'title' => '',
            'years_of_experience' => '',
            'description' => '',
            'skills' => [],
            'titleError' => '',
            'years_of_experienceError' => '',
            'descriptionError' => '',
            'skillsError' => '',
        ];

        // Check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize post data (prevent XSS)
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'title' => trim($_POST['title']),
                'years_of_experience' => trim($_POST['years_of_experience']),
                'description' => trim($_POST['description']),
                // 'skills' => $_POST['skills'],
            ];

            // validate title
            if (empty($data['title'])) {
                $data['titleError'] = 'Please enter a title.';
            }

            // validate years_of_experience
            if (empty($data['years_of_experience'])) {
                $data['years_of_experienceError'] = 'Please enter a years_of_experience.';
            }

            // validate description
            if (empty($data['description'])) {
                $data['description"Error'] = 'Please enter a description".';
            }

            // todo: validate skills

            // Check if all errors are empty
            if (empty($data['titleError']) && empty($data['years_of_experienceError']) && empty($data['descriptionError']) && empty($data['skillsError'])) {
                // $isLoggedIn = $user->login($data['title'], $data['years_of_experience']);
                $isCreated = FreelancerModel::create(
                    $data['title'],
                    $data['description'],
                    $user->getId(),
                    $data['years_of_experience']  / 1,
                );

                if (!$isCreated) {
                    $data['titleError'] = 'Something went wrong. Please try again.';
                } else {
                    header('location:/dashboard/freelancer?alert="Freelancer profile created successfully!"');
                }
            }
        }


        $router->renderView(self::$basePath . 'onboarding', $data);
    }

    public static function quotes(Router $router)
    {
        DashboardFreelancerController::requireUserIsFreelancer($router);
        $router->renderView(self::$basePath . 'quotes');
    }

    public static function jobs(Router $router)
    {
        DashboardFreelancerController::requireUserIsFreelancer($router);
        $router->renderView(self::$basePath . 'jobs/index');
    }

    public static function jobId(Router $router)
    {
        DashboardFreelancerController::requireUserIsFreelancer($router);
        $router->renderView(self::$basePath . 'jobs/id');
    }
}