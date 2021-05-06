<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateForm extends FormRequest
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
            'name' => 'required|min:4|max:50',
            'company' => 'required|min:1|max:20',
            'phone' => 'required|min:11|max:16',
            'email' => 'required|email|min:9|max:60',
            'comment' => 'min:5|max:500'
        ];


    }
}
