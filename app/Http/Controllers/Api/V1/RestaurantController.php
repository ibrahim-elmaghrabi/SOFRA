<?php

namespace App\Http\Controllers\Api\V1;

use Exception;
use App\Models\Restaurant;
use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantRequest;
use App\Http\Resources\RestaurantResource;
use App\Repositories\Contracts\RestaurantRepositoryContract;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RestaurantController extends Controller
{
    protected $restaurants ;

    public function __construct(RestaurantRepositoryContract $restaurantContract)
    {
        $this->restaurants = $restaurantContract;
    }

    public function index()
    {
        return httpResponse(1, "Success", RestaurantResource::collection($this->restaurants
        ->allByFilter(['name', 'area.city_id'],['area'])));
    }

    public function show(Restaurant $restaurant)
    {
        return httpResponse(1, "Success", new RestaurantResource($this->restaurants->find($restaurant->id)));
    }

    public function update(Restaurant $restaurant, RestaurantRequest $request)
    {
        $this->restaurants->update(auth()->user()->id, $request->validated());
        return httpResponse(1, "Success");
    }

}
