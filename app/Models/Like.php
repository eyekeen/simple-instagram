<?php

namespace App\Models;

use App\Application\Database\Model;
use App\Application\Auth\Auth;

class Like extends Model {
    protected string $table = 'likes';
    protected array $fields = ['post_id', 'user_id'];
    protected int $post_id;
    protected int $user_id;

    public function setPost(int $post_id): void {
        $this->post_id = $post_id;
    }

    public function setUser(int $user): void {
        $this->user_id = $user;
    }
    
    public function getPost(): int{
        return $this->post_id;
    }

    public function getUser(): int{
        return $this->user_id;
    }
    
    public function getLikedPosts() {
        $user_likes = $this->find('user_id', Auth::id(), true);
        $likedPosts = [];
        
        foreach ($user_likes as $value) {
            $likedPosts[] = $value->post_id;
        }
        
        return $likedPosts;
    }
}
