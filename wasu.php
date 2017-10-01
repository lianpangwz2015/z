<?
$pindao=urldecode($_GET['pindao']);
//http://play.wasu.cn/player/20131010/iLivePlayer.swf?vid=&ap=1http://s.wasu.cn/portal/player/20140326/WsPlayer.swf?video=rtmp://livertmp.wasu.cn/live8/cctv5&alsc=x0http://s.wasu.cn/portal/player/20140717/WsPlayer.swf?vid=457&mode=4&live=1&ap=1
?>
<html>
<head>
<style type="text/css">
body {overflow:hidden;font-size: 12px;margin: 0px;background-color: #000000;}
</style>
<title><?  echo $pindao; ?>-乐视直播网</title>
<script type="text/javascript" src="js/letvlive.js"></script> 
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="Keywords" content="<? echo $pindao;?>华数直播，<? echo $pindao;?>华数在线直播" />
<meta name="description" content="乐视直播网，为您提供<? echo $pindao;?>华数直播" />
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

<body>


<iframe id="play" name="play" src="http://www.114zhibo.com/player/huashu.html?id=<? echo $_GET['id']?>" width=100% height=480  scrolling="auto" frameborder="0" border="0" allowtransparency="true"></iframe>

</body>
</html>
