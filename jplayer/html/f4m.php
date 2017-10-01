<?
include 'config.php';
?>
<html>
<head>
<style type="text/css">
body {overflow:hidden;font-size: 12px;margin: 0px;background-color: #000000;}
</style>
<title>f4m-<? global $title; echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="Keywords" content="uusee,<? global $keyword; echo $keyword;?>" />
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
<iframe id="c_play" name="c_play" src="http://www.letvlive.com/jplayer/html/f4m.swf?src=<? echo $_GET['id']?>&autoPlay=true&controlBarAutoHide=true" width="100%" height="100%" scrolling="no" frameborder="0" border="0" allowtransparency="true"></iframe>
</html>
