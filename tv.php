<?php
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
include 'config.php';
include 'list2.php';
include 'list.php';
global $list;
$str = 'pangwz2016';  
$key = 'www.letvlive.comletvlive';  
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

if($_GET['key']){
$zhengze='/<.*?>(.*?'.$_GET['key'].'.*?)#(.*?)#(.*?)<(.*?)>/';
}else{
$zhengze='/<'.$_GET['id'].'>(.*?)#(.*?)#(.*?)<('.$_GET['id'].')>/';

}

preg_match_all($zhengze,$list,$f);
$pindao=$f[1][1];
$lid=$f[4][1];
$zb=$f[3][1].'&pindao='.urlencode($pindao);
foreach($f[3] as $r=>$z){
$div='<div class="ing"  onMouseOver="divHover(';
$div1="'".$r."')";
$div2='" onMouseOut="divLink(';
$div3="'".$r."')";
$div4='" id="d_'.$r.'"><a href="'.$f[3][$r].'&pindao='.urlencode($pindao).'" target="c_play"  >'.$f[2][$r].'</a></div>';

$liebiao .=$div.$div1.$div2.$div3.$div4;
  }
  
 
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
$lrc= $t[0][$k];
$epg.=$v.' '.$lrc.'<br>';
}

?>
<html>
<head>

<title><? global $pindao; echo $pindao;?>直播-<? global $pindao; echo $pindao;?>在线直播-<? global $title; echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<? global $pindao; echo $pindao;?>直播,<? global $pindao; echo $pindao;?>在线直播" />
<meta name="description" content="<? global $description; echo $description;?>" />
<link type="text/css" rel="stylesheet" media="all" href="css/video.css" />
<style type="text/css">
<!--
body {overflow:hidden;font-size: 12px;margin: 0;background-color: #000000; }
body, td, th {font-size: 12px;color: #999999;}
a {outline: none;}
a:link {color: #CCCCCC;text-decoration: none;}
a:visited {color: #999999;text-decoration: none;}
a:hover {color: #CCCCCC;text-decoration: none;}
a:active {color: #CCCCCC;text-decoration: none;}
.full {z-index:3;font-size:12px;color:#ffffff;background:#000000;position:absolute;bottom:3px;right:0px;padding:0 10px;}
#lg a {width:23px;height:21px;float:left;display:inline;background:url(images/g2.gif) no-repeat left top;margin:0px 4px 0px 0px;padding:0px;text-decoration:none;}
#lg a:hover {background-position:-23px 0;text-decoration: none;}
#jm {float:left;display:inline; height:21px; line-height:21px;}
#qh a {float:right;display:inline;display:block;width:100px;height:21px;color:#999;line-height:20px;text-decoration:none;text-align:center;background:url(images/qh.gif) no-repeat 0 0;}
#qh a.qh,#qh a:hover {color:#fff;background:url(images/qh.gif) no-repeat 0 -21px;}
#player {width:100%; height:100%;}
#cover {width:100%; height:100%;z-index:2;position:absolute;background:url(images/load.gif) no-repeat center center;}
#start_score {position:absolute;float:right;z-index:2;top:30px;right:5px;height:25px;line-height:25px;background:#000000;font-weight:bold;font-size:14px;font-family: Verdana, Arial, Helvetica, sans-serif;cursor:default;filter:alpha(opacity=50);opacity:0.5;-moz-opacity:0.5;}
#start_score p {position:relative;color:#FFFFFF;}
.zhibopubicbox{width:960px;margin-bottom:10px;overflow:hidden;border: 1px solid #999999;_height:1%;margin-top:2px;}
.zhibotitle{height:42px; no-repeat;margin-top:2px;margin-right:5px;margin-bottom:3px;margin-left:5px;padding-left:0px;}
.zhibowxts{background-color:#F5F5F5;color:#888;height:560px;width:auto;margin-top:0px;margin-right:5px;margin-bottom:0px;margin-left:0px;position:relative;}
.zhibowxtb{background-color:#FFFFFF;color:#888;height:300px;width:auto;margin-top:0px;margin-right:5px;margin-bottom:0px;margin-left:5px;position:relative;}
.zhiboplaybox{width:960px;padding-top:0px;padding-bottom:5px;clear:both;}
.zhibowxts .bqy{width:960px;height:90px;border:1px solid #ccc;float:left;padding-left:0px;}
.zhibowxts .snvtva{width:695px;height:500px;margin:2px 0px 0px 0px;border:1px solid #ccc;float:left;}
.zhibowxts .snvtvb{margin:2px 0px 0px 2px;border:1px solid #ccc;width:250px;float:right;padding-left:2px;}
.zhibowxtb .lrca{width:340px;height:300px;margin:2px 0px 0px 0px;border:1px solid #ccc;float:left;}
.zhibowxtb .lrcb{margin:2px 0px 0px 2px;border:1px solid #ccc;width:600px;float:right;padding-left:2px;}
.play_list{float:left;}
.zhibotitle div.txtt{float:right;padding-right:10px;font-size:12px;padding-top:4px;_padding-top:5px;}
.zhibotitle div.txtt a{display:block; no-repeat 0px -5px;padding-left:24px;line-height:25px;font-family:'宋体';white-space:nowrap;}
.zhibotitle div.txt a:hover{background-position:0px -38px}
.yuansheng{width:964px;height:300px;border:0px solid #ccc;float:left;padding-left:20px;}
.wxts{margin:2px 5px 0px 5px;border:1px dashed #ccc;background-color:#f0f0f0;padding:10px;text-align:left;color:#888;}
.wxts .snvtvb{padding:0px 0px 10px 0px;border-bottom:1px dashed #ccc;}
.wxts .snvtvs{padding:8px 0px 2px 0px;}
.wxts .snvd{color:#f45d80;}
.wxts a.playdown_btn{display:inline;clear:both;border:none;width:auto;margin:0px;padding:0px;line-height:12px;float:none;color:#f45d80;}
.wxts a.playdown_btn:hover{background-color:transparent;color:#333;border:none;}
*{padding:0;margin:0}
#c_list {width:130px;background:#000000 url(images/list.png);}
#c_list div{margin:0px auto 0px 3px; text-indent:22px; display:block; cursor:default; font:12px arial; color:#666666; width:120px;height:20px; line-height:20px; overflow: hidden; background:url(images/lha.gif) no-repeat 0px 0px;}
#c_list div.ing {color:#FFFFFF; background:url(images/lha.gif) no-repeat 0px -40px;}
#lbottom {position:absolute;bottom:2px;left:0px;}
.snvtvb a.zhibo{color:#000000}
.style1 {text-align:left;color: #000000;height:250px;overflow:auto}
-->
</style>
<script language="JavaScript"> 

function yime(){
	document.getElementById("jiemu").style.display="none";
}
function play(pid,sid){
	window.location = '?pid='+pid+'&sid='+sid+'';
}
function $id(sid){
	return document.getElementById(sid);
}
</script>
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
<script type="text/javascript" src="js/letvlive.js"></script> 
</head>
<body oncontextmenu=window.event.returnValue=false; >
<div id="welcome"></div>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0"><tr id="jiemu"><td height="21" nowrap background="images/bj.gif" ><div id="lg"><a href="javascript:;" onClick="yime()" title="隐藏此信息栏" hidefocus="true"></a></div><div id="jm"><? global $pindao; echo $pindao;?><img src="images/e.gif" width="26" height="21" border="0" align="absmiddle"></div>
<div id="qh"></div>
<td></tr>
<tr><td width="100%" bgcolor="#000000"><div id="player" style="display:block;background-color: #000000;height:100%;overflow:scroll;SCROLLBAR-FACE-COLOR: #444; SCROLLBAR-HIGHliGHT-COLOR: #999; SCROLLBAR-SHADOW-COLOR: #222; SCROLLBAR-3DliGHT-COLOR: #000; SCROLLBAR-ARROW-COLOR: #ccc; SCROLLBAR-TRACK-COLOR: #666; SCROLLBAR-DARKSHADOW-COLOR: #111;">

<div id="lbottom"></div>
<table width="100%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
<tr>
<td id="c_list" valign="top">
<? global $liebiao; echo $liebiao;?>
<a href="<? global $siteurl; echo $siteurl; ?>"><img src="images/logo.png"  alt= "<? global $weiyc; echo $weiyc;?>" width="123" height="25" border="0"></a>
</td>
<td>
 <div class="zhibopubicbox" >
  <div class="zhiboplaybox">
  
    <div class="zhibowxts">
       <div class="bqy">
<script type="text/javascript">
    /*960*90 创建于 banner*/
    var cpro_id = "u2602417";
</script>
<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
       </div>
	  
	  <div class="snvtva">
	  <script language="JavaScript"> document.writeln("<iframe id=\"c_play\" name=\"c_play\" src=\"<? global $zb; echo $zb;?>\"  width=\"100%\" height=\"100%\" scrolling=\"auto\" frameborder=\"0\" border=\"0\" allowtransparency=\"true\"></iframe>");</script>

     </div>
	  
      <div class="snvtvb">
	
	  <script type="text/javascript">
	  var cpro_id = "u2729071";
	  </script>
	  <script src="http://cpro.baidustatic.com/cpro/ui/c.js"></script>
	   <div class="lrca style1"><? echo $epg;?></div>
	  </div>
    </div>

  </div>

</div>


<div class="zhibopubicbox" >
<!--VIDEO LIST-->
<div class="video_list clearfix">
<div class="plist">
    <a href="<?echo $playurl1;?>" target="_blank" name="<? echo $title1;?>"><img class="listpic" src="<? echo $img1;?>" alt="<?echo $title1;?>"  width="200"  height="138" ><span class="v_bq_hong"><? echo ($le1);?></span><span class="v_bg"></span><span class="v_bq_vico"></span></a>
    <h2><?echo $title1;?></h2>
    
</div>

<div class="plist">
    <a href="<?echo $playurl2;?>" target="_blank" name="<? echo $title2;?>"><img class="listpic" src="<? echo $img2;?>" alt="<? echo $title2;?>"  width="200"  height="138" ><span class="v_bq_lan"><? echo ($le2);?></span><span class="v_bg"></span><span class="v_bq_vico"></span></a>
    <h2><? echo $title2;?></h2>
   
</div>

<div class="plist">
    <a href="<?echo $playurl3;?>" target="_blank" name="<? echo $title3;?>"><img class="listpic" src="<? echo $img3;?>" alt="<? echo $title3;?>"  width="200"  height="138" ><span class="v_bq_hong"><? echo ($le3);?></span><span class="v_bg"></span><span class="v_bq_vico"></span></a>
    <h2><? echo $title3;?></h2>
    
</div>

<div class="plist">
    <a href="<?echo $playurl4;?>" target="_blank" name="<? echo $title4;?>"><img class="listpic" src="<? echo $img4;?>" alt="<? echo $title4;?>"  width="200"  height="138" ><span class="v_bq_lan"><? echo ($le4);?></span><span class="v_bg"></span><span class="v_bq_vico"></span></a>
    <h2><? echo $title4;?></h2>
   
</div>



<div class="plist">
    <a href="<?echo $playurl5;?>" target="_blank" name="<? echo $title5;?>"><img class="listpic" src="<? echo $img5;?>" alt="<? echo $title5;?>"  width="200"  height="138" ><span class="v_bq_hong"><? echo ($le5);?></span><span class="v_bg"></span><span class="v_bq_vico"></span></a>
    <h2><? echo $title5;?></h2>
   
</div>

<div class="plist">
    <a href="<?echo $playurl6;?>" target="_blank" name="<? echo $title6;?>"><img class="listpic" src="<? echo $img6;?>" alt="<? echo $title6;?>"  width="200"  height="138" ><span class="v_bq_lan"><? echo ($le6);?></span><span class="v_bg"></span><span class="v_bq_vico"></span></a>
    <h2><? echo $title6;?></h2>
   
</div>

<div class="plist">
    <a href="<?echo $playurl7;?>" target="_blank" name="<? echo $title7;?>"><img class="listpic" src="<? echo $img7;?>" alt="<? echo $title7;?>"  width="200"  height="138" ><span class="v_bq_hong"><? echo ($le7);?></span><span class="v_bg"></span><span class="v_bq_vico"></span></a>
    <h2><? echo $title7;?></h2>
  
</div>
<div class="plist">
    <a href="<?echo $playurl8;?>" target="_blank" name="<? echo $title8;?>"><img class="listpic" src="<? echo $img8;?>" alt="<? echo $title8;?>"  width="200"  height="138" ><span class="v_bq_lan"><? echo ($le8);?></span><span class="v_bg"></span><span class="v_bq_vico"></span></a>
    <h2><? echo $title8;?></h2>
   
</div>
</div>  
</div>
<!-- help/End -->
 <!--VIDEO LIST-->






</td></tr></table>

   
 
<script language="javascript">
var crrPl = 1;
function divHover(id){
	var h = document.getElementById('d_'+id);
	if(crrPl != id){
		h.style.background = 'url(images/lha.gif) no-repeat 0px -20px';
	}
}
function divLink(id){
	var l = document.getElementById('d_'+id);
	if(crrPl != id){
		l.style.background = 'url(images/lha.gif) no-repeat 0px 0px';
	}
}
</script>

</body>
</html>
<?
include 'end.php';
?>