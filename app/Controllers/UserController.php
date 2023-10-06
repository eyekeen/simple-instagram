<?php

namespace App\Controllers;

use App\Application\Request\Request;
use App\Services\User\UserService;
use App\Application\Router\Redirect;
use App\Application\Alerts\Alert;

class UserController {

    private UserService $service;

    public function __construct() {
        $this->service = new UserService();
    }

    public function register(Request $request) {
        
        $errors = $request->validation([
            'email' => ['required', 'email'],
            'name' => ['required'],
            'password' => ['required', 'password_confirm'],
        ]);
        
        if(!$request->validationStatus()){
            Alert::storeMessage('Register error', 'danger');
            Redirect::to('/register');
        }
        
        
        $this->service->register([
            'email' => $request->post('email'),
            'name' => $request->post('name'),
            'password' => $request->post('password'),
            'password_confirm' => $request->post('password_confirm'),
        ]);
        
        Alert::storeMessage('Register has been successfully', 'success');
        
        Redirect::to('/login');
    }
}
