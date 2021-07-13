<?php

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$date = (string)filter_input(INPUT_POST, 'date'); // $_POST['date']
$title = (string)filter_input(INPUT_POST, 'title'); // $_POST['title']
$link = (string)filter_input(INPUT_POST, 'link'); // $_POST['link']
$have_1 = (string)filter_input(INPUT_POST, 'have_1'); // $_POST['have_1']
$img_1 = (string)filter_input(INPUT_POST, 'img_1'); // $_POST['img_1']
$have_2 = (string)filter_input(INPUT_POST, 'have_2'); // $_POST['have_2']
$img_2 = (string)filter_input(INPUT_POST, 'img_2'); // $_POST['img_2']
$have_3 = (string)filter_input(INPUT_POST, 'have_3'); // $_POST['have_3']
$img_3 = (string)filter_input(INPUT_POST, 'img_3'); // $_POST['img_3']
$have_4 = (string)filter_input(INPUT_POST, 'have_4'); // $_POST['have_4']
$img_4 = (string)filter_input(INPUT_POST, 'img_4'); // $_POST['img_4']
$have_5 = (string)filter_input(INPUT_POST, 'have_5'); // $_POST['have_5']
$img_5 = (string)filter_input(INPUT_POST, 'img_5'); // $_POST['img_5']

$fp = fopen('works.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$date, $title, $link, $have_1, $img_1, $have_2, $img_2, $have_3, $img_3, $have_4, $img_4, $have_5, $img_5]);
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
<title>design | ayumi akutagawa</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="org.js"></script>
<script type="text/javascript">
$(function(){
$("#menu").load("/jp/cm/aa/menu.html");
$("#cv_link").load("/jp/cm/aa/cv/link.php");
})
</script>
<script type="text/javascript">
</script>
<link rel="stylesheet" type="text/css" href="/jp/cm/show/book.css"/>
<link rel="stylesheet" type="text/css" href="/jp/cm/cv/greating.css"/>
<link rel="stylesheet" type="text/css" href="/jp/cm/font/fonts.css"/>
<style type="text/css">
#org h1,
#org .date,
#org .title
{font-family: flower;}
.list li span {
  animation:2s ease-in infinite fontmotion;
}
#org .date {
  font-size:125%;
  padding:0 2.5%;
  width:20%;
  display:inline-block;
  float:left;
  pointer-events: none;
}
#org .title {
  font-size:150%;
  width:75%;
  right:0;
  display:inline-block;
  white-space:nowrap;
  text-decoration:none;
  pointer-events: none;
}
#org p span {
  width: 20vw; height:20vw;
  margin:0 2.5vw 0 0;
  position: relative;
  display: inline-block;
}
#org p span img {width: 100%;}
</style>
</head>
<body>
<div id="menu"></div>

<div id="greating">
<form id="org">
<h1>design</h1>
</form>

<ul class="list">
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<li class="list_item list_toggle" data-tag="<?=h($row[2])?>">
<span>
  <b class="date"><?=h($row[0])?></b>
  <u class="title"><?=h($row[1])?></u>
</span>
<p>
<span style="display: <?=h($row[3])?>;"><img src="<?=h($row[4])?>"></span>
<span style="display: <?=h($row[5])?>;"><img src="<?=h($row[6])?>"></span>
<span style="display: <?=h($row[7])?>;"><img src="<?=h($row[8])?>"></span>
<span style="display: <?=h($row[9])?>;"><img src="<?=h($row[10])?>"></span>
<span style="display: <?=h($row[11])?>;"><img src="<?=h($row[12])?>"></span>
</p>
<a style="display: <?=h($row[4])?>;" href="<?=h($row[3])?>" target="_blank" rel="noopener noreferrer"></a>
</li>
<?php endforeach; ?>
<?php else: ?>
<li class="list_item list_toggle" data-tag="<?=h($row[2])?>">
<span>
  <b class="date">Title</b>
  <u class="title">contents</u>
</span>
<p>
<span class="have"><img src="http://vg.pe.hu/jp/logo.png"></span>
<span class="have"><img src="http://vg.pe.hu/jp/logo.png"></span>
<span class="have"><img src="http://vg.pe.hu/jp/logo.png"></span>
<span class="none"><img src="http://vg.pe.hu/jp/logo.png"></span>
<span class="none"><img src="http://vg.pe.hu/jp/logo.png"></span>
</p>
<a style="display: <?=h($row[4])?>;" href="<?=h($row[3])?>" target="_blank" rel="noopener noreferrer"></a>
</li>
<?php endif; ?>
</ul>
<div id="cv_link"></div>
</div>
</body>
</html>
