<?php
session_start();
require_once('../_config/config.php'); 
require_once('../_class/mysql.php');
require_once('../_class/Class.Add.php');
require_once('../_class/Class.Service.php');
require_once('../_class/Class.Mail.php');
include("../securimage/securimage.php");

           $mails = new MAIL();
           $add = new ADD();
		   $service = new SERVICE();
           $img = new Securimage();
		   
		   
           $F_NAME = MySQL :: escape($_POST['firstname']);
           $L_NAME = MySQL :: escape($_POST['lastname']);
           $DOB = MySQL :: escape($_POST['dob']);
           $CUS_MAIL = MySQL :: escape($_POST['email']);
           $CUS_PASWRD = MySQL :: escape($_POST['password']);
           $CUS_SUBCRIPTION = MySQL :: escape($_POST['email_format']);
		   
		   $ENCUS_PASWRD =md5($CUS_PASWRD);
		   
		  
  
          $valid = $img->check($_POST['code']);

          if($valid != true) 
		  {
              echo "error";
          } else {
    
  
		   $resultSet = $service->checkCustomerEmail($CUS_MAIL);
		   
		   if($resultSet != 0){
			   
			   echo "no";
			   
			   } else{
				   
		   $CODE = $service->rand_str(8);
		   $res = $add->registerCustomers($F_NAME,$L_NAME,$DOB,$CUS_MAIL,$ENCUS_PASWRD,$CUS_SUBCRIPTION,$CODE);
		   
		   
		   
		   $mails->CustomerRegistration($F_NAME,$CODE,$CUS_MAIL);
		   
		   if($res){
			   echo 'ok';
			   }
			 }
		   
}



?>