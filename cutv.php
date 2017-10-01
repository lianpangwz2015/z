<?
$pindao=urldecode($_GET['pindao']);
?>
<html>
<head>
<script type="text/javascript" src="js/letvlive.js"></script> 
<style type="text/css">
body {overflow:hidden;font-size: 12px;margin: 0px;background-color: #000000;}
</style>
<title><?  echo $pindao; ?>-乐视直播网</title>
<script type="text/javascript" src="/js/letvlive.js"></script> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<? echo $pindao;?>cutv直播，<? echo $pindao;?>cutv在线直播" />
<meta name="description" content="乐视直播网，为您提供<? echo $pindao;?>cutv直播" />
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
<script type="text/javascript">

document.writeln("<iframe src=\"http://tv.cutv.com/player/cv.swf?channelId=<? echo $_GET[\'id\']?>\" width=\"100%\" height=\"100%\" scrolling=\"auto\" frameborder=\"0\"></iframe>");
</script>
</body>
</html>
