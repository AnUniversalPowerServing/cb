<?php
 require_once '../api/app.initiator.php';
 require_once '../api/app.database.php';
 require_once '../dal/data.mrkt.app.fc.php';
 require_once '../util/app.error.handler.php';

 $database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
 $appMrktFC = new AppMrktFC();
 if(isset($_GET["action"])){
	if($_GET["action"]=='APP_MRKTGRP_VIEW'){ 
	 echo $database->getAColumnAsArray($appMrktFC->query_view_marketGroup(),'mgName');
	} 
	else if($_GET["action"]=='APP_MRKTGRP_ADD'){
      if(isset($_POST["mgName"])){
	    $mgName = strtoupper($_POST["mgName"]);
	    $query = $appMrktFC->query_add_marketGroup($mgName);
		echo $database->addupdateData($query,"Added Market Group <b>\"".$mgName."\"</b> Successfully. ");
	  } else {
		 echo  $successErrorHandler->missingParams('mgName');
	  }
	}
	else if($_GET["action"]=='APP_MRKTGRP_UPDATE'){
	  if(isset($_POST["old_mgName"]) && isset($_POST["new_mgName"])){
		$old_mgName = strtoupper($_POST["old_mgName"]);
		$new_mgName = strtoupper($_POST["new_mgName"]);
	    $query = $appMrktFC->query_update_marketGroup($old_mgName,$new_mgName);
		echo $database->addupdateData($query,"Updated Market Group <b>\"".$old_mgName."\"</b> to <b>\"".$new_mgName."\"</b> Successfully. ");
	  } else {
	     $missParam = '';
		 if(!isset($_POST["old_mgName"])){ $missParam.='old_mgName,'; }
		 if(!isset($_POST["new_mgName"])){ $missParam.='new_mgName,'; }
		 $missParam = chop($missParam,',');
		 echo  $successErrorHandler->missingParams($missParam);
	  }
	}
	else if($_GET["action"]=='APP_MRKTGRP_DELETE'){
	  if(isset($_GET["mgName"])){
	    $mgName = strtoupper($_GET["mgName"]);
	    $query = $appMrktFC->query_delete_marketGroup($mgName);
	    echo $database->addupdateData($query,"Deleted Market Group <b>\"".$mgName."\"</b> Successfully. ");
	  } else {
		 echo  $successErrorHandler->missingParams('mgName');
	  }
	}
	else if($_GET["action"]=='APP_FC_ADD'){
	  if(isset($_POST["mob_code"]) && isset($_POST["mobileNumber"]) && isset($_POST["mgName"])){
	    $mob_code = $_POST["mob_code"];
	    $mobileNumber = $_POST["mobileNumber"];
		$mgName = array();
		if(isset($_POST["mgName"])){ $mgName = strtoupper($_POST["mgName"]); }
		$query='';
		for($index=0;$index<count($mgName);$index++){
	      $query.=$appMrktFC->query_add_futureCustomerMobile($mob_code,$mobileNumber,$mgName[$index]);
		}
	    echo $database->addupdateData($query,"Added Future Customer Mobile Number <b>\"".$mob_code."-".$mobileNumber."\"</b> to Market Groups \"".$mgName."\" Successfully. ");
	  } else {
	     $missParam = '';
		 if(!isset($_POST["mob_code"])){ $missParam.='mob_code,'; }
		 if(!isset($_POST["mobileNumber"])){ $missParam.='mobileNumber,'; }
		 if(!isset($_POST["mgName"])){ $missParam.='mgName,'; }
		 $missParam = chop($missParam,',');
		 echo  $successErrorHandler->missingParams($missParam);
	  }
	}
	else if($_GET["action"]=='APP_FC_VIEW'){ 
	 echo $database->getJSONData($appMrktFC->query_view_futureCustomerWithMarketGroup());
	}
	else if($_GET["action"]=='APP_FC_UPDATE'){ 
	 if(isset($_POST["fcmg_Id"]) && isset($_POST["mob_code"]) && isset($_POST["mobileNumber"]) && isset($_POST["mgName"])){
		$fcmg_Id = $_POST["fcmg_Id"];
		$mob_code = $_POST["mob_code"];
		$mobileNumber = $_POST["mobileNumber"];
		$mgName = strtoupper($_POST["mgName"]);
		$query = $appMrktFC->query_update_futureCustomer($fcmg_Id,$mob_code,$mobileNumber,$mgName);
		echo $database->addupdateData($query,"Updated Future Customer Info Successfully. ");
	 } else {
		$missParam = '';
		if(!isset($_POST["fcmg_Id"])){ $missParam.='fcmg_Id,'; }
		if(!isset($_POST["mob_code"])){ $missParam.='mob_code,'; }
		if(!isset($_POST["mobileNumber"])){ $missParam.='mobileNumber,'; }
		if(!isset($_POST["mgName"])){ $missParam.='mgName,'; }
		$missParam = chop($missParam,',');
		echo $successErrorHandler->missingParams($missParam);
	 }
	}
	else if($_GET["action"]=='APP_FC_DELETE'){ 
	  if(isset($_GET["fcmg_Id"])){
		  $fcmg_Id = $_GET["fcmg_Id"];
		  $query = $appMrktFC->query_delete_futureCustomer($fcmg_Id);
		  echo $database->addupdateData($query,"Deleted Future Customer Info Successfully. ");
	  } else {
		  echo $successErrorHandler->missingParams('fcmg_Id');
	  }
	}
 } else {
	 echo $error->missingParams('action');
 }
?>