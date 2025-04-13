<?php

namespace App\Services\Certificate;

class FileName
{
    public function fileNameGenerate(string $name)
    {
        return 'app/public/certificatePhotos/' . $name . uniqid() . '_certificate.svg';
    }
}
