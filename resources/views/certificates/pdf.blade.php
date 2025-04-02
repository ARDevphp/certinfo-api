<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700;900&display=swap"
          rel="stylesheet">
    <style>
        @page {
            size: A4;
            margin: 0;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .certificate-container {
            position: relative;
            width: 100%;
            height: 100vh;
        }

        .certificate-container img {
            width: 100%;
            height: 100%;
            border-radius: 5%;
            object-fit: cover;
        }

        .student-name {
            position: absolute;
            top: 42%;
            left: 40%;
            transform: translate(-40%, -40%);
            font-size: 41px;

            color: #CCB800;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .qr-code {
            position: absolute;
            width: 150%; /* Kichikroq qilish */
            height: 150%; /* Kichikroq qilish */
            top: 242px; /* Yuqoriga surish */
            right: 42px; /* Chap yoki o‘ngga surish */
        }

    </style>
</head>

<body>
<div class="certificate">
    <div class="certificate-container">
        <div class="text-red-500 text-3xl">Salom, Tailwind!</div>
        <img src="data:image/svg;base64,{{ base64_encode(file_get_contents($imagePath)) }}" alt="Certificate">
        <img class="qr-code" width="5px" height="5px" src="data:image/svg;base64,{{ base64_encode(file_get_contents( $qr_code )) }}" alt="qr_code">
        <div class="student-name">Mirzayev Abdulaziz</div>
    </div>
</div>
</body>
</html>
