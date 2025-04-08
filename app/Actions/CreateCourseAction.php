<?php

namespace App\Actions;

use App\Services\Course\CourseService;

class CreateCourseAction
{
    public function __construct(protected CourseService $courseService)
    {
    }

    public function execute(array $data)
    {
        return $this->courseService->createCourse($data);
    }
}
