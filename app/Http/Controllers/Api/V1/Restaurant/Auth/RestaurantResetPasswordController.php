<?php

namespace App\Http\Controllers\Api\v1\Restaurant\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Services\Auth\ResetPasswordService;
use App\Repositories\Contracts\RestaurantRepositoryContract;

class RestaurantResetPasswordController extends Controller
{
    protected $restaurantsRepo;

    protected $resetService;

    public function __construct(RestaurantRepositoryContract $restaurantContract,
                                ResetPasswordService $resetService
                                )
    {
        $this->restaurantsRepo= $restaurantContract;
        $this->resetService = $resetService;
    }

    public function forgetPassword(ResetPasswordRequest $request)
    {
        $this->resetService->forgetPassword($this->restaurantsRepo ,$request->validated());
        return httpResponse(1, "Please check your email");
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $this->resetService->resetPassword($this->restaurantsRepo ,$request->validated());
        return httpResponse(1, "Success");
    }
}
