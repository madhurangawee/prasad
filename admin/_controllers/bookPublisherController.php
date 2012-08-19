<?php
session_start();
require_once('../_config/config.php'); 
require_once('../_class/mysql.php');
require_once('../_class/Class.Add.php');
require_once('../_class/Class.Edit.php');
require_once('../_class/Class.Service.php');


        $mode = $_POST['mode'];
        $PUB_ID = MySQL :: escape($_POST['id']);
	
	    $PUB_NAME = MySQL :: escape($_POST['PUB_NAME']);
       
	

		if($mode=='add'){
		$result = SERVICE :: chkPublishers($PUB_NAME);
		if($result ==0){
		$ret = ADD :: addPublishers($PUB_NAME);
		
		}
		}
		
		if($mode=='edit'){
			
			$ret = EDIT :: editPublishers($PUB_NAME,$PUB_ID);

		}
			
			if($ret =='true')
			echo $ret;
		else
			echo "no";
		
		
?>