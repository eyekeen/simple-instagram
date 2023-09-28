<?php

use App\Application\Router\Route;
use App\Controllers\PagesController;
use App\Middleware\GuestMiddleware;

Route::page('/home', PagesController::class, 'home');
Route::page('/about', PagesController::class, 'about');
Route::page('/contacts', PagesController::class, 'contacts');
Route::page('/login', PagesController::class, 'login', GuestMiddleware::class);
Route::page('/register', PagesController::class, 'register', GuestMiddleware::class);
