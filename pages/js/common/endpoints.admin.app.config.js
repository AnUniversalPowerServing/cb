class AdminAppConfigEndpoints {
	
  create_configParam(inputData,respFunc){
   js_ajax('POST','admin/app/config/add',inputData,function(response){ console.log(response);response=JSON.parse(response);respFunc(response); });
  }
  
  viewInfo_configParams(inputData,respFunc){
   js_ajax('POST','admin/app/config/view/all',inputData,function(response){ console.log(response);response=JSON.parse(response);respFunc(response); });
  }
  	
  delete_configParam(inputData,respFunc){
	var paramName = inputData.paramName;
	js_ajax('POST','admin/app/config/delete/'+paramName,inputData,function(response){ console.log(response);response=JSON.parse(response);respFunc(response); });  
  }
  
  update_configParam(inputData,respFunc){
	var paramName = inputData.paramName;
	js_ajax('POST','admin/app/config/update/'+paramName,inputData,function(response){ console.log(response);response=JSON.parse(response);respFunc(response); });  
  }
 
}

var adminAppConfigEndpoints = new AdminAppConfigEndpoints();
