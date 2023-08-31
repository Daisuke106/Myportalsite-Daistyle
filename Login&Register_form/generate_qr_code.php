<?php
require_once __DIR__ . '../vendor/autoload.php';

use Endroid\QrCode\Builder\Builder;

// QRコードの内容
$qrContent = 'こんにちは';

// QRコードを生成
$qrCode = Builder::create()
    ->data($qrContent)
    ->size(300)
    ->build();

// QRコードの画像を表示
header('Content-Type: image/png');
echo $qrCode->getResult()->getString();
?>
