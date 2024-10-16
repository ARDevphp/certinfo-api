<!DOCTYPE html>
<html>
<head>
    <title>Sertifikat</title>
</head>
<body>
<h1>{{ $certificate->student_name }} ning Sertifikati</h1>
<p>Kurs nomi: {{ $certificate->course->name }}</p>
<p>Email: {{ $certificate->student_email }}</p>
<p>Tajriba: {{ $certificate->practice }}</p>
<p>Sertifikat himoyasi: {{ $certificate->certificate_protection }}</p>
<p>Kursni tugatgan sana: {{ $certificate->finish_course }}</p>

<!-- QR kod -->
<div>
    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->generate(route('certificates.show', $certificate->id))) !!} " alt="QR code">
</div>
</body>
</html>
