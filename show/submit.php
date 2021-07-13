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
<title> Submit | ORG </title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
$("#").load("");
})
</script>
<link rel="stylesheet" href="book.css"/>
<style type="text/css">
</style>
</head>
<body>
<div id="header">
<a href="index.html" target="_parent">ORG</a>
<a href="submit.php" target="_parent">Submit</a>
</div>
<form action="complete.php" id="org" method="post" target="_parent">
<p><input type="text" name="title" placeholder="title" required></p>
<div class="search-box tag">
<ul>
<li>
<input type="radio" name="tag" value="one" id="one">
<label for="one" class="label">使用例</label></li>
<li>
<input type="radio" name="tag" value="two" id="two">
<label for="two" class="label">応用例</label></li>
</ul>
<p>Link
<select name="link" required>
<option value="block">Yes</option>
<option value="none">None</option>
</select><br/>
<input type="url" name="url" placeholder="URL" required></p>
</select></p>
<p><textarea name="contents" placeholder="コメント" required></textarea></p>
</div>
<div class="reset">
<button type="submit">Submit | 投稿する</button>
</div>
</form>
</body>
</html>
