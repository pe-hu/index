<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Secret Crane / Flower</title>
<link href="/css/writing.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/css/menu.css"/>
<link rel="stylesheet" type="text/css" href="/css/onmouse.css"/>
<link rel="stylesheet" type="text/css" href="/css/welcome.css"/>
<link rel="stylesheet" type="text/css" href="/jp/cm/font/fonts.css"/>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
$(function(){
$("#menu").load("/jp/cm/aa/menu.html");
})
</script>
<style type="text/css">
#title .left,
#writing #log p {
  font-family:secretcrane;
  letter-spacing:1rem;
  font-weight:100;
  line-height:250%;
   -ms-user-select: none; /* IE 10+ */
   -moz-user-select: -moz-none;
   -khtml-user-select: none;
   -webkit-user-select: none;
   user-select: none;
}
#title .right,
#writing textarea,
#onmouse_open #by {
  font-family:flower;
  font-weight:600;
}
@media screen and (max-width: 900px){
  #onmouse_open, form {display:none;}
}
</style>
</head>
<body>
<div id="menu"></div>
<a id="onmouse_button">?</a>
<div id="onmouse">
<div id="onmouse_open">
<p>フォントを自作できるウェブサイト「metaflop」で、秘密の暗号を作成しました。<br/>秘密の暗号が対応する文字は、アルファベットまたは数字のみです。</p>
<p>小文字はほとんど現れないので、大文字を多めに使用することをおすすめします。</p>
<p>皆さんの秘密のメッセージを、ぜひここにご投稿ください。</p>
<p id="by">by Ayumi Akutagawa</p>
</div>
</div>

<div id="greating">
<div id="writing">
<form action="submit.php" method="post">
<textarea name="message" placeholder="WRITING YOUR SECRET MESSAGE BY ALPHABET OR NUMBER'S" required></textarea>
<input type="submit" value="POST" />
</form>
<div id="log">
<?php
$fp = fopen('writing.txt', 'r');
while ($line = fgets($fp)) {
echo '<p>' . htmlspecialchars($line, ENT_QUOTES) . "</p>\n";
}
fclose($fp);
?>
</div>
</div>
</div>
</body>
</html>
