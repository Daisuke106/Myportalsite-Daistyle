<?php


?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>ポータルサイト</title>
    <meta name="description"  content="My_Portalsite">
    <meta name="robots" content="noindex,nofollow"><meta name="keywords"  content="">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <!--=============Google Font ===============-->
    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
    <!--スクロールすると画面分割した左右がそれぞれ動く-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/multiscroll.js/0.2.2/jquery.multiscroll.css">
<style>



@charset "utf-8";
/* レイアウトのためのCSS */

body{
    font-family: 'Oswald', sans-serif;
    text-transform: uppercase;
    letter-spacing: 0.1em;
	color: #fff;
	font-size:1rem;
	line-height:1.85;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
	-webkit-text-size-adjust: 100%; 
	word-wrap: break-word;
}

ul{
	margin:0;
	padding: 0;
	list-style: none;
}

a{
	color: #fff;
	text-decoration: none;
    outline: none;
}

img{
    max-width:100%;
    height: auto;
}

*{
    box-sizing: border-box
}

/* HEADER */

nav{
	position: relative;
	z-index:999;
	padding:5px 20px;
}

h1{
    font-size: 2rem;
    position: absolute;
    top:50%;
    left:50%;
    transform: translate(-50%,-50%);
    z-index: 999;
    letter-spacing: 0.1em;
    width:10em;
    opacity: 0;/*ローディング画面では透過*/
}

@media screen and (max-width:768px){
 h1{
    font-size: 1.5rem;
    }
}

body.appear h1{
    opacity: 1;
}

/* area */
.sp-bottom{
    text-align: center;
}

#left6 .sp-bottom{
    position: absolute;
    top:50%;
    left:50%;
    transform: translate(-50%,-50%);    
}

h2{
    font-size: 2rem;
    letter-spacing: 0.2em;
    margin: 0 0 30px 0;
}

@media screen and (max-width:550px){
 h2{
    font-size: 1.5rem;
    }
}


#left6 .sp-bottom p{
    margin:0 0 50px 0;
    letter-spacing: 0.3em;
    white-space: nowrap;
}

#left6 .sp-bottom ul{
    display: flex;
    justify-content: center;
}

#left6 .sp-bottom ul li{
    margin: 0 10px;
}

#left6 .sp-bottom ul img{
     height:25px;   
}

#footer{
    position: fixed;
    bottom:20px;
    left: 20px;
}

@media screen and (max-width:550px){
 
#footer{
    bottom:inherit;
    left: 20px;
    top:20px;
}   
}



/*ロゴアウトラインアニメーション*/

/* Loading背景画面設定　*/
#splash {
    /*fixedで全面に固定*/
	position: fixed;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background:#504237;
	text-align:center;
	color:#fff;
}

/* Loading画像中央配置　*/
#splash_logo {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
}

/* Loading アイコンの大きさ設定　*/
#splash_logo svg{
    width:250px;
}

/*= SVGアニメーション内の指定 =*/

/*アニメーション前の指定*/
#mask path {
		fill-opacity: 0;/*最初は透過0で見えない状態*/
		transition: fill-opacity .5s;/*カラーがつく際のアニメーション0.5秒で変化*/
		fill: none;/*塗りがない状態*/
		stroke: #fff;/*線の色*/
	}

/*アニメーション後に.doneというクラス名がで付与された時の指定*/
#mask.done path{
	  fill: #fff;/*塗りの色*/
	  fill-opacity: 1;/*透過1で見える状態*/
	  stroke: none;/*線の色なし*/
	}

/*背景色が伸びる（上から下）*/

/*画面遷移アニメーション*/
.splashbg{
	display: none;
}

body.appear .splashbg{
    display: block;
    position:fixed;
	z-index: 999;
    width: 100%;
    height: 100vh;
    top: 0;
	left: 0;
    transform: scaleY(0);
    background-color:#504237;/*伸びる背景色の設定*/
	animation-name:PageAnime;
	animation-duration:1.2s;
	animation-timing-function:ease-in-out;
	animation-fill-mode:forwards;
}

@keyframes PageAnime{
	0% {
		transform-origin:top;
		transform:scaleY(0);
	}
	50% {
		transform-origin:top;
		transform:scaleY(1);
	}
	50.001% {
		transform-origin:bottom;
	}
	100% {
		transform-origin:bottom;
		transform:scaleY(0);
	}
}

/*画面遷移の後現れるコンテンツ設定*/
#container{
    position: relative;
    z-index: 1;
	opacity: 0;/*はじめは透過0に*/
}

/*bodyにappearクラスがついたら出現*/
body.appear #container{
	animation-name:PageAnimeAppear;
	animation-duration:1s;
	animation-delay: 0.8s;
	animation-fill-mode:forwards;
	opacity: 0;
}

@keyframes PageAnimeAppear{
	0% {
	opacity: 0;
	}
	100% {
	opacity: 1;
}
}

/*中心から外に線が伸びる（中央）*/
#menu li a{
    /*線の基点とするためrelativeを指定*/
	position: relative;
}

#menu li a::after {
    content: '';
    /*絶対配置で線の位置を決める*/
    position: absolute;
    bottom: 34px;
    left: 10%;
    /*線の形状*/
    width: 80%;
    height: 1px;
    background: #fff;
    /*アニメーションの指定*/
    transition: all .3s;
    transform: scale(0, 1);/*X方向0、Y方向1*/
    transform-origin: center top;/*上部中央基点*/
}

/*現在地とhoverの設定*/
#menu li a:hover::after {
    transform: scale(1, 1);/*X方向にスケール拡大*/
}

/*縦線が動いてスクロールを促す*/

/*スクロールダウン全体の場所*/
.scrolldown1{
    /*描画の位置*/
	position:absolute;
	right:50px;
	bottom:50px;
    /*全体の高さ*/
	height:50px;
}

/*Scrollテキストの描写*/
.scrolldown1 span{
    /*描画位置*/
	position: absolute;
	left:-15px;
	top: -15px;
    /*テキストの形状*/
	color: #eee;
	font-size: 0.7rem;
	letter-spacing: 0.05em;
}

/* 線の描写 */
.scrolldown1::after{
	content: "";
    /*描画位置*/
	position: absolute;
	top: 0;
    /*線の形状*/
	width: 1px;
	height: 30px;
	background: #eee;
    /*線の動き1.4秒かけて動く。永遠にループ*/
	animation: pathmove 1.4s ease-in-out infinite;
	opacity:0;
}

/*高さ・位置・透過が変化して線が上から下に動く*/
@keyframes pathmove{
	0%{
		height:0;
		top:0;
		opacity: 0;
	}
	30%{
		height:30px;
		opacity: 1;
	}
	100%{
		height:0;
		top:50px;
		opacity: 0;
	}
}

/*背景が流れる（左から右）*/

/*== ボタン共通設定 */
.btn{
    /*アニメーションの起点とするためrelativeを指定*/
    position: relative;
	overflow: hidden;
    /*ボタンの形状*/
	text-decoration: none;
	display: inline-block;
   	border: 1px solid #fff;/* ボーダーの色と太さ */
    padding: 10px 30px;
    text-align: center;
    outline: none;
    /*アニメーションの指定*/   
    transition: ease .2s;
}

/*ボタン内spanの形状*/
.btn span {
	position: relative;
	z-index: 3;/*z-indexの数値をあげて文字を背景よりも手前に表示*/
	color:#fff;
}

/*== 左から右 */
.bgleft:before {
 	content: '';
    /*絶対配置で位置を指定*/
 	position: absolute;
 	top: 0;
 	left: 0;
 	z-index: 2;
    /*色や形状*/
 	background:#333;/*背景色*/
 	width: 100%;
	height: 100%;
    /*アニメーション*/
 	transition: transform .6s cubic-bezier(0.8, 0, 0.2, 1) 0s;
 	transform: scale(0, 1);
	transform-origin: right top;
}

/*hoverした際の形状*/
.bgleft:hover:before{
	transform-origin:left top;
	transform:scale(1, 1);
}


/*テキストがタイピング風に出現*/

.TextTyping span {
	display: none;
    color: #00bfff;
}

.TextTyping::after {
 	content: "|";
	animation: typinganime .8s ease infinite;
    font-weight: normal;
    padding: 0 0 0 10px;
    color: #000000;
}

@keyframes typinganime{
	from{opacity:0}
	to{opacity:1}
}



/*雪が降る・桜が散る*/

.particle{ 
	position:absolute;/*描画固定*/
    left:0;
    top:0;
	width: 100%;
	height: 100vh;
}

/*雪の設定*/
/*スクロールすると画面分割した左右がそれぞれ動く*/

/*全体のエリア設定*/

.ms-section{
	color:#fff;
	padding:20px;
}

.ms-section a{
	color:#fff;
}

/*右にある丸ナビゲーション色*/

#multiscroll-nav span{
	background:transparent!important;
	border-color:#fff!important;
}

/*右にある丸のナビゲーション現在地色*/

#multiscroll-nav li .active span{
	background:#fff!important;
}

/*左上のナビゲーション*/

#menu li {
	display:inline-block;
}

#menu li a{
	display:inline-block;
	text-decoration:none;
	color: #fff;
	padding:20px;
}

/*左エリア画像設定*/
#left1{
	background:url("../gift_sample/1-12/img/airport-left.jpg") no-repeat center right;
	background-size:cover;
}

#right1{
	background:url("../gift_sample/1-12/img/airport-right.jpg") no-repeat center left;
	background-size:cover;
}

#right2{
	background:url("../gift_sample/1-12/img/global-foram.jpg") no-repeat center;
	background-size:cover;
}

#right3{
	background:url("../gift_sample/1-12/img/green.jpg") no-repeat center;
	background-size:cover;
}

#right4{
	background:url("../gift_sample/1-12/img/night_tokyo.jpg") no-repeat center;
	background-size:cover;
}

#left4{
	background:url("../gift_sample/1-12/img/country_house.jpg") no-repeat center;
	background-size:cover;
}

#right5{
	background:url("../gift_sample/1-12/img/05.jpg") no-repeat center;
	background-size:cover;
}

#left5{
	background:url("../gift_sample/1-12/img/06.jpg") no-repeat center;
	background-size:cover;
}

#right6{
	background:url("../gift_sample/1-12/img/pinefuji-left.jpg") no-repeat center;
	background-size:cover;
}

/*＝550px以下の見え方＝*/

@media screen and (max-width:550px){
	
#header{
	justify-content: center;
}

/*全体のボックスについている余白をリセット*/
.ms-section{
	padding:0;
}

/*天地中央になっている見せ方を上ぞろえに上書き*/
.ms-tableCell{
	vertical-align:top;
}

/*左上ナビゲーションと左エリア非表示*/
#menu,
.ms-right{
	display: none;
}

/*右エリアを横幅100%にして画像＋テキストを出す設定*/
.ms-left{
	width:100%!important;
}

/*右エリア上部画像設定*/
    
#left1{
    background:url("../gift_sample/1-12/img/airport-right.jpg") center;
    background-size:cover;
}

#left2 .sp-top{
	background:url("../gift_sample/1-12/img/global-foram.jpg") no-repeat center;
	background-size:cover;
    height: 50vh;
}

#left3 .sp-top{
	background:url("../gift_sample/1-12/img/02.jpg") no-repeat top center;
	background-size:cover;
    height: 50vh;
}
    
#left4 .sp-top{
	background:url("../gift_sample/1-12/img/03.jpg") no-repeat top center;
	background-size:cover;
    height: 50vh;
}
    
#left4 .sp-bottom{
	background:url("../gift_sample/1-12/img/04.jpg") no-repeat top center;
	background-size:cover;
    height: 50vh;
}

#left5 .sp-top{
	background:url("../gift_sample/1-12/img/05.jpg") no-repeat top center;
	background-size:cover;
    height: 50vh;
}
    
#left5 .sp-bottom{
	background:url("../gift_sample/1-12/img/07.jpg") no-repeat center;
	background-size:cover;
    height: 50vh;
}

#left6{
	background:url("../gift_sample/1-12/img/06.jpg") no-repeat center;
	background-size:cover;
}

.sp-bottom{
	padding:20px;
}
	
}









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

/***************************************************
 * Generated by SVG Artista on 8/21/2023, 5:28:29 PM
 * MIT license (https://opensource.org/licenses/MIT)
 * W. https://svgartista.net
 **************************************************/

 svg .svg-elem-1 {
  stroke-dashoffset: 2176.593994140625px;
  stroke-dasharray: 2176.593994140625px;
  -webkit-transition: stroke-dashoffset 1s cubic-bezier(0.47, 0, 0.745, 0.715) 0s;
          transition: stroke-dashoffset 1s cubic-bezier(0.47, 0, 0.745, 0.715) 0s;
}

svg.active .svg-elem-1 {
  stroke-dashoffset: 0;
}





</style>

</head>
<body>

<div id="splash">
<div id="splash_logo">
<!-- Generator: Adobe Illustrator 27.8.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<svg version="1.1" id="mask" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
	 y="0px" viewBox="0 0 488.8 193.6" style="enable-background:new 0 0 488.8 193.6;" xml:space="preserve">
<g id="_レイヤー_1-2">
	<path class="st0" d="M0.4,138.3c28.8-42,54.6-86,77-131.8c24.9,0.6,52.6,8.2,64.9,30c9.7,17.2,6.7,39.6-4.2,56
		c-10.9,16.4-28.5,27.4-47.1,34c-22.6,8.1-47.3,10.3-71,6.4c26,5.1,52.9,7.7,78.8,2.4s50.9-19.6,64.6-42.3
		c-19.8,4.4-36.7,20.3-42.2,39.8c2.8,2.8,7.4-0.1,10.1-3c9.7-10.3,19.1-20.7,28.3-31.4c-5.9,5.2-10.5,12-12.9,19.5
		c-0.7,2.3-1.3,4.8-0.4,7c2.1,5.5,10.2,4.7,15.6,2.4c13.7-6,25.7-15.9,34.2-28.2c-5.1,5.9-10.3,11.7-15.4,17.6
		c-1.9,2.2-3.9,4.7-3.8,7.6c0.2,4.1,4.9,6.8,9,6.3c4.1-0.4,7.6-3,10.8-5.5c13.1-10,26.2-20,39.2-30c1.4-1.1,0.4-4.6-0.3-2.9
		c6.1,8.6,2.4,21.7-6.4,27.6c-8.7,5.9-20.7,5.4-30.1,0.8c20.5,4.3,40.8-6.9,57.8-19.1c38-27.3,70.8-61.8,96.1-101.2
		c-21.3,37.9-56,66.2-83.1,100.2c-2.2,2.7-4.4,6.3-3,9.4c1,2.2,3.4,3.3,5.7,4c10.2,2.9,21.3,0.3,30.5-4.9c9.2-5.2,16.9-12.6,24.5-20
		c-6,3.8-10.9,9.4-13.6,16c-1.1,2.6-1.8,5.7-0.3,8c2.5,3.8,8.5,2.3,12.6,0.2c20.8-10.6,39.7-24.8,55.5-41.9
		c-36.6,32.3-46.7,89.2-87.7,115.8c-4.8,3.1-10.1,5.8-15.8,6.1s-11.8-2.2-14.4-7.3c-5.2-9.9,5.2-20.7,14.6-26.8
		c64-42.2,137.1-70.5,196-119.6c5.7-4.8,11.6-10.2,13.3-17.4c0.9-3.6,0.5-7.6-1.4-10.7c-3.7-5.8-12.1-7.1-18.5-4.7
		c-6.4,2.5-11.3,7.7-15.8,13c-24.8,28.8-45,61.5-59.9,96.5c-0.6,1.5-1.3,3.2-0.8,4.8c1.3,4.2,7.6,2.7,11.4,0.3
		c10.8-7,21.7-13.9,32.5-20.9"/>
</g>
</svg>

<!--/splash-logo--></div>
<!--/splash--></div>
<div class="splashbg"></div><!---画面遷移用-->
    
<div id="container">
<header id="header">
	<nav>
	<ul id="menu">
		<li data-menuanchor="area1"><a href="#area1">Top</a></li>
		<li data-menuanchor="area6"><a href="#area6">Contact</a></li>
        <li><a href="http://localhost:3000/practice/final_reference_task/Loginform/loginform18star1.php">SIGN IN & SIGN UP</a></li>
	</ul>
	</nav>
</header>

<div id="wrapper">

	<div class="ms-left">
		<div class="ms-section" id="left1">
            <h1 class="TextTyping">Daistyle Collection 2023 WEB APPLICATION PORTFOLIO</h1>
            <div class="particle" id="pt1"></div>
        </div>
		<section class="ms-section" id="left2">
            <div class="sp-top"></div>
			<div class="sp-bottom">
			<h2>My Photography</h2>
            <a href="http://localhost:3000/practice/final_reference_task/test7.php" class="btn bgleft"><span>Collection</span></a>
			</div>
        </section>
		<section class="ms-section" id="left3">
            <div class="sp-top"></div>
			<div class="sp-bottom">
			<h2>Daistyle Lifestyle shop</h2>
            <a href="http://localhost:3000/practice/store/main.php" class="btn bgleft"><span>SHOP</span></a>
			</div>
        </section>
		<div class="ms-section" id="left4">
			<div class="sp-top"></div>
			<div class="sp-bottom"></div>
        <div class="particle" id="pt3"></div>
        </div>
		<div class="ms-section" id="left5">
			<div class="sp-top"></div>
			<div class="sp-bottom"></div>
        <div class="particle" id="pt5"></div>
        </div>
		<section class="ms-section" id="left6">
			<div class="sp-bottom">
			<h2>Contact</h2>
			<p>TEL:03-1234-5678</p>
            <a href="http://localhost:3000/practice/final_reference_task/test7.php#Contact" class="btn bgleft"><span>CONTACT FORM</span></a>
            <ul>
                <li><a href="https://www.instagram.com/daisuke_1234/" target="_blank"><img src="../gift_sample/1-12/img/ico_insta.svg" alt=""></a></li>
                <li><a href="#" target="_blank"><img src="../gift_sample/1-12/img/ico_tw.svg" alt=""></a></li>
                <li><a href="#" target="_blank"><img src="../gift_sample/1-12/img/ico_fb.svg" alt=""></a></li>
            </ul>
			</div>        
        </section>
	<!--/ms-left--></div>
	
	<div class="ms-right">
        
		<div class="ms-section" id="right1">
        <div class="scrolldown1"><span>Scroll</span></div>
        <div class="particle" id="pt2"></div>
    	<!--/right1--></div>

		<div class="ms-section" id="right2">
		<!--/right2--></div>

		<div class="ms-section" id="right3">
		<!--/right3--></div>
		
		<div class="ms-section" id="right4">
        <div class="particle" id="pt4"></div>
		<!--/right4--></div>
    
    	<div class="ms-section" id="right5">
        <div class="particle" id="pt6"></div>
		<!--/right5--></div>
				
		<div class="ms-section" id="right6">
		<!--/right6--></div>
	<!--/ms-right--></div>
<!--/wrapper--></div>
<footer id="footer">
<small>&copy; Daistyle</small>
</footer>
<!--/container--></div>
	





<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="156px" height="300px" viewBox="0 0 156 300">
  <defs>
    <style>
      .fill {fill: #fff;}
    </style>
  </defs>
  <path class="fill" d="M101.000,300.000 C101.000,300.000 101.000,163.000 101.000,163.000 C101.000,163.000 147.000,163.000 147.000,163.000 C147.000,163.000 154.000,110.000 154.000,110.000 C154.000,110.000 101.000,110.000 101.000,110.000 C101.000,110.000 101.000,76.000 101.000,76.000 C101.000,60.552 105.857,50.000 128.000,50.000 C128.000,50.000 156.000,50.000 156.000,50.000 C156.000,50.000 156.000,2.000 156.000,2.000 C151.113,1.351 134.503,-0.000 115.000,-0.000 C74.282,-0.000 46.000,25.336 46.000,71.000 C46.000,71.000 46.000,110.000 46.000,110.000 C46.000,110.000 0.000,110.000 0.000,110.000 C0.000,110.000 0.000,163.000 0.000,163.000 C0.000,163.000 46.000,163.000 46.000,163.000 C46.000,163.000 46.000,300.000 46.000,300.000 C46.000,300.000 101.000,300.000 101.000,300.000 Z"/>
</svg>






<!--?xml version="1.0" encoding="utf-8"?-->
<!-- Generator: Adobe Illustrator 19.2.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<svg version="1.1" id="_x31_0" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"  width="512px" height="512px"  xml:space="preserve">
<style type="text/css">
	.st0{fill:#fff;}
</style>
<g>
	<path class="st0" d="M363.024,0H148.976C69.063,0,4.281,64.782,4.281,144.695v222.61C4.281,447.218,69.063,512,148.976,512h214.047
		c79.914,0,144.695-64.782,144.695-144.695v-222.61C507.719,64.782,442.937,0,363.024,0z M55.652,144.695
		c0-51.461,41.863-93.324,93.324-93.324h214.047c51.461,0,93.324,41.863,93.324,93.324v222.61c0,51.461-41.863,93.324-93.324,93.324
		H148.976c-51.461,0-93.324-41.863-93.324-93.324V144.695z"></path>
	<path class="st0" d="M256,387.851c72.703,0,131.852-59.148,131.852-131.851S328.703,124.145,256,124.145
		c-72.702,0-131.851,59.152-131.851,131.855S183.297,387.851,256,387.851z M256,165.242c50.043,0,90.754,40.714,90.754,90.758
		S306.043,346.758,256,346.758c-50.042,0-90.754-40.714-90.754-90.758S205.957,165.242,256,165.242z"></path>
	<ellipse class="st0" cx="391.707" cy="120.296" rx="29.539" ry="29.541"></ellipse>
</g>
</svg>





<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="350px" height="300px" viewBox="0 0 350 300">
  <defs>
    <style>
      .fill {fill: #fff;}
    </style>
  </defs>
  <path class="fill" d="M350.001,35.509 C346.026,42.167 340.649,49.197 333.870,56.595 C328.493,62.513 321.944,68.556 314.231,74.720 C314.231,74.720 314.231,76.940 314.231,76.940 C314.231,76.940 314.231,79.530 314.231,79.530 C314.231,80.762 314.346,81.626 314.579,82.119 C314.579,82.119 314.579,84.708 314.579,84.708 C314.579,110.109 310.022,135.572 300.903,161.097 C291.785,186.620 278.809,209.494 261.975,229.715 C243.971,251.417 222.113,268.556 196.394,281.134 C170.674,293.711 141.917,299.999 110.122,299.999 C89.546,299.999 70.142,297.041 51.904,291.122 C33.201,285.202 15.899,276.818 -0.001,265.967 C0.936,266.214 2.337,266.338 4.208,266.338 C7.948,266.831 10.755,267.077 12.626,267.077 C12.626,267.077 17.183,267.077 17.183,267.077 C33.550,267.077 49.567,264.242 65.231,258.569 C79.727,253.144 93.403,245.253 106.263,234.895 C91.300,234.649 77.387,229.469 64.531,219.357 C51.904,209.494 43.486,197.040 39.279,181.997 C42.786,182.737 45.007,183.105 45.943,183.105 C45.943,183.105 49.447,183.105 49.447,183.105 C50.151,183.352 51.202,183.476 52.605,183.476 C54.708,183.476 56.346,183.352 57.516,183.105 C59.853,183.105 63.128,182.612 67.335,181.626 C67.801,181.626 68.505,181.502 69.439,181.256 C70.376,181.009 71.075,180.887 71.542,180.887 C54.941,177.434 41.265,168.679 30.509,154.622 C19.520,140.565 14.029,124.536 14.029,106.534 C14.029,106.534 14.029,106.163 14.029,106.163 C14.029,106.163 14.029,105.794 14.029,105.794 C14.029,105.794 14.029,105.424 14.029,105.424 C18.471,108.383 23.615,110.603 29.460,112.082 C35.538,114.054 41.265,115.042 46.644,115.042 C36.354,107.644 28.640,98.642 23.497,88.038 C17.651,77.187 14.729,65.102 14.729,51.786 C14.729,44.388 15.546,37.729 17.183,31.810 C18.120,27.617 20.457,21.576 24.198,13.685 C42.435,37.358 64.177,55.854 89.429,69.172 C115.382,83.475 142.969,91.366 172.195,92.847 C171.494,87.667 171.145,84.832 171.145,84.339 C170.674,80.886 170.441,78.051 170.441,75.830 C170.441,54.868 177.456,36.989 191.483,22.193 C205.512,7.396 222.462,-0.002 242.337,-0.002 C252.623,-0.002 262.325,2.094 271.444,6.286 C280.562,10.971 288.394,16.891 294.942,24.042 C302.423,22.315 310.372,19.850 318.788,16.644 C325.803,13.931 333.051,10.232 340.532,5.547 C337.729,14.424 333.634,22.439 328.260,29.591 C322.179,36.989 315.751,42.907 308.969,47.347 C315.984,46.113 322.999,44.634 330.010,42.907 C335.388,41.428 342.052,38.961 350.001,35.509 Z"/>
</svg>


<!--=============JS ===============--> 
<!--jQuery-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="  crossorigin="anonymous"></script>
<!--ロゴアウトラインアニメーション-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/vivus/0.4.4/vivus.min.js"></script>
<!--（印象）雪が降る・桜が散る-->
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<!--（印象）スクロールすると画面分割した左右がそれぞれ動く-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/multiscroll.js/0.2.2/jquery.multiscroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

<script>
/*ロゴアウトラインアニメーション*/

//SVGアニメーションの描画
var stroke;
stroke = new Vivus('mask', {//アニメーションをするIDの指定
    start:'manual',//自動再生をしない設定（マニュアル）
    type: 'scenario-sync',// アニメーションのタイプを設定
    duration: 10,//アニメーションの時間を設定。数字が小さくなるほど速い
    forceRender: false,//パスが更新された場合に再レンダリングさせない
    animTimingFunction:Vivus.EASE,//動きの加速減速設定
},
function(){
         $("#mask").attr("class", "done");//描画が終わったらdoneというクラスを追加
}
);

/*（印象）テキストがタイピング風に出現*/

// TextTypingというクラス名がついている子要素（span）を表示から非表示にする定義
function TextTypingAnime() {
	$('.TextTyping').each(function () {
		var elemPos = $(this).offset().top - 50;
		var scroll = $(window).scrollTop();
		var windowHeight = $(window).height();
        var thisChild = "";
		if (scroll >= elemPos - windowHeight) {
			thisChild = $(this).children(); //spanタグを取得
			//spanタグの要素の１つ１つ処理を追加
			thisChild.each(function (i) {
				var time = 100;
				//時差で表示する為にdelayを指定しその時間後にfadeInで表示させる
				$(this).delay(time * i).fadeIn(time);
			});
		} else {
			thisChild = $(this).children();
			thisChild.each(function () {
				$(this).stop(); //delay処理を止める
				$(this).css("display", "none"); //spanタグ非表示
			});
		}
	});
}

/*（印象）雪が降る*/
/*雪1*/
particlesJS("pt1", {
  "particles": {
    "number": {
      "value": 150,/*この数値を変更すると雪の数が増減できる*/
      "density": {
        "enable": true,
        "value_area": 800
      }
    },
    "color": {
      "value": "#ffffff"
    },
    "shape": {
      "type": "image",/*形状は画像を指定*/
      "stroke": {
        "width": 3,
        "color": "#fff"
      },
      "image": {
        "src": "../gift_sample/1-12/img/snow.png",/*画像を指定*/
        "width": 120,
        "height": 120
      }
    },
    "opacity": {
      "value": 0.7,
      "random": false,
      "anim": {
        "enable": false,
        "speed": 1,
        "opacity_min": 0.1,
        "sync": false
      }
    },
    "size": {
      "value": 5,
      "random": true,
      "anim": {
        "enable": false,
        "speed": 20,
        "size_min": 0.1,
        "sync": false
      }
    },
    "line_linked": {
      "enable": false,
    },
    "move": {
      "enable": true,
      "speed": 3,/*数値を小さくするとゆっくりな動き*/
      "direction": "bottom",/*下に向かって落ちる*/
      "random": true,/*動きはランダム*/
      "straight": false,/*動きをとどめない*/
      "out_mode": "out",/*画面の外に出るように描写*/
      "bounce": false,/*跳ね返りなし*/
      "attract": {
        "enable": true,
        "rotateX": 300,
        "rotateY": 1200
      }
    }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": false,
      },
      "onclick": {
        "enable": false,
      },
      "resize": true
    }
  },
  "retina_detect": true
});	

/*雪2*/
particlesJS("pt2", {
  "particles": {
    "number": {
      "value": 150,/*数値を変更すると雪の数が増減できる*/
      "density": {
        "enable": true,
        "value_area": 800
      }
    },
    "color": {
      "value": "#ffffff"
    },
    "shape": {
      "type": "image",/*形状は画像を指定*/
      "stroke": {
        "width": 3,
        "color": "#fff"
      },
      "image": {
        "src": "../gift_sample/1-12/img/snow.png",/*画像を指定*/
        "width": 120,
        "height": 120
      }
    },
    "opacity": {
      "value": 0.7,
      "random": false,
      "anim": {
        "enable": false,
        "speed": 1,
        "opacity_min": 0.1,
        "sync": false
      }
    },
    "size": {
      "value": 5,
      "random": true,
      "anim": {
        "enable": false,
        "speed": 20,
        "size_min": 0.1,
        "sync": false
      }
    },
    "line_linked": {
      "enable": false,
    },
    "move": {
      "enable": true,
      "speed": 3,/*この数値を小さくするとゆっくりな動きになる*/
      "direction": "bottom",/*下に向かって落ちる*/
      "random": true,/*動きはランダム*/
      "straight": false,/*動きをとどめない*/
      "out_mode": "out",/*画面の外に出るように描写*/
      "bounce": false,/*跳ね返りなし*/
      "attract": {
        "enable": true,
        "rotateX": 300,
        "rotateY": 1200
      }
    }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": false,
      },
      "onclick": {
        "enable": false,
      },
      "resize": true
    }
  },
  "retina_detect": true
});	


/*葉が散るようにする*/
particlesJS("pt3", {
	"particles":{
		"number":{
			"value":15,/*この数値を変更すると落ち葉の数が増減できる*/
			"density":{
				"enable":true,
				"value_area":1121.6780303333778
			}
		},
		"color":{
			"value":"#fff"
		},
		"shape":{
			"type":"image",/*形状は画像を指定*/
			"stroke":{
				"width":0,
			},
			"image":{
				"src":"../gift_sample/1-12/img/flower.png",/*画像を指定*/
				"width":190,
				"height":204
			}
		},
		"opacity":{
			"value":0.06409588744762158,
			"random":true,
			"anim":{
				"enable":false,
				"speed":1,
				"opacity_min":0.1,
				"sync":false
			}
		},
		"size":{
			"value":12,
			"random":true,/*サイズをランダムに*/
			"anim":{
				"enable":false,
				"speed":4,
				"size_min":0.1,
				"sync":false
			}
		},
		"line_linked":{
			"enable":false,
		},
		"move":{
			"enable":true,
			"speed":7,/*数値を小さくするとゆっくりな動き*/
			"direction":"bottom-right",/*右下に向かって落ちる*/
			"random":false,/*動きはランダムにしない*/
			"straight":false,/*動きをとどめない*/
			"out_mode":"out",/*画面の外に出るように描写*/
			"bounce":false,/*跳ね返りなし*/
			"attract":{
				"enable":false,
				"rotateX":281.9177489524316,
				"rotateY":127.670995809726
			}
		}
	},
	"interactivity":{
		"detect_on":"canvas",
		"events":{
			"onhover":{
				"enable":false,
			},
			"onclick":{
				"enable":false,
			},
			"resize":true
		}
	},
	"retina_detect":false
});

/*落ち葉2*/
particlesJS("pt4", {
	"particles":{
		"number":{
			"value":15,/*数値を変更すると落ち葉の数が増減する*/
			"density":{
				"enable":true,
				"value_area":1121.6780303333778
			}
		},
		"color":{
			"value":"#fff"
		},
		"shape":{
			"type":"image",/*形状は画像を指定*/
			"stroke":{
				"width":0,
			},
			"image":{
				"src":"../gift_sample/1-12/img/flower.png",/*画像を指定*/
				"width":190,
				"height":204
			}
		},
		"opacity":{
			"value":0.06409588744762158,
			"random":true,
			"anim":{
				"enable":false,
				"speed":1,
				"opacity_min":0.1,
				"sync":false
			}
		},
		"size":{
			"value":12,
			"random":true,/*サイズをランダムに*/
			"anim":{
				"enable":false,
				"speed":4,
				"size_min":0.1,
				"sync":false
			}
		},
		"line_linked":{
			"enable":false,
		},
		"move":{
			"enable":true,
			"speed":7,/*数値を小さくするとゆっくりな動き*/
			"direction":"bottom-right",/*右下に向かって落ちる*/
			"random":false,/*動きはランダムにしない*/
			"straight":false,/*動きをとどめない*/
			"out_mode":"out",/*画面の外に出るように描写*/
			"bounce":false,/*跳ね返りなし*/
			"attract":{
				"enable":false,
				"rotateX":281.9177489524316,
				"rotateY":127.670995809726
			}
		}
	},
	"interactivity":{
		"detect_on":"canvas",
		"events":{
			"onhover":{
				"enable":false,
			},
			"onclick":{
				"enable":false,
			},
			"resize":true
		}
	},
	"retina_detect":false
});

/*落ち葉3*/
particlesJS("pt5", {
	"particles":{
		"number":{
			"value":15,/*数値を変更すると落ち葉の数が増減する*/
			"density":{
				"enable":true,
				"value_area":1121.6780303333778
			}
		},
		"color":{
			"value":"#fff"
		},
		"shape":{
			"type":"image",/*形状は画像を指定*/
			"stroke":{
				"width":0,
			},
			"image":{
				"src":"../gift_sample/1-12/img/flower.png",/*画像を指定*/
				"width":190,
				"height":204
			}
		},
		"opacity":{
			"value":0.06409588744762158,
			"random":true,
			"anim":{
				"enable":false,
				"speed":1,
				"opacity_min":0.1,
				"sync":false
			}
		},
		"size":{
			"value":12,
			"random":true,/*サイズをランダムに*/
			"anim":{
				"enable":false,
				"speed":4,
				"size_min":0.1,
				"sync":false
			}
		},
		"line_linked":{
			"enable":false,
		},
		"move":{
			"enable":true,
			"speed":7,/*数値を小さくするとゆっくりな動き*/
			"direction":"bottom-right",/*右下に向かって落ちる*/
			"random":false,/*動きはランダムにしない*/
			"straight":false,/*動きをとどめない*/
			"out_mode":"out",/*画面の外に出るように描写*/
			"bounce":false,/*跳ね返りなし*/
			"attract":{
				"enable":false,
				"rotateX":281.9177489524316,
				"rotateY":127.670995809726
			}
		}
	},
	"interactivity":{
		"detect_on":"canvas",
		"events":{
			"onhover":{
				"enable":false,
			},
			"onclick":{
				"enable":false,
			},
			"resize":true
		}
	},
	"retina_detect":false
});

/*落ち葉4*/
particlesJS("pt6", {
	"particles":{
		"number":{
			"value":15,/*数値を変更すると落ち葉の数が増減する*/
			"density":{
				"enable":true,
				"value_area":1121.6780303333778
			}
		},
		"color":{
			"value":"#fff"
		},
		"shape":{
			"type":"image",/*形状は画像を指定*/
			"stroke":{
				"width":0,
			},
			"image":{
				"src":"../gift_sample/1-12/img/flower.png",/*画像を指定*/
				"width":190,
				"height":204
			}
		},
		"opacity":{
			"value":0.06409588744762158,
			"random":true,
			"anim":{
				"enable":false,
				"speed":1,
				"opacity_min":0.1,
				"sync":false
			}
		},
		"size":{
			"value":12,
			"random":true,/*サイズをランダムに*/
			"anim":{
				"enable":false,
				"speed":4,
				"size_min":0.1,
				"sync":false
			}
		},
		"line_linked":{
			"enable":false,
		},
		"move":{
			"enable":true,
			"speed":7,/*数値を小さくするとゆっくりな動きになる*/
			"direction":"bottom-right",/*右下に向かって落ちる*/
			"random":false,/*動きはランダムにしない*/
			"straight":false,/*動きをとどめない*/
			"out_mode":"out",/*画面の外に出るように描写*/
			"bounce":false,/*跳ね返りなし*/
			"attract":{
				"enable":false,
				"rotateX":281.9177489524316,
				"rotateY":127.670995809726
			}
		}
	},
	"interactivity":{
		"detect_on":"canvas",
		"events":{
			"onhover":{
				"enable":false,
			},
			"onclick":{
				"enable":false,
			},
			"resize":true
		}
	},
	"retina_detect":false
});


/*スクロールすると画面分割した左右がそれぞれ動く*/

$('#wrapper').multiscroll({
	sectionsColor: ['#0f7fa7', '#504237', '#504237','#504237', '#504237', '#504237'],//セクションごとの背景色設定
	anchors: ['area1', 'area2', 'area3','area4','area5','area6'],//セクションとリンクするページ内アンカーになる名前
	menu: '#menu',//上部ナビゲーションのメニュー設定
	navigation: true,//右のナビゲーション出現、非表示は false
	//navigationTooltips:['Area1', 'Area2', 'Area3','Area4','Area5'],//右のナビゲーション現在地時に入るテキスト
	//loopTop: true,//最初のセクションを上にスクロールして最後のセクションまでスクロールするかどうかを定義します。
	loopBottom: true,//最後のセクションを下にスクロールして最初のセクションまでスクロールするかどうかを定義します。
    //※以下は今回のプラグインの組み合わせのみで使用。ページの途中でリロードしてもトップのタイピング出現
    afterLoad: function(anchorLink, index){
		if(index == 1){
			TextTypingAnime();
		}	
	}

    
});

/*関数をまとめる*/
// 画面をスクロールをしたら動かしたい場合の記述
$(window).scroll(function () {
	TextTypingAnime();//テキストがタイピング風に出現する関数を呼ぶ*/
});//画面をスクロールをしたら動かしたい場合の記述


// ページが読み込まれたらすぐに動かしたい場合の記述
$(window).on('load',function(){
    
    //ロゴアウトラインアニメーション
    $("#splash_logo").delay(3000).fadeOut('slow');//ロゴを3秒（3000ms）待機してからフェードアウト

    stroke.play();//SVGアニメーションの実行
  
    //ローディングエリア（splashエリア）をフェードアウトした後に動かしたいJSをまとめる    
    $("#splash").delay(3000).fadeOut(800,function(){//ローディング画面を3秒（3000ms）待機してからフェードアウトするように記述
    
    $('body').addClass('appear');//フェードアウト後bodyにappearクラス付与 
	
    //テキストがタイピング風に出現
	var element = $(".TextTyping");
	element.each(function () {
		var text = $(this).html();
		var textbox = "";
		text.split('').forEach(function (t) {
			if (t !== " ") {
				textbox += '<span>' + t + '</span>';
			} else {
				textbox += t;
			}
		});
		$(this).html(textbox);
	});
	TextTypingAnime();/* アニメーション用の関数を呼ぶ*/

}); //ローディングエリア（splashエリア）を0.8秒でフェードアウトした後に動かしたいJSをまとめる
    
});// ここまでページが読み込まれたらすぐに動かしたい場合の記述

</script>

</body>

</html>
