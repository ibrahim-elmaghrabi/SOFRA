<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends ApiRequest
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
          return $this->isMethod('POST') ? $this->createClient() : $this->updateClient();
    }

    public function createClient()
    {
         return [
            'name' => 'required|min:3',
            'phone' => 'required|unique:clients',
            'email' => 'required|email|unique:clients,email,'.$this->id,
            'password'=> 'required|confirmed',
            'area_id' => 'required',
            'deviceToken' => 'required',
            'deviceType' => 'required',
        ];
    }

    public function updateClient()
    {
         return [
            'name' => 'sometimes|required|min:3',
            'phone' => 'sometimes|required|unique:clients',
            'email' => 'sometimes|required|email|unique:clients,email,'.$this->id,
            'password'=> 'sometimes|required|confirmed',
            'area_id' => 'sometimes|required',
        ];
    }
}
