<?

$lid=$_GET['id'];
$list='<cctv-1>cctv1hd#608807427<cctv-1>
<cctv-1>cctv1#608807420<cctv-1>
<cctv-2>cctv2#603993182<cctv-2>
<cctv-3>cctv3#604267259<cctv-3>
<cctv-4>cctv4#604010491<cctv-4>
<cctv-5>cctv5#603993188<cctv-5>
<cctv-5>cctv5hd#604097066<cctv-5>
<cctv-6>cctv6#603943748<cctv-6>
<cctv-7>cctv7#609018153<cctv-7>
<cctv-8>cctv8#603943745<cctv-8>
<cctv-9>cctv9#603938964<cctv-9>
<cctv-10>cctv10#604043322<cctv-10>
<cctv-11>cctv11#604101204<cctv-11>
<cctv-12>cctv12#604106110<cctv-12>
<cctv-13>cctv13#608807423<cctv-13>
<cctv-14>cctv14#609017204<cctv-14>
<cctv-15>cctv15#608807408<cctv-15>
<shandong>shandong#619618278<shandong>
<jiangshu>jiangshu#623899368<jiangshu>
<btv>btv#609154074<btv>
<ahtv>ahtv#624878947<ahtv>
<sztv>sztv#608782582<sztv>
<hljtv>hljtv#608779864<hljtv>
<hubeitv>hubeitv#624878953<hubeitv>
<liaoningtv>liaoningtv#624878951<liaoningtv>
<guangdongtv>guangdongtv#608831231<guangdongtv>
<tianjin>tianjin#627065430<tianjin>
<dongfang>dongfang#619811679<dongfang>
<sdjy>sdjy#609154353<sdjy>
<sichuan>sichuan#608880878<sichuan>
<henan>henan#608779360<henan>
<guizhou>guizhou#608779450<guizhou>
<dongnan>dongnan#609153805<dongnan>
<gansu>gansu#608907550<gansu>
<xizang>xizang#608907682<xizang>
<bingtuan>bingtuan#608914624<bingtuan>
<chongqing>chongqing#609024130<chongqing>
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
$channel="http://static.101fk.com/file/pd_ds.php?name=hsj&id=".$key[1];
$url_2=g_contents($channel);

preg_match ( '|video src="(.*?)"|', $url_2, $vn );
$url=urlencode($vn[1]);
//$url=urlencode(str_replace('http://h5live.gslb.cmvideo.cn',"http://live.hcs.cmvideo.cn:8088",$url));
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
