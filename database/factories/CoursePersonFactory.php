<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CoursePersonFactory extends Factory
{
    public function definition(): array
    {
        return [
            'course_id' => rand(1,11),
            'people_id' => rand(1,200),
        ];
    }
}
