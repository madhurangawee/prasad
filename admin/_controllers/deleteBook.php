<?php
session_start();
require_once('../_config/config.php'); 
require_once('../_class/mysql.php');
require_once('../_class/Class.Delete.php');


    $BOOK_ID = $_POST['id'];

	$delete = new DELETE;
	
	$res = $delete->deleteBook($BOOK_ID);
	
	if($res){
		
	  echo "1";	
	}else{
		
	  echo "0";
		}
	
	
	
	?>