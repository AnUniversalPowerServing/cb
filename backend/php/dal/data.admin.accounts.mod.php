<?php
 class AdminAccountMod {
  function query_view_userAccessPermissions($role,$pagePath){
	$sql="SELECT admin_mod_topc.topcName, admin_mod_topc.topicDesc, admin_mod_access_perm.C, admin_mod_access_perm.R, ";
	$sql.="admin_mod_access_perm.U, admin_mod_access_perm.D FROM admin_mod_access_perm, admin_mod_topc, admin_mod_pages, admin_mod_info WHERE ";
	$sql.="admin_mod_access_perm.topcName=admin_mod_topc.topcName AND admin_mod_topc.pageName=admin_mod_pages.pageName AND ";
	$sql.="admin_mod_pages.moduleName=admin_mod_info.moduleName AND admin_mod_access_perm.role='".$role."' AND ";
	$sql.="admin_mod_pages.pagePath='".$pagePath."';";
   return $sql;
  }
  function query_view_userAccessMenu($role){
	$sql="SELECT moduleName, pageName, pagePath FROM admin_mod_pages WHERE pageName IN ";
	$sql.="(SELECT DISTINCT(pageName) FROM admin_mod_topc WHERE topcName IN ";
	$sql.="(SELECT topcName FROM admin_mod_access_perm WHERE role='".$role."' AND (C='Y' OR R='Y' OR U='Y' OR D='Y'))) ";
	$sql.="ORDER BY moduleName DESC;";
	return $sql;
  }
 }
?>