<?
$pindao=urldecode($_GET['pindao']);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?  echo $pindao; ?>-乐视直播网</title>
<script type="text/javascript" src="/js/letvlive.js"></script> 
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="Keywords" content="<? echo $pindao;?>乐视直播，<? echo $pindao;?>乐视在线直播" />
<meta name="description" content="乐视直播网，为您提供<? echo $pindao;?>乐视直播" />
</head>

<body>
<script language="javascript">
document.write('<embed src="http://ivi.bupt.edu.cn/player/player.swf"   allowScriptAccess="never" allowNetworking="internal" FlashVars="streamer=rtmp://ivi.bupt.edu.cn:1935/livetv&file=hunanhd.flv&provider=rtmp&bufferlength=1&duration=0&autostart=true" width="100%" height="100%" allowfullscreen="true"></embed>')

</script>
</body>
</html>
