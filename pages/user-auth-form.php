<?php
$PROJECT_URL = 'http://localhost/codeBuilder/web/';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="<?php echo $PROJECT_URL ?>panels/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo $PROJECT_URL ?>panels/vendor/jquery-ui/css/jquery-ui.css" rel="stylesheet">
<link href="<?php echo $PROJECT_URL ?>panels/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo $PROJECT_URL ?>panels/styles/api/bootstrap-advanced.css" rel="stylesheet" >
<link href="<?php echo $PROJECT_URL ?>panels/styles/api/core-skeleton.css" rel="stylesheet" >
<link href="<?php echo $PROJECT_URL ?>panels/vendor/summernote/css/summernote.min.css" rel="stylesheet">
<link href="<?php echo $PROJECT_URL ?>panels/vendor/bootstrap-toggle/css/bootstrap-toggle.min.css" rel="stylesheet">
<script type="text/javascript">
var PROJECT_URL='<?php echo $PROJECT_URL; ?>';
var USR_LANG='english';
</script>
<script src="<?php echo $PROJECT_URL ?>panels/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo $PROJECT_URL ?>panels/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $PROJECT_URL ?>panels/vendor/jquery-ui/js/jquery-ui.js"></script>
<script src="<?php echo $PROJECT_URL ?>panels/vendor/bootstrap-toggle/js/bootstrap-toggle.min.js"></script>
<script src="<?php echo $PROJECT_URL ?>panels/vendor/summernote/js/summernote.min.js"></script>
<script src="<?php echo $PROJECT_URL ?>panels/js/common/endpoints.auth.user.js"></script>
<script src="<?php echo $PROJECT_URL ?>panels/js/common/session.js"></script>
<script src="<?php echo $PROJECT_URL ?>panels/js/api/bootstrap-advanced.js"></script>
<script src="<?php echo $PROJECT_URL ?>panels/js/api/core-skeleton.js"></script>
<script src="<?php echo $PROJECT_URL ?>panels/js/common/validations.js"></script>
<script src="<?php echo $PROJECT_URL ?>panels/js/auth/user-accounts-reg.js"></script>
<script src="<?php echo $PROJECT_URL ?>panels/js/auth/user-accounts-login.js"></script>
<script src="<?php echo $PROJECT_URL ?>panels/js/auth/user-accounts-retrieve-withOTP.js"></script>
<script src="<?php echo $PROJECT_URL ?>panels/js/auth/user-accounts-retrieve-withSQ.js"></script>
<style>
body { background-color:purple;color:#fff; }
.mtop15p { margin-top:15px; }
.mtop65p { margin-top:65px; }
.mbot35p { margin-bottom:35px; }
/* Page Related CSS ::: Start */
.step-badges { height:40px;cursor:pointer;margin-top:15px; }
.step-badges>div>span.badge { font-size:30px;background-color:#fff;color:purple; }
.step-badges>div>span.badge.active { font-size:30px;background-color:#fff5c4;color:purple; }
.hide-block { display:none; }
/* Page Related CSS ::: End */
</style>
</head>
<body>

<div class="container-fluid mtop65p">
<div class="row">
<div class="col-xs-12 col-md-2 col-sm-12"></div>
<div class="col-xs-12 col-md-4 col-sm-6">
 <?php include_once 'templates/auth/user-account-reg.php'; ?>
</div><!--/.col-xs-12 col-md-4 col-sm-4 -->
<div class="col-xs-12 col-md-4 col-sm-6">
 <!-- -->
 <div align="center"><h4 class="mbot35p"><b>Login to your Account</b></h4></div>
 <?php include_once 'templates/auth/user-account-login.php'; ?>
 <?php include_once 'templates/auth/user-account-retreive-withOtp.php'; ?>
 <?php include_once 'templates/auth/user-account-retreive-withSQ.php'; ?>

 <div id="auth-login-access-userAccountForm" align="right" class="form-group hide-block curpoint"
   onclick="javascript:showHide_auth_accountAccessForm(this.id);">
	<b><u>Login to your Account</u></b>
 </div><!--/.form-group -->
 <div id="auth-login-access-retrievePwdWithMobileForm" align="right" class="form-group hide-block curpoint"
   onclick="javascript:showHide_auth_accountAccessForm(this.id);">
    <b><u>Remember Mobile Number, but Forgot Password?</u></b>
 </div><!--/.form-group -->
 <div id="auth-login-access-retrieveAccountWithoutInfoForm" align="right" class="form-group hide-block curpoint"
   onclick="javascript:showHide_auth_accountAccessForm(this.id);">
    <b><u>Forgot Password and Mobile Number changed?</u></b>
 </div><!--/.form-group -->
 <!-- -->
</div><!--/.col-xs-12 col-md-4 col-sm-4 -->
<div class="col-xs-12 col-md-2 col-sm-12"></div>
</div><!--/.row -->
</div><!--/.container-fluid -->

</body>
</html>
