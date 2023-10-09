<?php

use App\Application\Config\Config;
use App\Application\Views\View;
use App\Application\Alerts\Alert;
use App\Application\Alerts\Error;
use App\Application\Auth\Auth;

$user = Auth::user();
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
            <h5>Public post</h5>
            <form action="action">
                <div class="mb-3 mt-2">
                    <label for="formFile" class="form-label">Post image</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Post description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Public</button>
            </form>
            <hr />
            <h5>My published posts</h5>
            <div class="row row-cols-1 mt-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card">
                        <img src="/assets/img/avatar.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="/assets/img/avatar.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="/assets/img/avatar.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="/assets/img/avatar.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php View::component('scripts'); ?>
    </body>
</html>


