!function ($) {
	function CallApi_error(jqXHR, textStatus, errorThrown){
        alert('Error:' + textStatus);
    }
	
	 var objSettings = {
        end_point:'/stamp',
        method:'GET',
        DEBUG:false,
        APIUrl:null,
        funCallBack:function(objData){}    
    };
	var BG = window.BG = {
		jEleOut:null,
		CallBack:function(mixData){
			console.log(mixData);
		},
		GetPlayerInfo:function(strExtra){
			if(typeof strExtra == 'undefined'){
				strExtra = '';
			}
			BG.CallApi('/player' + strExtra);
		},
		Init:function(objNewSettings){
            objSettings = BG.Extend(objNewSettings, objSettings);
        },
    
        Extend:function(objOptions, objDefault){
            if(typeof objOptions == 'undefined'){
                objOptions = objDefault;
            }else{
                for(strKey in objOptions){
                    objDefault[strKey] = objOptions[strKey];
                }
            }
            return objDefault;
        },
        CallApi:function(strBaseUrl, objParams, funCallBack, strType){
			
            if(typeof funCallBack != 'string'){
                objSettings.funCallBack = funCallBack;
                funCallBack = 'BG.CallBack';
				
            }
            if(typeof strType != 'string'){
                strType = objSettings.method;
				
            }
			
            var strUrl = objSettings.APIUrl + strBaseUrl + "?";
            objParams = BG.Extend(objSettings.QS_DATA, objParams);
            objParams['app_id'] = objSettings.app_id;
            objParams['access_token'] = objSettings.access_token;
            objParams['response_type'] = 'JSON';
            objParams['json_callback'] = funCallBack;
            if(strType == 'GET'){
                for(strKey in objParams){
                    strUrl += "&" + strKey + "=" + objParams[strKey]; 
                }
            }
			
            
			
			$("head").append($('<scr' + 'ipt type="text/javascript" src="' + strUrl + '"></scr' + 'ipt>'));
			/*
            $.ajax({
                url: strUrl,
                success: objSettings.funCallBack,
                error: CallApi_error,
                data:objParams,
                //dataType:'json',
                type:strType
            }); */
	        
        },
        Show:function(jEleIn){
        	console.log('Showing: ' + jEleIn);
        	if(this.jEleOut != null){
        		this.jEleOut.css('display','none');
        	}
        	$(jEleIn).css('display','inline');
			/*        
        	if(this.jEleOut != null){
	        	this.jEleOut.stop().fadeOut({
	        		'complete':function(){
	        			$(jEleIn).fadeIn();
	        		}
	        	});
	        }else{
	        	$(jEleIn).stop().fadeIn();
	        } */
	        this.jEleOut = $(jEleIn);
	       
        },
        SetCookie:function(c_name,value){
        	var exdays = 7;
			var exdate=new Date();
			exdate.setDate(exdate.getDate() + exdays);
			var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
			document.cookie=c_name + "=" + c_value;
	   },
	   GetCookie:function(c_name){
			var i,x,y,ARRcookies=document.cookie.split(";");
			for (i=0;i<ARRcookies.length;i++){
			  x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
			  y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
			  x=x.replace(/^\s+|\s+$/g,"");
			  if (x==c_name){
			    return unescape(y);
			  }
			}
			return null;
		}
		 
	};
	
}(window.jQuery);
