<?php

namespace App\Repositories\Eloquent;

use App\Models\Contact;
use App\Repositories\Eloquent\BasicRepository;
use App\Repositories\Contracts\ContactRepositoryContract;

class ContactRepository extends BasicRepository implements ContactRepositoryContract
{
    public function entity()
    {
        return Contact::class;
    }
}