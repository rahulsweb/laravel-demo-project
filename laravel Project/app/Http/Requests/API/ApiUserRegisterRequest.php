<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class ApiUserRegisterRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            //
            'first_name' => 'required',
            'last_name' => 'required',

            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'First Name Required',
                'last_name.required' => 'Last Name Required',
                'email.required' => 'Email Required',
                'password.required' => 'Password Required',
                'c_password.required' => 'Confirm Password Required',
        ];
    }
}
