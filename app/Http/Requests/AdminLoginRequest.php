<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Model\Admin;

class AdminLoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'email.exists'=>'Invalid Credentials',
            'password' => 'Invalid Password'

        ];
    }
    public function rules()
    {
        return [
            'email' => 'email|required|exists:admin',
            'password' => 'required'
        ];
    }
}
