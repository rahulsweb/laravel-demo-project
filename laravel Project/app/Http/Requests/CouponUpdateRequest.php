<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponUpdateRequest extends FormRequest
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
            'title'=>'unique:coupons,title,'.$this->coupon,
            'code'=>'unique:coupons,code,'.$this->coupon,
            
            'discount'=>'numeric|min:5|max:80',
            'qty'=>'numeric|min:1|max:10',
            
            //
        ];
    }
}
