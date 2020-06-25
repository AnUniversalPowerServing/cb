<?php 
include_once 'templates/app_init.php';
if(isset($_SESSION["ADMIN_ACCOUNT_ROLENAME"])){
 $PANEL_MODULE = 'Developer';
 $PANEL_PAGE = 'App Config';
 $PANEL_TOPIC_APPCONFIG = 'Application Configuration';
 $PANEL_TOPIC_APPCONFIG_CREATE = accessPermissions($PANEL_TOPIC_APPCONFIG,'C');
 $PANEL_TOPIC_APPCONFIG_READ = accessPermissions($PANEL_TOPIC_APPCONFIG,'R');
 $PANEL_TOPIC_APPCONFIG_UPDATE = accessPermissions($PANEL_TOPIC_APPCONFIG,'U');
 $PANEL_TOPIC_APPCONFIG_DELETE = accessPermissions($PANEL_TOPIC_APPCONFIG,'D');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>App Config</title>
  <link href="<?php echo $PROJECT_URL ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo $PROJECT_URL ?>vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
  <link href="<?php echo $PROJECT_URL ?>vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
  <link href="<?php echo $PROJECT_URL ?>vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
  <link href="<?php echo $PROJECT_URL ?>vendor/sb-admin/css/sb-admin-2.css" rel="stylesheet">
  <link href="<?php echo $PROJECT_URL ?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <script type="text/javascript">
   var PANEL_TOPIC_APPCONFIG_CREATE = '<?php echo $PANEL_TOPIC_APPCONFIG_CREATE ?>';
   var PANEL_TOPIC_APPCONFIG_READ = '<?php echo $PANEL_TOPIC_APPCONFIG_READ; ?>';
   var PANEL_TOPIC_APPCONFIG_UPDATE = '<?php echo $PANEL_TOPIC_APPCONFIG_UPDATE; ?>';
   var PANEL_TOPIC_APPCONFIG_DELETE = '<?php echo $PANEL_TOPIC_APPCONFIG_DELETE; ?>';
  </script>
  <script src="<?php echo $PROJECT_URL ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo $PROJECT_URL ?>vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo $PROJECT_URL ?>vendor/metisMenu/metisMenu.min.js"></script>
  <script src="<?php echo $PROJECT_URL ?>vendor/datatables/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo $PROJECT_URL ?>vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
  <script src="<?php echo $PROJECT_URL ?>vendor/datatables-responsive/dataTables.responsive.js"></script>
  <script src="<?php echo $PROJECT_URL ?>vendor/sb-admin/js/sb-admin-2.js"></script>
  <script src="<?php echo $PROJECT_URL ?>pages/js/common/endpoints.dev.app.config.js"></script>
  <script src="<?php echo $PROJECT_URL ?>pages/js/common/session.js"></script>
  <script src="<?php echo $PROJECT_URL ?>pages/js/api/bootstrap-advanced.js"></script>
  <script src="<?php echo $PROJECT_URL ?>pages/js/api/core-skeleton.js"></script>
  <script src="<?php echo $PROJECT_URL ?>pages/js/common/validations.js"></script>
  <script src="<?php echo $PROJECT_URL ?>pages/js/pages/dev.app.config.js"></script>
</head>
<body>
    <div id="wrapper">
        <!-- Top Header ::: Start -->
		<?php include_once 'templates/admin_header_top.php'; ?>
        <!-- Top Header ::: Ends -->		
        <div id="page-wrapper">
		   
		   <div class="row">
		     <div class="col-lg-12">
			   <h4 class="page-header">Application Configuration</h4>
		     </div><!-- /.col-lg-12 -->
		   </div><!--/.row -->


<?php if($PANEL_TOPIC_APPCONFIG_CREATE=='Y'){ ?>
<div class="row">
 <div align="right" class="col-lg-12">
   <button class="btn btn-default" data-toggle="modal" data-target="#addNewConfigParamModal"><b>+ Add New Parameter</b></button>
 </div><!-- /.col-lg-12 -->
</div><!--/.row -->
<?php } ?>
<?php if($PANEL_TOPIC_APPCONFIG_READ=='Y'){ ?>
<div class="row mtop15p">
  <div id="manage-devAppConfig-view-configInfo" class="col-lg-12"></div><!-- /.col-lg-12 -->
</div><!--/.row -->
<?php } ?>
<!-- Add New Config ::: START -->
<div id="addNewConfigParamModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-blue">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Configuration Paramter</h4>
      </div>
      <div class="modal-body">
        <!-- -->
		<div class="container-fluid">
		 <div class="row">
		  <div class="col-lg-12">
		  
		    <!-- -->
			<div id="manage-devAppConfig-add-warnErrorMsg" class="form-group"></div><!--/.form-group -->
			<div class="form-group">
			 <label>Parameter Name</label>
			 <input type="text" id="manage-devAppConfig-add-inputparamName" class="form-control" placeholder="Enter Parameter Name"/>
			</div><!--/.form-group -->
			
			<div class="form-group">
			 <label>Parameter Value</label>
			 <input type="text" id="manage-devAppConfig-add-inputparamValue" class="form-control" placeholder="Enter Parameter Value"/>
			</div><!--/.form-group -->
			
			<div class="form-group">
			 <label>Parameter Description</label>
			 <textarea id="manage-devAppConfig-add-inputparamDesc" class="form-control" placeholder="Enter Parameter Description"></textarea>
			</div><!--/.form-group -->
			
			<div align="center" class="form-group">
			 <button class="btn btn-blue" onclick="javascript:submit_manage_devAppConfig_add();"><b>Add New Parameter</b></button>
			 <button class="btn btn-blue-o" onclick="javascript:reset_manage_devAppConfig_add();"><b>Reset Form</b></button>
			</div><!--/.form-group -->
			<!-- -->
			
		  </div><!--/.col-lg-12 -->
		 </div><!--/.row -->
		</div><!--/.container-fluid -->
		<!-- -->
      </div><!--/.modal-body -->
    </div><!--/.modal-content -->
  </div><!--/.modal-dialog -->
</div><!--/.modal -->
<!-- Add New Config ::: END -->
<!-- Update App Config ::: START -->
<div id="manage-devAppConfig-updateExistingParamModal" class="modal fade" role="dialog"></div>
<!-- Update App Config ::: END -->
<!-- Delete App Config ::: START -->
<div id="manage-devAppConfig-deleteExistingParamModal" class="modal fade" role="dialog"></div>
<!-- Delete App Config ::: END -->   
		</div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
</body>

</html>
<?php } else { header("Location:".$PROJECT_URL.'admin/auth'); } ?>