<?php
 session_start();
 require_once '../util/app.error.handler.php';
 require_once '../api/app.initiator.php';
 require_once '../api/app.database.php';
 require_once '../util/app.error.handler.php';
 require_once '../dal/data.admin.app.config.php';
 
 if(isset($_GET["action"])){
	if($_GET["action"]=='APP_PROPERTY_VIEW'){
		if(isset($_GET["key"])){
			$key = $_GET["key"];
			$keys = array();
			if(isset($_POST["keys"])){ $keys = $_POST["keys"]; }
		    $tblAppConfig = new TblAppConfig();
			$query = $tblAppConfig->getAppConfigParams($key,$keys);
			if(strlen($query)>0){
			  $database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
			  echo $database->getJSONData($query);
			}
		} else { echo $successError->missingParams('key'); }
	} 
	else if($_GET["action"]=='APP_PROPERTY_ADDUPDATE'){
		if(isset($_GET["key"]) && isset($_GET["val"])){
			$key = $_GET["key"];
			$val = $_GET["val"];
			$tblAppConfig = new TblAppConfig();
			$query = '';
			if($_GET["key"]=='addupdate' && $_GET["val"]=='multiple'){
				$data = '';
			    if(isset($_POST["data"])){ $data = $_POST["data"]; }
				foreach($data as $k=>$v){
				 $query.= $tblAppConfig->addOrUpdateAppParams($k,$v);
				}
			} else {
				$query = $tblAppConfig->addOrUpdateAppParams($key,$val);
			}
			$database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);
		    echo $database->addupdateData($query);
			
		} else { 
		    $missParam = '';
		    if(!isset($_GET["key"])){ $missParam.='key,'; }
			if(!isset($_GET["val"])){ $missParam.='val,'; }
			$missParam = chop($missParam,',');
		    echo $successError->missingParams($missParam);
		}
	}
 } else {
	 echo $successError->missingParams('action');
 }
 
?>
