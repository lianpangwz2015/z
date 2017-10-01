<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include 'config.php';
include 'list2.php';
$v=$_GET['v'];
if($v==""){$v="1";}

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

<title><?phpglobal $pindao; echo $pindao;?>直播-<?phpglobal $pindao; echo $pindao;?>在线直播-<?php global $title; echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?phpglobal $pindao; echo $pindao;?>直播，<?phpglobal $pindao; echo $pindao;?>在线直播" />
<meta name="description" content="乐视直播网，为您提供<?php global $pindao; echo $pindao;?>直播服务。" />

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
|   <a href="srpd.php?id=jykt" target="_self" class="red">少儿频道</a>


    

      
 
      
 
      
 
      

      
 
      
| 
      
 
      

      
 
      
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
	  
	  <div class="snvtva">
	    <?php 

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

 <div class="lrca style1"> <li mark="none">
        <span class="time"><?php global $lrc; echo $lrc;?></div>
  
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
    <h1 class="lm_1"><a href="javascript:OpenChanel(1);" class="list_name" hidefocus="true">湖南省 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_1" style="display: none"><a href="dfpd.php?v=1&id=jykt" target="_self" hidefocus="true" onMouseOver="ahover('jykt')" onMouseOut="alink('jykt')" id="jykt">金鹰卡通</a><a href="dfpd.php?v=1&id=hngg" target="_self" hidefocus="true" onMouseOver="ahover('hngg')" onMouseOut="alink('hngg')" id="hngg">湖南公共</a><a href="dfpd.php?v=1&id=hnyl" target="_self" hidefocus="true" onMouseOver="ahover('shdq')" onMouseOut="alink('shdq')" id="shdq">湖南娱乐<font style="color:#99cc00"></font></a><a href="dfpd.php?v=1&id=hnjs" target="_self" hidefocus="true" onMouseOver="ahover('bjdq')" onMouseOut="alink('bjdq')" id="bjdq">湖南经视</a><a href="dfpd.php?v=1&id=hnds" target="_self" hidefocus="true" onMouseOver="ahover('hnds')" onMouseOut="alink('hnds')" id="hnds">湖南都市<font style="color:#99cc00"></font></a><a href="dfpd.php?v=1&id=hndsj" target="_self" hidefocus="true" onMouseOver="ahover('zjdq')" onMouseOut="alink('zjdq')" id="zjdq">天元围棋<font style="color:#99cc00"></font></a><a href="dfpd.php?v=1&id=changsnx" target="_self" hidefocus="true" onMouseOver="ahover('changsnx')" onMouseOut="alink('changsnx')" id="changsnx">先锋乒羽</a><a href="dfpd.php?v=1&id=changszf" target="_self" hidefocus="true" onMouseOver="ahover('changszf')" onMouseOut="alink('changszf')" id="changszf">快乐购</a><a href="dfpd.php?v=1&id=changsjm" target="_self" hidefocus="true" onMouseOver="ahover('changsjm')" onMouseOut="alink('changsjm')" id="changsjm">快乐垂钓</a><a href="dfpd.php?v=1&id=changsxw" target="_self" hidefocus="true" onMouseOver="ahover('changsxw')" onMouseOut="alink('changsxw')" id="changsxw">长沙新闻</a><a href="dfpd.php?v=1&id=shdiaoyu" target="_self" hidefocus="true" onMouseOver="ahover('shdiaoyu')" onMouseOut="alink('shdiaoyu')" id="shdiaoyu">四海钓鱼</a><a href="dfpd.php?v=1&id=hngjpd" target="_self" hidefocus="true" onMouseOver="ahover('hngjpd')" onMouseOut="alink('hngjpd')" id="hngjpd">国际频道</a><a href="dfpd.php?v=1&id=hnjyjs" target="_self" hidefocus="true" onMouseOver="ahover('hnjyjs')" onMouseOut="alink('hnjyjs')" id="hnjyjs">金鹰纪实</a></h2>
	</li>
	 <li id="li_38">
    <h1 class="lm_1"><a href="javascript:OpenChanel(38);" class="list_name" hidefocus="true">安徽省<font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_38" style="display: none"><a href="dfpd.php?v=38&id=ahjjsh" target="_self" hidefocus="true" onMouseOver="ahover('ahjjsh')" onMouseOut="alink('ahjjsh')" id="ahjjsh">安徽经济生活</a><a href="dfpd.php?v=38&id=ahyspd" target="_self" hidefocus="true" onMouseOver="ahover('ahyspd')" onMouseOut="alink('ahyspd')" id="ahyspd">安徽影视频道</a><a href="dfpd.php?v=38&id=ahggpd" target="_self" hidefocus="true" onMouseOver="ahover('ahggpd')" onMouseOut="alink('ahggpd')" id="ahyspd">安徽公共频道</a><a href="dfpd.php?v=38&id=ahzypd" target="_self" hidefocus="true" onMouseOver="ahover('ahzypd')" onMouseOut="alink('ahzypd')" id="ahzypd">安徽综艺频道</a><a href="dfpd.php?v=38&id=ahkjpd" target="_self" hidefocus="true" onMouseOver="ahover('ahkjpd')" onMouseOut="alink('ahkjpd')" id="ahkjpd">安徽科教频道</a><a href="dfpd.php?v=38&id=ahrwpd" target="_self" hidefocus="true" onMouseOver="ahover('ahrwpd')" onMouseOut="alink('ahrwpd')" id="ahrwpd">安徽人物频道</a><a href="dfpd.php?v=38&id=ahgjpd" target="_self" hidefocus="true" onMouseOver="ahover('ahgjpd')" onMouseOut="alink('ahgjpd')" id="ahgjpd">安徽国际频道</a></h2>
	</li>
	<li id="li_21">
    <h1 class="lm_1"><a href="javascript:OpenChanel(21);" class="list_name" hidefocus="true">广东省 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_21" style="display: none"><a href="dfpd.php?v=21&id=nanfangjs" target="_self" hidefocus="true" onMouseOver="ahover('nanfangjs')" onMouseOut="alink('nanfangjs')" id="nanfangjs">南方经视</a><a href="dfpd.php?v=21&id=nanfangzy" target="_self" hidefocus="true" onMouseOver="ahover('nanfangzy')" onMouseOut="alink('nanfangzy')" id="nanfangzy">南方综艺</a><a href="dfpd.php?v=21&id=nanfangys" target="_self" hidefocus="true" onMouseOver="ahover('nanfangys')" onMouseOut="alink('nanfangys')" id="nanfangys">南方影视</a><a href="dfpd.php?v=21&id=gdgj" target="_self" hidefocus="true" onMouseOver="ahover('gdgj')" onMouseOut="alink('gdgj')" id="gdgj">广东国际</a><a href="dfpd.php?v=21&id=guangdongtiyu" target="_self" hidefocus="true" onMouseOver="ahover('guangdongtiyu')" onMouseOut="alink('guangdongtiyu')" id="guangdongtiyu">广东体育</a><a href="dfpd.php?v=21&id=gdkt" target="_self" hidefocus="true" onMouseOver="ahover('gdkt')" onMouseOut="alink('gdkt')" id="gdkt">嘉佳卡通</a><a href="dfpd.php?v=21&id=gdfc" target="_self" hidefocus="true" onMouseOver="ahover('gdfc')" onMouseOut="alink('gdfc')" id="gdfc">广东房产</a><a href="dfpd.php?v=21&id=gdzj" target="_self" hidefocus="true" onMouseOver="ahover('gdzj')" onMouseOut="alink('gdzj')" id="gdzj">珠江频道</a><a href="dfpd.php?v=21&id=gdsr" target="_self" hidefocus="true" onMouseOver="ahover('gdsr')" onMouseOut="alink('gdsr')" id="gdsr">广东少儿</a><a href="dfpd.php?v=21&id=gdcar" target="_self" hidefocus="true" onMouseOver="ahover('gdcar')" onMouseOut="alink('gdcar')" id="gdcar">广东汽车</a><a href="dfpd.php?v=21&id=gdgg" target="_self" hidefocus="true" onMouseOver="ahover('gdgg')" onMouseOut="alink('gdgg')" id="gdgg">广东公共</a><a href="dfpd.php?v=21&id=gdxw" target="_self" hidefocus="true" onMouseOver="ahover('gdxw')" onMouseOut="alink('gdxw')" id="gdxw">广东新闻</a><a href="dfpd.php?v=21&id=gzzh" target="_self" hidefocus="true" onMouseOver="ahover('gzzh')" onMouseOut="alink('gzzh')" id="gzzh">广州综合</a><a href="dfpd.php?v=21&id=gzxw" target="_self" hidefocus="true" onMouseOver="ahover('gzxw')" onMouseOut="alink('gzxw')" id="gzxw">广州新闻</a><a href="dfpd.php?v=21&id=gzys" target="_self" hidefocus="true" onMouseOver="ahover('gzys')" onMouseOut="alink('gzys')" id="gzys">广州影视</a><a href="dfpd.php?v=21&id=gzyy" target="_self" hidefocus="true" onMouseOver="ahover('gzyy')" onMouseOut="alink('gzyy')" id="gzyy">广州竞赛</a><a href="dfpd.php?v=21&id=gzjj" target="_self" hidefocus="true" onMouseOver="ahover('gzjj')" onMouseOut="alink('gzjj')" id="gzjj">广州经济</a><a href="dfpd.php?v=21&id=gzsr" target="_self" hidefocus="true" onMouseOver="ahover('gzsr')" onMouseOut="alink('gzsr')" id="gzsr">广州少儿</a><a href="dfpd.php?v=21&id=szyl" target="_self" hidefocus="true" onMouseOver="ahover('szyl')" onMouseOut="alink('szyl')" id="szyl">深圳娱乐</a><a href="dfpd.php?v=21&id=szws" target="_self" hidefocus="true" onMouseOver="ahover('szws')" onMouseOut="alink('szws')" id="szws">深圳卫视</a><a href="dfpd.php?v=21&id=szsr" target="_self" hidefocus="true" onMouseOver="ahover('szsr')" onMouseOut="alink('szsr')" id="szsr">深圳少儿<font style="color:#99cc00"></font></a><a href="dfpd.php?v=21&id=szgg" target="_self" hidefocus="true" onMouseOver="ahover('szgg')" onMouseOut="alink('szgg')" id="szgg">深圳公共</a><a href="dfpd.php?v=21&id=szds" target="_self" hidefocus="true" onMouseOver="ahover('szds')" onMouseOut="alink('szds')" id="szds">深圳都市<font style="color:#99cc00"></font></a><a href="dfpd.php?v=21&id=szdsj" target="_self" hidefocus="true" onMouseOver="ahover('szdsj')" onMouseOut="alink('szdsj')" id="szdsj">深圳电视剧<font style="color:#99cc00"></font></a><a href="dfpd.php?v=21&id=szty" target="_self" hidefocus="true" onMouseOver="ahover('szty')" onMouseOut="alink('szty')" id="szty">深圳体育<font style="color:#99cc00"></font></a><a href="dfpd.php?v=21&id=szcj" target="_self" hidefocus="true" onMouseOver="ahover('szcj')" onMouseOut="alink('szcj')" id="szcj">深圳财经</a><a href="dfpd.php?v=21&id=szdv" target="_self" hidefocus="true" onMouseOver="ahover('szdv')" onMouseOut="alink('szdv')" id="szdv">深圳DV生活</a><a href="dfpd.php?v=21&id=zhyt" target="_self" hidefocus="true" onMouseOver="ahover('zhyt')" onMouseOut="alink('zhyt')" id="zhyt">珠海一台</a><a href="dfpd.php?v=21&id=zhet" target="_self" hidefocus="true" onMouseOver="ahover('zhet')" onMouseOut="alink('zhet')" id="zhet">珠海二台</a><a href="dfpd.php?v=21&id=zhst" target="_self" hidefocus="true" onMouseOver="ahover('zhst')" onMouseOut="alink('zhst')" id="zhst">珠海三台</a></h2>
	</li>
	
<li id="li_22">
    <h1 class="lm_1"><a href="javascript:OpenChanel(22);" class="list_name" hidefocus="true">上海市 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_22" style="display: none"><a href="dfpd.php?v=22&id=shdfyl" target="_self" hidefocus="true" onMouseOver="ahover('shdfyl')" onMouseOut="alink('shdfyl')" id="shdfyl">上海东方娱乐</a><a href="dfpd.php?v=22&id=shjy" target="_self" hidefocus="true" onMouseOver="ahover('shjy')" onMouseOut="alink('shjy')" id="shjy">上海教育</a><a href="dfpd.php?v=22&id=shxdkt" target="_self" hidefocus="true" onMouseOver="ahover('shxdkt')" onMouseOut="alink('shxdkt')" id="shxdkt">上海炫动卡通<font style="color:#99cc00"></font></a><a href="dfpd.php?v=22&id=shxwzh" target="_self" hidefocus="true" onMouseOver="ahover('shxwzh')" onMouseOut="alink('shxwzh')" id="shxwzh">上海新闻综合</a><a href="dfpd.php?v=22&id=shdfcj" target="_self" hidefocus="true" onMouseOver="ahover('shdfcj')" onMouseOut="alink('shdfcj')" id="shdfcj">上海东方财经<font style="color:#99cc00"></font></a><a href="dfpd.php?v=22&id=shdsj" target="_self" hidefocus="true" onMouseOver="ahover('shdsj')" onMouseOut="alink('shdsj')" id="shdsj">上海电视剧<font style="color:#99cc00"></font></a><a href="dfpd.php?v=22&id=shdycj" target="_self" hidefocus="true" onMouseOver="ahover('shdycj')" onMouseOut="alink('shdycj')" id="shdycj">上海第一财经</a><a href="dfpd.php?v=22&id=shysrw" target="_self" hidefocus="true" onMouseOver="ahover('shysrw')" onMouseOut="alink('shysrw')" id="shysrw">上海艺术人文</a><a href="dfpd.php?v=22&id=dfgw" target="_self" hidefocus="true" onMouseOver="ahover('dfgw')" onMouseOut="alink('dfgw')" id="dfgw">上海东方购物</a><a href="dfpd.php?v=22&id=shdfdy" target="_self" hidefocus="true" onMouseOver="ahover('shdfdy')" onMouseOut="alink('shdfdy')" id="shdfdy">上海东方电影</a><a href="dfpd.php?v=22&id=shjs" target="_self" hidefocus="true" onMouseOver="ahover('shjs')" onMouseOut="alink('shjs')" id="shjs">上海纪实</a><a href="dfpd.php?v=22&id=shxs" target="_self" hidefocus="true" onMouseOver="ahover('shxs')" onMouseOut="alink('shxs')" id="shxs">上海星尚</a><a href="dfpd.php?v=22&id=shwy" target="_self" hidefocus="true" onMouseOver="ahover('shwy')" onMouseOut="alink('shwy')" id="shwy">上海外语</a></h2>
	</li>
	<li id="li_23">
    <h1 class="lm_1"><a href="javascript:OpenChanel(23);" class="list_name" hidefocus="true">北京市 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_23" style="display: none"><a href="dfpd.php?v=23&id=bjwy" target="_self" hidefocus="true" onMouseOver="ahover('bjwy')" onMouseOut="alink('bjwy')" id="bjwy">北京文艺</a><a href="dfpd.php?v=23&id=bjkj" target="_self" hidefocus="true" onMouseOver="ahover('bjkj')" onMouseOut="alink('bjkj')" id="bjkj">北京科教</a><a href="dfpd.php?v=23&id=bjys" target="_self" hidefocus="true" onMouseOver="ahover('bjys')" onMouseOut="alink('bjys')" id="bjys">北京影视<font style="color:#99cc00"></font></a><a href="dfpd.php?v=23&id=bjty" target="_self" hidefocus="true" onMouseOver="ahover('bjty')" onMouseOut="alink('bjty')" id="bjty">北京体育</a><a href="dfpd.php?v=23&id=bjcj" target="_self" hidefocus="true" onMouseOver="ahover('bjcj')" onMouseOut="alink('bjcj')" id="bjcj">北京财经<font style="color:#99cc00"></font></a><a href="dfpd.php?v=23&id=bjsh" target="_self" hidefocus="true" onMouseOver="ahover('bjsh')" onMouseOut="alink('bjsh')" id="bjsh">北京生活<font style="color:#99cc00"></font></a><a href="dfpd.php?v=23&id=bjqs" target="_self" hidefocus="true" onMouseOver="ahover('bjqs')" onMouseOut="alink('bjqs')" id="bjqs">北京青少</a><a href="dfpd.php?v=23&id=bjxw" target="_self" hidefocus="true" onMouseOver="ahover('bjxw')" onMouseOut="alink('bjxw')" id="bjxw">北京新闻</a><a href="dfpd.php?v=23&id=bjkk" target="_self" hidefocus="true" onMouseOver="ahover('bjkk')" onMouseOut="alink('bjkk')" id="bjkk">北京卡酷</a></h2>
	</li>
	<li id="li_24">
    <h1 class="lm_1"><a href="javascript:OpenChanel(24);" class="list_name" hidefocus="true">湖北省 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_24" style="display: none"><a href="dfpd.php?v=24&id=hbzh" target="_self" hidefocus="true" onMouseOver="ahover('hbzh')" onMouseOut="alink('hbzh')" id="hbzh">湖北综合</a><a href="dfpd.php?v=24&id=hbjs" target="_self" hidefocus="true" onMouseOver="ahover('hbjs')" onMouseOut="alink('hbjs')" id="hbjs">湖北经视</a><a href="dfpd.php?v=24&id=hubeigg" target="_self" hidefocus="true" onMouseOver="ahover('hubeigg')" onMouseOut="alink('hubeigg')" id="hubeigg">湖北公共<font style="color:#99cc00"></font></a><a href="dfpd.php?v=24&id=mjgw" target="_self" hidefocus="true" onMouseOver="ahover('mjgw')" onMouseOut="alink('mjgw')" id="mjgw">美嘉购物</a><a href="dfpd.php?v=24&id=hbys" target="_self" hidefocus="true" onMouseOver="ahover('hbys')" onMouseOut="alink('hbys')" id="hbys">湖北影视<font style="color:#99cc00"></font></a><a href="dfpd.php?v=24&id=hubeity" target="_self" hidefocus="true" onMouseOver="ahover('hubeity')" onMouseOut="alink('hubeity')" id="hubeity">湖北体育<font style="color:#99cc00"></font></a><a href="dfpd.php?v=24&id=hbjy" target="_self" hidefocus="true" onMouseOver="ahover('hbjy')" onMouseOut="alink('hbjy')" id="hbjy">湖北教育</a><a href="dfpd.php?v=24&id=whxwpd" target="_self" hidefocus="true" onMouseOver="ahover('whxwpd')" onMouseOut="alink('whxwpd')" id="whxwpd">武汉新闻频道</a><a href="dfpd.php?v=24&id=whkjpd" target="_self" hidefocus="true" onMouseOver="ahover('whkjpd')" onMouseOut="alink('whkjpd')" id="whkjpd">武汉科教频道</a><a href="dfpd.php?v=24&id=whwtpd" target="_self" hidefocus="true" onMouseOver="ahover('whwtpd')" onMouseOut="alink('whwtpd')" id="whwtpd">武汉文体频道</a><a href="dfpd.php?v=24&id=whsrpd" target="_self" hidefocus="true" onMouseOver="ahover('whsrpd')" onMouseOut="alink('whsrpd')" id="whsrpd">武汉少儿频道</a><a href="dfpd.php?v=24&id=xyzh" target="_self" hidefocus="true" onMouseOver="ahover('xyzh')" onMouseOut="alink('xyzh')" id="xyzh">襄阳综合</a><a href="dfpd.php?v=24&id=xyjj" target="_self" hidefocus="true" onMouseOver="ahover('xyjj')" onMouseOut="alink('xyjj')" id="xyjj">襄阳经济</a><a href="dfpd.php?v=24&id=xywj" target="_self" hidefocus="true" onMouseOver="ahover('xywj')" onMouseOut="alink('xywj')" id="xywj">襄阳文教</a><a href="dfpd.php?v=24&id=xyjc" target="_self" hidefocus="true" onMouseOver="ahover('xyjc')" onMouseOut="alink('xyjc')" id="xyjc">襄阳精彩</a></h2>
	</li>
	<li id="li_25">
    <h1 class="lm_1"><a href="javascript:OpenChanel(25);" class="list_name" hidefocus="true">浙江省 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_25" style="display: none"><a href="dfpd.php?v=25&id=zjqjpd" target="_self" hidefocus="true" onMouseOver="ahover('zjqjpd')" onMouseOut="alink('zjqjpd')" id="zjqjpd">浙江钱江频道</a><a href="dfpd.php?v=25&id=zjsepd" target="_self" hidefocus="true" onMouseOver="ahover('zjsepd')" onMouseOut="alink('zjsepd')" id="zjsepd">浙江少儿频道</a><a href="dfpd.php?v=25&id=zjjspd" target="_self" hidefocus="true" onMouseOver="ahover('zjjspd')" onMouseOut="alink('zjjspd')" id="zjjspd">浙江经视频道<font style="color:#99cc00"></font></a><a href="dfpd.php?v=25&id=zjkjpd" target="_self" hidefocus="true" onMouseOver="ahover('zjkjpd')" onMouseOut="alink('zjkjpd')" id="zjkjpd">浙江科教频道</a><a href="dfpd.php?v=25&id=zjyspd" target="_self" hidefocus="true" onMouseOver="ahover('zjyspd')" onMouseOut="alink('zjyspd')" id="zjyspd">浙江影视频道<font style="color:#99cc00"></font></a><a href="dfpd.php?v=25&id=zjmspd" target="_self" hidefocus="true" onMouseOver="ahover('zjmspd')" onMouseOut="alink('zjmspd')" id="zjmspd">浙江民生频道<font style="color:#99cc00"></font></a><a href="dfpd.php?v=25&id=zjggpd" target="_self" hidefocus="true" onMouseOver="ahover('zjggpd')" onMouseOut="alink('zjggpd')" id="zjggpd">浙江公共频道</a><a href="dfpd.php?v=25&id=zjlxsj" target="_self" hidefocus="true" onMouseOver="ahover('zjlxsj')" onMouseOut="alink('zjlxsj')" id="zjlxsj">浙江留学世界</a><a href="dfpd.php?v=25&id=zjhyg" target="_self" hidefocus="true" onMouseOver="ahover('zjhyg')" onMouseOut="alink('zjhyg')" id="zjhyg">好易购</a><a href="dfpd.php?v=25&id=hjxwpd" target="_self" hidefocus="true" onMouseOver="ahover('hjxwpd')" onMouseOut="alink('hjxwpd')" id="hjxwpd">温州新闻频道</a><a href="dfpd.php?v=25&id=wenzoujj" target="_self" hidefocus="true" onMouseOver="ahover('wenzoujj')" onMouseOut="alink('wenzoujj')" id="wenzoujj">温州经济科教</a><a href="dfpd.php?v=25&id=wenzouds" target="_self" hidefocus="true" onMouseOver="ahover('wenzouds')" onMouseOut="alink('wenzouds')" id="wenzouds">温州都市生活</a><a href="dfpd.php?v=25&id=wenzougg" target="_self" hidefocus="true" onMouseOver="ahover('wenzougg')" onMouseOut="alink('wenzougg')" id="wenzougg">温州公共民生</a><a href="dfpd.php?v=25&id=wenzouoj" target="_self" hidefocus="true" onMouseOver="ahover('wenzouoj')" onMouseOut="alink('wenzouoj')" id="wenzouoj">温州瓯江新闻</a><a href="dfpd.php?v=25&id=nbxwpd" target="_self" hidefocus="true" onMouseOver="ahover('nbxwpd')" onMouseOut="alink('nbxwpd')" id="nbxwpd">宁波新闻综合</a><a href="dfpd.php?v=25&id=nbshsh" target="_self" hidefocus="true" onMouseOver="ahover('nbshsh')" onMouseOut="alink('nbshsh')" id="nbshsh">宁波社会生活</a><a href="dfpd.php?v=25&id=nbyspd" target="_self" hidefocus="true" onMouseOver="ahover('nbyspd')" onMouseOut="alink('nbyspd')" id="nbyspd">宁波影视频道</a><a href="dfpd.php?v=25&id=nbwhyl" target="_self" hidefocus="true" onMouseOver="ahover('nbwhyl')" onMouseOut="alink('nbwhyl')" id="nbwhyl">宁波文化娱乐</a><a href="dfpd.php?v=25&id=nbsrpd" target="_self" hidefocus="true" onMouseOver="ahover('nbsrpd')" onMouseOut="alink('nbsrpd')" id="nbsrpd">宁波少儿频道</a><a href="dfpd.php?v=25&id=sxysylpd" target="_self" hidefocus="true" onMouseOver="ahover('sxysylpd')" onMouseOut="alink('sxysylpd')" id="sxysylpd">嘉兴新闻综合</a><a href="dfpd.php?v=25&id=jiaxingg" target="_self" hidefocus="true" onMouseOver="ahover('jiaxingg')" onMouseOut="alink('jiaxingg')" id="jiaxingg">嘉兴公共频道</a><a href="dfpd.php?v=25&id=sxggpd" target="_self" hidefocus="true" onMouseOver="ahover('sxggpd')" onMouseOut="alink('sxggpd')" id="sxggpd">嘉兴文化影视</a><a href="dfpd.php?v=25&id=sxxwpd" target="_self" hidefocus="true" onMouseOver="ahover('sxxwpd')" onMouseOut="alink('sxxwpd')" id="sxxwpd">绍兴新闻频道</a><a href="dfpd.php?v=25&id=jhdspd" target="_self" hidefocus="true" onMouseOver="ahover('jhdspd')" onMouseOut="alink('jhdspd')" id="jhdspd">金华都市频道</a><a href="dfpd.php?v=25&id=jhxwpd" target="_self" hidefocus="true" onMouseOver="ahover('jhxwpd')" onMouseOut="alink('jhxwpd')" id="jhxwpd">金华新闻频道</a><a href="dfpd.php?v=25&id=jhggpd" target="_self" hidefocus="true" onMouseOver="ahover('jhggpd')" onMouseOut="alink('jhggpd')" id="jhggpd">金华公共频道</a><a href="dfpd.php?v=25&id=jhjypd" target="_self" hidefocus="true" onMouseOver="ahover('jhjypd')" onMouseOut="alink('jhjypd')" id="jhjypd">金华教育频道</a><a href="dfpd.php?v=25&id=hangzouxwpd" target="_self" hidefocus="true" onMouseOver="ahover('hangzouxwpd')" onMouseOut="alink('hangzouxwpd')" id="hangzouxwpd">杭州新闻频道</a><a href="dfpd.php?v=25&id=hangzouwhpd" target="_self" hidefocus="true" onMouseOver="ahover('hangzouwhpd')" onMouseOut="alink('hangzouwhpd')" id="hangzouwhpd">杭州文化频道</a><a href="dfpd.php?v=25&id=hangzouyspd" target="_self" hidefocus="true" onMouseOver="ahover('hangzouyspd')" onMouseOut="alink('hangzouyspd')" id="hangzouyspd">杭州影视频道</a><a href="dfpd.php?v=25&id=hangzoushpd" target="_self" hidefocus="true" onMouseOver="ahover('hangzoushpd')" onMouseOut="alink('hangzoushpd')" id="hangzoushpd">杭州生活频道</a><a href="dfpd.php?v=25&id=hangzousrpd" target="_self" hidefocus="true" onMouseOver="ahover('hangzousrpd')" onMouseOut="alink('hangzousrpd')" id="hangzousrpd">杭州少儿频道</a>
	<a href="dfpd.php?v=25&id=hangzouxhmz" target="_self" hidefocus="true" onMouseOver="ahover('hangzouxhmz')" onMouseOut="alink('hangzouxhmz')" id="hangzouxhmz">杭州西湖明珠</a><a href="dfpd.php?v=25&id=cxzh" target="_self" hidefocus="true" onMouseOver="ahover('cxzh')" onMouseOut="alink('cxzh')" id="cxzh">舟山新闻综合</a><a href="dfpd.php?v=25&id=tzxwzh" target="_self" hidefocus="true" onMouseOver="ahover('tzxwzh')" onMouseOut="alink('tzxwzh')" id="tzxwzh">台州新闻综合</a><a href="dfpd.php?v=25&id=tzcssh" target="_self" hidefocus="true" onMouseOver="ahover('tzcssh')" onMouseOut="alink('tzcssh')" id="tzcssh">台州城市生活</a><a href="dfpd.php?v=25&id=tzggcf" target="_self" hidefocus="true" onMouseOver="ahover('tzggcf')" onMouseOut="alink('tzggcf')" id="tzggcf">台州公共财富</a><a href="dfpd.php?v=25&id=tzyswh" target="_self" hidefocus="true" onMouseOver="ahover('tzyswh')" onMouseOut="alink('tzyswh')" id="tzyswh">台州影视文化</a></h2>
	  </li>
	<li id="li_26">
    <h1 class="lm_1"><a href="javascript:OpenChanel(26);" class="list_name" hidefocus="true">江苏省 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_26" style="display: none"><a href="dfpd.php?v=26&id=jsgj" target="_self" hidefocus="true" onMouseOver="ahover('jsgj')" onMouseOut="alink('jsgj')" id="jsgj">江苏国际</a><a href="dfpd.php?v=26&id=jsxx" target="_self" hidefocus="true" onMouseOver="ahover('jsxx')" onMouseOut="alink('jsxx')" id="jsxx">江苏学习</a><a href="dfpd.php?v=26&id=jszy" target="_self" hidefocus="true" onMouseOver="ahover('jszy')" onMouseOut="alink('jszy')" id="jszy">江苏综艺</a><a href="dfpd.php?v=26&id=jscs" target="_self" hidefocus="true" onMouseOver="ahover('jscs')" onMouseOut="alink('jscs')" id="jscs">江苏城市</a><a href="dfpd.php?v=26&id=jsys" target="_self" hidefocus="true" onMouseOver="ahover('jsys')" onMouseOut="alink('jsys')" id="jsys">江苏影视</a><a href="dfpd.php?v=26&id=jslz" target="_self" hidefocus="true" onMouseOver="ahover('jslz')" onMouseOut="alink('jslz')" id="jslz">江苏靓装</a><a href="dfpd.php?v=26&id=jsty" target="_self" hidefocus="true" onMouseOver="ahover('jsty')" onMouseOut="alink('jsty')" id="jsty">江苏体育</a><a href="dfpd.php?v=26&id=jsgg" target="_self" hidefocus="true" onMouseOver="ahover('jsgg')" onMouseOut="alink('jsgg')" id="jsgg">江苏公共</a><a href="dfpd.php?v=26&id=jsjy" target="_self" hidefocus="true" onMouseOver="ahover('jsjy')" onMouseOut="alink('jsjy')" id="jsjy">江苏教育</a><a href="dfpd.php?v=26&id=ymkt" target="_self" hidefocus="true" onMouseOver="ahover('ymkt')" onMouseOut="alink('ymkt')" id="ymkt">优漫卡通</a><a href="dfpd.php?v=26&id=jshxgw" target="_self" hidefocus="true" onMouseOver="ahover('jshxgw')" onMouseOut="alink('jshxgw')" id="jshxgw">好享购物</a><a href="dfpd.php?v=26&id=wxxwzh" target="_self" hidefocus="true" onMouseOver="ahover('wxxwzh')" onMouseOut="alink('wxxwzh')" id="wxxwzh">无锡新闻综合</a><a href="dfpd.php?v=26&id=wxdszx" target="_self" hidefocus="true" onMouseOver="ahover('wxdszx')" onMouseOut="alink('wxdszx')" id="wxdszx">无锡都市资讯<font style="color:#99cc00"></font></a><a href="dfpd.php?v=26&id=wxshpd" target="_self" hidefocus="true" onMouseOver="ahover('wxshpd')" onMouseOut="alink('wxshpd')" id="wxshpd">无锡生活频道</a><a href="dfpd.php?v=26&id=wxdsyl" target="_self" hidefocus="true" onMouseOver="ahover('wxdsyl')" onMouseOut="alink('wxdsyl')" id="wxdsyl">无锡电视娱乐</a><a href="dfpd.php?v=26&id=wxdsjj" target="_self" hidefocus="true" onMouseOver="ahover('wxdsjj')" onMouseOut="alink('wxdsjj')" id="wxdsjj">无锡电视经济</a><a href="dfpd.php?v=26&id=ntzhpd" target="_self" hidefocus="true" onMouseOver="ahover('ntzhpd')" onMouseOut="alink('ntzhpd')" id="ntzhpd">南通综合频道<font style="color:#99cc00"></font></a><a href="dfpd.php?v=26&id=ntsjpd" target="_self" hidefocus="true" onMouseOver="ahover('ntsjpd')" onMouseOut="alink('ntsjpd')" id="ntsjpd">南通教育频道<font style="color:#99cc00"></font></a><a href="dfpd.php?v=26&id=ntshpd" target="_self" hidefocus="true" onMouseOver="ahover('ntshpd')" onMouseOut="alink('ntshpd')" id="ntshpd">南通公共频道</a><a href="dfpd.php?v=26&id=ntxxpd" target="_self" hidefocus="true" onMouseOver="ahover('ntxxpd')" onMouseOut="alink('ntxxpd')" id="ntxxpd">南通信息频道</a><a href="dfpd.php?v=26&id=taizxwzh" target="_self" hidefocus="true" onMouseOver="ahover('taizxwzh')" onMouseOut="alink('taizxwzh')" id="taizxwzh">泰州新闻综合</a><a href="dfpd.php?v=26&id=taizjjsh" target="_self" hidefocus="true" onMouseOver="ahover('taizjjsh')" onMouseOut="alink('taizjjsh')" id="taizjjsh">泰州经济生活</a><a href="dfpd.php?v=26&id=taizysyl" target="_self" hidefocus="true" onMouseOver="ahover('taizysyl')" onMouseOut="alink('taizysyl')" id="taizysyl">泰州影视娱乐</a><a href="dfpd.php?v=26&id=szxwpd" target="_self" hidefocus="true" onMouseOver="ahover('szxwpd')" onMouseOut="alink('szxwpd')" id="szxwpd">苏州新闻频道</a><a href="dfpd.php?v=26&id=szshjj" target="_self" hidefocus="true" onMouseOver="ahover('szshjj')" onMouseOut="alink('szshjj')" id="szshjj">苏州社会经济</a><a href="dfpd.php?v=26&id=szwhsh" target="_self" hidefocus="true" onMouseOver="ahover('szwhsh')" onMouseOut="alink('szwhsh')" id="szwhsh">苏州文化生活</a><a href="dfpd.php?v=26&id=szshzx" target="_self" hidefocus="true" onMouseOver="ahover('szshzx')" onMouseOut="alink('szshzx')" id="szshzx">苏州生活资讯</a><a href="dfpd.php?v=26&id=huaianzh" target="_self" hidefocus="true" onMouseOver="ahover('huaianzh')" onMouseOut="alink('huaianzh')" id="huaianzh">淮安综合频道</a><a href="dfpd.php?v=26&id=huaiangg" target="_self" hidefocus="true" onMouseOver="ahover('huaiangg')" onMouseOut="alink('huaiangg')" id="huaiangg">淮安公共频道</a><a href="dfpd.php?v=26&id=huaianys" target="_self" hidefocus="true" onMouseOver="ahover('huaianys')" onMouseOut="alink('huaianys')" id="huaianys">淮安影视娱乐</a><a href="dfpd.php?v=26&id=njxw" target="_self" hidefocus="true" onMouseOver="ahover('njxw')" onMouseOut="alink('njxw')" id="njxw">南京新闻</a><a href="dfpd.php?v=26&id=njlv" target="_self" hidefocus="true" onMouseOver="ahover('njlv')" onMouseOut="alink('njlv')" id="njlv">南京生活</a><a href="dfpd.php?v=26&id=njyl" target="_self" hidefocus="true" onMouseOver="ahover('njyl')" onMouseOut="alink('njyl')" id="njyl">南京娱乐</a><a href="dfpd.php?v=26&id=njxx" target="_self" hidefocus="true" onMouseOver="ahover('njxx')" onMouseOut="alink('njxx')" id="njxx">南京信息</a><a href="dfpd.php?v=26&id=njkj" target="_self" hidefocus="true" onMouseOver="ahover('njkj')" onMouseOut="alink('njkj')" id="njkj">南京科教</a><a href="dfpd.php?v=26&id=njsr" target="_self" hidefocus="true" onMouseOver="ahover('njsr')" onMouseOut="alink('njsr')" id="njsr">南京少儿</a><a href="dfpd.php?v=26&id=njsb" target="_self" hidefocus="true" onMouseOver="ahover('njsb')" onMouseOut="alink('njsb')" id="njsb">南京十八</a><a href="dfpd.php?v=26&id=czxwzh" target="_self" hidefocus="true" onMouseOver="ahover('czxwzh')" onMouseOut="alink('czxwzh')" id="czxwzh">常州新闻综合</a><a href="dfpd.php?v=26&id=czdspd" target="_self" hidefocus="true" onMouseOver="ahover('czdspd')" onMouseOut="alink('czdspd')" id="czdspd">常州都市频道</a><a href="dfpd.php?v=26&id=czshpd" target="_self" hidefocus="true" onMouseOver="ahover('czshpd')" onMouseOut="alink('czshpd')" id="czshpd">常州生活频道</a><a href="dfpd.php?v=26&id=czggpd" target="_self" hidefocus="true" onMouseOver="ahover('czggpd')" onMouseOut="alink('czggpd')" id="czggpd">常州公共频道</a><a href="dfpd.php?v=26&id=cztwpd" target="_self" hidefocus="true" onMouseOver="ahover('cztwpd')" onMouseOut="alink('cztwpd')" id="cztwpd">常州图文频道</a><a href="dfpd.php?v=26&id=xzxwzh" target="_self" hidefocus="true" onMouseOver="ahover('xzxwzh')" onMouseOut="alink('xzxwzh')" id="xzxwzh">徐州新闻综合</a><a href="dfpd.php?v=26&id=xzjjsh" target="_self" hidefocus="true" onMouseOver="ahover('xzjjsh')" onMouseOut="alink('xzjjsh')" id="xzjjsh">徐州-2</a><a href="dfpd.php?v=26&id=xzwyys" target="_self" hidefocus="true" onMouseOver="ahover('xzwyys')" onMouseOut="alink('xzwyys')" id="xzwyys">徐州-3</a><a href="dfpd.php?v=26&id=xzxzzg" target="_self" hidefocus="true" onMouseOver="ahover('xzxzzg')" onMouseOut="alink('xzxzzg')" id="xzxzzg">徐州-4</a><a href="dfpd.php?v=26&id=sqzhpd" target="_self" hidefocus="true" onMouseOver="ahover('sqzhpd')" onMouseOut="alink('sqzhpd')" id="sqzhpd">宿迁综合频道</a><a href="dfpd.php?v=26&id=sqggpd" target="_self" hidefocus="true" onMouseOver="ahover('sqggpd')" onMouseOut="alink('sqggpd')" id="sqggpd">宿迁公共频道</a></h2>
	</li>
	<li id="li_27">
    <h1 class="lm_1"><a href="javascript:OpenChanel(27);" class="list_name" hidefocus="true">江西省 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_27" style="display: none"><a href="dfpd.php?v=27&id=jxds" target="_self" hidefocus="true" onMouseOver="ahover('jxds')" onMouseOut="alink('jxds')" id="jxds">江西都市</a><a href="dfpd.php?v=27&id=jxjs" target="_self" hidefocus="true" onMouseOver="ahover('jxjs')" onMouseOut="alink('jxjs')" id="jxjs">江西经视</a><a href="dfpd.php?v=27&id=jxys" target="_self" hidefocus="true" onMouseOver="ahover('jxys')" onMouseOut="alink('jxys')" id="jxys">江西影视</a><a href="dfpd.php?v=27&id=jxgg" target="_self" hidefocus="true" onMouseOver="ahover('jxgg')" onMouseOut="alink('jxgg')" id="jxgg">江西公共</a><a href="dfpd.php?v=27&id=jxsr" target="_self" hidefocus="true" onMouseOver="ahover('jxsr')" onMouseOut="alink('jxsr')" id="jxsr">江西少儿</a><a href="dfpd.php?v=27&id=jxhsjd" target="_self" hidefocus="true" onMouseOver="ahover('jxhsjd')" onMouseOut="alink('jxhsjd')" id="jxhsjd">江西经视</a><a href="dfpd.php?v=27&id=jxysyl" target="_self" hidefocus="true" onMouseOver="ahover('jxysyl')" onMouseOut="alink('jxysyl')" id="jxysyl">江西影视娱乐</a><a href="dfpd.php?v=27&id=jxydds" target="_self" hidefocus="true" onMouseOver="ahover('jxydds')" onMouseOut="alink('jxydds')" id="jxydds">江西移动电视</a><a href="dfpd.php?v=27&id=jxdypd" target="_self" hidefocus="true" onMouseOver="ahover('jxdypd')" onMouseOut="alink('jxhdypd')" id="jxdypd">江西电影频道</a><a href="dfpd.php?v=27&id=ncxwzh" target="_self" hidefocus="true" onMouseOver="ahover('ncxwzh')" onMouseOut="alink('ncxwzh')" id="ncxwzh">南昌新闻综合</a><a href="dfpd.php?v=27&id=ncfz" target="_self" hidefocus="true" onMouseOver="ahover('ncfz')" onMouseOut="alink('ncfz')" id="ncfz">南昌法制</a></h2>
	</li>
	<li id="li_28">
    <h1 class="lm_1"><a href="javascript:OpenChanel(28);" class="list_name" hidefocus="true">四川省 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_28" style="display: none"><a href="dfpd.php?v=28&id=scjj" target="_self" hidefocus="true" onMouseOver="ahover('scjj')" onMouseOut="alink('scjj')" id="scjj">四川经济</a><a href="dfpd.php?v=28&id=scgg" target="_self" hidefocus="true" onMouseOver="ahover('scgg')" onMouseOut="alink('scgg')" id="scgg">四川公共</a><a href="dfpd.php?v=28&id=scxwzx" target="_self" hidefocus="true" onMouseOver="ahover('scxwzx')" onMouseOut="alink('scxwzx')" id="scxwzx">四川新闻资讯</a><a href="dfpd.php?v=28&id=scyswy" target="_self" hidefocus="true" onMouseOver="ahover('scyswy')" onMouseOut="alink('scyswy')" id="scyswy">四川影视文艺</a><a href="dfpd.php?v=28&id=scwhly" target="_self" hidefocus="true" onMouseOver="ahover('scwhly')" onMouseOut="alink('scwhly')" id="scwhly">四川文化旅游</a><a href="dfpd.php?v=28&id=scfnert" target="_self" hidefocus="true" onMouseOver="ahover('scfnert')" onMouseOut="alink('scfnert')" id="scfnert">四川妇女儿童</a></h2>
	</li>
	<li id="li_29">
    <h1 class="lm_1"><a href="javascript:OpenChanel(29);" class="list_name" hidefocus="true">山西省 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_29" style="display: none"><a href="dfpd.php?v=29&id=shanxijj" target="_self" hidefocus="true" onMouseOver="ahover('shanxijj')" onMouseOut="alink('shanxijj')" id="shanxijj">山西卫视频道</a><a href="dfpd.php?v=29&id=tyxw" target="_self" hidefocus="true" onMouseOver="ahover('tyxw')" onMouseOut="alink('tyxw')" id="tyxw">太原新闻</a><a href="dfpd.php?v=29&id=tybx" target="_self" hidefocus="true" onMouseOver="ahover('tybx')" onMouseOut="alink('tybx')" id="tybx">太原百姓</a><a href="dfpd.php?v=29&id=tyfz" target="_self" hidefocus="true" onMouseOver="ahover('tyfz')" onMouseOut="alink('tyfz')" id="tyfz">太原法制</a><a href="dfpd.php?v=29&id=tywt" target="_self" hidefocus="true" onMouseOver="ahover('tywt')" onMouseOut="alink('tywt')" id="tywt">太原文体</a><a href="dfpd.php?v=29&id=tyjtxf" target="_self" hidefocus="true" onMouseOver="ahover('tyjtxf')" onMouseOut="alink('tyjtxf')" id="tyjtxf">太原家庭消费</a><a href="dfpd.php?v=29&id=yqzh" target="_self" hidefocus="true" onMouseOver="ahover('yqzh')" onMouseOut="alink('yqzh')" id="yqzh">阳泉综合</a><a href="dfpd.php?v=29&id=yqkj" target="_self" hidefocus="true" onMouseOver="ahover('yqkj')" onMouseOut="alink('yqkj')" id="yqkj">阳泉科教</a><a href="dfpd.php?v=29&id=qcyq" target="_self" hidefocus="true" onMouseOver="ahover('qcyq')" onMouseOut="alink('qcyq')" id="qcyq">晴彩阳泉</a></h2>
	</li>
	<li id="li_30">
    <h1 class="lm_1"><a href="javascript:OpenChanel(30);" class="list_name" hidefocus="true">山东省 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_30" style="display: none"><a href="dfpd.php?v=30&id=jinanxw" target="_self" hidefocus="true" onMouseOver="ahover('jinanxw')" onMouseOut="alink('jinanxw')" id="jinanxw">济南新闻</a><a href="dfpd.php?v=30&id=jinands" target="_self" hidefocus="true" onMouseOver="ahover('jinands')" onMouseOut="alink('jinands')" id="jinands">济南都市</a><a href="dfpd.php?v=30&id=jinanys" target="_self" hidefocus="true" onMouseOver="ahover('jinanys')" onMouseOut="alink('jinanys')" id="jinanys">济南影视</a><a href="dfpd.php?v=30&id=jinanyl" target="_self" hidefocus="true" onMouseOver="ahover('jinanyl')" onMouseOut="alink('jinanyl')" id="jinanyl">济南娱乐</a><a href="dfpd.php?v=30&id=jinansh" target="_self" hidefocus="true" onMouseOver="ahover('jinansh')" onMouseOut="alink('jinansh')" id="jinansh">济南生活</a><a href="dfpd.php?v=30&id=jinansw" target="_self" hidefocus="true" onMouseOver="ahover('jinansw')" onMouseOut="alink('jinansw')" id="jinansw">济南商务</a><a href="dfpd.php?v=30&id=jinansr" target="_self" hidefocus="true" onMouseOver="ahover('jinansr')" onMouseOut="alink('jinansr')" id="jinansr">济南少儿</a><a href="dfpd.php?v=30&id=qdxwzh" target="_self" hidefocus="true" onMouseOver="ahover('qdxwzh')" onMouseOut="alink('qdxwzh')" id="qdxwzh">青岛新闻综合</a><a href="dfpd.php?v=30&id=qdshpd" target="_self" hidefocus="true" onMouseOver="ahover('qdshpd')" onMouseOut="alink('qdshpd')" id="qdshpd">青岛生活频道</a><a href="dfpd.php?v=30&id=qdyspd" target="_self" hidefocus="true" onMouseOver="ahover('qdyspd')" onMouseOut="alink('qdyspd')" id="qdyspd">青岛影视频道</a><a href="dfpd.php?v=30&id=qdxxzx" target="_self" hidefocus="true" onMouseOver="ahover('qdxxzx')" onMouseOut="alink('qdxxzx')" id="qdxxzx">青岛休闲资讯</a><a href="dfpd.php?v=30&id=qddspd" target="_self" hidefocus="true" onMouseOver="ahover('qddspd')" onMouseOut="alink('qddspd')" id="qddspd">青岛都市频道</a><a href="dfpd.php?v=30&id=qdqsly" target="_self" hidefocus="true" onMouseOver="ahover('qdqsly')" onMouseOut="alink('qdqsly')" id="qdqsly">青岛青少旅游</a><a href="dfpd.php?v=30&id=weihxwpd" target="_self" hidefocus="true" onMouseOver="ahover('weihxwpd')" onMouseOut="alink('weihxwpd')" id="weihxwpd">威海新闻综合</a><a href="dfpd.php?v=30&id=whggpd" target="_self" hidefocus="true" onMouseOver="ahover('whggpd')" onMouseOut="alink('whggpd')" id="whggpd">威海公共频道</a><a href="dfpd.php?v=30&id=weifangxw" target="_self" hidefocus="true" onMouseOver="ahover('weifangxw')" onMouseOut="alink('weifangxw')" id="weifangxw">潍坊新闻综合</a><a href="dfpd.php?v=30&id=weifangds" target="_self" hidefocus="true" onMouseOver="ahover('weifangds')" onMouseOut="alink('weifangds')" id="weifangds">潍坊都市频道</a></h2>
	</li>
	<li id="li_31">
    <h1 class="lm_1"><a href="javascript:OpenChanel(31);" class="list_name" hidefocus="true">陕西省 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_31" style="display: none"><a href="dfpd.php?v=31&id=xaxwzh" target="_self" hidefocus="true" onMouseOver="ahover('xaxwzh')" onMouseOut="alink('xaxwzh')" id="xaxwzh">西安一套</a><a href="dfpd.php?v=31&id=xabhds" target="_self" hidefocus="true" onMouseOver="ahover('xabhds')" onMouseOut="alink('xabhds')" id="xabhds">西安二套</a><a href="dfpd.php?v=31&id=xaswzx" target="_self" hidefocus="true" onMouseOver="ahover('xaswzx')" onMouseOut="alink('xaswzx')" id="xaswzx">西安三套</a><a href="dfpd.php?v=31&id=xawhys" target="_self" hidefocus="true" onMouseOver="ahover('xawhys')" onMouseOut="alink('xawhys')" id="xawhys">西安四套</a><a href="dfpd.php?v=31&id=xajkkl" target="_self" hidefocus="true" onMouseOver="ahover('xajkkl')" onMouseOut="alink('xajkkl')" id="xajkkl">西安五套</a><a href="dfpd.php?v=31&id=xayyzy" target="_self" hidefocus="true" onMouseOver="ahover('xayyzy')" onMouseOut="alink('xayyzy')" id="xayyzy">西安六套</a><a href="dfpd.php?v=31&id=snrtv1" target="_self" hidefocus="true" onMouseOver="ahover('snrtv1')" onMouseOut="alink('snrtv1')" id="snrtv1">陕西新闻资讯</a><a href="dfpd.php?v=31&id=snrtv2" target="_self" hidefocus="true" onMouseOver="ahover('snrtv2')" onMouseOut="alink('snrtv2')" id="snrtv2">陕西都市青春</a><a href="dfpd.php?v=31&id=snrtv3" target="_self" hidefocus="true" onMouseOver="ahover('snrtv3')" onMouseOut="alink('snrtv3')" id="snrtv3">陕西生活频道</a><a href="dfpd.php?v=31&id=snrtv4" target="_self" hidefocus="true" onMouseOver="ahover('snrtv4')" onMouseOut="alink('snrtv4')" id="snrtv4">陕西公共频道</a><a href="dfpd.php?v=31&id=snrtv5" target="_self" hidefocus="true" onMouseOver="ahover('snrtv5')" onMouseOut="alink('snrtv5')" id="snrtv5">陕西体育休闲</a><a href="dfpd.php?v=31&id=snrtv6" target="_self" hidefocus="true" onMouseOver="ahover('snrtv6')" onMouseOut="alink('snrtv6')" id="snrtv6">陕西农林卫视</a><a href="dfpd.php?v=31&id=snrtv7" target="_self" hidefocus="true" onMouseOver="ahover('snrtv7')" onMouseOut="alink('snrtv7')" id="snrtv7">陕西秦腔频道</a></h2>
	</li>
	<li id="li_32">
    <h1 class="lm_1"><a href="javascript:OpenChanel(32);" class="list_name" hidefocus="true">河南省 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_32" style="display: none"><a href="dfpd.php?v=32&id=hntvgj" target="_self" hidefocus="true" onMouseOver="ahover('hntvgj')" onMouseOut="alink('hntvgj')" id="hntvgj">河南国际频道</a><a href="dfpd.php?v=32&id=hntvds" target="_self" hidefocus="true" onMouseOver="ahover('hntvds')" onMouseOut="alink('hntvds')" id="hntvds">河南都市频道</a><a href="dfpd.php?v=32&id=hntvms" target="_self" hidefocus="true" onMouseOver="ahover('hntvms')" onMouseOut="alink('hntvms')" id="hntvms">河南民生频道</a><a href="dfpd.php?v=32&id=qingcaiay" target="_self" hidefocus="true" onMouseOver="ahover('qingcaiay')" onMouseOut="alink('qingcaiay')" id="qingcaiay">河南中原文娱</a><a href="dfpd.php?v=32&id=hntvfz" target="_self" hidefocus="true" onMouseOver="ahover('hntvfz')" onMouseOut="alink('hntvfz')" id="hntvfz">河南法制频道</a><a href="dfpd.php?v=32&id=hntvdsj" target="_self" hidefocus="true" onMouseOver="ahover('hntvdsj')" onMouseOut="alink('hntvdsj')" id="hntvdsj">河南电视剧频道</a><a href="dfpd.php?v=32&id=hntvxw" target="_self" hidefocus="true" onMouseOver="ahover('hntvxw')" onMouseOut="alink('hntvxw')" id="hntvxw">河南新闻频道</a><a href="dfpd.php?v=32&id=hntvgw" target="_self" hidefocus="true" onMouseOver="ahover('hntvgw')" onMouseOut="alink('hntvgw')" id="hntvgw">河南欢腾购物</a><a href="dfpd.php?v=32&id=hntvgg" target="_self" hidefocus="true" onMouseOver="ahover('hntvgg')" onMouseOut="alink('hntvgg')" id="hntvgg">河南公共频道</a><a href="dfpd.php?v=32&id=hntvxnc" target="_self" hidefocus="true" onMouseOver="ahover('hntvxnc')" onMouseOut="alink('hntvxnc')" id="hntvxnc">河南新农村</a><a href="dfpd.php?v=32&id=zhezouzh" target="_self" hidefocus="true" onMouseOver="ahover('zhezouzh')" onMouseOut="alink('zhezouzh')" id="zhezouzh">郑州综合</a><a href="dfpd.php?v=32&id=zhezoushangdu" target="_self" hidefocus="true" onMouseOver="ahover('zhezoushangdu')" onMouseOut="alink('zhezoushangdu')" id="zhezoushangdu">郑州商都</a><a href="dfpd.php?v=32&id=zhenzouwt" target="_self" hidefocus="true" onMouseOver="ahover('zhenzouwt')" onMouseOut="alink('zhenzouwt')" id="zhenzouwt">郑州文体</a><a href="dfpd.php?v=32&id=zhezouss" target="_self" hidefocus="true" onMouseOver="ahover('zhezouss')" onMouseOut="alink('zhezouss')" id="zhezouss">郑州时尚</a><a href="dfpd.php?v=32&id=zhezoufz" target="_self" hidefocus="true" onMouseOver="ahover('zhezoufz')" onMouseOut="alink('zhezoufz')" id="zhezoufz">郑州法制</a><a href="dfpd.php?v=32&id=zhezoudsj" target="_self" hidefocus="true" onMouseOver="ahover('zhezoudsj')" onMouseOut="alink('zhezoudsj')" id="zhezoudsj">郑州电视剧</a><a href="dfpd.php?v=32&id=ayxwzh" target="_self" hidefocus="true" onMouseOver="ahover('ayxwzh')" onMouseOut="alink('ayxwzh')" id="ayxwzh">安阳新闻综合</a><a href="dfpd.php?v=32&id=anyangfz" target="_self" hidefocus="true" onMouseOver="ahover('anyangfz')" onMouseOut="alink('anyangfz')" id="anyangfz">安阳法制</a><a href="dfpd.php?v=32&id=anyangkj" target="_self" hidefocus="true" onMouseOver="ahover('anyangkj')" onMouseOut="alink('anyangkj')" id="anyangkj">安阳科教</a><a href="dfpd.php?v=32&id=anyangtwsh" target="_self" hidefocus="true" onMouseOver="ahover('anyangtwsh')" onMouseOut="alink('anyangtwsh')" id="anyangtwsh">安阳图文生活</a><a href="dfpd.php?v=32&id=lytvxw" target="_self" hidefocus="true" onMouseOver="ahover('lytvxw')" onMouseOut="alink('lytvxw')" id="lytvxw">洛阳新闻资讯</a><a href="dfpd.php?v=32&id=lytvds" target="_self" hidefocus="true" onMouseOver="ahover('lytvds')" onMouseOut="alink('lytvds')" id="lytvds">洛阳都市生活</a><a href="dfpd.php?v=32&id=lytvzf" target="_self" hidefocus="true" onMouseOver="ahover('lytvzf')" onMouseOut="alink('lytvzf')" id="lytvzf">洛阳科教政法</a><a href="dfpd.php?v=32&id=lytvys" target="_self" hidefocus="true" onMouseOver="ahover('lytvys')" onMouseOut="alink('lytvys')" id="lytvys">洛阳影视文娱</a></h2>
	</li>
	<li id="li_33">
    <h1 class="lm_1"><a href="javascript:OpenChanel(33);" class="list_name" hidefocus="true">河北省 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_33" style="display: none"><a href="dfpd.php?v=33&id=hbjj" target="_self" hidefocus="true" onMouseOver="ahover('hbjj')" onMouseOut="alink('hbjj')" id="hbjj">河北经济</a><a href="dfpd.php?v=33&id=hebys" target="_self" hidefocus="true" onMouseOver="ahover('hebys')" onMouseOut="alink('hebys')" id="hebys">河北影视</a><a href="dfpd.php?v=33&id=hbds" target="_self" hidefocus="true" onMouseOver="ahover('hbds')" onMouseOut="alink('hbds')" id="hbds">河北都市</a><a href="dfpd.php?v=33&id=hbgg" target="_self" hidefocus="true" onMouseOver="ahover('hbgg')" onMouseOut="alink('hbgg')" id="hbgg">河北公共</a><a href="dfpd.php?v=33&id=hbsrkj" target="_self" hidefocus="true" onMouseOver="ahover('hbsrkj')" onMouseOut="alink('hbsrkj')" id="hbsrkj">河北少儿科教</a><a href="dfpd.php?v=33&id=hbnm" target="_self" hidefocus="true" onMouseOver="ahover('hbnm')" onMouseOut="alink('hbnm')" id="hbnm">河北农民</a><a href="dfpd.php?v=33&id=sjzxw" target="_self" hidefocus="true" onMouseOver="ahover('sjzxw')" onMouseOut="alink('sjzxw')" id="sjzxw">石家庄新闻</a><a href="dfpd.php?v=33&id=sjzyl" target="_self" hidefocus="true" onMouseOver="ahover('sjzyl')" onMouseOut="alink('sjzyl')" id="sjzyl">石家庄娱乐</a><a href="dfpd.php?v=33&id=sjzsh" target="_self" hidefocus="true" onMouseOver="ahover('sjzsh')" onMouseOut="alink('sjzsh')" id="sjzsh">石家庄生活</a><a href="dfpd.php?v=33&id=sjzds" target="_self" hidefocus="true" onMouseOver="ahover('sjzds')" onMouseOut="alink('sjzds')" id="sjzds">石家庄都市</a><a href="dfpd.php?v=33&id=hdxwzh" target="_self" hidefocus="true" onMouseOver="ahover('hdxwzh')" onMouseOut="alink('hdxwzh')" id="hdxwzh">河北三佳购物</a></h2>
	</li>
	<li id="li_36">
    <h1 class="lm_1"><a href="javascript:OpenChanel(36);" class="list_name" hidefocus="true">甘肃省 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_36" style="display: none"><a href="dfpd.php?v=36&id=lanzouxw" target="_self" hidefocus="true" onMouseOver="ahover('lanzouxw')" onMouseOut="alink('lanzouxw')" id="lanzouxw">兰州新闻</a><a href="dfpd.php?v=36&id=lanzoushjj" target="_self" hidefocus="true" onMouseOver="ahover('lanzoushjj')" onMouseOut="alink('lanzoushjj')" id="lanzoushjj">兰州生活经济</a><a href="dfpd.php?v=36&id=lanzouzyty" target="_self" hidefocus="true" onMouseOver="ahover('lanzouzyty')" onMouseOut="alink('lanzouzyty')" id="lanzouzyty">兰州综艺体育</a><a href="dfpd.php?v=36&id=lanzougg" target="_self" hidefocus="true" onMouseOver="ahover('lanzougg')" onMouseOut="alink('lanzougg')" id="lanzougg">兰州公共</a><a href="dfpd.php?v=36&id=qingcailanzou" target="_self" hidefocus="true" onMouseOver="ahover('qingcailanzou')" onMouseOut="alink('qingcailanzou')" id="qingcailanzou">晴彩兰州</a><a href="dfpd.php?v=36&id=gstvjjpd" target="_self" hidefocus="true" onMouseOver="ahover('gstvjjpd')" onMouseOut="alink('gstvjjpd')" id="gstvjjpd">甘肃经济频道</a><a href="dfpd.php?v=36&id=gstvwhys" target="_self" hidefocus="true" onMouseOver="ahover('gstvwhys')" onMouseOut="alink('gstvwhys')" id="gstvwhys">甘肃文化影视</a><a href="dfpd.php?v=36&id=gstvdspd" target="_self" hidefocus="true" onMouseOver="ahover('gstvdspd')" onMouseOut="alink('gstvdspd')" id="gstvdspd">甘肃都市频道</a><a href="dfpd.php?v=36&id=gstvgg" target="_self" hidefocus="true" onMouseOver="ahover('gstvgg')" onMouseOut="alink('gstvgg')" id="gstvgg">甘肃公共频道</a><a href="dfpd.php?v=36&id=gstvsrpd" target="_self" hidefocus="true" onMouseOver="ahover('gstvsrpd')" onMouseOut="alink('gstvsrpd')" id="gstvsrpd">甘肃少儿频道</a><a href="dfpd.php?v=36&id=gstvydds" target="_self" hidefocus="true" onMouseOver="ahover('gstvydds')" onMouseOut="alink('gstvydds')" id="gstvydds">甘肃移动电视</a><a href="dfpd.php?v=36&id=gstvpzsh" target="_self" hidefocus="true" onMouseOver="ahover('gstvpzsh')" onMouseOut="alink('gstvpzsh')" id="gstvpzsh">甘肃品质生活</a></h2>
	</li>
	<li id="li_37">
    <h1 class="lm_1"><a href="javascript:OpenChanel(37);" class="list_name" hidefocus="true">广西省 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_37" style="display: none"><a href="dfpd.php?v=37&id=gxtvxwpd" target="_self" hidefocus="true" onMouseOver="ahover('gxtvxwpd')" onMouseOut="alink('gxtvxwpd')" id="gxtvxwpd">广西新闻频道</a><a href="dfpd.php?v=37&id=gxtvyspd" target="_self" hidefocus="true" onMouseOver="ahover('gxtvyspd')" onMouseOut="alink('gxtvyspd')" id="gxtvyspd">广西影视频道</a><a href="dfpd.php?v=37&id=gxtvdspd" target="_self" hidefocus="true" onMouseOver="ahover('gxtvdspd')" onMouseOut="alink('gxtvdspd')" id="gxtvdspd">广西都市频道</a><a href="dfpd.php?v=37&id=gxtvggpd" target="_self" hidefocus="true" onMouseOver="ahover('gxtvggpd')" onMouseOut="alink('gxtvggpd')" id="gxtvggpd">广西公共频道</a><a href="dfpd.php?v=37&id=gxtvgjpd" target="_self" hidefocus="true" onMouseOver="ahover('gxtvgjpd')" onMouseOut="alink('gxtvgjpd')" id="gxtvgjpd">广西国际频道</a><a href="dfpd.php?v=37&id=gxtvlsg" target="_self" hidefocus="true" onMouseOver="ahover('gxtvlsg')" onMouseOut="alink('gxtvlsg')" id="gxtvlsg">广西乐思购</a><a href="dfpd.php?v=37&id=gxtvjtpd" target="_self" hidefocus="true" onMouseOver="ahover('gxtvjtpd')" onMouseOut="alink('gxtvjtpd')" id="gxtvjtpd">广西交通频道</a><a href="dfpd.php?v=37&id=nanningxwzh" target="_self" hidefocus="true" onMouseOver="ahover('nanningxwzh')" onMouseOut="alink('nanningxwzh')" id="nanningxwzh">南宁新闻综合</a><a href="dfpd.php?v=37&id=nanningdssh" target="_self" hidefocus="true" onMouseOver="ahover('nanningdssh')" onMouseOut="alink('nanningdssh')" id="nanningdssh">南宁都市生活</a><a href="dfpd.php?v=37&id=nanningysyl" target="_self" hidefocus="true" onMouseOver="ahover('nanningysyl')" onMouseOut="alink('nanningysyl')" id="nanningysyl">南宁影视娱乐</a><a href="dfpd.php?v=37&id=nanninggg" target="_self" hidefocus="true" onMouseOver="ahover('nanninggg')" onMouseOut="alink('nanninggg')" id="nanninggg">南宁公共</a><a href="dfpd.php?v=37&id=liuzouxw" target="_self" hidefocus="true" onMouseOver="ahover('liuzouxw')" onMouseOut="alink('liuzouxw')" id="liuzouxw">柳州新闻</a><a href="dfpd.php?v=37&id=liuzougg" target="_self" hidefocus="true" onMouseOver="ahover('liuzougg')" onMouseOut="alink('liuzougg')" id="liuzougg">柳州公共</a><a href="dfpd.php?v=37&id=liuzoukj" target="_self" hidefocus="true" onMouseOver="ahover('liuzoukj')" onMouseOut="alink('liuzoukj')" id="liuzoukj">柳州科教</a></h2>
	</li>
	<li id="li_34">
    <h1 class="lm_1"><a href="javascript:OpenChanel(34);" class="list_name" hidefocus="true">内蒙古<font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_34" style="display: none"><a href="dfpd.php?v=34&id=nmgtvxwzh" target="_self" hidefocus="true" onMouseOver="ahover('nmgtvxwzh')" onMouseOut="alink('nmgtvxwzh')" id="nmgtvxwzh">内蒙古新闻综合</a><a href="dfpd.php?v=34&id=nmgtvjjsh" target="_self" hidefocus="true" onMouseOver="ahover('nmgtvjjsh')" onMouseOut="alink('nmgtvjjsh')" id="nmgtvjjsh">内蒙古经济生活</a><a href="dfpd.php?v=34&id=nmgtvwtyl" target="_self" hidefocus="true" onMouseOver="ahover('nmgtvwtyl')" onMouseOut="alink('nmgtvwtyl')" id="nmgtvwtyl">内蒙古文体娱乐</a><a href="dfpd.php?v=34&id=nmgtvnmpd" target="_self" hidefocus="true" onMouseOver="ahover('nmgtvnmpd')" onMouseOut="alink('nmgtvnmpd')" id="nmgtvnmpd">内蒙古农牧频道</a><a href="dfpd.php?v=34&id=nmgtvsrpd" target="_self" hidefocus="true" onMouseOver="ahover('nmgtvsrpd')" onMouseOut="alink('nmgtvsrpd')" id="nmgtvsrpd">内蒙古少儿频道</a><a href="dfpd.php?v=34&id=nmgtvmgywhpd" target="_self" hidefocus="true" onMouseOver="ahover('nmgtvmgywhpd')" onMouseOut="alink('nmgtvmgywhpd')" id="nmgtvmgywhpd">内蒙古蒙古语文化频道</a><a href="dfpd.php?v=34&id=nmgtvmyws" target="_self" hidefocus="true" onMouseOver="ahover('nmgtvmyws')" onMouseOut="alink('nmgtvmyws')" id="nmgtvmyws">内蒙古蒙语卫视</a></h2>
	</li>
	<li id="li_35">
    <h1 class="lm_1"><a href="javascript:OpenChanel(35);" class="list_name" hidefocus="true">青海省<font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_35" style="display: none"><a href="dfpd.php?v=35&id=xiningxw" target="_self" hidefocus="true" onMouseOver="ahover('xiningxw')" onMouseOut="alink('xiningxw')" id="xiningxw">西宁新闻</a><a href="dfpd.php?v=35&id=xiningsh" target="_self" hidefocus="true" onMouseOver="ahover('xiningsh')" onMouseOut="alink('xiningsh')" id="xiningsh">西宁生活</a><a href="dfpd.php?v=35&id=qinhaids" target="_self" hidefocus="true" onMouseOver="ahover('qinhaids')" onMouseOut="alink('qinhaids')" id="qinhaids">青海都市</a><a href="dfpd.php?v=35&id=qinhaijjsh" target="_self" hidefocus="true" onMouseOver="ahover('qinhaijjsh')" onMouseOut="alink('qinhaijjsh')" id="qinhaijjsh">青海经济生活</a><a href="dfpd.php?v=35&id=qinhaiadws" target="_self" hidefocus="true" onMouseOver="ahover('qinhaiadws')" onMouseOut="alink('qinhaiadws')" id="qinhaiadws">安多卫视</a></h2>
	</li>
 
  <li id="li_39">
    <h1 class="lm_1"><a href="javascript:OpenChanel(39);" class="list_name" hidefocus="true">福建省<font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_39" style="display: none"><a href="dfpd.php?v=39&id=fjtvzh" target="_self" hidefocus="true" onMouseOver="ahover('fjtvzh')" onMouseOut="alink('fjtvzh')" id="fjtvzh">福建综合频道</a><a href="dfpd.php?v=39&id=dongnan" target="_self" hidefocus="true" onMouseOver="ahover('dongnan')" onMouseOut="alink('dongnan')" id="dongnan">东南卫视</a><a href="dfpd.php?v=39&id=fjtvgg" target="_self" hidefocus="true" onMouseOver="ahover('fjtvgg')" onMouseOut="alink('fjtvgg')" id="fjtvgg">福建公共频道</a><a href="dfpd.php?v=39&id=fjtvxw" target="_self" hidefocus="true" onMouseOver="ahover('fjtvxw')" onMouseOut="alink('fjtvxw')" id="fjtvxw">福建新闻频道</a><a href="dfpd.php?v=39&id=fjtvdsj" target="_self" hidefocus="true" onMouseOver="ahover('fjtvdsj')" onMouseOut="alink('fjtvdsj')" id="fjtvdsj">福建电视剧频道</a><a href="dfpd.php?v=39&id=fjtvly" target="_self" hidefocus="true" onMouseOver="ahover('fjtvly')" onMouseOut="alink('fjtvly')" id="fjtvly">福建旅游频道</a><a href="dfpd.php?v=39&id=fjtvjs" target="_self" hidefocus="true" onMouseOver="ahover('fjtvjs')" onMouseOut="alink('fjtvjs')" id="fjtvjs">福建经视频道</a><a href="dfpd.php?v=39&id=fjtvty" target="_self" hidefocus="true" onMouseOver="ahover('fjtvty')" onMouseOut="alink('fjtvty')" id="fjtvty">福建体育频道</a><a href="dfpd.php?v=39&id=fjtvsr" target="_self" hidefocus="true" onMouseOver="ahover('fjtvsr')" onMouseOut="alink('fjtvsr')" id="fjtvsr">福建少儿频道</a><a href="dfpd.php?v=39&id=hxws" target="_self" hidefocus="true" onMouseOver="ahover('hxws')" onMouseOut="alink('hxws')" id="hxws">海峡卫视</a><a href="dfpd.php?v=39&id=fzntvzh" target="_self" hidefocus="true" onMouseOver="ahover('fzntvzh')" onMouseOut="alink('fzntvzh')" id="fzntvzh">福州综合频道</a><a href="dfpd.php?v=39&id=fzntvys" target="_self" hidefocus="true" onMouseOver="ahover('fzntvys')" onMouseOut="alink('fzntvys')" id="fzntvys">福州影视频道</a><a href="dfpd.php?v=39&id=fzntvsh" target="_self" hidefocus="true" onMouseOver="ahover('fzntvsh')" onMouseOut="alink('fzntvsh')" id="fzntvsh">福州生活频道</a><a href="dfpd.php?v=39&id=fzntvsr" target="_self" hidefocus="true" onMouseOver="ahover('fzntvsr')" onMouseOut="alink('fzntvsr')" id="fzntvsr">福州少儿频道</a><a href="dfpd.php?v=39&id=xmtv1" target="_self" hidefocus="true" onMouseOver="ahover('xmtv1')" onMouseOut="alink('xmtv1')" id="xmtv1">厦门一套</a><a href="dfpd.php?v=39&amp;id=xmtv2" target="_self" hidefocus="true" onmouseover="ahover('xmtv2')" onmouseout="alink('xmtv2')" id="xmtv2">厦门二套</a><a href="dfpd.php?v=39&amp;id=xmtv3" target="_self" hidefocus="true" onmouseover="ahover('xmtv3')" onmouseout="alink('xmtv3')" id="xmtv3">厦门三套</a><a href="dfpd.php?v=39&amp;id=xmtv4" target="_self" hidefocus="true" onmouseover="ahover('xmtv4')" onmouseout="alink('xmtv4')" id="xmtv4">厦门四套</a><a href="dfpd.php?v=39&amp;id=xmtv5" target="_self" hidefocus="true" onmouseover="ahover('xmtv5')" onmouseout="alink('xmtv5')" id="xmtv5">厦门移动电视</a></h2>
	</li>
 
  <li id="li_40">
    <h1 class="lm_1"><a href="javascript:OpenChanel(40);" class="list_name" hidefocus="true">黑龙江省<font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_40" style="display: none"><a href="dfpd.php?v=40&id=hljtvxw" target="_self" hidefocus="true" onMouseOver="ahover('hljtvxw')" onMouseOut="alink('hljtvxw')" id="hljtvxw">黑龙江新闻频道</a><a href="dfpd.php?v=40&id=hljtvwy" target="_self" hidefocus="true" onMouseOver="ahover('hljtvwy')" onMouseOut="alink('hljtvwy')" id="hljtvwy">黑龙江文艺频道</a><a href="dfpd.php?v=40&id=hljtvys" target="_self" hidefocus="true" onMouseOver="ahover('hljtvys')" onMouseOut="alink('hljtvys')" id="hljtvys">黑龙江影视频道</a><a href="dfpd.php?v=40&id=hljtvds" target="_self" hidefocus="true" onMouseOver="ahover('hljtvds')" onMouseOut="alink('hljtvds')" id="hljtvds">黑龙江都市频道</a><a href="dfpd.php?v=40&id=hljtvgg" target="_self" hidefocus="true" onMouseOver="ahover('hljtvgg')" onMouseOut="alink('hljtvgg')" id="hljtvgg">黑龙江公共频道</a><a href="dfpd.php?v=40&id=hljtvsr" target="_self" hidefocus="true" onMouseOver="ahover('hljtvsr')" onMouseOut="alink('hljtvsr')" id="hljtvsr">黑龙江少儿频道</a><a href="dfpd.php?v=40&id=hljtvdaos" target="_self" hidefocus="true" onMouseOver="ahover('hljtvdaos')" onMouseOut="alink('hljtvdaos')" id="hljtvdaos">黑龙江导视频道</a><a href="dfpd.php?v=40&id=hljtvnk" target="_self" hidefocus="true" onMouseOver="ahover('hljtvnk')" onMouseOut="alink('hljtvnk')" id="hljtvnk">黑龙江农垦频道</a><a href="dfpd.php?v=40&id=hrbtvzh" target="_self" hidefocus="true" onMouseOver="ahover('hrbtvzh')" onMouseOut="alink('hrbtvzh')" id="hrbtvzh">哈尔滨新闻综合频道</a><a href="dfpd.php?v=40&id=hrbtvys" target="_self" hidefocus="true" onMouseOver="ahover('hrbtvys')" onMouseOut="alink('hrbtvys')" id="hrbtvys">哈尔滨影视频道</a><a href="dfpd.php?v=40&id=hrbtvsh" target="_self" hidefocus="true" onMouseOver="ahover('hrbtvsh')" onMouseOut="alink('hrbtvsh')" id="hrbtvsh">哈尔滨生活频道</a><a href="dfpd.php?v=40&id=hrbtvyl" target="_self" hidefocus="true" onMouseOver="ahover('hrbtvyl')" onMouseOut="alink('hrbtvyl')" id="hrbtvyl">哈尔滨娱乐频道</a><a href="dfpd.php?v=40&amp;id=hrbtvzx" target="_self" hidefocus="true" onmouseover="ahover('hrbtvzx')" onmouseout="alink('hrbtvzx')" id="hrbtvzx">哈尔滨都市资讯频道</a></h2>
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
OpenChanel(<?phpecho $v;?>);
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
