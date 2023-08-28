<?php
session_start(); // セッションを開始
date_default_timezone_set('Asia/Tokyo');
$dsn = 'mysql:dbname=sample;host=localhost;charset=utf8';
$db_user = 'root';
$db_password = '';

require '..\vendor\autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["item_id"])) {
    $item_id = $_POST["item_id"];
    
    if (isset($_SESSION["cart"])) {
        $_SESSION["cart"][$item_id] = isset($_SESSION["cart"][$item_id]) ? $_SESSION["cart"][$item_id] + 1 : 1;
    } else {
        $_SESSION["cart"] = array($item_id => 1);
    }
}
// ログイン状態を判定
if (isset($_SESSION["user_id"])) {
    $welcome_message = "ようこそ " . $_SESSION["user_name"] . " さん";
} else {
    $welcome_message = "ログイン";
}

// // メール送信設定
// $mail = new PHPMailer();
// $mail->isSMTP();
// $mail->Host = 'smtp.gmail.com'; // 例: smtp.gmail.com
// $mail->Port = 587; // ポート番号（お使いの環境に合わせて変更）
// $mail->SMTPAuth = true;
// $mail->Username = 'k022c2145@g.neec.ac.jp'; // 送信元メールアドレス
// $mail->Password = 'xhsqqxobwgjahkrn'; // 送信元メールアドレスのパスワード
// $mail->setFrom('k022c2145@g.neec.ac.jp', 'Daistyle'); // 送信元メールアドレスと名前

if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // フォームから送信されたデータを受け取る
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $postalCode = $_POST['postal-code'];
    $prefecture = $_POST['prefecture'];
    $city = $_POST['city'];
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $tel = isset($_POST['tel']) ? $_POST['tel'] : '';
    $deliveryDate = $_POST['delivery-date'] . ' ' . $_POST['delivery-time'];
    $paymentMethod = isset($_POST['payment-method']) ? $_POST['payment-method'] : '';
    $product = "一眼レフカメラ"; // 商品名
    $price = "65,000"; // 商品価格

        try {
            $dbh = new PDO($dsn, $db_user, $db_password);
    
            // データベースにデータを挿入
            $sql = "INSERT INTO finalpurchase (name, product, quantity, price, postalcode, prefecture, city, address, mail, tel, delivery_date, payment_method) VALUES (:name, :product, :quantity, :price, :postalcode, :prefecture, :city, :address, :mail, :tel, :delivery_date, :payment_method)";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':product', $product);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':postalcode', $postalCode);
            $stmt->bindParam(':prefecture', $prefecture);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':mail', $email);
            $stmt->bindParam(':tel', $tel);
            $stmt->bindParam(':delivery_date', $deliveryDate);
            $stmt->bindParam(':payment_method', $paymentMethod);
            $stmt->execute();



        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // 例: smtp.gmail.com
        $mail->Port = 587; // ポート番号（お使いの環境に合わせて変更）
        $mail->SMTPSecure = 'tls'; // TLS 接続を使用
        $mail->SMTPAuth = true;
        $mail->Username = 'k022c2145@g.neec.ac.jp'; // 送信元メールアドレス
        $mail->Password = 'xhsqqxobwgjahkrn'; // 送信元メールアドレスのパスワード
        $mail->setFrom('k022c2145@g.neec.ac.jp', 'Daistyle'); // 送信元メールアドレスと名前

        $mail->addAddress($email, $name); // フォームに入力されたメールアドレス
        $mail->addBCC('k022c2145@g.neec.ac.jp', 'Daistyle'); // 自分のメールアドレスをBCCに指定
        $mail->CharSet = "UTF-8";
        $mail->isHTML(true); // HTMLフォーマットのメール本文を使用！！！
        $mail->Encoding="base64";
        $mail->Subject = '注文確認について';

        // $mail->Debugoutput = 'html'; // エラーメッセージをHTML形式で表示
        // $mail->SMTPDebug = 4; // より詳細なデバッグ情報を出力

        
        // メール本文の設定
        $mail->Body = "お客様のご注文が確定されました。<br><br>"
        . "【注文内容】<br>"
        . "商品名: $product<br>"
        . "価格: $price<br>"
        . "数量: $quantity<br><br>"
        . "【お届け先情報】<br>"
        . "お名前: $name<br>"
        . "郵便番号: $postalCode<br>"
        . "都道府県: $prefecture<br>"
        . "市区町村: $city<br>"
        . "住所: $address<br>"
        . "メールアドレス: $email<br>"
        . "電話番号: $tel<br><br>"
        . "【お支払い情報】<br>"
        . "配達予定日時: $deliveryDate<br>"
        . "決済方法: $paymentMethod<br><br>"
        . "ご注文いただき、誠にありがとうございます。<br>"
        . "どうぞお楽しみにお待ちください。<br><br>"
        . "Daistyle オンラインショップ<br>";

        // $mail->Body = mb_convert_encoding($mail->Body, 'auto', 'UTF-8'); // 正しい文字エンコーディングに変換

        if (!$mail->send()) {
            $response = array('error' => 'メールの送信に失敗しました: ' . $mail->ErrorInfo);
            echo json_encode($response);
        } else {
            $response = array('message' => '注文が確定し、メールが送信されました');
            echo json_encode($response);
        }
    } catch (PDOException $e) {
        $response = array('error' => 'エラーが発生しました: ' . $e->getMessage() . ' - SQL: ' . $sql);
        echo json_encode($response);
    }
}


?>