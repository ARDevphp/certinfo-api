<?php

namespace Database\Seeders;

use App\Models\Photo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Photo::create([
            'path' => 'people/1742272074_aandalus.jpg',
        ]);
        Photo::create([
            'path' => '/var/www/html/storage/app/public/certificatePhotos/Abdulaziz67d8f96b772b5.svg',
        ]);
         Photo::create([
             'path' => 'people/PHP.jpg',
         ]);
    }
}
