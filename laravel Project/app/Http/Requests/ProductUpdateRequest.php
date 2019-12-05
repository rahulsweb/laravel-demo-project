<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'name' => 'unique:products,name,'.$this->product->id,
            'rate' => 'numeric',
            'color' => 'alpha',
            'quantity' => 'numeric',
            'image.*'=>'image|mimes:jpg,jpeg,bmp,png,gif|max:2045',
        ];
    }
}
