<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certificate extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_name',
        'student_family',
        'student_email',
        'course_id',
        'practice',
        'certificate_protection',
        'finish_course',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
