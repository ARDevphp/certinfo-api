<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|string',
            'course_info' => 'sometimes|string',
            'start_course' => 'sometimes|date',
            'teacher_id' => 'sometimes|integer|exists:teachers,id',
            'image_id' => 'nullable|integer',
            'course_duration' => 'sometimes|string',
        ];
    }
}
