<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserUpdateRequest extends FormRequest
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
            'first_name' => 'regex:/^[\pL\s\-]+$/u',
            'last_name' => 'regex:/^[\pL\s\-]+$/u',
            'email' => 'email|unique:users,email,'.$this->user,
            'password' => 'same:confirm_password',
            
        ];
    }
}
