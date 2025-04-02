<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerifySmsCodeRequest extends FormRequest
{
    public function messages()
    {
        return [
            'email.required' => 'bunday Email mavjud',
            'password.required' => 'Parol kiritish majburiy.',
            'password.min' => 'Parol kamida 6 ta belgidan iborat bo\'lishi kerak.',
        ];
    }
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'email' => 'required|email|exists:users,email',
            'newPassword' => 'required|string|min:6',
            'type' => 'required|in:register,reset-password'
        ];
    }
}
