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
<script src="http://creative-community.pe.hu/coding/js/org.js"></script>
<link rel="stylesheet" href="org.css"/>
<script type="text/javascript">
$(function(){
$("#").load("");
})
</script>
<style type="text/css">
#org .label, .reset a, button
  {font-size:0.9rem;}
#org {
  position:fixed;
  top:0; left:2.5%;
  z-index:10;
  padding:0.5rem;
font-family: "Yuppy TC","HGP創英角ゴシックUB", cursive;
  background-color:rgb (255,255,255,0.5);
}
.book {
  display:block;
  position:relative;
font-family: "Yuppy TC","HGP創英角ゴシックUB", cursive;
  width:100%;
  height:100vh;
}
.book #think {
  position:absolute;
  padding:10vh 2.5% 1vh;
  width:95%;
  min-height:88vh;
  display:flex;
	align-content:flex-start;
	flex-direction:row-reverse;
  flex-wrap: wrap-reverse;
}
.book #think li {
  position:relative;
  white-space:pre-wrap;
  font-size:0.75rem;
  border:#ccc solid 1px;
  padding:0.2rem;
}
</style>
</head>
<body>
<div class="book">

<form id="org" style="display:;">
<div>
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
<div class="reset">
<a onclick="window.location.reload();">RESET</a>
</div>
</div>
</form>

<ul id="think">
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<li class="list_item list_toggle" data-to="<?=h($row[1])?>" data-be="<?=h($row[2])?>" data-feel="<?=h($row[3])?>"><?=h($row[0])?></li>
<?php endforeach; ?>
<?php else: ?>
<li class="list_item list_toggle" data-to="<?=h($row[1])?>" data-be="<?=h($row[2])?>" data-feel="<?=h($row[3])?>">words</li>
<?php endif; ?>
</ul>
</div>
</body>
</html>
