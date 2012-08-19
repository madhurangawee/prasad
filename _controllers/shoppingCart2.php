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
		   
           $ID = MySQL :: escape($_POST['id']);
           $CUS_NAME = MySQL :: escape($_POST['firstname']." ".$_POST['lastname']);
           $SHIP_STREET = MySQL :: escape($_POST['street_address']); 
		   $SHIP_CITY = MySQL :: escape($_POST['city']);
		   $SHIP_PROVINCE = MySQL :: escape($_POST['province']);
		   $SHIP_POSTCODE = MySQL :: escape($_POST['postcode']);
		   $SHIP_COUNTRY = MySQL :: escape($_POST['country']);
		   $SHIP_TYPE = MySQL :: escape($_POST['shipping_format']);
		   $DESCRIPTION = MySQL :: escape($_POST['description']);
		  
		   
		    if(isset($_SESSION['CUS_ID']))
			{
				$res = $service->makeAllSessidTozero($_SESSION['sessid']);
				$sessID = '0';
			}else{
				$sessID = $_SESSION['sessid'];
				 }
				 
		   
		   if($ID>0)
		   {
			   $totalCart = $service->get_Total_Cart($sessID);
			   $edit->updateAddress($ID,$CUS_NAME,$SHIP_STREET,$SHIP_CITY,$SHIP_PROVINCE,$SHIP_POSTCODE,$SHIP_COUNTRY,$SHIP_TYPE,$DESCRIPTION,$totalCart['0']);
		   }
		   else {
   
		    $edit->addAdresToCustomer($SHIP_STREET,$SHIP_CITY,$SHIP_PROVINCE,$SHIP_POSTCODE,$SHIP_COUNTRY,$_SESSION['CUS_ID']);
		   
		      $totalCart = $service->get_Total_Cart($sessID);
			  
			  $res = $add->addDeliverDetails($CUS_NAME,$SHIP_STREET,$SHIP_CITY,$SHIP_PROVINCE,$SHIP_POSTCODE,$SHIP_COUNTRY,$SHIP_TYPE,$DESCRIPTION,$totalCart['0']);
			  
			  $_SESSION['order_id'] = $res;
			  
		   }
		   
		   if($resultSet != 0){
			   
			   echo "no";
			   
			   } else{
				   
		   
			   }




?>