<?php

namespace App\Application\Alerts;

class Alert implements AlertInterface {
    
    // TOOD: use enum https://www.php.net/manual/en/language.enumerations.php
    public const DANGER = 'danger';
    public const SUCCESS = 'success';
    
    // setcookie transform dot(.) to _
    public static function storeMessage(string $message, string $type = 'danger'): void {
        setcookie("message.$type", $message);
    }

    public static function success(bool $clear = false): ?string {
        $message = $_COOKIE['message_' . self::SUCCESS] ?? null;

        if ($clear) {
            unset($_COOKIE['message_' . self::SUCCESS]);
            setcookie('message.' . self::SUCCESS, null);
        }
        return $message;
    }

    public static function danger(bool $clear = false): ?string {
        $message = $_COOKIE['message_danger'] ?? null;

        if ($clear) {
            unset($_COOKIE['message_' . self::DANGER]);
            setcookie('message.' . self::DANGER, null);
        }
        return $message;
    }
}
