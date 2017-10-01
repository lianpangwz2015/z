<?
$pindao=urldecode($_GET['pindao']);
$id=$_GET['id'];

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
	var purl='http://ningxia.vtime.cntv.cloudcdn.net:8500/cache/174_/seg0/index.m3u8';
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