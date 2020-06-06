
<div class="container-fluid">

 <div class="row">
 
  <div class="col-lg-3">
    <!-- -->
	<ul class="nav nav-pills nav-stacked">
	  <li class="active"><a data-toggle="tab" href="#modulesManager"><b>Modules</b></a></li>
	  <li><a data-toggle="tab" href="#pagesManager"><b>Pages</b></a></li>
	  <li><a data-toggle="tab" href="#topicManager"><b>Topics</b></a></li>
	  <li><a data-toggle="tab" href="#accessPermManager"><b>Access Permissions</b></a></li>
	</ul>
	<!-- -->
  </div><!--/.col-lg-3 -->
  
  <div class="col-lg-9">
	<!-- -->
		<div class="tab-content">
		  <div id="modulesManager" class="tab-pane fade in active">
			<!-- -->
			<div class="row">
			   <div class="col-lg-6">
			     <!-- -->
			     <div class="col-lg-12" style="background-color:#eee;"><h5><b>CREATE NEW MODULE</b></h5></div>
				 <div class="col-lg-12 mtop15p">
				   
				   <div class="form-group">
					<label>Module Name</label>
					<input type="text" class="form-control" placeholder="Enter Module Name"/>
				   </div><!--/.form-group -->
			     </div><!--/.col-lg-12 -->
				 <!-- -->
			   </div><!--/.col-lg-6 -->
			   <div class="col-lg-6">
			     <!-- -->
			     <div class="col-lg-12" style="background-color:#eee;"><h5><b>OTHER MODULES</b></h5></div>
				 <div class="col-lg-12 mtop15p">
				   <!-- -->
				   <div class="table-responsive">
					  <table class="table">
						<thead>
						  <tr align="center">
						    <td><b>S. No.</b></td>
							<td><b>Modules</b></td>
							<td align="right"><b>Actions</b></td>
						  </tr>
						</thead>
						<tbody>
						  <tr align="center">
							<td>1</td>
							<td>Module#1</td>
							<td align="right">
							  <i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
							  <i class="fa fa-times-circle" aria-hidden="true"></i>
							</td>
						  </tr>
						</tbody>
					  </table>
				   </div><!--/.table-responsive -->
				   <!-- -->
			     </div><!--/.col-lg-12 -->
				 <!-- -->
			   </div><!--/.col-lg-6 -->
			   
			   
			   
		
			</div><!--/.row -->
			<!-- -->
		  </div><!--/#modulesManager -->
		  <div id="pagesManager" class="tab-pane fade">
			<!-- -->
			<div class="row">
			   <div class="col-lg-4">
			     <!-- -->
			     <div class="col-lg-12" style="background-color:#eee;"><h5><b>CREATE NEW PAGE</b></h5></div>
				 <div class="col-lg-12 mtop15p">
				   
				   <div class="form-group">
					<label>Module Name</label>
					<select class="form-control">
					  <option value="">Select Module Name</option>
					</select>
				   </div><!--/.form-group -->
				   
				   <div class="form-group">
					<label>Page Name</label>
					<input type="text" class="form-control" placeholder="Enter Page Name"/>
				   </div><!--/.form-group -->
				   
				   <div class="form-group">
					<label>Page URL</label>
					<input type="text" class="form-control" placeholder="Enter Page URL"/>
				   </div><!--/.form-group -->
				   
				   <div class="form-group">
					<button class="btn btn-success form-control"><b>Create Page</b></button>
				   </div><!--/.form-group -->
				   
			     </div><!--/.col-lg-12 -->
				 <!-- -->
			   </div><!--/.col-lg-4 -->
			   <div class="col-lg-8">
			     <!-- -->
			     <div class="col-lg-12" style="background-color:#eee;"><h5><b>OTHER PAGES IN MODULE (Module#1)</b></h5></div>
				 <div class="col-lg-12 mtop15p">
				   <!-- -->
				   <div class="table-responsive">
					  <table class="table">
						<thead>
						  <tr align="center">
						    <td><b>S. No.</b></td>
							<td><b>Page Name</b></td>
							<td><b>Page URL</b></td>
							<td align="right"><b>Actions</b></td>
						  </tr>
						</thead>
						<tbody>
						  <tr align="center">
							<td>1</td>
							<td>Page#1</td>
							<td>PageURL#1</td>
							<td align="right">
							  <i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
							  <i class="fa fa-times-circle" aria-hidden="true"></i>
							</td>
						  </tr>
						</tbody>
					  </table>
				   </div><!--/.table-responsive -->
				   <!-- -->
			     </div><!--/.col-lg-12 -->
				 <!-- -->
			   </div><!--/.col-lg-8 -->
			</div><!--/.row -->
			<!-- -->
		  </div><!--/#pagesManager -->
		  <div id="topicManager" class="tab-pane fade">
		   <!-- -->
			<div class="row">
			   <div class="col-lg-4">
			     <!-- -->
			     <div class="col-lg-12" style="background-color:#eee;"><h5><b>CREATE NEW TOPIC</b></h5></div>
				 <div class="col-lg-12 mtop15p">
				   
				   <div class="form-group">
					<label>Module Name</label>
					<select class="form-control">
					  <option value="">Select Module Name</option>
					</select>
				   </div><!--/.form-group -->
				   
				   <div class="form-group">
					<label>Page Name</label>
					<select class="form-control">
					  <option value="">Select Page Name</option>
					</select>
				   </div><!--/.form-group -->
				   
				   <div class="form-group">
					<label>Topic Name</label>
					<input type="text" class="form-control" placeholder="Enter Topic Name"/>
				   </div><!--/.form-group -->
				   
				   <div class="form-group">
					<button class="btn btn-success form-control"><b>Create Topic</b></button>
				   </div><!--/.form-group -->
				   
			     </div><!--/.col-lg-12 -->
				 <!-- -->
			   </div><!--/.col-lg-4 -->
			   <div class="col-lg-8">
			     <!-- -->
			     <div class="col-lg-12" style="background-color:#eee;"><h5><b>OTHER PAGES IN MODULE (Module#1)</b></h5></div>
				 <div class="col-lg-12 mtop15p">
				   <!-- -->
				   <div class="table-responsive">
					  <table class="table">
						<thead>
						  <tr align="center">
						    <td><b>S. No.</b></td>
							<td><b>Page Name</b></td>
							<td><b>Page URL</b></td>
							<td align="right"><b>Actions</b></td>
						  </tr>
						</thead>
						<tbody>
						  <tr align="center">
							<td>1</td>
							<td>Page#1</td>
							<td>PageURL#1</td>
							<td align="right">
							  <i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
							  <i class="fa fa-times-circle" aria-hidden="true"></i>
							</td>
						  </tr>
						</tbody>
					  </table>
				   </div><!--/.table-responsive -->
				   <!-- -->
			     </div><!--/.col-lg-12 -->
				 <!-- -->
			   </div><!--/.col-lg-8 -->
			</div><!--/.row -->
			<!-- -->
		  </div><!--/#topicManager -->
		  <div id="accessPermManager" class="tab-pane fade">
			<!-- -->
			<div class="row">
			  <div class="col-lg-12" style="background-color:#eee;"><h5><b>ACCESS PERMISSIONS</b></h5></div>
			</div><!--/.row -->
			
			<div class="row mtop15p">
			  <div class="col-lg-4">
			    <!-- -->
				<div class="form-group">
				  <label>Module Name</label>
				  <select class="form-control">
				    <option value="">Select Module Name</option>
				  </select>
				</div><!--/.form-group -->
				<!-- -->
			  </div><!--/.col-lg-4 -->
			  <div class="col-lg-4">
			    <!-- -->
				<div class="form-group">
				  <label>Page Name</label>
				  <select class="form-control">
				    <option value="">Select Page Name</option>
				  </select>
				</div><!--/.form-group -->
				<!-- -->
			  </div><!--/.col-lg-4 -->
			  <div class="col-lg-4">
			    <!-- -->
				<div class="form-group">
				  <label>Topic Name</label>
				  <select class="form-control">
				    <option value="">Select Topic Name</option>
				  </select>
				</div><!--/.form-group -->
				<!-- -->
			  </div><!--/.col-lg-4 -->
			</div><!--/.row -->
			
			<div class="row">
			  <div class="col-lg-4"></div><!--/.col-lg-4 -->
			  <div class="col-lg-4">
			    <!-- -->
				<button class="btn btn-success form-control"><b>View Assigned Permissions</b></button>
				<!-- -->
			  </div><!--/.col-lg-4 -->
			  <div class="col-lg-4"></div><!--/.col-lg-4 -->
			</div><!--/.row -->
			
			<div class="row mtop15p">
			  <div class="col-lg-12" style="background-color:#eee;"><h5><b>TOPIC (Topic#1) PERMISSIONS</b></h5></div>
			</div><!--/.row -->
			
			<div class="row mtop15p">
			  <div class="col-lg-12">
			   <!-- -->
			   <div class="table-responsive">
				  <table class="table" style="border:1px solid #eee;">
					<thead style="background-color:#eee;">
					  <tr align="center">
						<td><b>User Role</b></td>
						<td><b>Create</b></td>
						<td><b>Read</b></td>
						<td><b>Update</b></td>
						<td><b>Delete</b></td>
					  </tr>
					</thead>
					<tbody>
					  <tr align="center" class="warning">
						<td><span class="label label-primary">ADMINISTRATOR</span></td>
						<td><input type="checkbox" data-toggle="toggle" data-size="mini" data-on="Yes" data-off="No" 
						     data-width="70" data-onstyle="success" data-offstyle="danger"></td>
						<td><input type="checkbox" checked data-toggle="toggle" data-size="mini" data-on="Yes" data-off="No" 
						     data-width="70" data-onstyle="success" data-offstyle="danger"></td>
						<td><input type="checkbox" checked data-toggle="toggle" data-size="mini" data-on="Yes" data-off="No" 
						     data-width="70" data-onstyle="success" data-offstyle="danger"></td>
						<td><input type="checkbox" data-toggle="toggle" data-size="mini" data-on="Yes" data-off="No" 
						     data-width="70" data-onstyle="success" data-offstyle="danger"></td>
					  </tr>
					  <tr align="center" class="info">
						<td><span class="label label-success">DEVELOPER</span></td>
						<td><input type="checkbox" data-toggle="toggle" data-size="mini" data-on="Yes" data-off="No" 
						     data-width="70" data-onstyle="success" data-offstyle="danger"></td>
						<td><input type="checkbox" checked data-toggle="toggle" data-size="mini" data-on="Yes" data-off="No" 
						     data-width="70" data-onstyle="success" data-offstyle="danger"></td>
						<td><input type="checkbox" checked data-toggle="toggle" data-size="mini" data-on="Yes" data-off="No" 
						     data-width="70" data-onstyle="success" data-offstyle="danger"></td>
						<td><input type="checkbox" data-toggle="toggle" data-size="mini" data-on="Yes" data-off="No" 
						     data-width="70" data-onstyle="success" data-offstyle="danger"></td>
					  </tr>
					</tbody>
				  </table>
			   </div><!--/.table-responsive -->
			   <!-- -->
			  </div><!--/.col-lg-12 -->
			</div><!--/.row -->
			
			
			<!-- -->
		  </div><!--/#accessPermManager -->
		</div><!--/.tab-content -->
	<!-- -->
  </div><!--/.col-lg-9 -->
  
  <div class="col-lg-4">
    <!-- -->
	
	
	

	<!-- -->
  </div><!--/.col-lg-4 -->
	
  
 </div><!--/.row -->

</div><!--/.container-fluid -->