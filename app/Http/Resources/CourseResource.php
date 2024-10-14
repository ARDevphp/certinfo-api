<?php

namespace App\Http\Resources;

use App\Models\Photo;
use App\Models\Teacher;
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
            'teacher_id' => TeacherResource::collection(Teacher::whereId($this->teacher_id)->get()),
            'photo_id' => PhotoResource::collection(Photo::whereId($this->photo_id)->get()),
            'student_count' => $this->people()->count()
        ];
    }
}
