<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="description" content="">
 <meta name="author" content="">
 <title>Administrator Account</title>
 <?php include_once 'templates/app_init.php'; ?>
 <link href="<?php echo $PROJECT_URL ?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 <link href="<?php echo $PROJECT_URL ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link href="<?php echo $PROJECT_URL ?>vendor/bootstrap-toggle/css/bootstrap-toggle.min.css" rel="stylesheet">
 <link rel="stylesheet" href="<?php echo $PROJECT_URL ?>pages/styles/api/bootstrap-advanced.css">
 <link rel="stylesheet" href="<?php echo $PROJECT_URL ?>pages/styles/api/core-skeleton.css">
 <script src="<?php echo $PROJECT_URL ?>vendor/jquery/jquery.min.js"></script>
 <script src="<?php echo $PROJECT_URL ?>vendor/bootstrap/js/bootstrap.min.js"></script>
 <script src="<?php echo $PROJECT_URL ?>vendor/bootstrap-toggle/js/bootstrap-toggle.min.js"></script>
 <script src="<?php echo $PROJECT_URL ?>pages/js/common/endpoints.auth.admin.js"></script>
 <script src="<?php echo $PROJECT_URL ?>pages/js/common/session.js"></script>
 <script src="<?php echo $PROJECT_URL ?>pages/js/api/bootstrap-advanced.js"></script>
 <script src="<?php echo $PROJECT_URL ?>pages/js/api/core-skeleton.js"></script>
 <script src="<?php echo $PROJECT_URL ?>pages/js/common/validations.js"></script>
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
	adminAuthEndpoints.auth_accountLogin({ userName:userName, acc_pwd:password }, function(response){
	   VALIDATION_MESSAGE_ERROR=response.statusDesc;
	   show_validate_msg(response.status.toLowerCase(),auth_login_adminAccountForm_htmlElements.auth_login_adminAccountForm_warnErrorMsg);
	   bootstrap_formField_trigger(response.status.toLowerCase(),[auth_login_adminAccountForm_htmlElements.auth_login_adminAccountForm_userName,
										   auth_login_adminAccountForm_htmlElements.auth_login_adminAccountForm_password]); 
	   console.log(response.status.toLowerCase());
	   if(response.status.toLowerCase()==='success'){
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
