<?
$pindao=urldecode($_GET['pindao']);
$id=$_GET['id'];
//http://live.grtn.cn/drm.php?url=http%3A%2F%2Fstream1%2Egrtn%2Ecn%2Fgdws%2Fsd%2Flive%2Em3u8&playerVersion=4%2E03&hash=457bd7fc91685143277bc6ea093fed4f&refererurl=http%3A%2F%2Fwww%2Egrtn%2Ecn%2Flive%2Fstar%2F&time=1492074144265
?>
<html>
<head>
<title><?  echo $pindao; ?>-乐视直播网</title>
<script type="text/javascript" src="/js/letvlive.js"></script> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<? echo $pindao;?>官网直播，<? echo $pindao;?>官网在线直播" />
<meta name="description" content="乐视直播网，为您提供<? echo $pindao;?>官网直播" />
 <!-- letvlive.com Baidu tongji analytics -->
<script>
var _hmt = _hmt || [];
(function() {
var hm = document.createElement("script");
hm.src = "//hm.baidu.com/hm.js?5812ace6a2c888fd44a4de29c849f5cf";
var s = document.getElementsByTagName("script")[0];
s.parentNode.insertBefore(hm, s);
})();
</script>
</head>



<body topmargin="0" leftmargin="0" bgcolor="#000000" scroll=no>
<div id="a1" style="psotion:relative;"></div>

<script type="text/javascript">
   
	var isiPad = navigator.userAgent.match(/iPad|iPhone|Linux|Android|iPod/i) != null;
    if (isiPad) {
        document.getElementById('a1').innerHTML = '<video src="<?echo $id;?>" controls="controls" autoplay="autoplay" width="100%" height="100%" style="psotion:relative;""></video>'
	}else{
	   document.writeln("<embed name=\'hunantv-player-1\' class=\'\' id=\'hunantv-player-1\' src=\'http://g.alicdn.com/de/prismplayer-flash/1.2.16/PrismPlayer.swf?vurl=<?echo $id;?>\'  quality=\'best\' allowscriptaccess=\'always\' wmode=\'Opaque\' allowfullscreen=\'true\' bgcolor=\'#000000\' type=\'application/x-shockwave-flash\' pluginspage=\'http://www.macromedia.com/go/getflashplayer\' height=\'100%\' width=\'100%\'></embed>");
	}
  </script>
  </body>
</html>