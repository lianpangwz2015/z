<?
$url="http://www.fun.tv/vplay/g-".$_GET['id']."/";
$url=getUrl($url);
preg_match('|data-vid="(.*?)"|i',$url,$id);
$url="http://pm.funshion.com/v5/media/play/?id=".$id[1]."&cl=mweb&uc=30";
$url=getUrl($url);
$url=str_replace('\/',"/",$url);
preg_match('|"http":"(.*?)"|i',$url,$hd);
$url=getUrl($hd[1]);
$url=str_replace('\/',"/",$url);
preg_match('|urls":\["(.*?)",|i',$url,$h);
header("Location:".$h[1]);
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