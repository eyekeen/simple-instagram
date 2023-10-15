<?php

namespace App\Controllers;

use App\Application\Request\Request;
use App\Services\Posts\PostsService;

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
        dd($request->post('id'));
    }
}
