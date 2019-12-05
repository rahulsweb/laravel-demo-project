<?php

namespace App\Http\Requests\frontend;

use Illuminate\Foundation\Http\FormRequest;

class AddressUpdateRequest extends FormRequest
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
            'fullname'=>'regex:/^[\pL\s\-]+$/u',
            'country'=>'alpha',
            'state'=>'alpha',
            'address1'=>'required',
            'address2'=>'sometimes',
            'pincode'=>'digits:6|integer',
            'id'=>'integer'
        ];
    }
}
