<?php

namespace App\Application\Alerts;

class Error implements ErrorInterface {

    public static function store(array $errors): void {
        setcookie('error', json_encode($errors, JSON_UNESCAPED_UNICODE));
    }

    public static function has(string $key): bool {
        
    }

    public static function list(): array {
        
    }
}
