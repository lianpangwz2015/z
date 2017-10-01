

<?
$url_1="http://xstm.v.360.cn/live/parse?channel=5rWZ5rGf5Y2r6KeG&he=1&r=14b4ebec0ffababe1810fd99536f82e6&p=be24e31f769eaec1a11745d73e31c34f";
$url_2=g_contents($url_1);
$url_2=str_replace('\/',"/",$url_2);
preg_match ( '/urls":\["(http\:\/\/eshare.*?)"/', $url_2, $vn );
$url=$vn[1];
//$header=get_head($url);
//preg_match('|Location:\s(.*?)\s|',$header,$tdl);

//$url=$tdl[1];
//$url=str_replace('live.gslb.cmvideo.cn',"vod.cdn6.cmvideo.cn",$url);

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
<head>
<title>浙江卫视-乐视直播网</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="Keywords" content="乐视浙江卫视,乐视直播网,网络乐视台,乐视台,乐视直播" />
<meta name="description" content="乐视直播网，是一档千万人喜爱的网络直播直播节目，以全新的视觉为您呈现乐视网的原创和独家视频直播内容，高端的访问和互动，刺激的美女真人PK，流行的时尚解说，让您耳目一新." />
<style type="text/css">
html, body { height:100%; margin:0; padding:0; text-align:center; background:#181818; }
</style>

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
            <div id="a1"></div>

             <script type="text/javascript" src="player.js" charset="utf-8"></script>

         
            <script type="text/javascript">
                            var flashvars={
                                f:'m3u8.swf',
                                a:encodeURIComponent('http://eshare.live.otvcloud.com/otv/nyz/live/channel90/400.m3u8'),
                                c:0,
                                s:4,
                                lv:1,
                                loaded:'loadedHandler',
                                p:1
                            };
                            var params={bgcolor:'#FFF',allowFullScreen:true,allowScriptAccess:'always',wmode:'transparent'};
                            CKobject.embedSWF('player.swf','a1','ckplayer_a1','690','500',flashvars,params);
         </script> 
        </body>

</html>