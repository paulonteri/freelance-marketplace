<?php

namespace app\controllers;

use app\Router;
use app\models\UserModel;
use app\models\ClientModel;
use app\utils\ImageUploader;


class DashboardClientController extends _BaseController
{

    private static string $basePath = 'dashboard/client/';

    public static function index(Router $router)
    {
        DashboardClientController::requireUserIsClient($router);
        $router->renderView(self::$basePath . 'index');
    }

    public static function onboarding(Router $router)
    {
        DashboardClientController::requireUserIsLoggedIn($router);

        $user = UserModel::getCurrentUser();

        $data = [
            'title' => '',
            'description' => '',
            'titleError' => '',
            'imageError' => '',
            'descriptionError' => '',
        ];

        // Check for post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize post data (prevent XSS)
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data['title'] = trim($_POST['title']);
            $data['description'] = trim($_POST['description']);

            // validate title
            if (empty($data['title'])) {
                $data['titleError'] = 'Please enter a title.';
            }

            // validate image
            if (empty($_FILES['image'])) {
                $data['imageError'] = 'Please select image.';
            } else {
                $imageUploader = new ImageUploader($_FILES['image']);
                $data['imageError'] = $imageUploader->validateImage();
            }

            // validate description
            if (empty($data['description'])) {
                $data['description"Error'] = 'Please enter a description".';
            }

            // Check if all errors are empty
            if (empty($data['titleError']) && empty($data['imageError']) && empty($data['descriptionError'])  && empty($data['imageError'])) {

                // upload image and get the path
                $imageUploader = new ImageUploader($_FILES['image']);
                $imagePath = $imageUploader->uploadImage("ClientImage");

                $isCreated = ClientModel::create(
                    $data['title'],
                    $data['description'],
                    $user->getId(),
                    $imagePath
                );

                if (!$isCreated) {
                    $data['titleError'] = 'Something went wrong. Please try again.';
                } else {
                    header('location:/dashboard/client?alert="Client profile created successfully!"');
                }
            }
        }

        $router->renderView(self::$basePath . 'onboarding', $data);
    }

    public static function jobs(Router $router)
    {
        DashboardClientController::requireUserIsClient($router);
        $router->renderView(self::$basePath . 'jobs/index');
    }

    public static function jobId(Router $router)
    {
        DashboardClientController::requireUserIsClient($router);
        $router->renderView(self::$basePath . 'jobs/id/index');
    }

    public static function jobCreate(Router $router)
    {
        DashboardClientController::requireUserIsClient($router);
        $router->renderView(self::$basePath . 'jobs/create');
    }

    public static function jobQuotes(Router $router)
    {
        DashboardClientController::requireUserIsClient($router);
        $router->renderView(self::$basePath . 'jobs/id/quotes');
    }

    public static function jobReviewAndComplete(Router $router)
    {
        DashboardClientController::requireUserIsClient($router);
        $router->renderView(self::$basePath . 'jobs/id/review-and-complete');
    }
}