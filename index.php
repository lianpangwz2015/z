
<?php
include_once( "list.php");
include_once( "config.php");
include_once( "list2.php");

global $list;
$str = 'pangwz2016';  
$key = 'www.letvlive.comletvlive';  
function authcode($string, $operation = 'DECODE', $key = '', $expiry = 60){
 
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
if($_GET['id']==""){
$zhengze='/<channel_1_pc>(.*?)#(.*?)#(.*?)<channel_1_pc>/';
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<title>乐视直播-湖南卫视直播-浙江卫视直播-凤凰卫视直播-江苏卫视直播-东方卫视直播-卫视直播-央视直播-乐视直播网</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="乐视直播网,乐视直播，湖南卫视直播,江苏卫视直播,浙江卫视直播,凤凰卫视直播,央视直播,卫视直播,cctv5直播" />
<meta name="description" content="<?php global $description; echo $description;?>" />
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
#welcome a{color:red}
.zhibopubicbox{width:960px;margin-bottom:10px;overflow:hidden;border: 1px solid #999999;_height:1%;margin-top:2px;margin-left:0px;}
.zhibotitle{height:42px; no-repeat;margin-top:2px;margin-right:5px;margin-bottom:3px;margin-left:5px;padding-left:0px;}
.zhibowxts{background-color:#F5F5F5;color:#888;height:522px;width:auto;margin-top:0px;margin-right:5px;margin-bottom:0px;margin-left:0px;position:relative;}
.zhibowxtb{background-color:#F5F5F5;color:#888;height:300px;width:auto;margin-top:0px;margin-right:5px;margin-bottom:0px;margin-left:5px;position:relative;}
.zhiboplaybox{width:960px;padding-top:0px;padding-bottom:5px;clear:both;}
.zhibowxts .bqy{width:960px;height:90px;border:1px solid #ccc;float:left;padding-left:0px;}
.zhibowxts .snvtva{width:695px;height:522px;margin:2px 0px 0px 0px;border:1px solid #ccc;float:left;}
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
.zhibowxtb a.zhibo{color:#000000}
.style1 {color: #000000}
.divplay {height: 100%;width: 100%;}
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
|   <a href="srpd.php?id=jykt" target="_self" class="red">少儿频道</a    
|
      
 
      
 
      
 
      

      
 

      
 
      

      
 
      
></div>
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
  <script language="JavaScript"> document.writeln("<iframe id=\"c_play\" name=\"c_play\" src=\"<? global $zb; echo $zb;?>\"  width=\"100%\" height=\"479\" scrolling=\"auto\" frameborder=\"0\" border=\"0\" allowtransparency=\"true\"></iframe>");</script>

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








<!--VIDEO LIST-->
<div class="video_list clearfix">
<div class="plist">
    <a href="<?php echo $playurl1;?>" target="_blank" name="<? echo $title1;?>"><img class="listpic" src="<? echo $img1;?>" alt="<?php echo $title1;?>"  width="200"  height="138" ><span class="v_bq_hong"><? echo ($le1);?></span><span class="v_bg"></span><span class="v_bq_vico"></span></a>
    <h2><?php echo $title1;?></h2>
    
</div>

<div class="plist">
    <a href="<?php echo $playurl2;?>" target="_blank" name="<? echo $title2;?>"><img class="listpic" src="<? echo $img2;?>" alt="<? echo $title2;?>"  width="200"  height="138" ><span class="v_bq_lan"><? echo ($le2);?></span><span class="v_bg"></span><span class="v_bq_vico"></span></a>
    <h2><? echo $title2;?></h2>
   
</div>

<div class="plist">
    <a href="<?php echo $playurl3;?>" target="_blank" name="<? echo $title3;?>"><img class="listpic" src="<? echo $img3;?>" alt="<? echo $title3;?>"  width="200"  height="138" ><span class="v_bq_hong"><? echo ($le3);?></span><span class="v_bg"></span><span class="v_bq_vico"></span></a>
    <h2><? echo $title3;?></h2>
    
</div>

<div class="plist">
    <a href="<?php echo $playurl4;?>" target="_blank" name="<? echo $title4;?>"><img class="listpic" src="<? echo $img4;?>" alt="<? echo $title4;?>"  width="200"  height="138" ><span class="v_bq_lan"><? echo ($le4);?></span><span class="v_bg"></span><span class="v_bq_vico"></span></a>
    <h2><? echo $title4;?></h2>
   
</div>



<div class="plist">
    <a href="<?php echo $playurl5;?>" target="_blank" name="<? echo $title5;?>"><img class="listpic" src="<? echo $img5;?>" alt="<? echo $title5;?>"  width="200"  height="138" ><span class="v_bq_hong"><? echo ($le5);?></span><span class="v_bg"></span><span class="v_bq_vico"></span></a>
    <h2><? echo $title5;?></h2>
   
</div>

<div class="plist">
    <a href="<?php echo $playurl6;?>" target="_blank" name="<? echo $title6;?>"><img class="listpic" src="<? echo $img6;?>" alt="<? echo $title6;?>"  width="200"  height="138" ><span class="v_bq_lan"><? echo ($le6);?></span><span class="v_bg"></span><span class="v_bq_vico"></span></a>
    <h2><? echo $title6;?></h2>
   
</div>

<div class="plist">
    <a href="<?php echo $playurl7;?>" target="_blank" name="<? echo $title7;?>"><img class="listpic" src="<? echo $img7;?>" alt="<? echo $title7;?>"  width="200"  height="138" ><span class="v_bq_hong"><? echo ($le7);?></span><span class="v_bg"></span><span class="v_bq_vico"></span></a>
    <h2><? echo $title7;?></h2>
  
</div>
<div class="plist">
    <a href="<?php echo $playurl8;?>" target="_blank" name="<? echo $title8;?>"><img class="listpic" src="<? echo $img8;?>" alt="<? echo $title8;?>"  width="200"  height="138" ><span class="v_bq_lan"><? echo ($le8);?></span><span class="v_bg"></span><span class="v_bq_vico"></span></a>
    <h2><? echo $title8;?></h2>
   
</div>
</div>  

<!-- help/End -->
 <!--VIDEO LIST--></td>
<td id="sh" width="9" bgcolor="#171a1d" style="cursor:hand" onClick="showsubmenu()"><span id="idFlag">
  <div class="close" id="sh"><a href="#" title="按此切换到精简模式"></a></div></span></td>
<td width="210" id="tv_list" bgcolor="#000000"><div id="halist" style="display:block;background-color: #000000;height:100%;">
  <ul id="menu">
<li id="li_1">
  <h1 class="lm_1"><a href="javascript:OpenChanel(1);" class="list_name" hidefocus="true">门户直播 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
  <h2 class="lm_2" id="CHT_1" style="display: none"><a href="index.php?id=channel_1_pc" target="_self" hidefocus="true" onMouseOver="ahover('lspc')" onMouseOut="alink('lspc')" id="lspc" >综合</a><a href="index.php?id=letv_movie_800" target="_self" hidefocus="true" onMouseOver="ahover('lsdy')" onMouseOut="alink('lsdy')" id="lsdy" >电影</a><a href="index.php?id=letv_tv_800" target="_self" hidefocus="true" onMouseOver="ahover('lsdsj')" onMouseOut="alink('lsdsj')" id="lsdsj" >电视剧</a><a href="index.php?id=letv_comic_800" target="_self" hidefocus="true" onMouseOver="ahover('lsdm')" onMouseOut="alink('lsdm')" id="lsdm" >动漫</a><a href="index.php?id=letv_ent_800" target="_self" hidefocus="true" onMouseOver="ahover('lswy')" onMouseOut="alink('lswy')" id="lswy" >综艺</a><a href="index.php?id=letv_sports_800" target="_self" hidefocus="true" onMouseOver="ahover('lsty')" onMouseOut="alink('lsty')" id="lsty" >体育</a><a href="index.php?id=letv_wangqiu_800" target="_self" hidefocus="true" onMouseOver="ahover('lswq')" onMouseOut="alink('lswq')" id="lswq" >网球</a><a href="index.php?id=letv_music_800" target="_self" hidefocus="true" onMouseOver="ahover('lsmusic')" onMouseOut="alink('lsmusic')" id="lsmusic" >音乐</a><a href="index.php?id=letv_ustv_800" target="_self" hidefocus="true" onMouseOver="ahover('lsmj')" onMouseOut="alink('lsmj')" id="lsmj" >美剧</a><a href="index.php?id=letv_lanqiu_800" target="_self" hidefocus="true" onMouseOver="ahover('lsgb')" onMouseOut="alink('lsgb')" id="lsgb" >篮球</a><a href="index.php?id=letv_koreatv_800" target="_self" hidefocus="true" onMouseOver="ahover('lshj')" onMouseOut="alink('lshj')" id="lshj" >韩剧</a><a href="index.php?id=letv_jilu_800" target="_self" hidefocus="true" onMouseOver="ahover('lsjilu')" onMouseOut="alink('lsjilu')" id="lsjilu" >科教</a><a href="index.php?id=letv_make_800" target="_self" hidefocus="true" onMouseOver="ahover('lszzj')" onMouseOut="alink('lszzj')" id="lszzj" >自制剧</a><a href="index.php?id=letv_zuqiu_800" target="_self" hidefocus="true" onMouseOver="ahover('lsgef')" onMouseOut="alink('lsgef')" id="lsgef" >足球</a><a href="index.php?id=letv_1080P_3000" target="_self" hidefocus="true" onMouseOver="ahover('ls1080')" onMouseOut="alink('ls1080')" id="ls1080" >1080P</a><a href="index.php?id=xiqu" target="_self" hidefocus="true" onMouseOver="ahover('lsdyph')" onMouseOut="alink('lsdyph')" id="lsdyph" >戏曲</a><a href="index.php?id=lb_dzdy" target="_self" hidefocus="true" onMouseOver="ahover('lstvph')" onMouseOut="alink('lstvph')" id="lstvph" >动作电影</a><a href="index.php?id=lb_comedy" target="_self" hidefocus="true" onMouseOver="ahover('lstvxj')" onMouseOut="alink('lstvxj')" id="lstvxj" >喜剧电影</a><a href="index.php?id=lb_dzjj" target="_self" hidefocus="true" onMouseOver="ahover('dzjj')" onMouseOut="alink('dzjj')" id="dzjj" >电子竞技</a><a href="index.php?id=lb_omkt_1800" target="_self" hidefocus="true" onMouseOver="ahover('omkt')" onMouseOut="alink('omkt')" id="omkt" >欧美卡通</a></h2>
</li>

 
  
 <li id="li_2">
  <h1 class="lm_1"><a href="javascript:OpenChanel(2);" class="list_name" hidefocus="true">电影频道 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
  <h2 class="lm_2" id="CHT_2" style="display: none"><a href="dyletv.php" target="_self" hidefocus="true" onMouseOver="ahover('dyletv')" onMouseOut="alink('dyletv')" id="dyletv" >乐视电影</a><a href="dysohu.php" target="_self" hidefocus="true" onMouseOver="ahover('dysohu')" onMouseOut="alink('dysohu')" id="dysohu" >搜狐电影</a><a href="dyfx.php" target="_self" hidefocus="true" onMouseOver="ahover('dyfx')" onMouseOut="alink('dyfx')" id="dyfx" >风行电影</a><a href="dyyouku.php" target="_self" hidefocus="true" onMouseOver="ahover('dyyouku')" onMouseOut="alink('dyyouku')" id="dyyouku" >优酷电影</a></h2>
</li> 

<li id="li_3">
  <h1 class="lm_1"><a href="javascript:OpenChanel(3);" class="list_name" hidefocus="true">电视剧频道 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
  <h2 class="lm_2" id="CHT_3" style="display: none"><a href="dsj.php" target="_self" hidefocus="true" onMouseOver="ahover('dsj')" onMouseOut="alink('dsj')" id="dsj" >搜狐电视剧</a><a href="letvdsj.php" target="_self" hidefocus="true" onMouseOver="ahover('letvdsj')" onMouseOut="alink('letvdsj')" id="letvdsj" >乐视电视剧</a></h2>
</li> 
    
</ul>
</div>
</td>
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

友情链接： <a href="tvlive.php" target="_blank">乐视直播网旧版</a>&nbsp  所有资源均来自互联网，如有侵犯版权，请联系我。<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_4946187'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s6.cnzz.com/stat.php%3Fid%3D4946187%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script></td>
 
</div>
<?php include_once("baidu_js_push.php") ?>
</body>
</html>
