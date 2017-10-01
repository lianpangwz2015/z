<?

include 'list.php';
$pindao=urldecode($_GET['pindao']);
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
$zhengze='/<.*?>(.*?'.$_GET['key'].'.*?)#(.*?)#(.*?)<.*?>/';
}else{
$zhengze='/<'.$_GET['id'].'>(.*?)#(.*?)#(.*?)<'.$_GET['id'].'>/';
}

preg_match_all($zhengze,$list,$f);
$pindao=$f[1][1];
$zb=$f[3][1].'&pindao='.$pindao;
foreach($f[3] as $r=>$z){
$div='<div class="ing"  onMouseOver="divHover(';
$div1="'".$r."')";
$div2='" onMouseOut="divLink(';
$div3="'".$r."')";
$div4='" id="d_'.$r.'"><a href="'.$f[3][$r].'&pindao='.$pindao.'" target="c_play" >'.$f[2][$r].'</a></div>';

$liebiao .=$div.$div1.$div2.$div3.$div4;
  }

?>
<html>
<head>

<title><?  echo $pindao;?>-乐视直播网</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?  echo $pindao;?>直播,<?  echo $pindao;?>在线直播" />
<meta name="description" content="乐视直播网为您提供<?  echo $pindao;?>直播" />
<script type="text/javascript" >
//var url = location.search;
var url = document.referrer.substring(0, document.referrer.lastIndexOf('/'));
var arydomain = new Array(
"http://api.letvlive.com",
"http://henan.letvlive.com",
"http://hunan.letvlive.com",
"http://shandong.letvlive.com",
"http://sichuan.letvlive.com",
"http://yunnan.letvlive.com",
"http://dongfang.letvlive.com",
"http://heilongjiang.letvlive.com",
"http://jiangxi.letvlive.com",
"http://liaoning.letvlive.com",
"http://btv.letvlive.com",
"http://tianjin.letvlive.com",
"http://anhui.letvlive.com",
"http://zhejiang.letvlive.com",
"http://guangdong.letvlive.com",
"http://chongqing.letvlive.com",
"http://dongnan.letvlive.com",
"http://guizhou.letvlive.com",
"http://hebei.letvlive.com",
"http://guangxi.letvlive.com",
"http://shanxi1.letvlive.com",
"http://shanxi2.letvlive.com",
"http://neimenggu.letvlive.com",
"http://ningxia.letvlive.com",
"http://xizang.letvlive.com",
"http://xinjiang.letvlive.com",
"http://gansu.letvlive.com",
"http://hubei.letvlive.com",
"http://www.letvlive.com",
"http://www.flvbox.net",
"http://cctv1.letvlive.com",
"http://cctv2.letvlive.com",
"http://cctv3.letvlive.com",
"http://cctv4.letvlive.com",
"http://cctv5.letvlive.com",
"http://cctv6.letvlive.com",
"http://cctv7.letvlive.com",
"http://cctv8.letvlive.com",
"http://cctv9.letvlive.com",
"http://cctv10.letvlive.com",
"http://cctv11.letvlive.com",
"http://cctv12.letvlive.com",
"http://cctv13.letvlive.com",
"http://cctv14.letvlive.com",
"http://live.jstv.com.letvlive.com"
	);
var b=false;
for(var i=0;i<arydomain.length;i++ ){
	if(url==arydomain[i]){
		b=true;
	}
}

</script> 
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

#c_list {width:130px;background:#000000 url(images/list.png);}
#c_list div{margin:0px auto 0px 3px; text-indent:22px; display:block; cursor:default; font:12px arial; color:#666666; width:120px;height:20px; line-height:20px; overflow: hidden; background:url(images/lha.gif) no-repeat 0px 0px;}
#c_list div.ing {color:#FFFFFF; background:url(images/lha.gif) no-repeat 0px -40px;}
#lbottom {position:absolute;bottom:2px;left:0px;}
-->
</style>
<script language="JavaScript"> 
//if(top==self){window.location="/tv/"}
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


</head>
<body oncontextmenu=window.event.returnValue=false; >
<div id="welcome"></div>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0"><tr id="jiemu"><td height="21" nowrap background="images/bj.gif" ><div id="lg"><a href="javascript:;" onClick="yime()" title="隐藏此信息栏" hidefocus="true"></a></div><div id="jm"><? global $pindao; echo $pindao;?><img src="images/e.gif" width="26" height="21" border="0" align="absmiddle"></div>
<div id="qh"></div>
<td></tr>
<tr><td width="100%"><div id="player" style="display:block;background-color: #000000;height:100%;">

<div id="lbottom"></div>
<table width="100%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td id="c_list" valign="top">
<? global $liebiao; echo $liebiao;?>
<a href="<? global $siteurl; echo $siteurl; ?>"><img src="images/logo.png"  alt= "<? global $weiyc; echo $weiyc;?>" width="123" height="25" border="0"></a>
</td>
<td>

  <script language="JavaScript"> document.writeln("<iframe id=\"c_play\" name=\"c_play\" src=\"<? global $zb; echo $zb;?>\"  width=\"100%\" height=\"479\" scrolling=\"auto\" frameborder=\"0\" border=\"0\" allowtransparency=\"true\"></iframe>");</script>
</td>
</tr>
</table>
</div></td></tr></table>

   
 
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