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
$("#menu").load("/jp/cm/aa/menu.html");
})
</script>
<style type="text/css">
#calendar
{font-family: flower;}
</style>
<title>submit works | ayumi akutagawa</title>
</head>
<body>
<div id="menu"></div>
<div id="calendar" class="">
<h1>/works/submit.php</h1>
<section id="submit" class="refine">
<form action="complete.php" method="post">
<p>date<br/>
<input type="text" name="date" required></p>
<p>title<br/>
<input type="name" name="title" required></p>
<p>link<br/>
<input type="name" name="link" required></p>
<p>image 1
<select name="have_1" required>
<option value="block">Have</option>
<option value="none">None</option>
</select><br/>
<input type="name" name="img_1"></p>
<p>image 2
<select name="have_2" required>
<option value="block">Have</option>
<option value="none">None</option>
</select><br/>
<input type="name" name="img_2"></p>
<p>image 3
<select name="have_3" required>
<option value="block">Have</option>
<option value="none">None</option>
</select><br/>
<input type="name" name="img_3"></p>
<p>image 4
<select name="have_4" required>
<option value="block">Have</option>
<option value="none">None</option>
</select><br/>
<input type="name" name="img_4"></p>
<p>image 5
<select name="have_5" required>
<option value="block">Have</option>
<option value="none">None</option>
</select><br/>
<input type="name" name="img_5"></p>
<button type="submit">Submit</button>
</form>
</section>
</div>
</body>
</html>
