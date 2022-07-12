var Greeting = [
    "物理的なもの、デジタルコンテンツ、権利や資格など、形態に限らず所有する全てのものをここに記録します。",
    "ナタリア・パンツァのプロジェクト「The things I own」を真似て、所有するものを「購入物」「頂き物」「無料配布物」「制作物」「共同制作物」「その他」「販売物」に分類します。",
    "ここに、ペフが所有する全てのものを記録します。"
]

$('#greeting').html(Greeting);

function more() {
    $("#header marquee").html(Greeting[Math.floor(Math.random() * Greeting.length)]);
}