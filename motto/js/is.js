const sampleImg = [
  "https://64.media.tumblr.com/fe96a88dfcad36e92136dd5c309a0cc8/8dbf5c60e9fa38b2-bb/s540x810/e79102fa40b5e54270b4b000c16e61ef101d71c6.jpg",
  "https://64.media.tumblr.com/0fe32db535fe4b406d5692f448b8b9bb/6538fa9019186f03-24/s540x810/6d4d5fbf00604d29949dde360baaeb21575d2448.jpg",
  "https://64.media.tumblr.com/54623179e9505f6f20f4257c9ad8178b/3c4c622bb4cdbf9a-92/s540x810/a0df9e25cd2d0c5dd91f1269af0c9286fe4a59ce.jpg",
  "https://64.media.tumblr.com/c2146fd4ad0fec1416532752278c7b16/104f3ff28cf8d574-78/s400x600/bb005a8ea654afd4ce5f8b04de613e4cc377eeb0.jpg",
  "https://64.media.tumblr.com/2f60f30703af52d50e44d29bec2aba87/cac262ee872955af-86/s540x810/3d02a8118e27ca945b72d15a3481bcf1e0eedd67.jpg",
  "https://64.media.tumblr.com/25af540a07efd77249b0005eac8d710f/ebf59dce468fa887-3f/s540x810/b451bb7e04dc83d51cd80d029a2a77c699180f31.jpg",
  "https://64.media.tumblr.com/c6d8a879199c55b86daba9329a6e374f/a053d6f9ee7b14e6-94/s540x810/dbf5223ee377130a3533ccd23555645433f4970b.jpg",
  "https://64.media.tumblr.com/4407e51fbf07644d1bcdc4133881a15c/0bdfd40143d8f995-34/s540x810/02cceb7b9def697ea9bffb0462562213a0853810.jpg"
  ];
  
  function sample(randomArray) {
    var random =
    randomArray[Math.floor(Math.random() * randomArray.length)];
    console.log(random);
    return random;
  }
  function imgGenerator() {
    var img = `<img src="${sample(sampleImg)}">`;
    document.querySelector("#sample").innerHTML = img;
  }
  window.setInterval(function() {
    imgGenerator();
  }, 1000);