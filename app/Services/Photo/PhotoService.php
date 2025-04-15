<?php

namespace App\Services\Photo;

use App\Models\Person;
use App\Repository\PhotoRepository;
use Illuminate\Support\Facades\Storage;

class PhotoService
{
    public function __construct(protected PhotoRepository $photoRepository)
    {
    }

    public function updatePhoto(?int $oldId, ?int $newId, ?Person $person): int
    {
        if (!$person) {
            return $newId ?? 1;
        }

        if ($newId && $oldId && $newId !== $oldId) {
            $this->deleteOldPhoto($oldId);
        }

        $person->photo_id = $newId ?? $oldId ?? 1;
        $person->save();

        return $person->photo_id;
    }

    private function deleteOldPhoto(int $photoId): void
    {
        $oldPhoto = $this->photoRepository->findById($photoId);

        if (!$oldPhoto) return;

        $path = 'public/' . $oldPhoto->path;

        if ($oldPhoto->path && Storage::disk('local')->exists($path)) {
            Storage::disk('local')->delete($path);
        }

        $oldPhoto->delete();
    }
}
