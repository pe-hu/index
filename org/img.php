<?php
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$org = (string)filter_input(INPUT_POST, 'org');
$size = (string)filter_input(INPUT_POST, 'size');
$img = (string)filter_input(INPUT_POST, 'img');
$title = (string)filter_input(INPUT_POST, 'title');
$text = (string)filter_input(INPUT_POST, 'text');

$fp = fopen('img.csv', 'a+b');
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
    <title>P E H U is | Things that I (We) owned</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css" />
    <style>
        body,
        ol,
        li {
            padding: 0;
            margin: 0;
        }
        
        #catalog li {
            color:#333;
            text-shadow: 0.1rem 0.1rem 0.1rem #fff;
            font-size: 0.55rem;
            position: relative;
            padding: 0;
            margin: 2.5vw;
            width: 7.5rem;
            height: 7.5rem;
            max-width: 90vw;
            max-height: 90vw;
            transition: all 500ms ease;
        }
        
        #catalog li:hover {
            text-shadow: 0.25rem 0.25rem 0.25rem #fff;
            font-size: 2.5rem;
            width: 500px;
            max-width: 90vw;
            height: 500px;
            max-height: 90vw;
        }
        
        #catalog li img {
            width: 75%;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
        
        #catalog li p {
            padding: 0.25rem;
            margin: 0;
            font-family: "ipag", monospace;
            transform: scale(1, 1.25);
            position: absolute;
            z-index: 5;
            bottom: 0;
            left: 0;
        }
        
        #catalog li p b {
            font-size: 150%;
            display: inline-block;
            font-family: 'Times New Roman', serif;
            font-weight: 500;
            font-stretch: condensed;
            font-variant: common-ligatures tabular-nums;
            transform: scale(1, 1.1);
            letter-spacing: -0.1rem;
            word-spacing: -.1ch;
            padding: 0;
            margin: 0.5rem 0;
        }
        
        #catalog li:hover p {
            display: block;
        }
    </style>
</head>

    <body>

        <ol id="catalog" class="org">
            <?php if (!empty($rows)): ?>
            <?php foreach ($rows as $row): ?>
            <li class="list_item list_toggle" data-org="<?=h($row[0])?>">
                <img src="<?=h($row[2])?>">
                <p>
                    <b><?=h($row[3])?></b>
                    <br/><?=h($row[4])?>
                </p>
            </li>
            <?php endforeach; ?>
            <?php else: ?>
            <li class="list_item list_toggle min" data-org="test">
                <img src="/logo.png">
            </li>
            <?php endif; ?>
        </ol>

    </body>

</html>