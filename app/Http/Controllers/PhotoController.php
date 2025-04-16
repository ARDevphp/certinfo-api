<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePhotoRequest;
use App\Services\Photo\PhotoCreateService;

class PhotoController extends Controller
{
    public function __construct(
        protected PhotoCreateService $photoCreateService
    ){
    }

    public function store(StorePhotoRequest $request)
    {
        $photo = $this->photoCreateService->create($request->file('file'));

        return $this->response(['id' => $photo->id, 'message' => "Rasm muvaffaqiyatli yuklandi."], 201);
    }
}
