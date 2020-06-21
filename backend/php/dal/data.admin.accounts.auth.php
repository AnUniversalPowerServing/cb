<?php
class AdminAccountAuth {
  function query_view_userAccountLogin($userName,$acc_pwd){
	$sql="SELECT * FROM admin_accounts_auth, admin_accounts_roles WHERE userName='".$userName."' AND acc_pwd='".$acc_pwd."' AND ";
	$sql.="admin_accounts_auth.role=admin_accounts_roles.role";
	return $sql;
  }
  function query_view_userAccessPermissions($role){
	 $sql="SELECT * FROM admin_mod_access_perm, admin_mod_topc, admin_mod_pages, admin_mod_info WHERE ";
	 $sql.="admin_mod_access_perm.topcName=admin_mod_topc.topcName AND ";
	 $sql.="admin_mod_topc.pageName=admin_mod_pages.pageName AND ";
	 $sql.="admin_mod_pages.moduleName=admin_mod_info.moduleName AND admin_mod_access_perm.role='".$role."';";
	 $sql.="";
	 return $sql;
  }
  function query_add_adminAccounts($role_Id, $surName, $name, $gender, $email, $mob_code, $mobile, $userName, $acc_pwd, $acc_active){
	$sql="INSERT INTO admin_accounts_auth(role_Id, surName, name, gender, email, mob_code, mobile, userName, acc_pwd, acc_active) ";
	$sql.="VALUES (".$role_Id.",'".$surName."','".$name."','".$gender."','".$email."','".$mob_code."','".$mobile."','".$userName."','";
	$sql.=$acc_pwd."','".$acc_active."');";
	return $sql;
  }
  function query_update_adminAccounts($account_Id, $role_Id, $surName, $name, $gender, $email, $mob_code, $mobile, $userName, $acc_pwd, $acc_active){
	$sql="UPDATE admin_accounts_auth SET ";
	if(strlen($role_Id)>0){ $sql.="role_Id=".$role_Id.","; }
	if(strlen($surName)>0){ $sql.="surName='".$surName."',"; }
	if(strlen($name)>0){ $sql.="name='".$name."',"; }
	if(strlen($gender)>0){ $sql.="gender='".$gender."',"; }
	if(strlen($email)>0){ $sql.="email='".$email."',"; }
	if(strlen($mob_code)>0){ $sql.="mob_code='".$mob_code."',"; }
	if(strlen($mobile)>0){ $sql.="mobile='".$mobile."',"; }
	if(strlen($userName)>0){ $sql.="userName='".$userName."',"; }
	if(strlen($acc_pwd)>0){ $sql.="acc_pwd='".$acc_pwd."',"; }
	if(strlen($acc_active)>0){ $sql.="acc_active='".$acc_active."',"; }
	$sql=chop($sql,',');
	$sql.=" WHERE account_Id='".$account_Id."';";
 }
}

?>