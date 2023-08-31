<?php
// send_complete_email.php

date_default_timezone_set('Asia/Tokyo');
$dsn = 'mysql:dbname=sample;host=localhost;charset=utf8';
$db_user = 'root';
$db_password = '';

require '..\vendor\autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendCompleteEmailResponse($email, $username, $app_password, $id) {
    mb_language('uni');
    mb_internal_encoding('UTF-8');

    $mail = new PHPMailer(true);

    try {
        $host        = 'smtp.gmail.com';
        $mailname    = $email; // Your Gmail address
        $password    = $app_password; // Your Gmail App Password
        $idname      = $username;
    
        $from        = 'k022c2145@g.neec.ac.jp';
        $fromname    = 'Daistyle';
    
        $to = $email;
        $toname = $username;
    
        $subject = '【登録完了】Daistyleへの会員登録が完了しました。';
        $body =  "$idname 様\n"
                ."Daistyleへの会員登録ありがとうございます。" . "\n"
                ."\n"
                . "ご登録が完了しました。" . "\n"
                . "あなたのid番号をお知らせします。" . "\n"
                ."\n"
                . "id番号は" . $id . "です。" . "\n"
                . "id番号はログイン時に必要になります。" . "\n"
                . "id番号を忘れないようにしてください。" . "\n"
                ."ショッピングをお楽しみください！！" . "\n"
                . "\n"
                . 'このメールに心当たりがない場合は、このメールを破棄してください。'
                . "\n"
                . 'Daistyle'
                . "\n"
                . 'http://localhost:3000/shop_site/top_page/main.php'
                . "\n";

        // デバッグ設定
        $mail->SMTPDebug = 2; // デバッグ出力を有効化（レベルを指定）
        $mail->Debugoutput = function($str, $level) {
            echo "debug level $level; message: $str<br>";
        };
    
        // SMTPサーバの設定
        $mail->isSMTP();                          // SMTPの使用宣言
        $mail->Host       = $host;   // SMTPサーバーを指定
        $mail->SMTPAuth   = true;                 // SMTP authenticationを有効化
        $mail->Username   = $mailname;   // SMTPサーバーのユーザ名
        $mail->Password   = $password;           // SMTPサーバーのパスワード
        $mail->SMTPSecure = 'tls';  // 暗号化を有効（tls or ssl）無効の場合はfalse
        $mail->Port       = 587; // TCPポートを指定（tlsの場合は465や587）
        $mail->setFrom($from, $fromname);
        $mail->addAddress($to, $toname);
        $mail->CharSet = "UTF-8";
        $mail->Encoding="base64";
    
        // 送信内容設定
        $mail->Subject = $subject; 
        $mail->Body    = $body;  
    
        // 送信
        $mail->send();
        echo "ユーザー: $username に対するメール送信成功<br>"; // 送信成功時にメッセージを返す
    } catch (Exception $e) {
        // エラーの場合
        echo "ユーザー: $username に対するメール送信に失敗しました: " . $mail->ErrorInfo;
    }
}
?>
