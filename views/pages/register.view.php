<?php

use App\Application\Views\View;
use App\Application\Config\Config;
?>

<!DOCTYPE html>
<html lang="<?= Config::get('app.lang') ?>">

    <head>
        <?php View::component('head'); ?>
        <title><?= $title ?></title>
    </head>

    <body>
        <?php View::component('nav'); ?>
        <main>
            <div class="container">
                <div class="row mt-3">
                    <h3>Login</h3>
                </div>
                <div class="row mt-3">
                    <form action="/register" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password"  class="form-control" name="password" id="password">
                        </div>
                        <div class="mb-3">
                            <label for="password_confirm" class="form-label">Password confirm</label>
                            <input type="password"  class="form-control" name="password_confirm" id="password_confirm">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </main>
        <?php View::component('scripts'); ?>
    </body>

</html>