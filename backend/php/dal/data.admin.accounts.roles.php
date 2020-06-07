<?php
class AdminAccountRoles {
  function query_verify_roleIdExists($role_Id){
	return "SELECT * FROM admin_accounts_roles WHERE role_Id=".$role_Id;
  }
  
  function query_verify_roleExists($role){
	return "SELECT count(*) FROM admin_accounts_roles WHERE role='".$role."';";
  }
  
  function query_add_newRole($role, $roleDesc){
	return "INSERT INTO admin_accounts_roles(role, roleDesc) VALUES ('".$role."','".$roleDesc."');";
  }
  
  function query_view_roles(){
	return "SELECT * FROM admin_accounts_roles";
  }
  
  function query_delete_role($role_Id){
	return "DELETE FROM admin_accounts_roles WHERE role_Id='".$role_Id."';"; 
  }
  
  function query_delete_adminAccountsByrole($role_Id){
	return "DELETE FROM admin_accounts_auth WHERE role_Id='".$role_Id."';"; 
  }
  
  function query_update_adminAccountsByrole($role_Id,$role,$roleDesc){
	$sql="UPDATE admin_accounts_roles SET";
	if(strlen($role)>0) { $sql.=" role='".$role."',"; }
	if(strlen($roleDesc)>0) { $sql.=" roleDesc='".$roleDesc."',"; }
	$sql=chop($sql,',');
	$sql.=" WHERE role_Id=".$role_Id;
	return $sql;
  }
}
?>