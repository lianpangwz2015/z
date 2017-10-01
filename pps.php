
<?
include 'config.php';
$lid=$_GET['id'];

$list='<GDTV6>GDTV6#180047022<GDTV6>
<anhui>anhui#180038622<anhui>
<tianjin>tianjin#180051122<tianjin>
<liaoning>liaoning#180049822<liaoning>
<jiangxi>jiangxi#180050722<jiangxi>
<heilongjiang>heilongjiang#180051722<heilongjiang>
<shandong>shandong#180051322<shandong>
<yunnan>yunnan#180051022<yunnan>
<sichuan>sichuan#146<sichuan>
<henan>henan#180051622<henan>
<guangdong>guangdong#180052222<guangdong>
<nanfang>nanfang#180042722<nanfang>
<shenzhenweishi>shenzhenweishi#180052122<shenzhenweishi>
<hubei>hubei#157<hubei>
<guizhou>guizhou#180051922<guizhou>
<hebei>hebei#180051822<hebei>
<jilin>jilin#180051522<jilin>
<guangxi>guangxi#180052022<guangxi>
<qinghai>qinghai#180050922<qinghai>
<shanxi1>shanxi1#180050422<shanxi1>
<shanxi2>shanxi2#180050822<shanxi2>
<neimenggu>neimenggu#180050222<neimenggu>
<NMGTV7>NMGTV7#180050122<NMGTV7>
<ningxia>ningxia#180051422<ningxia>
<xizang>xizang#180049922<xizang>
<xinjiang>xinjiang#180050022<xinjiang>
<gansu>gansu#180050622<gansu>
<hngg>hngg#180040022<hngg>
<hnyl>hnyl#180040122<hnyl>
<hnjs>hnjs#180045422<hnjs>
<hndsj>hndsj#180045522<hndsj>
<changsjm>changsjm#180039822<changsjm>
<changsnx>changsnx#180049122<changsnx>
<changszf>changszf#180049022<changszf>
<changsxw>changsxw#180048922<changsxw>
<nanfangys>nanfangys#180042422<nanfangys>
<nanfangzy>nanfangzy#180042522<nanfangzy>
<nanfangjs>nanfangjs#180042622<nanfangjs>
<gdxw>gdxw#180047022<gdxw>
<gx_zy>gx_zy#180049222<gx_zy>
<gzzh>gzzh#180046822<gzzh>
<gzxw>gzxw#180046722<gzxw>
<gzys>gzys#180046622<gzys>
<gzjj>gzjj#180046522<gzjj>
<shdfyl>shdfyl#180040922<shdfyl>
<shjy>shjy#180048622<shjy>
<shdfdy>shdfdy#180040922<shdfdy>
<bjkj>bjkj#180049322<bjkj>
<bjys>bjys#180047622<bjys>
<bjsh>bjsh#180047522<bjsh>
<bjxw>bjxw#180047322<bjxw>
<bjkk>bjkk#180052422<bjkk>
<bjqs>bjqs#180047422<bjqs>
<zjyspd>zjyspd#180043222<zjyspd>
<zjkjpd>zjkjpd#180043322<zjkjpd>
<zjjspd>zjjspd#180043422<zjjspd>
<zjggpd>zjggpd#180040322<zjggpd>
<jsys>jsys#180045122<jsys>
<jslz>jslz#180048822<jslz>
<ymkt>ymkt#180042122<ymkt>
<jsjy>jsjy#180039522<jsjy>
<jsgg>jsgg#180044922<jsgg>
<yxfy>yxfy#180055722<yxfy>
';

preg_match ( '/<.*?>'.$lid.'#(.*?)<.*?>/', $list, $key );
$channel=$key[1];
$url="http://cache.video.qiyi.com/liven/".$channel."?lp=499001823&src=1702633101b340d8917a69cf8a4b8c7c&pf=14";
$url_2=g_contents($url);
$url=str_replace('\/',"/",$url_2);
preg_match('#live/(.*?)\.flv#',$url,$vn);
$key=$vn[1];

function g_contents($url) {
        $user_agent = $_SERVER ['HTTP_USER_AGENT'];
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
<title>乐视直播网-<? global $title; echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="Keywords" content="<? global $pindao; echo $pindao;?>,<? global $keyword; echo $keyword;?>" />
<meta name="description" content="<? global $description; echo $description;?>" />
<style type="text/css">
* {margin:0;padding:0;list-style:none;font-size:14px;}
html {height:100%;}
.if { border:1px #AFAFAF solid}
.tj {display:none}
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
<body scroll="no">
<script type="text/javascript" src="http://static.qiyi.com/js/common/swfobject.js"></script>

	
	<script type="text/javascript">

		var flashvars = {};

	    flashvars.coreUrl                       = "http://www.iqiyi.com/common/flashplayer/20150215/20324.swf";
	    flashvars.skinUrl                       = "http://www.iqiyi.com/player/20140529154832/LivePlayerSkin.swf";

	    flashvars.preLoaderUrl                  = "http://www.iqiyi.com/player/20130709174613/loading.swf";
	    flashvars.waitingImgUrl                 = "http://pic3.qiyipic.com/common/20130709/354fa32ba75d4094835e73bac8e50fc8.png";
	    flashvars.livingImgUrl                  = "http://pic1.qiyipic.com/common/20130709/fc1286ba3a3e49959fc3bc789044f5f7.png";
	    flashvars.liveLogoUrl                   = "http://www.iqiyi.com/player/20131227184131/liveLogo.swf";
	    flashvars.vodLogoUrl                    = "http://www.iqiyi.com/player/20131227184131/liveLogo.swf";

	    flashvars.vid                           = "<?  global $key; echo $key;?>";

	    flashvars.cid                           = "qc_100001_100100";
	    flashvars.stationType                   = "ppsw";

	    flashvars.local                         = "1";
	    flashvars.tvId                          = "local";

	    //flashvars.soundTracks                 = "中文,EN";//左音轨对应着[0],右音轨对应着[1],默认播放左音轨
	    flashvars.areaList                    = "";

	    flashvars.duration                      = 14400;
	    flashvars.delay  						=0;
	    flashvars.delayAreaList  			    ="";
	    var params = {};
	    params.scale = "noscale";
	    params.salign = "tl";
	    params.wmode = "window";
	    params.swliveconnect = "true";
	    params.allowfullscreen = "true";
	    params.allowscriptaccess = "always";
	    params.allownetworking = "all";
	    params.bgcolor = "#000000";
	    var attributes = {};
	    attributes.id = "ppsLive";
	    swfobject.embedSWF("http://www.iqiyi.com/common/flashplayer/20150215/LivePlayer_3_0_3_9.7.swf", "qiyiLive",  "100%", "100%", "10.0.0", "http://www.iqiyi.com/player/20130702143439/expressInstall.swf", flashvars, params, attributes);
	</script>
<div id='qiyiLive'></div>
</body>
</html>