<?php
    /*
        群信息:ZM视频解析 574281554
        作者：子墨 QQ：2319927093

        天山-湖南卫视直播解析

        严重警告：
        1，源码仅供学习交流使用。
        2，禁止用于危害官方利益的行为。
        3，禁止用于违反法律法规的行为。
        4，由于无法对学习交流用户的权利信息进行甄别，如您学习交流过程中侵犯了官方的合法利益或存在违法行为，请立即删除本学习交流程序，遵循相关法律。
        5，学习交流用户 应当保证其在学习交流过程中不应用于任何违法行为，并保证承担和赔偿有关违法行为造成的任何损失。
    */
    function http_curl($url,$host,$ctype,$accept,$referer) {
        $header = array(
                'Host:'.$host,
                'Content-type'.$ctype,
                'User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:47.0) Gecko/20100101 Firefox/47.0',
                'Accept:'.$accept,
                'Accept-Encoding: gzip, deflate',
                'X-Requested-With: XMLHttpRequest'
            );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $header); 
         curl_setopt($ch, CURLOPT_REFERER,$referer);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);  
        @ $file = curl_exec($ch);

        curl_close($ch);
        return $file;
    }

    //php跨域请求
    header("Content-type: text/html; charset=utf-8");
    header('Access-Control-Allow-Origin:http://www.tsytv.com.cn');
    header('Access-Control-Allow-Credentials:true');
    header('Access-Control-Allow-Methods:GET, POST, OPTIONS');

    //获取动态生成的javascript标签，通过javascript callback的形式实现数据读取。
    //知识点：请百度jsoncallback 跨域
    $a='http://www.tsytv.com.cn/api/pc/videosecret/?StreamingUrl=http://tv03.tsytv.com.cn/liveho/HunanHDm-500K.stream/playlist.m3u8&&jsoncallback=?';
   
    $b = json_decode(http_curl($a,'www.tsytv.com.cn','text/html; charset=utf-8','text/javascript, application/javascript, application/ecmascript, application/x-ecmascript, */*; q=0.01','http://www.tsytv.com.cn/tsy/sp/zb/index.shtml'),true);
   
    //获取javascriptcallback 中的data 数据，即streamingtokenstarttime streamingtokenendtime  streamingtokencustom streamingtokenhash
    $urls = parse_url($b['data']);
    //通过构建以下地址，获取m3u8文件，注意在ck中赋值于a时，一定要用encodeURIComponent进行编码，
    //知识点，请百度encodeURIComponent和encodeURI的区别
    $true_url ="http://tv03.tsytv.com.cn/liveho/HunanHDm-500K.stream/chunklist.m3u8?".$urls['query'];
   

    ?>
    <html>
    <body>
            <div id="a1"></div>

             <script type="text/javascript" src="player.js" charset="utf-8"></script>

            <script type="text/javascript" src="http://www.tsytv.com.cn/img/tsytv/js/jquery_003.js"> </script>
            <script type="text/javascript">
                            var flashvars={
                                f:'m3u8.swf',
                                a:encodeURIComponent('<?php echo($true_url);?>'),
                                c:0,
                                s:4,
                                lv:1,
                                loaded:'loadedHandler',
                                p:1
                            };
                            var params={bgcolor:'#FFF',allowFullScreen:true,allowScriptAccess:'always',wmode:'transparent'};
                            CKobject.embedSWF('player.swf','a1','ckplayer_a1','980','525',flashvars,params);
         </script> 
        </body>
    </html>