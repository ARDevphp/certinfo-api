<?php

namespace App\Services\Certificate;

class QrEmbedService
{
    public function embed(string $qrPath, string $svg)
    {
        $qrImageDataUri = 'data:image/png;base64,' . $qrPath;

        return str_replace('{{ qrSvg }}', $qrImageDataUri, $svg);
    }
}
