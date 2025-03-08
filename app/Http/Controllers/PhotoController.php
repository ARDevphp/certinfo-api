<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use Illuminate\Http\Client\Request;

class PhotoController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        return $request;
    }

    public function show(Photo $photo)
    {
        //
    }

    public function update(UpdatePhotoRequest $request, Photo $photo)
    {
        //
    }

    public function destroy(Photo $photo)
    {
        //
    }
}
