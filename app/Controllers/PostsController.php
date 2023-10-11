<?php

namespace App\Controllers;

use App\Application\Request\Request;
use App\Application\Upload\Upload;
use App\Application\Alerts\Alert;
use App\Application\Router\Redirect;
use App\Models\Post;
use App\Application\Auth\Auth;

class PostsController {

    public function publish(Request $request) {
        
        // TODO: validation
        
        dd();
        
        if ($image = Upload::file($request->file('image'))) {
            $post = new Post();
            
            $post->setImage($image);
            $post->setDescription($request->post('description'));
            $post->setUser(Auth::user()->getId());
            // Don't work
            dd($post->store());
            
        } else {
            Alert::storeMessage('Error loading image', Alert::DANGER);
            Redirect::to('/profile');
        }
    }
}
