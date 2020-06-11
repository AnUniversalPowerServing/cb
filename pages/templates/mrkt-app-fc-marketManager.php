<script type="text/javascript">
function submit_manage_mrktApp_marketManager_marketGroup_add(){
// manage_mrktApp_htmlElements.manage_mrktApp_add_fc_warnErrorMsg
 var mobile = $('#'+manage_mrktApp_htmlElements.manage_mrktApp_add_fc_mobile).val();
 var mrktGrp = $('#'+manage_mrktApp_htmlElements.manage_mrktApp_add_fc_mrktGrp).val();
 
//	manage_mrktApp_htmlElements.manage_mrktApp_update_fc_warnErrorMsg
//	manage_mrktApp_htmlElements.manage_mrktApp_update_fc_mobile
//	manage_mrktApp_htmlElements.manage_mrktApp_update_fc_mrktGrp
//	manage_mrktApp_htmlElements.manage_mrktApp_update_fc_mrktGrp_editBtn
//	manage_mrktApp_htmlElements.manage_mrktApp_update_fc_mrktGrp_saveBtn
//	manage_mrktApp_htmlElements.manage_mrktApp_update_fc_mrktGrp_resetBtn
//	manage_mrktApp_htmlElements.manage_mrktApp_update_fc_mrktGrp_deleteBtn
}
function reset_manage_mrktApp_marketManager_marketGroup_add(){
 var mobile = $('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_fc_mobile).val();
 var mrktGrp = $('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_fc_mrktGrp).val();	
}
function submit_manage_mrktApp_marketManager_marketGroup_update(){
	
}
function reset_manage_mrktApp_marketManager_marketGroup_update(){
	
}
</script>
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
			
			   <div class="col-lg-12">
			     <!-- -->
			     <div class="col-lg-12" style="background-color:#eee;"><h5><b>View Market Group</b></h5></div>
				 <div id="manage-mrktApp-view-warnErrorMsg" class="col-lg-12 mtop15p"></div>
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
			  <button class="btn btn-blue-o" data-toggle="modal" data-target="#createFutureCustomersModal"><b>+ Add New Future Customer</b></button>
			  <!-- -->
			  </div><!--/.col-lg-12 -->
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
								<div class="col-lg-12">
								<!-- -->
								    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
										<thead>
											<tr>
												<th>S.No.</th>
												<th>Mobile Number</th>
												<th>Market Group</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<tr class="odd gradeX">
												<td>1</td>
												<td>+91-9160869337</td>
												<td>
												    <div><span class="label label-primary">MARKET GROUP #1</span></div>
												    <div><span class="label label-success">MARKET GROUP #2</span></div>
												</td>
												<td class="center">
												   <div><span class="label label-success">REGISTERED</span></div>
												   <div><span class="label label-success">ANDROID APP</span></div>
												</td>
											</tr>
											<tr class="even gradeC">
												<td>1</td>
												<td>+91-6300193369</td>
												<td>
												    <div><span class="label label-primary">MARKET GROUP #1</span></div>
												    <div><span class="label label-success">MARKET GROUP #2</span></div>
												</td>
												<td class="center">
												   <div><span class="label label-danger">UNREGISTERED</span></div>
												</td>
											</tr>
										</tbody>
									</table><!-- /.table-responsive -->
								  <!-- -->
								</div><!--/.col-lg-12 -->
							  </div><!--/.row -->
							</div><!--/.container-fluid -->
                        </div><!-- /.list-group-item -->
                    </div><!-- /.list-group -->     
			   <!-- -->
			  </div><!--/.col-lg-12 -->
			</div><!--/.row -->
			
<!-- Modal ::: START -->
<div id="createFutureCustomersModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header modal-header-blue">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create Future Customer</h4>
      </div>
      <div class="modal-body">
        <!-- -->
		<div class="container-fluid">
		  <div class="row">
				 <div class="col-lg-12 mtop15p">
				   
				   <div class="form-group">
					<label>Mobile Number</label>
				    <!-- -->
				    <div class="input-group">
					 <div class="input-group-btn">
					  <!-- -->
					  <div class="dropdown">
						<button class="btn btn-default dropdown-toggle" style="border-radius:0px;" type="button" data-toggle="dropdown">+91
						<span class="caret"></span></button>
						<ul class="dropdown-menu">
						  <li><a href="#">+91</a></li>
						</ul>
					  </div>
					  <!-- -->
					 </div><!--/.input-btn-group -->
					 <input class="form-control" placeholder="Enter Mobile Number">
			        </div><!--/.input-group -->
					<!-- -->
				   </div><!--/.form-group -->
				   
				   <div class="form-group">
					<label>Market Group</label>
					<select id="dates-field2" class="form-control" multiple="multiple">
						<option value="cheese">Cheese</option>
						<option value="tomatoes">Tomatoes</option>
						<option value="mozarella">Mozzarella</option>
						<option value="mushrooms">Mushrooms</option>
						<option value="pepperoni">Pepperoni</option>
						<option value="onions">Onions</option>
					</select>
				   </div>

				   <div align="center" class="form-group">
					<button class="btn btn-success-o"><b>Add Future Customers</b></button>
					<button class="btn btn-danger-o"><b>Reset Future Customers Form</b></button>
				   </div><!--/.form-group -->
				   
			     </div><!--/.col-lg-12 -->
		  </div><!--/.row -->
		</div><!--/.container-fluid -->
		<!-- -->
      </div>
    </div>

  </div>
</div>
<!-- Modal ::: END -->
		</div><!--/.tab-content -->
	<!-- -->
  </div><!--/.col-lg-9 -->
  
  <div class="col-lg-4">
    <!-- -->
	
	
	

	<!-- -->
  </div><!--/.col-lg-4 -->
	
  
 </div><!--/.row -->

</div><!--/.container-fluid -->

<!-- Update App Config ::: START -->
<div id="manage-mrktApp-updateExistingMrktGrpModal" class="modal fade" role="dialog"></div>
<!-- Update App Config ::: END -->