<?php

namespace App\Repository;

use App\Models\Course;

class CourseRepository
{
    public function create(array $data): Course
    {
        return Course::create([
            'name' => $data['name'],
            'course_info' => $data['course_info'],
            'teacher_id' => $data['teacher_id'],
            'photo_id' => $data['photo_id'] ?? 1,
            'start_course' => $data['start_course'],
            'course_duration' => $data['course_duration'],
        ]);
    }

    public function findCourseById(int $id): Course
    {
        return Course::where('id', $id)->first();
    }

    public function all(): mixed
    {
        return Course::all();
    }
}
