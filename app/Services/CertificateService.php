<?php

declare(strict_types=1);

namespace App\Services;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\SvgWriter;
use Imagick;

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

    public function mergeQrWithTemplate(string $qrPath, string $name, string $surname, string $course_name): string
    {
        $templatePath = storage_path('app/public/photo/certificateTemplate.svg');

        $mainSvg = file_get_contents($templatePath);
        $qrSvg = file_get_contents($qrPath);

        $imageTag = '<image x="258" y="551" width="88" height="88" href="data:image/svg+xml;base64,' .
            base64_encode($qrSvg) . '" />';
        $nameTag = '<text x="50%" y="45%" font-size="40" fill="#CCB800" font-family="Arial" text-anchor="middle" dominant-baseline="middle">' .
            htmlspecialchars($name . ' ' . $surname) . '</text>';

        $course = '<text x="50%" y="58%" font-family="Arial, sans-serif" font-size="34" fill="black" text-anchor="middle">' . "$course_name" . '</text>';

        $date = '<text style="font-weight: 900; color: #FFD700; font-size: 20px;" x="274" y="85" font-family="Arial, sans-serif" fill="#FFDD33">'. date('Y') . '</text>';

        $combinedSvg = str_replace('</svg>', $imageTag. $course. $nameTag. $date. '</svg>', $mainSvg);

        unlink($qrPath);
        $combinedSvgPath = storage_path('app/public/certificatePhotos/' . $name . uniqid() . '.svg');
        file_put_contents($combinedSvgPath, $combinedSvg);

//        svg to png converting
//        $this->convertSvgToPngWithImagick($combinedSvgPath);

        return $combinedSvgPath;
    }

    public function convertSvgToPngWithImagick(string $svgPath): string
    {

        $image = new Imagick();
        $image->readImageBlob(file_get_contents($svgPath));
        $image->setImageFormat("png24");
        $image->resizeImage(1024, 768, Imagick::FILTER_LANCZOS, 1);

        $pngPath = storage_path('app/public/' . uniqid() . '.png');
        $image->writeImage($pngPath);
        $image->clear();
        $image->destroy(); // Memoryni tozalash

        return $pngPath;
    }
}
