<?php

namespace Database\Seeders;

use App\Models\CoursePerson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoursePersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //CoursePerson::factory()->count(200)->create();
        CoursePerson::create([
            'person_id' => rand(1,200),
            'course_id' => rand(1,11),
        ]);
    }
}
