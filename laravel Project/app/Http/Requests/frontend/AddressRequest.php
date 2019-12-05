<?php

namespace App\Http\Requests\frontend;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'fullname'=>'required',
            'country'=>'alpha|required',
            'state'=>'alpha|required',
            'address1'=>'required',
            'address2'=>'sometimes',
            'pincode'=>'required|digits:6|integer'
        ];
    }
}
