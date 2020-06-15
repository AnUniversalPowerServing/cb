<script type="text/javascript">
function enable_manage_mrktApp_futureCustomers_update(){ // Shows Save and Reset Form Button
 document.getElementById(manage_mrktApp_htmlElements.manage_mrktApp_update_fc_mrktGrp).disabled=false;
 if(!$('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_fc_editBtn).hasClass('hide-block')){
	$('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_fc_editBtn).addClass('hide-block'); 
 }
 if($('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_fc_saveBtn).hasClass('hide-block')){
	$('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_fc_saveBtn).removeClass('hide-block'); 
 }
 if($('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_fc_resetBtn).hasClass('hide-block')){
	$('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_fc_resetBtn).removeClass('hide-block'); 
 }
 if($('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_fc_deleteBtn).hasClass('hide-block')){
	$('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_fc_deleteBtn).removeClass('hide-block'); 
 }
 
}  
function disable_manage_mrktApp_futureCustomers_update(){ // Shows Edit and Reset Form Button
 document.getElementById(manage_mrktApp_htmlElements.manage_mrktApp_update_fc_mrktGrp).disabled=true;
 if($('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_fc_editBtn).hasClass('hide-block')){
	$('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_fc_editBtn).removeClass('hide-block'); 
 }
 if(!$('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_fc_saveBtn).hasClass('hide-block')){
	$('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_fc_saveBtn).addClass('hide-block'); 
 }
 if($('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_fc_resetBtn).hasClass('hide-block')){
	$('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_fc_resetBtn).removeClass('hide-block'); 
 }
 if($('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_fc_deleteBtn).hasClass('hide-block')){
	$('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_fc_deleteBtn).removeClass('hide-block'); 
 }
}
function load_mrktApp_mrktGrp_select(id,mode,selectedValues){
 mrktAppEndpoints.viewInfo_appMrktGrp({},function(response){
   var content='';
   for(var index=0;index<response.length;index++){
	 content+='<option value="'+response[index]+'">'+response[index]+'</option>';
   }
   document.getElementById(id).innerHTML=content;
   if(mode==='update'){ choose_mrktApp_mrktGrp_select(id,selectedValues); }
 });
}
function choose_mrktApp_mrktGrp_select(id,selectedValues){
 var options = document.getElementById(id).options;
 var selVal = selectedValues.split(",");
 for(var optIndex=0;optIndex<options.length;optIndex++){
  for(var valIndex=0;valIndex<selVal.length;valIndex++){
	if(options[optIndex].value === selVal[valIndex]){ options[optIndex].selected = true; }
  } 
 }
}
function manage_mrktApp_marketManager_futureCustomers_view(){
 mrktAppUI.ui_mrktApp_futureCustomers_view(manage_mrktApp_htmlElements.manage_mrktApp_view_fc);
}
function submit_manage_mrktApp_marketManager_futureCustomers_add(){
 VALIDATION_MESSAGE_ERROR='Missing ';
 var mobile = $('#'+manage_mrktApp_htmlElements.manage_mrktApp_add_fc_mobile).val();
 var mrktGrp = $('#'+manage_mrktApp_htmlElements.manage_mrktApp_add_fc_mrktGrp).val();
 console.log("mobile: "+mobile);
 console.log("mrktGrp: "+mrktGrp);
 if(mrktGrp.length>0 && mobile.length>0){
	mrktAppEndpoints.create_futureCustomer({ mob_code:'+91',mobileNumber:mobile,mgName:mrktGrp },function(response){
	   VALIDATION_MESSAGE_ERROR=response.statusDesc;
	   show_validate_msg(response.status.toLowerCase(),manage_mrktApp_htmlElements.manage_mrktApp_add_fc_warnErrorMsg);
	   manage_mrktApp_marketManager_futureCustomers_view();
	   $('#'+manage_mrktApp_htmlElements.manage_mrktApp_add_fc_mobile).val('');
	   $('#'+manage_mrktApp_htmlElements.manage_mrktApp_add_fc_mrktGrp).val('');
   });
 } else {
	if(mobile.length==0){
	  VALIDATION_MESSAGE_ERROR+=' Mobile,'; 
	  bootstrap_formField_trigger('error',manage_mrktApp_htmlElements.manage_mrktApp_add_fc_mobile); 
	  show_validate_msg('error',manage_mrktApp_htmlElements.manage_mrktApp_add_fc_warnErrorMsg);
	}
	else if(mrktGrp.length==0){
	  VALIDATION_MESSAGE_ERROR+=' Market Group,'; 
	  bootstrap_formField_trigger('error',manage_mrktApp_htmlElements.manage_mrktApp_add_fc_mrktGrp); 
	  show_validate_msg('error',manage_mrktApp_htmlElements.manage_mrktApp_add_fc_warnErrorMsg);
	}
 }
 
 // manage_mrktApp_add_fc_warnErrorMsg:'manage_mrktApp_add_fc_warnErrorMsg',
 // manage_mrktApp_add_fc_mobile:'manage-mrktApp-add-fc-mobile',
 // manage_mrktApp_add_fc_mrktGrp:'manage-mrktApp-add-fc-mrktGrp',
 // manage_mrktApp_update_fc_warnErrorMsg:'manage_mrktApp_update_fc_warnErrorMsg',
 // manage_mrktApp_update_fc_mobile:'manage-mrktApp-update-fc-mobile',
 // manage_mrktApp_update_fc_mrktGrp:'manage-mrktApp-update-fc-mrktGrp',
 // manage_mrktApp_update_fc_mrktGrp_editBtn:'manage-mrktApp-update-fc-mrktGrp-editBtn',
 // manage_mrktApp_update_fc_mrktGrp_saveBtn:'manage-mrktApp-update-fc-mrktGrp-saveBtn',
 // manage_mrktApp_update_fc_mrktGrp_resetBtn:'manage-mrktApp-update-fc-mrktGrp-resetBtn',
 // manage_mrktApp_update_fc_mrktGrp_deleteBtn:'manage-mrktApp-update-fc-mrktGrp-deleteBtn'
}
function reset_manage_mrktApp_marketManager_futureCustomers_add(){
 document.getElementById(manage_mrktApp_htmlElements.manage_mrktApp_add_fc_warnErrorMsg).innerHTML='';
 $('#'+manage_mrktApp_htmlElements.manage_mrktApp_add_fc_mobile).val('');
 $('#'+manage_mrktApp_htmlElements.manage_mrktApp_add_fc_mrktGrp).val('');
}
function manage_mrktApp_marketManager_futureCustomers_update(index){
 mrktAppUI.ui_mrktApp_futureCustomers_update(manage_mrktApp_htmlElements.manage_mrktApp_updateExistingFcModal,index);
 disable_manage_mrktApp_futureCustomers_update();
}
function submit_manage_mrktApp_marketManager_futureCustomers_update(){
	
}
function reset_manage_mrktApp_marketManager_futureCustomers_update(){
	
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
			  <button class="btn btn-blue-o" data-toggle="modal" data-target="#createFutureCustomersModal"
			  onclick="javascript:load_mrktApp_mrktGrp_select('manage-mrktApp-add-fc-mrktGrp','add',null);"><b>+ Add New Future Customer</b></button>
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
				   
				   <div id="manage-mrktApp-add-fc-warnErrorMsg" class="form-group"></div>  
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
					 <input class="form-control" id="manage-mrktApp-add-fc-mobile" placeholder="Enter Mobile Number">
			        </div><!--/.input-group -->
					<!-- -->
				   </div><!--/.form-group -->
				   
				   <div class="form-group">
					<label>Market Group</label>
					<select id="manage-mrktApp-add-fc-mrktGrp" class="form-control" multiple="multiple">
						<option value="cheese">Cheese</option>
						<option value="tomatoes">Tomatoes</option>
						<option value="mozarella">Mozzarella</option>
						<option value="mushrooms">Mushrooms</option>
						<option value="pepperoni">Pepperoni</option>
						<option value="onions">Onions</option>
					</select>
				   </div>

				   <div align="center" class="form-group">
					<button class="btn btn-success-o" onclick="javascript:submit_manage_mrktApp_marketManager_futureCustomers_add();"><b>Add Future Customers</b></button>
					<button class="btn btn-danger-o" onclick="javascript:reset_manage_mrktApp_marketManager_futureCustomers_add();"><b>Reset Future Customers Form</b></button>
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

<!-- Update Market Group ::: START -->
<div id="manage-mrktApp-updateExistingMrktGrpModal" class="modal fade" role="dialog"></div>
<!-- Update Market Group ::: END -->

<!-- Update Future Customers ::: START -->
<div id="manage-mrktApp-updateExistingFcModal" class="modal fade" role="dialog"></div>
<!-- Update Future Customers ::: END -->