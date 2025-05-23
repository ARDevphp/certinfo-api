<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('student_family');
            $table->string('student_email');
            $table->foreignId('people_id')->constrained('people')->cascadeOnDelete();
            $table->foreignId('course_id')->constrained()->cascadeOnDelete();
            $table->string('file_path')->nullable();
            $table->text('practice');
            $table->text('certificate_protection');
            $table->date('finish_course');
            $table->softDeletes();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
