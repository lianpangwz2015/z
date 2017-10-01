var hds_url;
var flv_url;
var jsIsLoaded = 0;	
function getHdsJsonData(channel, playerId, w, h)
{
	var _doc = document.getElementsByTagName("head")[0];
	var jsLoader = createElementByType("script","hdsJsLoader","absolute","0px","0px","0px","0px");	
	var vdnUrl = "http://vdn.live.cntv.cn/api2/liveHtml5.do?channel=pa://cctv_p2p_hd" + channel;

	vdnUrl += "&client=flash";

	getHtml5VideoData = function(){};

	jsLoader.src = vdnUrl;
	_doc.appendChild(jsLoader);
				
	if(typeof jsLoader.onload != "undefined")
	{
			
		jsLoader.onload = function() 
		{
				
			getHdsVideoAddr(playerId, w, h);
		    	
		};

	}

	if(typeof jsLoader.onreadystatechange != "undefined")
	{
		jsLoader.onreadystatechange = function()
		{
			if (jsLoader.readyState == 'loaded' || jsLoader.readyState == 'complete') 
			{
				getHdsVideoAddr(playerId, w, h);						

			}
		}

	}

}


function createElementByType(type,_id,position,_w,_h,_l,_t)
{
	var el = document.createElement(type);
	el.setAttribute("id",_id);
	el.style.position = position;
	el.style.width = _w;
	el.style.height = _h;
	el.style.left = _l;
	el.style.top = _t;
	return el;
}


function getHdsVideoAddr(playerId, w, h)
{
	
	if(typeof(html5VideoData) != "undefined")
	{
		
		var videoData = eval('(' + html5VideoData.replace(/(^\s*)|(\s*$)/g, "") + ')'); 

			flv_url= videoData.flv_url.flv2;
			hds_url = videoData.hds_url.hds1;
			var htm='<iframe id="c_play" name="c_play" src="http://player.cntv.cn/standard/cntvHdsLivePlayer20160204.swf?addrs='+hds_url+'&streamType=live&autoPlay=true&controlBarAutoHide=false" width="100%" height="100%" scrolling="no" frameborder="0" border="0" allowtransparency="true"></iframe>';
 document.getElementById(playerId).innerHTML=htm;
		jsIsLoaded = 1;
	}
}

