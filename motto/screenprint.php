<?php
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$org = (string)filter_input(INPUT_POST, 'org');
$size = (string)filter_input(INPUT_POST, 'size');
$img = (string)filter_input(INPUT_POST, 'img');
$title = (string)filter_input(INPUT_POST, 'title');
$text = (string)filter_input(INPUT_POST, 'text');

$fp = fopen('screenprint.csv', 'a+b');
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
    <title>P E H U is | Screen Printing</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="author" content="∧° ┐">
    <meta name="reply-to" content="pehu@creative-community.space">
    <meta name="description" content="私（わたしたち）が所有する全てのもの（出版物・制作物、ウェブドメイン・デジタルツール、メディアファイルなど）を、このページに記録します。">

    <meta property="og:title" content="Screen Printing"/>
    <meta property="og:description" content="私（わたしたち）が所有する全てのもの（出版物・制作物、ウェブドメイン・デジタルツール、メディアファイルなど）を、このページに記録します。"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="https://creative-community.space/pehu/org/"/>
    <meta property="og:site_name" content="creative-community.space"/>
    <meta property="og:image" content="https://creative-community.space/pehu/org/card.png"/>
    <meta property="og:locale" content="ja_JP"/>

    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:site" content="@NLC_update"/>
    <meta name="twitter:image" content="https://creative-community.space/pehu/org/card.png"/>

    <link rel="stylesheet" href="/org/index.css" />
    <link rel="stylesheet" href="/org/searchBox.css" />
    <style>
        @font-face {
            font-family: "ipag";
            src: url("https://creative-community.space/coding/fontbook/family/IPA/ipag.ttf");
        }
        
        header,
        header marquee,
        #main {
            border-bottom: 1px dashed #ccc;
        }

        #main {
            height: auto;
        }

        header marquee {
            transition: all 1000ms ease;
        }

        header marquee:hover {
            cursor: pointer;
            color: #fff;
            background: #ccc;
        }
        
        ._more,
        header label,
        footer a {
            color: #ccc;
        }

        footer {
            font-size:0.75rem;
            padding: 0 1rem;
            margin: 0.25rem 0 0;
        }
        
        header a:hover,
        header label:hover,
        footer a:hover {
            color: #aaa;
        }
        
        .nlc_style,
        h1,
        h2 {
            font-family: 'Times New Roman', serif;
            font-weight: 500;
            font-stretch: condensed;
            font-variant: common-ligatures tabular-nums;
            transform: scale(1, 1.1);
            letter-spacing: -0.1rem;
            word-spacing: -.1ch;
        }
        
        .nlc_style {
            display: inline-block;
        }
        
        .cc_style,
        form,
        marquee {
            display: inline-block;
            font-family: "ipag", monospace;
            transform: scale(1, 1.25);
        }
        
        .org .list_item img {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
        
        ._more:hover,
        header label:hover,
        footer a:hover {
            color: #aaa;
            text-decoration: wavy underline #aaa;
            cursor: pointer;
        }

        #presents {
            margin: 0.5rem 0;
        }
        
        #bought:checked~label,
        #gift:checked~label,
        #free:checked~label,
        #made:checked~label,
        #collaborations:checked~label,
        #other:checked~label,
        #sale:checked~label {
            text-decoration: double underline;
        }

        body,
        ol,
        li {
            padding: 0;
            margin: 0;
        }
        
        #cover {
            position: relative;
            width: 100%;
            height: 100%;
            margin: 0;
        }
        
        #collection {
            display: -webkit-flex;
            display: flex;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-align-items: center;
            align-items: center;
            -webkit-flex-wrap: wrap;
            flex-wrap: wrap;
            list-style-type: none;
        }
        
        #collection li p b {
            font-family: 'Times New Roman', serif;
            font-weight: 500;
            font-stretch: condensed;
            font-variant: common-ligatures tabular-nums;
            transform: scale(1, 1.1);
            letter-spacing: -0.1rem;
            word-spacing: -.1ch;
        }
        
        #infomation,
        #collection li p {
            font-family: "ipag", monospace;
            transform: scale(1, 1.25);
        }
        
        #infomation {
            font-size: 0.75rem;
            line-height: 150%;
            padding: 0 1rem;
        }
        
        #collection {
            padding: 1rem 0 2.5rem;
        }
        
        #collection li {
            color: #333;
            text-shadow: 0.1rem 0.1rem 0.1rem #fff;
            font-size: 0.55rem;
            position: relative;
            padding: 0;
            margin: 1vw;
            width: 10rem;
            height: 10rem;
            max-width: 95vw;
            max-height: 95vw;
            transition: all 1000ms ease;
        }
        
        #collection li img {
            width: 75%;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            pointer-events: none;
            user-select: none;
        }
        
        #collection li p {
            padding: 0.25rem;
            margin: 0;
            position: absolute;
            z-index: 5;
            bottom: 0;
            left: 0;
            pointer-events: none;
            user-select: none;
        }
        
        #collection li p b {
            font-size: 150%;
            display: inline-block;
            padding: 0;
            margin: 0.5rem 0;
        }
        
        #collection li:hover p {
            display: block;
        }

        #motto {
            width: 27.5rem;
            max-width: 55%;
        }
        
        @keyframes spot {
            0% {
                filter: drop-shadow(1rem 1rem 1rem rgba(50, 50, 50, 0.75));
            }
            25% {
                filter: drop-shadow(1rem -0.5rem 1rem rgba(50, 50, 50, 0.75));
            }
            50% {
                filter: drop-shadow(-1rem -1rem 1.5rem rgba(50, 50, 50, 0.75));
            }
            75% {
                filter: drop-shadow(-0.5rem 2rem 2rem rgba(50, 50, 50, 0.75));
            }
            100% {
                filter: drop-shadow(1rem 1rem 1rem rgba(50, 50, 50, 0.75));
            }
        }

        #greeting,
        #server {
            position: fixed;
            left: 0;
            overflow: hidden;
        }

        #greeting {
            top: 0;
            height: auto;
            z-index: 1;
        }
            

        #greeting:hover {
            width:100%;
            height: 100%;
            overflow: auto;
            background: rgba(255,255,255,0.55);
            cursor: pointer;
        }

        #server {
            bottom: 0;
            z-index: 10;
        }

        #greeting p,
        #server p {
            margin: 1rem;
        }
        
        #greeting p {
            color:#333;
            font-size: 0.9rem;
            line-height: 200%;
        }
        
        #server p {
            color:#eee;
            font-size: 0.75rem;
        }

        #server p,
        #server:hover p {
            transition: all 1000ms ease;
        }

        #server:hover p {
            color:#aaa;
            text-shadow: 1px 1px 2px #fff, 0 0 1em #fff, 0 0 0.2em #fff;
        }
        
        .change .mousedragscrollable {
            display: block;
        }

        .change #main {
            min-height: 85vh;
        }

        .change #cover {
            position: absolute;
            top:0;
            left:0;
        }

        #footer,
        .mousedragscrollable,
        #print,
        .print {
            display: none;
        }
        
        @media screen and (max-width: 550px) {
            #address {
                padding:0.5rem 0;
            }
        }
        
        @media print {
            #address,
            #server {
                display: none;
            }
            #footer,
            #print {
                display: block;
            }
            .print {
                display: inline-block;
            }
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="/org/searchBox.js"></script>
    <script src="/www/scrollable.js"></script>
    <script src="https://creative-community.space/coding/js/tone/jquery.min.js"></script>
    <script src="https://creative-community.space/coding/js/tone/jquery-ui.min.js"></script>
    <script src="https://creative-community.space/coding/js/tone/Tone.min.js"></script>
    <script src="https://creative-community.space/coding/js/tone/StartAudioContext.js"></script>
    <script src=""></script>
</head>

<body>

    <header id="header">
        <a class="_more" onclick="more()">もっと詳しく</a>
        <marquee id="marquee">
            P E H U から始まるペフに似合う言葉をスクリーン印刷したオリジナルアイテムを制作します。
        </marquee>
        <nav id="nav">
            <h1>P E H U is | Screen Printing</h1>
            <p id="presents">
                <b class="cc_style">最終更新日時</b><br/>
                <span>
                    <?php
                    $mod = filemtime('screenprint.csv');
                    date_default_timezone_set('Asia/Tokyo');
                    print ''.date('Y年n月j日 g:i:s',$mod);
                    ?>
                </span>
            </p>
            <form>
                <ol class="search-box">
                    <li>index</li>
                    <li>
                        <input type="radio" name="org" value="gift" id="gift">
                        <label for="gift" class="label">gift</label>
                    </li>
                    <li>
                        <input type="radio" name="org" value="free" id="free">
                        <label for="free" class="label">free or found</label>
                    </li>
                    <li>
                        <input type="radio" name="org" value="made" id="made">
                        <label for="made" class="label">made</label>
                    </li>
                    <li>
                        <input type="radio" name="org" value="collaborations" id="collaborations">
                        <label for="collaborations" class="label">collaborations</label>
                    </li>
                    <li>
                        <input type="radio" name="org" value="other" id="other">
                        <label for="other" class="label">other</label>
                    </li>
                    <li>
                        <input type="radio" name="org" value="sale" id="sale">
                        <label for="sale" class="label">$$$ FOR SALE $$$</label>
                    </li>
                    <li>
                        <input type="radio" name="org" value="bought" id="bought">
                        <label for="bought" class="label">ink/tools</label>
                    </li>
                    <li class="reset">
                        <input type="reset" name="reset" value="View All" class="reset-button cc_style label" onclick="greeting()">
                    </li>
                </ol>
            </form>
        </nav>
    </header>

    <main id="main">
            <div id="cover">
                <div id="greeting">
                    <p class="nlc_style" id="text"></p>
                </div>
                <div id="server">
                    <p class="cc_style">
                        Last Modified : 
                            <?php
                            $mod = filemtime('screenprint.csv');
                            date_default_timezone_set('Asia/Tokyo');
                            print "".date("r",$mod);
                            ?>
                    </p>
                </div>
        <ol id="collection" class="org">
            <?php if (!empty($rows)): ?>
            <?php foreach ($rows as $row): ?>
            <li class="list_item list_toggle" data-org="<?=h($row[0])?>">
                <img src="<?=h($row[3])?>">
                <p>
                    <b><?=h($row[1])?></b>
                    <br/>
                    <?=h($row[2])?>
                </p>
                <a class="<?=h($row[4])?>" href="<?=h($row[5])?>" target="_blank"></a>
            </li>
            <?php endforeach; ?>
            <?php else: ?>
            <li class="list_item list_toggle min" data-org="test">
                <img src="/logo.png">
            </li>
            <?php endif; ?>
        </ol>
            </div>
        <ul class="mousedragscrollable">
            <li id="p" class="collection"></li>
            <li id="e" class="collection"></li>
            <li id="h" class="collection"></li>
            <li id="u" class="collection"></li>
        </ul>
    </main>

    <footer id="footer">
        <address id="print">
            <span class="cc_style">
                <?php
                echo $_SERVER['SERVER_NAME'];
                echo $_SERVER['REQUEST_URI'];
                ?>
            </span>
        </address>
    </footer>

    <script type="text/javascript ">

    let btn = document.querySelector('#greeting');
    let marquee = document.querySelector('#marquee');
    let box = document.querySelector('#main');

    let btnToggleclass = function(el) {
        el.classList.toggle('change');
    }

    btn.addEventListener('click', function() {
        btnToggleclass(box);
    }, false);

    marquee.addEventListener('click', function() {
        btnToggleclass(box);
    }, false);

        $('a[href^="# "]').click(function() {
            var href = $(this).attr("href ");
            var target = $(href == "# " || href == " " ? 'html' : href);
            return false;
        });
        
        $(function() {
            $("#p").load("p.php");
            $("#e").load("e.php");
            $("#h").load("h.php");
            $("#u").load("u.php");
        })

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

        $("._more").click(function(e) {
            let randNote = Math.floor(Math.random() * notes.length);
            synth.triggerAttackRelease(notes[randNote], "1");
        });

        $(".label").click(function(e) {
            let randNote = Math.floor(Math.random() * notes.length);
            synth.triggerAttackRelease(notes[randNote], "2n");
        });

        $(".list_item").hover(function() {
            let randNote = Math.floor(Math.random() * notes.length);
            synth.triggerAttackRelease(notes[randNote], "6n");
        });
    </script>
</body>

</html>