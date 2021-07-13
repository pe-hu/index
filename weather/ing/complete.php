<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Complete | Weathering with</title>
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
#complete {
  font-size:2.5rem;
  font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
  position:fixed;
  bottom:2.5%;
  right:5%;
}
</style>
</head>
<body>
<div id="menu"></div>
<?php

if ($_POST['message'] == '') {
  exit('error');
}

$message = $_POST['message'];
$now     = date('Y/m/d H:i');

$post_data = "$message ($now)\n";
$read_data = file_get_contents('you.txt');

file_put_contents('you.txt', $post_data . $read_data);

?>
<p id="complete"><a href="/jp/cm/weather/ing/"> Complete </a></p>
</body>
</html>