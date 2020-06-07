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
  <link href="<?php echo $PROJECT_URL ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo $PROJECT_URL ?>vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
  <link href="<?php echo $PROJECT_URL ?>vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
  <link href="<?php echo $PROJECT_URL ?>vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
  <link href="<?php echo $PROJECT_URL ?>vendor/sb-admin/css/sb-admin-2.css" rel="stylesheet">
  <link href="<?php echo $PROJECT_URL ?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
  <script type="text/javascript">
    $(document).ready(function() {
        $('#dataTables-example').DataTable({ responsive: true });
    });
  </script>
  <style>
  
  </style>
</head>
<body>
    <div id="wrapper">
        <!-- Top Header ::: Start -->
		<?php include_once 'templates/admin_header_top.php'; ?>
        <!-- Top Header ::: Ends -->		
        <div id="page-wrapper">
            <div class="row">
              <div class="col-lg-12">
                <h4 class="page-header">Manage Account - User Accounts</h4>
              </div><!-- /.col-lg-12 -->
            </div><!--/.row -->
			
            <div class="row">
                <div class="col-lg-12">
                    <div id= "" class="list-group">
                        <div class="list-group-item">
						    <div class="container-fluid">
							  <div class="row">
								<div class="col-lg-12" style="background-color:#eee;"><h5><b>View User Accounts</b></h5></div>
							  </div><!--/.row -->
							  <div class="row mtop15p">
								<div class="col-lg-12">
								<!-- -->
								    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
										<thead>
											<tr>
												<th>User Role</th>
												<th>Username</th>
												<th>Mobile Code</th>
												<th>Mobile Number</th>
												<th>SurName</th>
												<th>Name</th>
												<th>Gender</th>
												<th>Email</th>
												<th>Account Status</th>
											</tr>
										</thead>
										<tbody>
											<tr class="odd gradeX">
												<td>Trident</td>
												<td>Internet Explorer 4.0</td>
												<td>Win 95+</td>
												<td class="center">4</td>
												<td class="center">X</td>
												<td>Win 95+</td>
												<td class="center">4</td>
												<td class="center">X</td>
												<td class="center">X</td>
											</tr>
											<tr class="even gradeC">
												<td>Trident</td>
												<td>Internet Explorer 5.0</td>
												<td>Win 95+</td>
												<td class="center">5</td>
												<td class="center">C</td>
												<td>Win 95+</td>
												<td class="center">4</td>
												<td class="center">X</td>
												<td class="center">X</td>
											</tr>
											<tr class="odd gradeA">
												<td>Trident</td>
												<td>Internet Explorer 5.5</td>
												<td>Win 95+</td>
												<td class="center">5.5</td>
												<td class="center">A</td>
												<td>Win 95+</td>
												<td class="center">4</td>
												<td class="center">X</td>
												<td class="center">X</td>
											</tr>
										</tbody>
									</table><!-- /.table-responsive -->
								  <!-- -->
								</div><!--/.col-lg-12 -->
							  </div><!--/.row -->
							</div><!--/.container-fluid -->
                        </div><!-- /.list-group-item -->
                    </div><!-- /.list-group -->
                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
            
			<div class="row">
			  
			  <div class="col-lg-8">
              <?php include_once 'templates/admin-manage-accounts-createUserAccounts.php'; ?>
              </div><!-- /.col-lg-12 -->
			  
            </div><!--/.row -->
					
		</div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    

</body>

</html>
