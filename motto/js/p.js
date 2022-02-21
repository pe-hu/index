const pImg = [
  "https://64.media.tumblr.com/db02801f618f128ff9bc93d0009ae61f/572dfba6817aea9d-ab/s1280x1920/2d342503971ae66bf36cc6aecdef922d4ced468d.jpg",
  "https://64.media.tumblr.com/e07d13f1c4f77ebc809135c2ca9966df/572dfba6817aea9d-f8/s1280x1920/88c77c13cbb08605039a151ba4ae0283abab932c.jpg",
  "https://64.media.tumblr.com/e0d0df8a2b0223cda19c9110ddc740ca/3f8705080a1ded16-77/s1280x1920/c80895c4787389eaf8cce31f3e2823404a5d8b40.jpg",
  "https://64.media.tumblr.com/4a9d474be63c87991c5822662610563a/ccef6e270110a7e3-29/s1280x1920/274110041239120c98dfcf584f8d2e7ac3523004.jpg",
  "https://64.media.tumblr.com/9126665c14d972bf15c73344f9b7301f/d1031145603299f4-82/s1280x1920/b7810a36955f41893ff6b3e7a401366294784043.jpg",
  "https://64.media.tumblr.com/3f298d5717eb4788e1d4632ff44f1a18/2fbca05c95ed0b6f-ee/s2048x3072/2a8573e67013ecd10789524d8baf9601eb37931d.jpg",
  "https://64.media.tumblr.com/72efb625131c51a2a55f747e40f27ada/2fbca05c95ed0b6f-6b/s2048x3072/3f06454c5d245b48345c6811339bcb7813213166.jpg",
  "https://64.media.tumblr.com/399ba1bf9ed0a5b85eb477ede4c4fe33/2fbca05c95ed0b6f-dd/s2048x3072/91398c5a0a42fe61c7cd354bd5772c0e15797d4e.jpg",
  "https://64.media.tumblr.com/98b87909b9e7480b2b30bdc7931149c0/2fbca05c95ed0b6f-5f/s2048x3072/e18142fa69eb1ef913d4add1e916055b1c66b165.jpg"
  ];
  
  function p(randomArray) {
    var random =
    randomArray[Math.floor(Math.random() * randomArray.length)];
    console.log(random);
    return random;
  }
  function pGenerator() {
    var img = `<img src="${p(pImg)}">`;
    document.querySelector("#p .bg").innerHTML = img;
  }
  window.setInterval(function() {
    pGenerator();
  }, 1500);