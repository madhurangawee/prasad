<?php
session_start();
require_once('../_config/config.php'); 
require_once('../_class/mysql.php');
require_once('../_class/Class.Add.php');
require_once('../_class/Class.Edit.php');
require_once('../_class/Class.Service.php');
require_once('../_class/Class.Mail.php');

           $mails = new MAIL();
           $add = new ADD();
		   $edit= new EDIT();
		   $service = new SERVICE();

           $ID = MySQL :: escape($_POST['ID']);
           $BOOK_ID = MySQL :: escape($_POST['BOOK_ID']); 
		   $QTY = MySQL :: escape($_POST['quantity']);
		   $mode = $_POST['mode'];
		   
           $result = $service-> getBooksDet($BOOK_ID);
		   /*if( $result['QUANTITY']< $QTY){
			   
			   echo "exceeded";
			   }*/
		   $TOTAL = $result['SELL_PRICE'] * $QTY ;
		   
		    if(isset($_SESSION['CUS_ID']))
			{
				$res = $service->makeAllSessidTozero($_SESSION['sessid']);
				$sessID = '0';
			}else{
				$sessID = $_SESSION['sessid'];
				 }
		   
		   
		   if($mode=='add')
		   {
			  
			  $checkCart = $service->checkCartDetails($BOOK_ID,$sessID);
			  if($checkCart==0)
			  { 
		      $add->addToCart($BOOK_ID,$QTY,$result['SELL_PRICE'],$result['BOOK_NAME'],$result['BOOK_COVER'],$TOTAL,$sessID);
			  }else
			   {
				   $cartResult = $service->getCartDet($BOOK_ID,$sessID);
				  // echo $cartResult['QUANTITY'] ;
				   $updateQTY = $cartResult['QUANTITY'] + $QTY;
				   
				   $updateTOTAL = $result['SELL_PRICE'] * $updateQTY ;
				   $edit->editCart($BOOK_ID,$updateQTY,$updateTOTAL,$sessID);
			   }
		   }
		   if($mode=='edit')
		   {
			  $resultSet = $edit->editINCart($QTY,$TOTAL,$ID);
		   }
		   
		   if($resultSet != 0){
			   
			   echo "no";
			   
			   } else{
				  //echo "yes"; 
		   
			   }




?>