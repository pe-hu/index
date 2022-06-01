<?php

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$date = (string)filter_input(INPUT_POST, 'date'); // $_POST['date']
$title = (string)filter_input(INPUT_POST, 'title'); // $_POST['title']
$info = (string)filter_input(INPUT_POST, 'info'); // $_POST['info']
$link = (string)filter_input(INPUT_POST, 'link'); // $_POST['link']
$category = (string)filter_input(INPUT_POST, 'category'); // $_POST['category']
$click = (string)filter_input(INPUT_POST, 'click'); // $_POST['click']

$fp = fopen('topics.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$date, $title, $info, $link, $category, $click]);
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
<html>
<head>
<link rel="stylesheet" type="text/css" href="" />
<style type="text/css">
#contents {
  position:relative;
  width:200px;
  min-width:15.5vw;
  height:200px;
  min-height:15.5vw;
  padding:1vw;
  margin:0.5vw;
  float:left;
  font-family: "Arial", sans-serif;
}
#contents u {
  font-size:75%;
  font-family: 'IBM Plex Mono', monospace;
}
#contents .title {
  font-style:italic;
  font-family:"Times New Roman", serif;
  margin:1vw 0 0;
  font-size:125%;
}
#contents .info {
  margin:1.25vw 0 0;
  font-size:75%;
}
#contents a {
  position: absolute;
  margin:0;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  text-indent:-999px;
}
#contents a:hover {
  cursor:pointer;
  background-color:rgba(225,225,225,0.25);
}
#contents .none {display:none;}
.refine {
  clear:both;
  font-size:1rem;
  line-height:150%;
  padding:0 2.5%;
  font-family: 'IBM Plex Mono', monospace;
}
.refine input[type=radio] {display:none;}
.refine-btn {
  display:inline-block;
  margin:0rem 0.5rem 0.25rem 0;
  padding: 0 0.25rem;
  cursor:pointer;
}
.show a {
  border:red 0.1rem solid;
}
.live a {
  border:blue 0.1rem solid;
}
.shop a {
  border:gold 0.1rem solid;
}
.appointment a {
  background-color:rgba(225,225,225,0.5);
}
.community a {
  border:#000 0.1rem solid;
}
.upcoming a {
  box-shadow:#000 0.25rem 0.25rem 0.25rem;
}
.residency a {
  border:green 0.1rem solid;
}
#refine-1:checked ~ .refine-teims:not(.show),
#refine-2:checked ~ .refine-teims:not(.live),
#refine-3:checked ~ .refine-teims:not(.upcoming),
#refine-4:checked ~ .refine-teims:not(.shop),
#refine-5:checked ~ .refine-teims:not(.appointment),
#refine-6:checked ~ .refine-teims:not(.community),
#refine-7:checked ~ .refine-teims:not(.residency),
#refine-8:checked ~ .refine-teims:not(.members) {
  display: none;
}
.refine b {
  display:inline-block;
  text-align:center;
  font-family: "Arial", sans-serif;
}
.refine span:before {
	content:'[';
  opacity:1;
  font-weight:500;
  padding-right:0rem;
}
.refine span:after {
	content:']';
  opacity:1;
  font-weight:500;
  padding-left:0rem;
}
.refine input[type=radio]:checked + .refine-0 b,
.refine input[type=radio]:checked + .refine-1 b,
.refine input[type=radio]:checked + .refine-2 b,
.refine input[type=radio]:checked + .refine-3 b,
.refine input[type=radio]:checked + .refine-4 b,
.refine input[type=radio]:checked + .refine-5 b,
.refine input[type=radio]:checked + .refine-6 b,
.refine input[type=radio]:checked + .refine-7 b,
.refine input[type=radio]:checked + .refine-8 b
{opacity: 1; color:blue;}

.refine b {opacity:0;}

.refine-0,
.refine-1,
.refine-2,
.refine-3,
.refine-4,
.refine-5,
.refine-6,
.refine-7,
.refine-8
{opacity:1;}

@media screen and (max-width: 750px){
  #contents {
    width:150px;
    min-width:27.5vw;
    height:150px;
    min-height:27.5vw;
  }
  .refine {
    font-size:0.75rem;
  }
}
@media screen and (max-width: 550px){
  #contents {
    width:95%;
    margin:0 0 0.5rem;
    padding:2.5%;
    font-size:125%;
    height:auto;
  }
#contents .title {
  margin:3vw 0 3vw;
  font-size:150%;
  line-height:150%;
}
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width">
<title>∧° ┐ | Happenings</title>
</head>
<body>
<div id="menu"></div>
<div class="refine">
  <input id="refine-0" type="radio" name="refine-btn" checked><span class="refine-0"><b>✔</b></span>
  <label class="refine-btn all" for="refine-0">ALL</label>
  <input id="refine-3" type="radio" name="refine-btn"><span class="refine-3"><b>✔</b></span>
  <label class="refine-btn upcoming" for="refine-3">UPCOMING</label>
  <input id="refine-5" type="radio" name="refine-btn"><span class="refine-5"><b>✔</b></span>
  <label class="refine-btn appointment" for="refine-5">BY APPOINTMENT</label>
  <input id="refine-8" type="radio" name="refine-btn"><span class="refine-8"><b>✔</b></span>
  <label class="refine-btn members" for="refine-8">MEMBERS ONLY</label>
  <br/>
  <input id="refine-6" type="radio" name="refine-btn"><span class="refine-6"><b>✔</b></span>
  <label class="refine-btn community" for="refine-6">COMMUNITY EVENT</label>
  <input  id="refine-1" type="radio" name="refine-btn"><span class="refine-1"><b>✔</b></span>
  <label class="refine-btn show" for="refine-1">EXHIBITION</label>
  <input id="refine-2" type="radio" name="refine-btn"><span class="refine-2"><b>✔</b></span>
  <label class="refine-btn live" for="refine-2">LIVE/PERFORMANCE</label>
  <input id="refine-7" type="radio" name="refine-btn"><span class="refine-7"><b>✔</b></span>
  <label class="refine-btn residency" for="refine-7">OPEN STUDIO</label>
  <input id="refine-4" type="radio" name="refine-btn"><span class="refine-4"><b>✔</b></span>
  <label class="refine-btn shop" for="refine-4">POP-UP STORE</label>
<hr/>
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<div id="contents" class="refine-teims<?=h($row[4])?>">
<a class="<?=h($row[5])?>" href="<?=h($row[3])?>"></a>
<u><?=h($row[0])?></u>
<p class="title"><?=h($row[1])?></p>
<p class="info"><?=h($row[2])?></p>
</div>
<?php endforeach; ?>
<?php else: ?>
<div id="contents" class="refine-teims">
<a></a>
<u>date</u>
<p class="title">Title</p>
<p class="info">infomation of this event</p>
</div>
<?php endif; ?>
</div>
</body>
</html>
