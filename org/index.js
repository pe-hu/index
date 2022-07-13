var Greeting = [
    "２０２２年７月２３日（土）〜　８月２１日（日）　｜　ビーエヌエーオルターミュージアムにて　｜　入場無料／会期中無休<br/>",
    "◎　ペフが所有する全てのもの（デジタル／フィジカル・新品／中古・制作物／販売品／非売品）を、発表／展示／販売する<br/><br/>",
    "｜　同時開催：令和四年、夏の自由研究<br/>",
    "｜　ビーエヌエーオルターミュージアムに宿泊する人たちの気持ちを知る・表す　",
    "｜　ビーエヌエーオルターミュージアムの周りで聞いた言葉を集める　",
    "｜　大切にしたいものを所有する・所有するものを大切にする　｜　など<br/><br/>"
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