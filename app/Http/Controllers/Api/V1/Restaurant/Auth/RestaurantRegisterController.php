<?php

namespace App\Http\Controllers\Api\V1\Restaurant\Auth;

use App\Services\Auth\TokenService;
use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantRequest;
use App\Repositories\Contracts\RestaurantRepositoryContract;

class RestaurantRegisterController extends Controller
{
    protected $restaurant;

    protected $tokenService;

    public function __construct(RestaurantRepositoryContract $restaurantContract,
                                TokenService $tokenService
                                )
    {
        $this->restaurantsRepo = $restaurantContract;
        $this->tokenService    = $tokenService;
    }

    public function register(RestaurantRequest $request)
    {
        $restaurant = $this->restaurantsRepo->create($request->validated());
        $restaurant->categories()->attach($request['categories_list']);
        return $this->tokenService->apiToken($restaurant,
                                'restaurantToken',
                                $request['deviceToken'],
                                $request['deviceType']
                            );
    }
}
