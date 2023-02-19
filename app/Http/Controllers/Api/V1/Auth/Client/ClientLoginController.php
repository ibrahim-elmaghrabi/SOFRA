<?php

namespace App\Http\Controllers\Api\V1\Auth\Client;

use App\Services\Auth\LoginService;
use App\Services\Auth\TokenService;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginClientRequest;
use App\Repositories\Contracts\ClientRepositoryContract;

class ClientLoginController extends Controller
{
     protected $clients;

     protected $loginService;

     protected $tokenService;

    public function __construct(ClientRepositoryContract $clientContract,
                                    LoginService $loginService,
                                    TokenService $tokenService
                            )
    {
        $this->clientsRepo = $clientContract;
        $this->loginService = $loginService;
        $this->tokenService = $tokenService;

    }

    public function login(LoginClientRequest $request)
    {
        
        $client=$this->loginService->login($this->clientsRepo, $request->validated());
        return $this->tokenService->apiToken($client,
                                            'ClientToken',
                                            $request['deviceToken'],
                                            $request['deviceType']
                                        );
    }
}
