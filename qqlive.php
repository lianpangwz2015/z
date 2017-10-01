<?
include 'config.php';

$lid=$_GET['id'];
$list='
<guangdong>guangdong#100104501<guangdong>
<tianjin>tianjin#100003900<tianjin>
<sichuan>sichuan#100001400<sichuan>
<yunnan>yunnan#100104400<yunnan>
<anhui>anhui#100104700<anhui>
<hubei>hubei#100104800<hubei>
<shenzhenweishi>shenzhenweishi#100003600<shenzhenweishi>
<guizhou>guizhou#100102800<guizhou>
<neimenggu>neimenggu#100103800<neimenggu>
<ningxia>ningxia#100001500<ningxia>
<shanxi2>shanxi2#100006400<shanxi2>
<qinghai>qinghai#100101600<qinghai>
<guangxi>guangxi#100104000<guangxi>
<heilongjiang>heilongjiang#100105501<heilongjiang>
<plu>plu#5427<plu>
<neotv>neotv#5284<neotv>

';

preg_match ( '/<.*?>'.$lid.'#(.*?)<.*?>/', $list, $key );
$channel=$key[1];
$pindao=urldecode($_GET['pindao']);



?>
<html>
<head>
<title><?  echo $pindao; ?>-乐视直播网</title>
<script type="text/javascript" src="js/letvlive.js"></script> 
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="Keywords" content="<? echo $pindao;?>腾讯直播，<? echo $pindao;?>腾讯在线直播" />
<meta name="description" content="乐视直播网，为您提供<? echo $pindao;?>腾讯直播" />
<style type="text/css">
body {overflow:hidden;font-size: 12px;margin: 0px;background-color: #000000;}
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
<body><embed wmode="transparent" flashvars="vid=<? echo $channel;?>&vurl=http://info.zb.qq.com/?cnlid=<? echo $channel;?>&sdtfrom=10202&txvjsv=2&rid=1F8FE862526C9452EE4B81F6663D68FDBE8ABA32&rnd=519&defn=&flvtype=1&guid=F897CBF47B0D790D2D2F079613337ADC80AD3132&system=0&pla=0&cmd=3&appver=TencentPlayerLiveV3%2E1%2E4%2E8&flashver=15%2C0%2C0%2C189&fntick=0&stream=1&host=http%253A%252F%252Fv%2Eqq%2Ecom%252Flive%252Ftv%252F29%2Ehtml&sktype=live&funCnlInfo=TenVideo_FlashLive_GetChannelInfo&funTopUrl=TenVideo_FlashLive_GetTopUrl&funLogin=TenVideo_FlashLive_IsLogin&funOpenLogin=TenVideo_FlashLive_OpenLogin&funSwitchPlayer=TenVideo_FlashLive_SwitchPlayer&host=http%3A%2F%2Fv.qq.com%2Flive%2Ftv%2F49.html&txvjsv=2.0&showcfg=1&share=1&full=1&autoplay=1&p=false" src="http://imgcache.qq.com/minivideo_v1/vd/res/TencentPlayerLive.swf?max_age=86400&v=20140714" name="tenvideo_flash_player_1406890482217" id="tenvideo_flash_player_1406890482217" bgcolor="#000000" width="100%px" height="100%px" align="middle" quality="high" allowScriptAccess="never" allowNetworking="internal" allowfullscreen="true" type="application/x-shockwave-flash" pluginspage="http://get.adobe.com/cn/flashplayer/" style="width: 100%px; height: 100%px;"></embed> 
<!--<iframe id="c_play" name="c_play" src="vplay.php?src=/q.php?id=<? global $channel; echo $channel;?>" width="100%" height="100%" scrolling="no" frameborder="0" border="0" allowtransparency="true"></iframe>-->
</body>
</html>
