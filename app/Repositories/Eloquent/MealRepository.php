<?php

namespace App\Repositories\Eloquent;

use App\Models\Meal;
use App\Repositories\Contracts\MealRepositoryContract;
use App\Repositories\Eloquent\BasicRepository;

class MealRepository extends BasicRepository implements MealRepositoryContract
{
    public function entity()
    {
        return Meal::class;
    }
}