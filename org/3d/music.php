<?php
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$org = (string)filter_input(INPUT_POST, 'org');
$title = (string)filter_input(INPUT_POST, 'title');
$format = (string)filter_input(INPUT_POST, 'format');
$text = (string)filter_input(INPUT_POST, 'text');
$link = (string)filter_input(INPUT_POST, 'link');

$fp = fopen('music.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$org, $title, $format, $text, $link]);
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
    <title>Cassette and CD | The Things I (We) Own</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css" />
    <link rel="stylesheet" href="searchBox.css" />
    <style>
    </style>
</head>

<body>
    <ol id="niceshopsu" class="org">
        <h2>Cassette and CD</h2>
        <p class="update cc_style">
        Last Modified : 
            <?php
            $mod = filemtime('music.csv');
            date_default_timezone_set('Asia/Tokyo');
            print "".date("r",$mod);
            ?>
        </p>
        <?php if (!empty($rows)): ?>
        <?php foreach ($rows as $row): ?>
        <li class="list_item list_toggle <?=h($row[4])?>" data-org="<?=h($row[0])?>">
            <p>
                <u><?=h($row[2])?></u>
                <b><?=h($row[1])?></b>
            </p>
            <p><?=h($row[3])?></p>
        </li>
        <?php endforeach; ?>
        <?php else: ?>
        <li class="list_item list_toggle" data-org="test">
            <p>Title</p>
        </li>
        <?php endif; ?>
    </ol>

    <script type="text/javascript ">
        var volume;
        var synth;
        var notes;

        $(document).ready(function(event) {
            // StartAudioContext(Tone.context, window);  
            $(window).click(function() {
                Tone.context.resume();
            });

            volume = new Tone.Volume(-20);
            synth = new Tone.PolySynth(10, Tone.Synth).chain(volume, Tone.Master);
            notes = Tone.Frequency("E6").harmonize([12, 14, 16, 19, 21, 24]);
        });

        $(".list_toggle").hover(function() {
            let randNote = Math.floor(Math.random() * notes.length);
            synth.triggerAttackRelease(notes[randNote], "6n");
        });
    </script>
</body>

</html>