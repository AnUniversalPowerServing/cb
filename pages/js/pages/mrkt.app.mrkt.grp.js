var MRKTFC_RESPONSE = {};
class MrktAppUI{
  ui_mrktApp_marketGroup_add(id){  
   var content='<div class="modal-dialog">';
	   content+='<div class="modal-content">';
       content+='<div class="modal-header modal-header-blue">';
       content+='<button type="button" class="close" data-dismiss="modal">&times;</button>';
       content+='<h4 class="modal-title">Add Market Group</h4>';
       content+='</div>'; // modal-header
       content+='<div class="modal-body">';
       
	   content+='<div class="container-fluid">';
	   content+='<div class="row">';
	   content+='<div class="col-lg-12">';
	   
	   content+='<div id="'+manage_mrktApp_htmlElements.manage_mrktApp_add_warnErrorMsg+'" class="form-group"></div>';
	   
	   content+='<div class="form-group">';
	   content+='<label>Market Group</label>'; 
	   content+='<input type="text" id="'+manage_mrktApp_htmlElements.manage_mrktApp_add_mrktGrp+'" class="form-control" placeholder="Enter Market Group"/>';
	   content+='</div>'; // form-group
	   
	   content+='<div align="center" class="form-group">';
	   content+='<button class="btn btn-success-o" onclick="javascript:submit_manage_mrktApp_marketManager_marketGroup_add();"><b>Create Market Group</b></button>';
	   content+='<button class="btn btn-danger-o" onclick="javascript:reset_manage_mrktApp_marketManager_marketGroup_add();"><b>Reset Market Group Form</b></button>';
	   content+='</div>'; // form-group
	   
	   content+='</div>'; // col-lg-12
	   content+='</div>'; // row
	   content+='</div>'; //container-fluid
	   	   
       content+='</div>'; // modal-body
       content+='</div>'; // modal-content
	   content+='</div>'; // modal-dialog
	document.getElementById(id).innerHTML=content;
	$('#'+id).modal();
  }
  ui_mrktApp_marketGroup_update(id, mgName){  
   var content='<div class="modal-dialog">';
	   content+='<div class="modal-content">';
       content+='<div class="modal-header modal-header-blue">';
       content+='<button type="button" class="close" data-dismiss="modal">&times;</button>';
       content+='<h4 class="modal-title">Update Market Group</h4>';
       content+='</div>'; // modal-header
       content+='<div class="modal-body">';
       
	   content+='<div class="container-fluid">';
	   content+='<div class="row">';
	   content+='<div class="col-lg-12">';
	   content+='<div id="manage-mrktApp-update-warnErrorMsg" class="form-group"></div>';
	   content+='</div>';
	   content+='</div>';
	   content+='<div class="row">';
	   content+='<div class="col-lg-12">';
	 
	   content+='<div class="form-group">';
	   content+='<label>Market Group</label>';
	   content+='<input type="hidden" id="manage-mrktApp-update-oldMrktGrp" value="'+mgName+'"/>';   
	   content+='<input type="text" id="manage-mrktApp-update-newMrktGrp" class="form-control" placeholder="Enter Market Group" value="'+mgName+'" disabled/>';
	   content+='</div>'; // form-group
	   
	   content+='<div align="center" class="form-group">';
	   content+='<button id="manage-mrktApp-update-mrktGrp-editBtn" class="btn btn-success-o hide-block" onclick="javascript:enable_manage_mrktApp_marketGroup_update();"><b>Edit Market Group</b></button>';
	   content+='<button id="manage-mrktApp-update-mrktGrp-saveBtn" class="btn btn-success-o hide-block" onclick="javascript:submit_manage_mrktApp_marketManager_marketGroup_update();"><b>Save Market Group</b></button>';
	   content+='<button id="manage-mrktApp-update-mrktGrp-resetBtn" class="btn btn-blue-o hide-block" onclick="javascript:reset_mrktApp_marketManager_marketGroup_update();"><b>Reset Market Group Form</b></button>';
	   content+='<button id="manage-mrktApp-update-mrktGrp-deleteBtn" class="btn btn-danger-o hide-block" onclick="javascript:mrktAppUI.ui_mrktApp_marketGroup_deleteConfirmForm(\''+id+'\');"><b>Delete Market Group</b></button>';
	   content+='</div>'; // form-group
	   
	   content+='</div>'; // col-lg-12
	   content+='</div>'; // row
	   content+='</div>'; //container-fluid
	   	   
       content+='</div>'; // modal-body
       content+='</div>'; // modal-content
	   content+='</div>'; // modal-dialog
	document.getElementById(id).innerHTML=content;
	$('#'+id).modal();
  }
  ui_mrktApp_marketGroup_view(id){
	mrktAppEndpoints.viewInfo_appMrktGrp({},function(response){
	 var content='<div class="table-responsive">';
	     content+='<table id="'+id+'-table" class="table table-striped table-bordered table-hover">';
	     content+='<thead>';
	     content+='<tr align="center">';
	     content+='<td><b>S. No.</b></td>';
	     content+='<td><b>Market Group</b></td>';
	     content+='</tr>';
	     content+='</thead>';
		 content+='<tbody style="height:100px;overflow-y:scroll;">';
     for(var index=0;index<response.length;index++){
	   var mgName = response[index];
	   content+='<tr align="center" onclick="javascript:manage_mrktApp_marketManager_marketGroup_update(\''+mgName+'\');">';
	   content+='<td>'+(index+1)+'</td>';
	   content+='<td>'+mgName+'</td>';
	   content+='</tr>'; 
     }
	   content+='</tbody>';
	   content+='</table>';
	   content+='</div>'; //.table-responsive
	   document.getElementById(id).innerHTML=content;
	   $('#'+id+'-table').DataTable({ "autoWidth": false,responsive: true });
    }); 
  }	
  ui_mrktApp_marketGroup_deleteConfirmForm(id){
	var mgName = $('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_old).val();
	var content='<div class="modal-dialog">';
	    content+='<div class="modal-content">';
        content+='<div class="modal-header modal-header-blue">';
        content+='<button type="button" class="close" data-dismiss="modal">&times;</button>';
        content+='<h4 class="modal-title">Delete Market group</h4>';
        content+='</div>'; // modal-header
        content+='<div align="center" class="modal-body">';
        content+='<div>Are you sure to delete Market Group <b>"'+mgName+'"</b>. Deleting of this Market Group alos deletes the Future Customers added to this Group?</div>';
	    content+='<div class="form-group mtop15p">';
	    content+='<button class="btn btn-success-o" onclick="javascript:submit_mrktApp_marketManager_marketGroup_delete(\''+id+'\',\''+mgName+'\');"><b>Yes</b></button>';
	    content+='<button class="btn btn-danger-o" onclick="javascript:$(\'#'+id+'\').modal(\'hide\');"><b>No</b></button>';
	    content+='</div>'; // form-group
        content+='</div>'; // modal-body
        content+='</div>'; // modal-content
	    content+='</div>'; // modal-dialog
	document.getElementById(id).innerHTML=content;
	$('#'+id).modal();
  }
  ui_mrktApp_futureCustomers_add(id){
   var content='<div class="modal-dialog">';
	   content+='<div class="modal-content">';
       content+='<div class="modal-header modal-header-blue">';
       content+='<button type="button" class="close" data-dismiss="modal">&times;</button>';
       content+='<h4 class="modal-title">Create Future Customer</h4>';
       content+='</div>';
       content+='<div class="modal-body">';
       content+='<div class="container-fluid">';
	   content+='<div class="row">';
	   content+='<div class="col-lg-12 mtop15p">';
	   content+='<div id="manage-mrktApp-add-fc-warnErrorMsg" class="form-group"></div>';
	   content+='<div class="form-group">';
	   content+='<label>Mobile Number</label>';
	   content+='<div class="input-group">';
	   content+='<div class="input-group-btn">';
	   content+='<div class="dropdown">';
	   content+='<button class="btn btn-default dropdown-toggle" style="border-radius:0px;" type="button" data-toggle="dropdown">+91';
	   content+='<span class="caret"></span></button>';
	   content+='<ul class="dropdown-menu">';
	   content+='<li><a href="#">+91</a></li>';
	   content+='</ul>';
	   content+='</div>';
	   content+='</div>';//.input-btn-group
	   content+='<input class="form-control" id="manage-mrktApp-add-fc-mobile" placeholder="Enter Mobile Number">';
	   content+='</div>';//.input-group
	   content+='</div>';//.form-group
	   content+='<div class="form-group">';
	   content+='<label>Market Group</label>';
	   content+='<select id="manage-mrktApp-add-fc-mrktGrp" class="form-control" multiple="multiple"></select>';
	   content+='</div>';
	   content+='<div align="center" class="form-group">';
	   content+='<button class="btn btn-success-o" onclick="javascript:submit_manage_mrktApp_marketManager_futureCustomers_add();"><b>Add Future Customers</b></button>';
	   content+='<button class="btn btn-danger-o" onclick="javascript:reset_manage_mrktApp_marketManager_futureCustomers_add();"><b>Reset Future Customers Form</b></button>';
	   content+='</div>';//.form-group
	   content+='</div>';//.col-lg-12
	   content+='</div>';//.row
	   content+='</div>';//.container-fluid
	   content+='</div>';
       content+='</div>';
       content+='</div>';
   document.getElementById(id).innerHTML=content;
	$('#'+id).modal();
  }
  ui_mrktApp_futureCustomers_view(id){
	mrktAppEndpoints.viewInfo_futureCustomers({},function(response){
	 console.log(response);
	 var content='<table width="100%" class="table table-striped table-bordered table-hover" id="'+id+'-table">';
		 content+='<thead>';
		 content+='<tr>';
		 content+='<th>S.No.</th>';
		 content+='<th>Mobile Number</th>';
		 content+='<th>Market Group</th>';
		 content+='<th>Status</th>';
		 content+='</tr>';
		 content+='</thead>';
		 content+='<tbody>';
	 for(var index=0;index<response.length;index++){
		var mobile = response[index].mobile;
		var mobCode = response[index].mobCode;
		var mrkGrps = response[index].mrkGrps.split(",");
		var isRegistered = response[index].isRegistered;
		MRKTFC_RESPONSE[mobCode+"-"+mobile] = { "mrkGrps": mrkGrps, "isRegistered":isRegistered };
		if(index%2===0){ content+='<tr class="odd gradeX"'; }
		else { content+='<tr class="even gradeC"'; }
		content+=' onclick="javascript:manage_mrktApp_marketManager_futureCustomers_update(\''+mobCode+'\',\''+mobile+'\');">';
		content+='<td>'+(index+1)+'</td>';
		content+='<td>'+mobCode+'-'+mobile+'</td>';
		content+='<td>';
		for(var mrktGrpIndex=0;mrktGrpIndex<mrkGrps.length;mrktGrpIndex++){
		 content+='<div>';
		 if(mrktGrpIndex%2===0){ content+='<span class="label label-primary">'+mrkGrps[mrktGrpIndex]+'</span>'; }
		 else { content+='<span class="label label-warning">'+mrkGrps[mrktGrpIndex]+'</span>'; }
		 content+='</div>';
		}
		content+='</td>';
		content+='<td class="center">';
		if(isRegistered==='Y'){ content+='<div><span class="label label-success">REGISTERED</span></div>'; }
		else { content+='<div><span class="label label-danger">UNREGISTERED</span></div>'; }
		content+='</td>';
		content+='</tr>';
	 }
	    content+='</tbody>';
		content+='</table>';
		document.getElementById(id).innerHTML=content;	
		$('#'+id+'-table').DataTable({ "autoWidth": false,responsive: true });
	});
	
								  
  } 
  ui_mrktApp_futureCustomers_update(id, mobCode,mobile){
	var mrktFcResponse = MRKTFC_RESPONSE;
	var mob = mobCode+"-"+mobile;
	var mrkGrps = mrktFcResponse[mob].mrkGrps;
	var isRegistered = mrktFcResponse[mob].isRegistered;
	var content='<div class="modal-dialog">';
	   content+='<div class="modal-content">';
       content+='<div class="modal-header modal-header-blue">';
       content+='<button type="button" class="close" data-dismiss="modal">&times;</button>';
       content+='<h4 class="modal-title">Update Market Group</h4>';
       content+='</div>'; // modal-header
       content+='<div class="modal-body">';
       
	   content+='<div class="container-fluid">';
	   content+='<div class="row">';
	   content+='<div class="col-lg-12">';
	   content+='<div id="'+manage_mrktApp_htmlElements.manage_mrktApp_update_fc_warnErrorMsg+'" class="form-group"></div>';
	   content+='</div>';
	   content+='</div>';
	   content+='<div class="row">';
	   content+='<div class="col-lg-12">';
	 
	   content+='<div class="form-group">';
	   content+='<label>Mobile Number</label>';
	   content+='<div class="input-group">';
	   content+='<div class="input-group-btn">';
	   content+='<div class="dropdown">';
	   content+='<button class="btn btn-default dropdown-toggle" style="border-radius:0px;" type="button" data-toggle="dropdown">+91';
	   content+='<span class="caret"></span></button>';
	   content+='<ul class="dropdown-menu">';
	   content+='<li><a href="#">+91</a></li>';
	   content+='</ul>';
	   content+='</div>';
	   content+='</div>';
	   content+='<input class="form-control" id="'+manage_mrktApp_htmlElements.manage_mrktApp_update_fc_mobile+'" ';
	   content+='placeholder="Enter Mobile Number" value="'+mobile+'" disabled>';
	   content+='</div>';
	   content+='</div>';
	   
	   content+='<div class="form-group">';
	   content+='<label>Market Group</label>';
	   content+='<select id="'+manage_mrktApp_htmlElements.manage_mrktApp_update_fc_mrktGrp+'" class="form-control" multiple="multiple" disabled>';
						
	   content+='</select>';
	   content+='</div>';
				   
	   content+='<div align="center" class="form-group">';
	   content+='<button id="manage-mrktApp-update-fc-editBtn" class="btn btn-success-o hide-block" onclick="javascript:enable_manage_mrktApp_futureCustomers_update();"><b>Edit Market Group</b></button>';
	   content+='<button id="manage-mrktApp-update-fc-saveBtn" class="btn btn-success-o hide-block" onclick="javascript:submit_manage_mrktApp_marketManager_futureCustomers_update(\''+mobCode+'\',\''+mobile+'\');"><b>Save Market Group</b></button>';
	   content+='<button id="manage-mrktApp-update-fc-resetBtn" class="btn btn-blue-o hide-block" onclick="javascript:reset_manage_mrktApp_marketManager_futureCustomers_update(\''+mobCode+'\',\''+mobile+'\');"><b>Reset Market Group Form</b></button>';
	   content+='<button id="manage-mrktApp-update-fc-deleteBtn" class="btn btn-danger-o hide-block" onclick="javascript:mrktAppUI.ui_mrktApp_futureCustomers_deleteConfirmForm(\''+id+'\',\''+mobCode+'\',\''+mobile+'\');"><b>Delete Market Group</b></button>';
	   content+='</div>'; // form-group
	   
	   content+='</div>'; // col-lg-12
	   content+='</div>'; // row
	   content+='</div>'; //container-fluid
	   	   
       content+='</div>'; // modal-body
       content+='</div>'; // modal-content
	   content+='</div>'; // modal-dialog
	document.getElementById(id).innerHTML=content;
	load_mrktApp_mrktGrp_select(manage_mrktApp_htmlElements.manage_mrktApp_update_fc_mrktGrp,'update',mrkGrps);
	$('#'+id).modal();
  }
  ui_mrktApp_futureCustomers_deleteConfirmForm(id, mobCode, mobile){
	var content='<div class="modal-dialog">';
	    content+='<div class="modal-content">';
        content+='<div class="modal-header modal-header-blue">';
        content+='<button type="button" class="close" data-dismiss="modal">&times;</button>';
        content+='<h4 class="modal-title">Delete Future Customer?</h4>';
        content+='</div>'; // modal-header
        content+='<div align="center" class="modal-body">';
        content+='<div>Are you sure to delete your Future Customer <b>"'+mobCode+'-'+mobile+'"</b>?</div>';
	    content+='<div class="form-group mtop15p">';
	    content+='<button class="btn btn-success-o" ';
		content+='onclick="javascript:submit_mrktApp_marketManager_futureCustomer_delete(\''+id+'\',\''+mobCode+'\',\''+mobile+'\');"><b>Yes</b></button>';
	    content+='<button class="btn btn-danger-o" onclick="javascript:$(\'#'+id+'\').modal(\'hide\');"><b>No</b></button>';
	    content+='</div>'; // form-group
        content+='</div>'; // modal-body
        content+='</div>'; // modal-content
	    content+='</div>'; // modal-dialog
	document.getElementById(id).innerHTML=content;
	$('#'+id).modal();  
  }
}
var mrktAppUI = new MrktAppUI();
var manage_mrktApp_htmlElements = { manage_mrktApp_createMrktGrpModal:'manage-mrktApp-createMrktGrpModal',
									manage_mrktApp_updateExistingMrktGrpModal:'manage-mrktApp-updateExistingMrktGrpModal',
									manage_mrktApp_view_mrktGrp_warnErrorMsg:'manage-mrktApp-view-mrktGrp-warnErrorMsg',
									manage_mrktApp_view_mrktGrp:'manage-mrktApp-view-mrktGrp',
									manage_mrktApp_add_warnErrorMsg:'manage-mrktApp-add-warnErrorMsg', 
									manage_mrktApp_add_mrktGrp:'manage-mrktApp-add-mrktGrp',
									manage_mrktApp_update_warnErrorMsg:'manage-mrktApp-update-warnErrorMsg', 
									manage_mrktApp_update_mrktGrp_editBtn:'manage-mrktApp-update-mrktGrp-editBtn',
									manage_mrktApp_update_mrktGrp_saveBtn:'manage-mrktApp-update-mrktGrp-saveBtn',
									manage_mrktApp_update_mrktGrp_resetBtn:'manage-mrktApp-update-mrktGrp-resetBtn',
									manage_mrktApp_update_mrktGrp_deleteBtn:'manage-mrktApp-update-mrktGrp-deleteBtn',
									manage_mrktApp_update_mrktGrp_old:'manage-mrktApp-update-oldMrktGrp',
									manage_mrktApp_update_mrktGrp_new:'manage-mrktApp-update-newMrktGrp',
									manage_mrktApp_createFCModal:'manage-mrktApp-createFCModal',
									manage_mrktApp_updateExistingFcModal:'manage-mrktApp-updateExistingFcModal',
									manage_mrktApp_view_fc_warnErrorMsg:'manage-mrktApp-view-fc-warnErrorMsg',
									manage_mrktApp_view_fc:'manage-mrktApp-view-fc',
									manage_mrktApp_add_fc_warnErrorMsg:'manage-mrktApp-add-fc-warnErrorMsg',
									manage_mrktApp_add_fc_mobile:'manage-mrktApp-add-fc-mobile',
									manage_mrktApp_add_fc_mrktGrp:'manage-mrktApp-add-fc-mrktGrp',
									manage_mrktApp_update_fc_warnErrorMsg:'manage_mrktApp_update_fc_warnErrorMsg',
									manage_mrktApp_update_fc_mobile:'manage-mrktApp-update-fc-mobile',
									manage_mrktApp_update_fc_mrktGrp:'manage-mrktApp-update-fc-mrktGrp',
									manage_mrktApp_update_fc_editBtn:'manage-mrktApp-update-fc-editBtn',
									manage_mrktApp_update_fc_saveBtn:'manage-mrktApp-update-fc-saveBtn',
									manage_mrktApp_update_fc_resetBtn:'manage-mrktApp-update-fc-resetBtn',
									manage_mrktApp_update_fc_deleteBtn:'manage-mrktApp-update-fc-deleteBtn'
								  };
function manage_mrktApp_marketManager_marketGroup_add(){
 mrktAppUI.ui_mrktApp_marketGroup_add(manage_mrktApp_htmlElements.manage_mrktApp_createMrktGrpModal);
}
function enable_manage_mrktApp_marketGroup_update(){ // Shows Save and Reset Form Button
 document.getElementById(manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_new).disabled=false;
 if(!$('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_editBtn).hasClass('hide-block')){
	$('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_editBtn).addClass('hide-block'); 
 }
 if($('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_saveBtn).hasClass('hide-block')){
	$('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_saveBtn).removeClass('hide-block'); 
 }
 if($('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_resetBtn).hasClass('hide-block')){
	$('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_resetBtn).removeClass('hide-block'); 
 }
 if($('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_deleteBtn).hasClass('hide-block')){
	$('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_deleteBtn).removeClass('hide-block'); 
 }
 
}  
function disable_manage_mrktApp_marketGroup_update(){ // Shows Edit and Reset Form Button
 document.getElementById(manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_new).disabled=true;
 if($('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_editBtn).hasClass('hide-block')){
	$('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_editBtn).removeClass('hide-block'); 
 }
 if(!$('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_saveBtn).hasClass('hide-block')){
	$('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_saveBtn).addClass('hide-block'); 
 }
 if($('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_resetBtn).hasClass('hide-block')){
	$('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_resetBtn).removeClass('hide-block'); 
 }
 if($('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_deleteBtn).hasClass('hide-block')){
	$('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_deleteBtn).removeClass('hide-block'); 
 }
}
function manage_mrktApp_marketManager_marketGroup_view(){
  mrktAppUI.ui_mrktApp_marketGroup_view(manage_mrktApp_htmlElements.manage_mrktApp_view_mrktGrp);
}
function submit_manage_mrktApp_marketManager_marketGroup_add(){
 VALIDATION_MESSAGE_ERROR='Missing ';
 var mrktGrp = $('#'+manage_mrktApp_htmlElements.manage_mrktApp_add_mrktGrp).val();
 if(mrktGrp.length>0){
   mrktAppEndpoints.create_appMrktGrp({ mgName:mrktGrp },function(response){
	   VALIDATION_MESSAGE_ERROR=response.statusDesc;
	   show_validate_msg(response.status.toLowerCase(),manage_mrktApp_htmlElements.manage_mrktApp_add_warnErrorMsg);
	   manage_mrktApp_marketManager_marketGroup_view();
	   $('#'+manage_mrktApp_htmlElements.manage_mrktApp_add_mrktGrp).val('');
	   bootstrap_formField_trigger('remove',manage_mrktApp_htmlElements.manage_mrktApp_add_mrktGrp); 
   }); 
 } else {
	VALIDATION_MESSAGE_ERROR+=' Market Group,'; 
	bootstrap_formField_trigger('error',manage_mrktApp_htmlElements.manage_mrktApp_add_mrktGrp); 
	show_validate_msg('error',manage_mrktApp_htmlElements.manage_mrktApp_add_warnErrorMsg);
 }
}
function reset_manage_mrktApp_marketManager_marketGroup_add(){
  $('#'+manage_mrktApp_htmlElements.manage_mrktApp_add_mrktGrp).val('');
  bootstrap_formField_trigger('remove',manage_mrktApp_htmlElements.manage_mrktApp_add_mrktGrp); 
  document.getElementById(manage_mrktApp_htmlElements.manage_mrktApp_add_warnErrorMsg).innerHTML='';
}
function manage_mrktApp_marketManager_marketGroup_update(mgName){
 mrktAppUI.ui_mrktApp_marketGroup_update(manage_mrktApp_htmlElements.manage_mrktApp_updateExistingMrktGrpModal,mgName);
 disable_manage_mrktApp_marketGroup_update();
}
function submit_manage_mrktApp_marketManager_marketGroup_update(){
 var old_mrktGrp = $('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_old).val().toUpperCase();
 var new_mrktGrp = $('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_new).val().toUpperCase();
 if(new_mrktGrp.length>0){
   mrktAppEndpoints.update_appMrktGrp({ old_mgName:old_mrktGrp, new_mgName:new_mrktGrp },function(response){
	   $('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_old).val(new_mrktGrp);
	   manage_mrktApp_marketManager_marketGroup_view();
	   disable_manage_mrktApp_marketGroup_update();
	   VALIDATION_MESSAGE_ERROR=response.statusDesc;
	   show_validate_msg(response.status.toLowerCase(),manage_mrktApp_htmlElements.manage_mrktApp_update_warnErrorMsg);
   });
 } else {
	VALIDATION_MESSAGE_ERROR+=' Market Group,'; 
	bootstrap_formField_trigger('error',manage_mrktApp_htmlElements.manage_mrktApp_add_mrktGrp); 
 }
}
function reset_mrktApp_marketManager_marketGroup_update(){
 var oldMrktGrp = $('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_old).val();
 $('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_mrktGrp_new).val(oldMrktGrp);
 document.getElementById(manage_mrktApp_htmlElements.manage_mrktApp_update_warnErrorMsg).innerHTML='';
 disable_manage_mrktApp_marketGroup_update();
}
function submit_mrktApp_marketManager_marketGroup_delete(id,mgName){
  mrktAppEndpoints.delete_appMrktGrp({mgName:mgName},function(response){
	$('#'+id).modal('hide');
	VALIDATION_MESSAGE_ERROR=response.statusDesc;
	show_validate_msg(response.status.toLowerCase(),manage_mrktApp_htmlElements.manage_mrktApp_view_mrktGrp_warnErrorMsg);
	manage_mrktApp_marketManager_marketGroup_view();
  });
}

function manage_mrktApp__marketManager_futureCustomers_add(){ 
 mrktAppUI.ui_mrktApp_futureCustomers_add(manage_mrktApp_htmlElements.manage_mrktApp_createFCModal);
 load_mrktApp_mrktGrp_select(manage_mrktApp_htmlElements.manage_mrktApp_add_fc_mrktGrp,'add',null);
}
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
 console.log("selectedValues: "+selectedValues);
 if(selectedValues!==null){
 var selVal = selectedValues.toString().split(",");
 for(var optIndex=0;optIndex<options.length;optIndex++){
  for(var valIndex=0;valIndex<selVal.length;valIndex++){
	if(options[optIndex].value === selVal[valIndex]){ options[optIndex].selected = true; }
  } 
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
function manage_mrktApp_marketManager_futureCustomers_update(mobCode,mobile){
 console.log("MRKTFC_RESPONSE: "+JSON.stringify(MRKTFC_RESPONSE));
 mrktAppUI.ui_mrktApp_futureCustomers_update(manage_mrktApp_htmlElements.manage_mrktApp_updateExistingFcModal,mobCode,mobile);
 disable_manage_mrktApp_futureCustomers_update();
}
function submit_manage_mrktApp_marketManager_futureCustomers_update(mobCode,mobile){
 disable_manage_mrktApp_futureCustomers_update();
 var mob = mobCode+"-"+mobile;
 var mrktGrp = $('#'+manage_mrktApp_htmlElements.manage_mrktApp_update_fc_mrktGrp).val();
 if(mrktGrp.length>0){
   mrktAppEndpoints.update_futureCustomer({ mob_code:'+91', mobileNumber:mobile, mgNames:mrktGrp },function(response){
	   manage_mrktApp_marketManager_futureCustomers_view();
	   disable_manage_mrktApp_futureCustomers_update();
	   VALIDATION_MESSAGE_ERROR=response.statusDesc;
	   show_validate_msg(response.status.toLowerCase(),manage_mrktApp_htmlElements.manage_mrktApp_update_fc_warnErrorMsg);
	   bootstrap_formField_trigger(response.status.toLowerCase(),manage_mrktApp_htmlElements.manage_mrktApp_update_fc_mobile); 
	   bootstrap_formField_trigger(response.status.toLowerCase(),manage_mrktApp_htmlElements.manage_mrktApp_update_fc_mrktGrp); 
	   MRKTFC_RESPONSE[mob].mrkGrps = mrktGrp;
	   console.log("MRKTFC_RESPONSE: "+JSON.stringify(MRKTFC_RESPONSE));
   });
 } else {
	VALIDATION_MESSAGE_ERROR+=' Market Group,'; 
	bootstrap_formField_trigger('error',manage_mrktApp_htmlElements.manage_mrktApp_update_fc_mrktGrp); 
 }
}
function reset_manage_mrktApp_marketManager_futureCustomers_update(mobCode,mobile){
 disable_manage_mrktApp_futureCustomers_update();
 var mob = mobCode+"-"+mobile;
 var mrktFcResponse = MRKTFC_RESPONSE;
 var mrkGrps = mrktFcResponse[mob].mrkGrps;
 var isRegistered = mrktFcResponse[mob].isRegistered;
 bootstrap_formField_trigger('remove',manage_mrktApp_htmlElements.manage_mrktApp_update_fc_mobile); 
 bootstrap_formField_trigger('remove',manage_mrktApp_htmlElements.manage_mrktApp_update_fc_mrktGrp); 
 load_mrktApp_mrktGrp_select(manage_mrktApp_htmlElements.manage_mrktApp_update_fc_mrktGrp,'update',mrkGrps);
 document.getElementById(manage_mrktApp_htmlElements.manage_mrktApp_update_fc_warnErrorMsg).innerHTML='';
 console.log("MRKTFC_RESPONSE: "+JSON.stringify(MRKTFC_RESPONSE));
}
function submit_mrktApp_marketManager_futureCustomer_delete(id, mobCode, mobile){
 $('#'+id).modal('hide');
  mrktAppEndpoints.delete_futureCustomer({mob_code:mobCode,mobileNumber:mobile},function(response){
	 
	 VALIDATION_MESSAGE_ERROR=response.statusDesc;
	  show_validate_msg(response.status.toLowerCase(),manage_mrktApp_htmlElements.manage_mrktApp_view_fc_warnErrorMsg);
	  manage_mrktApp_marketManager_futureCustomers_view();
 });
}

