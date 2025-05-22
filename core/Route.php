<?php
namespace Core;

class Route
{
    public static $routes = [];

    public static function get($uri, $action)
    {
        self::$routes['GET'][$uri] = $action;
    }

    public static function dispatch($method, $uri)
    {
        $uri = parse_url($uri, PHP_URL_PATH);
        if (isset(self::$routes[$method][$uri])) {
            $action = explode('@', self::$routes[$method][$uri]);
            $controller = "App\\Controllers\\{$action[0]}";
            $method = $action[1];
            (new $controller)->$method();
        } else {
            http_response_code(404);
            require '../app/Views/404.php';
        }
    }
}

