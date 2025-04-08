<?php

namespace App\Repository;

use App\Models\Course;

class CourseRepository
{
    public function storeCourse(array $data): Course
    {
        $course = Course::create([
            'name' => $data['name'],
            'course_info' => $data['course_info'],
            'teacher_id' => $data['teacher_id'],
            'start_course' => $data['start_course'],
            'course_' => $data['start_course'],
        ]);
    }
}
