
class AuthEndpoints {
  userAccounts_autocomplete_surNames(respFunc){
   js_ajax('GET','user/list/surNames',{ },
   function(response){ console.log(response);response=JSON.parse(response);respFunc(response); });
  }
  userAccounts_viewInfo_byMobileNumber(mobile,respFunc){
   js_ajax('POST','user/infoBy/mobile',{ mobile:mobile }, 
   function(response){ console.log(response);response=JSON.parse(response);respFunc(response); });
  }
  userAccounts_verify_mobileNumber(mobile,respFunc){
   js_ajax('POST','user/auth/account/verifyMobile',{ mobile:mobile },
   function(response){ console.log(response);response=JSON.parse(response);respFunc(response); });
  }
  userAccounts_viewInfo_securityQ(respFunc){
    js_ajax('GET','user/auth/account/sq',{  },function(response){
	 console.log(response);response=JSON.parse(response);respFunc(response);
	});
  }
  userAccounts_create_newAccount(inputData,respFunc){
   js_ajax('POST','user/auth/account/new',inputData,function(response){ console.log(response);response=JSON.parse(response);respFunc(response); });
  }
  userAccounts_updateInfo_accountById(updateData,respFunc){
   js_ajax('POST','user/auth/account/update',updateData,function(response){ console.log(response);response=JSON.parse(response);respFunc(response); });
  }
  userAccounts_viewInfo_accountLogin(inputData,respFunc){
   js_ajax('POST','user/auth/access',inputData,function(response){ console.log(response);response=JSON.parse(response);respFunc(response); });
  }
}

var authEndpoints = new AuthEndpoints();