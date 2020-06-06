<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Manage Modules and Pages</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Module Pages OverView Modal ::: START -->
<div id="addNewModuleModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#eee;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Module</h4>
      </div>
      <div class="modal-body pad0">
			 <div class="list-group" style="margin-bottom:0px;">
			  <div class="list-group-item pad0" style="border-radius:0px;">
			    <div class="container-fluid mtop15p">
				  <div class="row">
				    <div class="col-lg-12">
					  <!-- -->
					  <div class="form-group">
					    <label>Module Name</label>
						  <input type="text" class="form-control" placeholder="Enter Module Name"/>
					  </div><!--/.form-group -->
					  <!-- -->
					</div><!--/.col-lg-12 -->
				  </div><!--/.row -->
				</div><!--/.container-fluid -->
				  
				<div style="border-top:1px solid #e5e5e5;border-bottom:2px solid #e5e5e5;background-color:#eee;padding-top:5px;padding-bottom:5px;padding-left:15px;" class="modal-title"><h4>Add Pages to Module</b></div>
				
				<div class="container-fluid mtop15p">
				  
				  <div class="row">
				    <div class="col-lg-1">
					  <h4><b>1.</b></h4>
					</div><!--/.col-lg-4 -->
					<div class="col-lg-11">
					  <div><input type="text" class="form-control" placeholder="Add Page Name"/></div>
					  <div class="mtop10p"><input type="text" class="form-control" placeholder="Add Page URL"/></div>
					</div><!--/.col-lg-10 -->
				  </div><!--/.row -->
				  
				  <div class="row">
					<div class="col-lg-1">
					   <i class="fa fa-times-circle" style="font-size:20px;padding:5px;" aria-hidden="true"></i>
					</div><!--/.col-lg-1 -->
				  </div><!--/.row -->
				  
				  
				</div><!--/.container-fluid -->
			  </div><!--/.list-group-item -->
			 </div><!--/.list-group -->
			 <!-- -->
		   
		<!-- -->
      </div><!--/.modal-body -->
    </div><!--/.modal-content -->
  </div><!--/.modal-dialog -->
</div><!--/.modal -->
<!-- Module Pages OverView Modal ::: END -->


    <div id="wrapper">

        <!-- Top Header ::: Start -->
		<?php include_once 'templates/admin_header_top.php'; ?>
        <!-- Top Header ::: Ends -->
		
        <div id="page-wrapper">
		    <div class="row">
			  <div class="col-lg-12">
			   <!-- -->
			   <div class="alert alert-info alert-page-panel alert-dismissible">
				 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				 <strong><i class="fa fa-info-circle" aria-hidden="true"></i> Info!</strong> Indicates a successful or positive action.
			   </div>
			   <!-- -->
			  </div><!-- /.col-lg-12 -->
			</div><!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header">Manage Account - Modules and Pages</h4>
                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
			<div class="row">
                <div class="col-lg-12">
                   <ul class="nav nav-tabs">
					  <li class="active"><a data-toggle="tab" href="#modulesOverview"><b>Modules Overview</b></a></li>
					  <li><a data-toggle="tab" href="#modulesManager"><b>Modules Manager</b></a></li>
				   </ul>
				   <div class="list-group">
				     <div class="list-group-item">
					    <div class="tab-content">
						  <div id="modulesOverview" class="tab-pane fade in active">
							 <?php include_once 'templates/admin-manage-accounts-modulesAndPages-view.php'; ?>
						  </div><!--/#modulesOverview -->
						  <div id="modulesManager" class="tab-pane fade">
							<?php include_once 'templates/admin-manage-accounts-modulesAndPages-add.php'; ?>
						  </div><!--/#modulesManager -->
						</div><!--/.tab-content -->
				      
				     </div><!--/.list-group-item -->
				   </div><!--/.list-group -->
                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
			
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
		$('#toggle-one').bootstrapToggle();
    });
    </script>

</body>

</html>
