<?php
class TblAppMrkt {
  function query_add_addOrUpdateAppMrkt($mobcode, $mobileNumber, $tag){
   $sql="INSERT INTO app_mrkt (mobcode, mobileNumber, tag)";
   $sql.="SELECT '".$mobcode."', '".$mobileNumber."', '".$tag."'  FROM app_mrkt WHERE ";
   $sql.="(SELECT count(*) FROM app_mrkt WHERE mobcode = '".$mobcode."' AND mobileNumber = '".$mobileNumber."' AND tag = '".$tag."')=0;";
   return $sql;
  }	  
}

?>