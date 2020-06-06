 <script type="text/javascript">
  var manage_adminAccounts_htmlElements = { manage_adminAccounts_add_roleId:'manage-adminAccounts-add-roleId', 
							    manage_adminAccounts_add_surName:'manage-adminAccounts-add-surName', 
								manage_adminAccounts_add_name:'manage-adminAccounts-add-name', 
								manage_adminAccounts_add_gender:'manage-adminAccounts-add-gender', 
								manage_adminAccounts_add_mobcode:'manage-adminAccounts-add-mobcode',
								manage_adminAccounts_add_mobile:'manage-adminAccounts-add-mobile',
								manage_adminAccounts_add_email:'manage-adminAccounts-add-email', 
								manage_adminAccounts_add_userName:'manage-adminAccounts-add-userName', 
								manage_adminAccounts_add_accPwd:'manage-adminAccounts-add-accPwd', 
								manage_adminAccounts_add_confirmPwd:'manage-adminAccounts-add-confirmPwd',
								manage_adminAccounts_add_accActive:'manage-adminAccounts-add-accActive' }
  function submit_manage_adminAccounts_create(){
	var roleId = $('#'+manage_adminAccounts_htmlElements.manage_adminAccounts_add_roleId).val();
	var surName = $('#'+manage_adminAccounts_htmlElements.manage_adminAccounts_add_surName).val();
	var name = $('#'+manage_adminAccounts_htmlElements.manage_adminAccounts_add_name).val();
	var gender = $('#'+manage_adminAccounts_htmlElements.manage_adminAccounts_add_gender).val();
	var mob_code = $('#'+manage_adminAccounts_htmlElements.manage_adminAccounts_add_mobcode).val();
	var mobile = $('#'+manage_adminAccounts_htmlElements.manage_adminAccounts_add_mobile).val();
	var email = $('#'+manage_adminAccounts_htmlElements.manage_adminAccounts_add_email).val();
	var userName = $('#'+manage_adminAccounts_htmlElements.manage_adminAccounts_add_userName).val();
	var accPwd = $('#'+manage_adminAccounts_htmlElements.manage_adminAccounts_add_accPwd).val();
	var confirmPwd = $('#'+manage_adminAccounts_htmlElements.manage_adminAccounts_add_confirmPwd).val();
	var acc_active = $('#'+manage_adminAccounts_htmlElements.manage_adminAccounts_add_accActive).val();
	// Apply Validation
	adminAuthEndpoints.create_newAccount({
	  role_Id:roleId, surName:surName, name:name, gender:gender, mob_code:mob_code, mobile:mobile, 
	  email:email, userName:userName, acc_pwd:accPwd, acc_active:acc_active
	},function(response){ });
  }
 </script>
 <!-- -->
 <div class="list-group">
  <div class="list-group-item">
  <!-- -->
	<div class="container-fluid">
	  <div class="row"><div class="col-lg-12" style="background-color:#eee;"><h5><b>Create New User Account</b></h5></div></div><!--/.row -->
	  <div class="row mtop15p">
		<!-- Column#1 ::: START -->
	    <div class="col-lg-6">
		 <!-- -->
		 <div class="form-group">
		   <label>Username</label>
		   <input type="text" id="manage-adminAccounts-add-userName" class="form-control" placeholder="Enter Username"/>
		 </div><!--/.form-group -->
		 <!-- -->
		 
		 <!-- -->
		 <div class="form-group">
		   <label>Role Name</label>
		   <select class="form-control">
			 <option value="">Select Role Name</option> 
		   </select>
		 </div><!--/.form-group -->
		 <!-- -->
						  
		 <!-- -->
		 <div class="form-group">
		   <label>Email</label>
		   <input type="text" id="manage-adminAccounts-add-email" class="form-control" placeholder="Enter Email Address"/>
		 </div><!--/.form-group -->
		 <!-- -->
						  
		 <!-- -->
		 <div class="form-group">
		   <label>Mobile</label>
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
			 <input id="auth-login-useraccounts-add-mobile" class="form-control" placeholder="Enter Mobile Number">
		   </div><!--/.input-group -->
		   <!-- -->
		  </div><!--/.form-group -->
		  <!-- -->
		  
		  <!-- -->
		   <div class="form-group">
			   <label>Account Status</label>
			   <select id="manage-adminAccounts-add-accActive" class="form-control">
				  <option value="">Select Activation Status</option> 
				  <option value="Y">Activate Now</option> 
				  <option value="N">Activate Later</option> 
			   </select>
		   </div><!--/.form-group -->
		   <!-- -->
						
		</div><!--/.col-lg-4 -->
		<!-- Column#1 ::: START -->

		<!-- Column#2 ::: START -->
		<div class="col-lg-6">
		
		   <!-- -->
		   <div class="form-group">
			  <label>Surname</label>
			  <input type="text" id="manage-adminAccounts-add-surName" class="form-control" placeholder="Enter Surname"/>
		   </div><!--/.form-group -->
		   <!-- -->
		   
		   <!-- -->
		   <div class="form-group">
			  <label>Full Name</label>
			  <input type="text" id="manage-adminAccounts-add-name" class="form-control" placeholder="Enter FullName"/>
		   </div><!--/.form-group -->
		   <!-- -->
		   
		   <!-- -->
		   <div class="form-group">
			  <label>Gender</label>
			  <select id="manage-adminAccounts-add-gender" class="form-control">
				<option value="">Select Gender</option> 
				<option value="MALE">Male</option> 
				<option value="FEMALE">Female</option> 
			  </select>
		   </div><!--/.form-group -->
		   <!-- -->
		   
		   <!-- -->
		   <div class="form-group">
			  <label>Account Password</label>
			  <input type="text" id="manage-adminAccounts-add-accPwd" class="form-control" placeholder="Enter Password"/>
		   </div><!--/.form-group -->
		   <!-- -->
		   
		   <!-- -->
		   <div class="form-group">
			  <label>Confirm Password</label>
			  <input type="text" id="manage-adminAccounts-add-confirmPwd" class="form-control" placeholder="Enter Confirm Password"/>
		   </div><!--/.form-group -->
		   <!-- -->
						
		</div><!--/.col-lg-4 -->
		<!-- Column#2 ::: START -->
						
	  </div><!--/.row -->
	  <div class="row">
		  <div class="col-lg-4"></div><!--/.col-lg-4 -->
		  <div class="col-lg-4">
			 <button class="btn btn-success form-control" onclick="javascript:submit_manage_adminAccounts_create();"><b>Create Account</b></button>
		  </div><!--/.col-lg-4 -->
	      <div class="col-lg-4"></div><!--/.col-lg-4 -->
	  </div><!--/.row -->
	</div><!--/.container-fluid -->
	<!-- -->
  </div><!--/.list-group-item -->
</div><!--/.list-group -->
<!-- -->