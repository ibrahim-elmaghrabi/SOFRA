<?php

namespace App\Repositories\Eloquent;

use App\Models\PaymentMethod;
use App\Repositories\Eloquent\BasicRepository;
use App\Repositories\Contracts\PaymentMethodRepositoryContract;

class PaymentMethodRepository extends BasicRepository implements PaymentMethodRepositoryContract
{
    public function entity()
    {
        return PaymentMethod::class;
    }
 
}