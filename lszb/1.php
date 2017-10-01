
 <?php
    /*
        群信息:ZM视频解析 574281554
        作者：子墨 QQ：2319927093

        天山-湖南卫视直播解析

        严重警告：
        1，源码仅供学习交流使用。
        2，禁止用于危害官方利益的行为。
        3，禁止用于违反法律法规的行为。
        4，由于无法对学习交流用户的权利信息进行甄别，如您学习交流过程中侵犯了官方的合法利益或存在违法行为，请立即删除本学习交流程序，遵循相关法律。
        5，学习交流用户 应当保证其在学习交流过程中不应用于任何违法行为，并保证承担和赔偿有关违法行为造成的任何损失。
    */
    function http_curl($url,$host,$ctype,$accept,$referer) {
        $header = array(
                'Host:'.$host,
                'Content-type'.$ctype,
                'User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/20100101 Firefox/47.0',
                'Accept:'.$accept,
                'Accept-Encoding: gzip, deflate',
                'X-Requested-With: XMLHttpRequest'
            );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $header); 
         curl_setopt($ch, CURLOPT_REFERER,$referer);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);  
        @ $file = curl_exec($ch);

        curl_close($ch);
        return $file;
    }

    //php跨域请求
    header("Content-type: text/html; charset=utf-8");
    header('Access-Control-Allow-Origin:http://www.tsytv.com.cn');
    header('Access-Control-Allow-Credentials:true');
    header('Access-Control-Allow-Methods:GET, POST, OPTIONS');

    //获取动态生成的javascript标签，通过javascript callback的形式实现数据读取。
    //知识点：请百度jsoncallback 跨域
    $a='http://www.tsytv.com.cn/api/pc/videosecret/?StreamingUrl=http://tv03.tsytv.com.cn/liveho/HunanHDm-500K.stream/playlist.m3u8&&jsoncallback=?';
   
    $b = json_decode(http_curl($a,'www.tsytv.com.cn','text/html; charset=utf-8','text/javascript, application/javascript, application/ecmascript, application/x-ecmascript, */*; q=0.01','http://www.tsytv.com.cn/tsy/sp/zb/index.shtml'),true);
   
    //获取javascriptcallback 中的data 数据，即streamingtokenstarttime streamingtokenendtime  streamingtokencustom streamingtokenhash
    $urls = parse_url($b['data']);
    //通过构建以下地址，获取m3u8文件，注意在ck中赋值于a时，一定要用encodeURIComponent进行编码，
    //知识点，请百度encodeURIComponent和encodeURI的区别
    $true_url ="http://tv03.tsytv.com.cn/liveho/HunanHDm-500K.stream/chunklist.m3u8?".$urls['query'];
   

    ?>

<html>
	<head>
	<title>乐视直播网-湖南卫视在线直播-湖南卫视</title>
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
jwplayer("myElement").setup({playlist:[{file:'<?php echo($true_url);?>',provider:'HLSProvider6.swf',type:'mp4',title:'乐视直播网'}],flashplayer:'jwplayer.swf',skin:'skins/vapor.xml',width:'100%',height:'100%',primary:"flash",autostart:true});
 }
 </script>
	</body>
	</html>