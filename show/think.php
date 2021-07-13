<?php
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$title = (string)filter_input(INPUT_POST, 'title');
$contents = (string)filter_input(INPUT_POST, 'contents');
$tag = (string)filter_input(INPUT_POST, 'tag');
$label = (string)filter_input(INPUT_POST, 'label');

$fp = fopen('think.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$title, $contents, $tag, $label,]);
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
</script>
<link rel="stylesheet" href="book.css"/>
<style type="text/css">
.list #done {
  zoom:1.5;
  padding:1rem 1.25rem;
}
.list li span {
  animation:2s ease-in infinite fontmotion;
}
</style>
</head>
<body>
<div id="header">
<a href="index.html" target="_parent">ORG</a>
<a href="submit.php" target="_parent">Submit</a>
</div>

<form id="org">
<div class="search-box tag">
<ul>
<li>
<input type="radio" name="tag" value="one" id="one">
<label for="one" class="label">1</label></li>
<li>
<input type="radio" name="tag" value="two" id="two">
<label for="two" class="label">2</label></li>
<li>
<input type="radio" name="tag" value="three" id="three">
<label for="three" class="label">3</label></li>
<li>
<input type="radio" name="tag" value="four" id="four">
<label for="four" class="label">4</label></li>
<li>
<input type="radio" name="tag" value="five" id="five">
<label for="five" class="label">5</label></li>
</ul>
</div>
<div class="search-box status">
<ul>
<li>
<input type="radio" name="label" value="a" id="a">
<label for="a" class="label">A</label></li>
<li>
<input type="radio" name="label" value="b" id="b">
<label for="b" class="label">B</label></li>
<li>
<input type="radio" name="label" value="c" id="c">
<label for="c" class="label">C</label></li>
</ul>
</div>
<div class="reset">
<input type="reset" name="reset" value="RESET" class="reset-button">
</div>
</form>

<ul class="list">
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<li id="<?=h($row[3])?>" class="list_item list_toggle" data-tag="<?=h($row[2])?>" data-label="<?=h($row[3])?>">
<span><?=h($row[0])?></span>
<p><?=h($row[1])?></p>
</li>
<?php endforeach; ?>
<?php else: ?>
<li id="<?=h($row[3])?>" class="list_item list_toggle" data-tag="<?=h($row[2])?>" data-label="<?=h($row[3])?>">
<span>Title</span>
<p>contents</p>
</li>
<?php endif; ?>
</ul>
</body>
</html>
