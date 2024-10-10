<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'course_info' => 'required|string',
            'start_course' => 'required|date',
            'teacher_id' => 'required|integer|exists:teachers,id',
            'image_id' => 'nullable|integer|exists:images,id',
            'course_duration' => 'required|string',
        ];
    }
}
