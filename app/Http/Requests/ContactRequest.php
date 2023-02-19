<?php

namespace App\Http\Requests;


class ContactRequest extends ApiRequest
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
        return [
            'name'  => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
            'status' => 'required',
        ];
    }
}
