<?php
session_start();
include_once("../_config/config.php");
require_once('../_class/mysql.php');
require_once('../_class/Class.Edit.php');
require_once('../_class/Class.Add.php');
require_once('../_class/Class.Service.php');
require_once('../_class/Class.Mail.php');


        $id = $_POST['id'];
		
		
        $edit= new EDIT();
		$add= new ADD();
		$mails = new MAIL();
		$service = new SERVICE();
		
		
		
		$ret = $edit ->changeDeliverStatus($id); 
		$result = $service->getCustomerdetForMail($id);
		$mails->sendDeliverMailToCus($result['F_NAME'],$result['CUS_MAIL'],$id);
	     //echo $ID;
		 $resultSet = $service->getOrderDetails($id);
		$adding = $add->addIncomeDetails($resultSet['ORDER_TOTAL']);
		
		//mark as duplicate coz same function use in twice.. refer in service cls comment.
		$resultset = $service ->getCartDataDuplicate($id);
		
		
         foreach($resultset as $row)
		 {
			 
				
				$resultset2 = $service ->getBooksDet($row['BOOK_ID']);
				
				if($row['QUANTITY'] >  $resultset2['QUANTITY'])
				{
					$QTY = 0;
				}else
				{
					
				    $QTY = $resultset2['QUANTITY'] - $row['QUANTITY'];
				}
				 $update = $edit->updateBooks($row['BOOK_ID'],$QTY);
		 }
		
		
		?>