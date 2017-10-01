<?
include 'config.php';
$date=date("Y-m-d");
$ctv='http://tv.cntv.cn/index.php?action=zhibo-jiemu&channel='. $_GET['id'];
$str=end(explode('<li class="cur" mark="zhibo">',getUrl($ctv)));
preg_match_all('|<span class="time">(.*?)</li>|imsU',$str,$r);
foreach($r[1] as $k=>$v){
$lrc=iconv("UTF-8", "GB2312//IGNORE", $v);

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
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
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
    <td ><span class="style1">&nbsp;<? global $lrc; echo $lrc;?></span></td>
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
