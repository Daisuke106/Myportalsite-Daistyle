<?php
session_start();

// ログインしているかチェック
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // ログインページにリダイレクト
    exit;
}

// ここにダッシュボードのコンテンツを記述
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome to the Dashboard!</h1>
    <p>This is the content of the dashboard.</p>
    <a href="logout.php">Logout</a> <!-- ログアウトページへのリンク -->
</body>
</html>
