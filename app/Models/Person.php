<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Person extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['id', 'user_id', 'firstname', 'lastname', 'birthday', 'photo_id'];

    protected $attributes = ['photo_id' => null];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'course_person', 'person_id', 'course_id');
    }

    public function teacher(): HasOne
    {
        return $this->hasOne(Teacher::class);
    }
}
