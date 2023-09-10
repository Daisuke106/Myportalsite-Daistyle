<?php


?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
    <title>About | Daistyle</title>
    <meta name="description" content="テキストテキストテキストテキストテキストテキストテキスト">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="http://localhost:3000/logo/text.ico">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" href="css/style.css">
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
</style>

</head>
<body>
<header id="header" class="wrapper">
      <div class="site-title">
        <a href="main.php"><img src="../img/text.svg" alt="Daistyle"></a>
      </div>

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
      <div class="content wrapper">
        <h1 class="page-title">About</h1>
        <div id="about">
          <p>
            このサイトは、私（山口大介）のおすすめする商品を紹介するサイトです。
          </p>
          <p>
            また、<a href="http://localhost:3000/portal_page/portal_site.php">ポータルサイト</a>や<a href="http://localhost:3000/myphoto_site/test7.php">フォトサイト</a>も作成しました。
          </p>
          <p>
            製作期間は約3週間です。
          </p>
          <p>
            このサイトは、HTML、CSS、JavaScript、PHP、MySQLを使用して作成しました。
          </p>
          <p>
            このサイトは、Google Chrome、Microsoft Edgeで動作確認を行いました。
          </p>
          <p>
            このサイトの詳細の機能は<a href="http://localhost:3000/introduction_page/introduce_starwars.php">こちら</a>からご確認ください。
          </p>
          <p>
            マイページは<a href="http://localhost:3000/my_page/qr_login.php">こちら</a>からアクセスしてください。
          </p>
          <p>
          ※ログインには、メールに添付のQRコードで認証を行います。<br>ログイン回数やアカウントの削除などが行えます。
          </p>
          <p>
            このサイトの詳しいソースコードは、
            <a href="https://github.com/Daisuke106/Myportalsite-Daistyle">こちら</a>からご確認ください。
          </p>
          <p>
            以下は私のお気に入りミュージックです！
            </p>
          <iframe id="embedPlayer" src="https://embed.music.apple.com/jp/playlist/%E3%83%88%E3%83%83%E3%83%97100-%E6%97%A5%E6%9C%AC/pl.043a2c9876114d95a4659988497567be?app=music&amp;itsct=music_box_player&amp;itscg=30200&amp;ls=1&amp;theme=auto" height="450px" frameborder="0" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation-by-user-activation" allow="autoplay *; encrypted-media *; clipboard-write" style="width: 100%; max-width: 660px; overflow: hidden; border-radius: 10px; transform: translateZ(0px); animation: 2s ease 0s 6 normal none running loading-indicator; background-color: rgb(228, 228, 228);"></iframe>
            <iframe id="embedPlayer" src="https://embed.music.apple.com/jp/playlist/wwdc23-%E3%82%B3%E3%83%BC%E3%83%87%E3%82%A3%E3%83%B3%E3%82%B0-%E3%83%91%E3%83%AF%E3%83%BC%E3%82%A2%E3%83%83%E3%83%97/pl.1e055c5c39654b1599f339ad00e68028?app=music&amp;itsct=music_box_player&amp;itscg=30200&amp;ls=1&amp;theme=auto" height="450px" frameborder="0" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation-by-user-activation" allow="autoplay *; encrypted-media *; clipboard-write" style="width: 100%; max-width: 660px; overflow: hidden; border-radius: 10px; transform: translateZ(0px); animation: 2s ease 0s 6 normal none running loading-indicator; background-color: rgb(228, 228, 228);"></iframe>
            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/37i9dQZEVXbKqiTGXuCOsB?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
        </div>
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


<script>
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