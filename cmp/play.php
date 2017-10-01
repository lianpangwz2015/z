<?

$src=$_GET['src'];
$title=$_GET['title'];
if($title==''){
$title="乐视直播";
}
?>
<head>
<title><? echo $title; ?>-乐视直播网</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<script type="text/javascript" src="/js/letvlive.js"></script> 
<meta name="Keywords" content="<? echo $title; ?>在线播放" />
<meta name="description" content="乐视直播网为您提供<? echo $title; ?>在线播放" />
<style type="text/css">
html, body { height:100%; margin:0; padding:0; text-align:center; background:#181818; }
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
<body>


<div id="player" style="width:100%;height:100%;"></div>
<script type="text/javascript" src="cmp.js"></script>
<script type="text/javascript">
var flashvars = {
        label:"<? echo $_GET['label']; ?>",
        type:"<? echo $_GET['type']; ?>",
        src:"<? echo $_GET['src']; ?>",
        lists:"<? echo $_GET['lists']; ?>",
		url:"config.xml",
        api : "cmp_loaded",
		
};
//id, width, height, swf_url, flashvars, params, attrs
var htm = CMP.create("cmp", "100%", "100%", "cmp.swf", flashvars);
document.getElementById("player").innerHTML = htm;
</script>
</body>
</html>

