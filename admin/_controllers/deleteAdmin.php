<?php
session_start();
require_once('../_config/config.php'); 
require_once('../_class/mysql.php');
require_once('../_class/Class.Delete.php');
require_once('../_class/Class.Service.php');


    $ADMIN_ID = $_POST['id'];

	$delete = new DELETE;
	$service = new SERVICE;
	
	$result = $service->checkAdminStatus($ADMIN_ID);
	
	if($result == '0'){
		
	 $res = $delete->deleteAdmin($ADMIN_ID);
	 echo "1";
	}else{
		
	  echo "0";
		}
	
	
	
	
	
	
	?>