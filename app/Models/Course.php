<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'course_info',
        'teacher_id',
        'photo_id',
        'start_course',
        'course_duration'
    ];

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }
    public function people(): BelongsToMany
    {
        return $this->belongsToMany(Person::class);
    }

    public function certificates(): HasMany
    {
        return $this->hasMany(Certificate::class);
    }

    public function photo(): MorphMany
    {
        return $this->morphMany(Photo::class, 'photoable');
    }
}
