<?php
declare(strict_types=1);
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;


// 1st step:  paste niyo muna itong naka comment na line 7-14  sa terminal ng laravel,

// mkdir php-qr-code-generator
// mkdir php-qr-code-generator/src/QR/Image
// mkdir php-qr-code-generator/src/QR/Options
// mkdir php-qr-code-generator/public/img

// cd php-qr-code-generator 

// 2nd step: paste niyo yung line 17 sa terminal
// composer require chillerlan/php-qrcode

// 3rd step: paste niyo na tong code sa blade.php

require_once('./../vendor/autoload.php');

$options = new QROptions(
  [
    'eccLevel' => QRCode::ECC_L,
    'outputType' => QRCode::OUTPUT_MARKUP_SVG,
    'version' => 5,
  ]
);
//dito niyo lagay yung magiging value ng QR 
$valueQR = "PSU-2022-93RxbEBjeFv4";

$qrcode = (new QRCode($options))->render($valueQR);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>QR Codes</title>
  <link rel="stylesheet" href="/css/styles.min.css">
</head>
<body>
<div class="container">
    <!-- ito yung image na mag didisplay ng qrcode -->
  <img src='<?= $qrcode ?>' alt='QR Code' width='200' height='200'>
</div>
</body>
</html>