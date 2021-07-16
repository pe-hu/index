const contents = [
    '<img src="http://ichoose.pe.hu/collection/x2021/05/te.png">',
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
  }, 1000);
  
  sentenceGenerator();