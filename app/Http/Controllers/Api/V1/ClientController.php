<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Repositories\Contracts\ClientRepositoryContract;


class ClientController extends Controller
{
    protected $clients;

    public function __construct(ClientRepositoryContract $clientContract)
    {
        $this->clients = $clientContract ;
    }

    public function update(ClientRequest $request)
    {
        $this->clients->update(auth()->user()->id, $request->validated());
        return httpResponse(1, "Success");
    }
}