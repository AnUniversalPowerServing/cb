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
	  $query1 = $adminAccountMod->query_view_userAccessMenu($role);
	  $jsonData1 = json_decode($database->getJSONData($query1));
	  if(count($jsonData1)>0){
		$menu = array();
		$modules = array();
		for($index1=0;$index1<count($jsonData1);$index1++){
		  $moduleName = $jsonData1[$index1]->{'moduleName'};
		  $pageName = $jsonData1[$index1]->{'pageName'};
		  $pagePath = $jsonData1[$index1]->{'pagePath'};
		  
		  $query2 = $adminAccountMod->query_view_userAccessPermissions($role,$pagePath);
		  $jsonData2 = json_decode($database->getJSONData($query2));
		  $topics = array();
		  if(count($jsonData2)>0){
		    for($index2=0;$index2<count($jsonData2);$index2++){
			  $topcName = $jsonData2[$index2]->{'topcName'};
			  $topicDesc = $jsonData2[$index2]->{'topicDesc'};
			  $C = $jsonData2[$index2]->{'C'};
			  $R = $jsonData2[$index2]->{'R'};
			  $U = $jsonData2[$index2]->{'U'};
			  $D = $jsonData2[$index2]->{'D'};
			  $topic = array();
			  $topic["topicDesc"]=$topicDesc;
			  $topic["C"]=$C;
			  $topic["R"]=$R;
			  $topic["U"]=$U;
			  $topic["D"]=$D;
			  $topics[$topcName]=$topic;
		    }
		  }
		  $pages = array();
		  $pages["pageName"]=$pageName;
		  $pages["moduleName"] = $moduleName;
		  $pages["topics"] = $topics;
		  $modules[$pagePath] = $pages;
		  
		  $menuList = array();
		  $menuList[$pageName] = $pagePath;
		  if(!isset($menu[$moduleName])){  $menu[$moduleName]= array(); }
		  array_push($menu[$moduleName],$menuList);
		}
		$accPerm = array();
		$accPerm["menu"] = $menu;
		$accPerm["pages"] = $modules;
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