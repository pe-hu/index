const p = [
    'Peacefully',
    'Powerful',
    'People',
    'Pose',
    'Peace',
    'Pensive',
    'Possible',
    'Paradise',
    'Participatory',
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
    'Experimental',
];

const h = [
    'Human',
    'Happily',
    'Healthy',
    'Home',
    'Haze',
    'Holiness',
    'Halo',
    'Honestly',
    'Homie',
    'Heartful',
]

const u = [
    'Update',
    'Usefully',
    'Unity',
    'Universe',
    'Us',
    'Unconditional',
    'Understand',
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
