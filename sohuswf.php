<?
$pindao=$_GET['pindao'];
?>
<html>
<head>
<style type="text/css">
body {overflow:hidden;font-size: 12px;margin: 0px;background-color: #000000;}
</style>
<title><?  echo $pindao; ?>-����ֱ����</title>
<script type="text/javascript" src="js/letvlive.js"></script> 
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="Keywords" content="<? echo $pindao;?>�Ѻ�ֱ����<? echo $pindao;?>�Ѻ�����ֱ��" />
<meta name="description" content="����ֱ������Ϊ���ṩ<? echo $pindao;?>�Ѻ�ֱ��" />
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
<iframe id="c_play" name="c_play" src="http://tv.sohu.com/upload/swf/20130724/Main.swf?vid=
<? echo $_GET['id']?>&ltype=1&autoplay=true&showCtrlBar=1" width="100%" height="100%" scrolling="no" frameborder="0" border="0" allowtransparency="true"></iframe>
</body>
</html>
