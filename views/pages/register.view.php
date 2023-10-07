<?php

use App\Application\Config\Config;
use App\Application\Views\View;
use App\Application\Alerts\Error;
use App\Application\Alerts\Alert;
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
                <?php if (Alert::danger()) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= Alert::danger(true) ?>
                    </div>
                <?php } ?>

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="" class="form-control <?= Error::has('email') ? 'is-invalid' : '' ?>" name="email" id="email">
                    <div class="invalid-feedback">
                        <?= Error::get('email'); ?>
                    </div>

                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control <?= Error::has('name') ? 'is-invalid' : '' ?>" name="name" id="name">
                    <div class="invalid-feedback">
                        <?= Error::get('name'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control <?= Error::has('password') ? 'is-invalid' : '' ?>" name="password" id="password">
                    <div class="invalid-feedback">
                        <?= Error::get('password'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password_confirm" class="form-label">Password confirm</label>
                    <input type="password" class="form-control <?= Error::has('password') ? 'is-invalid' : '' ?>" name="password_confirm" id="password_confirm">
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


