<?php
require_once '../api/app.initiator.php';
require_once '../api/app.database.php';
require_once '../util/app.error.handler.php';

$database = new Database($DB_MLHBASIC_SERVERNAME,$DB_MLHBASIC_NAME,$DB_MLHBASIC_USER,$DB_MLHBASIC_PASSWORD);

if(isset($_POST["action"])){
  if($_POST["action"]=='FILE_PROC_UPLOAD'){
	if(count($_FILES) > 0) {
	  $destination = $_POST["destination"];
	  if(is_uploaded_file($_FILES['fileUploaded']['tmp_name'])) {
		$fileUploaded = addslashes(file_get_contents($_FILES['fileUploaded']['tmp_name']));
		$fileName = $_FILES['fileUploaded']['name'];
		$imageProperties = getimageSize($_FILES['fileUploaded']['tmp_name']);
		$sql="INSERT INTO dev_fu_proc(uploadedFile, fileName, destination, isProcessed) ";
		$sql.="VALUES ('{$fileUploaded}','".$fileName."','".$destination."','N');";
		echo $database->addupdateData($sql,"Bulk-Data Uploaded Successfully. ");
	  } else {
		  echo $successErrorHandler->successErrorInfo('error','file not uploaded');
	  }
   } else {
		echo $successErrorHandler->successErrorInfo('error','No Files Received');
   }	   
  } 
  else if($_POST["action"]=='FILE_PROC_READ'){
	 $fileName = $_POST["fileName"];
	 $sql="SELECT * FROM dev_fu_proc WHERE fileName='".$fileName."';";
	 echo $database->getBlobInfo($sql,'uploadedFile');
  }
} else {
	echo $successErrorHandler->missingParams('action');
}

?>