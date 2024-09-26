<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'course_info', 'start_course', 'course_duration'];

    public function people(): BelongsToMany
    {
        return $this->belongsToMany(Person::class, 'course_people', 'course_id', 'people_id');
    }
}
