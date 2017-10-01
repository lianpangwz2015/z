<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?
include 'list2.php';
include 'config.php';
$pindao="乐视电视剧";
$url="http://tv6080.pronvod.com/dsj/letv.php?u=www.tv6080.com5";
$url=getUrl($url);
preg_match_all('|n=(.*?)"|',$url,$r);
foreach($r[1] as $k=>$v){
$url="http://tv6080.pronvod.com/dsj/letv.php?n=".$v;
$list.=getUrl($url);
}

preg_match_all('|m=(.*?)" label="(.*?)"|',$list,$r);
foreach($r[1] as $k=>$v){
$lrc=iconv("UTF-8", "GB2312//IGNORE", $r[2][$k]);

$liebiao.='<a href="letvdsj.php?id='.$v."&title=".urlencode($lrc).'" target="_self" hidefocus="true" onMouseOver="ahover(\''.$v.'_1\')" onMouseOut="alink(\''.$v.'_1\')" id="'.$v.'">'.$lrc .'</a>';

}

$id=$_GET['id'];
if($id){
$pindao=urldecode($_GET['title']);
//$zb="/cmp/dsjplay.php?lists=http://tv6080.pronvod.com/dsj/letv.php?m=".$_GET['id']."&title=".urlencode($pindao);
$url="http://tv6080.pronvod.com/dsj/letv.php?m=".$_GET['id'];
$url=getUrl($url);

preg_match_all('|id=(.*?)" label= "(.*?)"|',$url,$r);
foreach($r[1] as $k=>$v){
$l=iconv("UTF-8", "GB2312//IGNORE", $r[2][$k]);
$p=urlencode($pindao.$l);
$playurl="http://api.nepian.com/ckparse/?url=http://www.le.com/ptv/vplay/".$v.".html";
$ll.='<a href="'.$playurl.'" target="c_play"  >'.$l.'</a>&nbsp;&nbsp;';

}
}

function getUrl($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        @ $data = curl_exec($ch);
        curl_close($ch);
        return $data;
}
?>
<head>

<title><? echo $pindao;?>-乐视直播网</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<? echo $pindao;?>,<?  echo $pindao;?>在线观看" />
<meta name="description" content="乐视直播网,为您提供<? echo $pindao;?>在线观看。" />

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
|   <a href="http://movie.letvlive.com/" target="_blank" class="red">上映电影</a> 
|   <a href="dsj.php" target="_self" class="red">电视剧</a>    
|   <a href="yspd.php?id=cctv1" target="_self" class="red">央视频道</a>     
|   <a href="gnws.php?id=hunan" target="_self" class="red">国内卫视</a> 
|   <a href="typd.php?id=cctv5" target="_self" class="red">体育频道</a>
|   <a href="dfpd.php?id=jykt" target="_self" class="red">地方频道</a> 
|   <a href="gatpd.php?id=fhzw" target="_self" class="red">港澳台频道</a>
|   <a href="yxpd.php?id=yxfy" target="_self" class="red">游戏频道</a>
|   <a href="srpd.php?id=jykt" target="_self" class="red">少儿频道</a>
|   <a href="play.php?url=back.php" target="_blank" class="red">电视回放</a> 

    

      
 
      
 
      
 
      

      
 
      
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
	
  <script language="JavaScript"> document.writeln("<iframe id=\"c_play\" name=\"c_play\" src=\"<? echo $zb;?>\"  width=\"100%\" height=\"500\" scrolling=\"auto\" frameborder=\"0\" border=\"0\" allowtransparency=\"true\"></iframe>");</script>

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
        <span class="time">   <?
  echo $ll;
  ?></div>
  
 <div class="lrcb"><div class="widget-box mb15">
   
    <div class="widget-hot clear">
      <ul>
	   
   <li><a href="<? echo $playurl9;?>" target="_blank" title="<? echo $title9;?>"><img src="<? echo $img9;?>" width="130" height="90" alt="<? echo $title9;?>" title="<? echo $title9;?>"></a>
          <div class="txt"><a href="<? echo $playurl9;?>" title="<? echo $title9;?>"><? echo $title9;?></a></div>
        </li>
            
	
  <li><a href="<? echo $playurl10;?>" target="_blank" title="<? echo $title10;?>"><img src="<? echo $img10;?>" width="130" height="90" alt="<? echo $title10;?>" title="<? echo $title10;?>"></a>
          <div class="txt"><a href="<? echo $playurl10;?>" title="<? echo $title10;?>"><? echo $title10;?></a></div>
        </li>
            
	
  <li><a href="<? echo $playurl11;?>" target="_blank" title="<? echo $title11;?>"><img src="<? echo $img11;?>" width="130" height="90" alt="<? echo $title11;?>" title="<? echo $title11;?>"></a>
          <div class="txt"><a href="<? echo $playurl11;?>" title="<? echo $title11;?>"><? echo $title11;?></a></div>
        </li>
            
	
  <li><a href="<? echo $playurl12;?>" target="_blank" title="<? echo $title12;?>"><img src="<? echo $img12;?>" width="130" height="90" alt="<? echo $title12;?>" title="<? echo $title12;?>"></a>
          <div class="txt"><a href="<? echo $playurl12;?>" title="<? echo $title12;?>"><? echo $title12;?></a></div>
        </li>
            
	
  <li><a href="<? echo $playurl13;?>" target="_blank" title="<? echo $title13;?>"><img src="<? echo $img13;?>" width="130" height="90" alt="<? echo $title13;?>" title="<? echo $title13;?>"></a>
          <div class="txt"><a href="<? echo $playurl13;?>" title="<? echo $title13;?>"><? echo $title13;?></a></div>
        </li>
            
	
  <li><a href="<? echo $playurl14;?>" target="_blank" title="<? echo $title14;?>"><img src="<? echo $img14;?>" width="130" height="90" alt="<? echo $title14;?>" title="<? echo $title14;?>"></a>
          <div class="txt"><a href="<? echo $playurl14;?>" title="<? echo $title14;?>"><? echo $title14;?></a></div>        </li>
		     
   <li><a href="<? echo $playurl15;?>" target="_blank" title="<? echo $title15;?>"><img src="<? echo $img15;?>" width="130" height="90" alt="<? echo $title15;?>" title="<? echo $title15;?>"></a>
          <div class="txt"><a href="<? echo $playurl15;?>" title="<? echo $title15;?>"><? echo $title15;?></a></div>
        </li>
            
	
  <li><a href="<? echo $playurl16;?>" target="_blank" title="<? echo $title16;?>"><img src="<? echo $img16;?>" width="130" height="90" alt="<? echo $title16;?>" title="<? echo $title16;?>"></a>
          <div class="txt"><a href="<? echo $playurl16;?>" title="<? echo $title16;?>"><? echo $title16;?></a></div>
        </li>
            
	
  <li><a href="<? echo $playurl17;?>" target="_blank" title="<? echo $title17;?>"><img src="<? echo $img17;?>" width="130" height="90" alt="<? echo $title17;?>" title="<? echo $title17;?>"></a>
          <div class="txt"><a href="<? echo $playurl17;?>" title="<? echo $title17;?>"><? echo $title17;?></a></div>
        </li>
            
	
  <li><a href="<? echo $playurl18;?>" target="_blank" title="<? echo $title18;?>"><img src="<? echo $img18;?>" width="130" height="90" alt="<? echo $title18;?>" title="<? echo $title18;?>"></a>
          <div class="txt"><a href="<? echo $playurl18;?>" title="<? echo $title18;?>"><? echo $title18;?></a></div>
        </li>
            
	
  <li><a href="<? echo $playurl19;?>" target="_blank" title="<? echo $title19;?>"><img src="<? echo $img19;?>" width="130" height="90" alt="<? echo $title19;?>" title="<? echo $title19;?>"></a>
          <div class="txt"><a href="<? echo $playurl19;?>" title="<? echo $title19;?>"><? echo $title19;?></a></div>
        </li>
            
	
  <li><a href="<? echo $playurl20;?>" target="_blank" title="<? echo $title20;?>"><img src="<? echo $img20;?>" width="130" height="90" alt="<? echo $title20;?>" title="<? echo $title20;?>"></a>
          <div class="txt"><a href="<? echo $playurl20;?>" title="<? echo $title20;?>"><? echo $title20;?></a></div>        </li>
            
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
  <h1 class="lm_1"><a href="javascript:OpenChanel(1);" class="list_name" hidefocus="true">电视剧 <font style="color:#99cc00;font-size:8px">|||||</font></a></h1>
  <h2 class="lm_2" id="CHT_1" style="display: none"><? echo $liebiao; ?></h2>
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

友情链接：<a href="tvlive.php" target="_blank">乐视直播网旧版</a>&nbsp  <a href="http://zhejiang.letvlive.com" target="_blank">浙江卫视</a>&nbsp 所有资源均来自互联网，如有侵犯版权，请联系我。<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_4946187'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s6.cnzz.com/stat.php%3Fid%3D4946187%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script></td>
 
</div>

</body>
</html>
