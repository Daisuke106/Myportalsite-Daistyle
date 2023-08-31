<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Generator Test</title>
</head>
<body>
    <h1>QR Code Generator Test</h1>

    <?php
        require '..\vendor\autoload.php';

    // QRコード画像を生成するスクリプトのURL
    $qrCodeScriptUrl = 'generate_qr_code.php';

    // QRコード画像のデータを取得
    $qrCodeImageData = file_get_contents($qrCodeScriptUrl);

    // 生成されたQRコード画像を表示
    echo '<img src="data:image/png;base64,' . base64_encode($qrCodeImageData) . '" alt="QR Code">';
    ?>
</body>
</html>
