<?php

use App\Application\Config\Config;
use App\Application\Views\View;
use App\Application\Alerts\Alert;
use App\Application\Alerts\Error;
use App\Application\Auth\Auth;
use App\Models\Post;

$user = Auth::user();

$posts = (new Post())->find('user_id', $user->id(), true);
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
            <h2><?= $pageTitle ?? "null" ?></h2>

            <div class="profile">
                <img src="/assets/img/avatar.jpeg" width="100" height="100" class="profile_avatar" alt="alt"/>

                <div class="profile_info">
                    <h5 class="profile_info--name">
                        <?= $user->getName(); ?>
                    </h5>
                    <p class="profile_info--email">
                        <?= $user->getEmail(); ?>
                    </p>
                    <p class="profile_info--registered">
                        Registered: <?= $user->createdAt(); ?>
                    </p>
                </div>
            </div>
            <hr />
            <h5>Publish post</h5>
            <form action="/post/publish" method="post" enctype="multipart/form-data">
                <?php if (Alert::danger()) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= Alert::danger(true) ?>
                    </div>
                <?php } ?>
                <div class="mb-3 mt-2">
                    <label for="image" class="form-label">Post image</label>
                    <input class="form-control" type="file" name="image" id="image">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Post description</label>
                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Publish</button>
            </form>
            <hr />
            <h5>My published posts</h5>
            <div class="row row-cols-1 mt-1 row-cols-md-3 g-4 mb-5 posts">
                <?php foreach ($posts as $post) { ?>
                    <div class="col">
                        <div class="card">
                            <img src="<?= $post->getImage() ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">
                                    <?= $post->getDescription() ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </main>
        <?php View::component('scripts'); ?>
    </body>
</html>


