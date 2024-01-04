<?php

namespace App\Controllers;

use App\Application\Request\Request;
use App\Application\Router\Redirect;
use App\Services\Posts\PostsService;
use App\Models\Like;

class PostsController {
    
    private PostsService $service;


    public function __construct() {
        $this->service = new PostsService();
    }
    
    public function publish(Request $request) {

        // TODO: validation
        
        $this->service->store($request->file('image'), $request->post('description'));
    }
    
    public function like(Request $request) {
        $post_id = $request->post('post');
        $user = $request->post('user');
        
        $like = new Like();
        $like->setPost($post_id);
        $like->setUser($user);
        
        Redirect::to('/');
    }
    
    public function unlike(Request $request) {
        $post_id = $request->post('post');
        $user = $request->post('user');
        
        $like = new Like();
        $like->setPost($post_id);
        $like->setUser($user);
        
        Redirect::to('/');
    }
}
