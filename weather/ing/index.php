<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Weathering with</title>
<link href="/css/writing.css" rel="stylesheet">
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
#title .left,
#writing #log p,
#title .right
{font-family: Arial, Helvetica Neue, Helvetica, sans-serif;}
#log p:not(:first-of-type) {display:none;}
</style>
</head>
<body>
<div id="menu"></div>
<h1 id="title">
<span class="left"><a href="submit.php">Weathering</a></span>
<span class="right"><a href="submit.php">with</a></span>
</h1>
<div id="writing">
<div id="log">
<?php
$fp = fopen('you.txt', 'r');
while ($line = fgets($fp)) {
echo '<p>' . htmlspecialchars($line, ENT_QUOTES) . "</p>\n";
}
fclose($fp);
?>
</div>
</div>
</body>
</html>
