<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCertificateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'student_name' => 'sometimes|required|string|max:255',
            'student_family' => 'sometimes|required|string|max:255',
            'student_email' => 'sometimes|required|email|max:255',
            'course_id' => 'sometimes|required|integer|exists:courses,id',
            'practice' => 'sometimes|required|text',
            'certificate_protection' => 'sometimes|required|text',
            'finish_course' => 'sometimes|required|date',
        ];
    }
}
