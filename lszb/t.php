<?
$referer = $_SERVER['HTTP_REFERER'];
$selfurl = $_SERVER['HTTP_HOST'];
if(false == strpos($referer,$selfurl)){
$url="http://www.letvlive.com";
    header("location:$url");
    exit(1);
}
$lid=$_GET['id'];
$url_1="http://vdn.live.cntv.cn/api2/live.do?client=androidapp&channel=pa://cctv_p2p_hd".$lid;
//$url_1="http://vdn.live.cntv.cn/api2/liveHtml5.do?channel=pa://cctv_p2p_hd".$lid;
$url_2=g_contents($url_1);
preg_match ( '/flv2":"(.*?)",/', $url_2, $vn );
preg_match ( '/hds2":"(.*?)",/', $url_2, $v );
$x='<list>';
$x.='<m label="乐视直播">';
$x.='<m type="2" src="'.$v[1].'" label="乐视直播"/>';
$x.='<m type="2" src="'.$vn[1].'" label="乐视直播"/>';

$x.='</m>';
$x.='</list>';
echo $x;

function g_contents($url) {
        $user_agent = 'Dalvik/v3.3.98 (Linux; U; Android 4.4.4; E653Lw Build/KTU84P)';
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
