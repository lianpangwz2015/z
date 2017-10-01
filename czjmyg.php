<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>lecloud直播</title>
<style type="text/css">
body{margin:0;padding:0px;}
</style>
</head>
<body>
<link rel="stylesheet" href="//g.alicdn.com/de/prismplayer/1.5.7/skins/default/index.css" />
<script type="text/javascript" src="//g.alicdn.com/de/prismplayer/1.5.7/prism-min.js"></script>
<div id="J_prismPlayer" class="prism-player"></div>
<script>
var url=window.location.href;
if(url.indexOf('lecloud.php?id=')>0){
url=url.split('lecloud.php?id=')[1];
}

var player = new prismplayer({
id: "J_prismPlayer",
source: "http://r.gslb.lecloud.com/live/hls/2017062230000006q99/desc.m3u8",
autoplay: true,
width: "600px",
height: "500px",
});
var clickDom = document.getElementById("J_clickToPlay");
    clickDom.addEventListener("click", function(e) {
player.play();
});
player.on("pause", function() {
        alert("播放器暂停啦！");
});
</script>
</body>
</html>
