<?php

namespace app;

class Router
{

    public array $getRoutes = [];
    public array $postRoutes = [];

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
        $url = $_SERVER['PATH_INFO'] ?? '/';

        echo "resolve route! -----------------------------------------";
        echo $url;

        if ($method === 'get') {
            $fn = $this->getRoutes[$url] ?? null;
        } else {
            $fn = $this->postRoutes[$url] ?? null;
        }
        if (!$fn) {
            echo 'Page not found';
            exit;
        }
        echo call_user_func($fn, $this);
    }

    public function renderView($view, $params = [])
    {

        //        foreach ($params as $key => $value) {
        //            $$key = $value;
        //        }
        //        ob_start();
        include __DIR__ . "/views/$view.php";
        //        $content = ob_get_clean();
        //        include __DIR__."/views/_layout.php";
    }
}