<?php

use App\Application\Auth\Auth;

?>

<nav class="navbar navbar-expand-lg bg-body-tertiary mt-2 mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">PHPGram</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <?php if (Auth::check()) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/profile">Profile</a>
                    </li>
                <?php } ?>
            </ul>
            <form class="d-flex" action="/logout" method="post">
                <?php if (Auth::check()) { ?>
                    <button type="submit" class="btn btn-outline-danger">Logout</button>
                <?php } else { ?>
                    <a href="/login" class="btn btn-outline-success" type="submit">Login</a>
                <?php } ?>
            </form>
        </div>
    </div>
</nav>