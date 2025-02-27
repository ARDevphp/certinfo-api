<?php

namespace App\Http\Requests;

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreCertificateRequest extends FormRequest
{
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
            'course_id' => 'required|exists:courses,id',
            'file_path' => 'nullable',
            'people_id' => 'nullable',
            'practice' => 'required',
            'certificate_protection' => 'required',
            'finish_course' => 'required',
            'current_url' => 'required|url',
            'created_at' => Carbon::now(),
        ];
    }
}
