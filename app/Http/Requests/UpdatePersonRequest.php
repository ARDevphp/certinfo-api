<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required|integer',
            'email' => 'required|email|max:255',
            'firstname' => 'nullable|string|max:255',
            'lastname' => 'nullable|string|max:255',
            'photo_id' => 'nullable|integer|exists:photos,id',
            'newPhoto_id' => 'nullable|integer|exists:photos,id',
        ];
    }
}
