<?php
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$org = (string)filter_input(INPUT_POST, 'org');
$size = (string)filter_input(INPUT_POST, 'size');
$img = (string)filter_input(INPUT_POST, 'img');
$title = (string)filter_input(INPUT_POST, 'title');
$text = (string)filter_input(INPUT_POST, 'text');

$fp = fopen('collection.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$org, $size, $img, $title, $text]);
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
    <title>The Things I (We) Own, in 3D</title>

    <link rel="stylesheet" href="/org/cover.css" />
    <link rel="stylesheet" href="/org/index.css" />
    <link rel="stylesheet" href="/org/searchBox.css" />
    <style>
        
        .collection {
            width: 25rem;
            max-width: 75%;
        }

        #img {
            width: 55rem;
            max-width: 95%;
        }
    </style>
</head>

<body>
    <ul class="mousedragscrollable">
        <li id="art" class="collection"></li>
        <li id="img" class="collection"></li>
    </ul>

<script type="text/javascript ">

    $(function() {
        $("#img").load("collection.php");
        $("#art").load("art.php");
        $("#books").load("books.php");
        $("#music").load("music.php");
        $("#music").load("music.php");
    })

</script>
</body>
</html>