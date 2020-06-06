/*
  ================================================================================================
  Overview of User Authentication Page:
  ================================================================================================
  This page consists of 4 User Authentication forms:
  a) User Register Form (Static on Screen)
  b) User Login Form (Dynamic on Screen)        
  c) Reset Password using Mobile Number (Dynamic on Screen)
  d) Reset Mobile Number and Password using Security Questions (Dynamic on Screen)
   
*/
var auth_loginForm_htmlElements = {
  userAccountForm:'auth-login-userAccountForm',
  userAccountBtn:'auth-login-access-userAccountForm', // link that triggers userAccountForm
  retrievePwdWithMobileForm:'auth-login-retrievePwdWithMobileForm',
  retrievePwdWithMobileBtn:'auth-login-access-retrievePwdWithMobileForm',  // link that triggers retrievePwdWithMobileForm
  retrieveAccountWithoutInfoForm:'auth-login-retrieveAccountWithoutInfoForm',
  retrieveAccountWithoutInfoBtn:'auth-login-access-retrieveAccountWithoutInfoForm' // link that triggers retrieveAccountWithoutInfoForm
};

/** On Document gets Ready : Following gets loaded */
$(document).ready(function(){
 trigger_userAccounts_auth_reg(); //  This Function is in user-accounts-reg.js
 trigger_userAccounts_auth_login(); // This Function is in user-accounts-login.js
});

function trigger_userAccounts_auth_login(){
 showHide_auth_accountAccessForm(auth_loginForm_htmlElements.userAccountBtn);
}

function showHide_auth_accountAccessForm(id){
/* ========================================================================
 * Function Description:
 * ========================================================================
 *  This Function is used to show/hide User Authentication Form
 */
 var arry_Id=[auth_loginForm_htmlElements.userAccountForm,auth_loginForm_htmlElements.retrievePwdWithMobileForm,
			  auth_loginForm_htmlElements.retrieveAccountWithoutInfoForm];
 var arry_btn_Id=[auth_loginForm_htmlElements.userAccountBtn,auth_loginForm_htmlElements.retrievePwdWithMobileBtn,
				  auth_loginForm_htmlElements.retrieveAccountWithoutInfoBtn];
 for(var index=0;index<arry_btn_Id.length;index++){
  console.log(arry_btn_Id[index]+"  "+id+" "+arry_Id[index]);
  if(arry_btn_Id[index]===id){
    if($('#'+arry_Id[index]).hasClass('hide-block')){ $('#'+arry_Id[index]).removeClass('hide-block'); }
	if(!$('#'+arry_btn_Id[index]).hasClass('hide-block')){ $('#'+arry_btn_Id[index]).addClass('hide-block'); }
  } else {
    if(!$('#'+arry_Id[index]).hasClass('hide-block')){ $('#'+arry_Id[index]).addClass('hide-block'); }
	if($('#'+arry_btn_Id[index]).hasClass('hide-block')){ $('#'+arry_btn_Id[index]).removeClass('hide-block'); }
  }
 }

 if(id===auth_loginForm_htmlElements.retrievePwdWithMobileBtn){
   reset_auth_login_retrieveAccountWithMobileForm();
 }
}

var auth_login_userAccountForm_htmlElements = {
  auth_login_userAccountForm_warnErrorMsg:'auth-login-useraccount-warnErrorMsg',
  auth_login_userAccountForm_mobile:'auth-login-useraccount-mobile',
  auth_login_userAccountForm_password:'auth-login-useraccount-password'
};
function submit_auth_login_userAccountForm_authenticate(){
 VALIDATION_MESSAGE_ERROR='Missing ';
 var mobile = document.getElementById(auth_login_userAccountForm_htmlElements.auth_login_userAccountForm_mobile).value;
 var password = document.getElementById(auth_login_userAccountForm_htmlElements.auth_login_userAccountForm_password).value;
 var valid_mobile=validate_mobile(auth_login_userAccountForm_htmlElements.auth_login_userAccountForm_mobile);
 var valid_password=validate_password(auth_login_userAccountForm_htmlElements.auth_login_userAccountForm_password);
 if(valid_mobile && valid_password){
   document.getElementById(auth_login_userAccountForm_htmlElements.auth_login_userAccountForm_warnErrorMsg).innerHTML='';
   // login to User Account
   authEndpoints.userAccounts_viewInfo_accountLogin({ mobile:mobile,acc_pwd:password },function(response){
    console.log(response);
	if(response.length>0){
		// Add them to a Session and Redirect Page
		session.set({"SESSION_CUSTOMER_ACCOUNTID":response[0].account_Id,
					 "SESSION_CUSTOMER_MOBCODE":response[0].mob_code,
					 "SESSION_CUSTOMER_MOBILE":response[0].mobile,
					 "SESSION_CUSTOMER_SURNAME":response[0].surName,
					 "SESSION_CUSTOMER_NAME":response[0].name,
					 "SESSION_CUSTOMER_GENDER":response[0].gender,
					 "SESSION_CUSTOMER_Q1ID":response[0].q1,
					 "SESSION_CUSTOMER_Q1":response[0].qq1,
					 "SESSION_CUSTOMER_Q2ID":response[0].q2,
					 "SESSION_CUSTOMER_Q2":response[0].qq2,
					 "SESSION_CUSTOMER_Q3ID":response[0].q3,
					 "SESSION_CUSTOMER_Q3":response[0].qq3,
					 "SESSION_CUSTOMER_A1":response[0].a1,
					 "SESSION_CUSTOMER_A2":response[0].a2,
					 "SESSION_CUSTOMER_A3":response[0].a3
						  });
		window.location.href='customer-dashboard.php';
	} else {
		VALIDATION_MESSAGE_ERROR='Your Account with Mobile Number <b>"+91-'+mobile+'"</b> is not registered. ';
		show_validate_msg('error',auth_login_userAccountForm_htmlElements.auth_login_userAccountForm_warnErrorMsg);
		bootstrap_formField_trigger('error',[auth_login_userAccountForm_htmlElements.auth_login_userAccountForm_mobile,
											auth_login_userAccountForm_htmlElements.auth_login_userAccountForm_password]);
	}
   });
 } else {
    show_validate_msg('error',auth_login_userAccountForm_htmlElements.auth_login_userAccountForm_warnErrorMsg);
 }
}
function reset_auth_login_userAccountForm_authenticate(){
 document.getElementById(auth_login_userAccountForm_htmlElements.auth_login_userAccountForm_warnErrorMsg).innerHTML='';
 $('#'+auth_login_userAccountForm_htmlElements.auth_login_userAccountForm_mobile).val('');
 $('#'+auth_login_userAccountForm_htmlElements.auth_login_userAccountForm_password).val('');
 bootstrap_formField_trigger('remove',[auth_login_userAccountForm_htmlElements.auth_login_userAccountForm_mobile,
									   auth_login_userAccountForm_htmlElements.auth_login_userAccountForm_password]);
}