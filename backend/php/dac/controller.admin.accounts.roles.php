<?php
 session_start();
 require_once '../util/app.error.handler.php';
 require_once '../api/app.initiator.php';
 require_once '../api/app.database.php';
 require_once '../dal/data.admin.accounts.roles.php';
 
 $database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
 
 if(isset($_GET["action"])){
   if($_GET["action"]=='ADMIN_AUTH_ADDNEWROLE'){
	 if(isset($_POST["role"]) && isset($_POST["roleDesc"])){
	   $role = strtoupper($_POST["role"]);
	   $roleDesc = $_POST["roleDesc"];
	   $adminAccountRoles = new AdminAccountRoles();
	   $query1 = $adminAccountRoles->query_verify_roleExists($role);
	   if(intval(json_decode($database->getJSONData($query1))[0]->{'count(*)'})==0){
	     $query2 = $adminAccountRoles->query_add_newRole($role, $roleDesc);
	     echo $database->addupdateData($query2,"Added New Role <b>\"".$role."\"</b> Successfully. "); 
	   } else {
		  echo $successErrorHandler->successErrorInfo($APP_MSG_ERROR,"Role Name <b>\"".$role."\"</b> already Exists. Please try with other Role Name. ");
	   }
	 } else {
	   $missParam = '';
	   if(!isset($_POST["role"])){ $missParam.='role,'; }
	   if(!isset($_POST["roleDesc"])){ $missParam.='roleDesc,'; }
	   $missParam = chop($missParam,',');
	   echo $successErrorHandler->missingParams($missParam); 
	 }
   }
   else if($_GET["action"]=='ADMIN_AUTH_VIEWROLES'){
	   $adminAccountRoles = new AdminAccountRoles();
	   $query = $adminAccountRoles->query_view_roles();
	   echo $database->getJSONData($query); 
   }
   else if($_GET["action"]=='ADMIN_AUTH_DELETEROLE'){
	   if(isset($_POST["role_Id"]) && isset($_POST["role"])){
		  $role_Id = $_POST["role_Id"];
		  $role = $_POST["role"];
		  $adminAccountRoles = new AdminAccountRoles();
		  $query=$adminAccountRoles->query_delete_adminAccountsByrole($role_Id);
		  $query.=$adminAccountRoles->query_delete_role($role_Id);
		  echo $database->addupdateData($query,"Deleted User Role <b>'".$role."'</b> and the Accounts associated with it. "); 
	   } else { 
	      $missParam = '';
	      if(!isset($_POST["role_Id"])){ $missParam.='role_Id,'; }
	      if(!isset($_POST["role"])){ $missParam.='role,'; }
	      $missParam = chop($missParam,',');
	      echo $successErrorHandler->missingParams($missParam); 
	   }
   }
   else if($_GET["action"]=='ADMIN_AUTH_UPDATEROLE'){
	   if(isset($_POST["role_Id"]) && isset($_POST["role"]) && isset($_POST["roleDesc"])){
		  $role_Id = $_POST["role_Id"];
		  $role = $_POST["role"];
		  $roleDesc = $_POST["roleDesc"];
		  $adminAccountRoles = new AdminAccountRoles();
		  $query1 = $adminAccountRoles->query_verify_roleExistsExceptRoleId($role_Id,$role);
	      if(intval(json_decode($database->getJSONData($query1))[0]->{'count(*)'})==0){
	        $query=$adminAccountRoles->query_update_adminAccountsByrole($role_Id,$role,$roleDesc);
		    echo $database->addupdateData($query,"Updated User Role <b>\"".$role."\"</b> Successfully. "); 
	      } else {
		     echo $successErrorHandler->successErrorInfo($APP_MSG_ERROR,"Role Name <b>\"".$role."\"</b> already Exists. Please try with other Role Name. ");
	      }
		  
		 
	   } else { 
	      $missParam = '';
	      if(!isset($_POST["role_Id"])){ $missParam.='role_Id,'; }
	      if(!isset($_POST["role"])){ $missParam.='role,'; }
		  if(!isset($_POST["roleDesc"])){ $missParam.='roleDesc,'; }
	      $missParam = chop($missParam,',');
	      echo $successErrorHandler->missingParams($missParam); 
	   }
   }
 } else {
	 echo $successErrorHandler->missingParams('action');
 }		
?>