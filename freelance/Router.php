<?php

namespace app;

use app\utils\Logger;
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


    /**
     * Called at public/index.php to resolve the current request
     *
     */
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

        // log request ---------------------------------------------
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestIp = $this->getUserIP();
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $requestPath = $_SERVER['REQUEST_URI'];
        $requestBody = file_get_contents('php://input');
        $user = $this->isUserLoggedIn ? $_SESSION['user_id'] : 'guest';

        Logger::log("Request: [$requestMethod $requestPath] from ip [$requestIp] and user [$user] with user agent [$userAgent] and body [$requestBody]");

        // find handler for the request path and method -------------------------------------
        if ($method === 'get') {
            $fn = $this->getRoutes[$url] ?? null;
        } else if ($method === 'post') {
            $fn = $this->postRoutes[$url] ?? null;
        }


        if (!$fn) {
            // 404 (could not find handler for the request path and method) ----------------------
            http_response_code(404);
            echo 'Page not found';
            exit;
        } else {
            // call method on the controller and pass the Router object ($this) ----------------------
            echo call_user_func($fn, $this);
        }
    }

    /**
     * Called in the controller (called by the method in the controller that was called by the Router::resolve() method)
     *
     */
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

    public function getUserIP()
    {
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }

        return $ip;
    }
}