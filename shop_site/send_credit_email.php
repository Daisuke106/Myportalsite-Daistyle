<?php
// send_credit_email.php
require '..\vendor\autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
date_default_timezone_set('Asia/Tokyo');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $cardNumber = $_POST['cardnumber'];
    $expirationDate = $_POST['expirationdate'];
    $securityCode = $_POST['securitycode'];
    $email = $_POST['email'];
    $price = "￥65,000"; // ご注文金額を取得する
    $product = "一眼レフカメラ"; // 商品名を取得する
    
    $paymentTime = date('Y-m-d H:i:s'); // 決済時間を現在の日時に設定


    // この関数は、適切なバリデーション処理を行うものとします
function validateCreditCardInfo($name, $cardNumber, $expirationDate, $securityCode, $email) {
    // バリデーション処理を実装する
    // 正しいクレジットカード情報であるかをチェックし、結果を返す
    return true; // もし正しい情報であれば true を返す
}

    // クレジットカード情報が正常であれば、データベースへの保存とメール処理を行う
    if (validateCreditCardInfo($name, $cardNumber, $expirationDate, $securityCode, $email)) {

        // メール送信処理
        try {
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // 例: smtp.gmail.com
            $mail->Port = 587; // ポート番号（お使いの環境に合わせて変更）
            $mail->SMTPAuth = true;
            $mail->Username = 'k022c2145@g.neec.ac.jp'; // 送信元メールアドレス
            $mail->Password = 'xhsqqxobwgjahkrn'; // 送信元メールアドレスのパスワード
            $mail->setFrom('k022c2145@g.neec.ac.jp', 'Daistyle'); // 送信元メールアドレスと名前
            $mail->CharSet = "UTF-8";
            $mail->Encoding="base64";
            $mail->addAddress($email, $name); // フォームに入力されたメールアドレス
            $mail->addBCC('k022c2145@g.neec.ac.jp', 'Daistyle'); // 自分のメールアドレスをBCCに指定
            $mail->Subject = 'クレジット決済が完了しました';
            $mail->Body = "$name 様\n"
            . "Daistyleへのご注文ありがとうございます。\n"
            . "\n"
            . "ご注文内容:\n"
            . "商品名: $product\n"
            . "ご注文金額: $price\n"
            . "決済時間: $paymentTime\n"
            . "カード番号: **** **** **** " . substr($cardNumber, -4) . "\n"
            . "カード番号（表示）: $cardNumber\n"
            . "有効期限: $expirationDate\n"
            . "セキュリティコード: ***\n"
            . "\n"
            . "お客様のご注文が確定されました。\n"
            . "ショッピングをお楽しみください！！\n"
            . "\n"
            . "Daistyle\n"
            . "https://www.google.com/"
            ;

            $mail->send();

            echo "メールが送信されました。";
        } catch (Exception $e) {
            echo "メール送信エラー: " . $mail->ErrorInfo;
        }

    }
}
?>
