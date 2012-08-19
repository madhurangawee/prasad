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


           $mode = $_POST['mode'];
           $F_NAME = MySQL :: escape($_POST['firstname']);
           $L_NAME = MySQL :: escape($_POST['lastname']);
           $DOB = MySQL :: escape($_POST['dob']);
           $CUS_MAIL = MySQL :: escape($_POST['email']);
           $CUS_TEL = MySQL :: escape($_POST['telephone']);
           $CUS_MOBILE = MySQL :: escape($_POST['mobile']);
		   $CUS_STREET = MySQL :: escape($_POST['street_address']);
		   $CUS_CITY = MySQL :: escape($_POST['city']);
		   $CUS_PROVINCE = MySQL :: escape($_POST['state']);
		   $CUS_POSTCODE = MySQL :: escape($_POST['postcode']);
		   $CUS_PASWRD = MySQL :: escape($_POST['passwordCurent']);
		   $CUS_PASWRD_NEW = MySQL :: escape($_POST['passwordConfirm']);
		   
		   $CUS_PASWRD_CRNT_EN = md5($CUS_PASWRD);
           $CUS_PASWRD_NEW_EN = md5($CUS_PASWRD_NEW);
		   
		  // $CODE = $service->rand_str(8);
		  if($mode=='edit'){
		   $res = $edit->updateProfile($F_NAME,$L_NAME,$DOB,$CUS_MAIL,$CUS_TEL,$CUS_MOBILE,$CUS_STREET,$CUS_CITY,$CUS_PROVINCE,$CUS_POSTCODE);
		  
		  }
		  if($mode=='editPass'){
			  
			  
			  $result = $service->chkPasswordForChange($CUS_PASWRD_CRNT_EN);
			  if($result != 0){
			  
			  $res = $edit->updatePassword($CUS_PASWRD_NEW_EN);
			  }else{
				  echo 'no';
				  }}
		   
		  // $mails->CustomerRegistration($F_NAME,$CODE,$CUS_MAIL);
		   
		   if($res){
			   echo 'ok';
			   }
		   

?>