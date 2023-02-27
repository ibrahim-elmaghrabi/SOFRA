<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends ApiRequest
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
        return $this->isMethod('POST') ? $this->createOrder() : $this->updateOrder();

    }

    public function createOrder()
    {
        return [
            'restaurant_id' => 'required|exists:restaurants,id',
            'meals.*.meal_id' => 'required|exists:meals,id',
            'meals.*.quantity' => 'required',
            'address' => 'required',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'note' => 'string',
        ];
    }

    public function updateOrder()
    {
        return [
            'order_id' => 'required',
            'state'=> 'required|string',
        ];
    }

    
}
