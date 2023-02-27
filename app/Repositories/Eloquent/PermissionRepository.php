<?php

namespace App\Repositories\Eloquent;

use Spatie\Permission\Models\Permission;
use App\Repositories\Eloquent\BasicRepository;
use App\Repositories\Contracts\PermissionRepositoryContract;

class PermissionRepository extends BasicRepository implements PermissionRepositoryContract
{
    public function entity()
    {
        return Permission::class;
    }
}