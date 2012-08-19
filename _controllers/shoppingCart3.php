<?php
session_start();

require_once('../_config/config.php'); 
require_once('../_class/mysql.php');
require_once('../_class/Class.Add.php');
require_once('../_class/Class.Edit.php');
require_once('../_class/Class.Delete.php');
require_once('../_class/Class.Service.php');
require_once('../_class/Class.Mail.php');

           $mails = new MAIL();
           $add = new ADD();
		   $edit= new EDIT();
		   $delete= new DELETE();
		   $service = new SERVICE();
		   
           $ID = MySQL :: escape($_POST['id']);

				  
		    if(isset($_SESSION['CUS_ID']))
			{
				$res = $service->makeAllSessidTozero($_SESSION['sessid']);
				$sessID = '0';
				
			}else{
				   $sessID = $_SESSION['sessid'];
				 }
		   
		   
	          $cartDet = $service->viewCart($sessID);	
			   

			  foreach($cartDet as $row)
			  {
				//$orderID = $service->getLastOrderID();
				$add->addToCartfromTemp($_SESSION['order_id'],$row['BOOK_ID'],$row['BOOK_NAME'],$row['IMAGE'],$row['QUANTITY'],$row['PRICE'],$row['TOTAL']);  
				  
			  }
			   
			  $resultCus = $service->getCustomerDet($_SESSION['CUS_ID']);
			  
			  
			  
		      $res = $mails->sendOrderConfirmMailToCus($res['CUS_MAIL']);
			  
			  $resultSet = $delete->deleteTempCartData($_SESSION['CUS_ID']);
			  
		          
		   if($resultSet != 0){
			   
			   echo "no";
			   
			   } 

?>