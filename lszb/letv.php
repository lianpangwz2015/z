<?

$lid=$_GET['id'];
//"ws_hunanwsHD_1300";
//9  36 29 48 96




$url_1="http://live.g3proxy.lecloud.com/gslb?stream_id=".$lid."&tag=live&ext=m3u8&format=1&expect=1&termid=1&hwtype=un&platid=10&splatid=1001&playid=1&sign=live_web&ostype=Windows%20XP&p1=1&p2=10&p3=-&uuid=FE4415EF7D66BAA9350F57A3126FE1B7BFF51381_0&vkit=20160415&station=104";
$url_2=g_contents($url_1);
preg_match ( '/channelid": (.*?),/', $url_2, $vn );

//$url=str_replace('\/',"/",$vn[1]);
//preg_match ( '/(stream_id.*)/', $url, $v);
//$url="http://r.gslb.lecloud.com/m3u8/".$lid."/desc.m3u8?". $v[1]."&hewtype=letvlive.com";
$key=$vn[1];


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
        $ip=get_onlineip();
        $user_agent = 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.146 Safari/537.36';
        $ch = curl_init ();
        $timeout = 30;
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-FORWARDED-FOR:'.$ip, 'CLIENT-IP:'.$ip));
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
        curl_setopt ( $ch, CURLOPT_USERAGENT, $user_agent );
        @ $c = curl_exec ( $ch );
        curl_close ( $ch );
        return $c;
}



function get_onlineip() { 
$onlineip = ''; 
if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) { 
$onlineip = getenv('HTTP_CLIENT_IP'); 
} elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) { 
$onlineip = getenv('HTTP_X_FORWARDED_FOR'); 
} elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) { 
$onlineip = getenv('REMOTE_ADDR'); 
} elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) { 
$onlineip = $_SERVER['REMOTE_ADDR']; 
} 
return $onlineip; 
} 
$pindao=urldecode($_GET['pindao']);
?>
<html>
<head>
<title><?  echo $pindao; ?>-乐视直播网</title>
<script type="text/javascript" src="/js/letvlive.js"></script> 
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="Keywords" content="<? echo $pindao;?>乐视直播，<? echo $pindao;?>乐视在线直播" />
<meta name="description" content="乐视直播网，为您提供<? echo $pindao;?>乐视直播" />
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
	
<script  language="javascript">document.writeln("<iframe id=\"c_play\" name=\"c_play\" src=\"http://minisite.letv.com/tuiguang/index.shtml?islive=1&channelId=<? global $key; echo $key;?>&typeFrom=letv_live_360live&ark=100&cid=4&wmode=opaque\" width=\"100%\" height=\"479\" scrolling=\"auto\" frameborder=\"0\" border=\"0\" allowtransparency=\"true\"></iframe>");</script>

</body>
</html>
