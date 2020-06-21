<div class="container-fluid">
 <div class="row">
  <div class="col-lg-2">
    <!-- -->
	<ul class="nav nav-pills nav-stacked">
	  <li class="active"><a data-toggle="tab" href="#marketGroup" 
	  onclick="javascript:manage_mrktApp_marketManager_marketGroup_view();"><b>Market Group</b></a></li>
	  <li><a data-toggle="tab" href="#futureCustomers" 
	  onclick="javascript:manage_mrktApp_marketManager_futureCustomers_view();"><b>Future Customers</b></a></li>
	</ul>
	<!-- -->
  </div><!--/.col-lg-3 --> 
  <div class="col-lg-10">
	<!-- -->
		<div class="tab-content">
		  <div id="marketGroup" class="tab-pane fade in active">
			<!-- -->
			<div class="row">
			  <div align="right" class="col-lg-12">
			  <!-- -->
			  <button class="btn btn-blue-o" onclick="javascript:manage_mrktApp_marketManager_marketGroup_add();"><b>+ Add New Market Group</b></button>
			  <!-- -->
			  </div><!--/.col-lg-12 -->
			</div><!--/.row -->
			<div class="row">
			
			   <div class="col-lg-12">
			     <!-- -->
			     <div class="col-lg-12" style="background-color:#eee;"><h5><b>View Market Group</b></h5></div>
				 <div id="manage-mrktApp-view-mrktGrp-warnErrorMsg" class="col-lg-12 mtop15p"></div>
				 <div id="manage-mrktApp-view-mrktGrp" class="col-lg-12 mtop15p"></div><!--/.col-lg-12 -->
				 <!-- -->
			   </div><!--/.col-lg-12 -->
			</div><!--/.row -->
			<!-- -->
		  </div><!--/#marketGroup -->
		  
		  <div id="futureCustomers" class="tab-pane fade">
			<!-- -->
			<div class="row">
			  <div align="right" class="col-lg-12">
			  <!-- -->
			  <button class="btn btn-blue-o" onclick="javascript:manage_mrktApp__marketManager_futureCustomers_add();"><b>+ Add New Future Customer</b></button>
			  <!-- -->
			  </div><!--/.col-lg-12 -->
			</div><!--/.row -->
			<div class="row">
			  <div id="manage-mrktApp-view-fc-warnErrorMsg" class="col-lg-12"></div><!--/.col-lg-12 -->
			</div><!--/.row -->
			<div class="row">
			  <div class="col-lg-12">
			   <!-- -->
			        <div id= "" class="list-group">
                        <div class="list-group-item">
						    <div class="container-fluid">
							  <div class="row">
								<div class="col-lg-12" style="background-color:#eee;"><h5><b>View Future Customers</b></h5></div>
							  </div><!--/.row -->
							  <div class="row mtop15p">
								<div id="manage-mrktApp-view-fc" class="col-lg-12">
								<!-- -->
								  <!-- -->
								</div><!--/.col-lg-12 -->
							  </div><!--/.row -->
							</div><!--/.container-fluid -->
                        </div><!-- /.list-group-item -->
                    </div><!-- /.list-group -->     
			   <!-- -->
			  </div><!--/.col-lg-12 -->
			</div><!--/.row -->
		</div><!--/.tab-content -->
	<!-- -->
  </div><!--/.col-lg-9 -->
 </div><!--/.row -->
</div><!--/.container-fluid -->


<!-- Create Market Group ::: START -->
<div id="manage-mrktApp-createMrktGrpModal" class="modal fade" role="dialog"></div>
<!-- Create Market Group ::: END -->

<!-- Create Future Customers ::: START -->
<div id="manage-mrktApp-createFCModal" class="modal fade" role="dialog"></div>
<!-- Create Future Customers ::: END -->

<!-- Update Market Group ::: START -->
<div id="manage-mrktApp-updateExistingMrktGrpModal" class="modal fade" role="dialog"></div>
<!-- Update Market Group ::: END -->

<!-- Update Future Customers ::: START -->
<div id="manage-mrktApp-updateExistingFcModal" class="modal fade" role="dialog"></div>
<!-- Update Future Customers ::: END -->