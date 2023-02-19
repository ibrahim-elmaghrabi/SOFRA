<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Repositories\Contracts\ContactRepositoryContract;

class ContactController extends Controller
{
    protected $contacts;
    
    public function __construct(ContactRepositoryContract $contactContract)
    {
        $this->contacts= $contactContract;
    }

    public function create(ContactRequest $request)
    {
        $this->contacts->create($request->validated());
        return httpResponse(1, "Success", "message sent");
    }
}
