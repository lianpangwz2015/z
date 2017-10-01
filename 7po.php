<?


$lid=$_GET['id'];
$list='<cctv-1>cctv1#84<cctv-1>
<cctv-2>cctv2#155<cctv-2>
<cctv-3>cctv3#145<cctv-3>
<cctv-4>cctv4#154<cctv-4>
<cctv-5>cctv5#147<cctv-5>
<cctv-6>cctv6#153<cctv-6>
<cctv-7>cctv7#150<cctv-7>
<cctv-8>cctv8#148<cctv-8>
<cctv-10>cctv10#146<cctv-10>
<cctv-11>cctv11#144<cctv-11>
<cctv-12>cctv12#152<cctv-12>
<cctv-13>cctv13#151<cctv-13>
<cctv-14>cctv14#160<cctv-14>
<cctv-15>cctv15#157<cctv-15>
<hunan>hunan#90<hunan>
<hunan1>hunan1#164<hunan1>
<zhejiang>zhejiang#89<zhejiang>
<jiangsu>jiangsu#91<jiangsu>
';
preg_match ( '/<.*?>'.$lid.'#(.*?)<.*?>/', $list, $key );
$channel=$key[1];
$url="http://a.puteasy.com:8800/authorize?chn_id=".$channel."&mac=001518018131&mac_code=e36b560b4ae18308ae880a4dc1cf9351&mcode=f51c7eff9125ceb466a89f83c379c382";

$url_1=get_jump_url($url);
$url=str_replace("mpegts","flv",$url_1);

preg_match ( '#live\/.*?chn_id#', $url, $vn );
$x='<list>';
$x.='<m label="乐视直播">';
$x.='<m type="2" src="'.$url_1.'" label="联通"/>';
$x.='<m type="2" src="http://tzu-cv.puteasy.streamocean.net/'.$vn[0].'='.$channel.'&mac=001518018131&mac_code=e36b560b4ae18308ae880a4dc1cf9351&mcode=f51c7eff9125ceb466a89f83c379c382" label="联通"/>';
$x.='<m type="2" src="http://lishui-cv.puteasy.streamocean.net/'.$vn[0].'='.$channel.'&mac=001518018131&mac_code=e36b560b4ae18308ae880a4dc1cf9351&mcode=f51c7eff9125ceb466a89f83c379c382" label="电信"/>';
$x.='<m type="2" src="http://pbs.cnlive.streamocean.com/live/'.$vn[0].'='.$channel.'&mac=001518018131&mac_code=e36b560b4ae18308ae880a4dc1cf9351&mcode=f51c7eff9125ceb466a89f83c379c382" label="联通"/>';
$x.='<m type="2" src="http://nju-ott-cv.jstv.streamocean.net/'.$vn[0].'='.$channel.'&mac=001518018131&mac_code=e36b560b4ae18308ae880a4dc1cf9351&mcode=f51c7eff9125ceb466a89f83c379c382" label="信号1"/>';
$x.='<m type="2" src="http://nju-cv.cnlive.streamocean.net/'.$vn[0].'='.$channel.'&mac=001518018131&mac_code=e36b560b4ae18308ae880a4dc1cf9351&mcode=f51c7eff9125ceb466a89f83c379c382" label="信号2"/>';
$x.='<m type="2" src="http://cnlive.streamocean.com/'.$vn[0].'='.$channel.'&mac=001518018131&mac_code=e36b560b4ae18308ae880a4dc1cf9351&mcode=f51c7eff9125ceb466a89f83c379c382" label="信号3"/>';
$x.='<m type="2" src="http://custream.jstv.com/'.$vn[0].'='.$channel.'&mac=001518018131&mac_code=e36b560b4ae18308ae880a4dc1cf9351&mcode=f51c7eff9125ceb466a89f83c379c382" label="双线"/>';
$x.='</m>';
$x.='</list>';
echo $x;



function get_jump_url($url) {
$url = str_replace(' ','',$url);
do {//do.while循环：先执行一次，判断后再是否循环
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HEADER, 1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_TIMEOUT, 1);
$header = curl_exec($curl);
curl_close($curl);
preg_match('|Location:\s(.*?)\s|',$header,$tdl);
if(strpos($header,"Location:")){
$url=$tdl ? $tdl[1] :  null ;
}
else{
return $url.'';
break;
}
}while(strpos($header,"Location:"));
}

?>