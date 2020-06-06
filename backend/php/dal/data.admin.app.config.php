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
 class TblAppConfig {
	 function getAppConfigParams($key,$keys){
		$sql="SELECT * FROM admin_app_config";
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
	 function addOrUpdateAppParams($key,$val){
		$sql="INSERT INTO admin_app_config(paramName, paramValue) VALUES ('".strtoupper($key)."','".$val."') ON DUPLICATE KEY UPDATE paramValue='".$val."';";
		return $sql;
	 }
 }
?>