<?php


namespace App\Services\Posts;


interface PostsServiceInterface {
    public function store(array $image, ?string $description): void;
    
    public function destroy(int $id): void;
}
