<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Secret Crane / Flower</title>
<link href="/css/writing.css" rel="stylesheet">
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
#secretcrane {
  Font-size:2.5rem;
  font-family:flower;
  font-weight:555;
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

$post_data = "$message\n";
$read_data = file_get_contents('writing.txt');

file_put_contents('writing.txt', $post_data . $read_data);

?>
<p id="secretcrane"><a href="index.php">THANK YOU</a></p>
</body>
</html>
