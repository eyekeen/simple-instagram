<?php



namespace App\Application\Router;


interface RedirectInterface {
    public static function to(string $route): void;
}
