<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatUserRequest extends FormRequest
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
            'username'=>'required|min:6|unique',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:4'
        ];
    }

//    function messages()
//    {
//        return [
//            'username.required'=>'This field can not be empty',
//            'username.min'=>'This field require at least 6 characters',
//            'username.unique'=>'Name is existed',
//            'email.required'=>'This field can not be empty',
//            'email.email'=>'Invalid email format',
//            'email.unique'=>'Email ís existed',
//            'password.required'=>'This field can not be empty',
//            'password.min'=>'This field require at least 4 characters',
//        ];
//    }
}
