<?php

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$type = (string)filter_input(INPUT_POST, 'type'); // $_POST['type']
$info = (string)filter_input(INPUT_POST, 'onfo'); // $_POST['info']
$url = (string)filter_input(INPUT_POST, 'url'); // $_POST['url']

$fp = fopen('topics.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$type, $info, $url]);
    rewind($fp);
}
flock($fp, LOCK_SH);
while ($row = fgetcsv($fp)) {
    $rows[] = $row;
}
flock($fp, LOCK_UN);
fclose($fp);

?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width">
<script type="text/javascript">
$(function(){
})
</script>
<title>Update | creative-community.space</title>
<style>
#other {
  font-size: 2vw; padding:5% 2.5% 1.25%;
  font-family: "YuGothic","Yu Gothic","游ゴシック体";
}
#other a {
  display:inline;
  text-decoration:none;
  padding:0.5vw 1vw;
  filter: blur(1);
  -webkit-filter: blur(1);
  transition: all 1500ms ease;
}

#other a,
#other u {
  line-height:222%;
  margin:0.5vw 1vw 0.5vw 0;
}
.art a {
  color:#fff;
  background:red;
}
.shop a {
  color:#000;
  background:yellow;
}
.event a {
  color:#000;
  background:#eee;
}
</style>
</head>
<body>
<div id="other">
<u>その他の活動　Other Works</u>
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<span class="<?=h($row[0])?>">
<a href="<?=h($row[2])?>" target="_blank" rel="noopener noreferrer">
<?=h($row[1])?>
</a>
</span>
<?php endforeach; ?>
<?php else: ?>
<?php endif; ?>
</div>
</body>
</html>
