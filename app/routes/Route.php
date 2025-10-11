<?php

namespace App\routes;

use App\http\Controllers\Controller;
use App\http\Controllers\User;

class Route
{
    static function start(): void
    {
        $deep = 1;
        session_start();

        // контроллер и действие по умолчанию
        $controller_name = 'table';
        $action_name = 'show';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if (isset($routes[$deep]) && $routes[$deep]!="") {
            $controller_name = $routes[$deep];
        }

        if (isset($routes[$deep + 1]) && $routes[$deep + 1]!="") {
            $action_name = $routes[$deep + 1];
        }

        if (isset($routes[$deep + 2])) {
            $param = array_slice($routes, $deep + 2);
        }

        $controller_path = "app/http/Controllers/$controller_name.php";

        if (file_exists($controller_path)) {
            include_once $controller_path;
        } else {
            Route::ErrorPage404();
        }

        $controller_name = "App\\Http\\Controllers\\" . $controller_name;
        $controller = new $controller_name;

        if (method_exists($controller, $action_name)) {
            if (isset($param)) {
                $controller->$action_name($param);
            } else {
                $controller->$action_name();
            }
        } else {
            Route::ErrorPage404();
        }
    }

    static function ErrorPage404(): void
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404.html');
    }
}