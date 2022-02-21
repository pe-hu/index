const uImg = [
  "https://64.media.tumblr.com/600c37bc89d847393686a1b34d5f0dbe/572dfba6817aea9d-ce/s1280x1920/487ba3f42c442113fcb803f92cd4d4ce7d8355cd.jpg",
  "https://64.media.tumblr.com/71b8002fff17a27ed4f0ca099aa1ce7a/572dfba6817aea9d-27/s1280x1920/4a73c5dace0860d1b9ba50384881f12c564eae3f.jpg",
  "https://64.media.tumblr.com/a86d6ba2fb3baf48e3ba4314cc8bb377/c6dce25c85aff7a0-d1/s1280x1920/e77e2544f65cb2fc6168baf87812d052f1384c8d.jpg",
  "https://64.media.tumblr.com/1464893ef0ab1c412e81e9e642ae55f2/ccef6e270110a7e3-38/s1280x1920/d448e2612784aa8fb64290dd6693f183f5fc5851.jpg",
  "https://64.media.tumblr.com/cfb15726cbffca35633f03119572ba27/d1031145603299f4-ab/s1280x1920/33262c4bb60e1a49571b971415844b1bc5429989.jpg",
  "https://64.media.tumblr.com/119f7084ccdd9c35c65e91b995734ee0/839c7d0a428fda51-97/s2048x3072/5c33a73400f8b0fc097f6c815ec3370c95601c8e.jpg",
  "https://64.media.tumblr.com/4e76a3b07c764be5acda62767d00944c/839c7d0a428fda51-9c/s640x960/4000b54af8c8774fd46f78c20719ff82ad002196.jpg",
  "https://64.media.tumblr.com/a15f035562caa3eec5bf92e287e43846/839c7d0a428fda51-11/s2048x3072/374931942261311bc89b50f3bf6150aed9703122.jpg",
  "https://64.media.tumblr.com/ff44fdf21b26d6f1049d978be55da029/839c7d0a428fda51-52/s2048x3072/5f7bff91aaad7b01e010910cb1a613a54be251ed.jpg"
  ];
  
  function u(randomArray) {
    var random =
    randomArray[Math.floor(Math.random() * randomArray.length)];
    console.log(random);
    return random;
  }
  function uGenerator() {
    var img = `<img src="${u(uImg)}">`;
    document.querySelector("#u .bg").innerHTML = img;
  }
  window.setInterval(function() {
    uGenerator();
  }, 1500);