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
<meta http-equiv="refresh" content="1;URL=index.php">
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
h1, h2, button,.content {
font-family: "Yuppy TC","HGP創英角ゴシックUB", cursive;
}
</style>
</head>
<body>
<div id="header">
<a>Think Book</a>
<div><a href="/index.php">Complete</a></div>
</div>
</body>
</html>
