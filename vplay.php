<?
include 'config.php';
?>
<head>
<script type="text/javascript" src="js/letvlive.js"></script> 
<title>乐视直播-<? global $title; echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="Keywords" content="<? global $keyword; echo $keyword;?>" />
<meta name="description" content="<? global $description; echo $description;?>" />
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
<script type="text/javascript" src="js/cmp.js"></script> 
<script type="text/javascript" src="js/wmp.js"></script> 
<script type="text/javascript">
var cmpo;
function cmp_loaded(key) {
        //cmp loaded
        cmpo = CMP.get("cmp");
        if (cmpo) {
                //cmp callback
                //alert(cmpo.config("version"));
                document.title = cmpo.config("name");
                cmpo.addEventListener("model_load", "cmp_model_load");
        }
}
function cmp_model_load(data) {
        document.title = cmpo.item("label");
}
var flashvars = {
       rtmp:"<? echo $_GET['rtmp']; ?>",
        type:"<? echo $_GET['type']; ?>",
        src:"<? echo $_GET['src']; ?>",
        lists:"<? echo $_GET['url']; ?>",
		url:"cmp.php",
        api : "cmp_loaded"
};
//id, width, height, swf_url, flashvars, params, attrs
var htm = CMP.create("cmp", "100%", "100%", "cmp.swf", flashvars);
document.getElementById("player").innerHTML = htm;
</script>
</body>
</html>

