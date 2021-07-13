<?php

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$sub = (string)filter_input(INPUT_POST, 'sub'); // $_POST['sub']
$title = (string)filter_input(INPUT_POST, 'title'); // $_POST['title']
$info = (string)filter_input(INPUT_POST, 'info'); // $_POST['info']
$link = (string)filter_input(INPUT_POST, 'link'); // $_POST['link']
$category = (string)filter_input(INPUT_POST, 'category'); // $_POST['category']
$href = (string)filter_input(INPUT_POST, 'href'); // $_POST['href']

$fp = fopen('update.txt', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$sub, $title, $info, $link, $category, $href]);
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
<title>My Piece | Kaori Nakao</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="/jp/cm/show/org.js"></script>
<script type="text/javascript">
$(function(){
$("#menu").load("/jp/cm/kaochomex/menu.html");
$("#cv_link").load("/jp/cm/kaochomex/cv/link.php");
})
</script>
<script type="text/javascript">
</script>
<link rel="stylesheet" type="text/css" href="/jp/cm/show/book.css"/>
<link rel="stylesheet" type="text/css" href="/jp/cm/cv/greating.css"/>
<style type="text/css">
#org h1,
.list .date,
.list .title
{font-family: "Yuppy TC","HGP創英角ゴシックUB", cursive;}
.list .date {
  font-size:100%;
  padding:0 2.5% 0 0;
  width:20%;
  display:inline-block;
  float:left;
  pointer-events: none;
}
.list .title {
  font-size:125%;
  width:75%;
  right:0;
  display:inline-block;
  white-space:nowrap;
  text-decoration:none;
  pointer-events: none;
}
.list li:hover {
  transform:scale(1.25)
}
</style>
</head>
<body>
<div id="menu"></div>

<div id="greating">
<form id="org">
<h1>My Piece</h1>
<div class="search-box tag">
<ul>
<li>
<input type="radio" name="tag" value="Idea" id="Idea">
<label for="Idea" class="label">Idea</label></li>
<li>
<input type="radio" name="tag" value="Join" id="Join">
<label for="Join" class="label">Join</label></li>
<li>
<input type="radio" name="tag" value="Activity" id="Activity">
<label for="Activity" class="label">Activity</label></li>
<li>
<input type="radio" name="tag" value="Residency" id="Residency">
<label for="Residency" class="label">Residency</label></li>
</ul>
</div>
<div class="reset">
<input type="reset" name="reset" value="View All" class="reset-button">
</div>
</form>

<ul class="list">
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<li class="list_item list_toggle" data-tag="<?=h($row[4])?>">
<span>
  <b class="date"><?=h($row[0])?></b>
  <u class="title"><?=h($row[1])?></u>
</span>
<p><?=h($row[2])?></p>
<a style="display:<?=h($row[3])?>;" href="<?=h($row[5])?>" target="_blank" rel="noopener noreferrer"></a>
</li>
<?php endforeach; ?>
<?php else: ?>
<li class="list_item list_toggle">
<span>
  <b class="date">Title</b>
  <u class="title">contents</u>
</span>
<p>Information</p>
<a style="display:none;" class="link" href="" target="_blank" rel="noopener noreferrer"></a>
</li>
<?php endif; ?>
</ul>
<div id="cv_link"></div>
</div>
</body>
</html>
