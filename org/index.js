var Greeting = [
    "２０２２年７月２３日（土）〜 ８月２１日（日）　◎　夏休みの自由研究　※　入場無料／会期中無休<br/>",
    "◎　デジタル／フィジカル・販売品／非売品・新品／中古など、形態／状態を問わずペフが所有する全てのものを発表する",
    "　｜　すべての所有するものを集めたウェブサイトを作る　◎<br/><br/>",
    "※　オープニングイベント：２０２２年７月２３日（土）１８時から",
    "　｜　P E H U is スクリーン印刷ワークショップ"
]

var Index = [
    "出版物・制作物、ウェブドメイン・デジタルツール、メディアファイルなど、私（わたしたち）が所有するあらゆる形態・形式のものを、このページに記録します。",
    "所有するものを、カテゴリー毎のCSVファイルに記録し、ページ内に埋め込んだPHPを使って表示します。",
    "Natalia Panzerのプロジェクト「The Things I Own」を真似て、所有するものを「購入物」「頂き物」「無料配布物」「制作物」「共同制作物」「その他」「販売物」に分類します。",
    "このページは、Chiaのウェブサイト「ifyouknewmewouldyoulove.me」を真似て制作しました。"
]

function greeting() {
    $("#text").html(Greeting);
}

function more() {
    $("#header marquee").html(Index[Math.floor(Math.random() * Index.length)]);
}