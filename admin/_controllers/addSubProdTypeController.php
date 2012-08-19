<?php
session_start();
require_once('../_config/config.php'); 
require_once('../_class/mysql.php');
require_once('../_class/Class.Add.php');
require_once('../_class/Class.Service.php');




	
	
	    $SUB_PROD_TYPE = MySQL :: escape($_POST['SUB_PROD_TYPE']);
		$PROD_TYPE = MySQL :: escape($_POST['PROD_TYPE']);
        
		
		$ret = ADD :: addSubProdType($SUB_PROD_TYPE,$PROD_TYPE);
		
		if($ret == 'true')
			echo "ok";
		else
			echo "no";

		
		
?>