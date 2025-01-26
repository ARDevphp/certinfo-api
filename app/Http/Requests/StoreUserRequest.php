<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function messages()
    {
        return [
            'email.required' => 'bunday Email mavjud',
            'password.required' => 'Parol kiritish majburiy.',
            'password.min' => 'Parol kamida 6 ta belgidan iborat bo\'lishi kerak.',
        ];
    }
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
        ];
    }
}

