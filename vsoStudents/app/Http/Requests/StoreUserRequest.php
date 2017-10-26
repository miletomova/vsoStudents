<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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

    public  function messages()
    {
            return [
                    'my_photo.required' => 'Изберете файл!',
                    'my_photo.mimes'    => 'Изберете файл jpg или png!',
                ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      =>'required|alpha_num',
            'email'     =>'required|email|unique:users',
            'password'  =>'required|between:3,16',
            'bio'       =>'required|max:500',
            'my_photo'  =>'required|mimes:png,jpg,jpeg',
        ];
    }
}
