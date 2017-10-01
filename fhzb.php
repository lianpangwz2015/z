<?
$pindao=urldecode($_GET['pindao']);
?>
<html>
<head>
<style type="text/css">
body {overflow:hidden;font-size: 12px;margin: 0px;background-color: #000000;}
</style>
<title><?  echo $pindao; ?>-乐视直播网</title>
<script type="text/javascript" src="js/letvlive.js"></script> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<? echo $pindao;?>凤凰直播，<? echo $pindao;?>凤凰在线直播" />
<meta name="description" content="乐视直播网，为您提供<? echo $pindao;?>凤凰直播" />
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

<iframe id="c_play" name="c_play" src="http://y0.ifengimg.com/swf/ifengLivePlayer_v5.0.50_p.swf?ChannelID=<? echo $_GET['id']?>&amp;StreamUrl=&amp;color=0xC2C2C2&amp;ADPlay=false&amp;ADURL=&amp;from=live&amp;adcpid=1210&amp;pageurl=http://v.ifeng.com/4AC51C17-9FBE-47F2-8EE0-8285A66EAFF5&amp;AutoPlay=true&amp;picUrl=&amp;AutoP2P=false&amp;picP2PUrl=&amp;picP2PLink=&amp;PlayerName=vLivePlayer&amp;DisableEPG=false&amp;subject=live&amp;uid=&amp;sid=&amp;locid=\" width="100%" height="100%" scrolling="auto" frameborder="0" border="0" allowtransparency="true"></iframe>
         
   


</body>
</html>

