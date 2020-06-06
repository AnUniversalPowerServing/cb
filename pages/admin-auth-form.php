<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="styles/api/bootstrap-advanced.css">
<link rel="stylesheet" href="styles/api/core-skeleton.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.js"></script>
<script src="js/common/endpoints.auth.admin.js"></script>
<script src="js/common/session.js"></script>
<script src="js/api/bootstrap-advanced.js"></script>
<script src="js/api/core-skeleton.js"></script>
<script src="js/common/validations.js"></script>
<style>
body { background-color:#17941c;color:#fff; }
</style>
<script type="text/javascript">
var auth_login_adminAccountForm_htmlElements = {
  auth_login_adminAccountForm_warnErrorMsg:'auth-login-adminaccount-warnErrorMsg',
  auth_login_adminAccountForm_userName:'auth-login-adminaccount-username',
  auth_login_adminAccountForm_password:'auth-login-adminaccount-password'
};
function submit_auth_login_adminAccountForm_authenticate(){
 VALIDATION_MESSAGE_ERROR='Missing ';
 var userName = $('#'+auth_login_adminAccountForm_htmlElements.auth_login_adminAccountForm_userName).val();
 var password = $('#'+auth_login_adminAccountForm_htmlElements.auth_login_adminAccountForm_password).val();
 var valid_userName = validate_userName(auth_login_adminAccountForm_htmlElements.auth_login_adminAccountForm_userName); // validate_userName
 var valid_password = validate_password(auth_login_adminAccountForm_htmlElements.auth_login_adminAccountForm_password); // validate_password
 console.log("username: "+userName);
 console.log("password: "+password);
 if(valid_userName && valid_password){
	// Check Username with Password exists or not
    document.getElementById(auth_login_adminAccountForm_htmlElements.auth_login_adminAccountForm_warnErrorMsg).innerHTML='';
	authEndpoints.adminAccounts_viewInfo_accountLogin({ userName:userName, acc_pwd:password }, function(response){
	  if(response.length==0){
		 VALIDATION_MESSAGE_ERROR='Incorrect Username or Password.';
		 show_validate_msg('error',auth_login_adminAccountForm_htmlElements.auth_login_adminAccountForm_warnErrorMsg); 
		 bootstrap_formField_trigger('error',[auth_login_adminAccountForm_htmlElements.auth_login_adminAccountForm_userName,
										   auth_login_adminAccountForm_htmlElements.auth_login_adminAccountForm_password]);
	  } else {
		  // send to Admin Dashboard
		  window.location.href='admin/manage/dashboard';
	  }
	});
 } else { 
      show_validate_msg('error',auth_login_adminAccountForm_htmlElements.auth_login_adminAccountForm_warnErrorMsg);
	  bootstrap_formField_trigger('error',[auth_login_adminAccountForm_htmlElements.auth_login_adminAccountForm_userName,
										   auth_login_adminAccountForm_htmlElements.auth_login_adminAccountForm_password]);
  }	 
}
</script>
</head>
<body>
 <!-- -->
 <div class="container-fluid" style="margin-top:10%;">
  <div class="row">
    <div class="col-xs-12 col-sm-3 col-md-4"></div>
    <div class="col-xs-12 col-sm-6 col-md-4">
	 <!-- -->
	 <div align="center" class="form-group">
	   <h4><b>Login into your Account</b></h4>
	 </div><!--/.form-group -->
	  <div align="center" class="form-group" style="color:#f9ef98;">
	   <h5><b>Access your Account with your Credentials</b></h5>
	 </div><!--/.form-group -->
	 <div id="auth-login-adminaccount-warnErrorMsg" class="form-group"></div>
	 <div class="form-group">
	   <input type="text" id="auth-login-adminaccount-username" placeholder="Enter Username" class="form-control"/>
	 </div><!--/.form-group -->
	 <div class="form-group">
	   <input type="password" id="auth-login-adminaccount-password" placeholder="Enter Password" class="form-control"/>
	 </div><!--/.form-group -->
	 <div class="form-group">
	   <button class="btn btn-default form-control" onclick="javascript:submit_auth_login_adminAccountForm_authenticate();"><b>Sign-In</b></button>
	 </div><!--/.form-group -->
	 <div align="right" class="form-group">
	   <b><u>Forgot Username / Password?</u></b>
	 </div><!--/.form-group -->
	 <!-- -->
	</div><!--/.col-md-4 -->
	<div class="col-xs-12 col-sm-3 col-md-4"></div>
  </div><!--/.row -->
 </div><!--/.container-fluid -->
 <!-- -->
</body>
</html>
