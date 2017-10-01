<?
$date=date("Y-m-d");
$ctv='http://tv.cntv.cn/index.php?action=zhibo-jiemu&channel=zhejiang';
$str=end(explode('<li class="cur" mark="zhibo">',getUrl($ctv)));
preg_match_all('|<span class="time">(.*?)</li>|imsU',$str,$r);
foreach($r[1] as $k=>$v){
$lrc=iconv("UTF-8", "GB2312//IGNORE", $v);

}


function getUrl($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        @ $data = curl_exec($ch);
        curl_close($ch);
        return $data;
}
?>
<head>
<title>浙江卫视-乐视直播网</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="Keywords" content="浙江卫视,乐视直播网,网络乐视台,乐视台,乐视直播" />
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
<embed src="http://tv.cztv.com/static-stuff/live/XLPP1028.swf"   allowScriptAccess="never" allowNetworking="internal" FlashVars="cid=101&keyWords=zgltv:101&hasTrack=1&channelName=%E6%B5%99%E6%B1%9F%E5%8D%AB%E8%A7%86&newp2p=0&uiv=0&callbackJs=play.callBack&loadingurl=http://tv.cztv.com/static-stuff/live/loading.swf" width="100%" height="100%" allowfullscreen="true"></embed>

         
      
</body>
</html>