<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\BasicRepository;
use App\Repositories\Contracts\AuthRepositoryContract;

class AuthRepository extends BasicRepository implements AuthRepositoryContract
{
    public function logout()
    {
        return auth()->user()->currentAccessToken()->delete();
    }
}
