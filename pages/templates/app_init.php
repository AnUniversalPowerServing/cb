<?php
session_start();
function accPermission($module,$page,$topic,$crud){
 if(isset($_SESSION["ADMIN_ACCOUNT_ACCPERMISSIONS"])){
 $accperm = json_decode($_SESSION["ADMIN_ACCOUNT_ACCPERMISSIONS"]);
 $topcPerm = $accperm->{$module}->{"pages"}->{$page}->{"topic"}->{$topic};  
 return $topcPerm->{$crud};
 } else { return "SESSION_NOT_SET"; }
}
$PROJECT_URL = 'http://localhost/cB/';
?>
<script type="text/javascript">
 var PROJECT_URL='<?php echo $PROJECT_URL; ?>';
 var USR_LANG='english';
</script>