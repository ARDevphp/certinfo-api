<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCoursePersonRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'course_id' => 'required|integer|exists:courses,id',
            'person_id' => 'required|integer|exists:persons,id',
        ];
    }
}
