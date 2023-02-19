<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Hash;
use App\Exceptions\WrongCredentialsException;


class LoginService
{
    public function login($model, array $credentials)
    {
        $user = $model->findWhereFirst('email', $credentials['email']);
        if (!$user || !Hash::check($credentials['password'], $user->password))
        {
            throw new WrongCredentialsException;
        }
        return $user ;
    }
}