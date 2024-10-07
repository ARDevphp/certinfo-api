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
            PhotoSeeder::class,
            PersonSeeder::class,
            TeacherSeeder::class,
            CourseSeeder::class,
            CoursePersonSeeder::class
        ]);
    }
}
