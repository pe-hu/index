const p = [
    'Peacefully',
    'Powerful',
    'People',
    'Pose',
    'Peace',
    'Pensive',
    'Possible',
    'Paradise',
];

const e = [
    'Emotionally',
    'Energetic',
    'Exercise',
    'Ease',
    'Energy',
    'Earth',
    'Everything',
    'Elementary',
];

const h = [
    'Happily',
    'Healthy',
    'Home',
    'Haze',
    'Holiness',
    'Halo',
    'Honestly',
    'Homie',
]

const u = [
    'Usefully',
    'Unity',
    'Universe',
    'Us',
    'Unconditional',
    'Underdog',
];

function randomWord(wordArray) {
    let word = wordArray[Math.floor(Math.random() * wordArray.length)];
    console.log(word);
    return word
};

function motto() {
    let sentence = `<span>${randomWord(p)}</span><br/><span>${randomWord(e)}</span><br/><span>${randomWord(h)}</span><br/><span>${randomWord(u)}</span>`;
    document.querySelector('.words').innerHTML = sentence;
    document.title = sentenceTitle;
};

window.setInterval(function(){
    motto();
}, 2500);