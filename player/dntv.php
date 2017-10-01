<?
$pindao=urldecode($_GET['pindao']);
$id=$_GET['id'];
//http://v.fjtv.net/m2o/player/drml.php?url=http%3A%2F%2Fstream5%2Efjtv%2Enet%2Fdnpd%2Fhd%2Flive%2Em3u8&playerVersion=4%2E03&refererurl=http%3A%2F%2Flive%2Efjtv%2Enet%2Fsetv%2F&hash=5ae2730b1f12f7e3a0195c06cf66b00a&time=1492139321531
?>
<html>
<head>
<title><?  echo $pindao; ?>-乐视直播网</title>
<script type="text/javascript" src="/js/letvlive.js"></script> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<? echo $pindao;?>官网直播，<? echo $pindao;?>官网在线直播" />
<meta name="description" content="乐视直播网，为您提供<? echo $pindao;?>官网直播" />
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
<div id="a1" style="psotion:relative;"></div>
<script type="text/javascript" src="/ckplayer/ckplayer.js" charset="utf-8"></script>
<script type="text/javascript">
    var vid='<?php echo $_GET['vid'];?>';
	var purl='http://dongnan.vtime.cntv.cloudcdn.net:8500/cache/154_/seg0/index.m3u8';
	var flashvars={
	    f: '/ckplayer/m3u8.swf', 		//使用swf向播放器发送视频地址进行播放
		a: encodeURIComponent(purl), 
            loaded:'loadedHandler',    
	    c: 0,		//调用 ckplayer.js 配置播放器
	    p: 1,		//自动播放视频
	    s: 4,		//flash插件形式发送视频流地址给播放器进行播放
	    lv: 1
	};
	var params={bgcolor:'#FFF',allowFullScreen:true,allowScriptAccess:'always',wmode:'transparent'};
	var isiPad = navigator.userAgent.match(/iPad|iPhone|Linux|Android|iPod/i) != null;
    if (isiPad) {
        document.getElementById('a1').innerHTML = '<video src="'+purl+'" controls="controls" autoplay="autoplay" width="100%" height="460" style="psotion:relative;""></video>'
	}else{
	    CKobject.embedSWF('/ckplayer/ckplayer.swf','a1','ckplayer_a1','100%','100%',flashvars,params);
	}
  </script>
  </body>
</html>