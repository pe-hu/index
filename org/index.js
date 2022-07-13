var Greeting = [
    "これは、ペフが所有する全てのものを集めたコレクションです。",
    "出版物・制作物、ウェブドメイン・デジタルツール、メディアファイルなど、ペフが所有するあらゆる形態・形式のものを、このコレクションに記録します。",
    "Natalia Panzerのプロジェクト「The Things I Own」を真似て、所有するものを「購入物」「頂き物」「無料配布物」「制作物」「共同制作物」「その他」「販売物」に分類します。"
]

var body = body.innnerHTML

function more() {
    $("#header marquee").html(Greeting[Math.floor(Math.random() * Greeting.length)]);
}