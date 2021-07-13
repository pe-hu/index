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

$fp = fopen('update.csv', 'a+b');
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
$("#menu").load("/jp/cm/weather/menu.html");
})
</script>
<style type="text/css">
#calendar
{font-family: Arial, Helvetica Neue, Helvetica, sans-serif;}
</style>
<title>Submit Show | Shoji Funakawa </title>
</head>
<body>
<div id="menu"></div>
<div id="calendar" class="">
<h1>/show/submit.php</h1>
<section id="submit" class="refine">
<form action="complete.php" method="post">
  <input id="refine-1" type="radio" name="category" value="a"><span class="refine-1"><b>✔</b></span>
  <label class="refine-btn a" for="refine-1">Art</label>
  <input id="refine-2" type="radio" name="category" value="b"><span class="refine-2"><b>✔</b></span>
  <label class="refine-btn b" for="refine-2">Performance</label>
<hr/>
<p>Category<br/>
<input type="text" name="sub" required></p>
<p>Date<br/>
<input type="name" name="title" placeholder="0000.00.00" required></p>
<p>Title<br/>
<textarea name="info" rows="7.5" required></textarea></p>
<p>Link
<select name="href" required>
<option value="link">Yes</option>
<option value="none">None</option>
</select><br/>
<input type="url" name="link"></p>
<button type="submit">Submit</button>
</form>
</section>
</div>
</body>
</html>