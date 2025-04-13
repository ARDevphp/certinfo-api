<?php

namespace App\Repository;

use App\Models\Photo;

class PhotoRepository
{
    public function create($path)
    {
        return Photo::create([
            'path' => $path,
        ]);
    }

    public function findById(int $id): Photo
    {
        return Photo::where('id', $id)->first();
    }
}
