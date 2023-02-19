<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Repositories\Contracts\CategoryRepositoryContract;


class CategoryController extends Controller
{
    protected $categories;

    public function __construct(CategoryRepositoryContract $categoryContract)
    {
        $this->categories = $categoryContract ;
    }

    public function index()
    {
        return httpResponse(1, "Success", CategoryResource::collection($this->categories->all()));
    }
}
