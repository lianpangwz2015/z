<?
$referer = $_SERVER['HTTP_REFERER'];
$selfurl = $_SERVER['HTTP_HOST'];
if(false == strpos($referer,$selfurl)){
$url="http://www.letvlive.com";
    header("location:$url");
    exit(1);
}
$lid=$_GET['id'];
//"ws_hunanwsHD_1300";
$str=$_GET['key'];
$key = $_SERVER['HTTP_HOST']."letvlive";

$k=authcode($str,'DECODE',$key,0);
if($k=="pangwz2016"){
//$url="http://122.114.117.149/zhibo/hunan.php";
//$url=g_contents($url);
//preg_match ( "#location':'(.*?)'#", $url, $gid );
$url="http://ktv012.cdnllnwnl.ds.kylintv.net/nlds/kylin/huntvhd/as/live/huntvhd_4.m3u8";
}else{
$url="http://www.letvlive.com";
    header("location:$url");
    exit(1);
} 





function get_url($url){
$url="http://live.g3proxy.lecloud.com/gslb?stream_id=ws_hunanwsHD_1800&platid=10&splatid=1009&tag=live&ext=m3u8&sign=live_web&ostype=macos&hwtype=iphone&expect=1&format=1&tm=1466546696&key=0b07a5002b83ee8ff4675ba56993e6d4&timeshift=-60&jsonp=jQuery20007672494560768433_1466558405927&_=1466558405928";
$url=g_contents($url);
preg_match ( '/jQuery(.*?)\(/', $url, $key );
$url="http://g3.letv.com/r?format=1&jsonp=jQuery".$key[1];
$url=g_contents($url);
$url=str_replace('\/',"/",$url);
preg_match ( '#gone":(.*?),#', $url, $gid );
preg_match ( '#http\:\/\/(.*?)\/#', $url, $pip );
$gid=str_replace(" ","",$gid[1]);
$url="http://wap.itv186.com/player.php?uri=http://uri.itv186.cn/vlive/ipad/ws_hunanwsHD_1300.m3u8&pip=".$pip[1]."&gid=".$gid;
$url=g_contents($url);
preg_match ( '/uri":"(.*?)"/', $url, $key );
$url=g_contents($key[1]);
$url=str_replace("#EXTM3U
#EXT-X-STREAM-INF:PROGRAM-ID=1, BANDWIDTH=300000
","",$url);
}


function get_head($sUrl){
$oCurl = curl_init();

$header[] = "Content-type: application/x-www-form-urlencoded";
$user_agent = "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.146 Safari/537.36";

curl_setopt($oCurl, CURLOPT_URL, $sUrl);
curl_setopt($oCurl, CURLOPT_HTTPHEADER,$header);

curl_setopt($oCurl, CURLOPT_HEADER, true);

curl_setopt($oCurl, CURLOPT_NOBODY, true);

curl_setopt($oCurl, CURLOPT_USERAGENT,$user_agent);
curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );

curl_setopt($oCurl, CURLOPT_POST, false);

$sContent = curl_exec($oCurl);

$headerSize = curl_getinfo($oCurl, CURLINFO_HEADER_SIZE);

$header = substr($sContent, 0, $headerSize);
    
curl_close($oCurl);

return $header;
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
$pindao=urldecode($_GET['pindao']);
?>
<html>
	<head>
<title><?  echo $pindao; ?>-乐视直播网</title>
<script type="text/javascript" src="/js/letvlive.js"></script> 
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="Keywords" content="<? echo $pindao;?>直播，<? echo $pindao;?>在线直播" />
<meta name="description" content="乐视直播网，为您提供<? echo $pindao;?>直播" /><script type="text/javascript" src="jwplayer.js"></script>
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
	<body style="margin:0;padding:0">
	<div id="myElement">正在加载</div>
	<script type="text/javascript">
	var isiPad = navigator.userAgent.match(/iPad|iPhone|Android|Linux|iPod/i) != null;
	if(isiPad){
		document.getElementById('myElement').innerHTML = '<video src="<? global $url; echo $url;?>" controls="controls" autoplay="autoplay" width="100%" height="100%"></video>';
	}else{
jwplayer("myElement").setup({playlist:[{file:'<? global $url; echo $url;?>',provider:'HLSProvider6.swf',type:'mp4',title:'乐视直播网'}],flashplayer:'jwplayer.swf',skin:'skins/vapor.xml',width:'100%',height:'100%',primary:"flash",autostart:true});
}
</script>
	</body>
	</html>