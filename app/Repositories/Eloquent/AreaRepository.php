<?php

namespace App\Repositories\Eloquent;

use App\Models\Area;
use App\Repositories\Contracts\AreaRepositoryContract;
use App\Repositories\Eloquent\BasicRepository;

class AreaRepository extends BasicRepository implements AreaRepositoryContract
{
    public function entity()
    {
        return Area::class;
    }
}