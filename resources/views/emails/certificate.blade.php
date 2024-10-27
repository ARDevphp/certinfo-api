<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f3f4f6;
        }
        .certificate {
            width: 800px;
            height: 600px;
            padding: 20px;
            border: 10px solid #e0dcdc;
            border-radius: 10px;
            background: white;
            position: relative;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .subheader {
            font-size: 18px;
            color: #666;
            margin-top: 10px;
        }
        .name {
            font-size: 40px;
            font-family: 'Great Vibes', cursive;
            color: #D4AF37;
            margin-top: 20px;
        }
        .content {
            font-size: 20px;
            margin-top: 20px;
        }
        .qr-seal {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
        }
        .qr-code, .seal {
            display: inline-block;
            margin: 10px;
        }
        .qr-code img, .seal img {
            width: 100px;
        }
        .footer {
            position: absolute;
            bottom: 30px;
            width: 100%;
            text-align: center;
        }
        .footer .sign {
            font-family: 'Great Vibes', cursive;
            font-size: 28px;
        }
        .footer .position {
            font-size: 16px;
            color: #333;
        }
        .lines {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: linear-gradient(135deg, transparent 50%, #9B59B6 50%), linear-gradient(-135deg, transparent 50%, #9B59B6 50%);
            background-size: 60px 60px;
            z-index: -1;
            opacity: 0.5;
        }
    </style>
</head>
<body>
<div class="certificate">
    <div class="lines"></div>
    <div class="header">CERTIFICATE</div>
    <div class="subheader">This is to certify that</div>
    <div class="name">ABDULAZIZ MIRZAYEV</div>
    <div class="subheader">has successfully completed the</div>
    <div class="content">PHP Dasturlash tili</div>
    <div class="qr-seal">
        <div class="qr-code">
            <img src="qr-code.png" alt="QR Code">
        </div>
        <div class="seal">
            <img src="seal.png" alt="Seal">
        </div>
    </div>
    <div class="footer">
        <div class="sign">Akmal Kadirov</div>
        <div class="position">CTO</div>
    </div>
</div>
</body>
</html>
