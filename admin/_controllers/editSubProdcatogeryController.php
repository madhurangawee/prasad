<?php
session_start();
require_once('../_config/config.php'); 
require_once('../_class/mysql.php');
require_once('../_class/Class.Edit.php');
require_once('../_class/Class.Service.php');
require_once('../_class/Class.Mail.php');

	$SUB_CAT_ID = MySQL :: escape($_POST['id']);
	$SubProdCat = MySQL :: escape($_POST['SubProdCat']);


		    $result =   EDIT ::  editSubProdCat($SUB_CAT_ID,$SubProdCat);    
                                                                
	                if(isset($result))
						{
						echo "1";
						 } 
?>