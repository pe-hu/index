<?php

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$open = (string)filter_input(INPUT_POST, 'open');
$day = (string)filter_input(INPUT_POST, 'week');
$open = (string)filter_input(INPUT_POST, 'week');
$cafe = (string)filter_input(INPUT_POST, 'cafe');
$shop = (string)filter_input(INPUT_POST, 'shop');
$gallery = (string)filter_input(INPUT_POST, 'gallery');
$topic = (string)filter_input(INPUT_POST, 'topic');
$event = (string)filter_input(INPUT_POST, 'event');
$time = (string)filter_input(INPUT_POST, 'time');
$title = (string)filter_input(INPUT_POST, 'title');
$price = (string)filter_input(INPUT_POST, 'price');
$discussion = (string)filter_input(INPUT_POST, 'discussion');

$fp = fopen('1901.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$open, $day, $week, $cafe, $shop, $gallery, $topic, $event, $time, $title, $price, $discussion]);
    rewind($fp);
}
flock($fp, LOCK_SH);
while ($row = fgetcsv($fp)) {
    $rows[] = $row;
}
flock($fp, LOCK_UN);
fclose($fp);

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>∧° ┐ | creative, community space</title>
<link rel="stylesheet" href="stylesheet.css"/>
<style>
</style>
</head>
<body>
<hedder>
<ul class="month">
<li><h1><b>1月<br>January</b></h1></li>
<li><h1>FEATURED</h1>
6 (sun) <a href="/pehu/show/sign.html">Sign</a>
7 - 19 <a href="http://vg.pe.hu/2f/tws1.html">TWS1</a>
26 - 27 <a href="http://vg.pe.hu/2f/hf1.html">HF+S1</a>
27 (sun) <a href="/pehu/show/talk/">千紗子と純太の謎</a>
</li>
</ul>
</hedder>
<ul class="date">
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<li class="<?=h($row[0])?> <?=h($row[2])?>">
  <b class="day"><?=h($row[1])?></b>
  <p class="cafe <?=h($row[3])?>">
    <b></b><br>
    <u class="hour"></u>
  </p>
  <p class="shop <?=h($row[4])?>">
    <b></b><br>
    <u class="hour"></u>
  </p>
  <p class="gallery <?=h($row[5])?>">
    <b></b><br>
    <u class="hour"></u>
    <span class="topic"><?=h($row[6])?></span>
  </p>
  <p class="event <?=h($row[7])?>">
    <?=h($row[8])?><br/><u><?=h($row[9])?></u><br/>
    <span class="price"><?=h($row[10])?></span>
  </p>
  <p class="discussion <?=h($row[11])?>"><br/>
    <u></u>
  </p>
</li>
<?php endforeach; ?>
<?php else: ?>
<?php endif; ?>
</ul>
</body>
</html>
