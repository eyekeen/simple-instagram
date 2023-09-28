<?php

namespace App\Application\Router;


class Route implements RouteInterface // class Route need for accumulate our routes
{
    private static array $routes = [];

    public static function page(string $uri, string $controller, string $method, string|array $middleware = []): void
    {
        self::$routes[] = [
            'uri' => $uri,
            'type' => 'page',
            'controller' => $controller,
            'method' => $method,
            'middleware' => $middleware,
        ];
    }

    public static function post(string $uri, string $controller, string $method): void
    {
        self::$routes[] = [
            'uri' => $uri,
            'type' => 'post',
            'controller' => $controller,
            'method' => $method,
        ];
    }


    public static function list(): array
    {
        return self::$routes;
    }
}
