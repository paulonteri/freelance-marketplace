<?php

namespace app;

use app\models\AuthModel;

class Router
{

    public array $getRoutes = [];
    public array $postRoutes = [];
    public ?Database $database = null;
    public bool $isUserLoggedIn = false;

    public function __construct(Database $database)
    {
        $this->database = $database;

        session_start();

        // check if logged in
        $authModel = new AuthModel();
        $this->isUserLoggedIn = $authModel->isUserLoggedIn();
    }

    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }


    public function resolve()
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        // the homepage has an empty PATH_INFO

        // get request path ----------------------------------------
        $url = $_SERVER['REQUEST_URI'] ?? '/';
        if (strpos($url, '?') !== false) {
            $url = substr($url, 0, strpos($url, '?'));
        }
        $url = rtrim($url, '/'); // remove trailing slash

        // ----------------------------------------
        if ($method === 'get') {
            $fn = $this->getRoutes[$url] ?? null;
        } else if ($method === 'post') {
            $fn = $this->postRoutes[$url] ?? null;
        }
        // 404
        if (!$fn) {
            echo 'Page not found';
            exit;
        }

        // call method on the controller and pass the Router object ($this) ----------------------
        echo call_user_func($fn, $this);
    }

    public function renderView($view, $params = [], $alert = null, $errors = [])
    {

        $isUserLoggedIn = $this->isUserLoggedIn;

        // check for alerts
        if ($alert == null && isset($_GET['alert'])) {
            $alert = $_GET['alert'];
        }
        if (isset($_GET['errorAlert'])) {
            array_push($errors, $_GET['errorAlert']);
        }

        // save view's output buffer in the $content variable ----------------------------------------
        ob_start();
        include __DIR__ . "/views/$view.php";

        $content = ob_get_clean();

        // render the layout (the view is also passed through the $content variable)-------------------------
        include __DIR__ . "/views/_layout.php";
    }
}