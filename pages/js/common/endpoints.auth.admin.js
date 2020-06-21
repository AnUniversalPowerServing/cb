
class AdminAuthEndpoints {
	
  create_newAccount(inputData,respFunc){
   js_ajax('POST','admin/auth/account/new',inputData,function(response){ console.log(response);response=JSON.parse(response);respFunc(response); });
  }
  auth_accountLogin(inputData,respFunc){
   js_ajax('POST','admin/auth/access',inputData,function(response){ console.log(response);response=JSON.parse(response);respFunc(response); });
  }
}

var adminAuthEndpoints = new AdminAuthEndpoints();