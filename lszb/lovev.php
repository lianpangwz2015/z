<?

$lid=$_GET['id'];
$list='<cctv-1>cctv1hd#608807427<cctv-1>
<cctv-1>cctv1#201706223000000b899<cctv-1>
<cctv-2>cctv2#201706223000000bc99<cctv-2>
<cctv-3>cctv3#201706223000000bf99<cctv-3>
<cctv-4>cctv4#201706223000000bk99<cctv-4>
<cctv-5>cctv5#603993188<cctv-5>
<cctv-5>cctv5hd#604097066<cctv-5>
<cctv-6>cctv6#201706223000000br99<cctv-6>
<cctv-7>cctv7#201706223000000bu99<cctv-7>
<cctv-8>cctv8#201706223000000bv99<cctv-8>
<cctv-9>cctv9#201706223000000bz99<cctv-9>
<cctv-10>cctv10#201706223000000c199<cctv-10>
<cctv-11>cctv11#201706223000000c499<cctv-11>
<cctv-12>cctv12#201706223000000c599<cctv-12>
<cctv-13>cctv13#201706223000000c699<cctv-13>
<cctv-14>cctv14#201706223000000ca99<cctv-14>
<cctv-15>cctv15#201706223000000cc99<cctv-15>
<shandong>shandong#201706223000000de99<shandong>
<jiangshu>jiangshu#201706223000000dh99<jiangshu>
<btv>btv#201706223000000dl99<btv>
<ahtv>ahtv#201704243000000wn13<ahtv>
<sztv>sztv#201706223000000cz99<sztv>
<hljtv>hljtv#608779864<hljtv>
<hubeitv>hubeitv#624878953<hubeitv>
<liaoningtv>liaoningtv#624878951<liaoningtv>
<guangdongtv>guangdongtv#201706223000000d499<guangdongtv>
<tianjin>tianjin#201706223000000dj99<tianjin>
<dongfang>dongfang#619811679<dongfang>
<sdjy>sdjy#609154353<sdjy>
<sichuan>sichuan#201706223000000cy99<sichuan>
<henan>henan#608779360<henan>
<guizhou>guizhou#608779450<guizhou>
<dongnan>dongnan#609153805<dongnan>
<gansu>gansu#608907550<gansu>
<xizang>xizang#608907682<xizang>
<bingtuan>bingtuan#608914624<bingtuan>
<chongqing>chongqing#201706223000000dd99<chongqing>
<jiangxi>jiangxi#608924994<jiangxi>
<hebei>hebei#609026126<hebei>
<jilin>jilin#609020981<jilin>
<shanxi>shanxi#609022770<shanxi>
<xiamen>xiamen#608935834<xiamen>
<yunan>yunan#609154293<yunan>
<neimenggu>neimenggu#608914971<neimenggu>
<ningxia>ningxia#608914867<ningxia>
<xinjiang>xinjiang#608779373<xinjiang>
<qinhai>qinhai#608915204<qinhai>
<sxtv2>sxtv2#609154295<sxtv2>
<hubei>hubei#615945699<hubei>
';

preg_match ( '/<.*?>'.$lid.'#(.*?)<.*?>/', $list, $key );
$url="http://r.gslb.lecloud.com/live/hls/".$key[1]."/desc.m3u8";
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
		document.getElementById('a1').innerHTML = '<video src="<?  echo $url;?>" controls="controls" autoplay="autoplay" width="100%" height="100%"></video>';
	}else{
document.writeln("<embed name=\'hunantv-player-1\' class=\'\' id=\'hunantv-player-1\' src=\'http://g.alicdn.com/de/prismplayer-flash/1.2.16/PrismPlayer.swf?vurl=<?echo $url;?>\'  quality=\'best\' allowscriptaccess=\'always\' wmode=\'Opaque\' allowfullscreen=\'true\' bgcolor=\'#000000\' type=\'application/x-shockwave-flash\' pluginspage=\'http://www.macromedia.com/go/getflashplayer\' height=\'100%\' width=\'100%\'></embed>");
}
 </script>
	
	</body>
	</html>
