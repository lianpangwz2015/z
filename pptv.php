<?
$pindao=urldecode($_GET['pindao']);
$id=$_GET['id'];
if($id=='0a2fmaaWpqaSy7O'){
$pindao="北京卫视";
}
?>
<html>
<head>
<title><?  echo $pindao; ?>-乐视直播网</title>
<script type="text/javascript" src="js/letvlive.js"></script> 
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="Keywords" content="<? echo $pindao;?>pptv直播，<? echo $pindao;?>pptv在线直播" />
<meta name="description" content="乐视直播网，为您提供<? echo $pindao;?>pptv直播" />
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
<embed src="http://player.pplive.cn/live/2.12.10/player4live2.swf" allowFullScreen="true"  allowScriptAccess="never" allowNetworking="internal" FlashVars="pl=pptv://<? echo $_GET['id']?>&amp;playerType=live&amp;pid=175901" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"width="100%" height="100%"></embed>
</body>
</html>

