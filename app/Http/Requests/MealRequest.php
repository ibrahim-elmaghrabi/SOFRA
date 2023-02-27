<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;


class MealRequest extends ApiRequest
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
        return $this->isMethod('POST') ? $this->createMeal() : $this->updateMeal();
         
    }

    public function createMeal()
    {
        return [
            'name' => 'required|string|min:3',
            'price' => 'required',
            'offer_price' => 'required',
            'time' => 'required',
            'description' => 'required|string',
            'image' => 'required|string',
        ];
    }

    public function updateMeal()
    {
        return [
            'name' => 'sometimes|required|string|min:3',
            'price' => 'sometimes|required',
            'offer_price' => 'sometimes|required',
            'time' => 'sometimes|required',
            'description' => 'sometimes|required|string',
            'image' => 'sometimes|required|string',
        ];
    }
}
