<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Person::create([
//            'user_id' => 1,
//            'firstname' => 'asasa',
//            'lastname' => 'dsdd',
//            'birthday' => '2024-09-22'
//        ]);
       Person::factory()->count(200)->create();
    }
}
