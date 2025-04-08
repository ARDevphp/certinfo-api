<?php

namespace App\Services\Certificate;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeService
{
    public function generateQrCode(string $current_url)
    {
        return QrCode::format('png')->size(130)->generate($current_url);
    }
}
