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
	<title>����ֱ����-������������ֱ��-��������</title>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
	<script type="text/javascript" src="/js/letvlive.js"></script> 
<meta name="Keywords" content="<? global $lid; echo $lid;?>������ֱ����,��������̨,����̨,����ֱ��,������������ֱ��" />
<meta name="description" content="����ֱ��������һ��ǧ����ϲ��������ֱ��ֱ����Ŀ����ȫ�µ��Ӿ�Ϊ��������������ԭ���Ͷ�����Ƶֱ�����ݣ��߶˵ķ��ʺͻ������̼�����Ů����PK�����е�ʱ�н�˵��������Ŀһ��." />
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
	<div id="myElement">���ڼ���</div>
	<script type="text/javascript">
	var isiPad = navigator.userAgent.match(/iPad|iPhone|Android|Linux|iPod/i) != null;
	if(isiPad){
		document.getElementById('myElement').innerHTML = '<video src="<? global $url; echo $url;?>" controls="controls" autoplay="autoplay" width="100%" height="100%"></video>';
	}else{
jwplayer("myElement").setup({playlist:[{file:'<? global $url; echo $url;?>',provider:'HLSProvider6.swf',type:'mp4',title:'����ֱ����'}],flashplayer:'jwplayer.swf',skin:'skins/vapor.xml',width:'100%',height:'100%',primary:"flash",autostart:true});
}
</script>
	</body>
	</html>