<?
$pindao=urldecode($_GET['pindao']);
$id=$_GET['id'];

?>
<html>
<head>
<title><?  echo $pindao; ?>-乐视直播网</title>
<script type="text/javascript" src="js/letvlive.js"></script> 
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
<iframe id="play" name="play" src="http://www.hntv.tv/soms4/web/jwzt/player/flashplayer/program_live_player_flash.jsp?function=GetLiveProgramInfo&channelId=135" width=100% height=480  scrolling="auto" frameborder="0" border="0" allowtransparency="true"></iframe>
</body>
</html>