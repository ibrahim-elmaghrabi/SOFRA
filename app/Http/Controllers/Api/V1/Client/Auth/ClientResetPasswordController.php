<?php

namespace App\Http\Controllers\Api\V1\Client\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Services\Auth\ResetPasswordService;
use App\Repositories\Contracts\ClientRepositoryContract;

class ClientResetPasswordController extends Controller
{
    protected $clientsRepo;

    protected $resetService;

    public function __construct(ClientRepositoryContract $clientContract,
                                ResetPasswordService $resetService
                                )
    {
        $this->clientsRepo= $clientContract;
        $this->resetService = $resetService;
    }

    public function forgetPassword(ResetPasswordRequest $request)
    {
        
        $this->resetService->forgetPassword($this->clientsRepo ,$request->validated());
        return httpResponse(1, "Please check your email");
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $this->resetService->resetPassword($this->clientsRepo ,$request->validated());
        return httpResponse(1, "Success");
    }
}
