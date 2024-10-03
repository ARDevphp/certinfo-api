<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RolePermissionSeeder::class,
            UserSeeder::class,
            PersonSeeder::class,
            PhotoSeeder::class,
            TeacherSeeder::class,
            CourseSeeder::class,
            CoursePersonSeeder::class
        ]);
    }
}
