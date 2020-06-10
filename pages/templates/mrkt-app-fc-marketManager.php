<script type="text/javascript">
function enable_manage_mrktApp_mrktGrp_update(){ // Shows Save and Reset Form Button
 document.getElementById(manage_mrktApp_htmlElements.manage_mrktApp_update_newMrktGrp).disabled=false;
 if(!$('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_editBtn).hasClass('hide-block')){
	$('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_editBtn).addClass('hide-block'); 
 }
 if($('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_saveBtn).hasClass('hide-block')){
	$('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_saveBtn).removeClass('hide-block'); 
 }
 if($('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_resetBtn).hasClass('hide-block')){
	$('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_resetBtn).removeClass('hide-block'); 
 }
}  
function disable_manage_mrktApp_mrktGrp_update(){ // Shows Edit and Reset Form Button
 document.getElementById(manage_mrktApp_htmlElements.manage_mrktApp_update_newMrktGrp).disabled=true;
 if($('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_editBtn).hasClass('hide-block')){
	$('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_editBtn).removeClass('hide-block'); 
 }
 if(!$('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_saveBtn).hasClass('hide-block')){
	$('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_saveBtn).addClass('hide-block'); 
 }
 if($('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_resetBtn).hasClass('hide-block')){
	$('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_resetBtn).removeClass('hide-block'); 
 }
}
class MrktAppUI{
  ui_mrktApp_mrktGrp_update(id, mgName){  
   var content='<div class="modal-dialog">';
	   content+='<div class="modal-content">';
       content+='<div class="modal-header modal-header-blue">';
       content+='<button type="button" class="close" data-dismiss="modal">&times;</button>';
       content+='<h4 class="modal-title">Update Market Group</h4>';
       content+='</div>'; // modal-header
       content+='<div class="modal-body">';
       
	   content+='<div id="manage-mrktApp-update-warnErrorMsg" class="form-group"></div>';
	   
	   content+='<div class="form-group">';
	   content+='<label>Market Group</label>';
	   content+='<input type="hidden" id="manage-mrktApp-update-oldMrktGrp" value="'+mgName+'"/>';   
	   content+='<input type="text" id="manage-mrktApp-update-newMrktGrp" class="form-control" placeholder="Enter Market Group" value="'+mgName+'" disabled/>';
	   content+='</div>'; // form-group
	   
	   content+='<div align="center" class="form-group">';
	   content+='<button id="manage-mrktApp-update-mrktGrp-editBtn" class="btn btn-blue hide-block" onclick="javascript:enable_manage_mrktApp_mrktGrp_update();"><b>Edit Market Group</b></button>';
	   content+='<button id="manage-mrktApp-update-mrktGrp-saveBtn" class="btn btn-blue hide-block" onclick="javascript:submit_manage_mrktApp_update();"><b>Save Market Group</b></button>';
	   content+='<button id="manage-mrktApp-update-mrktGrp-resetBtn" class="btn btn-blue-o hide-block"><b>Reset Market Group Form</b></button>';
	   content+='</div>'; // form-group
	   
       content+='</div>'; // modal-body
       content+='</div>'; // modal-content
	   content+='</div>'; // modal-dialog
	document.getElementById(id).innerHTML=content;
	$('#'+id).modal();
  }
  ui_mrktApp_mrktGrp_view(id){
	mrktAppEndpoints.viewInfo_appMrktGrp({},function(response){
	 var content='<div class="table-responsive">';
	     content+='<table class="table">';
	     content+='<thead>';
	     content+='<tr align="center">';
	     content+='<td><b>S. No.</b></td>';
	     content+='<td><b>Market Group</b></td>';
	     content+='<td align="right"><b>Actions</b></td>';
	     content+='</tr>';
	     content+='</thead>';
		 content+='<tbody>';
     for(var index=0;index<response.length;index++){
	   var mgName = response[index];
	   content+='<tr align="center">';
	   content+='<td>'+(index+1)+'</td>';
	   content+='<td>'+mgName+'</td>';
	   content+='<td align="right">';
	   content+='<i class="fa fa-pencil-square-o" aria-hidden="true" ';
	   content+='onclick="javascript:manage_mrktApp_marketManager_marketGroup_update(\''+mgName+'\');"></i>';
	   content+='<i class="fa fa-times-circle" aria-hidden="true"></i>';
	   content+='</td>';
	   content+='</tr>'; 
     }
	   content+='</tbody>';
	   content+='</table>';
	   content+='</div>'; //.table-responsive
	   document.getElementById(id).innerHTML=content;
    }); 
  }
	
}
var mrktAppUI = new MrktAppUI();
var manage_mrktApp_htmlElements = { manage_mrktApp_updateExistingMrktGrpModal:'manage-mrktApp-updateExistingMrktGrpModal',
									manage_mrktApp_view_mrktGrp:'manage-mrktApp-view-mrktGrp',
									manage_mrktApp_add_warnErrorMsg:'manage-mrktApp-add-warnErrorMsg', 
									manage_mrktApp_add_mrktGrp:'manage-mrktApp-add-mrktGrp',
									manage_mrktApp_update_warnErrorMsg:'manage-mrktApp-update-warnErrorMsg', 
									manage_mrktApp_update_mrktGrp:'manage-mrktApp-update-mrktGrp',
									manage_mrktApp_update_mrktGrp_editBtn:'manage-mrktApp-update-mrktGrp-editBtn',
									manage_mrktApp_update_mrktGrp_saveBtn:'manage-mrktApp-update-mrktGrp-saveBtn',
									manage_mrktApp_update_mrktGrp_resetBtn:'manage-mrktApp-update-mrktGrp-resetBtn',
									manage_mrktApp_update_oldMrktGrp:'manage-mrktApp-update-oldMrktGrp',
									manage_mrktApp_update_newMrktGrp:'manage-mrktApp-update-newMrktGrp'
								  }

function manage_mrktApp_marketManager_marketGroup_add(){
 var mrktGrp = $('#'+manage_mrktApp_htmlElements.manage_mrktApp_add_mrktGrp).val();
 if(mrktGrp.length>0){
   mrktAppEndpoints.create_appMrktGrp({ mgName:mrktGrp },function(response){
	   VALIDATION_MESSAGE_ERROR=response.statusDesc;
	   show_validate_msg(response.status.toLowerCase(),manage_mrktApp_htmlElements.manage_mrktApp_add_warnErrorMsg);
   }); 
 } else {
	VALIDATION_MESSAGE_ERROR+=' Market Group,'; 
	bootstrap_formField_trigger('error',manage_mrktApp_htmlElements.manage_mrktApp_add_mrktGrp); 
 }
}

function manage_mrktApp_marketManager_marketGroup_update(mgName){
 mrktAppUI.ui_mrktApp_mrktGrp_update(manage_mrktApp_htmlElements.manage_mrktApp_updateExistingMrktGrpModal,mgName);
 disable_manage_mrktApp_mrktGrp_update();
}

function manage_mrktApp_marketManager_marketGroup_view(){
  mrktAppUI.ui_mrktApp_mrktGrp_view(manage_mrktApp_htmlElements.manage_mrktApp_view_mrktGrp);
}
function submit_manage_mrktApp_update(){
 var old_mrktGrp = $('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_oldMrktGrp).val().toUpperCase();
 var new_mrktGrp = $('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_newMrktGrp).val().toUpperCase();
 if(new_mrktGrp.length>0){
   mrktAppEndpoints.update_appMrktGrp({ old_mgName:old_mrktGrp, new_mgName:new_mrktGrp },function(response){
	   $('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_oldMrktGrp).val(new_mrktGrp);
	   manage_mrktApp_marketManager_marketGroup_view();
	   disable_manage_mrktApp_mrktGrp_update();
	   VALIDATION_MESSAGE_ERROR=response.statusDesc;
	   show_validate_msg(response.status.toLowerCase(),manage_mrktApp_htmlElements.manage_mrktApp_update_warnErrorMsg);
   });
 } else {
	VALIDATION_MESSAGE_ERROR+=' Market Group,'; 
	bootstrap_formField_trigger('error',manage_mrktApp_htmlElements.manage_mrktApp_add_mrktGrp); 
 }
}

function manage_mrktApp_marketManager_futureCustomers_view(){
  $('#dataTables-example').DataTable({ responsive: true });
}
$(document).ready(function(){
	
});
</script>
<div class="container-fluid">

 <div class="row">
 
  <div class="col-lg-3">
    <!-- -->
	<ul class="nav nav-pills nav-stacked">
	  <li class="active"><a data-toggle="tab" href="#marketGroup" 
	  onclick="javascript:manage_mrktApp_marketManager_marketGroup_view();"><b>Market Group</b></a></li>
	  <li><a data-toggle="tab" href="#futureCustomers" 
	  onclick="javascript:manage_mrktApp_marketManager_futureCustomers_view();"><b>Future Customers</b></a></li>
	</ul>
	<!-- -->
  </div><!--/.col-lg-3 -->
  
  <div class="col-lg-9">
	<!-- -->
		<div class="tab-content">
		  <div id="marketGroup" class="tab-pane fade in active">
			<!-- -->
			<div class="row">
			   <div class="col-lg-6">
			     <!-- -->
			     <div class="col-lg-12" style="background-color:#eee;"><h5><b>CREATE NEW MARKET GROUP</b></h5></div>
				 <div class="col-lg-12 mtop15p">
				   
				   <div id="manage-mrktApp-add-warnErrorMsg" class="form-group"></div>
				   
				   <div class="form-group">
					<label>Market Group</label>
					<input id="manage-mrktApp-add-mrktGrp" type="text" class="form-control" placeholder="Enter Market Group"/>
				   </div><!--/.form-group -->
				   
				   <div class="form-group">
					<button class="btn btn-success form-control" 
					onclick="javascript:manage_mrktApp_marketManager_marketGroup_add();"><b>Create Market Group</b></button>
				   </div><!--/.form-group -->
				   
			     </div><!--/.col-lg-12 -->
				 <!-- -->
			   </div><!--/.col-lg-6 -->
			   <div class="col-lg-6">
			     <!-- -->
			     <div class="col-lg-12" style="background-color:#eee;"><h5><b>OTHER MARKET GROUP</b></h5></div>
				 <div id="manage-mrktApp-view-mrktGrp" class="col-lg-12 mtop15p">
				   <!-- -->
				   
				   <!-- -->
			     </div><!--/.col-lg-12 -->
				 <!-- -->
			   </div><!--/.col-lg-6 -->
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
					<select class="form-control" multiple>
					  <option value="">Market Group #1</option>
					  <option value="">Market Group #2</option>
					</select>
				   </div><!--/.form-group -->

				   <div class="form-group">
					<button class="btn btn-success form-control"><b>Add Future Customers</b></button>
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