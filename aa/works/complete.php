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
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<meta http-equiv="refresh" content="1;URL=/jp/cm/aa/works/">
<meta name="viewport" content="width=device-width">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="/css/calendar.css"/>
<link rel="stylesheet" type="text/css" href="/css/menu.css"/>
<link rel="stylesheet" type="text/css" href="/css/welcome.css"/>
<link rel="stylesheet" type="text/css" href="/jp/cm/font/fonts.css"/>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
$(function(){
$("#").load("");
})
</script>
<style type="text/css">
#title {
  font-family:secretcrane;
  letter-spacing:1rem;
  font-style:normal;
}
</style>
<title>works | ayumi akutagawa</title>
</head>
<body>
<div id="calendar" class="">
<p class="title">Complete</p>
</div>
</body>
</html>
