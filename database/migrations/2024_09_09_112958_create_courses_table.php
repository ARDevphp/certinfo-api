<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('course_info');
            $table->date('start_course');
            $table->string('course_duration');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
