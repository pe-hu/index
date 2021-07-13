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
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="/css/calendar.css"/>
<link rel="stylesheet" type="text/css" href="/css/menu.css"/>
<link rel="stylesheet" type="text/css" href="/css/welcome.css"/>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
$(function(){
$("#menu").load("/jp/cm/kaochomex/menu.html");
})
</script>
<style type="text/css">
#calendar {font-family: "Yuppy TC","HGP創英角ゴシックUB", cursive;}
#calendar .title,
#calendar .info
{font-family: "Yuppy TC","HGP創英角ゴシックUB", cursive;}
</style>
<title>My Piece | Kaori Nakao</title>
</head>
<body>
<div id="menu"></div>
<div id="calendar" class="refine">
<h1>My Piece</h1>
  <input id="refine-0" type="radio" name="category" checked><span class="refine-0"><b>✔</b></span>
  <label class="refine-btn all" for="refine-0">ALL</label>
  <input  id="refine-1" type="radio" name="category"><span class="refine-1"><b>✔</b></span>
  <label class="refine-btn a" for="refine-1">Idea</label>
  <input id="refine-2" type="radio" name="category"><span class="refine-2"><b>✔</b></span>
  <label class="refine-btn b" for="refine-2">Join</label>
  <input id="refine-3" type="radio" name="category"><span class="refine-3"><b>✔</b></span>
  <label class="refine-btn c" for="refine-3">Activity</label>
  <input id="refine-4" type="radio" name="category"><span class="refine-4"><b>✔</b></span>
  <label class="refine-btn d" for="refine-4">Residency</label>
<hr/>
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<div id="<?=h($row[5])?>" class="refine-teims <?=h($row[4])?>">
<p class="date"><?=h($row[0])?></p>
<p class="title"><u><?=h($row[1])?></u></p>
<marquee class="info" scrollamount="15"><?=h($row[2])?></marquee>
<a class="link" href="<?=h($row[3])?>" target="_blank" rel="noopener noreferrer"></a>
</div>
<?php endforeach; ?>
<?php else: ?>
<div id="" class="refine-teims">
<p class="date">Sub</p>
<p class="title"><u>Title</u></p>
<marquee class="info" scrollamount="15">Information</marquee>
<a class="link" target="_blank" rel="noopener noreferrer"></a>
</div>
<?php endif; ?>
</div>
</body>
</html>
