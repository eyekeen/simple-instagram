<?php

namespace App\Controllers;

use App\Application\Request\Request;
use App\Services\User\UserService;

class UserController {

    private UserService $service;

    public function __construct() {
        $this->service = new UserService();
    }

    public function register(Request $request) {
        
        $errors = $request->validation([
            'email' => ['required', 'email'],
            'name' => ['required'],
        ]);
        
        if(!$request->validationStatus()){
            dd($request->validationErrors());
        }
        
        $this->service->register([
            'email' => $request->post('email'),
            'name' => $request->post('name'),
            'password' => $request->post('password'),
            'password_confirm' => $request->post('password_confirm'),
        ]);
    }
}
