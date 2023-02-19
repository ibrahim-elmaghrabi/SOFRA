<?php

namespace App\Repositories\Eloquent;

use App\Models\Restaurant;
use App\Repositories\Eloquent\BasicRepository;
use App\Repositories\Contracts\RestaurantRepositoryContract;

class RestaurantRepository extends BasicRepository implements RestaurantRepositoryContract
{
    public function entity()
    {
        return Restaurant::class;
    }
 
}