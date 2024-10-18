<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat Yaratildi</title>
</head>
<body>
<h1>Hurmatli {{ $certificate->student_name }}!</h1>
<p>Sizga yangi sertifikat yaratildi!</p>
<p>Kurs: {{ $certificate->course->name }}</p>
<p>Amaliyot: {{ $certificate->practice }}</p>
<p>Tafsilotlar uchun biz bilan bog'laning!</p>
</body>
</html>
