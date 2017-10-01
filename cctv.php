
<?

$lid=$_GET['id'];
$list='<cctv-1>cctv1#cctv1<cctv-1>
<cctv-2>cctv2#cctv2<cctv-2>
<cctv-3>cctv3#cctv3<cctv-3>
<cctv-4>cctv4#cctv4<cctv-4>
<cctv-5>cctv5#cctv5<cctv-5>
<cctv-6>cctv6#cctv6<cctv-6>
<cctv-7>cctv7#cctv7<cctv-7>
<cctv-8>cctv8#cctv8<cctv-8>
<cctv-9>cctv9#cctvjilu<cctv-9>
<cctv-10>cctv10#cctv10<cctv-10>
<cctv-11>cctv11#cctv11<cctv-11>
<cctv-12>cctv12#cctv12<cctv-12>
<cctv-13>cctv13#cctv13<cctv-13>
<cctv-14>cctv14#cctvchild<cctv-14>
<cctv-15>cctv15#cctv15<cctv-15>
<cctv5plus>cctv52#cctv5plus<cctv5plus>

';

preg_match ( '/<.*?>'.$lid.'#(.*?)<.*?>/', $list, $key );
$channel=$key[1];
$pindao=urldecode($_GET['pindao']);

$url_1="http://vdn.live.cntv.cn/api2/liveHtml5.do?channel=pa://cctv_p2p_hd".$channel;
$url_2=g_contents($url_1);
preg_match ( '/flv2":"(.*?)",/', $url_2, $vn );
preg_match ( '/hds1":"(.*?)",/', $url_2, $v );
$url=$v[1];
$url1=$vn[1];
function g_contents($url) {
        $user_agent = 'okhttp/3.0.1';
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
<title><?  echo $pindao; ?>-乐视直播网</title>
<script type="text/javascript" src="/js/letvlive.js"></script> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<? echo $pindao;?>央视直播，<? echo $pindao;?>央视在线直播" />
<meta name="description" content="乐视直播网，为您提供<? echo $pindao;?>央视直播" />
<style type="text/css">
html, body { height:100%; margin:0; padding:0; text-align:center; background:#181818; }
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
<iframe id="play" name="play" src="http://player.cntv.cn/standard/cntvHdsLivePlayer20170623.swf?streamType=live&autoPlay=true&controlBarAutoHide=true&Full=true&allowfullscreen=true&addrs=http://cctv1.vtime.cntv.cloudcdn.net/cache/cctv1hds.f4m?AUTH=HDjFqbmgh0f4J7MD5iQ9tT081aGGajQOxj32ODSyv+RpPfYx0aPC0Pk2lRSK9TYHT1f7SEEXJduOlkakMhD6EA==&VideoName=cctv3&ChannelID=cctv3&videoTVChannel=cctv2&P2PChannelID=pa://cctv_p2p_hd<?echo $channel;?>&ack=yes&public=1&playBackType=common&ruleVisible=true&languageXml=&configURL=http://player.cntv.cn/flashplayer/config/WebHDSPlayerConfig.xml&referrer=http://tv.cctv.com/live/" width=100% height=100%  scrolling="auto" frameborder="0" border="0" allowtransparency="true"></iframe>

</body>
</html>