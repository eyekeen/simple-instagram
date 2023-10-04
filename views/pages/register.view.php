<?php

use App\Application\Config\Config;
use App\Application\Views\View;

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
            <h2>Register</h2>
            <form method="post" action="/register">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="" class="form-control" name="email" id="email">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="mb-3">
                    <label for="password_confirm" class="form-label">Password confirm</label>
                    <input type="password" class="form-control" name="password_confirm" id="password_confirm">
                </div>
                <div class="mb-3">
                    <p>Have account? <a href="/login">Login</a></p>
                </div>
                <button type="submit" class="btn btn-success">Register</button>
            </form>
        </main>
        <?php View::component('scripts'); ?>
    </body>
</html>


