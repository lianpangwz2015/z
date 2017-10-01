<?

$lid=$_GET['id'];
$url_1="http://live.tv.sohu.com/live/player_json.jhtml?encoding=utf-8&lid=".$lid."&type=1";

$url_2=g_contents($url_1);
preg_match ( '/live":"(.*?)",/', $url_2, $vn );
$url_v=g_contents($vn[1]);
preg_match ( '/url":"(.*?)",/', $url_v, $v );
header("location:$v[1]");



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