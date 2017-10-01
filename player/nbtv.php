<?
$pindao=urldecode($_GET['pindao']);
$id=$_GET['id'];

?>
<html>
<head>
<title><?  echo $pindao; ?>-乐视直播网</title>
<script type="text/javascript" src="/js/letvlive.js"></script> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<? echo $pindao;?>官网直播，<? echo $pindao;?>官网在线直播" />
<meta name="description" content="乐视直播网，为您提供<? echo $pindao;?>官网直播" />
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
<body topmargin="0" leftmargin="0">
<SCRIPT LANGUAGE="JavaScript">
<!--
function J_get(name, url)
{
	url  = url?url:self.window.document.location.href;
	var start	= url.indexOf(name + '=');
	if (start == -1) return '';
	var len = start + name.length + 1;
	var end = url.indexOf('&',len);
  	if (end == -1) end = url.length;
  	return unescape(url.substring(len,end));
}
var id = J_get('id');
var t = J_get('t');
var l = J_get('l');
var left = J_get('left');
if(left>1){
   l = left;
}
document.write('<div style="margin-top: -275px; margin-left: -280px; width: 1000px; height: 755px; overflow: hidden;"><iframe scrolling="no" frameborder="1" align="center" src="'+id+'" style="width: 1280px; height: 1200px;" rel="nofollow" border="1"></iframe></div>');
//-->
</SCRIPT>
</body>
</html>