<?php
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$word = (string)filter_input(INPUT_POST, 'word');
$to = (string)filter_input(INPUT_POST, 'to');
$be = (string)filter_input(INPUT_POST, 'be');
$feel = (string)filter_input(INPUT_POST, 'feel');
$time = (string)filter_input(INPUT_POST, 'time');

$fp = fopen('book.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$word, $to, $be, $feel, $time,]);
    rewind($fp);
}

flock($fp, LOCK_SH);
while ($row = fgetcsv($fp)) {
    $rows[] = $row;
}
flock($fp, LOCK_UN);
fclose($fp);

?>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Think Book | Kaori Nakao</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="http://chottocrazy.pe.hu/online/org/org.js"></script>
<link rel="stylesheet" href="org.css"/>
<script type="text/javascript">
$(function(){
$("#menu").load("/jp/cm/kaochomex/menu.html");
})
</script>
<style type="text/css">
#submit {
  position:fixed;
  z-index:1;
	font-size:1rem;
  width:75%;
  overflow-x:hidden;
  overflow-y:auto;
font-family: "Yuppy TC","HGP創英角ゴシックUB", cursive;
  top:0; left:0;
  text-align:center;
  background-color:rgba(255,255,255,0.75);
  top: 50%; left: 50%;
  -webkit-transform:translate(-50%,-50%); transform:translate(-50%,-50%);
}
#submit ul {
  width:8rem;
  zoom:1.5;
  margin:0 auto;
  display: flex;
  flex-wrap: wrap;
  align-content: center;
}
#submit .label {
  display: inline-block;
  margin:0 0.25rem;
  padding:0.25rem;
  width:1rem;
  font-size:0.75rem;
  color: #000;
}
#submit .label:hover {
  cursor:pointer;
  background-color:#eee;
	text-shadow:0.1rem 0.1rem #fff;
}
#submit textarea {
  padding:0.5rem 2.5%;
  margin:1.5rem 0 0;
  border:0.1rem solid;
  border-radius:0.5rem;
  font-family: "Yuppy TC";
  width:95%;
}
</style>
</head>
<body>
<div id="menu"></div>
<section>
<form action="complete.php" method="post">
<div id="submit">
<div class="search-box to">
<ul>
<li>
<input type="radio" name="to" value="must" id="must" required>
<label for="must" class="label">💡</label></li>
<li>
<input type="radio" name="to" value="should" id="should" required>
<label for="should" class="label">💭</label></li>
<li>
<input type="radio" name="to" value="may" id="may" required>
<label for="may" class="label">〰</label></li>
<li>
<input type="radio" name="to" value="might" id="might" required>
<label for="might" class="label">🍃</label></li>
</ul>
</div>
<div class="search-box be">
<ul>
<li>
<input type="radio" name="be" value="true" id="true" required>
<label for="true" class="label">🔗</label></li>
<li>
<input type="radio" name="be" value="flash" id="flash" required>
<label for="flash" class="label">🌱</label></li>
<li>
<input type="radio" name="be" value="none" id="none" required>
<label for="none" class="label">🕳</label></li>
<li>
<input type="radio" name="be" value="false" id="false" required>
<label for="false" class="label">💥</label></li>
<li>
</ul>
</div>
<div class="search-box feel">
<ul>
<li>
<input type="radio" name="feel" value="clear" id="clear" required>
<label for="clear" class="label">🧊</label></li>
<li>
<input type="radio" name="feel" value="dust" id="dust" required>
<label for="dust" class="label">🔳</label></li>
<li>
<input type="radio" name="feel" value="excite" id="excite" required>
<label for="excite" class="label">⛲</label></li>
<li>
<input type="radio" name="feel" value="nothing" id="nothing" required>
<label for="nothing" class="label">⬜️</label></li>
</ul>
</div>
<h2>
<textarea name="word" placeholder="memo" required></textarea></h2>
<br/>
<div class="reset">
<button type="submit">Submit</button>
</div>
</div>
</form>
</section>
</body>
</html>
