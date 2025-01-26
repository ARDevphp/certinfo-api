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
            'path' => 'http://lorempixel.com/640/480/sports/',
        ]);

        Photo::create([
            'path' => 'http://lorempixel.com/640/480/sports/',
        ]);

        Photo::create([
            'path' => 'http://lorempixel.com/640/480/sports/',
        ]);

        Photo::create([
            'path' => 'http://lorempixel.com/640/480/sports/',
        ]);

        Photo::create([
            'path' => 'http://lorempixel.com/640/480/sports/',
        ]);

        Photo::create([
            'path' => 'http://lorempixel.com/640/480/sports/',
        ]);
    }
}
