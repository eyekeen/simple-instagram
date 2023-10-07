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
            <svg class="bd-placeholder-img rounded float-start" width="200" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 200x200" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Profile image</title>
                <rect width="100%" height="100%" fill="#868e96"></rect>
                <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Profile image</text>
            </svg>
            
            <div class="profile_info">
                <h5 class="profile_info--name">
                    <?= $user->getName(); ?>
                </h5>
                <h5 class="profile_info--name">
                    <?= $user->getEmail(); ?>
                </h5>
            </div>

        </main>
        <?php View::component('scripts'); ?>
    </body>
</html>


