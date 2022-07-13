<?php
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$org = (string)filter_input(INPUT_POST, 'org');
$size = (string)filter_input(INPUT_POST, 'size');
$img = (string)filter_input(INPUT_POST, 'img');
$link = (string)filter_input(INPUT_POST, 'link');
$url = (string)filter_input(INPUT_POST, 'url');

$fp = fopen('index.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$org, $size, $img, $link, $url]);
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
    <title>The Things I (We) Own | ∧° ┐</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css" />
    <link rel="stylesheet" href="/org/style.css" />
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

        marquee a {
            color:#111;
            text-decoration:none;
            transition: all 1000ms ease;
        }
        
        ._more,
        header label,
        footer a {
            color: #ccc;
        }

        footer {
            font-size:0.75rem;
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
        
        #print {
            display: none;
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
        
        .mousedragscrollable #images {
            width: 100%;
            height: 100%;
            margin: 0;
            overflow: hidden;
        }
        
        #catalog {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 95%;
            height: 0;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        #catalog .list_item {
            position: relative;
            padding: 0;
            margin: 2.5vh 0;
        }
        
        #catalog img {
            animation: 100s linear infinite spot;
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
            position: absolute;
            left: 0;
            overflow: hidden;
        }

        #greeting {
            top: 0;
            height: auto;
        }
            

        #greeting:hover {
            z-index: 100;
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
            margin: 1.5rem 1rem;
        }
        
        #greeting p {
            color:#333;
            font-size: 0.9rem;
            line-height: 200%;
        }
        
        #server p {
            color:#eee;
            font-size: 0.75rem;
            line-height: 175%;
        }

        #server p,
        #server:hover p {
            transition: all 1000ms ease;
        }

        #server:hover p {
            color:#aaa;
            text-shadow: 1px 1px 2px #fff, 0 0 1em #fff, 0 0 0.2em #fff;
        }
        
        #print,
        .print {
            display: none;
        }
        
        @media screen and (max-width: 1000px) {
            #catalog {
                top: 50%;
            }
            #catalog .list_item {
                position: relative;
                padding: 0;
                margin: 1.5vh 0;
            }
        }
        
        @media screen and (max-width: 550px) {
            #address {
                padding:0.5rem 0;
            }
            #catalog {
                top: 50%;
            }
            #catalog .list_item {
                position: relative;
                padding: 0;
                margin: 1.25vh 0;
            }
        }
        
        @media print {
            #address,
            #server {
                display: none;
            }
            #print {
                display: block;
            }
            .print {
                display: inline-block;
            }
            #catalog {
                top: 47.5%;
            }
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/org/searchBox.js"></script>
    <script src="/www/scrollable.js"></script>
    <script src="https://creative-community.space/coding/js/tone/jquery.min.js"></script>
    <script src="https://creative-community.space/coding/js/tone/jquery-ui.min.js"></script>
    <script src="https://creative-community.space/coding/js/tone/Tone.min.js"></script>
    <script src="https://creative-community.space/coding/js/tone/StartAudioContext.js"></script>
    <script src="index.js"></script>
</head>

<body>

    <header id="header">
        <a class="_more" onclick="more()">私（わたしたち）が所有するもの</a>
        <marquee>
            <a href="https://bnaaltermuseum.com/">会期：2022年7月23日（土）〜 8月21日（日） | 会場：BnA Alter Museum</a>
        </marquee>
        <nav id="nav">
            <h1>The Things I (We) Own<span class="print">, in 3D</span></h1>
            <p id="presents">
                <b class="cc_style">私（わたしたち）が所有するもの</b>
                <br/><span class="cc_style">会期：2022年7月23日（土）〜 8月21日（日）</span>
                <br/><span class="cc_style">会場：BnA Alter Museum</span>
            </p>
            <form>
                <ol class="search-box">
                    <li>index</li>
                    <li>
                        <input type="radio" name="org" value="bought" id="bought">
                        <label for="bought" class="label">bought</label>
                    </li>
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
                    <li class="reset">
                        <input type="reset" name="reset" value="View All" class="reset-button cc_style label" onclick="greeting()">
                    </li>
                </ol>
            </form>
        </nav>
    </header>

    <main id="main">
        <ul class="mousedragscrollable">
            <li id="images" class="collection">
                <div id="greeting">
                    <p class="nlc_style" id="text"></p>
                </div>
                <div id="server">
                    <p class="cc_style">
                        <?php
                        echo 'IP : '. $_SERVER['REMOTE_ADDR']." | ";
                        echo 'PORT : '. $_SERVER['REMOTE_PORT']."<br/>";
                        echo ''. $_SERVER['HTTP_USER_AGENT'].".";
                        ?>
                    </p>
                </div>
                <ol id="catalog" class="org">
                    <?php if (!empty($rows)): ?>
                    <?php foreach ($rows as $row): ?>
                    <li class="list_item list_toggle <?=h($row[1])?>" data-org="<?=h($row[0])?>">
                    <img src="<?=h($row[2])?>">
                    <a class="<?=h($row[3])?>" href="<?=h($row[4])?>" target="_parent"></a>
                    </li>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <li class="list_item list_toggle min" data-org="test">
                    <img src="/logo.png">
                    </li>
                    <?php endif; ?>
                </ol>
            </li>
        </ul>
    </main>

    <footer id="footer">
        <address id="print">
            <span><img src="qr.png" width="52.5rem" alt="https://creative-community.space/pehu/org/"></span>
            <p style="float:right;"><img src="https://bnaaltermuseum.com/wp-content/themes/bna_kyoto/img/logo_bam.svg" width="250rem" alt="BnA Alter Museum"></p>
        </address>
        <address id="address" class="cc_style">
          <span>Last Modified : </span>
          <span>
            <?php
            $mod = filemtime('index.php');
            date_default_timezone_set('Asia/Tokyo');
            print "".date("r",$mod);
            ?>
          </span>
        </address>
    </footer>

    <script type="text/javascript ">

        $('a[href^="# "]').click(function() {
            var href = $(this).attr("href ");
            var target = $(href == "# " || href == " " ? 'html' : href);
            return false;
        });

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

        $(".list_item img").hover(function() {
            let randNote = Math.floor(Math.random() * notes.length);
            synth.triggerAttackRelease(notes[randNote], "6n");
        });
    </script>
</body>

</html>