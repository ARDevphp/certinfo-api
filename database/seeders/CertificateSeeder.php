<?php

namespace Database\Seeders;

use App\Models\Certificate;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CertificateSeeder extends Seeder
{
    public function run(): void
    {
        Certificate::factory()->count(150)->create();
    }
}
