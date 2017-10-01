<?
$url="http://www.tsytv.com.cn/api/app/android/videosecret/?SeqNo=1466730939796&Version=1.0&StreamingUrl=http%3A%2F%2Ftv03.tsytv.com.cn%2Fliveho%2FHunanHDm-500K.stream%2Fplaylist.m3u8&TimeStamp=1466730939&Source=1ddd168bc72b3e1987b15f22fb21eab5&TerminalSN=f75699bce8bbac2df10e4c969cdf7b57";
$url=g_contents($url);
$url=str_replace('\/',"/",$url);
preg_match ( '#data":"(.*?)"#', $url, $gid );
$url=$gid[1];

function g_contents($url) {
$header[] = "http://www.tsytv.com.cn/tsy/sp/zb/index.shtml";
;
        $user_agent = 'User-Agent: android-async-http/1.4.4 (http://loopj.com/android-async-http)';
        $ch = curl_init ();
        $timeout = 30;
		curl_setopt ( $ch, CURLOPT_HTTPHEADER,$header);
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
        curl_setopt ( $ch, CURLOPT_USERAGENT, $user_agent );
        @ $c = curl_exec ( $ch );
        curl_close ( $ch );
        return $c;
}
?>
 <html>
    <body>
            <div id="a1"></div>

             <script type="text/javascript" src="../jplayer/html/player.js" charset="utf-8"></script>

         
            <script type="text/javascript">
                            var flashvars={
                                f:'../jplayer/html/m3u8.swf',
                                a:encodeURIComponent('<?php echo($url);?>'),
                                c:0,
                                s:4,
                                lv:1,
                                loaded:'loadedHandler',
                                p:1
                            };
                            var params={bgcolor:'#FFF',allowFullScreen:true,allowScriptAccess:'always',wmode:'transparent'};
                            CKobject.embedSWF('../jplayer/html/player.swf','a1','ckplayer_a1','980','525',flashvars,params);
         </script> 
        </body>
    </html>