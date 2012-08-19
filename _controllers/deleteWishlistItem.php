<?php
session_start();
require_once('../_config/config.php'); 
require_once('../_class/mysql.php');

require_once('../_class/Class.Delete.php');



    $ID = $_POST['id'];

	$delete = new DELETE;
	
	$res = $delete->deleteWishlistItem($ID);
	
	if($res){
		
	  echo "1";	
	}else{
		
	  echo "0";
		}
	
	
	
	?>