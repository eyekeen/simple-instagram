<?php

namespace App\Services\User;

use App\Application\Request\Request;
use App\Models\User;
use App\Application\Router\Redirect;

/**
 * Description of UserService
 *
 * @author tarum2
 */
class UserService implements UserServiceInterface {

    public function register(array $data): void {
        $user = new User();
        $user->setEmail($data['email']);
        $user->setName($data['name']);
        $user->setPassword($data['password']);
        $user->store();
    }

    public function login(string $username, string $password): void {
        
    }

    public function logout(): void {
        
    }
}
