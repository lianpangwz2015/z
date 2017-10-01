<?

define("URL", 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"]);
parse_str($_SERVER['QUERY_STRING']);
if($key){cctv_key($key);}
if($name&&$date){cctv_date($name,$date);}
if($channel&&$playtime){cctv_play($channel,$playtime);}
defaultXml() ;

function  cctv_play($channel,$playtime){
$x='<m starttype="0" label="" type="mp4" bytes="193212" duration="3600" bg_video="" lrc="">';
$x.='<u bytes="16101" duration="300" src="http://v.cctv.com/live_back/nettv_'.$channel.'/'.$playtime.'-001.mp4?start={start_seconds}" />';
$x.='<u bytes="16101" duration="300" src="http://v.cctv.com/live_back/nettv_'.$channel.'/'.$playtime.'-002.mp4?start={start_seconds}" />';
$x.='<u bytes="16101" duration="300" src="http://v.cctv.com/live_back/nettv_'.$channel.'/'.$playtime.'-003.mp4?start={start_seconds}" />';
$x.='<u bytes="16101" duration="300" src="http://v.cctv.com/live_back/nettv_'.$channel.'/'.$playtime.'-004.mp4?start={start_seconds}" />';
$x.='<u bytes="16101" duration="300" src="http://v.cctv.com/live_back/nettv_'.$channel.'/'.$playtime.'-005.mp4?start={start_seconds}" />';
$x.='<u bytes="16101" duration="300" src="http://v.cctv.com/live_back/nettv_'.$channel.'/'.$playtime.'-006.mp4?start={start_seconds}" />';
$x.='<u bytes="16101" duration="300" src="http://v.cctv.com/live_back/nettv_'.$channel.'/'.$playtime.'-007.mp4?start={start_seconds}" />';
$x.='<u bytes="16101" duration="300" src="http://v.cctv.com/live_back/nettv_'.$channel.'/'.$playtime.'-008.mp4?start={start_seconds}" />';
$x.='<u bytes="16101" duration="300" src="http://v.cctv.com/live_back/nettv_'.$channel.'/'.$playtime.'-009.mp4?start={start_seconds}" />';
$x.='<u bytes="16101" duration="300" src="http://v.cctv.com/live_back/nettv_'.$channel.'/'.$playtime.'-010.mp4?start={start_seconds}" />';
$x.='<u bytes="16101" duration="300" src="http://v.cctv.com/live_back/nettv_'.$channel.'/'.$playtime.'-011.mp4?start={start_seconds}" />';
$x.='<u bytes="16101" duration="300" src="http://v.cctv.com/live_back/nettv_'.$channel.'/'.$playtime.'-012.mp4?start={start_seconds}" />';
$x.='</m>';
echo $x;
exit;
}


function cctv_date($name,$date){
$date=str_replace('/','-',$date);
$x='<list>';
$x.='<m type="merge" src="back.php?channel='.$name.'&playtime='.$name.'-'.$date.'-07"  label="07:00 AM (回看)" />';
$x.='<m type="merge" src="back.php?channel='.$name.'&playtime='.$name.'-'.$date.'-08"  label="08:00 AM (回看)" />';
$x.='<m type="merge" src="back.php?channel='.$name.'&playtime='.$name.'-'.$date.'-09"  label="09:00 AM (回看)" />';
$x.='<m type="merge" src="back.php?channel='.$name.'&playtime='.$name.'-'.$date.'-10"  label="10:00 AM (回看)" />';
$x.='<m type="merge" src="back.php?channel='.$name.'&playtime='.$name.'-'.$date.'-11"  label="11:00 AM (回看)" />';
$x.='<m type="merge" src="back.php?channel='.$name.'&playtime='.$name.'-'.$date.'-12"  label="12:00 PM (回看)" />';
$x.='<m type="merge" src="back.php?channel='.$name.'&playtime='.$name.'-'.$date.'-13"  label="13:00 PM (回看)" />';
$x.='<m type="merge" src="back.php?channel='.$name.'&playtime='.$name.'-'.$date.'-14"  label="14:00 PM (回看)" />';
$x.='<m type="merge" src="back.php?channel='.$name.'&playtime='.$name.'-'.$date.'-15"  label="15:00 PM (回看)" />';
$x.='<m type="merge" src="back.php?channel='.$name.'&playtime='.$name.'-'.$date.'-16"  label="16:00 PM (回看)" />';
$x.='<m type="merge" src="back.php?channel='.$name.'&playtime='.$name.'-'.$date.'-17"  label="17:00 PM (回看)" />';
$x.='<m type="merge" src="back.php?channel='.$name.'&playtime='.$name.'-'.$date.'-18"  label="18:00 PM (回看)" />';
$x.='<m type="merge" src="back.php?channel='.$name.'&playtime='.$name.'-'.$date.'-19"  label="19:00 PM (回看)" />';
$x.='<m type="merge" src="back.php?channel='.$name.'&playtime='.$name.'-'.$date.'-20"  label="20:00 PM (回看)" />';
$x.='<m type="merge" src="back.php?channel='.$name.'&playtime='.$name.'-'.$date.'-21"  label="21:00 PM (回看)" />';
$x.='<m type="merge" src="back.php?channel='.$name.'&playtime='.$name.'-'.$date.'-22"  label="22:00 PM (回看)" />';
$x.='<m type="merge" src="back.php?channel='.$name.'&playtime='.$name.'-'.$date.'-23"  label="23:00 PM (回看)" />';
$x.='<m type="merge" src="back.php?channel='.$name.'&playtime='.$name.'-'.$date.'-00"  label="00:00 AM (回看)" />';
$x.='<m type="merge" src="back.php?channel='.$name.'&playtime='.$name.'-'.$date.'-01"  label="01:00 AM (回看)" />';
$x.='<m type="merge" src="back.php?channel='.$name.'&playtime='.$name.'-'.$date.'-02"  label="02:00 AM (回看)" />';
$x.='<m type="merge" src="back.php?channel='.$name.'&playtime='.$name.'-'.$date.'-03"  label="03:00 AM (回看)" />';
$x.='<m type="merge" src="back.php?channel='.$name.'&playtime='.$name.'-'.$date.'-04"  label="04:00 AM (回看)" />';
$x.='<m type="merge" src="back.php?channel='.$name.'&playtime='.$name.'-'.$date.'-05"  label="05:00 AM (回看)" />';
$x.='<m type="merge" src="back.php?channel='.$name.'&playtime='.$name.'-'.$date.'-06"  label="06:00 AM (回看)" />';
$x.='</list>';
echo $x;
exit;
}

function cctv_key($key) {
        $Y = date("Y");
        $m = date("m");
        $d = date("d");
        $list = "<list>\n";
        $mon = 7; //设置每个节目显示天数 最大为30天，最小为2
        if ($d >= $mon) {
                for ($i = $d +0; $i > $d - $mon; $i--) {
                        $k = hh($i);
                        $riqi = "$Y/$m/$k";
                        $list .= "<m   label=\"$riqi\" list_src=\"".URL."?name=$key&amp;date=$riqi\" />\n";
                }
        } else {
                for ($i = $d +0; $i > 0; $i--) {
                        $k = hh($i);
                        $riqi = "$Y/$m/$k";
                        $list .= "<m label=\"$riqi\" list_src=\"".URL."?name=$key&amp;date=$riqi\" />\n";
                }
                $j=hh($m -1);
                $lm = "$Y-$j-$d";
                $days = date('t', strtotime("$lm")); //获取上个月天数
                for ($i = $days; $i > $days + $d - $mon; $i--) {
                        $k = hh($i);
                        $riqi = "$Y/$j/$k";
                        $list .= "<m  label=\"$riqi\" list_src=\"".URL."?name=$key&amp;date=$riqi\" />\n";
                }
        }
        header("Content-type: text/xml; charset=utf-8");
        echo $list . "</list>";
        exit;
}

function getStr($url) {
        $user_agent = "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.146 Safari/537.36";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($oCurl, CURLOPT_USERAGENT,$user_agent);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        @ $data = curl_exec($ch);
        curl_close($ch);
        return $data;
}
function hh($hour){
        return  str_pad($hour,2,"0",STR_PAD_LEFT);
}

function defaultXml() {
        $array = array (
                'cctv1' => 'CCTV-1综合频道',
                'cctv2' => 'CCTV-2财政频道',
                'cctv3' => 'CCTV-3综艺频道',
                'cctv4' => 'CCTV-4中文国际',
                'cctv5' => 'CCTV-5体育频道',
                'cctv6' => 'CCTV-6电影频道',
                'cctv7' => 'CCTV-7军事农业',
                'cctv8' => 'CCTV-8影剧频道',
                'cctv9d' => 'CCTV-纪录',
                'cctv10' => 'CCTV-10科教频道',
                'cctv11' => 'CCTV-11戏曲频道',
                'cctv12' => 'CCTV-12社会与法',
                'cctvgaoqing' => 'CCTV-HD高清频道',
                'cctvchildren' => 'CCTV-14少儿频道',
                'cctvmusic' => 'CCTV-15音乐频道',
                'cctv9' => 'CCTV-NEWS',
                'cctv13' => 'CCTV-新闻',
                'cctvf' => 'CCTV-法语',
                'cctvarabic' => 'CCTV-阿拉伯语',
                'russian' => 'CCTV-俄语',
                'cctve' => 'CCTV-西语',
                'btv1' => '北京卫视',
				'jiangsu' => '江苏卫视',
                'shanghai' => '东方卫视',
                'tianjin' => '天津卫视',
                'chongqing' => '重庆卫视',
                'sichuan' => '四川卫视',
                'hunan' => '湖南卫视',
                'guangdong' => '广东卫视',
                'hebei' => '河北卫视',
                'shanxi1' => '山西卫视',
                'liaoning' => '辽宁卫视',
                'jilin' => '吉林卫视',
                'zhejiang' => '浙江卫视',
                'anhui' => '安徽卫视',
                'dongnan' => '东南卫视',
                'jiangxi' => '江西卫视',
                'shandong' => '山东卫视',
                'henan' => '河南卫视',
                'hubei' => '湖北卫视',
                'luyou' => '旅游卫视',
                'yunnan' => '云南卫视',
                'shanxi2' => '陕西卫视',
                'gansu' => '甘肃卫视',
                'qinghai' => '青海卫视',
                'guangxi' => '广西卫视',
                'ningxia' => '宁夏卫视',
                'guizhou' => '贵州卫视',
                'heilongjiang' => '黑龙江卫视',
                'neimenggu' => '内蒙古卫视',
                'xinjiang' => '新疆卫视'
        );
        $x = "<list>\n";
        foreach ($array as $k => $v) {
                $x .= "<m list_src=\"".URL."?key=$k\" label=\"$v\"/>\n";
        }
        $x .= '</list>';
        echo $x;
}
function get_head($sUrl){
$oCurl = curl_init();

$header[] = "Content-type: application/x-www-form-urlencoded";
$user_agent = "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.146 Safari/537.36";

curl_setopt($oCurl, CURLOPT_URL, $sUrl);
curl_setopt($oCurl, CURLOPT_HTTPHEADER,$header);

curl_setopt($oCurl, CURLOPT_HEADER, true);

curl_setopt($oCurl, CURLOPT_NOBODY, true);

curl_setopt($oCurl, CURLOPT_USERAGENT,$user_agent);
curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );

curl_setopt($oCurl, CURLOPT_POST, false);

$sContent = curl_exec($oCurl);

$headerSize = curl_getinfo($oCurl, CURLINFO_HEADER_SIZE);

$header = substr($sContent, 0, $headerSize);
    
curl_close($oCurl);

return $header;
}
?>