<?
$pindao=urldecode($_GET['pindao']);
?>
<html>
<head>
<style type="text/css">
body {overflow:hidden;font-size: 12px;margin: 0px;background-color: #000000;}
</style>
<title><?  echo $pindao; ?>-乐视直播网</title>
<script type="text/javascript" src="/js/letvlive.js"></script> 
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="Keywords" content="<? echo $pindao;?>直播，<? echo $pindao;?>在线直播" />
<meta name="description" content="乐视直播网，为您提供<? echo $pindao;?>直播" />
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
<embed name="hunantv-player-1" class="" id="hunantv-player-1" src="http://img1.ahtv.cn/player/live.swf?channelId=<? echo $_GET['id']?>" quality="best" allowscriptaccess="always" wmode="Opaque" allowfullscreen="true" bgcolor="#000000" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" height="480" width="680"></embed>

</body>
</html>
