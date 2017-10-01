<?
include 'config.php';
?>
<html>
<head>
<title><? global $title; echo $title; ?>-<? global $site; echo $site; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<? global $keyword; echo $keyword;?>" />
<meta name="description" content="<? global $description; echo $description;?>" />
<style type="text/css">
<!--
body{ width:1300;overflow-x: hidden;overflow-y: auto;margin:0 auto;}
div{margin:0 auto}
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

.mlt {background-image:url(images/bj.gif);COLOR: #ff6600;TEXT-INDENT: 5px; padding-top:5px; HEIGHT: 22px; LINE-HEIGHT: 22px;TEXT-ALIGN: center;}
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
-->
</style>


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
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" oncontextmenu=window.event.returnValue=false>
<div id="welcome"></div>
<table width="100%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td><object id="play" name="play" style="border:0px" type="text/x-scriptlet" data="tv.php?id=hunan" width=100% height=100%></object></td>
<td id="sh" width="9" bgcolor="#171a1d" style="cursor:hand" onClick="showsubmenu()"><span id="idFlag">
  <div class="close" id="sh"><a href="#" title="按此切换到精简模式"></a></div></span></td>
<td width="210" id="tv_list" bgcolor="#000000">
<br>
<div class="mlt">
  <form name="searchform"action="tv.php" target="play" style="height:22px; margin:0px; padding:0px; list-style:none;font-size:12px;">乐视直播

      <input type="text" name="key" id="key" style="width:90px; height:16px; margin:0px; color:#FFFFFF; background-color:#000000; border:0px #000000 solid" autocomplete="off"/>
	 <input type="submit" value="搜台"  style="width:45px; height:18px; " autocomplete="off"/>
  </form>
</div>
<div id="halist" style="display:block;background-color: #000000;height:100%;overflow:scroll;SCROLLBAR-FACE-COLOR: #444; SCROLLBAR-HIGHliGHT-COLOR: #999; SCROLLBAR-SHADOW-COLOR: #222; SCROLLBAR-3DliGHT-COLOR: #000; SCROLLBAR-ARROW-COLOR: #ccc; SCROLLBAR-TRACK-COLOR: #666; SCROLLBAR-DARKSHADOW-COLOR: #111;">
  <ul id="menu"><li id="li_0">
  <h1 class="lm_1"><a href="javascript:OpenChanel(0);" class="list_name" hidefocus="true">门户直播 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
  <h2 class="lm_2" id="CHT_0" style="display: none"><a href="tv1.php?id=channel_1_pc" target="play" hidefocus="true" onMouseOver="ahover('lspc')" onMouseOut="alink('lspc')" id="lspc" >乐视综合</a><a href="tv1.php?id=letv_movie_800" target="play" hidefocus="true" onMouseOver="ahover('lsdy')" onMouseOut="alink('lsdy')" id="lsdy" >乐视电影</a><a href="tv1.php?id=letv_tv_800" target="play" hidefocus="true" onMouseOver="ahover('lsdsj')" onMouseOut="alink('lsdsj')" id="lsdsj" >乐视电视剧</a><a href="tv1.php?id=letv_comic_800" target="play" hidefocus="true" onMouseOver="ahover('lsdm')" onMouseOut="alink('lsdm')" id="lsdm" >乐视动漫</a><a href="tv.php?id=letv_ent_800" target="play" hidefocus="true" onMouseOver="ahover('lswy')" onMouseOut="alink('lswy')" id="lswy" >乐视文娱</a><a href="tv1.php?id=letv_sports_800" target="play" hidefocus="true" onMouseOver="ahover('lsty')" onMouseOut="alink('lsty')" id="lsty" >乐视体育</a><a href="tv1.php?id=letv_wangqiu_800" target="play" hidefocus="true" onMouseOver="ahover('lswq')" onMouseOut="alink('lswq')" id="lswq" >乐视网球</a><a href="tv1.php?id=letv_music_800" target="play" hidefocus="true" onMouseOver="ahover('lsmusic')" onMouseOut="alink('lsmusic')" id="lsmusic" >乐视音乐</a><a href="tv1.php?id=letv_ustv_800" target="play" hidefocus="true" onMouseOver="ahover('lsmj')" onMouseOut="alink('lsmj')" id="lsmj" >乐视美剧</a><a href="tv1.php?id=letv_genbo_800" target="play" hidefocus="true" onMouseOver="ahover('lsgb')" onMouseOut="alink('lsgb')" id="lsgb" >乐视跟播</a><a href="tv1.php?id=letv_koreatv_800" target="play" hidefocus="true" onMouseOver="ahover('lshj')" onMouseOut="alink('lshj')" id="lshj" >乐视韩剧</a><a href="tv1.php?id=letv_jilu_800" target="play" hidefocus="true" onMouseOver="ahover('lsjilu')" onMouseOut="alink('lsjilu')" id="lsjilu" >乐视记录片</a><a href="tv1.php?id=letv_make_800" target="play" hidefocus="true" onMouseOver="ahover('lszzj')" onMouseOut="alink('lszzj')" id="lszzj" >乐视自制剧</a><a href="tv1.php?id=letv_golf_800" target="play" hidefocus="true" onMouseOver="ahover('lsgef')" onMouseOut="alink('lsgef')" id="lsgef" >乐视高尔夫</a><a href="tv1.php?id=letv_1080P_3000" target="play" hidefocus="true" onMouseOver="ahover('ls1080')" onMouseOut="alink('ls1080')" id="ls1080" >乐视1080P</a><a href="tv1.php?id=movie_trailer_800" target="play" hidefocus="true" onMouseOver="ahover('lsdyph')" onMouseOut="alink('lsdyph')" id="lsdyph" >乐视电影片花</a><a href="tv1.php?id=tv_trailer_800" target="play" hidefocus="true" onMouseOver="ahover('lstvph')" onMouseOut="alink('lstvph')" id="lstvph" >乐视电视剧片花</a></h2>
</li>
<li id="li_5">
  <h1 class="lm_1"><a href="javascript:OpenChanel(5);" class="list_name" hidefocus="true">中央频道 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
  <h2 class="lm_2" id="CHT_5" style="display: none"><a href="tv.php?id=cctv1" target="play" hidefocus="true" onMouseOver="ahover('cctv1')" onMouseOut="alink('cctv1')" id="cctv1">CCTV-1综合 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=cctv2" target="play" hidefocus="true" onMouseOver="ahover('cctv2')" onMouseOut="alink('cctv2')" id="cctv2">CCTV-2财经 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=cctv3" target="play" hidefocus="true" onMouseOver="ahover('cctv3')" onMouseOut="alink('cctv3')" id="cctv3">CCTV-3综艺 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=cctv4" target="play" hidefocus="true" onMouseOver="ahover('cctv4')" onMouseOut="alink('cctv4')" id="cctv4">CCTV-4中文国际(亚) <font style="color:#99cc00">回看</font></a><a href="tv.php?id=cctv5" target="play" hidefocus="true" onMouseOver="ahover('cctv5')" onMouseOut="alink('cctv5')" id="cctv5">CCTV-5体育 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=cctv6" target="play" hidefocus="true" onMouseOver="ahover('cctv6')" onMouseOut="alink('cctv6')" id="cctv6">CCTV-6电影 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=cctv7" target="play" hidefocus="true" onMouseOver="ahover('cctv7')" onMouseOut="alink('cctv7')" id="cctv7">CCTV-7军事·农业 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=cctv8" target="play" hidefocus="true" onMouseOver="ahover('cctv8')" onMouseOut="alink('cctv8')" id="cctv8">CCTV-8电视剧 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=cctv9d" target="play" hidefocus="true" onMouseOver="ahover('cctvjilu')" onMouseOut="alink('cctvjilu')" id="cctvjilu">CCTV-9纪录 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=cctv10" target="play" hidefocus="true" onMouseOver="ahover('cctv10')" onMouseOut="alink('cctv10')" id="cctv10">CCTV-10科教 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=cctv11" target="play" hidefocus="true" onMouseOver="ahover('cctv11')" onMouseOut="alink('cctv11')" id="cctv11">CCTV-11戏曲 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=cctv12" target="play" hidefocus="true" onMouseOver="ahover('cctv12')" onMouseOut="alink('cctv12')" id="cctv12">CCTV-12社会与法 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=cctv13" target="play" hidefocus="true" onMouseOver="ahover('news')" onMouseOut="alink('news')" id="news">CCTV-13新闻 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=cctvchildren" target="play" hidefocus="true" onMouseOver="ahover('cctvkids')" onMouseOut="alink('cctvkids')" id="cctvkids">CCTV-14少儿 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=cctvmusic" target="play" hidefocus="true" onMouseOver="ahover('cctvmusic')" onMouseOut="alink('cctvmusic')" id="cctvmusic">CCTV-15音乐 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=diyijuchang" target="play" hidefocus="true" onMouseOver="ahover('cctvdyjc')" onMouseOut="alink('cctvdyjc')" id="cctvdyjc">CCTV-第一剧场 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=huaijiujuchang" target="play" hidefocus="true" onMouseOver="ahover('cctvhjjc')" onMouseOut="alink('cctvhjjc')" id="cctvhjjc">CCTV-怀旧剧场 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=fengyunzuqiu" target="play" hidefocus="true" onMouseOver="ahover('fyzq')" onMouseOut="alink('fyzq')" id="fyzq">CCTV-风云足球 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=fengyunyinyue" target="play" hidefocus="true" onMouseOver="ahover('fyyy')" onMouseOut="alink('fyyy')" id="fyyy">CCTV-风云音乐 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=faxianzhilv" target="play" hidefocus="true" onMouseOver="ahover('fxzl')" onMouseOut="alink('fxzl')" id="fxzl">CCTV-发现之旅 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=shijiedili" target="play" hidefocus="true" onMouseOver="ahover('sjdl')" onMouseOut="alink('sjdl')" id="sjdl">CCTV-世界地理 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=gaoerfuwangqiu" target="play" hidefocus="true" onMouseOver="ahover('cctvgefwq')" onMouseOut="alink('cctvgefwq')" id="cctvgefwq">CCTV-高尔夫网球 <font style="color:#99cc00"></font></a><a href="tv.php?id=guofangjunshi" target="play" hidefocus="true" onMouseOver="ahover('cctvgfjs')" onMouseOut="alink('cctvgfjs')" id="cctvgfjs">CCTV-国防军事</a></h2>
  </li>

<li id="li_1">
  <h1 class="lm_1"><a href="javascript:OpenChanel(1);" class="list_name" hidefocus="true">卫视频道 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
  <h2 class="lm_2" id="CHT_1" style="display: none"><a href="tv.php?id=hunan" target="play" hidefocus="true" onMouseOver="ahover('hunan_1')" onMouseOut="alink('hunan_1')" id="hunan_1">湖南卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=jiangsu" target="play" hidefocus="true" onMouseOver="ahover('jiangsu_1')" onMouseOut="alink('jiangsu_1')" id="jiangsu_1">江苏卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=zhejiang" target="play" hidefocus="true" onMouseOver="ahover('zhejiang_1')" onMouseOut="alink('zhejiang_1')" id="zhejiang_1">浙江卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=anhui" target="play" hidefocus="true" onMouseOver="ahover('anhui_1')" onMouseOut="alink('anhui_1')" id="anhui_1">安徽卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=btv1" target="play" hidefocus="true" onMouseOver="ahover('beijing_1')" onMouseOut="alink('beijing_1')" id="beijing_1">北京卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=tianjin" target="play" hidefocus="true" onMouseOver="ahover('tianjin_1')" onMouseOut="alink('tianjin_1')" id="tianjin_1">天津卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=liaoning" target="play" hidefocus="true" onMouseOver="ahover('liaoning_1')" onMouseOut="alink('liaoning_1')" id="liaoning_1">辽宁卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=jiangxi" target="play" hidefocus="true" onMouseOver="ahover('jiangxi_1')" onMouseOut="alink('jiangxi_1')" id="jiangxi_1">江西卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=heilongjiang" target="play" hidefocus="true" onMouseOver="ahover('heilongjiang_1')" onMouseOut="alink('heilongjiang_1')" id="heilongjiang_1">黑龙江卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=shandong" target="play" hidefocus="true" onMouseOver="ahover('shandong_1')" onMouseOut="alink('shandong_1')" id="shandong_1">山东卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=dongfang" target="play" hidefocus="true" onMouseOver="ahover('dongfang_1')" onMouseOut="alink('dongfang_1')" id="dongfang_1">东方卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=yunnan" target="play" hidefocus="true" onMouseOver="ahover('yunnan_1')" onMouseOut="alink('yunnan_1')" id="yunnan_1">云南卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=sichuan" target="play" hidefocus="true" onMouseOver="ahover('sichuan_1')" onMouseOut="alink('sichuan_1')" id="sichuan_1">四川卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=henan" target="play" hidefocus="true" onMouseOver="ahover('henan_1')" onMouseOut="alink('henan_1')" id="henan_1">河南卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=guangdong" target="play" hidefocus="true" onMouseOver="ahover('guangdong_1')" onMouseOut="alink('guangdong_1')" id="guangdong_1">广东卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=nanfang" target="play" hidefocus="true" onMouseOver="ahover('tvs2_1')" onMouseOut="alink('tvs2_1')" id="tvs2_1">南方卫视 <font style="color:#99cc00"></font></a><a href="tv.php?id=shenzhenweishi" target="play" hidefocus="true" onMouseOver="ahover('szws_1')" onMouseOut="alink('szws_1')" id="szws_1">深圳卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=hubei" target="play" hidefocus="true" onMouseOver="ahover('hubei_1')" onMouseOut="alink('hubei_1')" id="hubei_1">湖北卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=dongnan" target="play" hidefocus="true" onMouseOver="ahover('fujian_1')" onMouseOut="alink('fujian_1')" id="fujian_1">东南卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=chongqing" target="play" hidefocus="true" onMouseOver="ahover('chongqing_1')" onMouseOut="alink('chongqing_1')" id="chongqing_1">重庆卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=guizhou" target="play" hidefocus="true" onMouseOver="ahover('guizhou_1')" onMouseOut="alink('guizhou_1')" id="guizhou_1">贵州卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=hebei" target="play" hidefocus="true" onMouseOver="ahover('hebei_1')" onMouseOut="alink('hebei_1')" id="hebei_1">河北卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=jilin" target="play" hidefocus="true" onMouseOver="ahover('jilin_1')" onMouseOut="alink('jilin_1')" id="jilin_1">吉林卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=guangxi" target="play" hidefocus="true" onMouseOver="ahover('guangxi_1')" onMouseOut="alink('guangxi_1')" id="guangxi_1">广西卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=qinghai" target="play" hidefocus="true" onMouseOver="ahover('qinghai_1')" onMouseOut="alink('qinghai_1')" id="qinghai_1">青海卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=shanxi1" target="play" hidefocus="true" onMouseOver="ahover('shanxi_1')" onMouseOut="alink('shanxi_1')" id="shanxi_1">山西卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=shanxi2" target="play" hidefocus="true" onMouseOver="ahover('shanvxi_1')" onMouseOut="alink('shanvxi_1')" id="shanvxi_1">陕西卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=neimenggu" target="play" hidefocus="true" onMouseOver="ahover('neimeng_1')" onMouseOut="alink('neimeng_1')" id="neimeng_1">内蒙古卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=ningxia" target="play" hidefocus="true" onMouseOver="ahover('ningxia_1')" onMouseOut="alink('ningxia_1')" id="ningxia_1">宁夏卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=xizang" target="play" hidefocus="true" onMouseOver="ahover('xizang_1')" onMouseOut="alink('xizang_1')" id="xizang_1">西藏卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=xinjiang" target="play" hidefocus="true" onMouseOver="ahover('xinjiang_1')" onMouseOut="alink('xinjiang_1')" id="xinjiang_1">新疆卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=gansu" target="play" hidefocus="true" onMouseOver="ahover('gansu_1')" onMouseOut="alink('gansu_1')" id="gansu_1">甘肃卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=lvyou" target="play" hidefocus="true" onMouseOver="ahover('lvyou_1')" onMouseOut="alink('lvyou_1')" id="lvyou_1">旅游卫视 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=bjwy" target="play" hidefocus="true" onMouseOver="ahover('bjwy_1')" onMouseOut="alink('bjwy_1')" id="bjwy_1">北京文艺<font style="color:#99cc00">回看</font></a><a href="tv.php?id=sdjy" target="play" hidefocus="true" onMouseOver="ahover('sdjy_1')" onMouseOut="alink('sdjy_1')" id="sdjy_1"> 山东教育 <font style="color:#99cc00">回看</font></a><a href="tv.php?id=hxws" target="play" hidefocus="true" onMouseOver="ahover('hxws')" onMouseOut="alink('hxws')" id="hxws">海峡卫视</a><a href="tv.php?id=xmws" target="play" hidefocus="true" onMouseOver="ahover('xmws')" onMouseOut="alink('xmws')" id="xmws"> 厦门卫视</a><a href="tv.php?id=btws" target="play" hidefocus="true" onMouseOver="ahover('btws')" onMouseOut="alink('btws')" id="btws"> 兵团卫视<font style="color:#99cc00"></font></a></h2>
  </li>
  
    <li id="li_2">
  <h1 class="lm_1"><a href="javascript:OpenChanel(2);" class="list_name" hidefocus="true">体育频道 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
  <h2 class="lm_2" id="CHT_2" style="display: none"><a href="tv.php?id=letv_sports_800" target="play" hidefocus="true" onMouseOver="ahover('letvty_2')" onMouseOut="alink('letvty_2')" id="letvty_2">乐视体育<font style="color:#99cc00"></font></a><a href="tv.php?id=cctv5" target="play" hidefocus="true" onMouseOver="ahover('cctvzq_2')" onMouseOut="alink('cctvzq_2')" id="cctvzq_2">CCTV-5<font style="color:#99cc00"></font></a><a href="tv.php?id=fengyunzuqiu" target="play" hidefocus="true" onMouseOver="ahover('cctvfyzq_2')" onMouseOut="alink('cctvfyzq_2')" id="cctvfyzq_2">CCTV-风云足球</a><a href="tv.php?id=asty" target="play" hidefocus="true" onMouseOver="ahover('asty')" onMouseOut="alink('asty')" id="asty">澳视体育</a><a href="tv.php?id=sdty" target="play" hidefocus="true" onMouseOver="ahover('sdty')" onMouseOut="alink('sdty')" id="sdty">山东体育</a><a href="tv.php?id=btv6_800" target="play" hidefocus="true" onMouseOver="ahover('bjty_2')" onMouseOut="alink('bjty_2')" id="bjty_2">北京体育</a><a href="tv.php?id=shanghaitiyu" target="play" hidefocus="true" onMouseOver="ahover('yxjj_2')" onMouseOut="alink('yxjj_2')" id="yxjj_2" >上海体育</a><a href="tv.php?id=wsty" target="play" hidefocus="true" onMouseOver="ahover('wsty')" onMouseOut="alink('wsty')" id="wsty" >卫视体育</a><a href="tv.php?id=guangdongtiyu" target="play" hidefocus="true" onMouseOver="ahover('guangdongtiyu_2')" onMouseOut="alink('guangdongtiyu_2')" id="guangdongtiyu_2" >广东体育</a></h2>
  </li>


  
  
  
  <li id="li_4">
  <h1 class="lm_1"><a href="javascript:OpenChanel(4);" class="list_name" hidefocus="true">港澳台频道 <font style="color:#99cc00;font-size:8px">|</font></a></h1>
  <h2 class="lm_2" id="CHT_4" style="display: none"><span class="lm_2"><a href="tv.php?id=fhzw" target="play" hidefocus="true" onMouseOver="ahover('fhzw')" onMouseOut="alink('fhzw')" id="fhzw">港-凤凰卫视中文台 </a><a href="tv.php?id=fhxgws" target="play" hidefocus="true" onMouseOver="ahover('fhxg')" onMouseOut="alink('fhxg')" id="fhxg">港-凤凰卫视香港台 </a><a href="tv.php?id=fhzx" target="play" hidefocus="true" onMouseOver="ahover('fhzx')" onMouseOut="alink('fhzx')" id="fhzx">港-凤凰资讯 </a><a href="tv.php?id=xgws" target="play" hidefocus="true" onMouseOver="ahover('xgws')" onMouseOut="alink('xgws')" id="xgws">港-香港卫视 </a></span></h2>
  </li>
  
	 <li id="li_7">
	<h1 class="lm_1"><a href="javascript:OpenChanel(7);" class="list_name" hidefocus="true">少儿频道 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_7" style="display: none"><a href="tv.php?id=jykt" target="play" hidefocus="true" onMouseOver="ahover('jykt')" onMouseOut="alink('jykt')" id="jykt">金鹰卡通</a><a href="tv.php?id=xdkt" target="play" hidefocus="true" onMouseOver="ahover('jjkt')" onMouseOut="alink('jjkt')" id="jjkt">炫动卡通<font style="color:#99cc00"></font></a><a href="tv.php?id=nbsrpd" target="play" hidefocus="true" onMouseOver="ahover('hhsr')" onMouseOut="alink('hhsr')" id="hhsr">宁波少儿<font style="color:#99cc00"></font></a><a href="tv.php?id=zjsepd" target="play" hidefocus="true" onMouseOver="ahover('zjsr')" onMouseOut="alink('zjsr')" id="zjsr">浙江少儿<font style="color:#99cc00"></font></a><a href="tv.php?id=ymkt" target="play" hidefocus="true" onMouseOver="ahover('ymkt')" onMouseOut="alink('ymkt')" id="ymkt">优漫卡通</a><a href="tv.php?id=bjkk" target="play" hidefocus="true" onMouseOver="ahover('kksr')" onMouseOut="alink('kksr')" id="kksr">卡酷少儿</a><a href="tv.php?id=shxdkt" target="play" hidefocus="true" onMouseOver="ahover('xckt')" onMouseOut="alink('xckt')" id="xckt">炫彩卡通</a></h2>
	</li>
<li id="li_8">
	<h1 class="lm_1"><a href="javascript:OpenChanel(8);" class="list_name" hidefocus="true">电视回放 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_8" style="display: none"><a href="play.php?url=back.php" target="play" hidefocus="true" onMouseOver="ahover('cntvhf')" onMouseOut="alink('cntvhf')" id="cntvhf">CNTV回放</a></h2>
	</li>
	  <li id="li_19">
  <h1 class="lm_1"><a href="javascript:OpenChanel(19);" class="list_name" hidefocus="true">游戏频道 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
  <h2 class="lm_2" id="CHT_19" style="display: none"><a href="tv.php?id=yxfy" target="play" hidefocus="true" onMouseOver="ahover('yxfy2')" onMouseOut="alink('yxfy2')" id="yxfy2" >游戏风云</a><a href="tv.php?id=fygtv" target="play" hidefocus="true" onMouseOver="ahover('fygtv')" onMouseOut="alink('fygtv')" id="fygtv" >GTV游戏</a><a href="tv.php?id=neotv" target="play" hidefocus="true" onMouseOver="ahover('NEOTV')" onMouseOut="alink('NEOTV')" id="NEOTV" >英雄联盟职业联赛</a><a href="tv.php?id=plu" target="play" hidefocus="true" onMouseOver="ahover('PLU')" onMouseOut="alink('PLU')" id="PLU" >1006TV英雄联盟</a><a href="tv.php?id=scntv" target="play" hidefocus="true" onMouseOver="ahover('SCNtv')" onMouseOut="alink('SCNtv')" id="SCNtv" >SCNtv英雄联盟频道</a></h2>
  </li>
   <li id="li_6">
    <h1 class="lm_1"><a href="javascript:OpenChanel(6);" class="list_name" hidefocus="true">湖南省 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_6" style="display: none"><a href="tv.php?id=hngg" target="play" hidefocus="true" onMouseOver="ahover('hngg')" onMouseOut="alink('hngg')" id="hngg">湖南公共</a><a href="tv.php?id=hnyl" target="play" hidefocus="true" onMouseOver="ahover('shdq')" onMouseOut="alink('shdq')" id="shdq">湖南娱乐<font style="color:#99cc00"></font></a><a href="tv.php?id=hnjs" target="play" hidefocus="true" onMouseOver="ahover('bjdq')" onMouseOut="alink('bjdq')" id="bjdq">湖南经视</a><a href="tv.php?id=hnds" target="play" hidefocus="true" onMouseOver="ahover('hnds')" onMouseOut="alink('hnds')" id="hnds">湖南都市<font style="color:#99cc00"></font></a><a href="tv.php?id=hndsj" target="play" hidefocus="true" onMouseOver="ahover('zjdq')" onMouseOut="alink('zjdq')" id="zjdq">湖南电视剧<font style="color:#99cc00"></font></a><a href="tv.php?id=jyjs" target="play" hidefocus="true" onMouseOver="ahover('jsjs')" onMouseOut="alink('jsjs')" id="jsjs">金鹰纪实<font style="color:#99cc00"></font></a><a href="tv.php?id=jykt" target="play" hidefocus="true" onMouseOver="ahover('jykt')" onMouseOut="alink('jykt')" id="jykt">金鹰卡通</a><a href="tv.php?id=klcd" target="play" hidefocus="true" onMouseOver="ahover('klcd')" onMouseOut="alink('klcd')" id="klcd">快乐垂钓</a><a href="tv.php?id=changsnx" target="play" hidefocus="true" onMouseOver="ahover('changsnx')" onMouseOut="alink('changsnx')" id="changsnx">长沙女性</a><a href="tv.php?id=changszf" target="play" hidefocus="true" onMouseOver="ahover('changszf')" onMouseOut="alink('changszf')" id="changszf">长沙政法</a><a href="tv.php?id=changsjm" target="play" hidefocus="true" onMouseOver="ahover('changsjm')" onMouseOut="alink('changsjm')" id="changsjm">长沙经贸</a><a href="tv.php?id=changsxw" target="play" hidefocus="true" onMouseOver="ahover('changsxw')" onMouseOut="alink('changsxw')" id="changsxw">长沙新闻</a></h2>
	</li>
	<li id="li_21">
    <h1 class="lm_1"><a href="javascript:OpenChanel(21);" class="list_name" hidefocus="true">广东省 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_21" style="display: none"><a href="tv.php?id=nanfangjs" target="play" hidefocus="true" onMouseOver="ahover('nanfangjs')" onMouseOut="alink('nanfangjs')" id="nanfangjs">南方经视</a><a href="tv.php?id=nanfangzy" target="play" hidefocus="true" onMouseOver="ahover('nanfangzy')" onMouseOut="alink('nanfangzy')" id="nanfangzy">南方综艺</a><a href="tv.php?id=nanfangys" target="play" hidefocus="true" onMouseOver="ahover('nanfangys')" onMouseOut="alink('nanfangys')" id="nanfangys">南方影视</a><a href="tv.php?id=nanfangsr" target="play" hidefocus="true" onMouseOver="ahover('nanfangsr')" onMouseOut="alink('nanfangsr')" id="nanfangsr">南方少儿</a><a href="tv.php?id=gdgg" target="play" hidefocus="true" onMouseOver="ahover('gdgg')" onMouseOut="alink('gdgg')" id="gdgg">广东公共</a><a href="tv.php?id=gdxw" target="play" hidefocus="true" onMouseOver="ahover('gdxw')" onMouseOut="alink('gdxw')" id="gdxw">广东新闻</a><a href="tv.php?id=gzzh" target="play" hidefocus="true" onMouseOver="ahover('gzzh')" onMouseOut="alink('gzzh')" id="gzzh">广州综合</a><a href="tv.php?id=gzxw" target="play" hidefocus="true" onMouseOver="ahover('gzxw')" onMouseOut="alink('gzxw')" id="gzxw">广州新闻</a><a href="tv.php?id=gzys" target="play" hidefocus="true" onMouseOver="ahover('gzys')" onMouseOut="alink('gzys')" id="gzys">广州影视</a><a href="tv.php?id=gzyy" target="play" hidefocus="true" onMouseOver="ahover('gzyy')" onMouseOut="alink('gzyy')" id="gzyy">广州英语</a><a href="tv.php?id=gzjj" target="play" hidefocus="true" onMouseOver="ahover('gzjj')" onMouseOut="alink('gzjj')" id="gzjj">广州经济</a><a href="tv.php?id=szyl" target="play" hidefocus="true" onMouseOver="ahover('szyl')" onMouseOut="alink('szyl')" id="szyl">深圳娱乐</a><a href="tv.php?id=szws" target="play" hidefocus="true" onMouseOver="ahover('szws')" onMouseOut="alink('szws')" id="szws">深圳卫视</a><a href="tv.php?id=szsr" target="play" hidefocus="true" onMouseOver="ahover('szsr')" onMouseOut="alink('szsr')" id="szsr">深圳少儿<font style="color:#99cc00"></font></a><a href="tv.php?id=szgg" target="play" hidefocus="true" onMouseOver="ahover('szgg')" onMouseOut="alink('szgg')" id="szgg">深圳公共</a><a href="tv.php?id=szds" target="play" hidefocus="true" onMouseOver="ahover('szds')" onMouseOut="alink('szds')" id="szds">深圳都市<font style="color:#99cc00"></font></a><a href="tv.php?id=szdsj" target="play" hidefocus="true" onMouseOver="ahover('szdsj')" onMouseOut="alink('szdsj')" id="szdsj">深圳电视剧<font style="color:#99cc00"></font></a><a href="tv.php?id=szty" target="play" hidefocus="true" onMouseOver="ahover('szty')" onMouseOut="alink('szty')" id="szty">深圳体育<font style="color:#99cc00"></font></a><a href="tv.php?id=szcj" target="play" hidefocus="true" onMouseOver="ahover('szcj')" onMouseOut="alink('szcj')" id="szcj">深圳财经</a><a href="tv.php?id=szdv" target="play" hidefocus="true" onMouseOver="ahover('szdv')" onMouseOut="alink('szdv')" id="szdv">深圳DV生活</a><a href="tv.php?id=zhyt" target="play" hidefocus="true" onMouseOver="ahover('zhyt')" onMouseOut="alink('zhyt')" id="zhyt">珠海一台</a><a href="tv.php?id=zhet" target="play" hidefocus="true" onMouseOver="ahover('zhet')" onMouseOut="alink('zhet')" id="zhet">珠海二台</a><a href="tv.php?id=zhst" target="play" hidefocus="true" onMouseOver="ahover('zhst')" onMouseOut="alink('zhst')" id="zhst">珠海三台</a><a href="tv.php?id=dwyt" target="play" hidefocus="true" onMouseOver="ahover('dwyt')" onMouseOut="alink('dwyt')" id="dwyt">东莞一台</a><a href="tv.php?id=dwet" target="play" hidefocus="true" onMouseOver="ahover('dwet')" onMouseOut="alink('dwet')" id="dwet">东莞二台</a></h2>
	</li>
	<li id="li_22">
    <h1 class="lm_1"><a href="javascript:OpenChanel(22);" class="list_name" hidefocus="true">上海市 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_22" style="display: none"><a href="tv.php?id=shdfyl" target="play" hidefocus="true" onMouseOver="ahover('shdfyl')" onMouseOut="alink('shdfyl')" id="shdfyl">上海东方娱乐</a><a href="tv.php?id=shjy" target="play" hidefocus="true" onMouseOver="ahover('shjy')" onMouseOut="alink('shjy')" id="shjy">上海教育</a><a href="tv.php?id=shxdkt" target="play" hidefocus="true" onMouseOver="ahover('shxdkt')" onMouseOut="alink('shxdkt')" id="shxdkt">上海炫彩卡通<font style="color:#99cc00"></font></a><a href="tv.php?id=shxwzh" target="play" hidefocus="true" onMouseOver="ahover('shxwzh')" onMouseOut="alink('shxwzh')" id="shxwzh">上海新闻综合</a><a href="tv.php?id=shdfcj" target="play" hidefocus="true" onMouseOver="ahover('shdfcj')" onMouseOut="alink('shdfcj')" id="shdfcj">上海东方财经<font style="color:#99cc00"></font></a><a href="tv.php?id=shdsj" target="play" hidefocus="true" onMouseOver="ahover('shdsj')" onMouseOut="alink('shdsj')" id="shdsj">上海电视剧<font style="color:#99cc00"></font></a><a href="tv.php?id=shdycj" target="play" hidefocus="true" onMouseOver="ahover('shdycj')" onMouseOut="alink('shdycj')" id="shdycj">上海第一财经</a><a href="tv.php?id=shysrw" target="play" hidefocus="true" onMouseOver="ahover('shysrw')" onMouseOut="alink('shysrw')" id="shysrw">上海艺术人文</a><a href="tv.php?id=shlcpd" target="play" hidefocus="true" onMouseOver="ahover('shlcpd')" onMouseOut="alink('shlcpd')" id="shlcpd">上海理财频道</a><a href="tv.php?id=shdfdy" target="play" hidefocus="true" onMouseOver="ahover('shdfdy')" onMouseOut="alink('shdfdy')" id="shdfdy">上海东方电影</a><a href="tv.php?id=shjs" target="play" hidefocus="true" onMouseOver="ahover('shjs')" onMouseOut="alink('shjs')" id="shjs">上海纪实</a><a href="tv.php?id=shxs" target="play" hidefocus="true" onMouseOver="ahover('shxs')" onMouseOut="alink('shxs')" id="shxs">上海星尚</a><a href="tv.php?id=shwy" target="play" hidefocus="true" onMouseOver="ahover('shwy')" onMouseOut="alink('shwy')" id="shwy">上海外语</a></h2>
	</li>
	<li id="li_23">
    <h1 class="lm_1"><a href="javascript:OpenChanel(23);" class="list_name" hidefocus="true">北京市 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_23" style="display: none"><a href="tv.php?id=bjwy" target="play" hidefocus="true" onMouseOver="ahover('bjwy')" onMouseOut="alink('bjwy')" id="bjwy">北京文艺</a><a href="tv.php?id=bjkj" target="play" hidefocus="true" onMouseOver="ahover('bjkj')" onMouseOut="alink('bjkj')" id="bjkj">北京科教</a><a href="tv.php?id=bjys" target="play" hidefocus="true" onMouseOver="ahover('bjys')" onMouseOut="alink('bjys')" id="bjys">北京影视<font style="color:#99cc00"></font></a><a href="tv.php?id=bjty" target="play" hidefocus="true" onMouseOver="ahover('bjty')" onMouseOut="alink('bjty')" id="bjty">北京体育</a><a href="tv.php?id=bjcj" target="play" hidefocus="true" onMouseOver="ahover('bjcj')" onMouseOut="alink('bjcj')" id="bjcj">北京财经<font style="color:#99cc00"></font></a><a href="tv.php?id=bjsh" target="play" hidefocus="true" onMouseOver="ahover('bjsh')" onMouseOut="alink('bjsh')" id="bjsh">北京生活<font style="color:#99cc00"></font></a><a href="tv.php?id=bjqs" target="play" hidefocus="true" onMouseOver="ahover('bjqs')" onMouseOut="alink('bjqs')" id="bjqs">北京青少</a><a href="tv.php?id=bjxw" target="play" hidefocus="true" onMouseOver="ahover('bjxw')" onMouseOut="alink('bjxw')" id="bjxw">北京新闻</a><a href="tv.php?id=bjkk" target="play" hidefocus="true" onMouseOver="ahover('bjkk')" onMouseOut="alink('bjkk')" id="bjkk">北京卡酷</a></h2>
	</li>
	<li id="li_24">
    <h1 class="lm_1"><a href="javascript:OpenChanel(24);" class="list_name" hidefocus="true">湖北省 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_24" style="display: none"><a href="tv.php?id=hbzh" target="play" hidefocus="true" onMouseOver="ahover('hbzh')" onMouseOut="alink('hbzh')" id="hbzh">湖北综合</a><a href="tv.php?id=hbjs" target="play" hidefocus="true" onMouseOver="ahover('hbjs')" onMouseOut="alink('hbjs')" id="hbjs">湖北经视</a><a href="tv.php?id=hubeigg" target="play" hidefocus="true" onMouseOver="ahover('hubeigg')" onMouseOut="alink('hubeigg')" id="hubeigg">湖北公共<font style="color:#99cc00"></font></a><a href="tv.php?id=mjgw" target="play" hidefocus="true" onMouseOver="ahover('mjgw')" onMouseOut="alink('mjgw')" id="mjgw">美嘉购物</a><a href="tv.php?id=hbys" target="play" hidefocus="true" onMouseOver="ahover('hbys')" onMouseOut="alink('hbys')" id="hbys">湖北影视<font style="color:#99cc00"></font></a><a href="tv.php?id=hubeity" target="play" hidefocus="true" onMouseOver="ahover('hubeity')" onMouseOut="alink('hubeity')" id="hubeity">湖北体育<font style="color:#99cc00"></font></a><a href="tv.php?id=hbjy" target="play" hidefocus="true" onMouseOver="ahover('hbjy')" onMouseOut="alink('hbjy')" id="hbjy">湖北教育</a><a href="tv.php?id=yyzn" target="play" hidefocus="true" onMouseOver="ahover('yyzn')" onMouseOut="alink('yyzn')" id="yyzn">孕育指南</a><a href="tv.php?id=hbcs" target="play" hidefocus="true" onMouseOver="ahover('hbcs')" onMouseOut="alink('hbcs')" id="hbcs">湖北城市</a><a href="tv.php?id=hbds" target="play" hidefocus="true" onMouseOver="ahover('hbds')" onMouseOut="alink('hbds')" id="hbds">湖北碟市</a><a href="tv.php?id=hbls" target="play" hidefocus="true" onMouseOver="ahover('hbls')" onMouseOut="alink('hbls')" id="hbls">湖北垄上</a><a href="tv.php?id=hbwlzb" target="play" hidefocus="true" onMouseOver="ahover('hbwlzb')" onMouseOut="alink('hbwlzb')" id="hbwlzb">湖北网络直播</a><a href="tv.php?id=whxwpd" target="play" hidefocus="true" onMouseOver="ahover('whxwpd')" onMouseOut="alink('whxwpd')" id="whxwpd">武汉新闻频道</a><a href="tv.php?id=whkjpd" target="play" hidefocus="true" onMouseOver="ahover('whkjpd')" onMouseOut="alink('whkjpd')" id="whkjpd">武汉科教频道</a><a href="tv.php?id=whwtpd" target="play" hidefocus="true" onMouseOver="ahover('whwtpd')" onMouseOut="alink('whwtpd')" id="whwtpd">武汉文体频道</a><a href="tv.php?id=whsrpd" target="play" hidefocus="true" onMouseOver="ahover('whwtpd')" onMouseOut="alink('whwtpd')" id="whwtpd">武汉少儿频道</a><a href="tv.php?id=xyzh" target="play" hidefocus="true" onMouseOver="ahover('xyzh')" onMouseOut="alink('xyzh')" id="xyzh">襄阳综合</a><a href="tv.php?id=xyjj" target="play" hidefocus="true" onMouseOver="ahover('xyjj')" onMouseOut="alink('xyjj')" id="xyjj">襄阳经济</a><a href="tv.php?id=xywj" target="play" hidefocus="true" onMouseOver="ahover('xywj')" onMouseOut="alink('xywj')" id="xywj">襄阳文教</a><a href="tv.php?id=xyjc" target="play" hidefocus="true" onMouseOver="ahover('xyjc')" onMouseOut="alink('xyjc')" id="xyjc">襄阳精彩</a></h2>
	</li>
	<li id="li_25">
    <h1 class="lm_1"><a href="javascript:OpenChanel(25);" class="list_name" hidefocus="true">浙江省 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_25" style="display: none"><a href="tv.php?id=zjqjpd" target="play" hidefocus="true" onMouseOver="ahover('zjqjpd')" onMouseOut="alink('zjqjpd')" id="zjqjpd">浙江钱江频道</a><a href="tv.php?id=zjsepd" target="play" hidefocus="true" onMouseOver="ahover('zjsepd')" onMouseOut="alink('zjsepd')" id="zjsepd">浙江少儿频道</a><a href="tv.php?id=zjjspd" target="play" hidefocus="true" onMouseOver="ahover('zjjspd')" onMouseOut="alink('zjjspd')" id="zjjspd">浙江经视频道<font style="color:#99cc00"></font></a><a href="tv.php?id=zjkjpd" target="play" hidefocus="true" onMouseOver="ahover('zjkjpd')" onMouseOut="alink('zjkjpd')" id="zjkjpd">浙江科教频道</a><a href="tv.php?id=zjyspd" target="play" hidefocus="true" onMouseOver="ahover('zjyspd')" onMouseOut="alink('zjyspd')" id="zjyspd">浙江影视频道<font style="color:#99cc00"></font></a><a href="tv.php?id=zjmspd" target="play" hidefocus="true" onMouseOver="ahover('zjmspd')" onMouseOut="alink('zjmspd')" id="zjmspd">浙江民生频道<font style="color:#99cc00"></font></a><a href="tv.php?id=zjggpd" target="play" hidefocus="true" onMouseOver="ahover('zjggpd')" onMouseOut="alink('zjggpd')" id="zjggpd">浙江公共频道</a><a href="tv.php?id=zjgjpd" target="play" hidefocus="true" onMouseOver="ahover('zjgjpd')" onMouseOut="alink('zjgjpd')" id="zjgjpd">浙江国际频道</a><a href="tv.php?id=zjlxspd" target="play" hidefocus="true" onMouseOver="ahover('zjlxspd')" onMouseOut="alink('zjlxspd')" id="zjlxspd">浙江留学生频道</a><a href="tv.php?id=zjhygpd" target="play" hidefocus="true" onMouseOver="ahover('zjhygpd')" onMouseOut="alink('zjhygpd')" id="zjhygpd">浙江好易购频道</a><a href="tv.php?id=hjxwpd" target="play" hidefocus="true" onMouseOver="ahover('hjxwpd')" onMouseOut="alink('hjxwpd')" id="hjxwpd">杭州新闻频道</a><a href="tv.php?id=nbxwpd" target="play" hidefocus="true" onMouseOver="ahover('nbxwpd')" onMouseOut="alink('nbxwpd')" id="nbxwpd">宁波新闻综合</a><a href="tv.php?id=nbshsh" target="play" hidefocus="true" onMouseOver="ahover('nbshsh')" onMouseOut="alink('nbshsh')" id="nbshsh">宁波社会生活</a><a href="tv.php?id=nbyspd" target="play" hidefocus="true" onMouseOver="ahover('nbyspd')" onMouseOut="alink('nbyspd')" id="nbyspd">宁波影视频道</a><a href="tv.php?id=nbwhyl" target="play" hidefocus="true" onMouseOver="ahover('nbwhyl')" onMouseOut="alink('nbwhyl')" id="nbwhyl">宁波文化娱乐</a><a href="tv.php?id=nbsrpd" target="play" hidefocus="true" onMouseOver="ahover('nbsrpd')" onMouseOut="alink('nbsrpd')" id="nbsrpd">宁波少儿频道</a><a href="tv.php?id=sxysylpd" target="play" hidefocus="true" onMouseOver="ahover('sxysylpd')" onMouseOut="alink('sxysylpd')" id="sxysylpd">绍兴影视娱乐频道</a><a href="tv.php?id=sxggpd" target="play" hidefocus="true" onMouseOver="ahover('sxggpd')" onMouseOut="alink('sxggpd')" id="sxggpd">绍兴公共频道</a><a href="tv.php?id=sxxwpd" target="play" hidefocus="true" onMouseOver="ahover('sxxwpd')" onMouseOut="alink('sxxwpd')" id="sxxwpd">绍兴新闻频道</a><a href="tv.php?id=zgqfcpd" target="play" hidefocus="true" onMouseOver="ahover('zgqfcpd')" onMouseOut="alink('zgqfcpd')" id="zgqfcpd">中国轻纺城频道</a><a href="tv.php?id=qzxwpd" target="play" hidefocus="true" onMouseOver="ahover('qzxwpd')" onMouseOut="alink('qzxwpd')" id="qzxwpd">衢州新闻频道</a><a href="tv.php?id=cxzh" target="play" hidefocus="true" onMouseOver="ahover('cxzh')" onMouseOut="alink('cxzh')" id="cxzh">长兴综合</a><a href="tv.php?id=cxwhpd" target="play" hidefocus="true" onMouseOver="ahover('cxwhpd')" onMouseOut="alink('cxwhpd')" id="cxwhpd">长兴文化频道</a><a href="tv.php?id=tzxwzh" target="play" hidefocus="true" onMouseOver="ahover('tzxwzh')" onMouseOut="alink('tzxwzh')" id="tzxwzh">台州新闻综合</a><a href="tv.php?id=tzcssh" target="play" hidefocus="true" onMouseOver="ahover('tzcssh')" onMouseOut="alink('tzcssh')" id="tzcssh">台州城市生活</a><a href="tv.php?id=tzggcf" target="play" hidefocus="true" onMouseOver="ahover('tzggcf')" onMouseOut="alink('tzggcf')" id="tzggcf">台州公共财富</a><a href="tv.php?id=tzyswh" target="play" hidefocus="true" onMouseOver="ahover('tzyswh')" onMouseOut="alink('tzyswh')" id="tzyswh">台州影视文化</a></h2>
	</li>
	<li id="li_26">
    <h1 class="lm_1"><a href="javascript:OpenChanel(26);" class="list_name" hidefocus="true">江苏省 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_26" style="display: none"><a href="tv.php?id=wxxwzh" target="play" hidefocus="true" onMouseOver="ahover('wxxwzh')" onMouseOut="alink('wxxwzh')" id="wxxwzh">无锡新闻综合</a><a href="tv.php?id=wxdszx" target="play" hidefocus="true" onMouseOver="ahover('wxdszx')" onMouseOut="alink('wxdszx')" id="wxdszx">无锡都市资讯<font style="color:#99cc00"></font></a><a href="tv.php?id=wxshpd" target="play" hidefocus="true" onMouseOver="ahover('wxshpd')" onMouseOut="alink('wxshpd')" id="wxshpd">无锡生活频道</a><a href="tv.php?id=ntzhpd" target="play" hidefocus="true" onMouseOver="ahover('ntzhpd')" onMouseOut="alink('ntzhpd')" id="ntzhpd">南通综合频道<font style="color:#99cc00"></font></a><a href="tv.php?id=ntsjpd" target="play" hidefocus="true" onMouseOver="ahover('ntsjpd')" onMouseOut="alink('ntsjpd')" id="ntsjpd">南通社教频道<font style="color:#99cc00"></font></a><a href="tv.php?id=ntshpd" target="play" hidefocus="true" onMouseOver="ahover('ntshpd')" onMouseOut="alink('ntshpd')" id="ntshpd">南通生活频道</a><a href="tv.php?id=ntxxpd" target="play" hidefocus="true" onMouseOver="ahover('ntxxpd')" onMouseOut="alink('ntxxpd')" id="ntxxpd">南通信息频道</a><a href="tv.php?id=tzxwzh" target="play" hidefocus="true" onMouseOver="ahover('taizxwzh')" onMouseOut="alink('taizxwzh')" id="taizxwzh">泰州新闻综合</a><a href="tv.php?id=szxwpd" target="play" hidefocus="true" onMouseOver="ahover('szxwpd')" onMouseOut="alink('szxwpd')" id="szxwpd">苏州新闻频道</a><a href="tv.php?id=njxw" target="play" hidefocus="true" onMouseOver="ahover('njxw')" onMouseOut="alink('njxw')" id="njxw">南京新闻</a><a href="tv.php?id=njlv" target="play" hidefocus="true" onMouseOver="ahover('njlv')" onMouseOut="alink('njlv')" id="njlv">南京旅游</a><a href="tv.php?id=njyl" target="play" hidefocus="true" onMouseOver="ahover('njyl')" onMouseOut="alink('njyl')" id="njyl">南京娱乐</a><a href="tv.php?id=njxx" target="play" hidefocus="true" onMouseOver="ahover('njxx')" onMouseOut="alink('njxx')" id="njxx">南京信息</a><a href="tv.php?id=njkj" target="play" hidefocus="true" onMouseOver="ahover('njkj')" onMouseOut="alink('njkj')" id="njkj">南京科教</a><a href="tv.php?id=njsr" target="play" hidefocus="true" onMouseOver="ahover('njsr')" onMouseOut="alink('njsr')" id="njsr">南京少儿</a><a href="tv.php?id=njsb" target="play" hidefocus="true" onMouseOver="ahover('njsb')" onMouseOut="alink('njsb')" id="njsb">南京十八</a></h2>
	</li>
	<li id="li_27">
    <h1 class="lm_1"><a href="javascript:OpenChanel(27);" class="list_name" hidefocus="true">江西省 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_27" style="display: none"><a href="tv.php?id=ncxwzh" target="play" hidefocus="true" onMouseOver="ahover('ncxwzh')" onMouseOut="alink('ncxwzh')" id="ncxwzh">南昌新闻综合</a><a href="tv.php?id=ncfz" target="play" hidefocus="true" onMouseOver="ahover('ncfz')" onMouseOut="alink('ncfz')" id="ncfz">南昌法制</a></h2>
	</li>
	<li id="li_28">
    <h1 class="lm_1"><a href="javascript:OpenChanel(28);" class="list_name" hidefocus="true">四川省 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_28" style="display: none"><a href="tv.php?id=scjj" target="play" hidefocus="true" onMouseOver="ahover('scjj')" onMouseOut="alink('scjj')" id="scjj">四川经济</a><a href="tv.php?id=scgg" target="play" hidefocus="true" onMouseOver="ahover('scgg')" onMouseOut="alink('scgg')" id="scgg">四川公共</a><a href="tv.php?id=scxwzx" target="play" hidefocus="true" onMouseOver="ahover('scxwzx')" onMouseOut="alink('scxwzx')" id="scxwzx">四川新闻资讯</a><a href="tv.php?id=scyswy" target="play" hidefocus="true" onMouseOver="ahover('scyswy')" onMouseOut="alink('scyswy')" id="scyswy">四川影视文艺</a><a href="tv.php?id=scwhly" target="play" hidefocus="true" onMouseOver="ahover('scwhly')" onMouseOut="alink('scwhly')" id="scwhly">四川文化旅游</a><a href="tv.php?id=scfnert" target="play" hidefocus="true" onMouseOver="ahover('scfnert')" onMouseOut="alink('scfnert')" id="scfnert">四川妇女儿童</a></h2>
	</li>
	<li id="li_29">
    <h1 class="lm_1"><a href="javascript:OpenChanel(29);" class="list_name" hidefocus="true">山西省 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_29" style="display: none"><a href="tv.php?id=tyxw" target="play" hidefocus="true" onMouseOver="ahover('tyxw')" onMouseOut="alink('tyxw')" id="tyxw">太原新闻</a><a href="tv.php?id=tybx" target="play" hidefocus="true" onMouseOver="ahover('tybx')" onMouseOut="alink('tybx')" id="tybx">太原百姓</a><a href="tv.php?id=tyfz" target="play" hidefocus="true" onMouseOver="ahover('tyfz')" onMouseOut="alink('tyfz')" id="tyfz">太原法制</a><a href="tv.php?id=tywt" target="play" hidefocus="true" onMouseOver="ahover('tywt')" onMouseOut="alink('tywt')" id="tywt">太原文体</a><a href="tv.php?id=tyjtxf" target="play" hidefocus="true" onMouseOver="ahover('tyjtxf')" onMouseOut="alink('tyjtxf')" id="tyjtxf">太原家庭消费</a><a href="tv.php?id=yqzh" target="play" hidefocus="true" onMouseOver="ahover('yqzh')" onMouseOut="alink('yqzh')" id="yqzh">阳泉综合</a><a href="tv.php?id=yqkj" target="play" hidefocus="true" onMouseOver="ahover('yqkj')" onMouseOut="alink('yqkj')" id="yqkj">阳泉科教</a><a href="tv.php?id=qcyq" target="play" hidefocus="true" onMouseOver="ahover('qcyq')" onMouseOut="alink('qcyq')" id="qcyq">晴彩阳泉</a></h2>
	</li>
	<li id="li_30">
    <h1 class="lm_1"><a href="javascript:OpenChanel(30);" class="list_name" hidefocus="true">山东省 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_30" style="display: none"><a href="tv.php?id=jinanxw" target="play" hidefocus="true" onMouseOver="ahover('jinanxw')" onMouseOut="alink('jinanxw')" id="jinanxw">济南新闻</a><a href="tv.php?id=jinands" target="play" hidefocus="true" onMouseOver="ahover('jinands')" onMouseOut="alink('jinands')" id="jinands">济南都市</a><a href="tv.php?id=jinanys" target="play" hidefocus="true" onMouseOver="ahover('jinanys')" onMouseOut="alink('jinanys')" id="jinanys">济南影视</a><a href="tv.php?id=jinanyl" target="play" hidefocus="true" onMouseOver="ahover('jinanyl')" onMouseOut="alink('jinanyl')" id="jinanyl">济南娱乐</a><a href="tv.php?id=jinansh" target="play" hidefocus="true" onMouseOver="ahover('jinansh')" onMouseOut="alink('jinansh')" id="jinansh">济南生活</a><a href="tv.php?id=jinansw" target="play" hidefocus="true" onMouseOver="ahover('jinansw')" onMouseOut="alink('jinansw')" id="jinansw">济南商务</a><a href="tv.php?id=jinansr" target="play" hidefocus="true" onMouseOver="ahover('jinansr')" onMouseOut="alink('jinansr')" id="jinansr">济南少儿</a><a href="tv.php?id=ytxwzh" target="play" hidefocus="true" onMouseOver="ahover('ytxwzh')" onMouseOut="alink('ytxwzh')" id="ytxwzh">烟台新闻综合</a></h2>
	</li>
	<li id="li_31">
    <h1 class="lm_1"><a href="javascript:OpenChanel(31);" class="list_name" hidefocus="true">陕西省 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_31" style="display: none"><a href="tv.php?id=xaxwzh" target="play" hidefocus="true" onMouseOver="ahover('xaxwzh')" onMouseOut="alink('xaxwzh')" id="xaxwzh">西安新闻综合</a><a href="tv.php?id=xabhds" target="play" hidefocus="true" onMouseOver="ahover('xabhds')" onMouseOut="alink('xabhds')" id="xabhds">西安白鹤都市</a><a href="tv.php?id=xaswzx" target="play" hidefocus="true" onMouseOver="ahover('xaswzx')" onMouseOut="alink('xaswzx')" id="xaswzx">西安商务资讯</a><a href="tv.php?id=xawhys" target="play" hidefocus="true" onMouseOver="ahover('xawhys')" onMouseOut="alink('xawhys')" id="xawhys">西安文化影视</a><a href="tv.php?id=xajkkl" target="play" hidefocus="true" onMouseOver="ahover('xajkkl')" onMouseOut="alink('xajkkl')" id="xajkkl">西安健康快乐</a><a href="tv.php?id=xayyzy" target="play" hidefocus="true" onMouseOver="ahover('xayyzy')" onMouseOut="alink('xayyzy')" id="xayyzy">西安音乐综艺</a></h2>
	</li>
	<li id="li_32">
    <h1 class="lm_1"><a href="javascript:OpenChanel(32);" class="list_name" hidefocus="true">河南省 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_32" style="display: none"><a href="tv.php?id=zhezouzh" target="play" hidefocus="true" onMouseOver="ahover('zhezouzh')" onMouseOut="alink('zhezouzh')" id="zhezouzh">郑州综合</a><a href="tv.php?id=zhezoushangdu" target="play" hidefocus="true" onMouseOver="ahover('zhezoushangdu')" onMouseOut="alink('zhezoushangdu')" id="zhezoushangdu">郑州商都</a><a href="tv.php?id=zhenzouwt" target="play" hidefocus="true" onMouseOver="ahover('zhenzouwt')" onMouseOut="alink('zhenzouwt')" id="zhenzouwt">郑州文体</a><a href="tv.php?id=zhezouss" target="play" hidefocus="true" onMouseOver="ahover('zhezouss')" onMouseOut="alink('zhezouss')" id="zhezouss">郑州时尚</a><a href="tv.php?id=zhezoufz" target="play" hidefocus="true" onMouseOver="ahover('zhezoufz')" onMouseOut="alink('zhezoufz')" id="zhezoufz">郑州法制</a><a href="tv.php?id=zhezoudsj" target="play" hidefocus="true" onMouseOver="ahover('zhezoudsj')" onMouseOut="alink('zhezoudsj')" id="zhezoudsj">郑州电视剧</a><a href="tv.php?id=ayxwzh" target="play" hidefocus="true" onMouseOver="ahover('ayxwzh')" onMouseOut="alink('ayxwzh')" id="ayxwzh">安阳新闻综合</a><a href="tv.php?id=anyangfz" target="play" hidefocus="true" onMouseOver="ahover('anyangfz')" onMouseOut="alink('anyangfz')" id="anyangfz">安阳法制</a><a href="tv.php?id=anyangkj" target="play" hidefocus="true" onMouseOver="ahover('anyangkj')" onMouseOut="alink('anyangkj')" id="anyangkj">安阳科教</a><a href="tv.php?id=anyangtwsh" target="play" hidefocus="true" onMouseOver="ahover('anyangtwsh')" onMouseOut="alink('anyangtwsh')" id="anyangtwsh">安阳图文生活</a><a href="tv.php?id=qingcaiay" target="play" hidefocus="true" onMouseOver="ahover('qingcaiay')" onMouseOut="alink('qingcaiay')" id="qingcaiay">晴彩安阳</a></h2>
	</li>
	<li id="li_33">
    <h1 class="lm_1"><a href="javascript:OpenChanel(33);" class="list_name" hidefocus="true">河北省 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_33" style="display: none"><a href="tv.php?id=hbjj" target="play" hidefocus="true" onMouseOver="ahover('hbjj')" onMouseOut="alink('hbjj')" id="hbjj">河北经济</a><a href="tv.php?id=hbys" target="play" hidefocus="true" onMouseOver="ahover('hbys')" onMouseOut="alink('hbys')" id="hbys">河北影视</a><a href="tv.php?id=hbds" target="play" hidefocus="true" onMouseOver="ahover('hbds')" onMouseOut="alink('hbds')" id="hbds">河北都市</a><a href="tv.php?id=hbgg" target="play" hidefocus="true" onMouseOver="ahover('hbgg')" onMouseOut="alink('hbgg')" id="hbgg">河北公共</a><a href="tv.php?id=hbsrkj" target="play" hidefocus="true" onMouseOver="ahover('hbsrkj')" onMouseOut="alink('hbsrkj')" id="hbsrkj">河北少儿科教</a><a href="tv.php?id=hbnm" target="play" hidefocus="true" onMouseOver="ahover('hbnm')" onMouseOut="alink('hbnm')" id="hbnm">河北农民</a><a href="tv.php?id=sjzxw" target="play" hidefocus="true" onMouseOver="ahover('sjzxw')" onMouseOut="alink('sjzxw')" id="sjzxw">石家庄新闻</a><a href="tv.php?id=sjzyl" target="play" hidefocus="true" onMouseOver="ahover('sjzyl')" onMouseOut="alink('sjzyl')" id="sjzyl">石家庄娱乐</a><a href="tv.php?id=sjzsh" target="play" hidefocus="true" onMouseOver="ahover('sjzsh')" onMouseOut="alink('sjzsh')" id="sjzsh">石家庄生活</a><a href="tv.php?id=sjzds" target="play" hidefocus="true" onMouseOver="ahover('sjzds')" onMouseOut="alink('sjzds')" id="sjzds">石家庄都市</a><a href="tv.php?id=hdxwzh" target="play" hidefocus="true" onMouseOver="ahover('hdxwzh')" onMouseOut="alink('hdxwzh')" id="hdxwzh">邯郸新闻综合</a></h2>
	</li>
	<li id="li_36">
    <h1 class="lm_1"><a href="javascript:OpenChanel(36);" class="list_name" hidefocus="true">甘肃省 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_36" style="display: none"><a href="tv.php?id=lanzouxw" target="play" hidefocus="true" onMouseOver="ahover('lanzouxw')" onMouseOut="alink('lanzouxw')" id="lanzouxw">兰州新闻</a><a href="tv.php?id=lanzoushjj" target="play" hidefocus="true" onMouseOver="ahover('lanzoushjj')" onMouseOut="alink('lanzoushjj')" id="lanzoushjj">兰州生活经济</a><a href="tv.php?id=lanzouzyty" target="play" hidefocus="true" onMouseOver="ahover('lanzouzyty')" onMouseOut="alink('lanzouzyty')" id="lanzouzyty">兰州综艺体育</a><a href="tv.php?id=lanzougg" target="play" hidefocus="true" onMouseOver="ahover('lanzougg')" onMouseOut="alink('lanzougg')" id="lanzougg">兰州公共</a><a href="tv.php?id=qingcailanzou" target="play" hidefocus="true" onMouseOver="ahover('qingcailanzou')" onMouseOut="alink('qingcailanzou')" id="qingcailanzou">晴彩兰州</a></h2>
	</li>
	<li id="li_37">
    <h1 class="lm_1"><a href="javascript:OpenChanel(37);" class="list_name" hidefocus="true">广西省 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_37" style="display: none"><a href="tv.php?id=nanningxwzh" target="play" hidefocus="true" onMouseOver="ahover('nanningxwzh')" onMouseOut="alink('nanningxwzh')" id="nanningxwzh">南宁新闻综合</a><a href="tv.php?id=nanningdssh" target="play" hidefocus="true" onMouseOver="ahover('nanningdssh')" onMouseOut="alink('nanningdssh')" id="nanningdssh">南宁都市生活</a><a href="tv.php?id=nanningysyl" target="play" hidefocus="true" onMouseOver="ahover('nanningysyl')" onMouseOut="alink('nanningysyl')" id="nanningysyl">南宁影视娱乐</a><a href="tv.php?id=nanninggg" target="play" hidefocus="true" onMouseOver="ahover('nanninggg')" onMouseOut="alink('nanninggg')" id="nanninggg">南宁公共</a><a href="tv.php?id=liuzouxw" target="play" hidefocus="true" onMouseOver="ahover('liuzouxw')" onMouseOut="alink('liuzouxw')" id="liuzouxw">柳州新闻</a><a href="tv.php?id=liuzougg" target="play" hidefocus="true" onMouseOver="ahover('liuzougg')" onMouseOut="alink('liuzougg')" id="liuzougg">柳州公共</a><a href="tv.php?id=liuzoukj" target="play" hidefocus="true" onMouseOver="ahover('liuzoukj')" onMouseOut="alink('liuzoukj')" id="liuzoukj">柳州科教</a></h2>
	</li>
	<li id="li_34">
    <h1 class="lm_1"><a href="javascript:OpenChanel(34);" class="list_name" hidefocus="true">内蒙古<font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_34" style="display: none"><a href="tv.php?id=eerdsxwzh" target="play" hidefocus="true" onMouseOver="ahover('eerdsxwzh')" onMouseOut="alink('eerdsxwzh')" id="eerdsxwzh">鄂尔多斯新闻综合</a><a href="tv.php?id=eerdsjjfw" target="play" hidefocus="true" onMouseOver="ahover('eerdsjjfw')" onMouseOut="alink('eerdsjjfw')" id="eerdsjjfw">鄂尔多斯经济服务</a><a href="tv.php?id=eerdscssh" target="play" hidefocus="true" onMouseOver="ahover('eerdscssh')" onMouseOut="alink('eerdscssh')" id="eerdscssh">鄂尔多斯城市生活</a><a href="tv.php?id=eerdsmyzh" target="play" hidefocus="true" onMouseOver="ahover('eerdsmyzh')" onMouseOut="alink('eerdsmyzh')" id="eerdsmyzh">鄂尔多斯蒙语综合</a></h2>
	</li>
	<li id="li_35">
    <h1 class="lm_1"><a href="javascript:OpenChanel(35);" class="list_name" hidefocus="true">青海省<font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
    <h2 class="lm_2" id="CHT_35" style="display: none"><a href="tv.php?id=xiningxw" target="play" hidefocus="true" onMouseOver="ahover('xiningxw')" onMouseOut="alink('xiningxw')" id="xiningxw">西宁新闻</a><a href="tv.php?id=xiningsh" target="play" hidefocus="true" onMouseOver="ahover('xiningsh')" onMouseOut="alink('xiningsh')" id="xiningsh">西宁生活</a></h2>
	</li>

</ul>
</div>
<!-- 频道列表导航结束 -->
<div id="solist" style="display:none"> </div></td>
</tr>
</table>

</body>
<script language="JavaScript">
if(self==top){
	if(document.body.clientWidth=="856" || document.body.clientWidth=="956"){
	var wstr='';
	wstr = wstr +'<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" style="background:#000000">';
	wstr = wstr +'<tr><td>';
	wstr = wstr +'<table width="100%" height="200" border="0" cellpadding="0" cellspacing="0" style="background:#ffffff">';
	wstr = wstr +'<tr><td align=center>';
	wstr = wstr +'	<table width="500" height="80" border="0" cellpadding="0" cellspacing="0">';
	wstr = wstr +'	<tr><td style="color:#000000; font-size:16px; font-weight:bold;" align=center></td></tr>';
	wstr = wstr +'	<tr><td style="color:red; font-size:24px; font-weight:bold;" align=center><a href=""></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onClick="document.getElementById(\'welcome\').style.display=\'none\'">继续访问旧版</a></td></tr>';
	wstr = wstr +'	</table>';
	wstr = wstr +'</td></tr>';
	wstr = wstr +'</table>';
	wstr = wstr +'</td></tr>';
	wstr = wstr +'</table>';
	document.getElementById("welcome").innerHTML = wstr;
	}
	}

</script>
<script language="javascript" type="text/javascript">
//CLICK处理
var crrCn=5;
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
document.getElementById('hunan').style.background = 'url(images/tv.gif) #555555 no-repeat 23px 3px';
document.getElementById('hunan').style.color = '#ffffff';
document.getElementById('hunan_1').style.background = 'url(images/tv.gif) #555555 no-repeat 23px 3px';
document.getElementById('hunan_1').style.color = '#ffffff';
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
</html>
