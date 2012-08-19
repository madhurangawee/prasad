<?php
session_start();
require_once('../_config/config.php'); 
require_once('../_class/mysql.php');
require_once('../_class/Class.Add.php');
require_once('../_class/Class.Service.php');
require_once('../_class/Class.Mail.php');

           $mails = new MAIL();
           $add = new ADD();
		   $service = new SERVICE();

           $FROM_NAME = MySQL :: escape($_POST['from_name']);
           $FROM_EMAIL = MySQL :: escape($_POST['from_email']);
           $TO_NAME = MySQL :: escape($_POST['to_name']);
           $TO_EMAIL = MySQL :: escape($_POST['to_email']);
           $MESSAGE = MySQL :: escape($_POST['email_message']);
		   $BOOK_ID = MySQL :: escape($_POST['book_id']);
           
           $result = $service  ->getBooksDet($BOOK_ID);
		   $res = $mails->sendMessageTofrnd($FROM_NAME,$FROM_EMAIL,$TO_NAME,$TO_EMAIL,$MESSAGE,$BOOK_ID,$result['BOOK_NAME'],$result['BOOK_AUTHOR']);
		   
		   
		   
		   if($res)
		   {
			   echo 'ok';
		   }

		   



?>