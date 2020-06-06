<?php
require_once 'api/app.initiator.php';
require_once 'api/app.database.php';
require_once 'util/app.error.handler.php';

$error = new Error();

 if(isset($_POST["action"])){
	if($_POST["action"]=='APP_MRKT_VIEW'){ 
	  $page = $_POST["page"];
	  
	} 
	else if($_POST["action"]=='APP_MRKT_ADDUPDATE'){
	  $mobcode = $_POST["mobcode"];
	  $mobileNumber = $_POST["mobileNumber"];
	  $tag = $_POST["tag"];
	  
	}
 } else {
	 echo $error->missingParams('action');
 }
 
?>