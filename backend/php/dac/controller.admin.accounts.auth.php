<?php
 session_start();
 require_once '../util/app.error.handler.php';
 require_once '../api/app.initiator.php';
 require_once '../api/app.database.php';
 require_once '../dal/data.admin.accounts.auth.php';
 require_once '../dal/data.admin.accounts.roles.php';

 
 if(isset($_GET["action"])){
	if($_GET["action"]=='ADMIN_AUTH_LOGIN'){
	 
	  if(isset($_POST["userName"]) && isset($_POST["acc_pwd"])){
		try {
		 $userName = $_POST["userName"];
		 $acc_pwd = md5($_POST["acc_pwd"]);
		 $adminAccountAuth = new AdminAccountAuth();
		 $query = $adminAccountAuth->query_view_userAccountLogin($userName,$acc_pwd);
		 $database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	     echo $database->getJSONData($query);
		} catch(Exception $e) { echo $e->getMessage(); }
	  } else {
		 $missParam = '';
		 if(!isset($_POST["userName"])){ $missParam.='userName,'; }
		 if(!isset($_POST["acc_pwd"])){ $missParam.='acc_pwd,'; }
		 $missParam = chop($missParam,',');
		 echo $successErrorHandler->missingParams($missParam);
	  }
	 
	} 
	else if($_GET["action"]=='ADMIN_AUTH_ADDNEWACCOUNT'){
	  
		if(isset($_POST["role_Id"]) && isset($_POST["surName"]) && isset($_POST["name"]) && isset($_POST["gender"]) && isset($_POST["email"])
			&& isset($_POST["userName"]) && isset($_POST["acc_pwd"]) && isset($_POST["acc_active"])){
		 try {
		  $role_Id = $_POST["role_Id"]; 
		  $surName = $_POST["surName"]; 
		  $name = $_POST["name"]; 
		  $gender = $_POST["gender"]; 
		  $email = $_POST["email"]; 
		  $mob_code = ''; if(isset($_POST["mob_code"])){  $mob_code = $_POST["mob_code"]; }  
		  $mobile = ''; if(isset($_POST["mobile"])){  $mobile = $_POST["mobile"]; }  
		  $userName = $_POST["userName"]; 
		  $acc_pwd = md5($_POST["acc_pwd"]); 
		  $acc_active = $_POST["acc_active"];
		  $adminAccountAuth = new AdminAccountAuth();
		  $adminAccountRoles = new AdminAccountRoles();
		  
		  $database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
		  
		  if(count(json_decode($database->getJSONData($adminAccountRoles->query_verify_roleExists($role_Id))))>0){
			 $query = $adminAccountAuth->query_add_adminAccounts($role_Id, $surName, $name, $gender, $email, $mob_code, $mobile,
							$userName, $acc_pwd, $acc_active);
		     echo $database->addupdateData($query,"Added New Account Successfully");
		  } else {
			 echo $successErrorHandler->successErrorInfo($GLOBALS["APP_MSG_ERROR"], "role_Id not exists");	
		  }
		 } catch(Exception $e) { echo $e->getMessage(); } 
		} else {
		   $missParam = '';
		   if(!isset($_POST["role_Id"])){ $missParam.='role_Id,'; }
		   if(!isset($_POST["surName"])){ $missParam.='surName,'; }
		   if(!isset($_POST["name"])){ $missParam.='name,'; }
		   if(!isset($_POST["gender"])){ $missParam.='gender,'; }
		   if(!isset($_POST["email"])){ $missParam.='email,'; }
		   if(!isset($_POST["mob_code"])){ $missParam.='mob_code,'; }
		   if(!isset($_POST["mobile"])){ $missParam.='mobile,'; }
		   if(!isset($_POST["userName"])){ $missParam.='userName,'; }
		   if(!isset($_POST["acc_pwd"])){ $missParam.='acc_pwd,'; }
		   if(!isset($_POST["acc_active"])){ $missParam.='acc_active,'; }
		   $missParam = chop($missParam,',');
		   echo $successErrorHandler->missingParams($missParam);
		}
	  
	} 
	else if($_GET["action"]=='ADMIN_AUTH_UPDATEACCOUNTINFO'){
		
	  if(isset($_POST["account_Id"])){ 
	    $account_Id = $_POST["account_Id"]; 
		$role_Id = '';     if(isset($_POST["role_Id"])){ $role_Id = $_POST["role_Id"]; }
		$surName = '';     if(isset($_POST["surName"])){ $surName = $_POST["surName"]; }
		$name = '';        if(isset($_POST["name"])){ $name = $_POST["name"]; }
		$gender = '';      if(isset($_POST["gender"])){ $gender = $_POST["gender"]; }
		$mob_code = '';    if(isset($_POST["mob_code"])){ $mob_code = $_POST["mob_code"]; }
		$mobile = '';      if(isset($_POST["mobile"])){ $mobile = $_POST["mobile"]; }
		$email = '';       if(isset($_POST["email"])){ $email = $_POST["email"]; }
		$userName = '';    if(isset($_POST["userName"])){ $userName = $_POST["userName"]; }
		$acc_pwd = '';     if(isset($_POST["acc_pwd"])){ $acc_pwd = md5($_POST["acc_pwd"]); }
		$acc_active = '';  if(isset($_POST["acc_active"])){ $acc_active = $_POST["acc_active"]; }
		
	    $adminAccountAuth = new AdminAccountAuth();
		$adminAccountRoles = new AdminAccountRoles();

		$database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
		  
		if(strlen($role_Id)>0 || strlen($surName)>0 || strlen($name)>0 || strlen($gender)>0 || strlen($email)>0 || strlen($userName)>0 || 
		   strlen($acc_pwd)>0 || strlen($acc_active)>0 ){
		 try {
		  $updateAccount = true;
		  
		  if(strlen($role_Id)>0){
			  if(count(json_decode($database->getJSONData($adminAccountRoles->query_verify_roleExists($role_Id))))>0){
				$updateAccount = true;
			} else {
				echo $successErrorHandler->successErrorInfo($GLOBALS["APP_MSG_ERROR"], "role_Id not exists");	
		        $updateAccount = false;
			}
		  }
		  if($updateAccount){
		   $query = $adminAccountAuth->query_update_adminAccounts($account_Id, $role_Id, $surName, $name, $gender, $email, $mob_code, $mobile, 
						$userName, $acc_pwd, $acc_active);
		   echo $database->addupdateData($query,"Updated Account Successfully");
		  }
		 } catch(Exception $e) { echo $e->getMessage(); } 
		} else {
		   echo $successErrorHandler->missingParams('Required One among role_Id/surName/name/gender/email/userName/acc_pwd/acc_active to update');
		}
	  } else { echo $successErrorHandler->missingParams('account_Id'); }
	}
 
 } else {
	 echo $successErrorHandler->missingParams('action');
 }		
?>