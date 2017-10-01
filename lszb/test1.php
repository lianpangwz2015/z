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

$url_1="http://a.hlyy.cc/hntv-mg123.php?id=609153595";
$url_2=g_contents($url_1);

preg_match ( "/location': '(.*?)'/", $url_2, $vn );

$url=urlencode(str_replace('\/',"/",$vn[1]));

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
$pindao=urldecode($_GET['pindao']);
?>
<html>
<head>
<title><?  echo $pindao; ?>-乐视直播网</title>
<script type="text/javascript" src="/js/letvlive.js"></script> 
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="Keywords" content="<? echo $pindao;?>直播，<? echo $pindao;?>在线直播" />
<meta name="description" content="乐视直播网，为您提供<? echo $pindao;?>官网直播" /><script type="text/javascript" src="/js/letvlive.js"></script> 
<style type="text/css">
body {overflow:hidden;font-size: 12px;margin: 0px;background-color: #000000;}
</style>
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
		document.getElementById('a1').innerHTML = '<video src="<?  echo urldecode($url);?>" controls="controls" autoplay="autoplay" width="100%" height="100%"></video>';
	}else{
document.writeln("<embed name=\'hunantv-player-1\' class=\'\' id=\'hunantv-player-1\' src=\'http://g.alicdn.com/de/prismplayer-flash/1.2.16/PrismPlayer.swf?vurl=<?echo $url;?>\'  quality=\'best\' allowscriptaccess=\'always\' wmode=\'Opaque\' allowfullscreen=\'true\' bgcolor=\'#000000\' type=\'application/x-shockwave-flash\' pluginspage=\'http://www.macromedia.com/go/getflashplayer\' height=\'100%\' width=\'100%\'></embed>");
}
 </script></body>

</html>
