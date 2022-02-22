const eImg = [
  "https://64.media.tumblr.com/04bf5e334f7fe6bfa14f1807157ac379/87a26d1280843eaa-32/s2048x3072/8b09ceba2fcc4e37fd03761db6413d3525ec6a3d.jpg",
  "https://64.media.tumblr.com/f77290a4d8187b3732459fb16bb8658a/572dfba6817aea9d-96/s1280x1920/ea9fd5572c5f88df4198965ca47f680919319e05.jpg",
  "https://64.media.tumblr.com/b229169829fe96f35ab5bd0a69362a6c/572dfba6817aea9d-01/s1280x1920/6fc8e58544c2a5a76c479773e5cb34d9b5563d1e.jpg",
  "https://64.media.tumblr.com/c63b5e703858f0d194b9b824f965693c/c6dce25c85aff7a0-e0/s1280x1920/da60a577abf1af80c8b6fde3d30f258e4b436714.jpg",
  "https://64.media.tumblr.com/edf10e940d12e517e31eb5dd7da382a9/ccef6e270110a7e3-67/s1280x1920/b839d255b22867d1819b74df2d53b9c9324f69ac.jpg",
  "https://64.media.tumblr.com/17b8deb198faab2be49070f46c885422/d1031145603299f4-a8/s1280x1920/d5e160c7c40b1d62f8e249554409ce26c5e86199.jpg",
  "https://64.media.tumblr.com/b27b64edc7c01b782d926e3821a4ca47/5b2e3b9eda5a490f-78/s1280x1920/cec095fa6e8e9506c9bb202cc82b47827895f29e.jpg",
  "https://64.media.tumblr.com/392611fa0a04b5fcaae52667c91f047c/5b2e3b9eda5a490f-95/s2048x3072/bb018705f60730d8ddf9eb86a928757a73fa8ed2.jpg",
  "https://64.media.tumblr.com/f9094b1a461218189e618d1f0f372b55/5b2e3b9eda5a490f-87/s2048x3072/65d0144719ad96b9614ac0f65c443209f6783a92.jpg",
  "https://64.media.tumblr.com/41567bdc529bb8cbcffb782154eae9d4/5b2e3b9eda5a490f-a5/s2048x3072/ce93b8c790f328eeff4eda48fbac65c0fd00211d.jpg"
  ];
  
  function e(randomArray) {
    var random =
    randomArray[Math.floor(Math.random() * randomArray.length)];
    console.log(random);
    return random;
  }
  function eGenerator() {
    var img = `<img src="${e(eImg)}">`;
    document.querySelector("#e .bg").innerHTML = img;
  }
  window.setInterval(function() {
    eGenerator();
  }, 1500);