class MrktAppUI{
  ui_mrktApp_marketGroup_add(id){  
   var content='<div class="modal-dialog">';
	   content+='<div class="modal-content">';
       content+='<div class="modal-header modal-header-blue">';
       content+='<button type="button" class="close" data-dismiss="modal">&times;</button>';
       content+='<h4 class="modal-title">Update Market Group</h4>';
       content+='</div>'; // modal-header
       content+='<div class="modal-body">';
       
	   content+='<div class="container-fluid">';
	   content+='<div class="row">';
	   content+='<div class="col-lg-4"></div>';
	   content+='<div class="col-lg-4">';
	   
	   content+='<div id="manage-mrktApp-add-warnErrorMsg" class="form-group"></div>';
	   
	   content+='<div class="form-group">';
	   content+='<label>Market Group</label>'; 
	   content+='<input type="text" id="manage-mrktApp-add-newMrktGrp" class="form-control" placeholder="Enter Market Group"/>';
	   content+='</div>'; // form-group
	   
	   content+='<div align="center" class="form-group">';
	   content+='<button class="btn btn-blue hide-block" onclick="javascript:submit_manage_mrktApp_marketManager_marketGroup_add();"><b>Create Market Group</b></button>';
	   content+='<button class="btn btn-blue-o hide-block" onclick="javascript:reset_manage_mrktApp_marketManager_marketGroup_add();"><b>Reset Market Group Form</b></button>';
	   content+='</div>'; // form-group
	   
	   content+='</div>'; // col-lg-4
	   content+='<div class="col-lg-4"></div>';
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
	     // content+='<td align="right"><b>Actions</b></td>';
	     content+='</tr>';
	     content+='</thead>';
		 content+='<tbody style="height:100px;overflow-y:scroll;">';
     for(var index=0;index<response.length;index++){
	   var mgName = response[index];
	   content+='<tr align="center" onclick="javascript:manage_mrktApp_marketManager_marketGroup_update(\''+mgName+'\');">';
	   content+='<td>'+(index+1)+'</td>';
	   content+='<td>'+mgName+'</td>';
	 //  content+='<td align="right">';
	  // content+='<i class="fa fa-pencil-square-o" aria-hidden="true" ';
	  // content+='></i>';
	  // content+='<i class="fa fa-times-circle" aria-hidden="true"></i>';
	 //  content+='</td>';
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
        content+='<div>Are you sure to delete Market Group <b>"'+mgName+'"</b>?</div>';
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
}
var mrktAppUI = new MrktAppUI();
var manage_mrktApp_htmlElements = { manage_mrktApp_updateExistingMrktGrpModal:'manage-mrktApp-updateExistingMrktGrpModal',
									manage_mrktApp_view_warnErrorMsg:'manage-mrktApp-view-warnErrorMsg',
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
									manage_mrktApp_add_fc_warnErrorMsg:'manage_mrktApp_add_fc_warnErrorMsg',
									manage_mrktApp_add_fc_mobile:'manage-mrktApp-add-fc-mobile',
									manage_mrktApp_add_fc_mrktGrp:'manage-mrktApp-add-fc-mrktGrp',
									manage_mrktApp_update_fc_warnErrorMsg:'manage_mrktApp_update_fc_warnErrorMsg',
									manage_mrktApp_update_fc_mobile:'manage-mrktApp-update-fc-mobile',
									manage_mrktApp_update_fc_mrktGrp:'manage-mrktApp-update-fc-mrktGrp',
									manage_mrktApp_update_fc_mrktGrp_editBtn:'manage-mrktApp-update-fc-mrktGrp-editBtn',
									manage_mrktApp_update_fc_mrktGrp_saveBtn:'manage-mrktApp-update-fc-mrktGrp-saveBtn',
									manage_mrktApp_update_fc_mrktGrp_resetBtn:'manage-mrktApp-update-fc-mrktGrp-resetBtn',
									manage_mrktApp_update_fc_mrktGrp_deleteBtn:'manage-mrktApp-update-fc-mrktGrp-deleteBtn'
								  };
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
function submit_manage_mrktApp_marketManager_marketGroup_add(){
 VALIDATION_MESSAGE_ERROR='Missing ';
 var mrktGrp = $('#'+manage_mrktApp_htmlElements.manage_mrktApp_add_mrktGrp).val();
 if(mrktGrp.length>0){
   mrktAppEndpoints.create_appMrktGrp({ mgName:mrktGrp },function(response){
	   VALIDATION_MESSAGE_ERROR=response.statusDesc;
	   show_validate_msg(response.status.toLowerCase(),manage_mrktApp_htmlElements.manage_mrktApp_add_warnErrorMsg);
	   manage_mrktApp_marketManager_marketGroup_view();
	   $('#'+manage_mrktApp_htmlElements.manage_mrktApp_add_mrktGrp).val('');
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
function manage_mrktApp_marketManager_marketGroup_view(){
  mrktAppUI.ui_mrktApp_marketGroup_view(manage_mrktApp_htmlElements.manage_mrktApp_view_mrktGrp);
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
	show_validate_msg(response.status.toLowerCase(),manage_mrktApp_htmlElements.manage_mrktApp_view_warnErrorMsg);
	manage_mrktApp_marketManager_marketGroup_view();
  });
}
function manage_mrktApp_marketManager_futureCustomers_view(){
  $('#dataTables-example').DataTable({ responsive: true });
}
