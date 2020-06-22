class DevAppConfigUI {
  ui_devAppConfig_saveConfirmForm(id, index){
   var paramName = $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_update_inputparamName_+index).val();
   var content='<div class="modal-dialog">';
	   content+='<div class="modal-content">';
       content+='<div class="modal-header modal-header-blue">';
       content+='<button type="button" class="close" data-dismiss="modal">&times;</button>';
       content+='<h4 class="modal-title">Update Configuration</h4>';
       content+='</div>'; // modal-header
       content+='<div align="center" class="modal-body">';
       content+='<div>Are you sure to Update Configuration of Parameter <b>"'+paramName+'"</b>?</div>';
	   content+='<div class="form-group mtop15p">';
	   content+='<button class="btn btn-blue" onclick="javascript:submit_manage_devAppConfig_update_save('+index+');"><b>Yes</b></button>';
	   content+='<button class="btn btn-blue-o" onclick="javascript:$(\'#'+id+'\').modal(\'hide\');"><b>No</b></button>';
	   content+='</div>'; // form-group
       content+='</div>'; // modal-body
       content+='</div>'; // modal-content
	   content+='</div>'; // modal-dialog
	document.getElementById(id).innerHTML=content;
	$('#'+id).modal();
  }
  ui_devAppConfig_deleteConfirmForm(id, index){
   var paramName = $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_update_inputparamName_+index).val();
   var content='<div class="modal-dialog">';
	   content+='<div class="modal-content">';
       content+='<div class="modal-header modal-header-blue">';
       content+='<button type="button" class="close" data-dismiss="modal">&times;</button>';
       content+='<h4 class="modal-title">Update Configuration</h4>';
       content+='</div>'; // modal-header
       content+='<div align="center" class="modal-body">';
       content+='<div>Are you sure to Delete Parameter <b>"'+paramName+'"</b>?</div>';
	   content+='<div class="form-group mtop15p">';
	   content+='<button class="btn btn-blue" onclick="javascript:submit_manage_devAppConfig_delete('+index+');"><b>Yes</b></button>';
	   content+='<button class="btn btn-blue-o" onclick="javascript:$(\'#'+id+'\').modal(\'hide\');"><b>No</b></button>';
	   content+='</div>'; // form-group
       content+='</div>'; // modal-body
       content+='</div>'; // modal-content
	   content+='</div>'; // modal-dialog
	document.getElementById(id).innerHTML=content;
	$('#'+id).modal();
  }
  ui_devAppConfig_view(id){
	devAppConfigEndpoints.viewInfo_configParams({},function(response){
	  var content='<div class="table-responsive">';	
		  content+='<table class="table">';
		  content+='<thead>';
		  content+='<tr align="center" style="background-color:#eee;">';
		  content+='<td><b>S.No.</b></td>';
		  content+='<td><b>Parameter Name</b></td>';
		  content+='<td><b>Paramter Value</b></td>';
		  content+='<td><b>Description</b></td>';
		  content+='<td><b>Actions</b></td>';
		  content+='</tr>';
		  content+='</thead>';
		  content+='<tbody>';
		  if(response.length>0){
		  for(var index=0;index<response.length;index++){
		  content+='<tr align="center">';
		  content+='<td><b>'+(index+1)+'.</b></td>';
		  content+='<td><b>'+response[index].paramName+'</b></td>';
		  content+='<td>';
		  content+='<div id="'+manage_devAppConfig_htmlElements.manage_devAppConfig_update_viewParamValue_+index+'"><b>'+response[index].paramValue+'</b></div>';
		  content+='<div id="'+manage_devAppConfig_htmlElements.manage_devAppConfig_update_editParamValue_+index+'" class="hide-block">';
		  content+='<input id="'+manage_devAppConfig_htmlElements.manage_devAppConfig_update_inputparamName_+index+'" type="hidden" ';
		  content+='value="'+response[index].paramName+'"/>';
		  content+='<input id="'+manage_devAppConfig_htmlElements.manage_devAppConfig_update_inputparamValue_+index+'" type="text" class="form-control" ';
		  content+='placeholder="Enter Parameter Value" value="'+response[index].paramValue+'"/>';
		  content+='</div>';
		  content+='</td>';
		  content+='<td>';
		  content+='<div id="'+manage_devAppConfig_htmlElements.manage_devAppConfig_update_viewParamDesc_+index+'">'+response[index].paramDesc+'</div>';
		  content+='<div id="'+manage_devAppConfig_htmlElements.manage_devAppConfig_update_editParamDesc_+index+'" class="hide-block">';
		  content+='<textarea id="'+manage_devAppConfig_htmlElements.manage_devAppConfig_update_inputParamDesc_+index+'" type="text" class="form-control" ';
		  content+='placeholder="Enter Parameter Desc">'+response[index].paramDesc+'</textarea>';
		  content+='</div>';
		  content+='</td>';
		  content+='<td>';
		  if(PANEL_TOPIC_APPCONFIG_UPDATE==='Y'){
		  content+='<i id="'+manage_devAppConfig_htmlElements.manage_devAppConfig_view_actionsEdit_+index+'" class="fa fa-edit curpoint" ';
		  content+='onclick="javascript:manage_devAppConfig_update_editForm('+index+');"></i>';
		  content+='<i id="'+manage_devAppConfig_htmlElements.manage_devAppConfig_view_actionsSave_+index+'"class="fa fa-floppy-o curpoint hide-block" ';
		  content+='onclick="javascript:manage_devAppConfig_update_saveForm('+index+');"></i>';
		  }
		  if(PANEL_TOPIC_APPCONFIG_DELETE==='Y'){
		  content+='<i class="fa fa-close curpoint" ';
		  content+='onclick="javascript:devAppConfigUI.ui_devAppConfig_deleteConfirmForm(\''+manage_devAppConfig_htmlElements.manage_devAppConfig_deleteExistingParamModal+'\','+index+');"></i>';
		  content+='</td>';
		  }
		  content+='</tr>';
		  }
		  } else {
			 content+='<tr align="center" class="warning"><td></td><td></td><td>No Record Found</td><td></td><td></td></tr>'; 
		  }
		  content+='</tbody>';
		  content+='</table>';
		  content+='</div>'; 
		document.getElementById(id).innerHTML=content;	
    });
	}
}
var devAppConfigUI = new DevAppConfigUI();
$(document).ready(function(){
 manage_devAppConfig_view();
});
var manage_devAppConfig_htmlElements = { manage_devAppConfig_updateExistingParamModal:'manage-devAppConfig-updateExistingParamModal',
										 manage_devAppConfig_deleteExistingParamModal:'manage-devAppConfig-deleteExistingParamModal',
										 manage_devAppConfig_view_configInfo:'manage-devAppConfig-view-configInfo',
										 manage_devAppConfig_view_actionsEdit_:'manage-devAppConfig-view-actionsEdit-',
									     manage_devAppConfig_view_actionsSave_:'manage-devAppConfig-view-actionsSave-',
										 manage_devAppConfig_update_inputparamName_:'manage-devAppConfig-update-inputparamName-',
									     manage_devAppConfig_update_viewParamValue_:'manage-devAppConfig-update-viewParamValue-',
									     manage_devAppConfig_update_editParamValue_:'manage-devAppConfig-update-editParamValue-',
									     manage_devAppConfig_update_inputparamValue_:'manage-devAppConfig-update-inputparamValue-',
										 manage_devAppConfig_update_viewParamDesc_:'manage-devAppConfig-update-viewParamDesc-',
										 manage_devAppConfig_update_editParamDesc_:'manage-devAppConfig-update-editParamDesc-',
										 manage_devAppConfig_update_inputParamDesc_:'manage-devAppConfig-update-inputParamDesc-',
										 manage_devAppConfig_add_warnErrorMsg:'manage-devAppConfig-add-warnErrorMsg',
										 manage_devAppConfig_add_inputparamName:'manage-devAppConfig-add-inputparamName',
										 manage_devAppConfig_add_inputparamValue:'manage-devAppConfig-add-inputparamValue',
										 manage_devAppConfig_add_inputparamDesc:'manage-devAppConfig-add-inputparamDesc'
										   };
function manage_devAppConfig_view(){
  devAppConfigUI.ui_devAppConfig_view(manage_devAppConfig_htmlElements.manage_devAppConfig_view_configInfo);	
}
function manage_devAppConfig_update_editForm(index){
 if(!$('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_view_actionsEdit_+index).hasClass('hide-block')){ 
   $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_view_actionsEdit_+index).addClass('hide-block'); 
 }
 if($('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_view_actionsSave_+index).hasClass('hide-block')){ 
   $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_view_actionsSave_+index).removeClass('hide-block'); 
 }
 if(!$('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_update_viewParamValue_+index).hasClass('hide-block')){ 
   $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_update_viewParamValue_+index).addClass('hide-block'); 
 }
 if(!$('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_update_viewParamDesc_+index).hasClass('hide-block')){ 
   $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_update_viewParamDesc_+index).addClass('hide-block'); 
 }
 if($('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_update_editParamValue_+index).hasClass('hide-block')){ 
   $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_update_editParamValue_+index).removeClass('hide-block'); 
 }
 if($('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_update_editParamDesc_+index).hasClass('hide-block')){ 
   $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_update_editParamDesc_+index).removeClass('hide-block'); 
 }
}
function manage_devAppConfig_update_saveForm(index){ // UI Popup: Are you sure to update?
 devAppConfigUI.ui_devAppConfig_saveConfirmForm(manage_devAppConfig_htmlElements.manage_devAppConfig_updateExistingParamModal,index);
}
function submit_manage_devAppConfig_update_save(index){
 $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_updateExistingParamModal).modal('hide');
 if($('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_view_actionsEdit_+index).hasClass('hide-block')){ 
   $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_view_actionsEdit_+index).removeClass('hide-block'); 
 }
 if(!$('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_view_actionsSave_+index).hasClass('hide-block')){ 
   $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_view_actionsSave_+index).addClass('hide-block'); 
 }
 if($('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_update_viewParamValue_+index).hasClass('hide-block')){ 
   $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_update_viewParamValue_+index).removeClass('hide-block'); 
 }
 if($('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_update_viewParamDesc_+index).hasClass('hide-block')){ 
   $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_update_viewParamDesc_+index).removeClass('hide-block'); 
 }
 if(!$('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_update_editParamValue_+index).hasClass('hide-block')){ 
   $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_update_editParamValue_+index).addClass('hide-block'); 
 }
 if(!$('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_update_editParamDesc_+index).hasClass('hide-block')){ 
   $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_update_editParamDesc_+index).addClass('hide-block'); 
 }
 
 var paramName = $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_update_inputparamName_+index).val();
 var paramValue = $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_update_inputparamValue_+index).val();
 var paramDesc = $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_update_inputParamDesc_+index).val();
 document.getElementById(manage_devAppConfig_htmlElements.manage_devAppConfig_update_viewParamValue_+index).innerHTML='<b>'+paramValue+'</b>';
 document.getElementById(manage_devAppConfig_htmlElements.manage_devAppConfig_update_viewParamDesc_+index).innerHTML=paramDesc;
 devAppConfigEndpoints.update_configParam({paramName:paramName,paramValue:paramValue,paramDesc:paramDesc},function(response){
   if(response.status.toLowerCase() === 'success'){ alert_display_success(response.statusDesc,'#'); }
   else { alert_display_error(response.statusDesc); }
 });
}
function submit_manage_devAppConfig_delete(index){
  var paramName = $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_update_inputparamName_+index).val();
  devAppConfigEndpoints.delete_configParam({paramName:paramName},function(response){
	$('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_deleteExistingParamModal).modal('hide');
	if(response.status.toLowerCase() === 'success'){ alert_display_success(response.statusDesc,'#'); }
	else { alert_display_error(response.statusDesc); }
	manage_devAppConfig_view();	
  });
}
function submit_manage_devAppConfig_add(){
 var paramName = $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_add_inputparamName).val();
 var paramValue = $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_add_inputparamValue).val();
 var paramDesc = $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_add_inputparamDesc).val();
 if(paramName.length>0 && paramValue.length>0 && paramDesc.length>0){
	 devAppConfigEndpoints.create_configParam({paramName:paramName,paramValue:paramValue,paramDesc:paramDesc},function(response){
	   VALIDATION_MESSAGE_ERROR=response.statusDesc;
	   show_validate_msg(response.status.toLowerCase(),manage_devAppConfig_htmlElements.manage_devAppConfig_add_warnErrorMsg);
	   $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_add_inputparamName).val('');
	   $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_add_inputparamValue).val('');
       $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_add_inputparamDesc).val('');
	   bootstrap_formField_trigger('remove',[manage_devAppConfig_htmlElements.manage_devAppConfig_add_inputparamName,
											manage_devAppConfig_htmlElements.manage_devAppConfig_add_inputparamValue, 
											manage_devAppConfig_htmlElements.manage_devAppConfig_add_inputparamDesc]);
	   manage_devAppConfig_view();
	 });
 } else { 
     VALIDATION_MESSAGE_ERROR='Missing ';
	 if(paramName.length==0){ 
	    VALIDATION_MESSAGE_ERROR+=' Parameter Name,'; 
		bootstrap_formField_trigger('error',manage_devAppConfig_htmlElements.manage_devAppConfig_add_inputparamName);
	  }
	 if(paramValue.length==0){ 
	    VALIDATION_MESSAGE_ERROR+=' Parameter Value,,';
		bootstrap_formField_trigger('error',manage_devAppConfig_htmlElements.manage_devAppConfig_add_inputparamValue);
	 }
	 if(paramDesc.length==0){ 
	    VALIDATION_MESSAGE_ERROR+=' Paramter Description,';
		bootstrap_formField_trigger('error',manage_devAppConfig_htmlElements.manage_devAppConfig_add_inputparamDesc);
	 }
	 show_validate_msg('error',manage_devAppConfig_htmlElements.manage_devAppConfig_add_warnErrorMsg);
 }
}
function reset_manage_devAppConfig_add(){
 $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_add_inputparamName).val('');
 $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_add_inputparamValue).val('');
 $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_add_inputparamDesc).val('');
 bootstrap_formField_trigger('remove',[manage_devAppConfig_htmlElements.manage_devAppConfig_add_inputparamName,
			manage_devAppConfig_htmlElements.manage_devAppConfig_add_inputparamValue, manage_devAppConfig_htmlElements.manage_devAppConfig_add_inputparamDesc]);
 document.getElementById(manage_devAppConfig_htmlElements.manage_devAppConfig_add_warnErrorMsg).innerHTML='';
}