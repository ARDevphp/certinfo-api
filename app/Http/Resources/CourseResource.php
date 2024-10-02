<?php

namespace App\Http\Resources;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'course_info' => $this->course_info,
            'start_course' => $this->start_course,
            'teacher_id' => $this->teacher_id,
            'image_id' => $this->image_id,
            'student_count' => $this->people()->count(),
        ];
    }
}
