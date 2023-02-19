<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\Eloquent\BasicRepository;
use App\Repositories\Contracts\CategoryRepositoryContract;

class CategoryRepository extends BasicRepository implements CategoryRepositoryContract
{
    public function entity()
    {
        return Category::class;
    }
}