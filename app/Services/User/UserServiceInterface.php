<?php

namespace App\Services\User;

/**
 *
 * @author tarum2
 */
interface UserServiceInterface {
    public function register(array $data): void;
    
    public function login(string $username, string $password): void;
    
    public function logout(): void;
}
