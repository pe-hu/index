<?php
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$title = (string)filter_input(INPUT_POST, 'title');
$contents = (string)filter_input(INPUT_POST, 'contents');
$tag = (string)filter_input(INPUT_POST, 'tag');
$url = (string)filter_input(INPUT_POST, 'url');
$link = (string)filter_input(INPUT_POST, 'link');

$fp = fopen('think.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$title, $contents, $tag, $url, $link,]);
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
<title> ORG | Think Book </title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="org.js"></script>
<script type="text/javascript">
$(function(){
$("#menu").load("../menu/");
})
</script>
<script type="text/javascript">
</script>
<link rel="stylesheet" type="text/css" href="book.css"/>
<link rel="stylesheet" type="text/css" href="../cv/greating.css"/>
<style type="text/css">
.list li span {
  animation:2s ease-in infinite fontmotion;
}
</style>
</head>
<body>
<div id="menu"></div>

<div id="greating">
<form id="org">
<div class="search-box tag">
<ul>
<li>
<input type="radio" name="tag" value="one" id="one">
<label for="one" class="label">1</label></li>
<li>
<input type="radio" name="tag" value="two" id="two">
<label for="two" class="label">2</label></li>
</ul>
</div>
<div class="reset">
<input type="reset" name="reset" value="View All" class="reset-button">
</div>
</form>

<ul class="list">
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<li class="list_item list_toggle" data-tag="<?=h($row[2])?>">
<span><?=h($row[0])?></span>
<p><?=h($row[1])?></p>
<a style="display: <?=h($row[4])?>;" href="<?=h($row[3])?>" target="_blank" rel="noopener noreferrer"></a>
</li>
<?php endforeach; ?>
<?php else: ?>
<li class="list_item list_toggle" data-tag="<?=h($row[2])?>">
<span>Title</span>
<p>contents</p>
<a style="display: <?=h($row[4])?>;" href="<?=h($row[3])?>" target="_blank" rel="noopener noreferrer"></a>
</li>
<?php endif; ?>
</ul>
</div>
</body>
</html>
