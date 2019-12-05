<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CmsUpdateRequest extends FormRequest
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
            'name'=>'required',
            'title'=>'required|unique:cms,title,'.$this->cm,
            'slug'=>'required|unique:cms,slug,'.$this->cm,

            'content'=>'required',
        ];
    }
}
