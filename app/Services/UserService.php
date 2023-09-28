<?php

namespace App\Services;

use App\Application\Request\Request;
use App\Models\User;
use App\Application\Router\Redirect;

/**
 * Description of UserService
 *
 * @author tarum2
 */
class UserService {
    public function register(Request $request): void {
        // TODO: make validation data

        $user = new User();

        $user->setEmail($request->post('email'));
        $user->setName($request->post('name'));
        $user->setPassword($request->post('password'));
        $user->store();
        Redirect::to("/login");
    }
}
