<?php

namespace App\Application\Upload;

interface UploadInterface {
    public static function file(array $file, string $to = 'files'): bool|string;
}
