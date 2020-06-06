<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="js/bootstrap-advanced.js"></script>
  <script src="js/core-skeleton.js"></script>
  <link rel="stylesheet" href="styles/bootstrap-advanced.css">
  <script type="text/javascript">
$(document).ready(function(){
	
	js_ajax('POST','http://localhost/codeBuilder/web/app-config/app/config/multiple',{ keys:['ABC']},function(response){
	  console.log("Multiple: "+response);
	});
	
	js_ajax('POST','http://localhost/codeBuilder/web/app-config/app/config/all',{ },function(response){
	  console.log("All: "+response);
	});
	
	js_ajax('POST','http://localhost/codeBuilder/web/app-config/app/config/def',{},function(response){
	  console.log("Single (def): "+response);
	});
	
	js_ajax('POST','http://localhost/codeBuilder/web/app-config/app/config/addupdate/multiple',{ data:{"eef":"def"} },function(response){
	  console.log("Single (def): "+response);
	});
});
</script>
</head>
<body>


</body>
</html>
