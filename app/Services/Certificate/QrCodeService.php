<?php

namespace App\Services\Certificate;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeService
{
    public function generateQrCode(string $current_url): string
    {
        $qrPath = QrCode::format('png')->size(130)->generate($current_url);
        $qrBinary = (string) $qrPath;

        return base64_encode($qrBinary);
    }
}
