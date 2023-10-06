<?php

namespace App\Application\Alerts;

class Alert implements AlertInterface {

    // setcookie transform dot(.) to _
    public static function storeMessage(string $message, string $type = 'error'): void {
        setcookie("message.$type", $message);
    }

    public static function success(bool $clear = false): ?string {
        $message = $_COOKIE['message_success'] ?? null;

        if ($clear) {
            unset($_COOKIE['message_success']);
            setcookie("message.success", null);
        }



        return $message;
    }

    public static function danger(bool $clear = false): ?string {
        $message = $_COOKIE['message_danger'] ?? null;

        if ($clear) {
            unset($_COOKIE['message_danger']);
            setcookie("message.danger", null);
        }

        return $message;
    }
}
