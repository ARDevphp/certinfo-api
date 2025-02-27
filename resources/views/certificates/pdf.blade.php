<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<div class="certificate">
    <img class="qr-code" src="data:image/png;base64,{{ base64_encode(file_get_contents($file_path)) }} }}" alt="QR Code">
</div>
</body>
</html>
