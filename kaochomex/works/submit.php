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
#calendar
{font-family: "Yuppy TC","HGP創英角ゴシックUB";}
</style>
<title>Submit My Piece | Kaori Nakao</title>
</head>
<body>
<div id="menu"></div>
<div id="calendar" class="">
<h1>/works/submit.php</h1>
<section id="submit" class="refine">
<form action="complete.php" method="post">
<p>※ 活動形態を下記から選択</p>
  <input id="refine-1" type="radio" name="category" value="a" required><span class="refine-1"><b>✔</b></span>
  <label class="refine-btn a" for="refine-1">Idea</label>
  <input id="refine-2" type="radio" name="category" value="b" required><span class="refine-2"><b>✔</b></span>
  <label class="refine-btn b" for="refine-2">Join</label>
  <input id="refine-3" type="radio" name="category" value="c" required><span class="refine-3"><b>✔</b></span>
  <label class="refine-btn c" for="refine-3">Activity</label>
  <input id="refine-4" type="radio" name="category" value="d" required><span class="refine-4"><b>✔</b></span>
  <label class="refine-btn d" for="refine-4">Residency</label>
<hr/>
<p>日付<br/>
<input type="text" name="sub" placeholder="日付を入力" required></p>
<p>題名<br/>
<input type="name" name="title" placeholder="活動名を入力" required></p>
<p>説明<br/>
<textarea name="info" placeholder="活動について、25字前後で簡単に説明" required></textarea></p>
<p>リンク
<select name="href" required>
<option value="block">ある</option>
<option value="none">ない</option>
</select><br/>
<input type="url" name="link" placeholder="活動に関連するウェブサイトなどのURLを入力"></p>
<button type="submit">Submit</button>
</form>
</section>
</div>
</body>
</html>
