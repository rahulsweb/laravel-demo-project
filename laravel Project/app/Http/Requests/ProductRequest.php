<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|unique:products',
            'rate' => 'numeric|required',
            'color' => 'alpha|required',
            'quantity' => 'numeric|required|',
            'image.*'=>'image|mimes:jpg,jpeg,bmp,png,gif|max:2045',
            'category'=>'required',
            'subcategory'=>'required'
        ];
    }
}
