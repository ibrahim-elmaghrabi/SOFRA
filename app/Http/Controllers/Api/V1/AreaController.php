<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\AreaResource;
use App\Repositories\Contracts\AreaRepositoryContract;

class AreaController extends Controller
{
    protected $areas ;

    public function __construct(AreaRepositoryContract $areaContract)
    {
        $this->areas = $areaContract ;
    }

    public function index()
    {
        return httpResponse(1, "Success", AreaResource::collection($this->areas
            ->allByFilter(['city_id'])));
    }
}
