<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CmsRequest extends FormRequest
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

            'name'=>'required',
            'title'=>'required|unique:cms',
            'slug'=>'required|unique:cms',

            'content'=>'required',
            //
        ];
    }


    public function messages()
{
    return [
        'name.required' => 'A Content Management System Name is required',
        'title.required'  => 'A Title  is required',

        'slug.required'  => 'A slug  is required',
        'content.required'=>' Content Management System content is required',
    ];
}
}
