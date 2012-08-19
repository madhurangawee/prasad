<?php
session_start();
require_once('../_config/config.php'); 
require_once('../_class/mysql.php');
require_once('../_class/Class.Add.php');
require_once('../_class/Class.Service.php');




	
	
	    $BOOK_CATEGORY = MySQL :: escape($_POST['category']);
        
		
		$ret = ADD :: addBooksCatogery($BOOK_CATEGORY);
		
		if($ret == 'true')
			echo "ok";
		else
			echo "no";

		
		
?>