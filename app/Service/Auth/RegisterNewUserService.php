<?php

namespace App\Service\Auth;

use App\Models\User;
use App\Http\Requests\Auth\StoreRegisterRequest;

class RegisterNewUserService
{
    public function __construct()
    {
        //
    }

    /**
     * Retorna um novo um modelo de Usuario, .
     *
     * @param StoreRegisterRequest $request
     * @return User
     */
    public static function handle(StoreRegisterRequest $request) : User {
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'password' => bcrypt($request->password),
        ]);
    }
}
