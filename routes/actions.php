<?php

use App\Application\Router\Route;

use App\Controllers\UserController;

Route::post('/register', UserController::class, 'register');
