<?php

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$type = (string)filter_input(INPUT_POST, 'type'); // $_POST['type']
$info = (string)filter_input(INPUT_POST, 'onfo'); // $_POST['info']
$url = (string)filter_input(INPUT_POST, 'url'); // $_POST['url']

$fp = fopen('topic.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$type, $info, $url]);
    rewind($fp);
}
flock($fp, LOCK_SH);
while ($row = fgetcsv($fp)) {
    $rows[] = $row;
}
flock($fp, LOCK_UN);
fclose($fp);

?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width">
<script type="text/javascript">
$(function(){
})
</script>
<title>Update | creative-community.space</title>
<style>
.ipag {
    font-family: "ipag", monospace;
    transform: scale(1, 1.25);
}
@font-face {
  font-family: "ipag";
  src: url("https://creative-community.space/coding/fontbook/family/IPA/ipag.ttf");
}
#cc {
  font-size: 2vw; padding:2.5% 0;
}
#cc .show {
  border:1px solid #000;
  background:#fff;
}
#cc .program {
  color:#000;
  background:#eee;
}
#cc .online {
  border:1px solid #fff;
  background:#fff;
}
        
@media screen and (max-width: 750px) {
#cc {
  font-size: 0.75rem;
}
}
</style>
</head>
<body>
<div id="cc" class="ipag">
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<span class="<?=h($row[0])?>">
<?=h($row[1])?>
</span>
<?php endforeach; ?>
<?php else: ?>
<?php endif; ?>
</div>
</body>
</html>
