<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => fake()->randomAscii,
            'firstname' => fake()->name,
            'lastname' => fake()->name,
            'birthday' => fake()->date
        ];
    }
}
