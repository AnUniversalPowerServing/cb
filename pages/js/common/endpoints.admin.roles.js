class AdminRolesEndpoints {
	
  create_newRole(inputData,respFunc){
   js_ajax('POST','admin/account/role/new',inputData,function(response){ console.log(response);response=JSON.parse(response);respFunc(response); });
  }
  
  viewInfo_accountRoles(inputData,respFunc){
   js_ajax('POST','admin/account/roles',inputData,function(response){ console.log(response);response=JSON.parse(response);respFunc(response); });
  }
  	
  delete_accountRole(inputData,respFunc){
	js_ajax('POST','admin/account/role/delete',inputData,function(response){ console.log(response);response=JSON.parse(response);respFunc(response); });  
  }
  
  update_accountRole(inputData,respFunc){
	js_ajax('POST','admin/account/role/update',inputData,function(response){ console.log(response);response=JSON.parse(response);respFunc(response); });  
  }
 
}

var adminRolesEndpoints = new AdminRolesEndpoints();
