
 <?php
    /*
        Ⱥ��Ϣ:ZM��Ƶ���� 574281554
        ���ߣ���ī QQ��2319927093

        ��ɽ-��������ֱ������

        ���ؾ��棺
        1��Դ�����ѧϰ����ʹ�á�
        2����ֹ����Σ���ٷ��������Ϊ��
        3����ֹ����Υ�����ɷ������Ϊ��
        4�������޷���ѧϰ�����û���Ȩ����Ϣ�����������ѧϰ�����������ַ��˹ٷ��ĺϷ���������Υ����Ϊ��������ɾ����ѧϰ����������ѭ��ط��ɡ�
        5��ѧϰ�����û� Ӧ����֤����ѧϰ���������в�Ӧ�����κ�Υ����Ϊ������֤�е����⳥�й�Υ����Ϊ��ɵ��κ���ʧ��
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

    //php��������
    header("Content-type: text/html; charset=utf-8");
    header('Access-Control-Allow-Origin:http://www.tsytv.com.cn');
    header('Access-Control-Allow-Credentials:true');
    header('Access-Control-Allow-Methods:GET, POST, OPTIONS');

    //��ȡ��̬���ɵ�javascript��ǩ��ͨ��javascript callback����ʽʵ�����ݶ�ȡ��
    //֪ʶ�㣺��ٶ�jsoncallback ����
    $a='http://www.tsytv.com.cn/api/pc/videosecret/?StreamingUrl=http://tv03.tsytv.com.cn/liveho/HunanHDm-500K.stream/playlist.m3u8&&jsoncallback=?';
   
    $b = json_decode(http_curl($a,'www.tsytv.com.cn','text/html; charset=utf-8','text/javascript, application/javascript, application/ecmascript, application/x-ecmascript, */*; q=0.01','http://www.tsytv.com.cn/tsy/sp/zb/index.shtml'),true);
   
    //��ȡjavascriptcallback �е�data ���ݣ���streamingtokenstarttime streamingtokenendtime  streamingtokencustom streamingtokenhash
    $urls = parse_url($b['data']);
    //ͨ���������µ�ַ����ȡm3u8�ļ���ע����ck�и�ֵ��aʱ��һ��Ҫ��encodeURIComponent���б��룬
    //֪ʶ�㣬��ٶ�encodeURIComponent��encodeURI������
    $true_url ="http://tv03.tsytv.com.cn/liveho/HunanHDm-500K.stream/chunklist.m3u8?".$urls['query'];
   

    ?>

<html>
	<head>
	<title>����ֱ����-������������ֱ��-��������</title>
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
jwplayer("myElement").setup({playlist:[{file:'<?php echo($true_url);?>',provider:'HLSProvider6.swf',type:'mp4',title:'����ֱ����'}],flashplayer:'jwplayer.swf',skin:'skins/vapor.xml',width:'100%',height:'100%',primary:"flash",autostart:true});
 }
 </script>
	</body>
	</html>