<?php

namespace App\Repositories\Eloquent;

use App\Models\City;
use App\Repositories\Contracts\CityRepositoryContract;
use App\Repositories\Eloquent\BasicRepository;

class CityRepository extends BasicRepository implements CityRepositoryContract
{
    public function entity()
    {
        return City::class;
    }
}