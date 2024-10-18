<?php

namespace App\Http\Requests;

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCertificateRequest extends FormRequest
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
            'student_email' => 'required|email|users.email',
            'course_id' => 'required|integer|exists:courses,id',
            'practice' => 'required|string',
            'certificate_protection' => 'required|string',
            'finish_course' => 'required|date',
        ];
    }
}

