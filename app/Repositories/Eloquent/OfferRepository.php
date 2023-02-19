<?php

namespace App\Repositories\Eloquent;


use App\Models\Offer;
use App\Repositories\Eloquent\BasicRepository;
use App\Repositories\Contracts\OfferRepositoryContract;

class OfferRepository extends BasicRepository implements OfferRepositoryContract
{
    public function entity()
    {
        return Offer::class;
    }

    public function allByDate()
    {
        return $this->entity->where('start_date', '>=', date('Y-m-d'))->get();
    }
}