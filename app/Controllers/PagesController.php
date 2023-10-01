<?php

namespace App\Controllers;

use App\Application\Views\View;
use App\Application\Config\Config;

class PagesController {

    public function index() {
        View::show('pages/index', [
            'title' => 'Home - ' . Config::get('app.name')
        ]);
    }
    
    public function login() {
        View::show('pages/login', [
            'title' => 'Login - ' . Config::get('app.name')
        ]);
    }
}
