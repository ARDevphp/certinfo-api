<?php

namespace App\Http\Resources;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CertificateResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'student_name' => $this->student_name,
            'student_family' => $this->student_family,
            'student_email' => $this->student_email,
            'course_id' => Course::whereId($this->course_id)->get('name'),
            'practice' => $this->practice,
            'file_path' => $this->file_path,
            'certificate_protection' => $this->certificate_protection,
            'finish_course' => $this->finish_course
        ];
    }
}
