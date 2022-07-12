var Greeting = [
    "会期：2022年7月23日（土）〜 8月21日（日） | 会場：BnA Alter Museum",
    "物理的なもの、デジタルコンテンツ、権利や資格など、ペフが所有する全てのものをここに記録します。",
    "Natalia Panzerのプロジェクト「The Things I Own」を真似て、所有するものを「購入物」「頂き物」「無料配布物」「制作物」「共同制作物」「その他」「販売物」に分類します。"
]

function func1() {
    var x = document.getElementById("greeting");
    x.innerHTML = $('#greeting').html(Greeting);
}

function more() {
    $("#header marquee").html(Greeting[Math.floor(Math.random() * Greeting.length)]);
}