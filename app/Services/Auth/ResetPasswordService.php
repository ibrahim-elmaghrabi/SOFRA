<?php

namespace App\Services\Auth;

use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;
use App\Exceptions\UserNotFoundException;
use App\Exceptions\WrongCredentialsException;

class ResetPasswordService
{
    public function forgetPassword($model, $attribute)
    {
        $user = $model->findWhereFirst('email', $attribute);
        if(!$user)
        {
            throw new UserNotFoundException;
        }
        $user->pin_code = rand(1111, 9999);
        $user->save();
        Mail::to($user->email)->bcc('SOFRA@gmail.com')->send(new ResetPassword($user));
    }

    public function resetPassword($model, array $credentials)
    {
        $user = $model->findWhereFirst('pin_code', $credentials['pin_code']);
        if(!$user)
        {
            throw new WrongCredentialsException;
        }
        $user->pin_code = null;
        $user->password= $credentials['password'];
        $user->save();
    }
}