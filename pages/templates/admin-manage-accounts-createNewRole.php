
 <!-- Add Roles Modal::: START -->
 <div id="addNewRoleModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header modal-header-blue">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Role</h4>
      </div>
      <div class="modal-body">
        <!-- -->
		<div class="container-fluid">
		 <div class="row">
		   <div class="col-lg-12">
		   
		     <!-- -->
			 <div id="manage-adminRoles-add-warnErrorMsg" class="form-group"></div><!--/.form-group -->
			 <!-- -->
			 
		     <!-- -->
			 <div class="form-group">
			   <label>Role Name</label>
			   <input type="text" class="form-control" id="manage-adminRoles-add-roleName" placeholder="Enter Role Name"/>
			 </div><!--/.form-group -->
			 <!-- -->
			 
			  <!-- -->
			 <div class="form-group">
			   <label>Role Description</label>
			   <textarea class="form-control" id="manage-adminRoles-add-roleDesc" placeholder="Enter Role Description"></textarea>
			 </div><!--/.form-group -->
			 <!-- -->
			
			 <!-- -->
			 <div align="center" class="form-group">
			   <button class="btn btn-blue" onclick="javascript:submit_manage_adminRoles_create();"><b>Add New Role</b></button>
			   <button class="btn btn-blue-o" onclick="javascript:reset_manage_adminRoles_create();"><b>Reset Form</b></button>
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
 <!-- Add Roles Modal::: End -->