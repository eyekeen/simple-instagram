<?php

namespace App\Application\Config;

interface ConfigInterface
{
    public static function get(string $key): mixed;
 
    public static function init(): void;
}
