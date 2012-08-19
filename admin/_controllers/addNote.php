<?php
session_start();
require_once('../_config/config.php'); 
require_once('../_class/mysql.php');
require_once('../_class/Class.Edit.php');
require_once('../_class/Class.Service.php');
require_once('../_class/Class.Mail.php');

           $mails = new MAIL();
           $edit = new EDIT();
		   $service = new SERVICE();

           $ID = MySQL :: escape($_POST['id']);
           $ADMIN_MSG = MySQL :: escape($_POST['ADMIN_MSG']);

		   $res = $edit->addAdminNote($ID,$ADMIN_MSG);
		   
		   
		   $result = $service->getCustomerdetForMail($ID);
		   $mails->sendMailAbtAdminNote($result['F_NAME '],$ADMIN_MSG,$result['CUS_MAIL'],$ID);
		   
		   if($res){
			   echo 'ok';
			   }
			 
		   




?>