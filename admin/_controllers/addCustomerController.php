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

           $F_NAME = MySQL :: escape($_POST['F_NAME']);
           $L_NAME = MySQL :: escape($_POST['L_NAME']);
           $CUS_STREET = MySQL :: escape($_POST['CUS_STREET']);
		   $CUS_CITY = MySQL :: escape($_POST['CUS_CITY']);
		   $CUS_PROVINCE = MySQL :: escape($_POST['CUS_PROVINCE']);
		   $CUS_POSTCODE = MySQL :: escape($_POST['CUS_POSTCODE']);
		   $CUS_COUNTRY = MySQL :: escape($_POST['CUS_COUNTRY']);
           $CUS_MAIL = MySQL :: escape($_POST['CUS_MAIL']);
           $CUS_TEL = MySQL :: escape($_POST['CUS_TEL']);
		   $CUS_MOBILE = MySQL :: escape($_POST['CUS_MOBILE']);
		   $CUS_DES = MySQL :: escape($_POST['CUS_DES']);
		   //$CUS_ADD_DATE = now();
		   $CUS_ADD_BY = MySQL :: escape($_POST['CUS_DES']);
		   
		   $CODE = $service->rand_str(8);
		   
		   $ENCUS_PASWRD = md5($CODE);
		   
		   $resultSet = $service->checkCustomerEmail($CUS_MAIL);
		   
		   if($resultSet != 0){
			   
			   echo "no";
			   
			   } else{
		   
		   $res = $add->registerCustomers($F_NAME,$L_NAME,$CUS_STREET,$CUS_CITY ,$CUS_PROVINCE ,$CUS_POSTCODE ,$CUS_COUNTRY ,$CUS_MAIL,$ENCUS_PASWRD,$CUS_TEL,$CUS_MOBILE,$CUS_DES);
		   
		   
		   
		   $mails->CustomerRegistration($F_NAME,$CODE,$CUS_MAIL);
		   
		   if($res){
			   echo 'ok';
			   }
			 }
		   




?>