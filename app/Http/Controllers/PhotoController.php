<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;

class PhotoController extends Controller
{
    public function index()
    {
        //
    }

    public function store(StorePhotoRequest $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('people', $fileName,  'public');

            $photo = Photo::create([
                'path' =>  $filePath
            ]);

            return response()->json([
                'id' => $photo->id,
            ]);
        }

        return response()->json(['error' => 'Fayl topilmadi!'], 400);
    }

    public function show(Photo $photo)
    {
        //
    }

    public function update(UpdatePhotoRequest $request, $id)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            return response()->json([
                'filename' => $file->getClientOriginalName(),
                'size' => $file->getSize(),
                'type' => $file->getMimeType(),
            ]);
        }

        return response()->json(['error' => 'Fayl topilmadi!'], 400);
    }

    public function destroy(Photo $photo)
    {
        //
    }
}
