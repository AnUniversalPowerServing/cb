<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Future Customers</title>
  <?php include_once 'templates/app_init.php'; ?>
  <link href="<?php echo $PROJECT_URL ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo $PROJECT_URL ?>vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
  <link href="<?php echo $PROJECT_URL ?>vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
  <link href="<?php echo $PROJECT_URL ?>vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
  <link href="<?php echo $PROJECT_URL ?>vendor/sb-admin/css/sb-admin-2.css" rel="stylesheet">
  <link href="<?php echo $PROJECT_URL ?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo $PROJECT_URL ?>/vendor/morrisjs/morris.css" rel="stylesheet">
  <script src="<?php echo $PROJECT_URL ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo $PROJECT_URL ?>vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo $PROJECT_URL ?>vendor/metisMenu/metisMenu.min.js"></script>
  <script src="<?php echo $PROJECT_URL ?>vendor/datatables/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo $PROJECT_URL ?>vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
  <script src="<?php echo $PROJECT_URL ?>vendor/datatables-responsive/dataTables.responsive.js"></script>
  <script src="<?php echo $PROJECT_URL ?>/vendor/raphael/raphael.min.js"></script>
  <script src="<?php echo $PROJECT_URL ?>/vendor/morrisjs/morris.min.js"></script>
  <script src="<?php echo $PROJECT_URL ?>vendor/sb-admin/js/sb-admin-2.js"></script>
  <script src="<?php echo $PROJECT_URL ?>pages/js/common/endpoints.mrkt.app.fc.js"></script>
  <script src="<?php echo $PROJECT_URL ?>pages/js/common/session.js"></script>
  <script src="<?php echo $PROJECT_URL ?>pages/js/api/bootstrap-advanced.js"></script>
  <script src="<?php echo $PROJECT_URL ?>pages/js/api/core-skeleton.js"></script>
  <script src="<?php echo $PROJECT_URL ?>pages/js/common/validations.js"></script>
  <script src="<?php echo $PROJECT_URL ?>pages/js/pages/mrkt.app.mrkt.grp.js"></script>
  <script>
  $(document).ready(function(){
   Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: '2010 Q1',
            iphone: 2666,
            ipad: null,
            itouch: 2647
        }, {
            period: '2010 Q2',
            iphone: 2778,
            ipad: 2294,
            itouch: 2441
        }, {
            period: '2010 Q3',
            iphone: 4912,
            ipad: 1969,
            itouch: 2501
        }, {
            period: '2010 Q4',
            iphone: 3767,
            ipad: 3597,
            itouch: 5689
        }, {
            period: '2011 Q1',
            iphone: 6810,
            ipad: 1914,
            itouch: 2293
        }, {
            period: '2011 Q2',
            iphone: 5670,
            ipad: 4293,
            itouch: 1881
        }, {
            period: '2011 Q3',
            iphone: 4820,
            ipad: 3795,
            itouch: 1588
        }, {
            period: '2011 Q4',
            iphone: 15073,
            ipad: 5967,
            itouch: 5175
        }, {
            period: '2012 Q1',
            iphone: 10687,
            ipad: 4460,
            itouch: 2028
        }, {
            period: '2012 Q2',
            iphone: 8432,
            ipad: 5713,
            itouch: 1791
        }],
        xkey: 'period',
        ykeys: ['iphone', 'ipad', 'itouch'],
        labels: ['iPhone', 'iPad', 'iPod Touch'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });
});
  </script>
</head>
<body>
    <div id="wrapper">
        <!-- Top Header ::: Start -->
		<?php include_once 'templates/admin_header_top.php'; ?>
        <!-- Top Header ::: Ends -->		
        <div id="page-wrapper">
		   
		   <div class="row">
		     <div class="col-lg-12">
			   <h4 class="page-header">App Marketing - Future Customers</h4>
		     </div><!-- /.col-lg-12 -->
		   </div><!--/.row -->
		   
		   <div class="row">
				<!-- Column#1::: START -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <!--i class="fa fa-money fa-5x"></i-->
									<span class="fa fa-user" style="font-size:35px;"></span>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">26</div>
                                </div>
                            </div>
							<div class="row mtop5p">
							  <div class="col-xs-12 text-right"><b>Future Customers</b></div>
							</div>
                        </div>
                    </div>
                </div>
				<!-- Column#1::: END -->
				<!-- Column#2::: START -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-money"  style="font-size:35px;"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">12</div>
                                </div>
                            </div>
							<div class="row mtop5p">
							  <div class="col-xs-12 text-right"><b>Total Registered Customers</b></div>
							</div>
                        </div>
                    </div>
                </div>
				<!-- Column#2::: END -->
				<!-- Column#3::: START -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-plus-circle" style="font-size:35px;"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">124</div>
                                </div>
                            </div>
							<div class="row mtop5p">
							  <div class="col-xs-12 text-right"><b>Today Joinees</b></div>
							</div>
                        </div>
                    </div>
                </div>
				<!-- Column#3::: END -->
				<!-- Column#4::: START -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-envelope" style="font-size:35px;"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">124</div>
                                </div>
                            </div>
							<div class="row mtop5p">
							  <div class="col-xs-12 text-right"><b>Available Promotional Messages</b></div>
							</div>
                        </div>
                    </div>
                </div><!--/.col-lg-3 col-md-6 -->
				<!-- Column#4::: END -->
            </div><!--/.row -->
			<div class="row">
			  <div class="col-lg-12">
			    <ul class="nav nav-tabs">
				  <li class="active"><a data-toggle="tab" href="#appMarketStatistics"><b>App Marketing Statistics</b></a></li>
				  <li><a data-toggle="tab" href="#marketManager" 
						onclick="javascript:manage_mrktApp_marketManager_marketGroup_view();"><b>Market Manager</b></a></li>
				</ul>
				<div class="list-group">
				  <div class="list-group-item">
				    <!-- -->
					<div class="tab-content">
					  <div id="appMarketStatistics" class="tab-pane fade active in">
						<?php include_once 'templates/mrkt-app-fc-appMarketStatistics.php'; ?>
					  </div><!--/#appMarketStatistics -->
					  <div id="marketManager" class="tab-pane fade">
						<?php include_once 'templates/mrkt-app-fc-marketManager.php'; ?> 
					  </div><!--/#marketManager -->
					</div><!--/.tab-content -->
					<!-- -->
				  </div><!--/.list-group-item -->
				</div><!--/.list-group -->
			  </div><!--/.col-lg-12 -->
			</div><!--/.row -->
            
		</div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
</body>

</html>
