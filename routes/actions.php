<?php

use App\Application\Router\Route;
use App\Controllers\ContactsControlle;
use App\Controllers\UserController;



Route::post('/contacts', ContactsControlle::class, 'submit');
Route::post('/register', UserController::class, 'register');
Route::post('/login', UserController::class, 'login');
Route::post('/logout', UserController::class, 'logout');
