<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordEmailLinkRequest extends FormRequest
{
    public function messages()
    {
        return [
            'email' => "Bunday email ro'yxatdan o'tmagan",
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
        ];
    }
}
