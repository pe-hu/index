<?php
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$org = (string)filter_input(INPUT_POST, 'org');
$is = (string)filter_input(INPUT_POST, 'is');
$motto = (string)filter_input(INPUT_POST, 'motto');
$by = (string)filter_input(INPUT_POST, 'by');

$fp = fopen('e.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$org, $is, $motto, $link, $url]);
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
        <title>E | The Things I (We) Own</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/org/index.css" />
        <link rel="stylesheet" href="/org/searchBox.css" />
        <style>

        #screen h3 {
            font-family: 'Times New Roman', serif;
            width:20rem;
            font-size:2rem;
            line-height: 150%;
            margin: 1rem auto;
            font-weight: 500;
            transition: all 1000ms ease;
            pointer-events: none;
        }

        #screen li a:hover {
            border-bottom: #eee solid 1px;
            transition: all 500ms ease;
        }

        #screen span {
            font-size: 0.75rem;
            padding: 0 2rem 2rem;
            line-height: 150%;
        }

        </style>
    </head>

    <body>
        <ol id="screen" class="org">
            <?php if (!empty($rows)): ?>
            <?php foreach ($rows as $row): ?>
            <li class="list_item list_toggle" data-org="<?=h($row[0])?>">
                <h3 class="<?=h($row[1])?>" style="text-align:center;"><?=h($row[2])?></h3>
                <span><?=h($row[3])?></span>
           </li>
            <?php endforeach; ?>
            <?php else: ?>
            <li class="list_item list_toggle" data-org="test">
                <h3>P E H U is</h3>
            </li>
            <?php endif; ?>
        </ol>

    <script type="text/javascript ">
    </script>
    </body>

    </html>