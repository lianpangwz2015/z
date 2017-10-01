<?

$channel="http://m.kankanews.com/web/fakeESI?module=catchUP&info=81_2017-07-16";
$url_2=g_contents($channel);
preg_match ( '#live":"(.*?)",#', $url_2, $vn );
preg_match ( '#paras":"(.*?)",#', $url_2, $v );
$url=str_replace('\/',"/",$vn[1])."&_mode=1".$v[1];
$url=urlencode($url);

function g_contents($url) {
        $user_agent = 'User-Agent: Mozilla/5.0 (Linux; U; Android 4.4.4; zh-CN; E653Lw Build/KTU84P) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 UCBrowser/10.9.6.736 U3/0.8.0 Mobile Safari/534.30';
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
$pindao=urldecode($_GET['pindao']);
?>
<html>
	<head>
<title><?  echo $pindao; ?>-乐视直播网</title>
<script type="text/javascript" src="/js/letvlive.js"></script> 
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="Keywords" content="<? echo $pindao;?>咪咕直播，<? echo $pindao;?>咪咕在线直播" />
<meta name="description" content="乐视直播网，为您提供<? echo $pindao;?>咪咕直播" />
<script type="text/javascript" src="jwplayer.js"></script>
	
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
	<body style="margin:0;padding:0">
	<div id="a1" style="psotion:relative;"></div>
<script type="text/javascript">
	var isiPad = navigator.userAgent.match(/iPad|iPhone|Android|Linux|iPod/i) != null;
	if(isiPad){
		document.getElementById('a1').innerHTML = '<video src="<?  echo urldecode($url);?>" controls="controls" autoplay="autoplay" width="100%" height="100%"></video>';
	}else{
document.writeln("<embed name=\'hunantv-player-1\' class=\'\' id=\'hunantv-player-1\' src=\'http://g.alicdn.com/de/prismplayer-flash/1.2.16/PrismPlayer.swf?vurl=<?echo $url;?>\'  quality=\'best\' allowscriptaccess=\'always\' wmode=\'Opaque\' allowfullscreen=\'true\' bgcolor=\'#000000\' type=\'application/x-shockwave-flash\' pluginspage=\'http://www.macromedia.com/go/getflashplayer\' height=\'100%\' width=\'100%\'></embed>");
}
 </script>
	
	</body>
	</html>
