<?
$pindao=urldecode($_GET['pindao']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html   xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css">
body {overflow:hidden;font-size: 12px;margin: 0px;background-color: #000000;}
</style>
<title><?  echo $pindao; ?>-����ֱ����</title>
<script type="text/javascript" src="/js/letvlive.js"></script> 
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="Keywords" content="<? echo $pindao;?>â��ֱ����<? echo $pindao;?>â������ֱ��" />
<meta name="description" content="����ֱ������Ϊ���ṩ<? echo $pindao;?>â��ֱ��" />
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
<embed name="hunantv-player-1" class="" id="hunantv-player-1" src="http://player.hunantv.com/mgtv_v5_live/live.swf?channel_id=<? echo $_GET['liveId']?>&amp;from=web&amp;mt=&amp;liveType=2&amp;dataPt=1" quality="best" allowscriptaccess="always" wmode="Opaque" allowfullscreen="true" bgcolor="#000000" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" height="480" width="680"></embed>

</body>
</html>

