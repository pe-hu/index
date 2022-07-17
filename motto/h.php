<?php
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$org = (string)filter_input(INPUT_POST, 'org');
$is = (string)filter_input(INPUT_POST, 'is');
$motto = (string)filter_input(INPUT_POST, 'motto');
$by = (string)filter_input(INPUT_POST, 'by');

$fp = fopen('h.csv', 'a+b');
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
        <title>H | The Things I (We) Own</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/org/index.css" />
        <link rel="stylesheet" href="/org/searchBox.css" />
        <style>

        #h h3 {
            font-family: 'Times New Roman', serif;
            width:20rem;
            font-size:2rem;
            line-height: 150%;
            margin: 1rem auto;
            font-weight: 500;
            transition: all 1000ms ease;
            pointer-events: none;
        }

        #h p {
            font-size: 0.75rem;
            padding: 0 2rem 2rem;
            line-height: 150%;
            margin: 0;
            text-align: center;
        }

        </style>
    </head>

    <body>
        <ol id="h" class="org">
            <?php if (!empty($rows)): ?>
            <?php foreach ($rows as $row): ?>
            <li class="list_item list_toggle" data-org="<?=h($row[0])?>">
                <h3 class="<?=h($row[1])?>" style="text-align:center;"><?=h($row[2])?></h3>
                <p><?=h($row[3])?></p>
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