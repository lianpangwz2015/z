
<html>
<head>
<style type="text/css">
body {overflow:hidden;font-size: 12px;margin: 0px;background-color: #000000;}
</style>
<Meta http-equiv="Refresh" Content="75; Url=<? echo $_GET['id']?>"> 
<title>����ֱ����-����ֱ����</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="Keywords" content="��������,����ֱ����,��������̨,����̨,����ֱ��" />
<meta name="description" content="����ֱ��������һ��ǧ����ϲ��������ֱ��ֱ����Ŀ����ȫ�µ��Ӿ�Ϊ��������������ԭ���Ͷ�����Ƶֱ�����ݣ��߶˵ķ��ʺͻ������̼�����Ů����PK�����е�ʱ�н�˵��������Ŀһ�£�" />
<SCRIPT LANGUAGE="JavaScript1.2">
adTime=30; chanceAd=1;
var ns=(document.layers);
var ie=(document.all);
var w3=(document.getElementById && !ie);
adCount=0;
function initAd(){
        if(!ns && !ie && !w3) return;
        if(ie)                adDiv=eval('document.all.sponsorAdDiv.style');
        else if(ns)        adDiv=eval('document.layers["sponsorAdDiv"]');
        else if(w3)        adDiv=eval('document.getElementById("sponsorAdDiv").style');
        randAd=Math.ceil(Math.random()*chanceAd);
        if (ie||w3)
        adDiv.visibility="visible";
        else
        adDiv.visibility ="show";
        if(randAd==1) showAd();
}
function showAd(){
if(adCount<adTime*10){adCount+=1;
        if (ie){documentWidth  =document.body.offsetWidth/2+document.body.scrollLeft-20;
        documentHeight =document.body.offsetHeight/2+document.body.scrollTop-20;}
        else if (ns){documentWidth=window.innerWidth/2+window.pageXOffset-20;
        documentHeight=window.innerHeight/2+window.pageYOffset-20;}
        else if (w3){documentWidth=self.innerWidth/2+window.pageXOffset-20;
        documentHeight=self.innerHeight/2+window.pageYOffset-20;}
        adDiv.left=documentWidth-200;adDiv.top =documentHeight-200;
        setTimeout("showAd()",100);}else closeAd();
}
function closeAd(){
if (ie||w3)
adDiv.display="none";
else
adDiv.visibility ="hide";
}
onload=initAd;
function ResumeError() { 
return true; 
} 
window.onerror = ResumeError; 
</script>
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

</head><body bgcolor="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" scroll=no >
<center><div id="sponsorAdDiv" style="visibility:hidden"><table width="100%" height="100%" bgcolor="000000"><tr><td>
<center><p><img src="../images/loading.gif"><BR><BR><font face=���� size=6 color==#ff0000>���ڼ��أ����Ե�.......</font>
</p></center></td></tr></table></div></center></div>
<div id="azhibo-player-block">


</body>
</html>
