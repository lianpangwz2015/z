<?
//http://xstm.v.360.cn/live/parse?channel=5rmW5Y2X5Y2r6KeG&he=1&r=ea0256c09f73da1ce921dc5018d1117e&p=6317bf0f89c3d1d5a5648d5e3c3855a1
//http://xstm.v.360.cn/live/parse?channel=5rWZ5rGf5Y2r6KeG&he=1&r=14b4ebec0ffababe1810fd99536f82e6&p=be24e31f769eaec1a11745d73e31c34f
$url_1="http://xstm.v.360.cn/live/parsemigu?he=1&channel=5Lic5pa55Y2r6KeGSEQ%3D&luuid=OhO1PJ3jLoz2CT&mid=&r=d7df805e7d69ad2a7b025dda2c48045c&p=ec1f1af5728fb5fc0883405fb7760d21";
$url_2=g_contents($url_1);
$url_2=str_replace('\/',"/",$url_2);
preg_match ( '/urls":\["(.*?)"/', $url_2, $vn );
$url=$vn[1];

$url=str_replace('live.gslb.cmvideo.cn',"live.hcs.cmvideo.cn:8088",$url);

echo $url;
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
?>
