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
                    <form action="/contacts" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" value="test@mail.ru" id="email" class="form-control" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" value="some subject" class="form-control" name="subject" id="subjec">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea style="white-space: normal;" class="form-control" name="message" id="message">
                                some message
                            </textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </main>
        <?php View::component('scripts'); ?>
    </body>
</html>