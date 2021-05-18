<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequestRu extends FormRequest
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
            'name' => 'required|min:1|max:100|regex:/[А-Яа-яЁёa-z-]/u',
            'phone' => 'required|min:5|max:15|regex:/[0-9+]/u',
            'email' => 'required|email|min:5|max:256',
            'language'=>'required',
            'role'=>'required',
            'aboutOneSelf' => 'min:0|max:500'
        ];
        $validatedData = $this -> validate($request);
    }

}
