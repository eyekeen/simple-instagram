<?php

namespace App\Controllers;

use App\Application\Request\Request;
use App\Application\Upload\Upload;

class PostsController {
    public function publish(Request $request) {
        if($image = Upload::file($request->file('image'))){
            dd($image);
        } else {
            dd("Error");
        }
    }
}
