<?php


?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
    <title>Products | Daistyle</title>
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
        <h1 class="page-title">Products</h1>
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
          <li>
          <a href="../product_page/item9.php">
              <img src="../img/item9.jpg" alt="">
              <p>プロダクトタイトルプロダクトタイトル</p>
              <p>&yen;99,999 +tax</p>
            </a>
          </li>
          <li>
          <a href="../product_page/item10.php">
              <img src="../img/item10.jpg" alt="">
              <p>プロダクトタイトルプロダクトタイトル</p>
              <p>&yen;99,999 +tax</p>
            </a>
          </li>
          <li>
          <a href="../product_page/item11.php">
              <img src="../img/item11.jpg" alt="">
              <p>プロダクトタイトルプロダクトタイトル</p>
              <p>&yen;99,999 +tax</p>
            </a>
          </li>
          <li>
          <a href="../product_page/item12.php">
              <img src="../img/item12.jpg" alt="">
              <p>プロダクトタイトルプロダクトタイトル</p>
              <p>&yen;99,999 +tax</p>
            </a>
          </li>
        </ul>
        <ul class="pagination">
          <li>1</li>
          <!-- <li><a href="products2.php">2</a></li> -->
        </ul>
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