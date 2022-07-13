var Greeting = [
    "２０２２年７月２３日（土）〜　８月２１日（日）　｜　ビーエヌエーオルターミュージアムにて　｜　入場無料／会期中無休<br/>",
    "◎　デジタル／フィジカル・新品／中古・販売品／非売品／手製品など、形態／状態を問わずペフが所有する全てのものを発表する",
    "　｜　夏休みの自由研究　｜　大切にしたいものを所有する・所有するものを大切にする",
    "　｜　ビーエヌエーオルターミュージアムに宿泊する人たちの気持ちを知る・表す",
    "　｜　カテゴリー／用途に合わせて所有するものを整理する　｜　など<br/><br/>"
]

var Index = [
    "私（わたしたち）が所有する全てのもの（出版物・制作物、ウェブドメイン・デジタルツール、メディアファイルなど）を、このページに記録します。",
    "Natalia Panzerのプロジェクト「The Things I Own」を真似て、所有するものを「購入物」「頂き物」「無料配布物」「制作物」「共同制作物」「その他」「販売物」に分類します。",
    "カテゴリー毎のCSVファイルに所有するものを記録し、ページ内に埋め込んだPHPに品名を表示します。",
    "このページは、Chiaのウェブサイト「ifyouknewmewouldyoulove.me」を真似て制作しました。"
]

function greeting() {
    $("#text").html(Greeting);
}

function more() {
    $("#header marquee").html(Index[Math.floor(Math.random() * Index.length)]);
}