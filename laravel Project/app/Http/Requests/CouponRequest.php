<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
            'title'=>'required|unique:coupons',
            'code'=>'required|unique:coupons',
            'type'=>'required',
            'discount'=>'required|numeric|min:5|max:80',
            'qty'=>'required|numeric|min:1|max:10',
            'type'=>'required',
            'status'=>'required',
            //
        ];
    }
}
