<?php
 session_start();
 require_once '../util/app.error.handler.php';
 require_once '../api/app.initiator.php';
 require_once '../api/app.database.php';
 require_once '../dal/data.dev.app.config.php';
 
 $database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
 
 if(isset($_GET["action"])){
	if($_GET["action"]=='APP_PROPERTY_VIEW'){
		if(isset($_GET["key"])){
			$key = $_GET["key"];
			$keys = array();
			if(isset($_POST["keys"])){ $keys = $_POST["keys"]; }
		    $devAppConfig = new DevAppConfig();
			$query = $devAppConfig->query_view_appConfigParams($key,$keys);
			if(strlen($query)>0){
			  echo $database->getJSONData($query);
			}
		} else { echo  $successErrorHandler->missingParams('key'); }
	} 
	else if($_GET["action"]=='APP_PROPERTY_UPDATE'){
	  if(isset($_GET["key"])){
	    $paramName = $_GET["key"];
		$paramValue = ''; if(isset($_POST["paramValue"])){ $paramValue = $_POST["paramValue"]; }
		$paramDesc = ''; if(isset($_POST["paramDesc"])){ $paramDesc = $_POST["paramDesc"]; }
		$devAppConfig = new DevAppConfig();
		$query = $devAppConfig->query_update_appConfigParams($paramName,$paramValue,$paramDesc);
		echo $database->addupdateData($query,"Parameter <b>\"".$paramName."\"</b> updated Successfully. ");
	  } else {
		 echo  $successErrorHandler->missingParams('key');
	  }
	}
	else if($_GET["action"]=='APP_PROPERTY_ADD'){
	  if(isset($_POST["paramName"]) && isset($_POST["paramValue"]) && isset($_POST["paramDesc"])){
		$paramName = $_POST["paramName"];
		$paramValue = $_POST["paramValue"];
		$paramDesc = $_POST["paramDesc"];
		$devAppConfig = new DevAppConfig();
		
		$query1 = $devAppConfig->query_verify_appConfigParamsExist($paramName);
		if(intval(json_decode($database->getJSONData($query1))[0]->{'count(*)'})==0){
		  $query2 = $devAppConfig->query_add_appConfigParams($paramName,$paramValue,$paramDesc);
		  echo $database->addupdateData($query2,"Parameter <b>\"".$paramName."\"</b> added Successfully. ");
		} else {
			echo $successErrorHandler->successErrorInfo($APP_MSG_ERROR,"Parameter <b>\"".$paramName."\"</b> already Exists. Please try with other Parameter Name.");
		}
	  } else {
		 $missParam = '';
		 if(!isset($_POST["paramName"])){ $missParam.='paramName,'; }
		 if(!isset($_POST["paramValue"])){ $missParam.='paramValue,'; }
		 if(!isset($_POST["paramDesc"])){ $missParam.='paramDesc,'; }
		 $missParam = chop($missParam,',');
		 echo  $successErrorHandler->missingParams($missParam);
	  }
	}
	else if($_GET["action"]=='APP_PROPERTY_DELETE'){
	  if(isset($_GET["key"])){
		$paramName = $_GET["key"];
		$devAppConfig = new DevAppConfig();
		$query = $devAppConfig->query_delete_appConfigParams($paramName);
		echo $database->addupdateData($query,"Parameter <b>\"".$paramName."\"</b> deleted Successfully. ");
	  } else {
		 echo  $successErrorHandler->missingParams('key');
	  }
	}
 } else {
	 echo  $successErrorHandler->missingParams('action');
 }
 
?>
