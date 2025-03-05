<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['id', 'path'];
    protected $guarded = [];

    public function photoable(): MorphTo
    {
        return $this->morphTo();
    }

    public function getFullPath(): string
    {
        if (str_contains($this->path, 'people')) {
            return asset('storage/people/' . basename($this->path));
        } else {
            return asset('storage/certificatePhotos/' . basename($this->path));
        }
    }
}
