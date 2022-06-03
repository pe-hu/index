<?php

function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

$type = (string)filter_input(INPUT_POST, 'type'); // $_POST['type']
$info = (string)filter_input(INPUT_POST, 'onfo'); // $_POST['info']
$url = (string)filter_input(INPUT_POST, 'url'); // $_POST['url']

$fp = fopen('nlc.csv', 'a+b');
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
<title>Update | New Life Collection</title>
<style>
.nlc {
    font-family: 'Times New Roman', serif;
    font-weight: 500;
    font-stretch: condensed;
    font-variant: common-ligatures tabular-nums;
    transform: scale(1, 1.1);
    letter-spacing: -0.1rem;
    word-spacing: -0.1rem;
}
#nlc {
  font-size: 2vw; padding:2.5% 0;
}
#nlc .popup,
#nlc .event {
  background: linear-gradient(90deg, #B3CBF6, #FFC778, #EEE);
  background-size: 400% 400%;
}
#nlc .popup {
  border:0.75px solid;
  border-image: linear-gradient(-90deg, #B3CBF6, #FFC778, #EEE);
  border-image-slice: 1;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: sky 5s ease infinite;
}
#nlc .event {
  color:#fff;
  border:0.75px solid #fff;
}
#nlc .website {
  color:#000;
  background:#fff;
  border:0.75px solid #fff;
}

@keyframes sky {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}

@media screen and (max-width: 750px) {
  #nlc {
    font-size: 0.75rem;
  }
}
</style>
</head>
<body>
<div id="nlc" class="nlc">
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
