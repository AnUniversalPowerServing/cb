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
		 $query1 = $adminAccountAuth->query_view_userAccountLogin($userName,$acc_pwd);
		 $database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	     $jsonData1 = json_decode($database->getJSONData($query1));
		 if(count($jsonData1)>0){
			$role = $jsonData1[0]->{'role'};
			$query2 = $adminAccountAuth->query_view_userAccessPermissions($role);
			$jsonData2 = json_decode($database->getJSONData($query2));
			$module = array();
			if(count($jsonData2)>0){
				for($index=0;$index<count($jsonData2);$index++){
					$perm_Id = $jsonData2[$index]->{'perm_Id'};
					$topcName = $jsonData2[$index]->{'topcName'};
					$role = $jsonData2[$index]->{'role'};
					$c = $jsonData2[$index]->{'C'};
					$r = $jsonData2[$index]->{'R'};
					$u = $jsonData2[$index]->{'U'};
					$d = $jsonData2[$index]->{'D'};
					$pageName = $jsonData2[$index]->{'pageName'};
					$topicDesc = $jsonData2[$index]->{'topicDesc'};
					$moduleName = $jsonData2[$index]->{'moduleName'};
					$moduleDesc = $jsonData2[$index]->{'moduleDesc'};
					$pageURL = $jsonData2[$index]->{'pageURL'};
					$permInfo = array();
					$topcInfo = array();
					$pageInfo = array();
					$page = array();
					$permInfo["perm_Id"]=$perm_Id;
					$permInfo["C"] = $c;
					$permInfo["R"] = $r;
					$permInfo["U"] = $u;
					$permInfo["D"] = $d;	
					$topcInfo[$topcName] = $permInfo;	
					$topcInfo["pageURL"] = $pageURL;	
					$pageInfo["topic"] = $topcInfo;
					$page[$pageName] = $pageInfo;
					$moduleInfo = array();
					$moduleInfo["moduleDesc"] = $moduleDesc;
					$moduleInfo["pages"] = $page;
					$module[$moduleName] = $moduleInfo;
				}
			}
			$_SESSION["ADMIN_ACCOUNT_USERID"] = $jsonData1[0]->{'account_Id'};
			$_SESSION["ADMIN_ACCOUNT_ROLEID"] = $role;
			$_SESSION["ADMIN_ACCOUNT_ROLENAME"] = $jsonData1[0]->{'role'};
			$_SESSION["ADMIN_ACCOUNT_SURNAME"] = $jsonData1[0]->{'surName'};
			$_SESSION["ADMIN_ACCOUNT_NAME"] = $jsonData1[0]->{'name'};
			$_SESSION["ADMIN_ACCOUNT_GENDER"] = $jsonData1[0]->{'gender'};
			$_SESSION["ADMIN_ACCOUNT_EMAIL"] = $jsonData1[0]->{'email'};
			$_SESSION["ADMIN_ACCOUNT_MOBCODE"] = $jsonData1[0]->{'mob_code'};
			$_SESSION["ADMIN_ACCOUNT_MOBILE"] = $jsonData1[0]->{'mobile'};
			$_SESSION["ADMIN_ACCOUNT_USERNAME"] = $jsonData1[0]->{'userName'};
			$_SESSION["ADMIN_ACCOUNT_ACTIVE"] = $jsonData1[0]->{'acc_active'};
			$_SESSION["ADMIN_ACCOUNT_CREATEDON"] = $jsonData1[0]->{'createdOn'};
			$_SESSION["ADMIN_ACCOUNT_ACCPERMISSIONS"] = json_encode($module); 
			echo $successErrorHandler->successErrorInfo($GLOBALS["APP_MSG_SUCCESS"], "Account Authenticated Successfully");
		 } else {
			echo $successErrorHandler->successErrorInfo($GLOBALS["APP_MSG_ERROR"], "Account not Authenticated Successfully");	
		 }
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