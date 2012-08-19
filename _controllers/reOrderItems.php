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

		   
	          $cartDet = $service->viewCartByOrder($ID);	
			   

			  foreach($cartDet as $row)
			  {
				
				$checkCart = $service->checkCartDetails($row['BOOK_ID'],0);
				if($checkCart==0)
			  {
				$add->addToTempfromCart($row['BOOK_ID'],$row['BOOK_NAME'],$row['IMAGE'],$row['QUANTITY'],$row['PRICE'],$row['TOTAL']);  
			  }else{
				  
				  $cartResult = $service->getCartDet($row['BOOK_ID'],0);
				  
				   $updateQTY = $cartResult['QUANTITY'] + $row['QUANTITY'];
				   
				   $updateTOTAL = $row['PRICE'] * $updateQTY ;
				   $edit->editCart($row['BOOK_ID'],$updateQTY,$updateTOTAL,0);
				  }
			  }
			     
		          
		   if($resultSet != 0){
			   
			   echo "yes";
			   
			   } 

?>