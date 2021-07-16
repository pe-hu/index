const contents = [
    '<img src="/jp/cm/random/img/001.png">',
    '<img src="/jp/cm/random/img/002.png">',
    '<img src="/jp/cm/random/img/003.png">',
    '<img src="/jp/cm/random/img/004.png">',
    '<img src="/jp/cm/random/img/005.png">',
    '<img src="/jp/cm/random/img/006.png">',
    '<img src="/jp/cm/random/img/007.png">',
    '<img src="/jp/cm/random/img/008.png">',
  ];
  
  function randomContents(contentsArray) {
      var contents = contentsArray[Math.floor(Math.random() * contentsArray.length)];
      console.log(contents);
      return contents
  };
  
  function sentenceGenerator() {
      var sentence = `<span>${randomContents(contents)}</span>`;
      document.querySelector('.random').innerHTML = sentence;
  };
  
  window.setInterval(function(){
      sentenceGenerator();
  }, 2000);
  
  sentenceGenerator();