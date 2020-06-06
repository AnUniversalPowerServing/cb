var SESSION_ENDPOINT='backend/php/api/app.session.php';

class Session {
	set(data){
	  js_ajax('POST',SESSION_ENDPOINT,{ action:'SET_SESSION',sessionJson:data },function(response){ console.log(response); });
	}
	get(data,respFunc){
	  js_ajax('POST',SESSION_ENDPOINT,{ action:'GET_SESSION',sessionJson:data },function(response){ console.log(response); });
	}
	destroy(){
	  js_ajax('POST',SESSION_ENDPOINT,{action:'DestroySession'},function(response){ console.log(response); });
	}
}

var session = new Session();