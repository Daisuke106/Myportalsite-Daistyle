<!DOCTYPE html>
<html lang="ja">
<head>

<meta charset="utf-8">
<title>Photography_Site</title>
<link rel="icon" href="http://localhost:3000/logo/text.ico">
<meta name="description"  content="フォトギャラリーサイト">
<meta name="robots" content="noindex,nofollow"><meta name="keywords"  content="">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<!--=============Google Font ===============-->
<link href="https://fonts.googleapis.com/css?family=Baskervville%7CLa+Belle+Aurore&display=swap" rel="stylesheet">
<!--ゆっくりズームアウトさせながら全画面で見せる-->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/vegas/2.4.4/vegas.min.css">
<!--リンクをクリックすると、背景が暗くなり動画や画像やテキストを表示-->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/css/modaal.min.css">
<style>




@charset "utf-8";


body{
    background:#f0f0f0;
    font-family:'Baskervville', serif,"游ゴシック体", YuGothic, "游ゴシック Medium", "Yu Gothic Medium", "游ゴシック", "Yu Gothic", "メイリオ", sans-serif;
	color: #333;
	font-size:1rem;
	line-height:1.85;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
	-webkit-text-size-adjust: 100%; 
	word-wrap: break-word;
}

@media screen and (max-width:768px) {
body{
	font-size:0.8rem;
	}
}

ul{
	margin:0;
	padding: 0;
	list-style: none;
}

a{
	color: #fff;
    outline: none;
}

a:hover,
a:active{
	text-decoration: none;
}

/* heading */

.heading-block{
    position: absolute;
    top:50%;
    left:50%;
    transform: translate(-50%,-50%);
    color: #fff;
    text-align: center;
}

.heading-block h1,
h2{
    font-family: 'La Belle Aurore', cursive;
    font-weight: normal;
    font-size:6vw;
    line-height: 1;
    letter-spacing: 0.05em;
    color: #fff;
}

.heading-block p{
    font-size:1.2vw;
    letter-spacing: 0.5em;
}

/*横幅が768px以下になった際の指定*/
@media only screen and (max-width:768px) {
.heading-block h1,
    h2{
    font-size:4em;
    line-height: 1.5;
    }
.heading-block p{
    font-size:1.5em;
    letter-spacing: 0.2em;
    }
}

#box3 h2{
    color: #925410;
}


/* sns icon */
#sns-icon img{
    width: 20px;
}

#sns-icon{
    position: fixed;
    right:20px;
    top:20px;
    display: flex;
}

#sns-icon li{
     margin:0 10px;   
}

#sns-icon a{
    transition: all .5s;
}

#sns-icon a:hover{
    opacity: 0.7;
}

/* profile-area*/

.profile-area{
    width:100%;
    max-width: 300px;
    background:rgba(255,255,255,0.8);
    padding:40px;
    margin: 0 0 0 40px;
    text-align: left;
    letter-spacing: 0.03em;
}

@media screen and (max-width:768px) { 
.profile-area{
     margin:0;
    } 
}


.profile-area h2{
    font-size: 0.9rem;
    margin:0 0 40px 0;
    line-height: 1.8;
    color: #333;
    font-family: 'Baskervville', serif;
    text-align: center;
}

.profile-area h2 span{
    font-size: 1.3rem;
     display: block;
    text-transform: uppercase;
}

.profile-area p{
    margin:0 0 40px 0;
}


/* form */

.form-list{
    width:100%;
    max-width: 500px;
    margin: 0 auto;
}

.modaal-content-container h3{
    text-align: center;
    margin: 50px 0;
}

@media screen and (max-width:768px) { 
.modaal-content-container h3{
    margin:0 0 20px 0;
}   
}

input , button , textarea , select {
	margin:0;
	padding:0;
	border:none;
	outline:none;
	background:none;
    font-size: 16px;
}

.form-list input[type='text'] , 
.form-list input[type='email'] , 
.form-list textarea{
	width:100%;
	border:1px solid #ccc;
	background:#f8f9fa;
	padding: 10px;
	-webkit-appearance:none;
	   -moz-appearance:none;
	        appearance:none;
}

.form-list input[type='text'] , input[type='email'] {
	height:50px;
}
#tel1, #tel2, #tel3 {
        width: 70px; /* 例：幅を30pxに設定 */
        height: 30px; /* 例：高さを25pxに設定 */
    }

.submit-btn{
    width:152px;
    margin: 0 auto;
}

input[type='submit']{
    background: #333;
    color: #fff;
    text-align: center;
    padding: 5px 20px;
    width:152px;
    margin: 0 auto;
}

input[type='submit']:hover{
    background: #555;
} 

.form-list dl{
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
	padding:0 0 20px 0;
}

.form-list dt{
    width:30%;
}

.form-list dd{
    width:66%;
}

.form-list textarea {
	height:200px;
}

@media screen and (max-width:768px) {
.form-list dt{
	margin:0 0 10px 0;
}
.form-list dt,
.form-list dd{
    width:100%;
}
	
}


/* copyright */

small{
    position: fixed;
    left:20px;
    top:40%;
    color: #fff;
    letter-spacing: 0.1em;
    line-height: 1;
    -ms-writing-mode: tb-rl;
    -webkit-writing-mode: vertical-rl;
    writing-mode: vertical-rl;
}




/*機能編  4-1-3　プログレスバー＋数字カウントアップ＋画面が開く*/

/* Loading背景画面設定　*/
#splash {
    /*fixedで全面に固定*/
	position: fixed;
	width: 100%;
	height: 100%;
	z-index: 99999;
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
    background:#017490;
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

/*グラデーション線から塗に変化する*/

.gradient4{
    /*ボタンの形状*/
    display: inline-block;
    padding: 10px 60px;
    margin: 20px 0 0 0;
    border-radius:30px;
    text-decoration: none;
    border:1px solid #fff;
    color: #fff;
    /*アニメーションの指定*/ 
    transition: all 0.4s ease-out;
}

#box3 .gradient4{
    color: #925410;
    border-color: #925410;
}

/*hoverした際、グラデーションと影を付ける*/
.gradient4:hover,
#box3 .gradient4:hover{
    /*ボタンの形状*/
    border-color:transparent;
    color: #fff;
    /*背景の色と形状*/
    background: linear-gradient(270deg,#3bade3 0%, #9844b7 50%, #44ea76 100%);
    background-size: 200% auto;
    background-position: right center;
    /*ボックスの影*/   
    box-shadow: 0 5px 10px rgb(250,108,159,0.4);
}

/*===========================================================*/
/*ゆっくりズームアウトさせながら全画面で見せる*/
/*===========================================================*/
#slider {
    width: 100%;
    height: 100vh;/*スライダー全体の縦幅を画面の高さいっぱい（100vh）にする*/
}

/*===========================================================*/
/*リンクをクリックすると、背景が暗くなり動画や画像やテキストを表示*/
/*===========================================================*/

.modaal-overlay{
     background: linear-gradient(45deg,rgba(88,182,211,.9),rgba(229,93,135,.9))!important;
}


/*===========================================================*/
/*サムネイルをクリックするとグループ化された画像一覧を表示する*/
/*===========================================================*/

/*===モーダル表示のためのcss　*/

.hide-area{/*モーダル表示をする場所をあらかじめ隠す*/
	display: none;
}

.modaal-fullscreen .modaal-content-container{/*full画面の色設定*/
     background: linear-gradient(45deg,rgba(88,182,211,.9),rgba(229,93,135,.9));
	color: #fff;
	text-align: center;
}

.modaal-fullscreen .modaal-close{/*ボタンの色、位置*/
	background:none;
	right:20px;
}

/*クローズボタンの×の色変更*/
.modaal-close:focus:after,
.modaal-close:focus:before,
.modaal-close:hover:after,
.modaal-close:hover:before{
	background:#666;
}

/*キャプション*/
.caption{
    display: block;
    padding: 10px 0;
}

/*画像の横幅を100%にしてレスポンシブ化*/
.modaal-content-container img{
    border: 5px solid #fff;
    width:100%;
	max-width:700px;
	height:auto;
	vertical-align: bottom;/*画像の下にできる余白を削除*/
}


/*=（ぼかしから出現する動き） ==*/

.blur{
	animation-name: blurAnime;
	animation-duration:1s;
	animation-fill-mode:forwards;
}

@keyframes blurAnime{
  from {
	filter: blur(10px);
	transform: scale(1.02);
	opacity: 0;
  }

  to {
	filter: blur(0);
	transform: scale(1);
	opacity: 1;
  }
}

/* スクロールをしたら出現する要素にはじめに透過0を指定　*/
 
.blurTrigger{
    opacity: 0;
}



/* （印象）テキストが1文字づつ出現*/

.eachTextAnime span{opacity: 0;}
.eachTextAnime.appeartext span{ animation:text_anime_on 1s ease-out forwards; }
@keyframes text_anime_on {
	0% {opacity:0;}
	100% {opacity:1;}
}

/*===========================================================*/
/* スクロールすると1画面移動*/
/*===========================================================*/
.box{
    padding: 40px;
	display:flex;
	justify-content: center;
	align-items: center;
	text-align: center;
}

#box1{
    background:url("img/Kiyotsu.jpg") no-repeat center;
    background-size: cover;
}

#box1.box{
 justify-content: flex-start;
}

@media screen and (max-width:768px) { 
    #box1.box{
     justify-content: center;
    } 
}

#box2{
    background:url("img/bg_03.jpg") no-repeat center;
    background-size: cover;
}

#box3{
    background:url("img/field-load.jpg") no-repeat center;
    background-size: cover;
}

#box4{
    background:url("img/bg_05.jpg") no-repeat center;
    background-size: cover;
}

#box5{
    background:url("img/bg_06.jpg") no-repeat center;
    background-size: cover;
}

/*= ページネーション用CSS =*/

.pagination {
	position:fixed;
	right:20px;
	top: 50%;
  	transform: translateY(-50%);
	font-size:1em;
	z-index: 10;
	list-style: none;
}

.pagination a {
	display:block;
	height:20px;
	margin-bottom:5px;
	color:#fff;
	position:relative;
	padding:4px;
}

.pagination a.active:after {
	box-shadow:inset 0 0 0 5px;
}

.pagination a .hover-text {
	position:absolute;
	right:15px;
	top:0;
	opacity:0;
	-webkit-transition: opacity 0.5s ease;
	transition: opacity 0.5s ease;
	padding-right: 15px;
}

.pagination a:hover .hover-text {
	opacity: 1;
}

.pagination a:after {
	-webkit-transition:box-shadow 0.5s ease;
	transition:box-shadow 0.5s ease;
	width:10px;
	height:10px;
	display: block;
	border:1px solid;
	border-radius:50%;
	content:'';
	position: absolute;
	margin:auto;
	top:0;
	right:3px;
	bottom:0;
}

@media screen and (max-width:768px) { 
	.pagination a .hover-text{
		display: none;
	}	
}



/*!
 * ress.css • v1.2.2
 * MIT License
 * github.com/filipelinhares/ress
 */

/* # =================================================================
   # Global selectors
   # ================================================================= */

   html {
  box-sizing: border-box;
  overflow-y: scroll; /* All browsers without overlaying scrollbars */
  -webkit-text-size-adjust: 100%; /* iOS 8+ */
}

*,
::before,
::after {
  background-repeat: no-repeat; /* Set `background-repeat: no-repeat` to all elements and pseudo elements */
  box-sizing: inherit;
}

::before,
::after {
  text-decoration: inherit; /* Inherit text-decoration and vertical align to ::before and ::after pseudo elements */
  vertical-align: inherit;
}

* {
  padding: 0; /* Reset `padding` and `margin` of all elements */
  margin: 0;
}

/* # =================================================================
   # General elements
   # ================================================================= */

/* Add the correct display in iOS 4-7.*/
audio:not([controls]) {
  display: none;
  height: 0;
}

hr {
  overflow: visible; /* Show the overflow in Edge and IE */
}

/*
* Correct `block` display not defined for any HTML5 element in IE 8/9
* Correct `block` display not defined for `details` or `summary` in IE 10/11
* and Firefox
* Correct `block` display not defined for `main` in IE 11
*/
article,
aside,
details,
figcaption,
figure,
footer,
header,
main,
menu,
nav,
section,
summary {
  display: block;
}

summary {
  display: list-item; /* Add the correct display in all browsers */
}

small {
  font-size: 80%; /* Set font-size to 80% in `small` elements */
}

[hidden],
template {
  display: none; /* Add the correct display in IE */
}

abbr[title] {
  border-bottom: 1px dotted; /* Add a bordered underline effect in all browsers */
  text-decoration: none; /* Remove text decoration in Firefox 40+ */
}

a {
  background-color: transparent; /* Remove the gray background on active links in IE 10 */
  -webkit-text-decoration-skip: objects; /* Remove gaps in links underline in iOS 8+ and Safari 8+ */
}

a:active,
a:hover {
  outline-width: 0; /* Remove the outline when hovering in all browsers */
}

code,
kbd,
pre,
samp {
  font-family: monospace, monospace; /* Specify the font family of code elements */
}

b,
strong {
  font-weight: bolder; /* Correct style set to `bold` in Edge 12+, Safari 6.2+, and Chrome 18+ */
}

dfn {
  font-style: italic; /* Address styling not present in Safari and Chrome */
}

/* Address styling not present in IE 8/9 */
mark {
  background-color: #ff0;
  color: #000;
}

/* https://gist.github.com/unruthless/413930 */
sub,
sup {
  font-size: 75%;
  line-height: 0;
  position: relative;
  vertical-align: baseline;
}

sub {
  bottom: -0.25em;
}

sup {
  top: -0.5em;
}

/* # =================================================================
   # Forms
   # ================================================================= */

input {
  border-radius: 0;
}

/* Apply cursor pointer to button elements */
button,
[type="button"],
[type="reset"],
[type="submit"],
[role="button"] {
  cursor: pointer;
}

/* Replace pointer cursor in disabled elements */
[disabled] {
  cursor: default;
}

[type="number"] {
  width: auto; /* Firefox 36+ */
}

[type="search"] {
  -webkit-appearance: textfield; /* Safari 8+ */
}

[type="search"]::-webkit-search-cancel-button,
[type="search"]::-webkit-search-decoration {
  -webkit-appearance: none; /* Safari 8 */
}

textarea {
  overflow: auto; /* Internet Explorer 11+ */
  resize: vertical; /* Specify textarea resizability */
}

button,
input,
optgroup,
select,
textarea {
  font: inherit; /* Specify font inheritance of form elements */
}

optgroup {
  font-weight: bold; /* Restore the font weight unset by the previous rule. */
}

button {
  overflow: visible; /* Address `overflow` set to `hidden` in IE 8/9/10/11 */
}

/* Remove inner padding and border in Firefox 4+ */
button::-moz-focus-inner,
[type="button"]::-moz-focus-inner,
[type="reset"]::-moz-focus-inner,
[type="submit"]::-moz-focus-inner {
  border-style: 0;
  padding: 0;
}

/* Replace focus style removed in the border reset above */
button:-moz-focusring,
[type="button"]::-moz-focus-inner,
[type="reset"]::-moz-focus-inner,
[type="submit"]::-moz-focus-inner {
  outline: 1px dotted ButtonText;
}

button,
html [type="button"], /* Prevent a WebKit bug where (2) destroys native `audio` and `video`controls in Android 4 */
[type="reset"],
[type="submit"] {
  -webkit-appearance: button; /* Correct the inability to style clickable types in iOS */
}

button,
select {
  text-transform: none; /* Firefox 40+, Internet Explorer 11- */
}

/* Remove the default button styling in all browsers */
button,
input,
select,
textarea {
  background-color: transparent;
  border-style: none;
  color: inherit;
}

/* Style select like a standard input */
select {
  -moz-appearance: none; /* Firefox 36+ */
  -webkit-appearance: none; /* Chrome 41+ */
}

select::-ms-expand {
  display: none; /* Internet Explorer 11+ */
}

select::-ms-value {
  color: currentColor; /* Internet Explorer 11+ */
}

legend {
  border: 0; /* Correct `color` not being inherited in IE 8/9/10/11 */
  color: inherit; /* Correct the color inheritance from `fieldset` elements in IE */
  display: table; /* Correct the text wrapping in Edge and IE */
  max-width: 100%; /* Correct the text wrapping in Edge and IE */
  white-space: normal; /* Correct the text wrapping in Edge and IE */
}

::-webkit-file-upload-button {
  -webkit-appearance: button; /* Correct the inability to style clickable types in iOS and Safari */
  font: inherit; /* Change font properties to `inherit` in Chrome and Safari */
}

[type="search"] {
  -webkit-appearance: textfield; /* Correct the odd appearance in Chrome and Safari */
  outline-offset: -2px; /* Correct the outline style in Safari */
}

/* # =================================================================
   # Specify media element style
   # ================================================================= */

img {
  border-style: none; /* Remove border when inside `a` element in IE 8/9/10 */
}

/* Add the correct vertical alignment in Chrome, Firefox, and Opera */
progress {
  vertical-align: baseline;
}

svg:not(:root) {
  overflow: hidden; /* Internet Explorer 11- */
}

audio,
canvas,
progress,
video {
  display: inline-block; /* Internet Explorer 11+, Windows Phone 8.1+ */
}

/* # =================================================================
   # Accessibility
   # ================================================================= */

/* Hide content from screens but not screenreaders */
@media screen {
  [hidden~="screen"] {
    display: inherit;
  }
  [hidden~="screen"]:not(:active):not(:focus):not(:target) {
    position: absolute !important;
    clip: rect(0 0 0 0) !important;
  }
}

/* Specify the progress cursor of updating elements */
[aria-busy="true"] {
  cursor: progress;
}

/* Specify the pointer cursor of trigger elements */
[aria-controls] {
  cursor: pointer;
}

/* Specify the unstyled cursor of disabled, not-editable, or otherwise inoperable elements */
[aria-disabled] {
  cursor: default;
}

/* # =================================================================
   # Selection
   # ================================================================= */

/* Specify text selection background color and omit drop shadow */

::-moz-selection {
  background-color: #b3d4fc; /* Required when declaring ::selection */
  color: #000;
  text-shadow: none;
}

::selection {
  background-color: #b3d4fc; /* Required when declaring ::selection */
  color: #000;
  text-shadow: none;
}


</style>

</head>
<body>



<div id="splash">
		<div id="splash_text"></div>
		<div class="loader_cover loader_cover-up"></div>
		<div class="loader_cover loader_cover-down"></div>
	</div>
    
<header id="header">
<div id="slider"> 
    <div class="heading-block">
    <h1 class="blurTrigger">Daisuke Yamaguchi</h1>
    <p class="blurTrigger">Photo    albam</p>
    <!--/heading-block--></div>
    <ul id="sns-icon">
    <li><a href="https://www.instagram.com/daisuke_1234/"><img src="svg/ico_insta.svg" alt="Instagram"></a></li>
    <li><a href="https://www.facebook.com/"><img src="svg/ico_fb.svg" alt="Facebook"></a></li>
    <li><a href="https://twitter.com/"><img src="svg/ico_tw.svg" alt="Twitter"></a></li>
    </ul>
<!--/slider--></div>
</header>
<main>
	<section id="box1" class="box" data-section-name="Profile">
		<div class="box-area">
            <div class="profile-area blurTrigger">
            <h2>Profile <span>Daisuke Yamaguchi</span></h2>
            <p>Birth Place : Saitama<br>Birthday : 2003.10.6</p>
            <dl><dt>Career</dt>
                <dd>Young Photographer</dd>
                <dd>since 2014</dd>
                <dd>Nippon Engineering College</dd>
                <dd>2022~2024</dd>
                <dd>Graduation Schedule</dd>
                <dd>2024.3</dd>
            </dl>
            </div>
        </div>
	<!--/box--></section>
	
	<section id="box2" class="box" data-section-name="Ocean">
		<div class="box-area">
        <h2 class="eachTextAnime">Ocean</h2>
        <a href="#gallery-1" class="gradient4 btn-view blurTrigger">View Photos</a>
        <!--/box-area--></div>
        <div id="gallery-1" class="hide-area">
		<p><img src="img/01.jpg" alt=""><span class="caption">Hawaian View</span></p>
		<p><img src="img/ship.jpg" alt=""><span class="caption">Cargo Ship</span></p>
		<p><img src="img/diving-ocean.jpg" alt=""><span class="caption">Best Friend for classmate</span></p>
		<p><img src="img/Okinawasea.jpg" alt=""><span class="caption">The sea is the best!!</span></p>
		<p><img src="img/06.jpg" alt=""><span class="caption">Big waves!!</span></p>
		</div>
	<!--/box--></section>
	
	<section id="box3" class="box" data-section-name="landscape">
		<div class="box-area">
		<h2 class="eachTextAnime">landscape</h2>
        <a href="#gallery-2" class="gradient4 btn-view blurTrigger">View Photos</a>
        <!--/box-area--></div>
        <div id="gallery-2" class="hide-area">
		<p><img src="img/aomori-view.jpg" alt=""><span class="caption">Aomori is a beautiful city</span></p>
		<p><img src="img/tanada.jpg" alt=""><span class="caption">Terraced rice paddies after the snow melts</span></p>
		<p><img src="img/tokyo-view.jpg" alt=""><span class="caption">Big city in Tokyo!!</span></p>
		<p><img src="img/tokyo-station.jpg" alt=""><span class="caption">Fantastic Tokyo Station</span></p>
		<p><img src="img/field-load.jpg" alt=""><span class="caption">Rural road with no traffic lights</span></p>
		</div>
	<!--/box--></section>
	
	<section id="box4" class="box" data-section-name="Flower">
        <div class="box-area">
		<h2 class="eachTextAnime">Flower</h2>
        <a href="#gallery-3" class="gradient4 btn-view blurTrigger">View Photos</a>
        <!--/box-area--></div>
        <div id="gallery-3" class="hide-area">
		<p><img src="img/12.jpg" alt=""><span class="caption">Flower 2020</span></p>
		<p><img src="img/13.jpg" alt=""><span class="caption">Flower 2021</span></p>
		<p><img src="img/14.jpg" alt=""><span class="caption">Flower 2022</span></p>
		<p><img src="img/15.jpg" alt=""><span class="caption">Flower 2023</span></p>
		<p><img src="img/16.jpg" alt=""><span class="caption">Flower 2024</span></p>
		</div>
	<!--/box--></section>
    
    <section id="box5" class="box" data-section-name="Contact">
        <div class="box-area">
		<h2 class="eachTextAnime">Contact</h2>
        <a href="#form" class="gradient4 btn-view2 blurTrigger">Contact Form</a>
        <!--/box-area--></div>
        <section id="form" class="hide-area">
            <h3>Contact Form</h3>
        <form method="post" action="" enctype="multipart/form-data">
        <ul class="form-list">
        <li>
        <dl>
        <dt><label for="name">Name</label></dt>
        <dd><input type="text" name="Name" id="name" size="60" value="" required>
        </dd>
        </dl>
        </li>
        <li>
        <dl>
        <dt><label for="email">E-mail</label></dt>
        <dd><input type="email" name="E-mail" id="email" size="60" value="" required>
        </dd>
        </dl>
        </li>
        <li>
            <dl>
                <dt><label for="tel1">Tel</label></dt>
                <dd>
                    <input type="text" name="tel1" id="tel1" maxlength="3" required> -
                    <input type="text" name="tel2" id="tel2" maxlength="4" required> -
                    <input type="text" name="tel3" id="tel3" maxlength="4" required>
                </dd>
            </dl>
        </li>
        <li>
        <dl>
        <dt><label for="msg">Message</label></dt>
        <dd><textarea name="Message" id="msg" cols="50" rows="5" required></textarea>
        </dd>
        </dl>
        </li>
        </ul>

        <div class="submit-btn"><input type="submit" name="submit" value="Send"></div>
        </form>
        <!--/form--></section>
	<!--/box--></section>
	</main>
<?php

    // session_start();
    date_default_timezone_set('Asia/Tokyo');
    $dsn = 'mysql:dbname=sample;host=localhost;charset=utf8';
    $db_user = 'root';
    $db_password = '';

    require '..\vendor\autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $conn = new mysqli('localhost', $db_user, $db_password, 'sample');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['submit'])) {
        $name = $_POST['Name'];
        $email = $_POST['E-mail'];
        $tel = $_POST['Tel'];
        $tel1 = $_POST['tel1'];
        $tel2 = $_POST['tel2'];
        $tel3 = $_POST['tel3'];
        $message = $_POST['Message'];
        $date = date('Y-m-d H:i:s'); // Current date and time

        // TEL番号の結合
        $tel = $tel1 . '-' . $tel2 . '-' . $tel3;

        $sql = "INSERT INTO finalcontact (name, email, tel, message, date) VALUES ('$name', '$email', '$tel', '$message', '$date')";

        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Sucess!");</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $mail = new PHPMailer(true);

        try {
            $host        = 'smtp.gmail.com';
            $mailname    = 'k022c2145@g.neec.ac.jp'; // Your Gmail address
            $password    = 'xhsqqxobwgjahkrn'; // Your Gmail App Password
        
            $from        = 'k022c2145@g.neec.ac.jp';
            $fromname    = 'Daistyle';
            $subject     = 'お問い合わせありがとうございます。';


            // フォームから入力されたメールアドレスを「to」として設定
            $to = $email;
        
            $toname = $name;

            // フォームから入力されたメールアドレスを「to」として設定
            $mail->addAddress($to, $toname);

            // ユーザー名のアドレスを「cc」として設定
            $bcc = $mailname;
            $ccname = 'Daistyleお問い合わせ窓口';
            $mail->addBCC($bcc, $ccname);
        
            $body =  "$name 様\n"
                    . "\n"
                    . "お問い合わせありがとうございます。\n"
                    . "以下の内容でお問い合わせを受け付けました。\n"
                    . "\n"
                    . $message . "\n"
                    . "\n"
                    . "お電話又はメールにてご返信いたします。。\n"
                    . "担当者からのご返信をお待ちください。\n"
                    . "\n"
                    . "このメールに心当たりがない場合は、このメールを破棄してください。"
                    . "\n"
                    . '株式会社Daistyle'
                    . "\n"
                    . 'http://localhost:3000/practice/final_reference_task/test6.php'
                    . "\n";

            $mail->isSMTP();
            $mail->Host       = $host;
            $mail->SMTPAuth   = true;
            $mail->Username   = $mailname;
            $mail->Password   = $password;
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;
            $mail->setFrom($from, $fromname);
            $mail->CharSet = "UTF-8";
            $mail->Encoding="base64";
        
            $mail->Subject = $subject;
            $mail->Body    = $body;
        
            $mail->send();
            echo '<script>alert("Thanks! Your message has been sent.");</script>';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>
  
  
    


    
	<footer id="footer">
	<small>&copy; Daisuke Yamaguchi All Rights Reserved.</small>
	</footer>



<!--=============JS ===============--> 
<!--jQuery-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!--プログレスバー＋数字カウントアップ＋画面が開く-->
<script src="https://rawgit.com/kimmobrunfeldt/progressbar.js/master/dist/progressbar.min.js"></script>
<!--IE11用-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/6.26.0/polyfill.min.js"></script>
<!--ゆっくりズームアウトさせながら全画面で見せる-->    
<script src="https://cdnjs.cloudflare.com/ajax/libs/vegas/2.4.4/vegas.min.js"></script>
<!--リンクをクリックすると、背景が暗くなり動画や画像やテキストを表示-->    
<script src="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/js/modaal.min.js"></script>
<!--スクロールすると1画面移動-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/scrollify/1.0.21/jquery.scrollify.min.js"></script>


<script>




/*===========================================================*/
/*ゆっくりズームアウトさせながら全画面で見せる*/
/*===========================================================*/

//画像の設定

var windowwidth = window.innerWidth || document.documentElement.clientWidth || 0;
		if (windowwidth > 768){
			var responsiveImage = [//PC用の画像
				{ src: 'img/kiyotsu.jpg'},
				{ src: 'img/Okinawasea.jpg'},
				{ src: 'img/bg_03.jpg'}
			];
		} else {
			var responsiveImage = [//タブレットサイズ（768px）以下用の画像
				{ src: 'img/kiyotsu.jpg' },
				{ src: 'img/Okinawasea.jpg' },
				{ src: 'img/bg_sp03.jpg' }
			];
		}

//Vegas全体の設定

$('#slider').vegas({
		overlay: 'https://cdnjs.cloudflare.com/ajax/libs/vegas/2.4.4/overlays/06.png',//画像の上に網線やドットのオーバーレイパターン画像を指定。
		transition: 'blur',//切り替わりのアニメーション。http://vegas.jaysalvat.com/documentation/transitions/参照。fade、fade2、slideLeft、slideLeft2、slideRight、slideRight2、slideUp、slideUp2、slideDown、slideDown2、zoomIn、zoomIn2、zoomOut、zoomOut2、swirlLeft、swirlLeft2、swirlRight、swirlRight2、burnburn2、blurblur2、flash、flash2が設定できる。
		transitionDuration: 2000,//切り替わりのアニメーション時間をミリ秒単位で設定
		delay: 10000,//スライド間の遅延をミリ秒単位で。
		animationDuration: 20000,//スライドアニメーション時間をミリ秒単位で設定
		animation: 'kenburns',//スライドアニメーションの種類。http://vegas.jaysalvat.com/documentation/transitions/参照。kenburns、kenburnsUp、kenburnsDown、kenburnsRight、kenburnsLeft、kenburnsUpLeft、kenburnsUpRight、kenburnsDownLeft、kenburnsDownRight、randomが設定可能。
		slides: responsiveImage,//画像設定を読む
	});


/*===========================================================*/
/*リンクをクリックすると、背景が暗くなり動画や画像やテキストを表示*/
/*===========================================================*/

//テキストを含む一般的なモーダル
$(".btn-view2").modaal({
	overlay_close:true,//モーダル背景クリック時に閉じるか
	before_open:function(){// モーダルが開く前に行う動作
		$('html').css('overflow-y','hidden');/*縦スクロールバーを出さない*/
        $.scrollify.disable();//scrollfyのプラグインを無効に
	},
	after_close:function(){// モーダルが閉じた後に行う動作
		$('html').css('overflow-y','scroll');/*縦スクロールバーを出す*/
        $.scrollify.enable();//scrollfyのプラグインを有効に
	}
});


/*===========================================================*/
/*サムネイルをクリックするとグループ化された画像一覧を表示する*/
/*===========================================================*/

//画像をクリックしたら現れる画面の設定	
$(".btn-view").modaal({
	fullscreen:'true', //フルスクリーンモードにする
	before_open:function(){// モーダルが開く前に行う動作
		$('html').css('overflow-y','hidden');/*縦スクロールバーを出さない*/
        $.scrollify.disable();//scrollfyのプラグインを無効に
	},
	after_close:function(){// モーダルが閉じた後に行う動作
		$('html').css('overflow-y','scroll');/*縦スクロールバーを出す*/
        $.scrollify.enable();//scrollfyのプラグインを有効に
	}
});


/*===========================================================*/
/*（印象）スクロールすると1画面移動*/
/*===========================================================*/

$.scrollify({
	section : ".box",//1ページスクロールさせたいエリアクラス名
	scrollbars:"false",//スクロールバー表示・非表示設定
	interstitialSection : "#header",//ヘッダーを認識し、1ページスクロールさせず表示されるように設定
	easing: "swing", // 他にもlinearやeaseOutExpoといったjQueryのeasing指定可能
    scrollSpeed: 300, // スクロール時の速度
	
	//以下は、ページネーションの設定
	before:function(i,panels) {
      var ref = panels[i].attr("data-section-name");
      $(".pagination .active").removeClass("active");
      $(".pagination").find("a[href=\"#" + ref + "\"]").addClass("active");
    },
    afterRender:function() {
      var pagination = "<ul class=\"pagination\">";
      var activeClass = "";
      $(".box").each(function(i) {//1ページスクロールさせたいエリアクラス名を指定
        activeClass = "";
        if(i===$.scrollify.currentIndex()) {
          activeClass = "active";
        }
        pagination += "<li><a class=\"" + activeClass + "\" href=\"#" + $(this).attr("data-section-name") + "\"><span class=\"hover-text\">" + $(this).attr("data-section-name").charAt(0).toUpperCase() + $(this).attr("data-section-name").slice(1) + "</span></a></li>";
      });
      pagination += "</ul>";

      $("#box1").append(pagination);//はじめのエリアにページネーションを表示
      $(".pagination a").on("click",$.scrollify.move);
    }

  });

// アニメーションの名前の定義
function fadeAnime(){
    //ぼかしから出現
	
	$('.blurTrigger').each(function(){ //blurTriggerというクラス名が
		var elemPos = $(this).offset().top-50;//要素より、50px上の
		var scroll = $(window).scrollTop();
		var windowHeight = $(window).height();
		if (scroll >= elemPos - windowHeight){
		$(this).addClass('blur');// 画面内に入ったらblurというクラス名を追記
		}else{
		$(this).removeClass('blur');// 画面外に出たらblurというクラス名を外す
		}
		});	
}

/*===========================================================*/
/*テキストが1文字づつ出現*/
/*===========================================================*/

// eachTextAnimeにappeartextというクラス名を付ける定義
function EachTextAnimeControl() {
	$('.eachTextAnime').each(function () {
		var elemPos = $(this).offset().top - 50;
		var scroll = $(window).scrollTop();
		var windowHeight = $(window).height();
		if (scroll >= elemPos - windowHeight) {
			$(this).addClass("appeartext");

		} else {
			$(this).removeClass("appeartext");
		}
	});
}

/*===========================================================*/
/* 関数をまとめる*/
/*===========================================================*/

// 画面をスクロールをしたら動かしたい場合の記述
$(window).scroll(function () {
	EachTextAnimeControl();
    fadeAnime();
});

// ページが読み込まれたらすぐに動かしたい場合の記述
$(window).on('load', function () {
    
/*===========================================================*/
/*プログレスバー＋数字カウントアップ＋画面が開く*/
/*===========================================================*/

//テキストのカウントアップ+バーの設定
var bar = new ProgressBar.Line(splash_text, {//id名を指定
	easing: 'easeInOut',//アニメーション効果linear、easeIn、easeOut、easeInOutが指定可能
	duration: 1000,//時間指定(1000＝1秒)
	strokeWidth: 0.2,//進捗ゲージの太さ
	color: '#fff',//進捗ゲージのカラー
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

//プログレスバーのアニメーションスタート
bar.animate(1.0, function () {//バーを描画する割合を指定します 1.0 なら100%まで描画
	$("#splash_text").fadeOut(10);//フェードアウトでローディングテキストを削除
	$(".loader_cover-up").addClass("coveranime");//カバーが上に上がるクラス追加
	$(".loader_cover-down").addClass("coveranime");//カバーが下に下がるクラス追加
    
    //==ローディングエリア（splashエリア）をフェードアウトした後に動かしたいJSをまとめる    
	$("#splash").fadeOut('slow',function(){//#splashエリアをフェードアウトした後にアニメーションを実行
        
    /*テキストが1文字づつ出現*/
	//spanタグを追加する
	var element = $(".eachTextAnime");
	element.each(function () {
		var text = $(this).text();
		var textbox = "";
		text.split('').forEach(function (t, i) {
			if (t !== " ") {
				if (i < 10) {
					textbox += '<span style="animation-delay:.' + i + 's;">' + t + '</span>';
				} else {
					var n = i / 10;
					textbox += '<span style="animation-delay:' + n + 's;">' + t + '</span>';
				}

			} else {
				textbox += t;
			}
		});
		$(this).html(textbox);
	});

	EachTextAnimeControl();//テキストが1文字づつ出現の関数を呼ぶ        
    fadeAnime();
        
    }); //ローディングエリア（splashエリア）を0.8秒でフェードアウトした後に動かしたいJSをまとめる
    });//プログレスバー表示
    
});//すぐに動かしたい場合の記述


</script>

</body>

</html>