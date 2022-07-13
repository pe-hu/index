var Greeting = [
    "２０２２年の夏休み　◎　ペフの自由研究　@　BnA Alter Museum　◎　",
    "私（わたしたち）が所有するすべてのものを発表する展覧会「The Things I (We) Own, in 3D」",
    "　◎　デジタル／フィジカル・販売品／非売品・新品／中古など、形態／状態を問わず所有するもの全てを集める",
    "　※　会期：2022年7月23日（土）〜 8月21日（日） |　入場無料／会期中無休　◎　",
    ""
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