<?php 
session_start();
require_once '../util/app.error.handler.php';
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../dal/data.user.accounts.auth.php';

if(isset($_GET["action"])){
 if($_GET["action"]=='USER_AUTH_SECURITYQ') {
    $userAccountAuth = new UserAccountAuth();
    $query = $userAccountAuth->query_view_userSecurityQ();
    $database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
    echo $database->getJSONData($query);
 } 
 else if($_GET["action"]=='USER_AUTH_VERIFYMOBILE') {
   if(isset($_POST["mobile"])){
     $mobile=$_POST["mobile"];
     $userAccountAuth = new UserAccountAuth();
     $query = $userAccountAuth->query_view_userMobileIsExists($mobile);
     $database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
     $jsonData=json_decode($database->getJSONData($query));
	 $wsStatus = array();
	  if(count($jsonData)>0){
	    $wsStatus["user"]='EXISTS';
	    $wsStatus["account_Id"]=$jsonData[0]->{'account_Id'};
	  } else { $wsStatus["user"]='NOT_EXISTS'; }
	  echo json_encode($wsStatus);
   } else {
	   echo $successErrorHandler->missingParams('mobile');	 
   }
 } 
 else if($_GET["action"]=='USER_LIST_SURNAMES') {
    $userAccountAuth = new UserAccountAuth();
    $query = $userAccountAuth->query_view_listOfSurNames();
    $database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
    echo json_encode($database->getAColumnAsArray($query,'surName'));
 } 
 else if($_GET["action"]=='USER_INFOBY_BYMOBILE') {
	if(isset($_POST["mobile"])){ 
     $mob_code='+91';
	 $mobile=$_POST["mobile"];
     $userAccountAuth = new UserAccountAuth();
     $query = $userAccountAuth->query_view_userInfoByMobile($mob_code,$mobile);
	 $database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	 echo $database->getJSONData($query);
   } else {
	   echo $successErrorHandler->missingParams('mobile');	 
   }
 }
 else if($_GET["action"]=='USER_AUTH_ADDNEWACCOUNT') { 
    if(isset($_POST["mob_code"]) && isset($_POST["mobile"]) && 
	   isset($_POST["surName"]) && isset($_POST["name"]) && isset($_POST["gender"]) && isset($_POST["acc_pwd"])&&  
	   isset($_POST["q1"]) && isset($_POST["a1"]) && isset($_POST["q2"]) && isset($_POST["a2"]) &&
	   isset($_POST["q3"]) && isset($_POST["a3"])){
	  try {
		$mob_code=$_POST["mob_code"];
		$mobile=$_POST["mobile"];
		$mob_val='Y';
		$surName=$_POST["surName"];
		$name=$_POST["name"];
		$gender=$_POST["gender"]; 
		$acc_pwd=md5($_POST["acc_pwd"]);
		$q1=$_POST["q1"]; 
		$a1=$_POST["a1"]; 
		$q2=$_POST["q2"];
		$a2=$_POST["a2"];
		$q3=$_POST["q3"]; 
		$a3=$_POST["a3"];
		$acc_active='Y';
		$userAccountAuth = new UserAccountAuth();
		$query = $userAccountAuth->query_add_userAccounts($mob_code, $mobile, $mob_val, $surName, 
					$name, $gender, $acc_pwd, $q1, $a1, $q2, $a2, $q3, $a3, $acc_active);
		$database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
		echo $database->addupdateData($query,"Added New Account Successfully");
	  } catch(Exception $e) { echo $e->getMessage(); } 
	} else {
		$missParam = '';
		if(!isset($_POST["mob_code"])){ $missParam.='mob_code,'; }
		if(!isset($_POST["mobile"])){ $missParam.='mobile,'; }
	    if(!isset($_POST["surName"])){ $missParam.='surName,'; }
		if(!isset($_POST["name"])){ $missParam.='name,'; }
		if(!isset($_POST["gender"])){ $missParam.='gender,'; }
		if(!isset($_POST["acc_pwd"])){ $missParam.='acc_pwd,'; } 
	    if(!isset($_POST["q1"])){ $missParam.='q1,'; } 
		if(!isset($_POST["a1"])){ $missParam.='a1,';} 
		if(!isset($_POST["q2"])){ $missParam.='q2,'; } 
		if(!isset($_POST["a2"])){ $missParam.='a2,'; } 
	    if(!isset($_POST["q3"])){ $missParam.='q3,'; } 
		if(!isset($_POST["a3"])){ $missParam.='a3,'; } 
		$missParam=chop($missParam,',');
		echo $successErrorHandler->missingParams($missParam);
	}
 }
 else if($_GET["action"]=='USER_AUTH_UPDATEACCOUNTINFO') {
    $wsStatus = array();
	if(isset($_POST["account_Id"])){
	$account_Id = $_POST["account_Id"];
    $mob_code=''; if(isset($_POST["mob_code"])){ $mob_code = $_POST["mob_code"]; }
	$mobile=''; if(isset($_POST["mobile"])){ $mobile = $_POST["mobile"]; }
	$surName=''; if(isset($_POST["surName"])){ $surName = $_POST["surName"]; }
	$name=''; if(isset($_POST["name"])){ $name = $_POST["name"]; }
	$gender=''; if(isset($_POST["gender"])){ $gender = $_POST["gender"]; }
	$acc_pwd=''; if(isset($_POST["acc_pwd"])){ $acc_pwd = md5($_POST["acc_pwd"]); }
	$q1=''; if(isset($_POST["q1"])){ $q1 = $_POST["q1"]; }
	$a1=''; if(isset($_POST["a1"])){ $a1 = $_POST["a1"]; }
	$q2=''; if(isset($_POST["q2"])){ $q2 = $_POST["q2"]; }
	$a2=''; if(isset($_POST["a2"])){ $a2 = $_POST["a2"]; }
	$q3=''; if(isset($_POST["q3"])){ $q3 = $_POST["q3"]; }
	$a3=''; if(isset($_POST["a3"])){ $a3 = $_POST["a3"]; }
	$acc_active=''; if(isset($_POST["acc_active"])){ $acc_active = $_POST["acc_active"]; }
	
	  if(strlen($mob_code)>0 || strlen($mobile)>0 || strlen($surName)>0 || strlen($name)>0 || strlen($gender)>0 || strlen($acc_pwd)>0 || 
	     strlen($q1)>0 || strlen($a1)>0 || strlen($q2)>0 || strlen($a2)>0 || strlen($q3)>0 || strlen($a3)>0 || strlen($acc_active)>0){
		$userAccountAuth = new UserAccountAuth();
		$query = $userAccountAuth->query_update_userAccounts($account_Id, $mob_code, $mobile, $surName, $name, $gender, 
						$acc_pwd, $q1, $a1, $q2, $a2, $q3, $a3, $acc_active);
		$database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
		echo $database->addupdateData($query,"Updated Account Successfully");
	  } else {
		  echo $successErrorHandler->missingParams('Required One among mob_code/mobile/surName/name/gender/acc_pwd/q1/a1/q2/a2/q3/a3/acc_active to update');
	  }
	} else { 
	   echo $successErrorHandler->missingParams('account_Id'); 
	}
  }
   else if($_GET["action"]=='USER_AUTH_LOGIN') {
	if(isset($_POST["mobile"]) && isset($_POST["acc_pwd"])){
      $mob_code='+91';
	  $mobile=$_POST["mobile"];
	  $acc_pwd=md5($_POST["acc_pwd"]);
      $userAccountAuth = new UserAccountAuth();
      $query = $userAccountAuth->query_view_userAccountLogin($mob_code,$mobile,$acc_pwd);
	  $database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
	  echo $database->getJSONData($query);
	} else { 
	   $missParam = '';
	   if(!isset($_POST["mobile"])){ $missParam.='mobile,'; }
	   if(!isset($_POST["acc_pwd"])){ $missParam.='acc_pwd,'; }
	   $missParam=chop($missParam,',');
		echo $successErrorHandler->missingParams($missParam);
	}
 }
}
?>