<?php

namespace App\Controllers;

use App\Application\Request\Request;
use App\Application\Router\Redirect;
use App\Services\Posts\PostsService;
use App\Models\Like;
use App\Application\Auth\Auth;

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
        $post_id = $request->post('post_id');
        $user = Auth::id();
        
        $like = new Like();
        $like->setPost($post_id);
        $like->setUser($user);
        
        $like->store();
        
        Redirect::to('/');
    }
    
    public function unlike(Request $request) {
        $post_id = $request->post('post_id');
        $user_id = Auth::id();
        
        $like = new Like();
        $like = $like->raw('SELECT * FROM likes WHERE post_id = :post_id AND user_id = :user_id ', [
            ':post_id' => $post_id,
            ':user_id' => $user_id,
        ]);
        
        $like[0]->destroy($like[0]->id());
        
        Redirect::to('/');
    }
}
