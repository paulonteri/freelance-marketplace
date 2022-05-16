<?php

namespace app\controllers;

use app\Router;
use app\models\FreelancerModel;
use app\models\SkillModel;


class FreelancerProfilesController extends _BaseController
{

    private static string $basePath = 'freelancers/';

    public static function index(Router $router)
    {
        $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // get skills
        $skillIds = [];
        foreach (SkillModel::getAll() as $skill) {
            $skillIds[] = $skill->getId();
        }
        if (isset($_GET['skills'])) {
            $skillIds = $_GET['skills'];
        }

        // pagination
        $pageNumber = 1;
        if (isset($_GET['pageNumber']) && $_GET['pageNumber'] != "") {
            $pageNumber = $_GET['pageNumber'];
        }
        $limit = self::$totalRecordsPerPage;
        $offset = ($pageNumber - 1) * $limit;
        $previousPageNumber = $pageNumber - 1;
        $nextPageNumber = $pageNumber + 1;
        $recordsCount =  FreelancerModel::getAllCount($skillIds);
        $lastPageNumber = ceil($recordsCount / $limit);

        $data = [
            'pageTitle' => "All Freelancers",
            'freelancers' => FreelancerModel::getAll($limit, $offset, $skillIds),

            'allSkills' => SkillModel::getAll(),
            'skills' => $skillIds,
            'skillsError' => '',

            'pageNumber' => $pageNumber,
            'previousPageNumber' => $previousPageNumber,
            'nextPageNumber' => $nextPageNumber,
            'lastPageNumber' => $lastPageNumber,
            'recordsCount' => $recordsCount,
        ];
        $router->renderView(self::$basePath . 'index', $data);
    }

    public static function detail(Router $router)
    {
        FreelancerProfilesController::requireUserIsLoggedIn($router);


        $data = [
            'pageTitle' => "Freelancer Details",

        ];
        $errors = array();

        if (isset($_GET['freelancerId'])) {
            $data['id'] = $_GET['freelancerId'];
            $freelancer = FreelancerModel::tryGetById($data['id']);

            if ($freelancer != null) {
                $data['freelancer'] = $freelancer;
                $data['pageTitle'] = "Freelancer " . $freelancer->getTitle();
            }
        } else {
            $errors = ['Freelancer id not found.'];
        }

        $router->renderView(self::$basePath . 'id', $data, null, $errors);
    }
}