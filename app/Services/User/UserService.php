<?php

namespace App\Services\User;

use App\Application\Request\Request;
use App\Models\User;
use App\Application\Router\Redirect;
use App\Application\Alerts\Alert;
use App\Application\Helpers\Random;
use App\Application\Config\Config;
use App\Application\Auth\Auth;

class UserService implements UserServiceInterface {

    public function register(array $data): void {
        $user = new User();
        $user->setEmail($data['email']);
        $user->setName($data['name']);
        $user->setPassword($data['password']);
        $user->store();
    }

    public function login(string $username, string $password): bool {
        $user = (new User())->find('email', $username);
        if (!$user) {
            Alert::storeMessage('User not found', Alert::DANGER);
            return false;
        }
        

        if (!password_verify($password, $user->getPassword())) {
            Alert::storeMessage('Incorrect email or password', Alert::DANGER);
            return false;
        }
        
        $token = Random::str(50);
        
        setcookie(Auth::getTokenColumn(), $token);
        
        $user->update([
            Auth::getTokenColumn() => $token,
        ]);
        
        return true;
    }

    public function logout(): void {
        unset($_COOKIE[Auth::getTokenColumn()]);
        setcookie(Auth::getTokenColumn(), null);
        
        Redirect::to('/login');
    }
}
