<?php

namespace App\Http\Controllers\Api\V1\Restaurant\Auth;

use App\Services\Auth\LoginService;
use App\Services\Auth\TokenService;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRestaurantRequest;
use App\Repositories\Contracts\RestaurantRepositoryContract;

class RestaurantLoginController extends Controller
{
     protected $restaurantsRepo;

     protected $loginService;

     protected $tokenService;

    public function __construct(RestaurantRepositoryContract $restaurantContract,
                                    LoginService $loginService,
                                    TokenService $tokenService
                            )
    {
        $this->restaurantsRepo = $restaurantContract;
        $this->loginService    = $loginService;
        $this->tokenService    = $tokenService;

    }

    public function login(LoginRestaurantRequest $request)
    {
        $restaurant=$this->loginService->login($this->restaurantsRepo, $request->validated());
        return $this->tokenService->apiToken($restaurant,
                                            'RestaurantToken',
                                            $request['deviceToken'],
                                            $request['deviceType']

    );
    }

   
}
