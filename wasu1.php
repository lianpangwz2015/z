<?
include 'config.php';
?>
<html>
<head>
<style type="text/css">
body {overflow:hidden;font-size: 12px;margin: 0px;background-color: #000000;}
</style>
<title>乐视直播-<? global $title; echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="Keywords" content="<? global $keyword; echo $keyword;?>" />
<meta name="description" content="<? global $description; echo $description;?>" />

<!-- letvlive.com Baidu tongji analytics -->
<script>
var _hmt = _hmt || [];
(function() {
var hm = document.createElement("script");
hm.src = "https://hm.baidu.com/hm.js?5812ace6a2c888fd44a4de29c849f5cf";
var s = document.getElementsByTagName("script")[0];
s.parentNode.insertBefore(hm, s);
})();
</script>

</head>

<body>
//http://play.wasu.cn/player/20131010/iLivePlayer.swf?vid=&ap=1
//http://s.wasu.cn/portal/player/20140326/WsPlayer.swf?video=rtmp://livertmp.wasu.cn/live8/cctv5&alsc=x0
//http://s.wasu.cn/portal/player/20140717/WsPlayer.swf?vid=457&mode=4&live=1&ap=1
<iframe id="c_play" name="c_play" src="http://s.wasu.cn/portal/player/20160105/WsPlayer.swf?video=<? echo $_GET['id']?>&alsc=x0" width="100%" height="100%" scrolling="no" frameborder="0" border="0" allowtransparency="true"></iframe>
</body>
</html>