<?php
// セッションを開始
session_start();

// データベースに接続する設定
$dsn = 'mysql:dbname=sample;host=localhost;charset=utf8';
$db_user = 'root'; // データベースユーザ名
$db_password = ''; // データベースパスワード

// ログイン処理
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     try {
//         $dbh = new PDO($dsn, $db_user, $db_password);
//         $stmt = $dbh->prepare("SELECT * FROM finalusers WHERE username = :username");
//         $stmt->bindParam(':username', $username);
//         $stmt->execute();

//         if ($stmt->rowCount() == 1) {
//             $user = $stmt->fetch(PDO::FETCH_ASSOC);

//             // アカウントがロックされていないかチェック
//             if ($user['failed_attempts'] < 10) {
//                 // パスワードが一致するかチェック
//                 if (password_verify($password, $user['password'])) {
//                     // ログイン成功
//                     $_SESSION['id'] = $user['username'];
//                     echo '<script>alert("ログインに成功しました。"); window.location.href = "dashboard.php";</script>';
//                     exit;
//                 } else {
//                     // パスワードが一致しない場合
//                     // アカウントの連続誤入力回数を増やす
//                     $failed_attempts = $user['failed_attempts'] + 1;
//                     $updateStmt = $dbh->prepare("UPDATE finalusers SET failed_attempts = :failed_attempts WHERE username = :username");
//                     $updateStmt->bindParam(':failed_attempts', $failed_attempts);
//                     $updateStmt->bindParam(':username', $username);
//                     $updateStmt->execute();
                    
//                     echo '<script>alert("パスワードが間違っています。");</script>';
//                 }
//             } else {
//                 // アカウントがロックされている場合
//                 echo '<script>alert("アカウントが一時的にロックされています。時間をおいて再試行してください。");</script>';
//             }
//         } else {
//             // ユーザーが存在しない場合
//             echo '<script>alert("ユーザーが存在しません。");</script>';
//         }

//         $dbh = null;
//     } catch (PDOException $e) {
//         // exit("データベースに接続できませんでした：" . $e->getMessage());
// 		echo "エラー: " . $e->getMessage();
//     }
// }
// // 会員登録処理
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
//     $username = $_POST['username'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];

//     // パスワードの条件をチェック
//     if (strlen($password) < 6 || !preg_match('/[A-Za-z]/', $password) || !preg_match('/[0-9]/', $password)) {
// 		echo '<script>alert("パスワードは6文字以上で、英大文字と小文字、数字を含む必要があります。");</script>';
// 	} else {
//         try {
//             $dbh = new PDO($dsn, $db_user, $db_password);

//             // ランダムに生成された6桁の番号を作成
//             $id = mt_rand(100000, 999999);

//             // 登録した日時を取得
//             $time = date("Y-m-d H:i:s");

//             $stmt = $dbh->prepare("INSERT INTO finalusers (id, username, email, password, time) VALUES (:id, :username, :email, :password, :time)");
//             $stmt->bindParam(':id', $id);
//             $stmt->bindParam(':username', $username);
//             $stmt->bindParam(':email', $email);

//             // パスワードをハッシュ化して保存
//             $hashed_password = password_hash($password, PASSWORD_DEFAULT);
//             $stmt->bindParam(':password', $hashed_password);

//             $stmt->bindParam(':time', $time);

// 			$stmt->execute();
// 			echo '<script>alert("会員登録が完了しました。");</script>';

//             $dbh = null;
//         } catch (PDOException $e) {
// 			echo '<script>alert("データベースに接続できませんでした。' . $e->getMessage() . '");</script>';
// 		}
		
//     }
// }

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>Sign in & Sign up Form</title>
<link rel="icon" href="http://localhost:3000/logo/text.ico">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
<style>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap");

* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

body,
input {
	font-family: "Poppins", sans-serif;
}

.container {
	position: relative;
	width: 100%;
	background-color: #fff;
	min-height: 100vh;
	overflow: hidden;
}

.forms-container {
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
}

.signin-signup {
	position: absolute;
	top: 50%;
	transform: translate(-50%, -50%);
	left: 75%;
	width: 50%;
	transition: 1s 0.7s ease-in-out;
	display: grid;
	grid-template-columns: 1fr;
	z-index: 5;
}

form {
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0rem 5rem;
	transition: all 0.2s 0.7s;
	overflow: hidden;
	grid-column: 1 / 2;
	grid-row: 1 / 2;
}

form.sign-up-form {
	opacity: 0;
	z-index: 1;
}

form.sign-in-form {
	z-index: 2;
}

.title {
	font-size: 2.2rem;
	color: #444;
	margin-bottom: 10px;
}

.input-field {
	max-width: 380px;
	width: 100%;
	background-color: #f0f0f0;
	margin: 10px 0;
	height: 55px;
	border-radius: 55px;
	display: grid;
	grid-template-columns: 15% 85%;
	padding: 0 0.4rem;
	position: relative;
}

.input-field i {
	text-align: center;
	line-height: 55px;
	color: #acacac;
	transition: 0.5s;
	font-size: 1.1rem;
}

.input-field input {
	background: none;
	outline: none;
	border: none;
	line-height: 1;
	font-weight: 600;
	font-size: 1.1rem;
	color: #333;
}

.input-field input::placeholder {
	color: #aaa;
	font-weight: 500;
}

.social-text {
	padding: 0.7rem 0;
	font-size: 1rem;
}

.social-media {
	display: flex;
	justify-content: center;
}

.social-icon {
	height: 46px;
	width: 46px;
	display: flex;
	justify-content: center;
	align-items: center;
	margin: 0 0.45rem;
	color: #333;
	border-radius: 50%;
	border: 1px solid #333;
	text-decoration: none;
	font-size: 1.1rem;
	transition: 0.3s;
}

.social-icon:hover {
	color: #4481eb;
	border-color: #4481eb;
}

.btn {
	width: 150px;
	background-color: #5995fd;
	border: none;
	outline: none;
	height: 49px;
	border-radius: 49px;
	color: #fff;
	text-transform: uppercase;
	font-weight: 600;
	margin: 10px 0;
	cursor: pointer;
	transition: 0.5s;
}

.btn:hover {
	background-color: #4d84e2;
}
.panels-container {
	position: absolute;
	height: 100%;
	width: 100%;
	top: 0;
	left: 0;
	display: grid;
	grid-template-columns: repeat(2, 1fr);
}

.container:before {
	content: "";
	position: absolute;
	height: 2000px;
	width: 2000px;
	top: -10%;
	right: 48%;
	transform: translateY(-50%);
	background-image: linear-gradient(-45deg, #4481eb 0%, #04befe 100%);
	transition: 1.8s ease-in-out;
	border-radius: 50%;
	z-index: 6;
}

.image {
	width: 100%;
	transition: transform 1.1s ease-in-out;
	transition-delay: 0.4s;
}

.panel {
	display: flex;
	flex-direction: column;
	align-items: flex-end;
	justify-content: space-around;
	text-align: center;
	z-index: 6;
}

.left-panel {
	pointer-events: all;
	padding: 3rem 17% 2rem 12%;
}

.right-panel {
	pointer-events: none;
	padding: 3rem 12% 2rem 17%;
}

.panel .content {
	color: #fff;
	transition: transform 0.9s ease-in-out;
	transition-delay: 0.6s;
}

.panel h3 {
	font-weight: 600;
	line-height: 1;
	font-size: 1.5rem;
}

.panel p {
	font-size: 0.95rem;
	padding: 0.7rem 0;
}

.btn.transparent {
	margin: 0;
	background: none;
	border: 2px solid #fff;
	width: 130px;
	height: 41px;
	font-weight: 600;
	font-size: 0.8rem;
}

.right-panel .image,
.right-panel .content {
	transform: translateX(800px);
}

/* ANIMATION */

.container.sign-up-mode:before {
	transform: translate(100%, -50%);
	right: 52%;
}

.container.sign-up-mode .left-panel .image,
.container.sign-up-mode .left-panel .content {
	transform: translateX(-800px);
}

.container.sign-up-mode .signin-signup {
	left: 25%;
}

.container.sign-up-mode form.sign-up-form {
	opacity: 1;
	z-index: 2;
}

.container.sign-up-mode form.sign-in-form {
	opacity: 0;
	z-index: 1;
}

.container.sign-up-mode .right-panel .image,
.container.sign-up-mode .right-panel .content {
	transform: translateX(0%);
}

.container.sign-up-mode .left-panel {
	pointer-events: none;
}

.container.sign-up-mode .right-panel {
	pointer-events: all;
}
.sign-in-form {
	z-index: 2;
}
.form-buttons {
    display: flex;
    justify-content: space-between;
    margin-top: 20px; /* 必要に応じて余白を調整 */
}

.form-buttons .btn {
    flex: 1; /* ボタンが均等に広がるように割り当てるスペースを設定 */
    margin-right: 10px; /* ボタン間の間隔を調整 */
}

@media (max-width: 870px) {
	.container {
		min-height: 800px;
		height: 100vh;
	}
	.signin-signup {
		width: 100%;
		top: 95%;
		transform: translate(-50%, -100%);
		transition: 1s 0.8s ease-in-out;
	}

	.signin-signup,
	.container.sign-up-mode .signin-signup {
		left: 50%;
	}

	.panels-container {
		grid-template-columns: 1fr;
		grid-template-rows: 1fr 2fr 1fr;
	}

	.panel {
		flex-direction: row;
		justify-content: space-around;
		align-items: center;
		padding: 2.5rem 8%;
		grid-column: 1 / 2;
	}

	.right-panel {
		grid-row: 3 / 4;
	}

	.left-panel {
		grid-row: 1 / 2;
	}

	.image {
		width: 200px;
		transition: transform 0.9s ease-in-out;
		transition-delay: 0.6s;
	}

	.panel .content {
		padding-right: 15%;
		transition: transform 0.9s ease-in-out;
		transition-delay: 0.8s;
	}

	.panel h3 {
		font-size: 1.2rem;
	}

	.panel p {
		font-size: 0.7rem;
		padding: 0.5rem 0;
	}

	.btn.transparent {
		width: 110px;
		height: 35px;
		font-size: 0.7rem;
	}

	.container:before {
		width: 1500px;
		height: 1500px;
		transform: translateX(-50%);
		left: 30%;
		bottom: 68%;
		right: initial;
		top: initial;
		transition: 2s ease-in-out;
	}

	.container.sign-up-mode:before {
		transform: translate(-50%, 100%);
		bottom: 32%;
		right: initial;
	}

	.container.sign-up-mode .left-panel .image,
	.container.sign-up-mode .left-panel .content {
		transform: translateY(-300px);
	}

	.container.sign-up-mode .right-panel .image,
	.container.sign-up-mode .right-panel .content {
		transform: translateY(0px);
	}

	.right-panel .image,
	.right-panel .content {
		transform: translateY(300px);
	}

	.container.sign-up-mode .signin-signup {
		top: 5%;
		transform: translate(-50%, 0);
	}
}

@media (max-width: 570px) {
	form {
		padding: 0 1.5rem;
	}

	.image {
		display: none;
	}
	.panel .content {
		padding: 0.5rem 1rem;
	}
	.container {
		padding: 1.5rem;
	}

	.container:before {
		bottom: 72%;
		left: 50%;
	}

	.container.sign-up-mode:before {
		bottom: 28%;
		left: 50%;
	}
}

.error-message {
    display: none;
    color: red;
    font-size: 14px;
    margin-top: 5px;
}



/* モーダルのスタイル */
.modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: white;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
        }







/* ローディングアニメーションのスタイル */
.loader {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 120px;
  height: 120px;
  border: 16px solid #f3f3f3;
  border-top: 16px solid #3498db;
  border-radius: 50%;
  animation: spin 2s linear infinite, heart-beat 2s linear infinite;
  background-color: rgba(255, 255, 255, 0.8); /* 背景を透過させる */
  z-index: 1; /* ボタンの上に表示するためにz-indexを指定 */
  display: none; /* 初期状態では非表示 */
}


@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

@keyframes heart-beat {
  55% {
    background-color: #fff;
  }
  60% {
    background-color: #3498db;
  }
  65% {
    background-color: #fff;
  }
  70% {
    background-color: #3498db;
  }
  100% {
    background-color: #fff;
  }
}



/* ポップアップのスタイル */
.popup {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(0, 0, 0, 0.4); /* 不透明度を変更しない */
    width: 100%;
    height: 100%;
    overflow: auto;
	z-index: 1000;
}

.popup-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 70%;
    max-width: 400px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}



.popup-content iframe {
    width: 100%; /* iframeの幅を100%に設定 */
    height: 800px; /* iframeの高さを設定（適宜調整） */
    border: none; /* 枠線を削除 */
}




</style>

</head>
<body>
<div class="container">
							<!-- App Password ポップアップ -->
							<div id="appPasswordPopup" class="popup">
							<div class="popup-content">
								<span class="close-popup">&times;</span>
								<h2>What is App Password?</h2>
								<p>Explanation about App Password goes here.</p>
								<p>Appパスワードはメール送信に必要です。</p>
								<iframe src="https://pc-karuma.net/google-account-generate-app-password/" frameborder="0"></iframe> <!-- ここに埋め込む外部サイトのリンクを指定 -->
								<!-- App Password に関する詳細な情報を表示 -->
							</div>
						</div>
		<div class="forms-container">
			<div class="signin-signup">
				<form action="process_signin.php" class="sign-in-form" id="login-form" method="POST">
					<h2 class="title">Sign in</h2>
					<div class="input-field">
						<i class="fas fa-user"></i>
						<input type="text" name="username" placeholder="Username & ID" required>
					</div>
					<div class="input-field">
						<i class="fas fa-lock"></i>
						<input type="password" name="password" placeholder="Password" required/>
					</div>
					<input type="submit" value="Login" class="btn solid" />

					<button type="button" onclick="openResetPasswordWindow()">Forgot Password</button>


				</form>




				<form action="process_signup.php" class="sign-up-form" id="signup-form" method="POST">
					<h2 class="title">Sign up</h2>
					<div class="input-field">
						<i class="fas fa-user"></i>
						<input type="text" name="username" placeholder="Username" required/>
					</div>
					<div class="input-field">
						<i class="fas fa-envelope"></i>
						<input type="email" name="email" placeholder="Email" required/>
					</div>
					<div id="email-error" class="error-message"></div>
					<div class="input-field">
						<i class="fas fa-lock"></i>
						<input type="password" name="password" placeholder="Password" required/>
					</div>
					<div class="input-field">
						<i class="fas fa-key"></i>
						<input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required/>
					</div>
					<div class="input-field">
						<i class="fas fa-key"></i>
						<input type="password" name="app_password" placeholder="App Password" required/>
					</div>
									<!-- App Password リンク -->
					<a id="app-password-link" class="app-password-link">What is App Password?</a>
					<input type="submit" class="btn" value="Sign up" />
									<!-- 会員登録フォームが送信された際の処理 -->
					<div id="loader"></div> <!-- ローディングアニメーションの表示用 -->
				<div class="form-buttons">
					<button id="test-connection-btn" class="btn">データベース接続テスト</button>
					<button id="test-finalusers-connection-btn" class="btn">finalusersテーブル接続テスト</button>
				</div>
				<button id="createTableBtn" class="btn">テーブル作成</button>

					<p class="social-text">Or Sign up with social platforms</p>
					<div class="social-media">
						<a href="#" class="social-icon">
							<i class="fab fa-facebook-f"></i>
						</a>
						<a href="#" class="social-icon">
							<i class="fab fa-twitter"></i>
						</a>
						<a href="#" class="social-icon">
							<i class="fab fa-google"></i>
						</a>
						<a href="#" class="social-icon">
							<i class="fab fa-linkedin-in"></i>
						</a>
					</div>
					<!-- <?php
						// SIGN UPボタンを押してエラーメッセージが表示されない場合にのみモーダルを表示
						if (!isset($email_exists) || !$email_exists) {
							echo '<button class="btn" id="openModalBtn">確認コード入力</button>';
						}
						?> -->

						<!-- モーダル -->
						<div id="myModal" class="modal">
							<div class="modal-content">
								<span class="close">&times;</span>
								<h2>確認コードを入力してください</h2>
								<form method="post" action="check_confirmation_page.php">
									
									<label for="confirmation_code">確認コード:</label>
									<input type="text" id="confirmation_code" name="confirmation_code">
									<button id="confirmCodeBtn">確認</button>

								</form>
							</div>
						</div>




				</form>
			</div>
		</div>

		<div class="panels-container">
			<div class="panel left-panel">
				<div class="content">
				<h3>ようこそ！！</h3>
					<h3>Welcome!!</h3>
					<p>
						既にご登録済みの方は、右のフォームからログインしてください。
					</p>
					<p>
						If you are already registered, please log in from the form on the right.
					</p>
					<p>
						初めての方は、SIGN UPボタンを押してください。
						※アカウントを作成する際には、App Passwordが必要です※
					</p>
					<p>
						If you are new to this service, please press the SIGN UP button.
					</p>
					<p>
						※App Password is required when creating an account※
					</p>
					<button class="btn transparent" id="sign-up-btn" type="button">
						Sign up
					</button>
				</div>
				<!-- <img src="img/log.svg" class="image" alt="" /> -->
			</div>
			<div class="panel right-panel">
				<div class="content">
					<h3>はじめまして！！</h3>
					<h3>Nice to meet you</h3>
					<p>
						ご利用いただくためのアカウントを作成してください。
					</p>
					<p>
						Please create an account to use this service.
					</p>
					<p>
						既にご登録済みの方は、SIGN INボタンを押してください。
					</p>
					<p>
						If you are already registered, please press the SIGN IN button.
					</p>
					<button class="btn transparent" id="sign-in-btn" type="button">
						Sign in
					</button>
				</div>
				<!-- <img src="img/register.svg" class="image" alt="" /> -->
			</div>
		</div>
	</div>


	<script>

function openResetPasswordWindow() {
            // 別のウィンドウを開く
            window.open("forgot_password.php", "_blank", "width=500, height=400");
        }


function showAlert(message) {
    alert(message);
    document.getElementById("password").value = "";
    document.getElementById("confirm_password").value = "";
    document.getElementById("app_password").value = "";
}


		const testFinalUsersConnectionBtn = document.querySelector("#test-finalusers-connection-btn");

testFinalUsersConnectionBtn.addEventListener("click", async () => {
    try {
        const response = await fetch("test_finalusers_connection.php");
        if (response.ok) {
            const result = await response.text();
            if (result === "success") {
                alert("finalusersテーブルに正しく接続されています");
            } else {
                alert("finalusersテーブルに接続されていません");
            }
        } else {
            alert("通信エラーが発生しました");
        }
    } catch (error) {
        alert("エラーが発生しました");
    }
});

	const testConnectionBtn = document.querySelector("#test-connection-btn");

testConnectionBtn.addEventListener("click", async () => {
    try {
        const response = await fetch("test_db_connection.php");
        if (response.ok) {
            const result = await response.text();
            if (result === "success") {
                alert("正しく接続されています");
            } else {
                alert("接続されていません");
            }
        } else {
            alert("通信エラーが発生しました");
        }
    } catch (error) {
        alert("エラーが発生しました");
    }
});



const createTableBtn = document.getElementById("createTableBtn");

createTableBtn.addEventListener("click", async () => {
    try {
        const response = await fetch("create_finalusers_table.php");

        if (response.ok) {
            const result = await response.text();
            if (result.includes("既にテーブルが存在します。")) {
                alert("既にテーブルが存在します。");
            } else if (result.includes("テーブルが作成されました。")) {
                alert("finalusersテーブルが正常に作成されました。");
            } else {
                alert("テーブルの作成に失敗しました。");
            }
        } else {
            alert("通信エラーが発生しました。");
        }
    } catch (error) {
        alert("エラーが発生しました。");
    }
});






const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");
const signinForm = document.querySelector(".sign-in-form"); // Sign In フォーム
const signupForm = document.querySelector(".sign-up-form"); // Sign Up フォーム

const loginForm = document.querySelector("#login-form");
const loginButton = document.querySelector("#login-form-submit");
const loginErrorMsg = document.querySelector("#login-error-msg");

const signUpForm = document.querySelector(".sign-up-form");
const signUpButton = document.querySelector("#sign-up-form-submit");
const signUpErrorMsg = document.querySelector("#sign-up-error-msg");

// ポップアップ表示トリガーボタン
    const appPasswordLink = document.getElementById("app-password-link");
    const appPasswordPopup = document.getElementById("appPasswordPopup");
	const closePopupBtn = appPasswordPopup.querySelector(".close-popup");

    // リンクをクリックしてポップアップを表示
    appPasswordLink.addEventListener("click", () => {
        appPasswordPopup.style.display = "block";
    });

    // ポップアップを閉じる
    closePopupBtn.addEventListener("click", () => {
        appPasswordPopup.style.display = "none";
    });



// 外側のスコープで email 変数を宣言
let email;
let username;
let app_password;
let id;
let confirmation_code;


document.addEventListener("DOMContentLoaded", () => {
    const emailInput = document.querySelector('input[name="email"]');
    const signUpForm = document.querySelector(".sign-up-form");
    const emailError = document.querySelector("#email-error");

    signUpForm.addEventListener("submit", (event) => {
        const email = emailInput.value;
        const emailParts = email.split('@');
        const domain = emailParts[1];

        if (domain !== "g.neec.ac.jp") {
            event.preventDefault(); // フォーム送信を阻止
            emailError.textContent = "学校から配布されたアドレスを使用してください";
            emailError.style.display = "block";
        }
    });

    emailInput.addEventListener("input", () => {
        emailError.style.display = "none";
    });
});

document.getElementById("signup-form").addEventListener("submit", function(event) {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm_password").value;
    
    if (password !== confirmPassword) {
        event.preventDefault();
        alert("パスワードが一致していません");
    }
});





// 会員登録フォームが送信された際の処理
signupForm.addEventListener("submit", async (event) => {
    event.preventDefault();

	// アニメーション要素を取得
	const loader = document.getElementById("loader");
	// アニメーションを表示
    loader.style.display = "block";

    const formData = new FormData(signupForm);
    const response = await fetch("process_signup.php", {
        method: "POST",
        body: formData,
    });

    if (response.ok) {

		// アニメーションを非表示
		loader.style.display = "none";
        const result = await response.text();
        if (result === "success") {
            alert("会員登録が完了しました。確認コードが送信されました。");

			// Gmailのウェブサイトを新しいタブで開く
			window.open('https://mail.google.com', '_blank');

            // モーダルウィンドウを表示
            const modal = document.getElementById("myModal");
            modal.style.display = "block";

            const confirmationCodeInput = document.getElementById("confirmation_code");
            const confirmCodeBtn = document.getElementById("confirmCodeBtn");

		} else {
            if (result === "このメールアドレスは既にご登録済みです。") {
                alert("既にご登録済みです。ログインページへお進みください。");
            } else {
                // エラーメッセージを表示
                alert(result);
            }
        }

			

// 確認コードの入力ボタンが押された際の処理
confirmCodeBtn.addEventListener("click", async () => {
    const confirmationCodeInput = document.getElementById("confirmation_code"); // 確認コードの入力要素を取得
    if (confirmationCodeInput) {

		// ローディングアニメーション表示
        const loader = document.getElementById("loader");
		// アニメーションを表示
        loader.style.display = "block";

        const confirmation_code = confirmationCodeInput.value;
        confirmCodeBtn.disabled = true; // ボタンを無効化

        try {
            const verificationResponse = await fetch("verify_confirmation.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ confirmation_code }),
            });

            if (verificationResponse.ok) {
                const verificationResult = await verificationResponse.text();
				console.log("Verification Result:", verificationResult); // コンソールに結果を出力
                if (verificationResult === "success") {
                    // 確認コードが正しく検証された場合、登録完了メールを送信
                    const sendCompleteEmailResponse = await fetch("test_send_email.php", {
                        method: "POST", // テスト用に送信先を test_send_email.php に指定
                });

                    if (sendCompleteEmailResponse.ok) {
                        const sendCompleteEmailResult = await sendCompleteEmailResponse.text();
                        if (sendCompleteEmailResult.includes("success")) {
                            // 正常にメール送信が完了した場合の処理
                            alert("確認コードが正しく検証されました。会員登録が完了しました。");

                            // ログインページに遷移
                            window.location.href = "http://localhost:3000/shop_site/top_page/main.php";
                        } else {
                            // メール送信に失敗した場合の処理
                            alert("メールの送信に失敗しましたよ！！！");
                        }
                    } else {
                        // メール送信に失敗した場合の処理
                        alert("メールの送信に失敗しました！！！");
                    }
                } else {
                    // 確認コードが一致しなかった場合の処理
                    alert("確認コードが正しくありませんね。");
                }
            } else {
                // 通信エラーの場合
                alert("通信エラーが発生しました。");
            }
        } catch (error) {
            alert("エラーが発生しました。");
            console.error("Error:", error);
        } finally {
            confirmCodeBtn.disabled = false; // ボタンを有効化

			// アニメーションを非表示
			loader.style.display = "none";
        }
    } else {
        alert("確認コードを入力してください。");
    }
});


    } else {
        const errorMessage = "通信エラーが発生しました。";
        try {
            const errorResponse = await response.text();
            if (errorResponse) {
                alert(errorMessage + "\nエラー詳細: " + errorResponse);
            } else {
                alert(errorMessage);
            }
        } catch (error) {
            alert(errorMessage);
            console.error("Error:", error);
        }
    }
});



// ログインボタンが押された際の処理
signinForm.addEventListener("submit", async (event) => {
    event.preventDefault();

	

    // ログイン処理

			// ログイン成功の場合
		const formData = new FormData(signinForm);
		const response = await fetch("process_signin.php", {
			method: "POST",
			body: formData
		});

		if (response.ok) {
        const result = await response.text();
        const resultArray = result.split("|"); // レスポンスを分割

        if (resultArray[0] === "success") {
            // ログイン成功時の処理
            window.location.href = "http://localhost:3000/shop_site/top_page/main.php"; // ダッシュボードページへリダイレクト
        } else if (resultArray[0] === "success_unconfirmed") {
			alert("アカウントが未承認です。確認コードを入力してください。メールをお送りします。");// アカウント未承認時のレスポンス
            // 会員登録成功かつ未確認の場合、確認コード入力ページに遷移
            window.location.href = "confirmation_input_page.php";

			// Gmailのウェブサイトを新しいタブで開く
			window.open('https://mail.google.com', '_blank');
        } else if (!result.includes("メール送信成功")) {
            alert(resultArray[0]); // エラーメッセージを表示
        }
    } else {
        alert("ログインに失敗しました。");
    }
});









sign_up_btn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
    container.classList.remove("sign-up-mode");
});

</script>
</body>
</html>