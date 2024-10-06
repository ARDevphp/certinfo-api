<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'people_id',
        'phone',
        'photo_id',
        'information',
        'address',
        'salary',
    ];


    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class, 'people_id');
    }
    public function photo(): MorphMany
    {
        return $this->morphMany(Photo::class, 'photoable');
    }
}
