<?php
/**
 * This is the File that handles query for app_config table
 * ================================================
 * || Table: app_config                            ||
 * || Columns:                                     ||
 * || 1) param_Id INT(11) AUTO_INCREMENT           ||
 * || 2) paramName VARCHAR(250)                    ||
 * || 3) paramValue VARCHAR(250)                   ||
 * ================================================
 */
 class DevAppConfig {
	 function query_view_appConfigParams($key,$keys){
		$sql="SELECT * FROM dev_app_config";
		if($key=='multiple'){ // Multiple Keys
		  if(count($keys)>0){
			 $sql.=" WHERE";
			 for($i=0;$i<count($keys);$i++){
				$sql.=" paramName='".strtoupper($keys[$i])."' OR";
			 }	
			 $sql=chop($sql,'OR');
		  } else {
			 $sql='';
		  }
		} else if($key!='all' && $key!='multiple'){// Only One Required
			$sql.=" WHERE paramName='".strtoupper($key)."'";
		}
		$sql.=';';
		return $sql;
	 }
	 function query_update_appConfigParams($paramName,$paramValue,$paramDesc){
	   $sql="UPDATE dev_app_config SET";
	   if(strlen($paramValue)>0){ $sql.=" paramValue='".$paramValue."',"; }
	   if(strlen($paramDesc)>0){ $sql.=" paramDesc='".$paramDesc."',"; }
	   $sql=chop($sql,',');
	   $sql.=" WHERE paramName='".$paramName."';";
	   return $sql;
	 }
	 
	 function query_add_appConfigParams($paramName,$paramValue,$paramDesc){
	   $sql="INSERT INTO dev_app_config(paramName, paramValue, paramDesc) ";
	   $sql.="VALUES ('".strtoupper($paramName)."','".$paramValue."','".$paramDesc."');";
	   return $sql;
	 }

	 function query_verify_appConfigParamsExist($paramName){
		return "SELECT count(*) FROM dev_app_config WHERE paramName='".$paramName."';";
	 }
	 
	 function query_delete_appConfigParams($paramName){
	   return "DELETE FROM dev_app_config WHERE paramName='".$paramName."';";
	 }
 }
?>