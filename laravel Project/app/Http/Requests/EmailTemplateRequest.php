<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailTemplateRequest extends FormRequest
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

            'name'=>'required|unique:email_templates',
            'subject'=>'required',
            'message'=>'required',
            //
        ];
    }


    public function messages()
{
    return [
        'name.required' => 'A Template Name is required',
        'subject.required'  => 'A Subject  is required',
        'message.required'=>'email template content is required',
    ];
}
}
