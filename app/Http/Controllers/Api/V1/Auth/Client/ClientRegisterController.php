<?php

namespace App\Http\Controllers\Api\V1\Auth\Client;

use App\Services\Auth\TokenService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Repositories\Contracts\ClientRepositoryContract;

class ClientRegisterController extends Controller
{
    protected $clientsRepo;

    protected $tokenService;

    public function __construct(ClientRepositoryContract $clientContract, TokenService $tokenService)
    {
        $this->clientsRepo= $clientContract;
        $this->tokenService= $tokenService;
    }

    public function register(ClientRequest $request)
    {
        $client= $this->clientsRepo->create($request->validated());
        return $this->tokenService->apiToken($client,
                                'clientToken',
                                $request['deviceToken'],
                                $request['deviceType']
    );

    }
}
