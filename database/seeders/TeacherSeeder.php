<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Teacher::create([
            'people_id' => 3,
            'phone' => '+380612345678',
            'information' => 'Php dasturchi 6 yildan dasturlash bilan shugulanadu',
            'address' => 'Andijon viloyati 53a uy',
            'salary' => 8000000
        ]);

        Teacher::create([
            'people_id' => 4,
            'phone' => '+380612345623',
            'information' => 'Java dasturchi 6 yildan dasturlash bilan shugulanadu',
            'address' => 'Tashkent viloyati 53a uy',
            'salary' => 7000000
        ]);

        Teacher::create([
            'people_id' => 5,
            'phone' => '+380612345675',
            'information' => 'Android dasturchi 6 yildan dasturlash bilan shugulanadu',
            'address' => 'Namangan viloyati 53a uy',
            'salary' => 5000000
        ]);
    }
}
