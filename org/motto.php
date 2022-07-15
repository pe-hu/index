<?php
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$org = (string)filter_input(INPUT_POST, 'org');
$is = (string)filter_input(INPUT_POST, 'is');
$motto = (string)filter_input(INPUT_POST, 'motto');
$link = (string)filter_input(INPUT_POST, 'link');
$url = (string)filter_input(INPUT_POST, 'url');

$fp = fopen('motto.csv', 'a+b');
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
        <title>P E H U is | The Things I (We) Own</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/org/css/searchBox.css" />
        <style>
        @font-face {
            font-family: "MS Mincho";
            src: url("https://creative-community.space/coding/fontbook/family/MS%20Mincho.ttf");
        }

        .Black {color:Black;}
        .White {color:White; background:#eee;}
        .DarkGray {color:DarkGray;}
        .Red {color:red;}
        .DeepPink {color:DeepPink;}
        .DodgerBlue {color:DodgerBlue;}
        .Orange {color:Orange;}
        .DarkGoldenRod {color:DarkGoldenRod;}
        .Purple {color:Purple;}

        #screen h3 {
            font-family: "MS Mincho", serif;
            font-size:1.25rem;
            line-height: 150%;
            margin: 1rem 0.5rem;
            font-weight: 500;
            transition: all 1000ms ease;
            pointer-events: none;
        }

        #screen li a:hover {
            border-bottom: #eee solid 1px;
            transition: all 500ms ease;
        }

        #screen p {
            font-size: 0.75rem;
            padding: 0 0.5rem 1.75rem;
            line-height: 150%;
        }

        </style>
    </head>

    <body>
        <ol id="screen" class="org">
            <li>
                <h3>P E H U is | Screen Print</h3>
                <p>P E H U から始まる言葉を印刷したオリジナルアイテムを制作します。</p>
            </li>
            <?php if (!empty($rows)): ?>
            <?php foreach ($rows as $row): ?>
            <li class="list_item list_toggle" data-org="<?=h($row[0])?>">
                <h3 class="<?=h($row[1])?>" style="text-align:center;"><?=h($row[2])?></h3>
                <a class="<?=h($row[3])?>" href="<?=h($row[4])?>" target="_parent"></a>
           </li>
            <?php endforeach; ?>
            <?php else: ?>
            <li class="list_item list_toggle" data-org="test">
                <h3>P E H U is</h3>
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

            volume = new Tone.Volume(-10);
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