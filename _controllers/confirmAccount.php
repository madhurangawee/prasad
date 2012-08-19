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



           $CODE = MySQL :: escape($_POST['confirm_code']);
		   
          //check confirmation code is on the database.
          $result = $service->chkconfirmationCode($CODE);
		  
		  if($result != 0)
		  {
			  //getting code staus
			  $result = $service->chkconfirmationCodeStatus($CODE);
			  
			  if($result['CONFIRM_CODE_STATUS'] != '1')
			  {
				  //update confirmation field
				  $res = $edit->updateConfirmation($CODE);
				  echo '3';
			  }else{
					  
					 echo '2';
				   }
			  
			  }else{
			  echo '1';
			  }
		   
		  // $mails->CustomerRegistration($F_NAME,$CODE,$CUS_MAIL);
		   


?>