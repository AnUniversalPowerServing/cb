<div id="auth-login-retrievePwdWithMobileForm" class="hide-block">
<!-- -->
<div align="center" class="form-group" style="color:#fff5c4;">
  <h5 style="line-height:22px;"><b>Remember Mobile Number, but Forgot Password.<br/>Then, please Enter your Mobile Number.</b></h5>
</div><!--/.form-group -->
<!-- -->
<div style="padding-left:20px;padding-right:20px;margin-top:15px;">
 <div align="center" class="form-group" style="color:#fff5c4;">
  <!--<h5><b>Provide Basic Information to create Account</b></h5> -->
 </div><!--/.form-group -->  
 <div id="auth-login-retrieveAccountWithMobileForm-warnErrorMsg" class="form-group"></div>
 <div class="form-group">
  <!-- -->
  <div class="input-group">
   <div class="input-group-btn">
	<!-- -->
	<div class="dropdown">
	  <button class="btn btn-default dropdown-toggle"  style="border-radius:0px;"type="button" data-toggle="dropdown">+91
	   <span class="caret"></span></button>
	   <ul class="dropdown-menu">
		  <li><a href="#">+91</a></li>
	   </ul>
	</div>
	<!-- -->
   </div><!--/.input-btn-group -->
   <input id="auth-login-retrieveAccountWithMobileForm-mobile" class="form-control" placeholder="Enter Mobile Number" 
   onkeypress="javascript:return core_validate_allowOnlyNumeric(event);"/>
   <div class="input-group-btn">
	  <button id="auth-login-retrieveAccountWithMobileForm-mobile-verifyBtn" class="btn btn-default hide-block" 
		 onclick="javascript:submit_auth_login_retrieveAccountWithMobileForm_verifyMobile();"><b>Verify</b></button>
	  <button id="auth-login-retrieveAccountWithMobileForm-mobile-changeBtn" class="btn btn-default hide-block" 
		 onclick="javascript:submit_auth_login_retrieveAccountWithMobileForm_changeMobile();"><b>Change</b></button>
   </div><!--/.input-btn-group -->
  </div><!--/.input-group -->
  <!-- -->
 </div><!--/.form-group -->
 <div id="auth-login-retrieveAccountWithMobileForm-verifyMobileForm" class="form-group hide-block">
  <div class="input-group">
    <input id="auth-login-retrieveAccountWithMobileForm-otpcode" class="form-control" placeholder="Enter OTP Code"/>
    <div class="input-group-btn">
     <button id="auth-reg-genInfo-mobile-validateOTPBtn" class="btn btn-default" 
		 onclick="javascript:submit_auth_login_retrieveAccountWithMobileForm_validateOTPCode();"><b>Validate</b></button>
    </div><!--/.input-group-btn -->
   </div><!--/.input-group -->
 </div><!--/.form-group -->
 </div>
 
<div id="auth-login-retrieveAccountWithMobileForm-changePasswordForm" class="hide-block">
 <div align="center" class="form-group" style="color:#fff5c4;">
  <h5 style="line-height:22px;"><b>Change Password to secure your Account</b></h5>
 </div><!--/.form-group -->
 <div id="auth-login-retrieveAccountWithMobileForm-changePasswordForm-warnErrorMsg" class="form-group"></div>
 <div class="form-group">
  <input id="auth-login-retrieveAccountWithMobileForm-changePasswordForm-newPassword" type="password" class="form-control" placeholder="Enter Password"/>
 </div>
 <div class="form-group">
  <input id="auth-login-retrieveAccountWithMobileForm-changePasswordForm-confirmpassword" type="password" class="form-control" placeholder="Enter Confirm Password"/>
 </div>
 <div class="form-group">
  <button class="btn btn-default form-control" 
  onclick="javascript:submit_auth_login_retrieveAccountWithMobileForm_changePwdForm_savePwd();">
  <b>Update the Information</b></button>
 </div>
</div><!--/. -->
</div>
