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
                <h2>Page: <span class="badge bg-secondary">About</span></h2>
            </div>
        </div>
    </main>
    <?php View::component('scripts'); ?>
</body>

</html>