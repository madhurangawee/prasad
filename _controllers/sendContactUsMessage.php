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



           $contactname = MySQL :: escape($_POST['contactname']);
		   $email = MySQL :: escape($_POST['email']);
		   $enquiry = MySQL :: escape($_POST['enquiry']);
		   

		  
			  $res = $mails->sendContactUsMail($contactname,$email,$enquiry);
            if($res){
				
				 echo 'ok';
				}

?>