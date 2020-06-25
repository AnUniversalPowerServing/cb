<?php
session_start(); 
$PROJECT_URL = 'http://localhost/cB/';
$PROTOCOL = (isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']==='on'?"https":"http");
$PAGE_URL = $PROTOCOL."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 
$PAGE_PATH = str_replace($PROJECT_URL,'',$PAGE_URL);
$PAGE_ACCPERMISSIONS = '';
/* User Account Info */
$ADMIN_ACCOUNT_ROLENAME = '';  if(isset($_SESSION["ADMIN_ACCOUNT_ROLENAME"])){ $ADMIN_ACCOUNT_ROLENAME = $_SESSION["ADMIN_ACCOUNT_ROLENAME"]; }

function accessPermissions($topicName,$crud){
 $result = 'CURL_NOT_ENABLED';
 if(function_exists('curl_version')){
  $url = $GLOBALS['PROJECT_URL'].'admin/module/access/page';
  $data = array('role' => $GLOBALS['ADMIN_ACCOUNT_ROLENAME'], 'pagePath' => $GLOBALS['PAGE_PATH']);
  $options = array(
    $GLOBALS['PROTOCOL'] => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
  );
  $context  = stream_context_create($options);
   $result = file_get_contents($url, false, $context);
   if ($result === FALSE) { /* Handle error */ }
   else {
	    $result = json_decode($result);
		$GLOBALS['PAGE_ACCPERMISSIONS'] = $result;
		for($index=0;$index<count($result);$index++){
		  $topcName = $result->{'pages'}[$index]->{'topcName'};
		  if($topicName == $topcName){
			  $result = $result->{'pages'}[$index]->{$crud};
			  break;
		  }
		}
   }
 }
 return $result;
}
?>
<script type="text/javascript">
 var PROJECT_URL='<?php echo $PROJECT_URL; ?>';
 var USR_LANG='english';
</script>