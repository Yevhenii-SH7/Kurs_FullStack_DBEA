<?php
// Подключаем библиотеку штрих-кодов вручную
require_once __DIR__ . '/php-barcode-generator/src/Barcode.php';
require_once __DIR__ . '/php-barcode-generator/src/BarcodeBar.php';
require_once __DIR__ . '/php-barcode-generator/src/BarcodeGenerator.php';
require_once __DIR__ . '/php-barcode-generator/src/BarcodeGeneratorPNG.php';
require_once __DIR__ . '/php-barcode-generator/src/BarcodeGeneratorSVG.php';
require_once __DIR__ . '/php-barcode-generator/src/BarcodeGeneratorJPG.php';
require_once __DIR__ . '/php-barcode-generator/src/BarcodeGeneratorHTML.php';

// Подключаем исключения
require_once __DIR__ . '/php-barcode-generator/src/Exceptions/BarcodeException.php';
require_once __DIR__ . '/php-barcode-generator/src/Exceptions/InvalidCharacterException.php';
require_once __DIR__ . '/php-barcode-generator/src/Exceptions/InvalidCheckDigitException.php';
require_once __DIR__ . '/php-barcode-generator/src/Exceptions/InvalidFormatException.php';
require_once __DIR__ . '/php-barcode-generator/src/Exceptions/InvalidLengthException.php';
require_once __DIR__ . '/php-barcode-generator/src/Exceptions/InvalidOptionException.php';
require_once __DIR__ . '/php-barcode-generator/src/Exceptions/UnknownColorException.php';
require_once __DIR__ . '/php-barcode-generator/src/Exceptions/UnknownTypeException.php';

// Подключаем хелперы
require_once __DIR__ . '/php-barcode-generator/src/Helpers/BinarySequenceConverter.php';
require_once __DIR__ . '/php-barcode-generator/src/Helpers/ColorHelper.php';
require_once __DIR__ . '/php-barcode-generator/src/Helpers/StringHelpers.php';

// Подключаем рендереры
require_once __DIR__ . '/php-barcode-generator/src/Renderers/RendererInterface.php';
require_once __DIR__ . '/php-barcode-generator/src/Renderers/PngRenderer.php';
require_once __DIR__ . '/php-barcode-generator/src/Renderers/JpgRenderer.php';
require_once __DIR__ . '/php-barcode-generator/src/Renderers/DynamicHtmlRenderer.php';
require_once __DIR__ . '/php-barcode-generator/src/Renderers/HtmlRenderer.php';
require_once __DIR__ . '/php-barcode-generator/src/Renderers/SvgRenderer.php';

// Подключаем типы штрих-кодов
require_once __DIR__ . '/php-barcode-generator/src/Types/TypeInterface.php';
require_once __DIR__ . '/php-barcode-generator/src/Types/TypeCode128.php';
require_once __DIR__ . '/php-barcode-generator/src/Types/TypeCode128A.php';
require_once __DIR__ . '/php-barcode-generator/src/Types/TypeCode128B.php';
require_once __DIR__ . '/php-barcode-generator/src/Types/TypeCode128C.php';

// Используем генератор PNG
$generator = new Picqer\Barcode\BarcodeGeneratorPNG();

// Генерируем штрих-код
$barcode = $generator->getBarcode('123456789', $generator::TYPE_CODE_128);

// Устанавливаем заголовок для отображения изображения
header('Content-Type: image/png');
header('Content-Length: ' . strlen($barcode));

// Выводим штрих-код
echo $barcode;
?>