<?php

declare(strict_types=1);

namespace App\Services;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\SvgWriter;

class CertificateService
{
    public function generateQrCode(string $data): string
    {
        $qrCode = Builder::create()
            ->data($data)
            ->size(200)
            ->margin(10)
            ->writer(new SvgWriter())
            ->build();

        $qrSvgPath = storage_path('app/public/qr-code' . uniqid() . '.svg');
        file_put_contents($qrSvgPath, $qrCode->getString());

        return $qrSvgPath;
    }

    public function mergeQrWithTemplate(string $qrPath, string $name, string $surname): string
    {
        $templatePath = storage_path('app/public/photo/certificateTemplate.svg');

        $mainSvg = file_get_contents($templatePath);
        $qrSvg = file_get_contents($qrPath);

        $imageTag = '<image x="258" y="551" width="88" height="88" href="data:image/svg+xml;base64,' .
            base64_encode($qrSvg) . '" />';
        $nameTag = '<text x="30%" y="46%" font-size="27" fill="black" font-family="Arial">' .
            htmlspecialchars($name . ' ' . $surname) . '</text>';

        $combinedSvg = str_replace('</svg>', $imageTag . $nameTag . '</svg>', $mainSvg);

        $combinedSvgPath = storage_path('app/public/' . $name . uniqid() . '.svg');
        file_put_contents($combinedSvgPath, $combinedSvg);
//        $this->convertSvgToPngWithImagick($combinedSvgPath);

        return $combinedSvgPath;
    }

//    public function convertSvgToPngWithImagick(string $svgPath): string
//    {
//        $imagick = new \Imagick();
//
//        // DPI ni sozlash
//        $imagick->setResolution(300, 300);
//
//        $imagick->readImage($svgPath);
//        $imagick->setImageFormat('png');
//        $imagick->setOption('svg:use-librsvg', 'true');
//        $imagick->setOption('png:compression-level', '0'); // Kompressiyani o'chirish
//
//
//        // Rasm sifati
//        $imagick->setImageCompressionQuality(100);
//
//        $pngPath = storage_path('app/public/' . uniqid() . '.png');
//        $imagick->writeImage($pngPath);
//
//        return $pngPath;
//    }
}
