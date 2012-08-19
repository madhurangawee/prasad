<?php
session_start();
include_once("../_config/config.php");
require_once('../_class/mysql.php');
require_once('../_class/Class.Service.php');


        $id = $_POST['id'];
		$path = $_POST['mode'];
		
        $service= new SERVICE();
		if($path=='Cus'){
		$ret = $service ->changeCusStatus($id); 
	     echo $ret;
		}
		if($path=='Sup'){
		$ret = $service ->changeSupStatus($id); 
	     echo $ret;
		}
		if($path=='supplier'){
		$ret = $service ->changeSupplierStatus($id); 
	     echo $ret;
		}
		if($path=='books'){
		$ret = $service ->changeBookStatus($id); 
	     echo $ret;
		}
		if($path=='products'){
		$ret = $service ->changeProductStatus($id); 
	     echo $ret;
		}
		if($path=='bookCat'){
		$ret = $service ->changeBookCatStatus($id); 
	     echo $ret;
		}
		if($path=='Admin'){
		$ret = $service ->changeAdminStatus($id); 
	     echo $ret;
		}
		if($path=='review'){
		$ret = $service ->changeReviewStatus($id); 
	     echo $ret;
		}
		
		?>