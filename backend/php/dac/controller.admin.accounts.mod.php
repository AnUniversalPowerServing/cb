<?php
 session_start();
 require_once '../util/app.error.handler.php';
 require_once '../api/app.initiator.php';
 require_once '../api/app.database.php';
 require_once '../dal/data.admin.accounts.mod.php';
 
 $database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
 
 if(isset($_GET["action"])){
	if($_GET["action"]=='ADMIN_MODULE_PAGEACCESS'){ 
	 if(isset($_POST["role"]) && isset($_POST["pagePath"])){
	  $role  = $_POST["role"];
	  $pagePath = $_POST["pagePath"];
	  $adminAccountMod = new AdminAccountMod();
	  $query = $adminAccountMod->query_view_userAccessPermissions($role,$pagePath);
	  echo $database->getJSONData($query);
	 } else {
		$missParam = '';
		if(!isset($_POST["role"])){ $missParam.='role,'; }
		if(!isset($_POST["pagePath"])){ $missParam.='pagePath,'; }
		$missParam = chop($missParam,',');
		echo $successErrorHandler->missingParams($missParam);
	 }
	}
 } else {
	 echo $successErrorHandler->missingParams('action');
 }
?>