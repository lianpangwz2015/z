<?
$id=$_GET['id'];
$pindao=urldecode($_GET['pindao']);
?>


<html>
<head>
<title><?  echo $pindao; ?>-乐视直播网</title>
<script type="text/javascript" src="/js/letvlive.js"></script> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<? echo $pindao;?>直播，<? echo $pindao;?>在线直播" />
<meta name="description" content="乐视直播网，为您提供<? echo $pindao;?>直播" />
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
var w = J_get('w');
var h = J_get('h');
var left = J_get('left');
if(left>1){
   l = left;
}
document.write('<div style="width: '+w+'px; overflow: hidden;"><div style="margin-top: -'+t+'px; margin-left: -'+l+'px; width: 1330px; height: '+h+'px; overflow: hidden;"><iframe scrolling="no" frameborder="1" align="center" src="'+id+'" style="width: 1330px; height: '+h+'px;" rel="nofollow" border="1"></iframe></div></div>');
//-->
</SCRIPT>
</body>
</html>
