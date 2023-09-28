<?php

namespace App\Application\Router;

use App\Application\Request\Request;

trait RouterHelper {

    protected static function filter(array $routes, string $type): array {
        return array_filter($routes, function ($route) use ($type) {
            return $route['type'] === $type;
        });
    }

    protected static function controller(array $route) {
        $controller = new $route['controller']();
        $method = $route['method'];
        $request = new Request($_POST, $_GET, $_FILES);
        $controller->$method($request);
    }
}
