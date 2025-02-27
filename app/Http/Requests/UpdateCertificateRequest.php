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
            'student_name' => 'required|string|max:255',
            'student_family' => 'required|string|max:255',
            'student_email' => 'required|email|max:255',
            'course_id' => 'required|array',
            'file_path' => 'required|array',
            'practice' => 'required|string',
            'certificate_protection' => 'required|string',
            'finish_course' => 'required|date',
        ];
    }
}
