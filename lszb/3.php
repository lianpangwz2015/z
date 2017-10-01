<?
$url="http://122.114.117.149/zhibo/hunan.php";
$url=g_contents($url);
preg_match ( "#location':'(.*?)'#", $url, $gid );
$url=$gid[1];
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
	<title>乐视直播网-湖南卫视在线直播-湖南卫视</title>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
	<script type="text/javascript" src="/js/letvlive.js"></script> 
<meta name="Keywords" content="<? global $lid; echo $lid;?>，乐视直播网,网络乐视台,乐视台,乐视直播,湖南卫视在线直播" />
<meta name="description" content="乐视直播网，是一档千万人喜爱的网络直播直播节目，以全新的视觉为您呈现乐视网的原创和独家视频直播内容，高端的访问和互动，刺激的美女真人PK，流行的时尚解说，让您耳目一新." />
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