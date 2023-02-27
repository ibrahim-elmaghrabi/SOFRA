<?php

namespace App\Repositories\Eloquent;

use App\Models\Payment;
use App\Repositories\Eloquent\BasicRepository;
use App\Repositories\Contracts\PaymentRepositoryContract;

class PaymentRepository extends BasicRepository implements PaymentRepositoryContract
{
    public function entity()
    {
        return Payment::class;
    }
}