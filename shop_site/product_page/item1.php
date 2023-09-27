<?php
// session_start(); // セッションを開始
// date_default_timezone_set('Asia/Tokyo');
// $dsn = 'mysql:dbname=sample;host=localhost;charset=utf8';
// $db_user = 'root';
// $db_password = '';

// require '..\..\vendor\autoload.php';
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["item_id"])) {
//     $item_id = $_POST["item_id"];
    
//     if (isset($_SESSION["cart"])) {
//         $_SESSION["cart"][$item_id] = isset($_SESSION["cart"][$item_id]) ? $_SESSION["cart"][$item_id] + 1 : 1;
//     } else {
//         $_SESSION["cart"] = array($item_id => 1);
//     }
// }
// // ログイン状態を判定
// if (isset($_SESSION["user_id"])) {
//     $welcome_message = "ようこそ " . $_SESSION["user_name"] . " さん";
// } else {
//     $welcome_message = "ログイン";
// }

// // // メール送信設定
// // $mail = new PHPMailer();
// // $mail->isSMTP();
// // $mail->Host = 'smtp.gmail.com'; // 例: smtp.gmail.com
// // $mail->Port = 587; // ポート番号（お使いの環境に合わせて変更）
// // $mail->SMTPAuth = true;
// // $mail->Username = 'k022c2145@g.neec.ac.jp'; // 送信元メールアドレス
// // $mail->Password = 'xhsqqxobwgjahkrn'; // 送信元メールアドレスのパスワード
// // $mail->setFrom('k022c2145@g.neec.ac.jp', 'Daistyle'); // 送信元メールアドレスと名前

// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//     // フォームから送信されたデータを受け取る
//     $name = $_POST['name'];
//     $postalCode = $_POST['postal-code'];
//     $prefecture = $_POST['prefecture'];
//     $city = $_POST['city'];
//     $address = $_POST['address'];
//     $email = $_POST['email'];
//     $phone = $_POST['phone'];
//     $deliveryDate = $_POST['delivery-date'] . ' ' . $_POST['delivery-time'];
//     $paymentMethod = $_POST['payment-method'];
//     $quantity = $_POST['quantity']; // 商品の個数

//     try {
//         $dbh = new PDO($dsn, $db_user, $db_password);

//         // データベースにデータを挿入
//         $sql = "INSERT INTO finalpurchase (name, postalcode, prefecture, city, address, mail, tel, delivery_date, payment_method, quantity)
//                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
//         $stmt = $dbh->prepare($sql);
//         $stmt->execute([$name, $postalCode, $prefecture, $city, $address, $email, $phone, $deliveryDate, $paymentMethod, $quantity]);

//         // メール送信
//         $mail = new PHPMailer();
//         $mail->isSMTP();
//         $mail->Host = 'smtp.gmail.com'; // 例: smtp.gmail.com
//         $mail->Port = 587; // ポート番号（お使いの環境に合わせて変更）
//         $mail->SMTPAuth = true;
//         $mail->Username = 'k022c2145@g.neec.ac.jp'; // 送信元メールアドレス
//         $mail->Password = 'xhsqqxobwgjahkrn'; // 送信元メールアドレスのパスワード
//         $mail->setFrom('k022c2145@g.neec.ac.jp', 'Daistyle'); // 送信元メールアドレスと名前

//         $mail->addAddress($email, $name); // フォームに入力されたメールアドレス
//         $mail->addBCC('k022c2145@g.neec.ac.jp', 'Daistyle'); // 自分のメールアドレスをBCCに指定
//         $mail->Subject = '注文確認';
//         $mail->Body = "ご注文内容:\n商品: $product\n個数: $quantity\n価格: $price\nお名前: $name\n...";
//         $mail->send();

//         echo "購入情報が保存され、メールが送信されました。";
//     } catch (PDOException $e) {
//         echo "エラーが発生しました: " . $e->getMessage();
//     }
// }


// PHPMailerのオートロードを読み込む
require '../../vendor/autoload.php';

// セッションを開始
session_start();

// 会員情報からユーザー名とメールアドレスを取得
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
    // データベースからユーザー名とメールアドレスを取得するクエリを実行
    // $username と $email に値を設定する

    // ここでデータベースから $username と $email を取得するクエリを実行すると仮定
}

// 購入を希望する（クイック購入）ボタンがクリックされた場合
if (isset($_POST["purchase-button"])) {
    // ここで購入処理を行う

    // 購入が成功した場合、購入完了のメールを送信
    if (isset($username) && isset($email)) {
        // PHPMailerのインスタンスを作成
        $mail = new PHPMailer\PHPMailer\PHPMailer();


        $to = $email;

        // SMTPを使用する場合
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // SMTPサーバーのホスト名
        $mail->SMTPAuth = true;
        $mail->Username = $username; // SMTPサーバーのユーザー名
        $mail->Password = $app_password; // SMTPサーバーのパスワード
        $mail->SMTPSecure = 'tls'; // TLSを使用
        $mail->Port = 587; // ポート番号（SMTPサーバーに合わせて設定）

        // メール設定
        $mail->setFrom('k022c2145@g.neec.ac.jp', 'Daistyle');
        $mail->addAddress($email, $username); // 宛先のメールアドレスとユーザー名
        $mail->Subject = '購入完了のお知らせ';

        // メール本文
        $mail->Body = "ようこそ、$username さん。\n\nご購入いただき、ありがとうございます。\n\n購入明細は以下の通りです。\n\n商品名: 一眼レフカメラ\n価格: ¥65,000\n\nお届け予定日: {ここにお届け予定日を挿入}\n\nお支払い方法: {ここに支払い方法を挿入}\n\nご質問やお問い合わせがある場合は、お気軽にご連絡ください。\n\nDaistyle カスタマーサポート";

        // メールを送信
        if (!$mail->send()) {
            echo 'メールの送信に失敗しました。エラー: ' . $mail->ErrorInfo;
        } else {
            echo '購入完了のメールを送信しました。';
        }
    }
}





?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>プロダクトタイトル | Daistyle</title>
    <meta name="description" content="テキストテキストテキストテキストテキストテキストテキスト">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="http://localhost:3000/logo/text.ico">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <script>
        var cartItems = []; // カートに追加された商品情報を格納する配列
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
    @charset "UTF-8";

html {
  font-size: 100%;
}
/*
フッターを画面下に配置するために、
「position: relative;」を設定
「min-height」で最小の高さを画面の高さにあわせる
*/
body {
  color: #333;
  font-size: 0.875rem;
  min-height: 100vh;
  position: relative;
}
a {
  color: #333;
  text-decoration: none;
  transition: all 0.5s;
}
a:hover {
  opacity: 0.7;
}
img {
  max-width: 100%;
}
li {
  list-style: none;
}
/*
コンテンツ幅を設定するための共通クラス
*/
.wrapper {
  width: 100%;
  max-width: 1360px;
  margin: 0 auto;
  padding: 0 40px;
}
.content {
  padding-top: 120px;
  padding-bottom: 160px;
}
.site-title a {
  width: 180px;
  line-height: 1px;
  display: block;
}
.page-title {
  font-size: 0.875rem;
  font-weight: normal;
  margin-bottom: 30px;
}

/*-------------------------------------------
ヘッダー
-------------------------------------------*/
/*
「position: fixed;」でヘッダーを固定し、「z-index: 10;」で前面に表示
※他のコンテンツでpositionをrelative、absolute、fixedのいずれかに
設定している場合は、z-indexの数値が大きい方が前面に表示される
*/
#header {
  width: 100%;
  height: 80px;
  background-color: #fff;
  display: flex;
  align-items: center;
  justify-content: space-between;
  position: fixed;
  left: 0;
  right: 0;
  z-index: 10
}
/*
ハンバーガーメニュー
メニューが閉じている時は、「left: -300px;」で画面左に隠し、
「opacity: 0;」で非表示にしている
*/
#navi {
  position: fixed;
  top: 0;
  left: -300px;
  width: 300px;
  color: #fff;
  padding: 36px 50px;
  transition: all 0.5s;
  z-index: 20;
  opacity: 0;
}
#navi a {
  color: #fff;
}
#navi li {
  margin-bottom: 14px;
}









/* レビューフォームのスタイル */
#review-form {
  margin-top: 20px;
}

#review-form label {
  display: block;
  margin-bottom: 5px;
}

#review-form input[type="text"],
#review-form textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

#review-form button[type="submit"] {
  background-color: #333;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

#review-form button[type="submit"]:hover {
  background-color: #555;
}

#purchase button [type="purchase-button"] {
  background-color: #333;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

#purchase button [type="purchase-button"]:hover {
  background-color: #555;
}




/* レビュー一覧のスタイル */
#reviews {
  margin-top: 30px;
}

.review-list {
  list-style: none;
  padding: 0;
}

.review-list li {
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 10px;
  margin-bottom: 10px;
}

.review-list li button {
  background-color: #ff5555;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 5px 10px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.review-list li button:hover {
  background-color: #ff7777;
}







/* レビューフォームのスタイル */
#review-form {
  margin-top: 20px;
}

#review-form label {
  display: block;
  margin-bottom: 5px;
}

#review-form input[type="text"],
#review-form textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

/* Apply styles to buttons with the "custom-button" class */
.custom-button {
  background-color: #333;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

/* Hover effect for buttons with the "custom-button" class */
.custom-button:hover {
  background-color: #555;
}



/* 購入情報入力フォームのスタイル */
#purchase-form {
        display: none;
        margin-top: 20px;
        padding: 20px;
        border: 1px solid #ccc;
        background-color: #f9f9f9;
    }

    #purchase-form h3 {
        font-size: 1.2rem;
        margin-bottom: 15px;
    }

    #purchase-info-form label {
        display: block;
        margin-bottom: 8px;
    }

    #purchase-info-form input,
    #purchase-info-form select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 1rem;
        margin-bottom: 15px;
    }

    #purchase-info-form button[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        font-size: 1rem;
        cursor: pointer;
    }

    #purchase-info-form button[type="submit"]:hover {
        background-color: #0056b3;
    }




/*
ハンバーガーメニュー
メニューが開いている時は、「left: 0;」「opacity: 1;」で
画面左に表示する
*/
.open #navi {
  left: 0;
  opacity: 1;
}
.toggle_btn {
  width: 30px;
  height: 30px;
  position: relative;
  transition: all 0.5s;
  cursor: pointer;
  z-index: 20;
}
/*
ハンバーガーメニューの線の設定（メニューが閉じている時）
*/
.toggle_btn span {
  display: block;
  position: absolute;
  width: 30px;
  height: 2px;
  background-color: #333;
  border-radius: 4px;
  transition: all 0.5s;
}
/*
1本目の線の位置を設定
*/
.toggle_btn span:nth-child(1) {
  top: 10px;
}
/*
2本目の線の位置を設定
*/
.toggle_btn span:nth-child(2) {
  bottom: 10px;
}
/*
ハンバーガーメニューの線の設定（メニューが開いている時）
線の色を白に変更
*/
.open .toggle_btn span {
  background-color: #fff;
}
/*
1本目の線を-45度回転
*/
.open .toggle_btn span:nth-child(1) {
  -webkit-transform: translateY(4px) rotate(-45deg);
  transform: translateY(4px) rotate(-45deg);
}
/*
2本目の線を45度回転
*/
.open .toggle_btn span:nth-child(2) {
  -webkit-transform: translateY(-4px) rotate(45deg);
  transform: translateY(-4px) rotate(45deg);
}
#mask {
  display: none;
  transition: all 0.5s;
}
/*
メニューを開いている時は、全体を黒背景にする
*/
.open #mask {
  display: block;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: #000;
  opacity: .8;
  z-index: 10;
  cursor: pointer;
}

/*-------------------------------------------
TOP、PRODUCTS
-------------------------------------------*/
#top {
  padding-top: 80px;
  padding-bottom: 160px;
}
.product-list {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}
.product-list li {
  width: 23%;
  margin-bottom: 40px;
}
/*
vertical-align: top;
画像の下にできる隙間を消す
*/
.product-list img {
  margin-bottom: 10px;
  vertical-align: top;
}
.product-list p {
  font-size: 0.75rem;
}
.link-text {
  display: block;
  text-align: center;
}
.pagination {
  display: flex;
  justify-content: center;
}
.pagination li {
  padding: 0 20px;
}

/*-------------------------------------------
ITEM
-------------------------------------------*/
#item {
  max-width: 800px;
  display: flex;
  justify-content: space-between;
  margin-bottom: 60px;
}
#item .item-text {
  width: 42%;
}
/*
text-align: justify;
テキストの両端を揃える
*/
#item .item-text p {
  margin-bottom: 30px;
  text-align: justify;
}
#item .item-text dl {
  display: flex;
  flex-wrap: wrap;
}
#item .item-text dt {
  width: 30%;
}
#item .item-text dd {
  width: 70%;
}
#item .item-img {
  width: 50%;
}

/*-------------------------------------------
ABOUT
-------------------------------------------*/
#about {
  max-width: 600px;
}
#about p {
  line-height: 1.9;
  margin-bottom: 30px;
}

/*-------------------------------------------
COMPANY
-------------------------------------------*/
#company {
  max-width: 600px;
}
#company dl {
  display: flex;
  flex-wrap: wrap;
  margin-bottom: 20px;
}
#company dt {
  width: 30%;
  border-bottom: solid 1px #dcdbdb;
  padding: 20px 10px;
}
#company dt:last-of-type {
  border-bottom: none;
}
#company dd {
  width: 70%;
  border-bottom: solid 1px #dcdbdb;
  padding: 20px 10px;
}
#company dd:last-of-type {
  border-bottom: none;
}
#company .map {
  /* グーグルマップをグレースケールにする */
  filter: grayscale(1);
}
/* グーグルマップのサイズを設定 */
#company .map iframe {
  width: 100%;
  height: 300px;
  border: 0;
}

/*-------------------------------------------
フッター
-------------------------------------------*/
/*
「position: absolute;」を設定して、フッター位置を画面下に設定
「left: 0;」「right: 0;」で中央に配置
*/
#footer {
  display: flex;
  justify-content: space-between;
  position: absolute;
  bottom: 20px;
  left: 0;
  right: 0;
}
#footer .menu {
  display: flex;
}
#footer .menu li {
  font-size: 0.75rem;
  margin-right: 30px;
}
#footer .copyright {
  font-size: 0.625rem;
}

/*-------------------------------------------
SP
-------------------------------------------*/
@media screen and (max-width: 900px) {

  /*-------------------------------------------
  TOP、PRODUCTS
  -------------------------------------------*/
  .product-list li {
    width: 47%;
  }

  /*-------------------------------------------
  ITEM
  -------------------------------------------*/
  #item {
    flex-direction: column;
  }
  #item .item-text {
    width: 100%;
  }
  #item .item-img {
    width: 100%;
    margin-bottom: 30px;
  }

  /*-------------------------------------------
  COMPANY
  -------------------------------------------*/
  #company dl {
    flex-direction: column;
  }
  #company dt {
    width: 100%;
    border-bottom: none;
    padding-bottom: 5px;
  }
  #company dd {
    width: 100%;
    padding-top: 5px;
  }

  /*-------------------------------------------
  フッター
  -------------------------------------------*/
  #footer {
    flex-direction: column;
  }
  #footer .menu {
    margin-bottom: 5px;
  }
}




/* パンくずリストのスタイル */
.breadcrumbs {
    margin-top: 20px;
}

.breadcrumbs ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.breadcrumbs li {
    display: inline;
    margin-right: 10px;
}

.breadcrumbs li:last-child {
    font-weight: bold;
}



/*========= LoadingのためのCSS ===============*/

/* Loading背景画面設定　*/
#splash {
    /*fixedで全面に固定*/
	position: fixed;
	width: 100%;
	height: 100%;
	z-index: 999;
	text-align:center;
	color:#fff;
}

/* Loading画像中央配置　*/
#splash_text {
	position: absolute;
	top: 50%;
	left: 50%;
    z-index: 999;
	transform: translate(-50%, -50%);
	color: #fff;
	width: 100%;
}

/*IE11対策用バーの線の高さ※対応しなければ削除してください*/
#splash_text svg{
    height: 2px;
}

/*割れる画面のアニメーション*/
.loader_cover {
    width: 100%;
    height: 50%;
    background: linear-gradient(-225deg, #2CD8D5 0%, #C5C1FF 56%, #FFBAC3 100%);
    transition: all .2s cubic-bezier(.04, .435, .315, .9);
    transform: scaleY(1);
}
/*上の画面*/
.loader_cover-up {
    transform-origin: center top;
}

/*下の画面*/
.loader_cover-down {
    position: absolute;
    bottom: 0;
    transform-origin: center bottom;
}
/*クラス名がついたらY軸方向に0*/
.coveranime {
    transform: scaleY(0);
}





</style>

</head>
<body>


<div id="splash">
<div id="splash_text">
<a><img src="../img/text.svg" alt="Daistyle"></a>
</div>
<div class="loader_cover loader_cover-up"></div><!--上に上がるエリア-->
<div class="loader_cover loader_cover-down"></div><!--下に下がるエリア-->
<!--/splash--></div>
<div id="container">
    <header id="header" class="wrapper">
        <div class="site-title">
            <a href="../top_page/main.php"><img src="../img/text.svg" alt="Daistyle"></a>
        </div>
        <!-- ヘッダー部分のカートアイコン -->
        <div class="cart-icon">
            <span class="cart-count">0</span> <!-- カート内の商品数を表示する部分 -->
            <img src="../img/cart-icon.png" alt="Cart">
        </div>
        <?php if (isset($username)) : ?>
            <p>ようこそ <?php echo $username; ?> さん</p>
        <?php endif; ?>

        <nav id="navi">
            <ul class="nav-menu">
            <li><a href="../top_page/products.php">PRODUCTS</a></li>
            <li><a href="../top_page/about.php">ABOUT</a></li>
            <li><a href="../top_page/company.php">COMPANY</a></li>
            <li><a href="mailto:xxxxx@xxx.xxx.com?subject=お問い合わせ">CONTACT</a></li>
            <li><a href="../cart.php">カート</a></li> <!-- カートへのリンクを追加 -->
            <!-- ログイン状態によって表示を変える -->
        <?php if (isset($_SESSION["user_id"])) : ?>
            <li><a href="logout.php">ログアウト</a></li>
        <?php else : ?>
            <li><a href="login.php">ログイン</a></li>
        <?php endif; ?>
            </ul>
        </nav>


        <div class="toggle_btn">
            <span></span>
            <span></span>
        </div>

        <div id="mask"></div>
    </header>

    <main>
      <div class="content wrapper">
        <nav class="breadcrumbs">
            <ul>
                <li><a href="../top_page/products.php">ホーム</a></li>
                <li>-></li>
                <li>一眼レフカメラ</li>
            </ul>
        </nav>
        <h1 class="page-title">一眼レフカメラ</h1>
        <div id="item">
          <div class="item-img">
            <img src="../img/kaden_camera_ichigan.jpg" alt="">
          </div>
          <div class="item-text">
            <p>
              この商品はダミーです。
            </p>
            <p>高機能・高品質のカメラです。</p>
            <p>
              テキストテキストテキストテキストテキストテキストテキストテキストテキスト
              テキストテキストテキストテキストテキストテキストテキストテキストテキスト
              テキストテキストテキストテキストテキストテキストテキストテキストテキスト
            </p>
            <p>&yen;65,000 +tax</p>
            <dl>
              <dt>SIZE：</dt>
              <dd>W999 × D999 × H999</dd>
              <dt>COLOR：</dt>
              <dd>BLACK</dd>
              <dt>MATERIAL：</dt>
              <dd>Titanium</dd>
            </dl>
                <!-- 商品詳細ページのカートボタン -->
                <button class="add-to-cart-btn" data-item-id="1">カートに追加</button>



            <!-- 商品のレビュー投稿フォーム -->
            <h3>レビューを投稿する</h3>
                    <!-- ログインフォームの送信 -->
<form id="login-form" method="post" action="login_process.php">
    <label for="login-username">ユーザー名：</label>
    <input type="text" id="login-username" name="login-username" >
    <button type="submit">ログイン</button>
</form>
<!-- ログアウトボタンのクリック -->
<button id="logout-button">ログアウト</button>
            <form id="review-form">
                <label for="username">お名前：</label>
                <input type="text" id="username" name="username" >
                <label for="review">レビュー：</label>
                <textarea id="review" name="review" ></textarea>
                <button type="submit">レビューを投稿</button>
            </form>
            <div id="reviews">
            <h2>商品のレビュー</h2>
            <ul class="review-list">
                <!-- レビューはここに動的に追加される -->
            </ul>
            </div>
            <div id="purchase">
            <button class="custom-button" type="purchase-button">購入を希望する（クイック購入）</button>
            </div>
            <button type="button" id="paypay-button">PayPayで支払う</button>
            <!-- 購入を希望するボタン -->
        <button id="purchase-button">購入を希望する（フォームを表示）</button>
            <!-- 購入情報入力フォーム -->
    <div id="purchase-form" style="display: none;">
        <h3>購入情報を入力してください</h3>
        <form id="purchase-info-form" method="post" action="../credit_input.php">
            <label for="name">お名前：</label>
            <input type="text" id="name" name="name" required>

            <!-- 郵便番号入力フォーム -->
            <label for="postal-code">郵便番号：</label>
            <input type="text" id="postal-code" name="postal-code" maxlength="7" required>
            <button id="auto-fill-button">自動入力</button>

            <!-- 都道府県選択 -->
            <label for="prefecture">都道府県：</label>
            <select id="prefecture" name="prefecture" required>
                <option value="" disabled selected>選択してください</option>
                <option value="北海道">北海道</option>
                <option value="青森県">青森県</option>
                <option value="岩手県">岩手県</option>
                <option value="宮城県">宮城県</option>
                <option value="秋田県">秋田県</option>
                <option value="山形県">山形県</option>
                <option value="福島県">福島県</option>
                <option value="茨城県">茨城県</option>
                <option value="栃木県">栃木県</option>
                <option value="群馬県">群馬県</option>
                <option value="埼玉県">埼玉県</option>
                <option value="千葉県">千葉県</option>
                <option value="東京都">東京都</option>
                <option value="神奈川県">神奈川県</option>
                <option value="新潟県">新潟県</option>
                <option value="富山県">富山県</option>
                <option value="石川県">石川県</option>
                <option value="福井県">福井県</option>
                <option value="山梨県">山梨県</option>
                <option value="長野県">長野県</option>
                <option value="岐阜県">岐阜県</option>
                <option value="静岡県">静岡県</option>
                <option value="愛知県">愛知県</option>
                <option value="三重県">三重県</option>
                <option value="滋賀県">滋賀県</option>
                <option value="京都府">京都府</option>
                <option value="大阪府">大阪府</option>
                <option value="兵庫県">兵庫県</option>
                <option value="奈良県">奈良県</option>
                <option value="和歌山県">和歌山県</option>
                <option value="鳥取県">鳥取県</option>
                <option value="島根県">島根県</option>
                <option value="岡山県">岡山県</option>
                <option value="広島県">広島県</option>
                <option value="山口県">山口県</option>
                <option value="徳島県">徳島県</option>
                <option value="香川県">香川県</option>
                <option value="愛媛県">愛媛県</option>
                <option value="高知県">高知県</option>
                <option value="福岡県">福岡県</option>
                <option value="佐賀県">佐賀県</option>
                <option value="長崎県">長崎県</option>
                <option value="熊本県">熊本県</option>
                <option value="大分県">大分県</option>
                <option value="宮崎県">宮崎県</option>
                <option value="鹿児島県">鹿児島県</option>
                <option value="沖縄県">沖縄県</option>
            </select>

            <label for="city">市区町村：</label>
            <input type="text" id="city" name="city" required>

            <label for="address">以降の住所：</label>
            <input type="text" id="address" name="address" required>

            <label for="email">メールアドレス：</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">電話番号：</label>
            <input type="tel" id="phone" name="tel" name="tel" required>

                <!-- 商品の個数選択 -->
            <label for="quantity">個数：</label>
            <select id="quantity" name="quantity">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <!-- 他の個数の選択肢を追加 -->
            </select>

            <label for="delivery-date">お届け予定日：</label>
        <input type="date" id="delivery-date" name="delivery-date" required>
        <input type="time" id="delivery-time" name="delivery-time" required>

        <label for="product">商品名：</label>
        <input type="text" id="product" name="product" value="一眼レフカメラ" readonly>

        <label for="price">価格：</label>
        <input type="text" id="price" name="price" value="65,000" readonly>
    <input type="hidden" id="paymentTime" name="paymentTime" value="<?php echo date('Y-m-d H:i:s'); ?>">

            <label for="payment-method">決済方法：</label>
            <select id="payment-method" name="payment-method" required>
                <option value="" disabled selected>選択してください</option>
                <option value="credit-card">クレジットカード</option>
                <option value="cod">代引き</option>
            </select>
            <!-- 選択された決済方法に応じてクレジットカード情報のフォームを表示 -->
        <div id="credit-card-form" style="display: none;">
            <!-- クレジットカード情報のフォームフィールドを追加 -->
        </div>

            <button type="submit">購入する</button>
        </form>
    </div>
    </div>


          </div>


        </div>
        <a class="link-text" href="../top_page/products.php">Back To Products</a>

    </main>

    <footer id="footer" class="wrapper">
      <ul class="menu">
        <li><a href="https://www.instagram.com/" target="_blank">INSTAGRAM</a></li>
        <li><a href="https://twitter.com/" target="_blank">TWITTER</a></li>
        <li><a href="https://www.facebook.com/" target="_blank">FACEBOOK</a></li>
      </ul>
      <p class="copyright">&copy; Daistyle</p>
    </footer>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://rawgit.com/kimmobrunfeldt/progressbar.js/master/dist/progressbar.min.js"></script>
    <!--IE11用-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/6.26.0/polyfill.min.js"></script>
    <script>
        // お届け予定日の選択フィールドを取得
    const deliveryDateField = document.getElementById('delivery-date');
    const deliveryTimeField = document.getElementById('delivery-time');

    // カレンダーと時刻の初期値を設定
    const currentDate = new Date();
    const year = currentDate.getFullYear();
    const month = (currentDate.getMonth() + 1).toString().padStart(2, '0');
    const day = currentDate.getDate().toString().padStart(2, '0');
    const hours = currentDate.getHours().toString().padStart(2, '0');
    const minutes = currentDate.getMinutes().toString().padStart(2, '0');

    // カレンダーと時刻の初期値を設定
    deliveryDateField.value = `${year}-${month}-${day}`;
    deliveryTimeField.value = `${hours}:${minutes}`;

    // お届け予定日を選択した時の処理
    deliveryDateField.addEventListener('change', function () {
        const selectedDate = new Date(this.value);
        const selectedYear = selectedDate.getFullYear();
        const selectedMonth = (selectedDate.getMonth() + 1).toString().padStart(2, '0');
        const selectedDay = selectedDate.getDate().toString().padStart(2, '0');

        // お届け予定日に合わせて時刻の初期値を設定
        deliveryTimeField.value = `${hours}:${minutes}`;

        // お届け予定日が今日の場合、過去の時刻は選択不可にする
        if (selectedYear === year && selectedMonth === month && selectedDay === day) {
            deliveryTimeField.setAttribute('min', `${hours}:${minutes}`);
        } else {
            deliveryTimeField.removeAttribute('min');
        }
    });

    // APIキーを取得する
const apiKey = "a_vSXIG5i3Uh_1nEF";

// 決済ボタンのクリックイベントを登録する
document.querySelector("#paypay-button").addEventListener("click", () => {
  // 決済処理を開始する
  paypay.startPayment(apiKey, {
    amount: 1000, // 決済金額
    orderId: "1234567890", // 注文ID
  });
});
    
// // 購入するボタンが押されたときの処理
// document.getElementById("purchase-button").addEventListener("click", function () {
//     // 適切なフォーム要素を取得
//     const purchaseForm = document.getElementById("purchase-info-form");

//     // FormData のコンストラクタにフォーム要素を渡す
//     const formData = new FormData(purchaseForm);

//     // 以下の処理に formData を利用してデータの送信や処理を行う
//     // ...
// });

document.addEventListener("DOMContentLoaded", function () {
    const purchaseForm = document.getElementById("purchase-info-form");
    const paymentMethodSelect = document.getElementById("payment-method");
    const postalCodeInput = document.getElementById("postal-code");
    const prefectureSelect = document.getElementById("prefecture");
    const cityInput = document.getElementById("city");
    const addressInput = document.getElementById("address");
    const emailInput = document.getElementById("email");
    const telInput = document.getElementById("tel");
    const autoFillButton = document.getElementById("auto-fill-button");

    let creditInputWindow;

    purchaseForm.addEventListener("submit", async function (event) {
        event.preventDefault();

        // フォームの値を取得
        const formData = new FormData(purchaseForm);
        const prefecture = $('#prefecture').val();
        const paymentMethod = formData.get("payment-method");
        // const email = formData.get("email"); // フォームからemailの値を取得
        const city = $('#city').val();
        const address = $('#address').val();
        const email = $('#email').val();
        const tel = $('#tel').val();
        // 他の必要な要素も同様に取得する

        // データベースへの保存とメール送信処理を行う関数
        async function saveToDatabaseAndSendEmail() {
          try {
        // フォームデータにemailの値を追加
        formData.set("email", email);

        // sendmail.php にデータを送信
        const response1 = await fetch("../sendmail.php", {
            method: "POST",
            body: formData,
        });

        // send_credit_email.php にデータを送信
        const response2 = await fetch("../send_credit_email.php", {
            method: "POST",
            body: formData,
        });

        const result1 = await response1.text();
        const result2 = await response2.text();

        alert(result1); // sendmail.php のレスポンスメッセージを表示
        alert(result2); // send_credit_email.php のレスポンスメッセージを表示
    } catch (error) {
        console.error("エラーが発生しました: ", error);
            }
        }

        if (paymentMethod === "credit-card") {
            // クレジットカード情報を入力するページを開く
            const creditInputWindow = window.open("../credit_input.php", "_blank", "width=800,height=600");

            // クレジットカード情報の入力が完了した場合の処理
            // credit_input.php内でcreditInfoEnteredイベントを発火させる必要があります
            window.addEventListener("creditInfoEntered", async function (event) {
                // ウィンドウを閉じる
                creditInputWindow.close();

                // フォームデータを再度取得
                const updatedFormData = new FormData(purchaseForm);

                // データベースへの保存とメール送信処理を行う
                await saveToDatabaseAndSendEmail(updatedFormData);
            });
        } else {
            // クレジットカード情報の入力が必要ない場合
            // データベースへの保存とメール送信処理を行う
            await saveToDatabaseAndSendEmail(formData);
        }
    });

    autoFillButton.addEventListener("click", async function () {
        const postalCode = postalCodeInput.value;
        if (postalCode.length === 7 && /^\d{7}$/.test(postalCode)) {
            try {
                const response = await fetch(`../server.php?postalCode=${postalCode}`);
                if (response.ok) {
                    const data = await response.json();
                    if (data.error) {
                        console.error("API response error:", data.error);
                    } else {
                        prefectureSelect.value = data.prefecture;
                        cityInput.value = data.city;
                        addressInput.value = data.address;
                    }
                } else {
                    console.error("Error fetching postal code data");
                }
            } catch (error) {
                console.error("An error occurred:", error);
            }
        }
    });
});





$(document).ready(function() {
    // 購入を希望するボタンのクリックイベント
    $('#purchase-button').on('click', function() {
        if ($('#purchase-form').is(':visible')) {
            // 購入フォームが既に表示されている場合、閉じる
            $('#purchase-form').slideUp();
            $('#purchase-button').text('購入を希望する（フォームを表示）'); // ボタンテキストを元に戻す
        } else {
            // 購入フォームが非表示の場合、表示する
            $('#purchase-form').slideDown();
            $('#purchase-button').text('閉じる'); // ボタンテキストを変更
        }
    });

    // 購入情報入力フォームの送信
    $('#purchase-info-form').on('submit', async function(event) {
        event.preventDefault();
        // 選択された決済方法に応じて処理を分岐
        var paymentMethod = $('#payment-method').val();
        if (paymentMethod === 'credit-card') {
            // クレジットカード情報の入力フォームが表示されている場合
            if ($('#credit-card-form').is(':visible')) {
                // ここでクレジットカード情報の送信処理を行う
                // 送信が成功したらクレジットカード情報のフォームを非表示にするなどの処理を行う
            } else {
                // クレジットカード情報のフォームを表示
                $('#credit-card-form').slideDown();
                $('#purchase-button').text('閉じる'); // ボタンテキストを変更
            }
        } else {
            // ここで代引きや他の決済方法の処理を行う
            // データベースへの保存やメール送信などの処理を行う
            
            // フォームデータを取得
            const formData = new FormData(document.getElementById("purchase-info-form"));
            
            try {
                const response = await fetch("../sendmail.php", {
                    method: "POST",
                    body: formData, // フォームデータを送信
                });

                const result = await response.text();
                alert(result); // レスポンスメッセージを表示
            } catch (error) {
                console.error("エラーが発生しました: ", error);
            }
            
            // フォーム送信後にフォームを閉じる
            $('#purchase-form').slideUp();
            $('#purchase-button').text('購入を希望する（クイック購入）'); // ボタンテキストを元に戻す
        }
    });
});

    $(function(){
        
        // カートボタンがクリックされたときの処理
        $('.add-to-cart-btn').on('click', function() {
            var itemId = $(this).data('item-id');
            var item = {
                id: itemId,
                quantity: 1 // この例では1つだけ追加すると仮定
            };

            // 既にカートに同じ商品がある場合、数量を増やす
            var existingItem = cartItems.find(item => item.id === itemId);
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cartItems.push(item);
            }

            updateCartIcon(); // カートアイコンを更新
        });

        // カートアイコンを更新する処理
        function updateCartIcon() {
            var totalQuantity = 0;
            cartItems.forEach(item => {
                totalQuantity += item.quantity;
            });
            $('.cart-count').text(totalQuantity); // カート内の商品数を表示
        }
  /*=================================================
  ハンバーガーメニュー
  ===================================================*/
  // ハンバーガーメニューのクリックイベント
  $('.toggle_btn').on('click', function() {
    // #headerにopenクラスが存在する場合
    if ($('#header').hasClass('open')) {
      // openクラスを削除
      // openクラスを削除すると、openクラスのCSSがはずれるため、
      // メニューが非表示になる
      $('#header').removeClass('open');

    // #headerにopenクラスが存在しない場合
    } else {
      // openクラスを追加
      // openクラスを追加すると、openクラスのCSSが適応されるため、
      // メニューが表示される
      $('#header').addClass('open');
    }
  });

  // メニューが表示されている時に画面をクリックした場合
  $('#mask').on('click', function() {
    // openクラスを削除して、メニューを閉じる
    $('#header').removeClass('open');
  });

  

  // カートアイコンがクリックされたときの処理（カート内の商品一覧表示など）
  $('.cart-icon').on('click', function() {
            // ここにカート内の商品一覧を表示する処理を追加
            // カート内の商品情報はcartItems変数に格納されている
        });

         // 保存されたレビューをロードして表示
  loadReviews();

  // レビューフォームの送信
  $('#review-form').on('submit', function(event) {
    event.preventDefault();

    var username = $('#username').val();
    var password = $('#password').val(); // パスワードの入力フィールド
    var reviewText = $('#review').val();
    var currentDate = new Date(); // 現在の日時を取得

    

    // 新しいレビューエレメントを作成して、レビューリストに追加
    var newReview = $('<li>').text(username + ': ' + reviewText);
    if (isCurrentUserReview(username)) {
      var deleteButton = $('<button>').text('削除');
      deleteButton.on('click', function() {
        deleteReview(username, reviewText);
        newReview.remove();
      });
      newReview.append(deleteButton);
    }
    $('.review-list').append(newReview);

    // フォームのフィールドをクリア
    $('#username').val('');
    $('#review').val('');

    // レビューと投稿者情報をローカルストレージに保存
    saveReview(username, reviewText, currentDate);
  });

// レビューをローカルストレージに保存
function saveReview(username, reviewText, date) {
    var reviews = JSON.parse(localStorage.getItem('reviews')) || [];
    reviews.push({ username: username, reviewText: reviewText, date: date });
    localStorage.setItem('reviews', JSON.stringify(reviews));
}

  // 日時のフォーマット関数
  function formatDate(date) {
            var year = date.getFullYear();
            var month = (date.getMonth() + 1).toString().padStart(2, '0');
            var day = date.getDate().toString().padStart(2, '0');
            var hours = date.getHours().toString().padStart(2, '0');
            var minutes = date.getMinutes().toString().padStart(2, '0');
            var formattedDate = `${year}-${month}-${day} ${hours}:${minutes}`;
            return formattedDate;
        }

  // 保存されたレビューをロードして表示
  function loadReviews() {
        var reviews = JSON.parse(localStorage.getItem('reviews')) || [];
        var currentUser = getCurrentUser(); // 現在のユーザー情報を取得
        reviews.forEach(function(review) {
            var newReview = $('<li>').text(review.username + ': ' + review.reviewText + ' (' + formatDate(new Date(review.date)) + ')');
            if (currentUser && currentUser.username === review.username) {
                var deleteButton = $('<button>').text('削除');
                deleteButton.on('click', function() {
                    deleteReview(review.username, review.reviewText);
                    newReview.remove();
                });
                newReview.append(deleteButton);
            }
            $('.review-list').append(newReview);
        });
  }

  // レビューをローカルストレージから削除
  function deleteReview(username, reviewText) {
    var reviews = JSON.parse(localStorage.getItem('reviews')) || [];
    var updatedReviews = reviews.filter(function(review) {
      return !(review.username === username && review.reviewText === reviewText);
    });
    localStorage.setItem('reviews', JSON.stringify(updatedReviews));
  }

  // 現在のユーザー情報を取得
  function getCurrentUser() {
    return JSON.parse(localStorage.getItem('currentUser'));
  }

  // ログイン中のユーザー情報をローカルストレージに保存
  function setCurrentUser(username) {
    localStorage.setItem('currentUser', JSON.stringify({ username: username }));
  }

  // ログアウト時にユーザー情報を削除
  function clearCurrentUser() {
    localStorage.removeItem('currentUser');
  }

// ログインフォームの送信
$('#login-form').on('submit', function(event) {
    event.preventDefault();
    var username = $('#login-username').val();
    setCurrentUser(username);
    alert('ログインが完了しました。ページをリロードしてください。');
});

// ログアウトボタンのクリック
$('#logout-button').on('click', function() {
    clearCurrentUser();
    alert('ログアウトが完了しました。ページをリロードしてください。');
});


  // 現在のユーザーのレビューかどうかを判定
  function isCurrentUserReview(username) {
    var currentUser = getCurrentUser();
    return currentUser && currentUser.username === username;
  }
});



window.onload = function() {
    var isLoggedIn = sessionStorage.getItem('loggedIn');
    
    if (!isLoggedIn) {
        // セッションにログイン情報がない場合、ログイン情報の入力を求める
        var usernameOrId = prompt("ユーザー名またはID番号を入力してください:");
        var password = prompt("パスワードを入力してください:", "");

        if (usernameOrId !== null && password !== null) {
            // ログイン情報を送信
            $.ajax({
                type: "POST",
                url: "../../Login&Register_form/process_signin.php",
                data: { username: usernameOrId, password: password },
                success: function(response) {
                    if (response === "success") {
                        // ログイン成功時の処理
                        sessionStorage.setItem('loggedIn', 'true');
                        sessionStorage.setItem('loginTime', Date.now());
                        window.location.href = "item1.php";
                    } else if (response === "success_unconfirmed") {
                        alert("アカウントが未承認です。確認コードを入力してください。メールをお送りします。");
                        window.location.href = "../../Login&Register_form/confirmation_input_page.php";
                    } else {
                        alert(response);
                        window.location.href = "item1.php";
                    }
                }
            });
        } else {
            window.location.href = "../../Login&Register_form/loginform18star1.php";
        }
    } else {
        var lastLoginTime = sessionStorage.getItem('loginTime');
        var currentTime = Date.now();
        var fifteenMinutes = 15 * 60 * 1000; // 15分のミリ秒数

        if (lastLoginTime && currentTime - lastLoginTime >= fifteenMinutes) {
            // 15分以上経過している場合、再度ログインを要求
            sessionStorage.removeItem('loggedIn');
            sessionStorage.removeItem('loginTime');
            alert("セッションが無効になりました。再度ログインしてください。");
            window.location.href = "item1.php";
        } else {
            // ログイン成功した場合はProgressBarのアニメーションを開始
            var hasShownSplash = sessionStorage.getItem('hasShownSplash');

            // ローディング画面を表示したことがなければ、表示する
            if (!hasShownSplash) {
                // ローディング画面を表示する
                $("#splash").show();
                // ローディング画面を表示したことを記録する
                sessionStorage.setItem('hasShownSplash', true);
            } else {
                // ローディング画面を非表示にする
                $("#splash").hide();
            }

            var bar = new ProgressBar.Line(splash_text, {
                easing: 'easeOut',
                duration: 1500,
                strokeWidth: 0.2,
                color: '#555',
                trailWidth: 0.2,
                trailColor: '#bbb',
                text: {
                    style: {
                        position: 'absolute',
                        left: '50%',
                        top: '50%',
                        padding: '0',
                        margin: '-30px 0 0 0',
                        transform: 'translate(-50%,-50%)',
                        'font-size': '1rem',
                        color: '#fff',
                    },
                    autoStyleContainer: false
                },
                step: function(state, bar) {
                    bar.setText(Math.round(bar.value() * 100) + ' %');
                }
            });

            // アニメーションスタート
            bar.animate(1.0, function () {
                $("#splash_text").fadeOut(10);
                $(".loader_cover-up").addClass("coveranime");
                $(".loader_cover-down").addClass("coveranime");
                $("#splash").fadeOut();
            });
        }
    }
};




</script>
</body>
</html>