<?php
// データベースに接続する設定
$dsn = 'mysql:dbname=sample;host=localhost;charset=utf8';
$db_user = 'root'; // データベースユーザ名
$db_password = ''; // データベースパスワード

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $dbh = new PDO($dsn, $db_user, $db_password);

        $id = mt_rand(100000, 999999);
        $time = date("Y-m-d H:i:s");

        $stmt = $dbh->prepare("INSERT INTO finalusers (id, username, email, password, time) VALUES (:id, :username, :email, :password, :time)");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':time', $time);
        $stmt->execute();

        echo "User registration successful!";

        $dbh = null;
    } catch (PDOException $e) {
        exit("Failed to connect to the database: " . $e->getMessage());
    }
}
?>