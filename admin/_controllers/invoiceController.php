<?php
session_start();
include_once("../_config/config.php");
require_once('../_class/mysql.php');
require_once('../_class/Class.Add.php');
require_once('../_class/Class.Edit.php');
require_once('../_class/Class.Mail.php');
require_once('../_class/Class.Service.php');

       $service = new SERVICE;
	   $edit = new EDIT;
	   $add = new ADD;
	   $mail = new MAIL;

            
			
		$mode = $_POST['mode'];
        $PROD_ID = MySQL :: escape($_POST['id']);
	    $SUP_ID = MySQL :: escape($_POST['sup_id']);
        $PROD_TYPE = MySQL :: escape($_POST['type']);
		$PRICE = MySQL :: escape($_POST['PRICE']);
		$QUANTITY = MySQL :: escape($_POST['QUANTITY']);
		$MESSAGE_ADMIN = MySQL :: escape($_POST['MESSAGE_ADMIN']);
			

		$resultset = $add ->add_invoice_details($PROD_ID,$SUP_ID,$PROD_TYPE,$PRICE,$QUANTITY,$MESSAGE_ADMIN);
		
		
		$supDet = $service->getSupplierDet($SUP_ID);
		
		$result = $mail->sendNoticeToSupplier($resultset,$supDet['SUP_CON_EMAIL'],$supDet['SUP_CON_NAME']);
		 
		
		if($result){
			echo "ok";

		}
		
?>