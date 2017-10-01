<?
$referer = $_SERVER['HTTP_REFERER'];
$selfurl = $_SERVER['HTTP_HOST'];
if(false == strpos($referer,$selfurl)){
 $url="http://www.letvlive.com";
    header("location:$url");
    exit(1);
}
$lid=$_GET['id'];
$data=json_decode(g_contents('http://info.zb.qq.com/?sdtfrom=003&cmd=2&stream=1&cnlid='.$lid));
$url=$data->playurl;
header("location:$url");
function g_contents($url) {
        $user_agent = $_SERVER ['HTTP_USER_AGENT'];
        $ch = curl_init ();
        $timeout = 30;
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
        curl_setopt ( $ch, CURLOPT_USERAGENT, $user_agent );
        @ $c = curl_exec ( $ch );
        curl_close ( $ch );
        return $c;
}
?>
