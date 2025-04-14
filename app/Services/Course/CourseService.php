<?php

namespace App\Services\Course;

use App\Models\Course;
use App\Repository\CourseRepository;

class CourseService
{
    public function __construct(protected CourseRepository $courseRepository)
    {
    }

    public function allShow()
    {
        return $this->courseRepository->all();
    }

    public function createCourse(array $data):Course
    {
        return $this->courseRepository->create($data);
    }
}
