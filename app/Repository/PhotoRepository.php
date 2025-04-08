<?php

namespace App\Repository;

use App\Models\Photo;

class PhotoRepository
{
    public function create(array $data)
    {
        return Photo::create([
            'path' => $data['path'],
        ]);
    }

    public function findById(int $id): Photo
    {
        return Photo::where('id', $id)->first();
    }
}
