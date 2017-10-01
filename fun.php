<?
include 'config.php';
?>
<html>
<head>
<script type="text/javascript" src="js/letvlive.js"></script> 
<style type="text/css">
body {overflow:hidden;font-size: 12px;margin: 0px;background-color: #000000;}
</style>
<title>uusee-<? global $title; echo $title; ?></title>
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
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" id="video-player" width="100%" height="100%" align="middle"><param name="allowscriptaccess" value="always"><param name="wmode" value="transparent"><param name="allowfullscreen" value="true"><param name="movie" value="http://q1.fun.tv/flash.php?from=live"><param name="flashvars" value="type=live&amp;data=21&amp;start=1&amp;startAd=0&amp;mediaAp=c_wb_rsv"><embed width="100%" height="100%" allowscriptaccess="always" wmode="transparent" ver="10.2" allowfullscreen="true" align="middle" flashvars="type=live&amp;data=<? echo $_GET['id']?>&amp;start=1&amp;startAd=1&amp;mediaAp=c_wb_rsv" src="http://q1.fun.tv/flash.php?from=live" name="video-player" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"></object>
</body>
</html>
