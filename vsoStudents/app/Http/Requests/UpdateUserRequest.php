<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class UpdateUserRequest extends FormRequest
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
            'name'      =>'required|alpha_num',
            'email'     =>'required|email|unique:users,email,:id',
            'password'  =>'required|between:3,16',
            'bio'       =>'required|max:500'
        ];
    }
}
