<?
//http://58.20.59.58:8020/live/hnws.stream_aac/chunklist_w1776401742.m3u8
//http://61.216.91.103/live/ch19/index.m3u8
//http://115.56.240.146:9090/hls/mz7.m3u8
$lid=$_GET['id'];
//"ws_hunanwsHD_1300";
$str=$_GET['key'];
$key = $_SERVER['HTTP_HOST']."letvlive";

$k=authcode($str,'DECODE',$key,60);
//if($k=="pangwz2016"){

$url_1="http://a.kanevd.com/hntv-b.php?id=hunantv157510421";
$url_2=g_contents($url_1);

preg_match ( '/play_url = "(.*?)";/', $url_2, $vn );

$url=str_replace('\/',"/",$vn[1]);

//}else{
//$url="http://www.letvlive.com";
  //  header("location:$url");
    //exit(1);
//} 
function authcode($string, $operation = 'DECODE', $key = '', $expiry = 0){
 
 if($operation == 'DECODE') {
  $string = str_replace('[a]','+',$string);
  $string = str_replace('[b]','&',$string);
  $string = str_replace('[c]','/',$string);
 }
    $ckey_length = 4;
    $key = md5($key ? $key : 'livcmsencryption ');
    $keya = md5(substr($key, 0, 16));
    $keyb = md5(substr($key, 16, 16));
    $keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): substr(md5(microtime()), -$ckey_length)) : '';
    $cryptkey = $keya.md5($keya.$keyc);
    $key_length = strlen($cryptkey);
    $string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
    $string_length = strlen($string);
    $result = '';
    $box = range(0, 255);
    $rndkey = array();
    for($i = 0; $i <= 255; $i++) {
        $rndkey[$i] = ord($cryptkey[$i % $key_length]);
    }
    for($j = $i = 0; $i < 256; $i++) {
        $j = ($j + $box[$i] + $rndkey[$i]) % 256;
        $tmp = $box[$i];
        $box[$i] = $box[$j];
        $box[$j] = $tmp;
    }
    for($a = $j = $i = 0; $i < $string_length; $i++) {
        $a = ($a + 1) % 256;
        $j = ($j + $box[$a]) % 256;
        $tmp = $box[$a];
        $box[$a] = $box[$j];
        $box[$j] = $tmp;
        $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
    }
    if($operation == 'DECODE') {
        if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
   
            return substr($result, 26);
        } else {
            return '';
        }
    } else {
  $ustr = $keyc.str_replace('=', '', base64_encode($result));
  $ustr = str_replace('+','[a]',$ustr);
  $ustr = str_replace('&','[b]',$ustr);
  $ustr = str_replace('/','[c]',$ustr);
        return $ustr;
    }
}


function g_contents($url) {
        $user_agent = '360 Video App/3.1.6 Android/4.2.2 QIHU';
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
<title>湖南卫视在线直播-乐视直播网</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="Keywords" content="乐视湖南卫视,乐视直播网,网络乐视台,乐视台,乐视直播,湖南卫视在线直播" />
<meta name="description" content="乐视直播网，是一档千万人喜爱的网络直播直播节目，以全新的视觉为您呈现乐视网的原创和独家视频直播内容，高端的访问和互动，刺激的美女真人PK，流行的时尚解说，让您耳目一新." />
<script type="text/javascript" src="/js/letvlive.js"></script> 
<style type="text/css">
body {overflow:hidden;font-size: 12px;margin: 0px;background-color: #000000;}
</style>
<script type="text/javascript" >
//var url = location.search;
var url = document.referrer.substring(0, document.referrer.lastIndexOf('/'));
var arydomain = new Array(
"http://m.letvlive.com",
"http://henan.letvlive.com",
"http://hunan.letvlive.com",
"http://shandong.letvlive.com",
"http://sichuan.letvlive.com",
"http://yunnan.letvlive.com",
"http://dongfang.letvlive.com",
"http://heilongjiang.letvlive.com",
"http://jiangxi.letvlive.com",
"http://liaoning.letvlive.com",
"http://btv.letvlive.com",
"http://tianjin.letvlive.com",
"http://anhui.letvlive.com",
"http://zhejiang.letvlive.com",
"http://guangdong.letvlive.com",
"http://chongqing.letvlive.com",
"http://dongnan.letvlive.com",
"http://guizhou.letvlive.com",
"http://hebei.letvlive.com",
"http://guangxi.letvlive.com",
"http://shanxi1.letvlive.com",
"http://shanxi2.letvlive.com",
"http://neimenggu.letvlive.com",
"http://ningxia.letvlive.com",
"http://xizang.letvlive.com",
"http://xinjiang.letvlive.com",
"http://gansu.letvlive.com",
"http://hubei.letvlive.com",
"http://www.letvlive.com",
"http://www.flvbox.net",
"http://cctv1.letvlive.com",
"http://cctv2.letvlive.com",
"http://cctv3.letvlive.com",
"http://cctv4.letvlive.com",
"http://cctv5.letvlive.com",
"http://cctv6.letvlive.com",
"http://cctv7.letvlive.com",
"http://cctv8.letvlive.com",
"http://cctv9.letvlive.com",
"http://cctv10.letvlive.com",
"http://cctv11.letvlive.com",
"http://cctv12.letvlive.com",
"http://cctv13.letvlive.com",
"http://cctv14.letvlive.com",
"http://live.jstv.com.letvlive.com"
	);
var b=false;
for(var i=0;i<arydomain.length;i++ ){
	if(url==arydomain[i]){
		b=true;
	}
}
if(!b){
	top.location.href = " http://www.letvlive.com";

}
</script> 

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
<div id="a1" style="psotion:relative;"></div>
<script type="text/javascript">
	var isiPad = navigator.userAgent.match(/iPad|iPhone|Android|Linux|iPod/i) != null;
	if(isiPad){
		document.getElementById('a1').innerHTML = '<video src="http://hbqx.chinashadt.com:1937/live/stream:test.stream/playlist.m3u8" controls="controls" autoplay="autoplay" width="100%" height="100%"></video>';
	}else{
document.writeln("<embed name=\'hunantv-player-1\' class=\'\' id=\'hunantv-player-1\' src=\'http://g.alicdn.com/de/prismplayer-flash/1.2.16/PrismPlayer.swf?vurl=http://hbqx.chinashadt.com:1937/live/stream:test.stream/playlist.m3u8\'  quality=\'best\' allowscriptaccess=\'always\' wmode=\'Opaque\' allowfullscreen=\'true\' bgcolor=\'#000000\' type=\'application/x-shockwave-flash\' pluginspage=\'http://www.macromedia.com/go/getflashplayer\' height=\'100%\' width=\'100%\'></embed>");
}
 </script>
</body>

</html>
