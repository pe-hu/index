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
#calendar h1,
#calendar .date,
#calendar .title
{font-family: flower;}
#calendar div u {text-decoration:none;}
#calendar div .date {
  font-size:125%;
  padding:0 2.5%;
  width:20%;
  float:left;
  pointer-events: none;
}
#calendar div p {
  position:absolute;
  z-index:2;
  padding:0; margin:0;
  display:inline-block;
}
#calendar div .title {
  font-size:150%;
  width:75%;
  right:0;
  white-space:nowrap;
  text-decoration:none;
  pointer-events: none;
}
#calendar .info
{
  font-family:secretcrane;
  letter-spacing:1rem;
  font-style:normal;
}
#calendar .info span {
  width: 7.5rem; height:7.5rem;
  margin:0 0.5rem 0.5rem;
  position: relative;
  display: inline-block;
}
#calendar .info img {width: 100%;}
#calendar div a {color: #000;}
#calendar div a:hover {zoom:2.5; background-color:rgba(255,190,200,0.5);}

#calendar div .none {pointer-events:none;}
#calendar .info .none {display:none;}

</style>
<title>works | ayumi akutagawa</title>
</head>
<body>
<div id="menu"></div>
<div id="calendar" class="">
<h1>works</h1>
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<div>
<p class="date"><?=h($row[0])?></p>
<p class="title"><u><?=h($row[1])?></u></p>
<a class="<?=h($row[2])?>" href="<?=h($row[2])?>" target="_blank" rel="noopener noreferrer">
<marquee class="info" scrollamount="15">
<span class="<?=h($row[3])?>"><img src="<?=h($row[4])?>"></span>
<span class="<?=h($row[5])?>"><img src="<?=h($row[6])?>"></span>
<span class="<?=h($row[7])?>"><img src="<?=h($row[8])?>"></span>
<span class="<?=h($row[9])?>"><img src="<?=h($row[10])?>"></span>
<span class="<?=h($row[11])?>"><img src="<?=h($row[12])?>"></span>
</marquee>
</a>
</div>
<?php endforeach; ?>
<?php else: ?>
<div>
<p class="date">date</p>
<p class="title"><u>title</u></p>
<a class="none" href="<?=h($row[2])?>" target="_blank" rel="noopener noreferrer">
<marquee class="info" scrollamount="15">
images
</marquee>
</a>
</div>
<?php endif; ?>
</div>
</div>
</body>
</html>
