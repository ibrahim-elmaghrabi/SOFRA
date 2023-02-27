<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;


class OfferRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return $this->isMethod('POST') ? $this->createOffer() : $this->updateOffer();
    }

    public function createOffer()
    {
        return [
            'title' => 'required|string',
            'offer' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'image' => 'string',
            
        ];
    }

    public function updateOffer()
    {
         return [
            'title' => 'sometimes|required|string',
            'offer' => 'sometimes|required|string',
            'start_date' => 'sometimes|required|date',
            'end_date' => 'sometimes|required|date',
            'image' => 'sometimes|string',
            
        ];
    }
     
}
