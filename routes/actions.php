<?php

use App\Application\Router\Route;

use App\Controllers\UserController;
use App\Controllers\PostsController;

Route::post('/register', UserController::class, 'register');
Route::post('/login', UserController::class, 'login');
Route::post('/logout', UserController::class, 'logout');
Route::post('/post/publish', PostsController::class, 'publish');
