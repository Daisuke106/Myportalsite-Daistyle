<?php
// save_purchase.php

// データベース接続設定
$host = "データベースホスト";
$dbname = "データベース名";
$username = "ユーザー名";
$password = "パスワード";

// POSTデータを受け取る
$name = $_POST['name'];
$product = $_POST['product'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$postalcode = $_POST['postalcode'];
$city_address = $_POST['city_address'];
$after_address = $_POST['after_address'];
$mail = $_POST['mail'];
$tel = $_POST['tel'];
$delivery_date = $_POST['delivery_date'];
$payment_method = $_POST['payment_method'];

try {
    // データベース接続
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // データベースにデータを挿入
    $sql = "INSERT INTO purchase_info (name, product, quantity, price, postalcode, city_address, after_address, mail, tel, delivery_date, payment_method)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $product, $quantity, $price, $postalcode, $city_address, $after_address, $mail, $tel, $delivery_date, $payment_method]);

    // メール送信
    $subject = '注文確認';
    $message = "ご注文内容:\n商品: $product\n個数: $quantity\n価格: $price\nお名前: $name\n...";
    mail($mail, $subject, $message);

    echo "購入情報が保存されました。";
} catch (PDOException $e) {
    echo "エラーが発生しました: " . $e->getMessage();
}
?>
