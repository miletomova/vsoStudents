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

    public function messages(){
        return [
            'email.required'    =>'Полето е задължително',
            'email.email'       =>'Въведете валиден email',
            'email.unique'      =>'email съществува в базата данни',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = User::find($this->user);
$id=$user->id;
        return [
            'name'      =>'required|alpha_num',
            'email'     => 'unique:users,email,' .  $id,
            'password'  =>'required|between:3,16',
            'bio'       =>'required|max:500'
        ];
    }
}
