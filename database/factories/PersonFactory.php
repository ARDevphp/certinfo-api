<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => rand(1,200),
            'firstname' => fake()->name,
            'lastname' => fake()->name,
            'birthday' => '2024-09-24',
            'photo_id' => 1
        ];
    }
}
