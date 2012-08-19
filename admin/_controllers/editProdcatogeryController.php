<?php
session_start();
require_once('../_config/config.php'); 
require_once('../_class/mysql.php');
require_once('../_class/Class.Edit.php');
require_once('../_class/Class.Service.php');
require_once('../_class/Class.Mail.php');

	$CAT_ID = MySQL :: escape($_POST['id']);
	$ProdCat = MySQL :: escape($_POST['ProdCat']);


		    $result =   EDIT ::  editProdCat($CAT_ID,$ProdCat);    
                                                                
	                if(isset($result))
						{
						echo "1";
						 } 
?>