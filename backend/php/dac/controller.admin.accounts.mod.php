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
	  $query1 = $adminAccountMod->query_view_userAccessPermissions($role,$pagePath);
	  $jsonData1 = json_decode($database->getJSONData($query1));
	  $query2 = $adminAccountMod->query_view_userAccessMenu($role);
	  $jsonData2 = json_decode($database->getJSONData($query2));
	  if(count($jsonData2)>0){
		$modules = array();
		for($index=0;$index<count($jsonData2);$index++){
		  $moduleName = $jsonData2[$index]->{'moduleName'};
		  $pageName = $jsonData2[$index]->{'pageName'};
		  $pagePath = $jsonData2[$index]->{'pagePath'};
		  $pages = array();
		  $pages["pageName"]=$pageName;
		  $pages["pagePath"]=$pagePath;
		  if(!isset($modules[$moduleName])){  $modules[$moduleName]= array(); }
		  array_push($modules[$moduleName],$pages);
		}
		$accPerm = array();
		$accPerm["menu"] = $modules;
		$accPerm["pages"] = $jsonData1;
	    echo json_encode($accPerm);
	  }
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