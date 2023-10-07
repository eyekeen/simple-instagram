<?php

namespace App\Controllers;

use App\Application\Request\Request;
use App\Services\User\UserService;
use App\Application\Router\Redirect;
use App\Application\Alerts\Alert;
use App\Application\Config\Config;

class UserController {

    private UserService $service;

    public function __construct() {
        $this->service = new UserService();
    }

    public function register(Request $request): void {

        $errors = $request->validation([
            'email' => ['required', 'email'],
            'name' => ['required'],
            'password' => ['required', 'password_confirm'],
        ]);

        if (!$request->validationStatus()) {
            Alert::storeMessage('Register error', Alert::DANGER);
            Redirect::to('/register');
        }


        $this->service->register([
            'email' => $request->post('email'),
            'name' => $request->post('name'),
            'password' => $request->post('password'),
            'password_confirm' => $request->post('password_confirm'),
        ]);

        Alert::storeMessage('Register has been successfully', Alert::SUCCESS);

        Redirect::to('/login');
    }

    public function login(Request $request) {
        $errors = $request->validation([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (!$request->validationStatus()) {
            Alert::storeMessage('Login valid error', Alert::DANGER);
            Redirect::to('/login');
        }

        $auth = $this->service->login(
                $request->post(Config::get('auth.username_column')),
                $request->post('password')
        );

        if (!$auth) {
            Redirect::to('/login');
        } else {
            Redirect::to('/profile');
        }
    }
    
    public function logout(): void {
        $this->service->logout();
    }
}
