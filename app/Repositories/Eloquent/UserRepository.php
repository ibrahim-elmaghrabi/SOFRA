<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Eloquent\BasicRepository;
use App\Repositories\Contracts\UserRepositoryContract;
 
class UserRepository extends BasicRepository implements UserRepositoryContract
{
    public function entity()
    {
        return User::class;
    }
 
}