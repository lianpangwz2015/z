<?
$url="http://app1.tv.cmvideo.cn:8088/migutv-clt/rLive.html?type=2&getway=607552833&rate=1&plat=a&id=328&deviceid=a4e341d9278adecf21ee3e7ecfec4225&imei=868531020483447&cip=10.100.89.102&mobileType=E653Lw&lastAcquiredPhone=&clientId=05ci20160529102855&netType=5&channel=200300150100005&appVersion=2.2.0";
$url2=g_contents($url);
preg_match ( '/playUrl":"(.*?)"/', $url2, $key );
$url=str_replace('live.gslb.cmvideo.cn',"ipad.cmvideo.cn:8080",$key[1]);
function g_contents($url) {
        $user_agent = 'User-Agent: ExoPlayerDemo/2.2.0 (Linux;Android 4.4.4) ExoPlayerLib/1.5.2';
        $ch = curl_init ();
        $timeout = 30;
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
        curl_setopt ( $ch, CURLOPT_USERAGENT, $user_agent );
        @ $c = curl_exec ( $ch );
        curl_close ( $ch );
        return $c;
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>江苏卫视-乐视直播网</title>
<script type="text/javascript" src="/js/letvlive.js"></script> 
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="Keywords" content="江苏卫视在线直播" />
<meta name="description" content="乐视直播网为您提供江苏卫视直播！" />
<script type="text/javascript" src="../hunan/jwplayer.js"></script>
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
<div id="myElement">正在加载</div>
		<script type="text/javascript">
	var isiPad = navigator.userAgent.match(/iPad|iPhone|Android|Linux|iPod/i) != null;
	if(isiPad){
		document.getElementById('myElement').innerHTML = '<video src="http://eshare.live.otvcloud.com/otv/nyz/live/channel09/400.m3u8" controls="controls" autoplay="autoplay" width="100%" height="100%"></video>';
	}else{
jwplayer("myElement").setup({playlist:[{file:'http://eshare.live.otvcloud.com/otv/nyz/live/channel09/400.m3u8',provider:'../hunan/HLSProvider6.swf',type:'mp4',title:'乐视直播网'}],flashplayer:'../hunan/jwplayer.swf',skin:'../hunan/skins/vapor.xml',width:'100%',height:'100%',primary:"flash",autostart:true});
 }
 </script>
</body>
</html>