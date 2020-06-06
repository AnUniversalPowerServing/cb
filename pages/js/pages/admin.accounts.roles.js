
// Purple, Navy Blue, Browish-Red, Browish, Blue, Pale-Green,  Dark-Grey, Orange, Grey, Pink
var darkColors = ["#6B5B95","#31708F","#B35048","#8B6F47","#0388C3","#009688","#607D8B","#CC7900","#656363", "#A9345C"];

class AdminAccountsRolesData {
	
  adminRolesResponse = {};
  
  constructor() {
	 console.log(this.adminRolesResponse);
  }
  
  get_adminRolesResponse(){
	return this.adminRolesResponse;
  }
  
  set_adminRolesResponse(response){
	this.adminRolesResponse = response;
  }
}

class AdminAccountsRolesUI {
	
  ui_adminRoles_view(id){
    adminRolesEndpoints.viewInfo_accountRoles({},function(response){
	 var content='';
	 var colorIndex = 0;
	 adminAccountsRolesData.set_adminRolesResponse(response);
	 for(var index=0;index<response.length;index++){  
	  if(darkColors.length === colorIndex){ colorIndex = 0; }
	  content+='<div class="col-lg-4">';
	  content+='<div class="list-group">';
	  content+='<div class="list-group-item" style="background-color:'+darkColors[colorIndex]+';color:#fff;">';
	  content+='<b>'+response[index].role+'</b> <span class="pull-right">';
	  content+='<i class="fa fa-edit curpoint" onclick="javascript:adminAccountsRolesUI.ui_adminRoles_updateForm(\'manage-adminRoles-updateExistingRoleModal\','+index+');"></i>';
	  content+='&nbsp;&nbsp;&nbsp;<i class="fa fa-close curpoint" onclick="javascript:adminAccountsRolesUI.ui_adminRoles_deleteForm(\'manage-adminRoles-deleteExistingRoleModal\','+index+');"></i></span>';
	  content+='</div>';//.list-group-item
	  content+='<div class="list-group-item" style="background-color:#e4d1d1;">'+response[index].roleDesc+'</div>';//.list-group-item
	  content+='</div>'; //.list-group
	  content+='</div>';//.col-lg-4
	  colorIndex++;
	 }	
	 document.getElementById(id).innerHTML=content;
	});
  }
  
  ui_adminRoles_deleteForm(id,index){
	var adminRolesResponse = adminAccountsRolesData.get_adminRolesResponse();
	var content='<div class="modal-dialog">';
		content+='<div class="modal-content">';
		content+='<div class="modal-header modal-header-blue">';
		content+='<button type="button" class="close" data-dismiss="modal">&times;</button>';
		content+='<h4 class="modal-title">Delete User Role</h4>';
		content+='</div>'; // modal-header
		content+='<div class="modal-body pad0">';
		content+='<div class="container-fluid mtop15p mbot15p">';
		content+='<div class="row">';
		content+='<div class="col-lg-12">';
		content+='<div align="center">Are you sure to delete User Role <b>"'+adminRolesResponse[index].role+'"</b> ?</div>';	
		content+='<div class="alert alert-info mtop15p">';
	    content+='<strong>Note!</strong> Deleting a User Role will also deletes all the User Accounts created with this Role.';
		content+='</div>';
		content+='<div align="center">';
		content+='<button class="btn btn-blue" onclick="javascript:submit_manage_adminRoles_delete('+adminRolesResponse[index].role_Id+',\''+adminRolesResponse[index].role+'\');"><b>Yes</b></button>';
		content+='<button class="btn btn-blue-o" onclick="javascript:$(\'#'+id+'\').modal(\'hide\');"><b>No</b></button>';
		content+='</div>';	
		content+='</div>';//.col-lg-12
		content+='</div>';//.row
		content+='</div>';//.container-fluid
		content+='</div>';//.modal-body
		content+='</div>';//.modal-content
		content+='</div>';//.modal-dialog  
	document.getElementById(id).innerHTML=content;
    $('#'+id).modal({backdrop: "static"});
  }
  
  ui_adminRoles_updateForm(id,index){
	var adminRolesResponse = adminAccountsRolesData.get_adminRolesResponse();
	var content='<div class="modal-dialog">';
		content+='<div class="modal-content">';
		content+='<div class="modal-header modal-header-blue">';
		content+='<button type="button" class="close" data-dismiss="modal">&times;</button>';
		content+='<h4 class="modal-title">Update Role Information</h4>';
		content+='</div>'; // modal-header
		content+='<div class="modal-body">';
		content+='<div class="container-fluid">';
		content+='<div class="row">';
		content+='<div class="col-lg-12">';
		content+='<div id="manage-adminRoles-update-warnErrorMsg" class="form-group"></div>';
		content+='<div class="form-group">';
		content+='<label>Role Name</label>';
		content+='<input type="hidden" id="manage-adminRoles-update-roleId" value="'+adminRolesResponse[index].role_Id+'"/>';
		content+='<input type="text" class="form-control" id="manage-adminRoles-update-roleName" ';
		content+='placeholder="Enter Role Name" value="'+adminRolesResponse[index].role+'" disabled/>';
		content+='</div>';//.form-group
		content+='<div class="form-group">';
		content+='<label>Role Description</label>';
		content+='<textarea class="form-control" id="manage-adminRoles-update-roleDesc" placeholder="Enter Role Description" disabled>';
		content+=adminRolesResponse[index].roleDesc+'</textarea>';
		content+='</div>';//.form-group
		content+='<div align="center" class="form-group">';
		content+='<button id="manage-adminRoles-update-editBtn" class="btn btn-blue hide-block" onclick="javascript:enable_manage_adminRoles_update();"><b>Edit Role Information</b></button>';
		content+='<button id="manage-adminRoles-update-saveBtn" class="btn btn-blue hide-block" onclick="javascript:submit_manage_adminRoles_update();"><b>Save Role Information</b></button>';
		content+='<button id="manage-adminRoles-update-resetBtn" class="btn btn-blue-o hide-block" onclick="javascript:reset_manage_adminRoles_update('+index+');"><b>Reset Form</b></button>';
		content+='</div>';//.form-group
		content+='</div>';//.col-lg-12
		content+='</div>';//.row
		content+='</div>';//.container-fluid
		content+='</div>';//.modal-body
		content+='</div>';//.modal-content
		content+='</div>';//.modal-dialog
	document.getElementById(id).innerHTML=content;
    $('#'+id).modal({backdrop: "static"});
	disable_manage_adminRoles_update();
  }
 
}
var adminAccountsRolesUI = new AdminAccountsRolesUI(); // This contains UI Screens required for Admin Account Roles
var adminAccountsRolesData = new AdminAccountsRolesData(); // This contains Data that required to present on UI for Admin Account Roles

$(document).ready(function() {
 manage_adminRoles_view();
});

var manage_adminRoles_htmlElements = { manage_adminRoles_viewRolesInfo:'manage-adminRoles-viewRolesInfo',
									   manage_adminRoles_updateExistingRoleModal:'manage-adminRoles-updateExistingRoleModal',
									   manage_adminRoles_deleteExistingRoleModal:'manage-adminRoles-deleteExistingRoleModal',
									   manage_adminRoles_add_warnErrorMsg:'manage-adminRoles-add-warnErrorMsg',
									   manage_adminRoles_add_roleName:'manage-adminRoles-add-roleName',
									   manage_adminRoles_add_roleDesc:'manage-adminRoles-add-roleDesc',
									   manage_adminRoles_update_warnErrorMsg:'manage-adminRoles-update-warnErrorMsg',
									   manage_adminRoles_update_roleId:'manage-adminRoles-update-roleId',
									   manage_adminRoles_update_roleName:'manage-adminRoles-update-roleName',
									   manage_adminRoles_update_roleDesc:'manage-adminRoles-update-roleDesc',
									   manage_adminRoles_update_editBtn:'manage-adminRoles-update-editBtn',
									   manage_adminRoles_update_saveBtn:'manage-adminRoles-update-saveBtn',
									   manage_adminRoles_update_resetBtn:'manage-adminRoles-update-resetBtn'
									 };
function reset_manage_adminRoles_create(){
  document.getElementById(manage_adminRoles_htmlElements.manage_adminRoles_add_warnErrorMsg).innerHTML='';
  $('#'+manage_adminRoles_htmlElements.manage_adminRoles_add_roleName).val('');
  $('#'+manage_adminRoles_htmlElements.manage_adminRoles_add_roleDesc).val('');
  bootstrap_formField_trigger('remove',[manage_adminRoles_htmlElements.manage_adminRoles_add_roleName,
			manage_adminRoles_htmlElements.manage_adminRoles_add_roleDesc]);
}
function submit_manage_adminRoles_create(){
 var roleName = $('#'+manage_adminRoles_htmlElements.manage_adminRoles_add_roleName).val();
 var roleDesc = $('#'+manage_adminRoles_htmlElements.manage_adminRoles_add_roleDesc).val();
 bootstrap_formField_trigger('remove',[manage_adminRoles_htmlElements.manage_adminRoles_add_roleName,
			manage_adminRoles_htmlElements.manage_adminRoles_add_roleDesc]);
 if(roleName.length>0 && roleDesc.length>0){
	adminRolesEndpoints.create_newRole({role:roleName,roleDesc:roleDesc}, function(response){ 
	 manage_adminRoles_view();
     VALIDATION_MESSAGE_ERROR='New Role Added Successfully. ';
     show_validate_msg('success',manage_adminRoles_htmlElements.manage_adminRoles_add_warnErrorMsg);
	 $('#'+manage_adminRoles_htmlElements.manage_adminRoles_add_roleName).val('');
     $('#'+manage_adminRoles_htmlElements.manage_adminRoles_add_roleDesc).val('');
	 bootstrap_formField_trigger('remove',[manage_adminRoles_htmlElements.manage_adminRoles_add_roleName,
			manage_adminRoles_htmlElements.manage_adminRoles_add_roleDesc]);	 
    });
 } else {
	 VALIDATION_MESSAGE_ERROR='Missing ';
	 if(roleName.length==0){ 
	    VALIDATION_MESSAGE_ERROR+=' Role Name,'; 
		bootstrap_formField_trigger('error',manage_adminRoles_htmlElements.manage_adminRoles_add_roleName);
	  }
	 if(roleDesc.length==0){ 
	    VALIDATION_MESSAGE_ERROR+=' Role Description,';
		bootstrap_formField_trigger('error',manage_adminRoles_htmlElements.manage_adminRoles_add_roleDesc);
	 }
	 show_validate_msg('error',manage_adminRoles_htmlElements.manage_adminRoles_add_warnErrorMsg);
 }
}

function submit_manage_adminRoles_delete(role_Id, roleName){
  adminRolesEndpoints.delete_accountRole({role_Id:role_Id, role:roleName },function(response){
	  manage_adminRoles_view();
	  $('#'+manage_adminRoles_htmlElements.manage_adminRoles_deleteExistingRoleModal).modal('hide');
	  alert_display_success(response.statusDesc, '#');
  });
}

function manage_adminRoles_view(){
  adminAccountsRolesUI.ui_adminRoles_view(manage_adminRoles_htmlElements.manage_adminRoles_viewRolesInfo);
}
  
function enable_manage_adminRoles_update(){ // Shows Save and Reset Form Button
 document.getElementById(manage_adminRoles_htmlElements.manage_adminRoles_update_roleName).disabled=false;
 document.getElementById(manage_adminRoles_htmlElements.manage_adminRoles_update_roleDesc).disabled=false;
 if(!$('#'+manage_adminRoles_htmlElements.manage_adminRoles_update_editBtn).hasClass('hide-block')){
	$('#'+manage_adminRoles_htmlElements.manage_adminRoles_update_editBtn).addClass('hide-block'); 
 }
 if($('#'+manage_adminRoles_htmlElements.manage_adminRoles_update_saveBtn).hasClass('hide-block')){
	$('#'+manage_adminRoles_htmlElements.manage_adminRoles_update_saveBtn).removeClass('hide-block'); 
 }
 if($('#'+manage_adminRoles_htmlElements.manage_adminRoles_update_resetBtn).hasClass('hide-block')){
	$('#'+manage_adminRoles_htmlElements.manage_adminRoles_update_resetBtn).removeClass('hide-block'); 
 }
}

  
function disable_manage_adminRoles_update(){ // Shows Edit and Reset Form Button
 document.getElementById(manage_adminRoles_htmlElements.manage_adminRoles_update_roleName).disabled=true;
 document.getElementById(manage_adminRoles_htmlElements.manage_adminRoles_update_roleDesc).disabled=true;
 if($('#'+manage_adminRoles_htmlElements.manage_adminRoles_update_editBtn).hasClass('hide-block')){
	$('#'+manage_adminRoles_htmlElements.manage_adminRoles_update_editBtn).removeClass('hide-block'); 
 }
 if(!$('#'+manage_adminRoles_htmlElements.manage_adminRoles_update_saveBtn).hasClass('hide-block')){
	$('#'+manage_adminRoles_htmlElements.manage_adminRoles_update_saveBtn).addClass('hide-block'); 
 }
 if($('#'+manage_adminRoles_htmlElements.manage_adminRoles_update_resetBtn).hasClass('hide-block')){
	$('#'+manage_adminRoles_htmlElements.manage_adminRoles_update_resetBtn).removeClass('hide-block'); 
 }
}

function reset_manage_adminRoles_update(index){
  var adminRolesResponse = adminAccountsRolesData.get_adminRolesResponse();
  var roleName = $('#'+manage_adminRoles_htmlElements.manage_adminRoles_update_roleName).val(adminRolesResponse[index].role);
  var roleDesc = $('#'+manage_adminRoles_htmlElements.manage_adminRoles_update_roleDesc).val(adminRolesResponse[index].roleDesc);
}

function submit_manage_adminRoles_update(){
  disable_manage_adminRoles_update();  
  var roleId = $('#'+manage_adminRoles_htmlElements.manage_adminRoles_update_roleId).val();
  var roleName = $('#'+manage_adminRoles_htmlElements.manage_adminRoles_update_roleName).val();
  var roleDesc = $('#'+manage_adminRoles_htmlElements.manage_adminRoles_update_roleDesc).val();
  if(roleName.length>0 && roleDesc.length>0){
	adminRolesEndpoints.update_accountRole({ role_Id:roleId, role:roleName, roleDesc:roleDesc },function(response){
	 manage_adminRoles_view();
     VALIDATION_MESSAGE_ERROR='Updated Role Successfully. ';
     show_validate_msg('success',manage_adminRoles_htmlElements.manage_adminRoles_update_warnErrorMsg);
	 bootstrap_formField_trigger('remove',[manage_adminRoles_htmlElements.manage_adminRoles_update_roleName,
			manage_adminRoles_htmlElements.manage_adminRoles_update_roleDesc]);	 
    });
 } else {
	 VALIDATION_MESSAGE_ERROR='Missing ';
	 if(roleName.length==0){ 
	    VALIDATION_MESSAGE_ERROR+=' Role Name,'; 
		bootstrap_formField_trigger('error',manage_adminRoles_htmlElements.manage_adminRoles_update_roleName);
	  }
	 if(roleDesc.length==0){ 
	    VALIDATION_MESSAGE_ERROR+=' Role Description,';
		bootstrap_formField_trigger('error',manage_adminRoles_htmlElements.manage_adminRoles_update_roleDesc);
	 }
	 show_validate_msg('error',manage_adminRoles_htmlElements.manage_adminRoles_update_warnErrorMsg);
 }
}