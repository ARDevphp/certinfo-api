<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sertifikat</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }
    </style>
</head>
<body>
<h1>Sertifikat</h1>
<p>Talaba: {{ $certificate->student_name }} {{ $certificate->student_family }}</p>
<p>Kurs: {{ $certificate->course->name }}</p>
<p>Amaliyot: {{ $certificate->practice }}</p>
<p>Sertifikatni himoya qilish: {{ $certificate->certificate_protection }}</p>
<p>Kurs tugatish sanasi: {{ $certificate->finish_course }}</p>

<!-- QR kodni joylashtirish -->
<div>
    <img src="data:image/png;base64" alt="QR Code">
</div>
</body>
</html>
