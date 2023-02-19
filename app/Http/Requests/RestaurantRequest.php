<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class RestaurantRequest extends ApiRequest
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
          return $this->isMethod('POST') ? $this->createRestaurant() : $this->updateRestaurant();
    }

    public function createRestaurant()
    {
        return [
            'name' => 'required|min:3',
            'email'=> 'required|email|unique:restaurants,email',
            'phone' => 'required|unique:restaurants,phone',
            'image' => 'required|string',
            'open_at' => 'required',
            'close_at'=>'required',
            'area_id' => 'required',
            'password' => 'required|confirmed',
            'minimum_order' => 'required',
            'delivery_phone' => 'required',
            'delivery_charge' => 'required',
            'delivery_whatsapp'=> 'required',
            'categories_list'  => 'required|array',
            'deviceToken' => 'required',
            'deviceType' => 'required',
        ];
    }

    public function updateRestaurant()
    {
        return [
            'name' => 'sometimes|required|min:3',
            'email'=> 'sometimes|required|email|unique:restaurants,email,'.$this->id,
            'phone' => 'sometimes|required|unique:restaurants,phone,'.$this->id,
            'image' => 'sometimes|required|string',
            'open_at' => 'sometimes|required',
            'close_at'=>'sometimes|required',
            'active'  => 'sometimes|required',
            'area_id' => 'sometimes|required',
            'password' => 'sometimes|required|confirmed',
            'minimum_order' => 'sometimes|required',
            'delivery_phone' => 'sometimes|required',
            'delivery_charge' => 'sometimes|required',
            'delivery_whatsapp'=> 'sometimes|required',
            'categories_list'  => 'sometimes|required|array',
        ];
    }
}
