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

    public function mergeQrWithTemplate(string $qrPath, string $name, string $surname, string $finish_course): string
    {
        $templatePath = storage_path('app/public/photo/certificateTemplate.svg');

        $mainSvg = file_get_contents($templatePath);
        $qrSvg = file_get_contents($qrPath);

        $imageTag = '<image x="258" y="551" width="88" height="88" href="data:image/svg+xml;base64,' .
            base64_encode($qrSvg) . '" />';
        $nameTag = '<text x="50%" y="46%" font-size="40" fill="#CCB800" font-family="Arial" text-anchor="middle" dominant-baseline="middle">' .
            htmlspecialchars($name . ' ' . $surname) . '</text>';

        $date = '<text style="font-weight: 900; color: #FFD700; font-size: 20px;"
                       x="274" y="85" font-family="Arial, sans-serif" fill="#FFDD33"
                 >'. date('Y') . '</text>';

        $combinedSvg = str_replace('</svg>', $imageTag . $nameTag . $date . '</svg>', $mainSvg);

        unlink($qrPath);
        $combinedSvgPath = storage_path('app/public/' . $name . uniqid() . '.svg');
        file_put_contents($combinedSvgPath, $combinedSvg);

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
