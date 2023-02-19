<?php

namespace App\Repositories\Eloquent;

use App\Models\Client;
use App\Repositories\Contracts\ClientRepositoryContract;
use App\Repositories\Eloquent\BasicRepository;

class ClientRepository extends BasicRepository implements ClientRepositoryContract
{
    public function entity()
    {
        return Client::class;
    }

}