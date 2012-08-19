<?php
session_start();
require_once('../_config/config.php'); 
require_once('../_class/mysql.php');
require_once('../_class/Class.Add.php');
require_once('../_class/Class.Edit.php');
require_once('../_class/Class.Service.php');



        $mode = $_POST['mode'];
        $ADMIN_ID = MySQL :: escape($_POST['ADMIN_ID']);
	
	    $ADMIN_NAME = MySQL :: escape($_POST['ADMIN_NAME']);
        $ADMIN_TYPE = MySQL :: escape($_POST['ADMIN_TYPE']);
		$ADMIN_USER_NAME = MySQL :: escape($_POST['ADMIN_USER_NAME']);
        $ADMIN_PASSWORD = MySQL :: escape($_POST['ADMIN_PASSWORD']);
		$DESCRIPTION = MySQL :: escape($_POST['DESCRIPTION']);

		$EN_ADMIN_PASSWORD = md5($ADMIN_PASSWORD);
		
	

		if($mode=='add'){
		$ret = ADD :: addAdmin($ADMIN_NAME, $ADMIN_TYPE, $ADMIN_USER_NAME ,$ADMIN_PASSWORD,$DESCRIPTION);
		
		}
		if($mode=='edit'){
		$ret = EDIT :: editAdmin($ADMIN_NAME, $ADMIN_TYPE, $ADMIN_USER_NAME ,$ADMIN_ID,$DESCRIPTION);
		
		}
		if($mode=='passsword'){
		$ret = EDIT :: editAdminPasword($ADMIN_ID ,$ADMIN_PASSWORD);
		
		}
		if($ret =='true')
			echo $ret;
		else
			echo "no";

		
		
?>