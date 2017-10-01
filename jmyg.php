<?
include 'config.php';
$lid=$_GET['id'];
$list='<cctv-1>cctv1#CCTV-1<cctv-1>
<cctv-2>cctv2#CCTV-2<cctv-2>
<cctv-3>cctv3#CCTV-3<cctv-3>
<cctv-4>cctv4#CCTV-4asia<cctv-4>
<cctv-5>cctv5#CCTV-5<cctv-5>
<cctv-6>cctv6#CCTV-6<cctv-6>
<cctv-7>cctv7#CCTV-7<cctv-7>
<cctv-8>cctv8#CCTV-8<cctv-8>
<cctv-9>cctv9#CCTV-9<cctv-9>
<cctv-10>cctv10#CCTV-10<cctv-10>
<cctv-11>cctv11#CCTV-11<cctv-11>
<cctv-12>cctv12#CCTV-12<cctv-12>
<cctv-13>cctv13#CCTV-13<cctv-13>
<cctv-14>cctv14#CCTV-14<cctv-14>
<cctv-15>cctv15#CCTV-15<cctv-15>
<cctv5plus>cctv52#CCTV5+<cctv5plus>
<hunan>hunan#HNTV-1<hunan>
<jiangsu>jiangsu#JSTV-1<jiangsu>
<zhejiang>zhejiang#ZJTV-1<zhejiang>
<dongfang>dongfang#SMG<dongfang>
<anhui>anhui#AHTV-1<anhui>
<btv1>btv1#BTV-1<btv1>
<shandong>shandong#SDTV-1<shandong>
<tianjin>tianjin#TJTV-1<tianjin>
<liaoning>liaoning#LNTV-1<liaoning>
<jiangxi>jiangxi#JXTV-1<jiangxi>
<heilongjiang>heilongjiang#HLJTV-1<heilongjiang>
<yunnan>yunnan#YNTV-1<yunnan>
<sichuan>sichuan#SCTV-1<sichuan>
<henan>henan#HENANTV-1<henan>
<guangdong>guangdong#GDTV-1<guangdong>
<nanfang>nanfang#NFWS<nanfang>
<shenzhenweishi>shenzhenweishi#SHENZHENTV-1<shenzhenweishi>
<hubei>hubei#HBTV-1<hubei>
<dongnan>dongnan#DNWS<dongnan>
<chongqing>chongqing#CQTV-1<chongqing>
<guizhou>guizhou#GZTV-1<guizhou>
<hebei>hebei#HEBTV-1<hebei>
<jilin>jilin#JLTV-1<jilin>
<guangxi>guangxi#GXTV--1<guangxi>
<qinghai>qinghai#QHTV-1<qinghai>
<shanxi1>shanxi1#SHANXITV-1<shanxi1>
<shanxi2>shanxi2#SXTV-1<shanxi2>
<neimenggu>neimenggu#NMGTV-1<neimenggu>
<ningxia>ningxia#NXTV-1<ningxia>
<xizang>xizang#XZTV-1<xizang>
<xinjiang>xinjiang#XJTV-1<xinjiang>
<gansu>gansu#GSTV-1<gansu>
<lvyou>lvyou#lyws<lvyou>
<hxws>hxws#HXWS<hxws>
<xmws>xmws#XIAMENTV-1<xmws>
<btws>btws#BTZX-1<btws>
';
preg_match ( '/<.*?>'.$lid.'#(.*?)<.*?>/', $list, $key );
$url=g_contents("https://m.tvsou.com/epg/".$key[1]);
preg_match_all( '#<span class="start">(.*?)<\/span>#', $url, $r);
preg_match_all( '#<span class="name">(.*?)<\/span>#', $url, $t);
foreach($r[0] as $k=>$v){
$lrc=$t[0][$k];
$liebiao.=$v.' '.$lrc.'<br>';
}
function g_contents($url) {
       $ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_HEADER, false); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.1 Safari/537.11'); 
$res = curl_exec($ch); 
$rescode = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
curl_close($ch) ; 
return $res;
}
include 'list.php';
global $list;
$zhengze='/<'.$_GET['id'].'>(.*?)#(.*?)#(.*?)<'.$_GET['id'].'>/';
preg_match_all($zhengze,$list,$f);
$pindao=$f[1][1];
?>

<html>
<head>
<title><?global $pindao; echo $pindao;?>节目预告-<? global $title; echo $title; ?></title>
<style type="text/css">
body {overflow:hidden;font-size: 25px;margin: 0px;background-color: #ffffff;}
.style1 {font-size: larger}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?global $pindao; echo $pindao;?>节目预告" />
<meta name="description" content="乐视直播网，为您提供<?global $pindao; echo $pindao;?>节目预告" />


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
<table width="100%" border="0">
  <tr>
    <td > <div class="lrca style1"><? echo $liebiao;?></div></td>
    <td>&nbsp;<script type="text/javascript">
    /*360*300 创建于 2016-01-16*/
    var cpro_id = "u2494914";
</script>
<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
  </tr>
  <tr>
    <td colspan="2">&nbsp;<br><br>
      <span class="style1">所有节目预告均取自于互联网，如果没有节目预告，那可能是程序没有获取到。给您带来的不便，表示深表歉意！</span></td>
  </tr>
</table>




</body>
</html>
