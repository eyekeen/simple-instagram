<?php

namespace App\Application\Auth;

use App\Application\Database\Model;

interface AuthInterface {
    
    public static function init(): void;
    
    public static function check(): bool;

    public static function user(): Model;
    
    public static function getTokenColumn(): string;
    
}
