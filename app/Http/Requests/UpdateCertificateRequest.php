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
            'student_name' => 'sometimes|string|max:255',
            'student_family' => 'sometimes|string|max:255',
            'student_email' => 'sometimes|email|max:255',
            'course_id' => 'sometimes|integer',
            'practice' => 'sometimes|string',
            'certificate_protection' => 'sometimes|string',
            'finish_course' => 'sometimes|date',
        ];
    }
}
