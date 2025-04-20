<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CertificateFactory extends Factory
{
    public function definition(): array
    {
        return [
            'student_name' => fake()->name,
            'student_family' => fake()->name,
            'student_email' => fake()->email,
            'people_id' => rand(1, 199),
            'course_id' => rand(1, 11),
            'file_path' => 2,
            'practice' => fake()->text(1000),
            'certificate_protection' => fake()->text(700),
            'finish_course' => fake()->dateTime(),
            'created_at' => fake()->dateTime(),
        ];
    }
}
