<?php
class AppMrktFC {
 function query_add_marketGroup($mgName){
   return "INSERT INTO mrkt_app_mg(mgName) VALUES ('".$mgName."');";
 }
 function query_update_marketGroup($old_mgName,$new_mgName){
   $sql="SET foreign_key_checks = 0;";
   $sql.="UPDATE mrkt_app_mg SET mgName='".$new_mgName."' WHERE mgName='".$old_mgName."';";
   $sql.="UPDATE mrkt_app_fc SET mgName='".$new_mgName."' WHERE mgName='".$old_mgName."';";
   $sql.="SET foreign_key_checks = 1;";
  return $sql;
 }
 function query_view_marketGroup(){
  return "SELECT * FROM mrkt_app_mg ";
 }
 function query_delete_marketGroup($mgName){
  $sql="DELETE FROM mrkt_app_fc WHERE mgName='".$mgName."';";
  $sql.="DELETE FROM mrkt_app_mg WHERE mgName='".$mgName."';";
  return $sql;
 }
 function query_add_futureCustomerMobile($mob_code,$mobileNumber,$mgName){
  return "INSERT INTO mrkt_app_fc(mob_code, mobileNumber, mgName) VALUES ('".$mob_code."','".$mobileNumber."','".$mgName."');";
 }
 function query_view_futureCustomerWithMarketGroup(){
  $sql="SELECT DISTINCT(mobileNumber) As mobile, mob_code As mobCode, (SELECT GROUP_CONCAT(mgName) As mgName FROM mrkt_app_fc";
  $sql.=" WHERE mob_code=mobCode AND mobileNumber=mobile) As mrkGrp, ";
  $sql.="(CASE ";
  $sql.="WHEN (SELECT count(*) FROM user_accounts_auth, mrkt_app_fc WHERE user_accounts_auth.mob_code=mobCode AND user_accounts_auth.mobileNumber=mobile ";
  $sql.="AND user_accounts_auth.mob_code=mrkt_app_fc.mob_code AND user_accounts_auth.mobileNumber=mrkt_app_fc.mobileNumber)>0 ";
  $sql.="THEN 'Y' ELSE 'N' END) AS isRegistered ";
  $sql.="FROM mrkt_app_fc";
  return $sql;
 }
 function query_update_futureCustomer($fcmg_Id,$mob_code,$mobileNumber,$mgName){
  $sql="UPDATE mrkt_app_fc SET";
  if(strlen($mob_code)>0){ $sql.="mob_code='".$mob_code."',"; }
  if(strlen($mobileNumber)>0){ $sql.="mobileNumber='".$mobileNumber."',"; }
  if(strlen($mgName)>0){ $sql.="mgName='".$mgName."',"; }
  $sql=chop($sql,',');
  $sql.=" WHERE fcmg_Id=".$fcmg_Id;
  return $sql;
 }
 function query_delete_futureCustomer($fcmg_Id){
   return "DELETE FROM mrkt_app_mg WHERE fcmg_Id=".$fcmg_Id.";";
 }
}

?>