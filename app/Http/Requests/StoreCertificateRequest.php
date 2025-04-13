<?php

namespace App\Http\Requests;

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreCertificateRequest extends FormRequest
{
    public function messages()
    {
        return [
            'student_name' => 'Student ism',
            'student_family' => 'Student familyasini ',
            'student_email' => 'Student email kiriting',
            'course_id' => 'Student Bitirgan kursni tanlang',
            'practice' => "Praktikada qanshganli to'g'risida malumot bering",
            'certificate_protection' => "Certificate himoyasi qanday qilinsin",
            'finish_course' => 'Kursni tugatganli vaqtini kiriting',
        ];
    }

    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'student_name' => 'required|string|max:255',
            'student_family' => 'required|string|max:255',
            'student_email' => 'required|string|email|max:255',
            'course_id' => 'required|integer|exists:courses,id',
            'practice' => 'required|string',
            'certificate_protection' => 'required|string',
            'finish_course' => 'required',
            'current_url' => 'required|url',
        ];
    }
}
