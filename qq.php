<?php
error_reporting(0);
function g_contents($url) {
    $ch= curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_NOBODY, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_TIMEOUT,30);
    curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0');
    curl_setopt($ch, CURLOPT_ENCODING ,'');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    @$data = curl_exec($ch);
    curl_close($ch);
    return $data;
        }
function getvid($url){
$data=json_decode(g_contents('http://info.zb.qq.com/?sdtfrom=003&cmd=2&stream=1&cnlid='.$url));
$dat=$data->playurl;
return $dat;
}
$xml = "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n<list>\n";
$url=g_contents('http://v.qq.com/live/tv/list.html');
preg_match_all('|http://v.qq.com/live/tv/(\d+).html|',$url,$id);
foreach($id[1] as $k=>$ids){
    $data=g_contents('http://v.qq.com/live/tv/'.$ids.'.html');
    preg_match("|playid:'(\d+)'|",$data,$pid);
    preg_match("|channelname:'([^']+)'|",$data,$cname);
    $xml.='<m type="2" label="'.$cname[1].'" src="'.getvid($pid[1]).'"/>'."\n";
}
$xml .="</list>";
echo $xml;
?>
