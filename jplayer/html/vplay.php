<html>
<head>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" /> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>视频在线播放</title>
<link href="/hunan/css.css" rel="stylesheet" type="text/css" />
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
   <div id="a1" style="width:100%;height:100%;"></div>
<script type="text/javascript" src="player.js"  charset="gb2312"></script>
<script type="text/javascript">
	var isiPad = navigator.userAgent.match(/iPad|iPhone|Android|Linux|iPod/i) != null;
	if(isiPad){
		document.getElementById('a1').innerHTML = '<video src="<? echo $_GET['id']?>" controls="controls" autoplay="autoplay" width="100%" height="100%"></video>';
	}else{
		var flashvars={f:'m3u8.swf',a:'<? echo $_GET['id']?>',c:0,s:4,lv:0,p:1,v:100,b:1}
		var params={bgcolor:'#000',allowFullScreen:true,allowScriptAccess:'always',wmode:'transparent'};
		CKobject.embedSWF('player.swf','a1','ckplayer_a1','100%','100%',flashvars,params);
	}
</script>
 
     

</body>
</html>