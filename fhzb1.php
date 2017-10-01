<?
include 'config.php';
?>
<html>
<head>
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
<div class="video"  id="swfDiv" ></div>
	
		   <script type="text/javascript" language="javascript" src="http://v.ifeng.com/include/citeswfobject.js"></script>
           <script type="text/javascript" language="javascript" src="http://v.ifeng.com/tres/js/ifeng-live-video-v2.js" ></script>

           <script type="text/javascript"> 
                  var player = new ifeng.smop.Live("swfDiv");
                  player.updateVariable("ChannelID", '<? echo $_GET['id']?>');//修改直播流
	              player.updateVariable("AutoPlay",true);//是否自动播放
	              player.updateVariable("AutoP2P",false);//"false";//是否是P2P跳转。
	              player.updateVariable('ADPlay','true');
	              player.updateVariable("from","live");
	              player.updateVariable("PlayerName","vZTLivePlayer");
	              //player.updateVariable("ADURL", escape("http://sc.ifeng.com/html.ng/channel=11newslianghui&level=vcontent&location=1&site=ifeng&type=video"));
	              player.updateInit("width","640");
	              player.updateInit("height","510");
	              player.play();
	           
           </script>

<script type="text/javascript">    
 // 兼容ipad iphone ipod
if(/(ipad|iphone|ipod)/i.test(navigator.userAgent)){
(function(){
var _src = "http://live.3gv.ifeng.com/live/zixun.m3u8?fmt=x264_0k_mpegts&size=320x240"; //资讯台
var html5 = '<video controls autoplay="true" width="640" height="510" >';
html5 += '<source src="'+ _src +'" width="640" height="510" type="video/mp4" ></source>';
html5 += '</video>';
document.getElementById('swfDiv').innerHTML = html5;
    })();
}
</script>		</body>
</html>

