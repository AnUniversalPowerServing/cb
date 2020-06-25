<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Manage User Accounts</title>
  <?php include_once 'templates/app_init.php'; ?>
  <?php
	 $PANEL_MODULE = 'Manage Accounts';
	 $PANEL_PAGE = 'User Roles';
	 $PANEL_TOPIC_USERACCOUNTROLES = 'User Account Roles';
	 $PANEL_TOPIC_USERACCOUNTROLES_CREATE = accPermission($PANEL_MODULE,$PANEL_PAGE,$PANEL_TOPIC_USERACCOUNTROLES,'C');
	 $PANEL_TOPIC_USERACCOUNTROLES_READ = accPermission($PANEL_MODULE,$PANEL_PAGE,$PANEL_TOPIC_USERACCOUNTROLES,'R');
	 $PANEL_TOPIC_USERACCOUNTROLES_UPDATE = accPermission($PANEL_MODULE,$PANEL_PAGE,$PANEL_TOPIC_USERACCOUNTROLES,'U');
	 $PANEL_TOPIC_USERACCOUNTROLES_DELETE = accPermission($PANEL_MODULE,$PANEL_PAGE,$PANEL_TOPIC_USERACCOUNTROLES,'D');
  ?>
  <link href="<?php echo $PROJECT_URL ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo $PROJECT_URL ?>vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
  <link href="<?php echo $PROJECT_URL ?>vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
  <link href="<?php echo $PROJECT_URL ?>vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
  <link href="<?php echo $PROJECT_URL ?>vendor/sb-admin/css/sb-admin-2.css" rel="stylesheet">
  <link href="<?php echo $PROJECT_URL ?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <script type="text/javascript">
   var PANEL_TOPIC_USERACCOUNTROLES_CREATE = '<?php echo $PANEL_TOPIC_USERACCOUNTROLES_CREATE ?>';
   var PANEL_TOPIC_USERACCOUNTROLES_READ = '<?php echo $PANEL_TOPIC_USERACCOUNTROLES_READ; ?>';
   var PANEL_TOPIC_USERACCOUNTROLES_UPDATE = '<?php echo $PANEL_TOPIC_USERACCOUNTROLES_UPDATE; ?>';
   var PANEL_TOPIC_USERACCOUNTROLES_DELETE = '<?php echo $PANEL_TOPIC_USERACCOUNTROLES_DELETE; ?>';
  </script>
  <script src="<?php echo $PROJECT_URL ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo $PROJECT_URL ?>vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo $PROJECT_URL ?>vendor/metisMenu/metisMenu.min.js"></script>
  <script src="<?php echo $PROJECT_URL ?>vendor/datatables/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo $PROJECT_URL ?>vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
  <script src="<?php echo $PROJECT_URL ?>vendor/datatables-responsive/dataTables.responsive.js"></script>
  <script src="<?php echo $PROJECT_URL ?>vendor/sb-admin/js/sb-admin-2.js"></script>
  <script src="<?php echo $PROJECT_URL ?>pages/js/common/endpoints.auth.admin.js"></script>
  <script src="<?php echo $PROJECT_URL ?>pages/js/common/endpoints.admin.roles.js"></script>
  <script src="<?php echo $PROJECT_URL ?>pages/js/common/session.js"></script>
  <script src="<?php echo $PROJECT_URL ?>pages/js/api/bootstrap-advanced.js"></script>
  <script src="<?php echo $PROJECT_URL ?>pages/js/api/core-skeleton.js"></script>
  <script src="<?php echo $PROJECT_URL ?>pages/js/common/validations.js"></script>
  <script src="<?php echo $PROJECT_URL ?>pages/js/pages/admin.accounts.roles.js"></script>
</head>
<body>
    <div id="wrapper">
        <!-- Top Header ::: Start -->
		<?php include_once 'templates/admin_header_top.php'; ?>
        <!-- Top Header ::: Ends -->		
        <div id="page-wrapper">
		   
		   <div class="row">
		     <div class="col-lg-12">
			   <h4 class="page-header">Manage Account - User Roles</h4>
		     </div><!-- /.col-lg-12 -->
		   </div><!--/.row -->
			
		    <?php if($PANEL_TOPIC_USERACCOUNTROLES_CREATE=='Y'){ ?>
		    <!-- Add Roles ::: START -->	   
		    <div class="row">
			 <div align="right" class="col-lg-12">
				<button class="btn btn-default" data-toggle="modal" data-target="#addNewRoleModal"><b>+ Add New Role</b></button>
			 </div><!--/.col-lg-12 -->
		    </div><!--/.row -->
		   
		    <?php include_once 'templates/admin-manage-accounts-createNewRole.php'; ?>
 		    <!-- Add Roles ::: END -->
		    <?php } ?>
		    
			<?php if($PANEL_TOPIC_USERACCOUNTROLES_READ=='Y'){ ?>
		    <!-- View Roles ::: START -->
			<div id="manage-adminRoles-viewRolesInfo" class="row mtop15p"></div><!--/.row -->
			<!-- View Roles ::: END -->
			<?php } ?>
			
			<?php if($PANEL_TOPIC_USERACCOUNTROLES_UPDATE=='Y'){ ?>
			<!-- Update Roles ::: START -->
			<div id="manage-adminRoles-updateExistingRoleModal" class="modal fade" role="dialog"></div>
			<!-- Update Roles ::: END -->
			<?php } ?>
			
			<?php if($PANEL_TOPIC_USERACCOUNTROLES_DELETE=='Y'){ ?>
			<!-- Delete Roles ::: START -->
			<div id="manage-adminRoles-deleteExistingRoleModal" class="modal fade" role="dialog"></div>
			<!-- Delete Roles ::: END -->
			<?php } ?>
			
		</div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
</body>

</html>
