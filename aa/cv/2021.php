<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="/css/greating.css"/>
<link rel="stylesheet" type="text/css" href="/jp/cm/font/fonts.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
$("#link").load("/jp/cm/aa/cv/link.php");
})
</script>
<style type="text/css">
#cv {min-height:70vh;}
#cv .aa {
  position:relative;
  font-family: flower;
  font-size:1rem;
  letter-spacing:0.05rem;
  font-style:normal;
  line-height:200%;
  font-weight:600;
  padding-left:7.5rem;
}
#cv .aa b {
  font-family:secretcrane;
  letter-spacing:0.4rem;
  font-weight:900;
}
#cv .aa:before,
.abi_popup:before,
.gd_popup:before,
.secret_popup:before {
  content: "（a‿a）<";
  position:absolute;
}
#cv .aa:before {
  left:1rem;
}

.abi_popup,
.gd_popup,
.secret_popup {
  display:none;
  position: absolute;
  top:25vh;
}
.abi_popup:before,
.gd_popup:before,
.secret_popup:before {
  left:-6.5rem;
}
.abi:hover + .abi_popup,
.gd:hover + .gd_popup,
.secret:hover + .secret_popup {
  display: block;
}
.abi:hover + #merch,
.gd:hover + #up,
.secret:hover + #show
{color: blue;}
#cv .aa a {
  display:inline;
  color:blue;
  padding:0;
  text-decoration:none;
  animation:blurout 0 ease-out forwards;
}
#cv .aa a:hover {
  border-bottom:2px solid blue;
}
#cv .aa u {
  text-decoration:none;
}

</style>
<title>2021 | ayumi akutagawa</title>
</head>
<body>
<div id="cv">
<div class="aa">
hi i'm Ayumi Akutagawa.<br/>
i’m the owner of <a class="abi" href="http://abi.pe.hu/" target="_blank" rel="noopener noreferrer">abi the best items</a>.
<p class="abi_popup">is the shop of the best used clothes<br/>
and stuff i found.</p>

i’m also a <a class="gd" href="/jp/cm/aa/works/">graphic designer</a>.
<p class="gd_popup">i design publications and printed things<br/>
related to the activities of Pehu.</p>
<br/>
<a class="secret" href="/jp/cm/aa/writing/"><b>SECRET NOTE</b></a> is my secret diary.
<p class="secret_popup">this is my secret diary with invisible <br/>
font “secret crane”. you can post<br/>
your secret. </p>
</div>

</div>
<div id="link"></div>
</body>
</html>
