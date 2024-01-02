<?php

use App\Application\Config\Config;
use App\Application\Views\View;
use App\Models\Post;
use App\Models\Like;
use App\Application\Auth\Auth;


$posts = (new Post)->all();

$likes = (new Like)->find('user_id', Auth::id(), true);
?>

<!DOCTYPE html>
<html lang="<?= Config::get('app.lang') ?>">
    <head>
        <?php View::component('head'); ?>
        <title><?= $title ?? "null" ?></title>
    </head>
    <body>
        <main class="main">
            <?php View::component('nav'); ?>

            <?php
            foreach ($posts as $post) {
                $active = false;
                foreach ($likes as $like) {
                    if ($post->getUser() === $like->getUser() && $post->id() === $like->getPost()) {
                        $active = true;
                        break;
                    }
                }
                ?>
                <div class="card mb-2">
                    <img src="<?= $post->getImage() ?>" class="card-img-top">
                    <div class="card-body">
                        <p class="card-text"><?= $post->getDescription() ?></p>
                    </div>
                    <div class="card-body">
                        <a href="#" class="card-link like <?= $active ? "active" : "" ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                            </svg>
                            <span class="likes">
                                100
                            </span>
                        </a>
                    </div>
                </div>

            <?php } ?>

        </main>
        <?php View::component('scripts'); ?>
    </body>
</html>

