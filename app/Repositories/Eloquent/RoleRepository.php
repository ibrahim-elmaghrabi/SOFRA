<?php

namespace App\Repositories\Eloquent;

use Spatie\Permission\Models\Role;
use App\Repositories\Eloquent\BasicRepository;
use App\Repositories\Contracts\RoleRepositoryContract;

class RoleRepository extends BasicRepository implements RoleRepositoryContract
{
    public function entity()
    {
        return Role::class;
    }
}