<form name="frmImage" enctype="multipart/form-data" action="backend/php/cj/controller.file.upload.php" method="post" class="frmImageUpload">
  <label>Upload Image File:</label><br /> 
  <input type="hidden" name="action" value="FILE_PROC_UPLOAD"/>
  <input type="hidden" name="destination" value="db.tableName"/>
  <input name="fileUploaded" type="file" /> 
  <input type="submit" value="Submit" class="btnSubmit" />
</form>