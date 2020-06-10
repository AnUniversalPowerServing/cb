class MrktAppEndpoints {
	
  create_appMrktGrp(inputData,respFunc){
   js_ajax('POST','mrkt/app/mrktGrp/add',inputData,function(response){ console.log(response);response=JSON.parse(response);respFunc(response); });
  }
  
  viewInfo_appMrktGrp(inputData,respFunc){
   js_ajax('POST','mrkt/app/mrktGrp/view/all',inputData,function(response){ console.log(response);response=JSON.parse(response);respFunc(response); });
  }
  	
  delete_appMrktGrp(inputData,respFunc){
	var mgName = inputData.mgName;
	js_ajax('POST','mrkt/app/mrktGrp/delete/'+mgName,inputData,function(response){ console.log(response);response=JSON.parse(response);respFunc(response); });  
  }
  
  update_appMrktGrp(inputData,respFunc){
	js_ajax('POST','mrkt/app/mrktGrp/update',inputData,function(response){ console.log(response);response=JSON.parse(response);respFunc(response); });  
  }
  
  create_futureCustomer(inputData,respFunc){
   js_ajax('POST','mrkt/app/fc/add',inputData,function(response){ console.log(response);response=JSON.parse(response);respFunc(response); });
  }
  
  viewInfo_futureCustomers(inputData,respFunc){
   js_ajax('POST','mrkt/app/fc/view/all',inputData,function(response){ console.log(response);response=JSON.parse(response);respFunc(response); });
  }
  	
  delete_futureCustomer(inputData,respFunc){
	var fcmg_Id = inputData.fcmg_Id;
	js_ajax('POST','mrkt/app/fc/delete/'+fcmg_Id,inputData,function(response){ console.log(response);response=JSON.parse(response);respFunc(response); });  
  }
  
  update_futureCustomer(inputData,respFunc){
	js_ajax('POST','mrkt/app/fc/update',inputData,function(response){ console.log(response);response=JSON.parse(response);respFunc(response); });  
  }
 
}

var mrktAppEndpoints = new MrktAppEndpoints();
