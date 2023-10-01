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
            <form>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="mb-3">
                    <p>No account? <a href="/register">Register</a></p>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </main>
        <?php View::component('scripts'); ?>
    </body>
</html>

