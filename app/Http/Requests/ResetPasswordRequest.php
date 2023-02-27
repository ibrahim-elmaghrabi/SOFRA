<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class ResetPasswordRequest extends ApiRequest
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
        return  $this->isMethod('POST') ? $this->forget() : $this->reset();
    }

    public function forget()
    {
        return [
            'email' => 'required|email',
        ];
    }

    public function reset()
    {
        return [
            'pin_code' => 'required',
            'password' => 'required|confirmed'
        ];
    }
}
