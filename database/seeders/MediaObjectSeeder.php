<?php

namespace Database\Seeders;

use App\Models\MediaObject;
use Illuminate\Database\Seeder;

class MediaObjectSeeder extends Seeder
{
    public function run(): void
    {
        MediaObject::create([
           'image' => 'http://lorempixel.com/640/480/sports/',
        ]);

        MediaObject::create([
            'image' => 'http://lorempixel.com/640/480/sports/',
        ]);

        MediaObject::create([
            'image' => 'http://lorempixel.com/640/480/sports/',
        ]);

        MediaObject::create([
            'image' => 'http://lorempixel.com/640/480/sports/',
        ]);

        MediaObject::create([
            'image' => 'http://lorempixel.com/640/480/sports/',
        ]);

        MediaObject::create([
            'image' => 'http://lorempixel.com/640/480/sports/',
        ]);
    }
}
