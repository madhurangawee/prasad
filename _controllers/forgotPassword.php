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



           $CUS_MAIL = MySQL :: escape($_POST['email']);
		   
          //check email  is on the database.
          $result = $service->chkCustomerEmail($CUS_MAIL);
		  
		  if($result != 0)
		  {
			  //genarate new password
			  $newPassword = $service->rand_str(8);
			  
			  $newENCPass = md5($newPassword);
			  //update new password
			  $edit->updateNewPassword($newENCPass,$CUS_MAIL);
			  $res = $mails->sendResetpasswordMail($newPassword,$CUS_MAIL);
			  
			  }else{
			  echo '1';
			  }


?>