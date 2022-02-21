const hImg = [
  "https://64.media.tumblr.com/78f4c2f3f8b03b471b81e3e68780586c/572dfba6817aea9d-d7/s1280x1920/5590cfd74229ba5614fc4e8c6966ea2da5cfcf5e.jpg",
  "https://64.media.tumblr.com/2857e6a0b81b2f7b213ff41e1516c515/572dfba6817aea9d-da/s1280x1920/703adf7a94c5c66b2505f13ae952d2e3b70a0c8e.jpg",
  "https://64.media.tumblr.com/3d88113e7871f0765acab8aec471b8bb/d1031145603299f4-3f/s1280x1920/683e7136be430bb2162a77a1549b65f62ed5bd70.jpg",
  "https://64.media.tumblr.com/7b7bf6b7a1c64032290fffdda32928e1/ccef6e270110a7e3-86/s1280x1920/52c0d9338ab58c170b91b1f07757151e9c557d25.jpg",
  "https://64.media.tumblr.com/02c3a8a4e3dde87f41de600c86c55fcb/3f8705080a1ded16-29/s1280x1920/3fcca5144f0a1d39279a7e44f0890fe8e7ebf663.jpg",
  "https://64.media.tumblr.com/bce78d2f31c26319fba5fb49dbd0e079/5ba7e62ba4bd2de5-06/s2048x3072/61c38fb42f471349da8bfaa9a536ff0f42c126ae.jpg",
  "https://64.media.tumblr.com/4cd1130ade3d65e544c3926be9088e41/5ba7e62ba4bd2de5-5c/s2048x3072/f4650d5f6ef3c2c12edb688c5b1e4ee29fbd248e.jpg",
  "https://64.media.tumblr.com/7eebd25af0d6f8d2e309db3bb2d4eb82/5ba7e62ba4bd2de5-95/s2048x3072/3b35a8530c4146f68888f1084f7672bfc9590693.jpg",
  "https://64.media.tumblr.com/d735e6105877df2710123eb4f40d3f3d/5ba7e62ba4bd2de5-46/s1280x1920/610715ad47a6979fd65ff4db07efadf44031e50d.jpg"
  ];
  
  function h(randomArray) {
    var random =
    randomArray[Math.floor(Math.random() * randomArray.length)];
    console.log(random);
    return random;
  }
  function hGenerator() {
    var img = `<img src="${h(hImg)}">`;
    document.querySelector("#h .bg").innerHTML = img;
  }
  window.setInterval(function() {
    hGenerator();
  }, 1500);