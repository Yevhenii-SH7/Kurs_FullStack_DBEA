<?php
require __DIR__ . '/vendor/autoload.php'; // Путь к autoload.php

use Picqer\Barcode\BarcodeGeneratorPNG;

$generator = new BarcodeGeneratorPNG();
$barcode = $generator->getBarcode('123456789012', $generator::TYPE_EAN_13);

header('Content-Type: image/png');
echo $barcode;