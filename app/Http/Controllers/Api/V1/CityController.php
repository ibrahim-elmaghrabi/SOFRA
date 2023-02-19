<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Repositories\Contracts\CityRepositoryContract;

class CityController extends Controller
{
    protected $cities;

    public function __construct(CityRepositoryContract $cityContract)
    {
        $this->cities = $cityContract ;
    }

    public function index()
    {
        return httpResponse(1, "Success", CityResource::collection($this->cities->all()));
    }
}