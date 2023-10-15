<?php

namespace App\Services\Posts;

use App\Models\Post;
use App\Models\Like;
use App\Application\Upload\Upload;
use App\Application\Alerts\Alert;
use App\Application\Router\Redirect;
use App\Application\Auth\Auth;

class PostsService implements PostsServiceInterface {

    public function store(array $image, ?string $description): void {
        if ($image = Upload::file($image)) {
            $post = new Post();

            $post->setImage($image);
            $post->setDescription($description);
            $post->setUser(Auth::id());

            $post->store();
        } else {
            Alert::storeMessage('Error loading image', Alert::DANGER);
        }
        
        Redirect::to('/profile');
    }
    
    public function like(int $post_id): void {
        
        $like = new Like();
        
        $like->setPost($post_id);
        $like->setUser(Auth::id());
        
        $like->store();
        
        Redirect::to('/');
    }

    public function destroy(int $id): void {
        
    }
}
