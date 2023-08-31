<?php
session_start();

$dsn = 'mysql:dbname=sample;host=localhost;charset=utf8';
$db_user = 'root';
$db_password = '';

try {
    $dbh = new PDO($dsn, $db_user, $db_password);
} catch (PDOException $e) {
    echo "データベースに接続できませんでした。";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ユーザーアカウントの確認状態をチェック
    $stmt = $dbh->prepare("SELECT id, is_confirmed FROM finalusers WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $user['confirmed'] == 1) {
        // アカウントが承認済みであればログイン成功
        $_SESSION['user_id'] = $user['id'];
        header("Location: welcome.php"); // ログイン後のページにリダイレクト
    } elseif ($user && $user['confirmed'] == 0) {
        // アカウントが未承認の場合、再度確認メールを送信するページにリダイレクト
        header("Location: resend_confirmation.php?username=" . urlencode($username));
    } else {
        // ユーザーが存在しない場合など、エラー処理
        echo "ログインに失敗しました。";
    }
} else {
    echo "無効なリクエストです。";
}
?>
