<?php


?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Daistyle</title>
    <meta name="description" content="テキストテキストテキストテキストテキストテキストテキスト">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="http://localhost:3000/logo/text.ico">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
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
<header id="header" class="wrapper">
      <h1 class="site-title">
        <a href="main.php"><img src="../img/text.svg" alt="Daistyle"></a>
      </h1>

      

      <nav id="navi">
        <ul class="nav-menu">
          <li><a href="products.php">PRODUCTS</a></li>
          <li><a href="about.php">ABOUT</a></li>
          <li><a href="company.php">COMPANY</a></li>
          <li><a href="mailto:k022c2145@g.neec.ac.jp?subject=お問い合わせ">CONTACT</a></li>
        </ul>
      </nav>

      <div class="toggle_btn">
        <span></span>
        <span></span>
      </div>

      <div id="mask"></div>
    </header>

    <main>

    <div id="splash">
<div id="splash_text">
<a><img src="../img/text.svg" alt="Daistyle"></a>
</div>
<div class="loader_cover loader_cover-up"></div><!--上に上がるエリア-->
<div class="loader_cover loader_cover-down"></div><!--下に下がるエリア-->
<!--/splash--></div>
<div id="container">

      <div id="top" class="wrapper">
        <ul class="product-list">
          <li>
          <a href="../product_page/item1.php">
              <img src="../img/kaden_camera_ichigan.jpg" alt="">
              <p>一眼レフカメラ</p>
              <p>&yen;65,000 +tax</p>
            </a>
          </li>
          <li>
            <a href="../product_page/item2.php">
              <img src="../img/item2.jpg" alt="">
              <p>プロダクトタイトルプロダクトタイトル</p>
              <p>&yen;99,999 +tax</p>
            </a>
          </li>
          <li>
          <a href="../product_page/item3.php">
              <img src="../img/item3.jpg" alt="">
              <p>プロダクトタイトルプロダクトタイトル</p>
              <p>&yen;99,999 +tax</p>
            </a>
          </li>
          <li>
          <a href="../product_page/item4.php">
              <img src="../img/item4.jpg" alt="">
              <p>プロダクトタイトルプロダクトタイトル</p>
              <p>&yen;99,999 +tax</p>
            </a>
          </li>
          <li>
          <a href="../product_page/item5.php">
              <img src="../img/item5.jpg" alt="">
              <p>プロダクトタイトルプロダクトタイトル</p>
              <p>&yen;99,999 +tax</p>
            </a>
          </li>
          <li>
          <a href="../product_page/item6.php">
              <img src="../img/item6.jpg" alt="">
              <p>プロダクトタイトルプロダクトタイトル</p>
              <p>&yen;99,999 +tax</p>
            </a>
          </li>
          <li>
          <a href="../product_page/item7.php">
              <img src="../img/item7.jpg" alt="">
              <p>プロダクトタイトルプロダクトタイトル</p>
              <p>&yen;99,999 +tax</p>
            </a>
          </li>
          <li>
          <a href="../product_page/item8.php">
              <img src="../img/item8.jpg" alt="">
              <p>プロダクトタイトルプロダクトタイトル</p>
              <p>&yen;99,999 +tax</p>
            </a>
          </li>
        </ul>
        <a class="link-text" href="products.php">View More</a>
      </div>
    </main>

    <footer id="footer" class="wrapper">
      <ul class="menu">
        <li><a href="https://www.instagram.com/" target="_blank">INSTAGRAM</a></li>
        <li><a href="https://twitter.com/" target="_blank">TWITTER</a></li>
        <li><a href="https://www.facebook.com/" target="_blank">FACEBOOK</a></li>
      </ul>
      <p class="copyright">&copy; Daistyle</p>
    </footer>

<!--/container--></div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://rawgit.com/kimmobrunfeldt/progressbar.js/master/dist/progressbar.min.js"></script>
<!--IE11用-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js"></script><!--不必要なら削除してください-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/6.26.0/polyfill.min.js"></script><!--不必要なら削除してください-->
<script>









window.onload = function() {
        var isLoggedIn = sessionStorage.getItem('loggedIn');
        
        if (!isLoggedIn) {
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
                            // セッションにログイン情報を保持
                            sessionStorage.setItem('loggedIn', 'true');
                            // ログイン成功のタイムスタンプをセッションストレージに記録
                            sessionStorage.setItem('loginTime', Date.now());
                            // main.phpに遷移
                            window.location.href = "main.php";
                        } else {
                            alert(response); // ログイン失敗時のエラーメッセージを表示
                            window.location.href = "main.php"; // アラートメッセージを表示した後にmain.phpに遷移
                        }
                    }
                });
            } else {
                // キャンセルされた場合の処理
                window.location.href = "../../Login&Register_form/loginform18star1.php"; // ログインフォームにリダイレクト
            }
        } else {
            // セッションにログイン情報がある場合
            var lastLoginTime = sessionStorage.getItem('loginTime');
            var currentTime = Date.now();
            var fifteenMinutes = 15 * 60 * 1000; // 15分のミリ秒数
            //ログインに承認されてから15分経過した場合、再度ログインを要求する
            
            
            //5分にしたい場合は、5 * 60 * 1000;とする
            //その場合は、fifteenMinutesをfiveMinutesに変更する
            //30分にしたい場合は、30 * 60 * 1000;とする
            //その場合は、fifteenMinutesをthirtyMinutesに変更する
            //60分にしたい場合は、60 * 60 * 1000;とする
            //その場合は、fifteenMinutesをsixtyMinutesに変更する
    
            if (lastLoginTime && currentTime - lastLoginTime >= fifteenMinutes) {
                // 15分以上経過している場合、再度ログインを要求
                sessionStorage.removeItem('loggedIn');
                sessionStorage.removeItem('loginTime');
                alert("セッションが無効になりました。再度ログインしてください。");
                window.location.href = "main.php";
            } else {
                // ログイン成功した場合はProgressBarのアニメーションを開始
              //テキストのカウントアップ+バーの設定
              var bar = new ProgressBar.Line(splash_text, {//id名を指定
                easing: 'easeOut',//アニメーション効果linear、easeIn、easeOut、easeInOutが指定可能
                duration: 1500,//時間指定(1000＝1秒)
                strokeWidth: 0.2,//進捗ゲージの太さ
                color: '#555',//進捗ゲージのカラー
                trailWidth: 0.2,//ゲージベースの線の太さ
                trailColor: '#bbb',//ゲージベースの線のカラー
                text: {//テキストの形状を直接指定				
                  style: {//天地中央に配置
                    position: 'absolute',
                    left: '50%',
                    top: '50%',
                    padding: '0',
                    margin: '-30px 0 0 0',//バーより上に配置
                    transform:'translate(-50%,-50%)',
                    'font-size':'1rem',
                    color: '#fff',
                  },
                  autoStyleContainer: false //自動付与のスタイルを切る
                },
                step: function(state, bar) {
                  bar.setText(Math.round(bar.value() * 100) + ' %'); //テキストの数値
                }
              });

              //アニメーションスタート
              bar.animate(1.0, function () {//バーを描画する割合を指定します 1.0 なら100%まで描画します
                $("#splash_text").fadeOut(10);//フェイドアウトでローディングテキストを削除
                $(".loader_cover-up").addClass("coveranime");//カバーが上に上がるクラス追加
                $(".loader_cover-down").addClass("coveranime");//カバーが下に下がるクラス追加
                $("#splash").fadeOut();//#splashエリアをフェードアウト
              });
                // bar.animate(1.0, function() {
                //     // アニメーション完了後の処理
                //     $("#splash_text").fadeOut(10);
                //     $(".loader_cover-up").addClass("coveranime");
                //     $(".loader_cover-down").addClass("coveranime");
                //     $("#splash").fadeOut();
                // });
            }
        }
    };






  $(function(){
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
});


</script>

</body>

</html>