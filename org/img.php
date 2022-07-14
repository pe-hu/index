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
                margin: 2.5vw;
                width: 10rem;
                max-width: 90vw;
                max-height: 90vw;
            }
            
            #catalog li img {
                max-width: 100%;
                max-height: 100%;
            }
        </style>
    </head>

    <body>

        <ol id="catalog" class="org">
            <?php if (!empty($rows)): ?>
            <?php foreach ($rows as $row): ?>
            <li class="list_item list_toggle <?=h($row[1])?>" data-org="<?=h($row[0])?>">
                <img src="<?=h($row[2])?>">
                <p><b><?=h($row[3])?></b></p>
                <p>
                    <?=h($row[4])?>
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