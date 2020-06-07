<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>App Config</title>
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
  <script src="<?php echo $PROJECT_URL ?>pages/js/common/endpoints.admin.app.config.js"></script>
  <script src="<?php echo $PROJECT_URL ?>pages/js/common/session.js"></script>
  <script src="<?php echo $PROJECT_URL ?>pages/js/api/bootstrap-advanced.js"></script>
  <script src="<?php echo $PROJECT_URL ?>pages/js/api/core-skeleton.js"></script>
  <script src="<?php echo $PROJECT_URL ?>pages/js/common/validations.js"></script>
  
  <script type="text/javascript">

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
			   <h4 class="page-header">Application Configuration</h4>
		     </div><!-- /.col-lg-12 -->
		   </div><!--/.row -->
<script type="text/javascript">
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
	adminAppConfigEndpoints.viewInfo_configParams({},function(response){
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
		  content+='<td><i id="'+manage_devAppConfig_htmlElements.manage_devAppConfig_view_actionsEdit_+index+'" class="fa fa-edit curpoint" ';
		  content+='onclick="javascript:manage_devAppConfig_update_editForm('+index+');"></i>';
		  content+='<i id="'+manage_devAppConfig_htmlElements.manage_devAppConfig_view_actionsSave_+index+'"class="fa fa-floppy-o curpoint hide-block" ';
		  content+='onclick="javascript:manage_devAppConfig_update_saveForm('+index+');"></i>';
		  content+='<i class="fa fa-close curpoint" ';
		  content+='onclick="javascript:devAppConfigUI.ui_devAppConfig_deleteConfirmForm(\''+manage_devAppConfig_htmlElements.manage_devAppConfig_deleteExistingParamModal+'\','+index+');"></i>';
		  content+='</td>';
		  content+='</tr>';
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
 adminAppConfigEndpoints.update_configParam({paramName:paramName,paramValue:paramValue,paramDesc:paramDesc},function(response){
   alert_display_success(response.statusDesc,'#');
 });
}

function submit_manage_devAppConfig_delete(index){
  var paramName = $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_update_inputparamName_+index).val();
  adminAppConfigEndpoints.delete_configParam({paramName:paramName},function(response){
	$('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_deleteExistingParamModal).modal('hide');
	alert_display_success(response.statusDesc,'#');
	manage_devAppConfig_view();
	
  });
}
function submit_manage_devAppConfig_add(){
 var paramName = $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_add_inputparamName).val();
 var paramValue = $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_add_inputparamValue).val();
 var paramDesc = $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_add_inputparamDesc).val();
 if(paramName.length>0 && paramValue.length>0 && paramDesc.length>0){
	 adminAppConfigEndpoints.create_configParam({paramName:paramName,paramValue:paramValue,paramDesc:paramDesc},function(response){
	   manage_devAppConfig_view();
	   VALIDATION_MESSAGE_ERROR=response.statusDesc;
	   show_validate_msg('success',manage_devAppConfig_htmlElements.manage_devAppConfig_add_warnErrorMsg);
	   $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_add_inputparamName).val('');
	   $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_add_inputparamValue).val('');
       $('#'+manage_devAppConfig_htmlElements.manage_devAppConfig_add_inputparamDesc).val('');
	   bootstrap_formField_trigger('remove',[manage_devAppConfig_htmlElements.manage_devAppConfig_add_inputparamName,
											manage_devAppConfig_htmlElements.manage_devAppConfig_add_inputparamValue, 
											manage_devAppConfig_htmlElements.manage_devAppConfig_add_inputparamDesc]);
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

</script>

<!-- Add New Config ::: START -->
<div class="row">
 <div align="right" class="col-lg-12">
   <button class="btn btn-default" data-toggle="modal" data-target="#addNewConfigParamModal"><b>+ Add New Parameter</b></button>
 </div><!-- /.col-lg-12 -->
</div><!--/.row -->
<div id="addNewConfigParamModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-blue">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Configuration Paramter</h4>
      </div>
      <div class="modal-body">
        <!-- -->
		<div class="container-fluid">
		 <div class="row">
		  <div class="col-lg-12">
		  
		    <!-- -->
			<div id="manage-devAppConfig-add-warnErrorMsg" class="form-group"></div><!--/.form-group -->
			<div class="form-group">
			 <label>Parameter Name</label>
			 <input type="text" id="manage-devAppConfig-add-inputparamName" class="form-control" placeholder="Enter Parameter Name"/>
			</div><!--/.form-group -->
			
			<div class="form-group">
			 <label>Parameter Value</label>
			 <input type="text" id="manage-devAppConfig-add-inputparamValue" class="form-control" placeholder="Enter Parameter Value"/>
			</div><!--/.form-group -->
			
			<div class="form-group">
			 <label>Parameter Description</label>
			 <textarea id="manage-devAppConfig-add-inputparamDesc" class="form-control" placeholder="Enter Parameter Description"></textarea>
			</div><!--/.form-group -->
			
			<div align="center" class="form-group">
			 <button class="btn btn-blue" onclick="javascript:submit_manage_devAppConfig_add();"><b>Add New Parameter</b></button>
			 <button class="btn btn-blue-o" onclick="javascript:reset_manage_devAppConfig_add();"><b>Reset Form</b></button>
			</div><!--/.form-group -->
			<!-- -->
			
		  </div><!--/.col-lg-12 -->
		 </div><!--/.row -->
		</div><!--/.container-fluid -->
		<!-- -->
      </div><!--/.modal-body -->
    </div><!--/.modal-content -->
  </div><!--/.modal-dialog -->
</div><!--/.modal -->
<!-- Add New Config ::: END -->
		   
		   <div class="row mtop15p">
		     <div id="manage-devAppConfig-view-configInfo" class="col-lg-12"></div><!-- /.col-lg-12 -->
		   </div><!--/.row -->
			
			<!-- Update App Config ::: START -->
			<div id="manage-devAppConfig-updateExistingParamModal" class="modal fade" role="dialog"></div>
			<!-- Update App Config ::: END -->
			
			<!-- Delete App Config ::: START -->
			<div id="manage-devAppConfig-deleteExistingParamModal" class="modal fade" role="dialog"></div>
			<!-- Delete App Config ::: END -->


		   
		</div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
</body>

</html>
