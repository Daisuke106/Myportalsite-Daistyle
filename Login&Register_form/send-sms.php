<?php
require '..\vendor\autoload.php'; // Twilioのライブラリを読み込む

use Twilio\Rest\Client;

// TwilioのアカウントIDとトークンを設定
$accountSid = 'AC4f73aca8c422a22e0b0b2175ffe5b777';
$authToken = '1b523008787294c940ba2af1789f8188';

// Twilioクライアントを初期化
$client = new Client($accountSid, $authToken);

// SMSを送信する
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phoneNumber = $_POST['phoneNumber'];
    $message = 'この度はDaistyleをご利用いただきありがとうございます。';

    try {
        $client->messages->create(
            $phoneNumber,
            [
                'from' => '+18643873634',
                'body' => $message
            ]
        );
        $status = 'Message sent successfully!';
    } catch (Exception $e) {
        $status = 'Error sending message: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Send SMS using Twilio</title>
</head>
<body>
    <h1>Send SMS using Twilio</h1>
    <form method="POST">
        <label for="phoneNumber">Enter phone number:</label>
        <input type="tel" id="phoneNumber" name="phoneNumber" required>
        <button type="submit">Send SMS</button>
    </form>
    <?php if(isset($status)) { echo "<p>$status</p>"; } ?>
</body>
</html>
