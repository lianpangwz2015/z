<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?phpphp
include 'list2.php';
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
$url=file_get_contents("https://m.tvsou.com/epg/".$key[1]);
preg_match_all( '#<span class="start">(.*?)<\/span>#', $url, $r);
preg_match_all( '#<span class="name">(.*?)<\/span>#', $url, $t);
foreach($r[0] as $k=>$v){
$lrc=$t[0][$k];
$epg.=$v.' '.$lrc.'<br>';
}

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
$zhengze='/<.*?>(.*?'.$_GET['key'].'.*?)#(.*?)#(.*?)<.*?>/';
}else{
$zhengze='/<'.$_GET['id'].'>(.*?)#(.*?)#(.*?)<'.$_GET['id'].'>/';
}

preg_match_all($zhengze,$list,$f);
$pindao=$f[1][1];
$zb=$f[3][1].'&pindao='.urlencode($pindao);

foreach($f[3] as $r=>$z){

$div4='<a href="'.$f[3][$r].'&pindao='.urlencode($pindao).'" target="c_play"  >'.$f[2][$r].'</a>&nbsp;';

$lie .=$div4;
  }
  $liebiao ='<div class="mlt">'.$lie .'</div>';
?>
<head>

<title><?php global $pindao; echo $pindao;?>直播-<?php global $pindao; echo $pindao;?>在线直播-<?php global $title; echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php global $pindao; echo $pindao;?>直播,<?php global $pindao; echo $pindao;?>在线直播" />
<meta name="description" content="乐视直播网,为您提供<?php global $pindao; echo $pindao;?>直播服务。" />

<link type="text/css" rel="stylesheet" media="all" href="css/video.css" />
<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
	background-repeat: no-repeat;
	font-size: 12px;
	color: #A4A5A3;
	margin:0 auto;
}


div{margin:0 auto}

.topbg{
	width:1180px;
	height:33px;
	
}
.topnav{
    
	width:1180px;
	height:33px;
	line-height:33px;
	padding: 0;
	text-align: left;
	
}
.topnav .l{float:left;color:#999}
.topnav .m{float:left;color:#999}
.topnav .r{float:right;color:#DDD}
.topnav .r a{color:#666;cursor:pointer}
.topnav .r a:hover{color:#390}
.topban {
	height: 100px;
	width: 1180px;

}
.topban .banr {
	float: right;
}

.topban .logo {
	float: left;
	padding-top: 5px;
	padding-right: 100px;
	padding-bottom: 5px;
	padding-left: 5px;
}
.topban .heng {
	padding-top: 10px;
}
.menu {
   
	width: 1180px;
	height: 32px;
	background-color: #666666;
	text-indent: 15px;
	color: #A4A5A3;
    background:url(/images/navbg.gif) repeat 0 0;
}

.menu .link {
	padding-top: 10px;
	padding-right: 0px;
	padding-bottom: 0px;
	padding-left: 0px;
}
.menu .link .red {
	color: #fff;
        letter-spacing: 2px;
}

.footer {
	color: #A4A5A3;
	padding-top: 10px;
	padding-bottom: 10px;
    text-align: center;
	border-top-width: 1px;
	border-top-style: solid;
	border-top-color: #E1E3E0;
}
.footer a{color:#666;cursor:pointer}
.footer a:hover{color:#390}

.innerbox{
width: 1180px;

padding-left:2px;
	border: 1px solid #999999;
	
}


body{overflow-x: auto;overflow-y: auto;}
* {padding:0;margin:0; font-size:12px;font-family: Verdana, Arial, Helvetica, sans-serif;}

body,td,th { font-family: Verdana, Arial, Helvetica, sans-serif; color: #FFFFFF; }
h1{display:none;}
img{border:none;}
ul{padding:0;margin:0;list-style-type:none;}
a {outline: none;}
/* 直播频道列表导航菜单 */ 
#menu {width:188px; margin-left:2px;}
#menu li {list-style-type:none; display:block; width:188px; min-height:23px; line-height:23px; background:url(images/menu_listbk.gif)  no-repeat;}
#menu li.sc {background:url(images/menu_listbk2.gif)  no-repeat;}
#menu li a { display:block; text-decoration:none;  width:100%;  padding:1px 3px 0 3px; height:23px; line-height:23px; }
#menu li a:hover span {cursor:hand;}
#menu li a.list_name{ float:left;display:block; width:100%; padding-left:18px;height:21px; line-height:21px;}
#menu li a.list_play{ float:left;display:block; width:32px; height:21px; line-height:21px;color:#888;  }
#menu h1 { display:block;font-size:12px;height:24px;line-height:24px; font-weight:normal; margin-top:1px;}
#menu span {margin:0 10px;line-height:30px;color:#ccc}

#menu h1.lm_1{display:block; width:188px; color:#333;text-align:left; padding-left:5px;height:21px;line-height:21px; }
#menu h2.lm_2{display:block; width:188px; color:#333; text-align: left;font-size:12px;font-weight:normal;text-decoration:none; margin-top:3px}
#menu h2.lm_2 a{display: block; BACKGROUND: url(images/tv.gif) #363636 no-repeat 23px 3px; MARGIN-BOTTOM: 1px; WIDTH: 100%; COLOR: #d7d7d7; TEXT-INDENT: 25px; HEIGHT: 25px; LINE-HEIGHT: 25px; BORDER-BOTTOM: #333333 1px solid; HEIGHT: 25px; TEXT-DECORATION: none;padding-left:10px}
#menu h2.lm_2 a:active{BACKGROUND: url(images/tv.gif) #555555 no-repeat 23px 3px; color:#ffffff;}

#menu h1 a{color:#ccc;}
#menu h1 a:hover{color:#ff6600;}
#menu li img{ float:left;display: block;} #menu li.end{border-bottom-width:1px; }

.mlt {background-image:url(images/bj.gif);COLOR: #ff6600;TEXT-INDENT: 5px; padding-top:0px; HEIGHT: 22px; LINE-HEIGHT: 22px;TEXT-ALIGN: center;}
.mlt a{COLOR: #ff6600;text-decoration: none;}
.mlt a:active{COLOR: #ff6600;text-decoration: none;}
a {color: #fff;text-decoration: none;text-align: center;}
a:hover {color:#FFFFFF;text-decoration: none;}
.close {MARGIN: 0px}
.close a {BACKGROUND: url(images/c.gif) no-repeat;BORDER-TOP-WIDTH: 0px; BACKGROUND-POSITION: 0px 0px; DISPLAY: block; BORDER-LEFT-WIDTH: 0px; FLOAT: right; BORDER-BOTTOM-WIDTH: 0px; WIDTH: 9px; LINE-HEIGHT: 58px; HEIGHT: 58px; TEXT-ALIGN: center; BORDER-RIGHT-WIDTH: 0px}
.close a:hover {BACKGROUND-POSITION: -9px 0px;TEXT-DECORATION: none}
.open {MARGIN: 0px}
.open a {BACKGROUND: url(images/o.gif) no-repeat;BORDER-TOP-WIDTH: 0px; BACKGROUND-POSITION: 0px 0px; DISPLAY: block; BORDER-LEFT-WIDTH: 0px; FLOAT: right; BORDER-BOTTOM-WIDTH: 0px; WIDTH: 9px; LINE-HEIGHT: 58px; HEIGHT: 58px; TEXT-ALIGN: center; BORDER-RIGHT-WIDTH: 0px}
.open a:hover {BACKGROUND-POSITION: -9px 0px;TEXT-DECORATION: none}
.style1 {text-align:left;color: #000000;height:300px;overflow:auto}
-->
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

<div class="topbg">
	<div class="topnav">
		<div class="l">您好，欢迎使用乐视直播导航！&nbsp;&nbsp;</div>

		<div class="r"><a href="http://www.letvlive.com">乐视直播</a> | <a href="javascript:window.external.AddFavorite('http://www.letvlive.com','乐视直播')">收藏本站</a> </div>
	</div>
</div>

<div class="topban">
      
      <div class="logo"><img alt="乐视直播网" src="images/logo5.jpg" /></div>
  
	   <div class="heng">
		<script type="text/javascript">
    /*830*80 创建于 2016-03-26*/
    var cpro_id = "u2576770";
</script>
<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
  </div>
		
   <div class="banr"></div>
</div>


<div  class="menu">

<div class="link">
 <div align="center"> <a href="index.php?id=channel_1_pc" target="_self" class="red">门户直播</a> 
|   <a href="yspd.php?id=cctv1" target="_self" class="red">央视频道</a>     
|   <a href="gnws.php?id=hunan" target="_self" class="red">国内卫视</a> 
|   <a href="typd.php?id=cctv5" target="_self" class="red">体育频道</a>
|   <a href="dfpd.php?id=jykt" target="_self" class="red">地方频道</a> 
|   <a href="gatpd.php?id=fhzw" target="_self" class="red">港澳台频道</a>
|   <a href="yxpd.php?id=yxfy" target="_self" class="red">游戏频道</a>
|   <a href="srpd.php?id=jykt" target="_self" class="red">少儿频道</a>| 
      
 
      

      
 
      
</div>
</div>

</div>




<br>
 <!--导航END-->







<div class="innerbox"><table width="100%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td> <div class="zhibopubicbox" >
  <div class="zhiboplaybox">
  
    <div class="zhibowxts">
       <div class="bqy">
<script src="/ad/banner.js"></script>
       </div>
	  
	  <div class="snvtva"><?phpphp
  echo $liebiao;
  ?>
  <script language="JavaScript"> document.writeln("<iframe id=\"c_play\" name=\"c_play\" src=\"<?php global $zb; echo $zb;?>\"  width=\"100%\" height=\"479\" scrolling=\"auto\" frameborder=\"0\" border=\"0\" allowtransparency=\"true\"></iframe>");</script>

		<div class="l"><div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_tieba" data-cmd="tieba" title="分享到百度贴吧"></a><a href="#" class="bds_ty" data-cmd="ty" title="分享到天涯社区"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣网"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["sqq","weixin","tieba","ty","tsina","qzone","tqq","renren","douban"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["sqq","weixin","tieba","ty","tsina","qzone","tqq","renren","douban"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script></div>
	 </div>
	  
      <div class="snvtvb">
	  <form name="searchform"action="tv.php"  target="_blank" style="height:22px; margin:0px; padding:0px; list-style:none;font-size:12px;">

      <input type="text" name="key" id="key" style="width:190px; height:16px; margin:0px; color:#000000;  border:1px #000000 solid" autocomplete="off"/>
	 <input type="submit" value="搜台"  style="width:45px; height:18px; " autocomplete="off"/>
  </form>
<script src="/ad/250.js"></script>
      </div>
	  
    </div>

  </div>

</div>








<div class="zhibopubicbox" >
<div class="zhiboplaybox">
    <div class="zhibowxtb">

 <div class="lrca style1"><?php echo $epg;?></div>
  
 <div class="lrcb"><div class="widget-box mb15">
   
    <div class="widget-hot clear">
      <ul>
	   
   <li><a href="<?php echo $playurl9;?>" target="_blank" title="<?php echo $title9;?>"><img src="<?php echo $img9;?>" width="130" height="90" alt="<?php echo $title9;?>" title="<?php echo $title9;?>"></a>
          <div class="txt"><a href="<?php echo $playurl9;?>" title="<?php echo $title9;?>"><?php echo $title9;?></a></div>
        </li>
            
	
  <li><a href="<?php echo $playurl10;?>" target="_blank" title="<?php echo $title10;?>"><img src="<?php echo $img10;?>" width="130" height="90" alt="<?php echo $title10;?>" title="<?php echo $title10;?>"></a>
          <div class="txt"><a href="<?php echo $playurl10;?>" title="<?php echo $title10;?>"><?php echo $title10;?></a></div>
        </li>
            
	
  <li><a href="<?php echo $playurl11;?>" target="_blank" title="<?php echo $title11;?>"><img src="<?php echo $img11;?>" width="130" height="90" alt="<?php echo $title11;?>" title="<?php echo $title11;?>"></a>
          <div class="txt"><a href="<?php echo $playurl11;?>" title="<?php echo $title11;?>"><?php echo $title11;?></a></div>
        </li>
            
	
  <li><a href="<?php echo $playurl12;?>" target="_blank" title="<?php echo $title12;?>"><img src="<?php echo $img12;?>" width="130" height="90" alt="<?php echo $title12;?>" title="<?php echo $title12;?>"></a>
          <div class="txt"><a href="<?php echo $playurl12;?>" title="<?php echo $title12;?>"><?php echo $title12;?></a></div>
        </li>
            
	
  <li><a href="<?php echo $playurl13;?>" target="_blank" title="<?php echo $title13;?>"><img src="<?php echo $img13;?>" width="130" height="90" alt="<?php echo $title13;?>" title="<?php echo $title13;?>"></a>
          <div class="txt"><a href="<?php echo $playurl13;?>" title="<?php echo $title13;?>"><?php echo $title13;?></a></div>
        </li>
            
	
  <li><a href="<?php echo $playurl14;?>" target="_blank" title="<?php echo $title14;?>"><img src="<?php echo $img14;?>" width="130" height="90" alt="<?php echo $title14;?>" title="<?php echo $title14;?>"></a>
          <div class="txt"><a href="<?php echo $playurl14;?>" title="<?php echo $title14;?>"><?php echo $title14;?></a></div>        </li>
		     
   <li><a href="<?php echo $playurl15;?>" target="_blank" title="<?php echo $title15;?>"><img src="<?php echo $img15;?>" width="130" height="90" alt="<?php echo $title15;?>" title="<?php echo $title15;?>"></a>
          <div class="txt"><a href="<?php echo $playurl15;?>" title="<?php echo $title15;?>"><?php echo $title15;?></a></div>
        </li>
            
	
  <li><a href="<?php echo $playurl16;?>" target="_blank" title="<?php echo $title16;?>"><img src="<?php echo $img16;?>" width="130" height="90" alt="<?php echo $title16;?>" title="<?php echo $title16;?>"></a>
          <div class="txt"><a href="<?php echo $playurl16;?>" title="<?php echo $title16;?>"><?php echo $title16;?></a></div>
        </li>
            
	
  <li><a href="<?php echo $playurl17;?>" target="_blank" title="<?php echo $title17;?>"><img src="<?php echo $img17;?>" width="130" height="90" alt="<?php echo $title17;?>" title="<?php echo $title17;?>"></a>
          <div class="txt"><a href="<?php echo $playurl17;?>" title="<?php echo $title17;?>"><?php echo $title17;?></a></div>
        </li>
            
	
  <li><a href="<?php echo $playurl18;?>" target="_blank" title="<?php echo $title18;?>"><img src="<?php echo $img18;?>" width="130" height="90" alt="<?php echo $title18;?>" title="<?php echo $title18;?>"></a>
          <div class="txt"><a href="<?php echo $playurl18;?>" title="<?php echo $title18;?>"><?php echo $title18;?></a></div>
        </li>
            
	
  <li><a href="<?php echo $playurl19;?>" target="_blank" title="<?php echo $title19;?>"><img src="<?php echo $img19;?>" width="130" height="90" alt="<?php echo $title19;?>" title="<?php echo $title19;?>"></a>
          <div class="txt"><a href="<?php echo $playurl19;?>" title="<?php echo $title19;?>"><?php echo $title19;?></a></div>
        </li>
            
	
  <li><a href="<?php echo $playurl20;?>" target="_blank" title="<?php echo $title20;?>"><img src="<?php echo $img20;?>" width="130" height="90" alt="<?php echo $title20;?>" title="<?php echo $title20;?>"></a>
          <div class="txt"><a href="<?php echo $playurl20;?>" title="<?php echo $title20;?>"><?php echo $title20;?></a></div>        </li>
            
      </ul>
    </div>
  </div></div>

</div>
 </div>
</div></td>
<td id="sh" width="9" bgcolor="#171a1d" style="cursor:hand" onClick="showsubmenu()"><span id="idFlag">
  <div class="close" id="sh"><a href="#" title="按此切换到精简模式"></a></div></span></td>
<td width="210" id="tv_list" bgcolor="#000000">
<div id="halist" style="display:block;background-color: #000000;height:100%;overflow:scroll;SCROLLBAR-FACE-COLOR: #444; SCROLLBAR-HIGHliGHT-COLOR: #999; SCROLLBAR-SHADOW-COLOR: #222; SCROLLBAR-3DliGHT-COLOR: #000; SCROLLBAR-ARROW-COLOR: #ccc; SCROLLBAR-TRACK-COLOR: #666; SCROLLBAR-DARKSHADOW-COLOR: #111;">
  <ul id="menu">
<li id="li_1">
  <h1 class="lm_1"><a href="javascript:OpenChanel(1);" class="list_name" hidefocus="true">卫视频道 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
  <h2 class="lm_2" id="CHT_1" style="display: none"><a href="gnws.php?id=hunan" target="_self" hidefocus="true" onMouseOver="ahover('hunan_1')" onMouseOut="alink('hunan_1')" id="hunan_1">湖南卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=jiangsu" target="_self" hidefocus="true" onMouseOver="ahover('jiangsu_1')" onMouseOut="alink('jiangsu_1')" id="jiangsu_1">江苏卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=zhejiang" target="_self" hidefocus="true" onMouseOver="ahover('zhejiang_1')" onMouseOut="alink('zhejiang_1')" id="zhejiang_1">浙江卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=anhui" target="_self" hidefocus="true" onMouseOver="ahover('anhui_1')" onMouseOut="alink('anhui_1')" id="anhui_1">安徽卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=btv1" target="_self" hidefocus="true" onMouseOver="ahover('beijing_1')" onMouseOut="alink('beijing_1')" id="beijing_1">北京卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=tianjin" target="_self" hidefocus="true" onMouseOver="ahover('tianjin_1')" onMouseOut="alink('tianjin_1')" id="tianjin_1">天津卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=liaoning" target="_self" hidefocus="true" onMouseOver="ahover('liaoning_1')" onMouseOut="alink('liaoning_1')" id="liaoning_1">辽宁卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=jiangxi" target="_self" hidefocus="true" onMouseOver="ahover('jiangxi_1')" onMouseOut="alink('jiangxi_1')" id="jiangxi_1">江西卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=heilongjiang" target="_self" hidefocus="true" onMouseOver="ahover('heilongjiang_1')" onMouseOut="alink('heilongjiang_1')" id="heilongjiang_1">黑龙江卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=shandong" target="_self" hidefocus="true" onMouseOver="ahover('shandong_1')" onMouseOut="alink('shandong_1')" id="shandong_1">山东卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=dongfang" target="_self" hidefocus="true" onMouseOver="ahover('dongfang_1')" onMouseOut="alink('dongfang_1')" id="dongfang_1">东方卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=yunnan" target="_self" hidefocus="true" onMouseOver="ahover('yunnan_1')" onMouseOut="alink('yunnan_1')" id="yunnan_1">云南卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=sichuan" target="_self" hidefocus="true" onMouseOver="ahover('sichuan_1')" onMouseOut="alink('sichuan_1')" id="sichuan_1">四川卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=henan" target="_self" hidefocus="true" onMouseOver="ahover('henan_1')" onMouseOut="alink('henan_1')" id="henan_1">河南卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=guangdong" target="_self" hidefocus="true" onMouseOver="ahover('guangdong_1')" onMouseOut="alink('guangdong_1')" id="guangdong_1">广东卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=nanfang" target="_self" hidefocus="true" onMouseOver="ahover('tvs2_1')" onMouseOut="alink('tvs2_1')" id="tvs2_1">南方卫视 <font style="color:#99cc00"></font></a><a href="gnws.php?id=shenzhenweishi" target="_self" hidefocus="true" onMouseOver="ahover('szws_1')" onMouseOut="alink('szws_1')" id="szws_1">深圳卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=hubei" target="_self" hidefocus="true" onMouseOver="ahover('hubei_1')" onMouseOut="alink('hubei_1')" id="hubei_1">湖北卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=dongnan" target="_self" hidefocus="true" onMouseOver="ahover('fujian_1')" onMouseOut="alink('fujian_1')" id="fujian_1">东南卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=chongqing" target="_self" hidefocus="true" onMouseOver="ahover('chongqing_1')" onMouseOut="alink('chongqing_1')" id="chongqing_1">重庆卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=guizhou" target="_self" hidefocus="true" onMouseOver="ahover('guizhou_1')" onMouseOut="alink('guizhou_1')" id="guizhou_1">贵州卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=hebei" target="_self" hidefocus="true" onMouseOver="ahover('hebei_1')" onMouseOut="alink('hebei_1')" id="hebei_1">河北卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=jilin" target="_self" hidefocus="true" onMouseOver="ahover('jilin_1')" onMouseOut="alink('jilin_1')" id="jilin_1">吉林卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=guangxi" target="_self" hidefocus="true" onMouseOver="ahover('guangxi_1')" onMouseOut="alink('guangxi_1')" id="guangxi_1">广西卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=qinghai" target="_self" hidefocus="true" onMouseOver="ahover('qinghai_1')" onMouseOut="alink('qinghai_1')" id="qinghai_1">青海卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=shanxi1" target="_self" hidefocus="true" onMouseOver="ahover('shanxi_1')" onMouseOut="alink('shanxi_1')" id="shanxi_1">山西卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=shanxi2" target="_self" hidefocus="true" onMouseOver="ahover('shanvxi_1')" onMouseOut="alink('shanvxi_1')" id="shanvxi_1">陕西卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=neimenggu" target="_self" hidefocus="true" onMouseOver="ahover('neimeng_1')" onMouseOut="alink('neimeng_1')" id="neimeng_1">内蒙古卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=ningxia" target="_self" hidefocus="true" onMouseOver="ahover('ningxia_1')" onMouseOut="alink('ningxia_1')" id="ningxia_1">宁夏卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=xizang" target="_self" hidefocus="true" onMouseOver="ahover('xizang_1')" onMouseOut="alink('xizang_1')" id="xizang_1">西藏卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=xinjiang" target="_self" hidefocus="true" onMouseOver="ahover('xinjiang_1')" onMouseOut="alink('xinjiang_1')" id="xinjiang_1">新疆卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=gansu" target="_self" hidefocus="true" onMouseOver="ahover('gansu_1')" onMouseOut="alink('gansu_1')" id="gansu_1">甘肃卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=lvyou" target="_self" hidefocus="true" onMouseOver="ahover('lvyou_1')" onMouseOut="alink('lvyou_1')" id="lvyou_1">旅游卫视 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=bjwy" target="_self" hidefocus="true" onMouseOver="ahover('bjwy_1')" onMouseOut="alink('bjwy_1')" id="bjwy_1">北京文艺<font style="color:#99cc00">回看</font></a><a href="gnws.php?id=sdjy" target="_self" hidefocus="true" onMouseOver="ahover('sdjy_1')" onMouseOut="alink('sdjy_1')" id="sdjy_1"> 山东教育 <font style="color:#99cc00">回看</font></a><a href="gnws.php?id=hxws" target="_self" hidefocus="true" onMouseOver="ahover('hxws')" onMouseOut="alink('hxws')" id="hxws">海峡卫视</a><a href="gnws.php?id=xmws" target="_self" hidefocus="true" onMouseOver="ahover('xmws')" onMouseOut="alink('xmws')" id="xmws"> 厦门卫视</a><a href="gnws.php?id=btws" target="_self" hidefocus="true" onMouseOver="ahover('btws')" onMouseOut="alink('btws')" id="btws"> 兵团卫视<font style="color:#99cc00"></font></a></h2>
  </li>

 
  
  


    
</ul>
</div>
<!-- 频道列表导航结束 -->
<div id="solist" style="display:none"> </div></td>
</tr>
</table>

</body>
<script language="javascript" type="text/javascript">
//CLICK处理
var crrCn=1;
function OpenChanel(id) {
	var o1 = document.getElementById("CHT_" + crrCn);
	var o2 = document.getElementById("li_" + crrCn);
	var o3 = document.getElementById("li_" + id);
	var o4 = document.getElementById("CHT_" + id);
	if (crrCn == id) {
		if (o1.style.display == "none") {
			o1.style.display = "block";
		}
		else {
			o1.style.display = "none";
		}
		if (o2.style.backgroundImage.indexOf('menu_listbk2.gif') > -1) {
			o2.style.backgroundImage = "url(images/menu_listbk.gif)";
		}
		else {
			o2.style.backgroundImage = "url(images/menu_listbk2.gif)";
		}
	}
	else {
		o2.style.backgroundImage = "url(images/menu_listbk.gif)";
		o3.style.backgroundImage = "url(images/menu_listbk2.gif)";
		o4.style.display = "block";
		if(o1.style.display != "none"){
			o1.style.display = "none";
			if(id > crrCn){
				location.href="#li_"+id;
			}
		}
		crrCn = id;
	}
}
OpenChanel(1);
document.getElementById('cctv1').style.background = 'url(images/tv.gif) #555555 no-repeat 23px 3px';
document.getElementById('cctv1').style.color = '#ffffff';
document.getElementById('cctv1').style.background = 'url(images/tv.gif) #555555 no-repeat 23px 3px';
document.getElementById('cctv1').style.color = '#ffffff';
  </script>
  <script language="JavaScript">
function GetData(str) { 
	if(str!=""){
	var str2="list.php?k="+str.replace(/(\/|\\|\||\(|\)|\.|\*|\$|\&|\?|\+|\{|\}|\^|\[|\]|\-)/ig,'');
	document.getElementById("halist").style.display = "none";
	document.getElementById("solist").style.display = "block";
	document.getElementById("solist").innerHTML = getDatal("/tv/"+str2);
	}
	else{
		document.getElementById("solist").style.display="none";
		document.getElementById("halist").style.display="block";
	}
}

var LastLink = 'hunan';
function play(id){
	var x;
	var ol = new Array(3);
	var oi = new Array(3);
	id = id.replace('_0','').replace('_1','').replace('_2','');
	ol[0] =  document.getElementById(LastLink);
	ol[1] = document.getElementById(LastLink+'_0');
	ol[2] = document.getElementById(LastLink+'_1');
	ol[3] = document.getElementById(LastLink+'_2');
	oi[0] = document.getElementById(id);
	oi[1] = document.getElementById(id+'_0');
	oi[2] = document.getElementById(id+'_1');
	oi[3] = document.getElementById(id+'_2');
	for (x in ol) {
		if (ol[x]){
			ol[x].style.background = 'url(images/tv.gif) #363636 no-repeat 23px 3px';
			ol[x].style.color = 'd7d7d7';
		}
	}
	for (x in oi) {
		if (oi[x]){
			oi[x].style.background = 'url(images/tv.gif) #555555 no-repeat 23px 3px';
			oi[x].style.color = '#ffffff';
		}
	}
	LastLink = id;
	document.frames['play'].location.href = 'play.php?url=tvlive.php?id='+id;
}
function ahover(id){
	id = id.replace('_0','').replace('_1','').replace('_2','');
	if(LastLink!=id){
		var x;
		var oi = new Array(3);
		oi[0] = document.getElementById(id);
		oi[1] = document.getElementById(id+'_0');
		oi[2] = document.getElementById(id+'_1');
		oi[3] = document.getElementById(id+'_2');
		for (x in oi) {
			if (oi[x]){
				oi[x].style.background = 'url(images/tv.gif) #555555 no-repeat 23px 3px';
				oi[x].style.color = '#ffffff';
			}
		}
	}	
}
function alink(id){
	id = id.replace('_0','').replace('_1','').replace('_2','');
	if(LastLink!=id){
		var x;
		var oi = new Array(3);
		oi[0] = document.getElementById(id);
		oi[1] = document.getElementById(id+'_0');
		oi[2] = document.getElementById(id+'_1');
		oi[3] = document.getElementById(id+'_2');
		for (x in oi) {
			if (oi[x]){
				oi[x].style.background = 'url(images/tv.gif) #363636 no-repeat 23px 3px';
				oi[x].style.color = '#d7d7d7';
			}
		}
	}
}

function killErrors(){return true;}
window.onerror = killErrors;
function killErrors() {
	return true;
}
window.onerror = killErrors;
// -->
function showsubmenu(){
	whichEl = eval("tv_list");
	if (whichEl.style.display == "none") {
		eval("tv_list.style.display=\"\";");
		idFlag.innerHTML = "<div class='close'><a href='#' title='按此切换到精简模式'></a></div>";
	}
	else {
		eval("tv_list.style.display=\"none\";");
		idFlag.innerHTML = "<div class='open'><a href='#' title='按此切换到正常模式'></a>";
	}
}
</script>
</div>










<br>
<div class="footer">

友情链接： <a href="tvlive.php" target="_blank">乐视直播网旧版</a>&nbsp  <a href="http://zhejiang.letvlive.com" target="_blank">浙江卫视</a>&nbsp 所有资源均来自互联网，如有侵犯版权，请联系我。<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_4946187'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s6.cnzz.com/stat.php%3Fid%3D4946187%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script></td>
 
</div>
<?phpphp include_once("baidu_js_push.php") ?>
</body>
</html>
