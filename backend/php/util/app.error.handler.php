<?php
 class SuccessErrorHandler {
   function missingParams($params){
    $error = array();
	$error["errorType"]='MISSING_PARAMS';
	$error["missingParams"]=$params;
	return json_encode($error);
   }
   function successErrorInfo($info,$desc){
	$successError = array();
	$successError["status"]=$info;
	$successError["statusDesc"]=$desc;
	return json_encode($successError);
   }
 }
?>