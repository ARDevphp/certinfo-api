<?php

namespace App\Services\Photo;

use Illuminate\Http\UploadedFile;
use App\Repository\PhotoRepository;

class PhotoCreateService
{
    public function __construct(protected PhotoRepository $photoRepository)
    {
    }

    public function create(UploadedFile $file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('people', $fileName, 'public');

        return $this->photoRepository->create($filePath);
    }
}
