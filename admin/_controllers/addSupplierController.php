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
		   $edit = new EDIT();
		   $service = new SERVICE();
		   
           $mode = $_POST['mode'];
		   $SUP_ID = MySQL :: escape($_POST['SUP_ID']);
           $SUP_TYPE = MySQL :: escape($_POST['SUP_TYPE']);
           $SUP_COM_NAME = MySQL :: escape($_POST['SUP_COM_NAME']);
           $SUP_COM_STREET = MySQL :: escape($_POST['SUP_COM_STREET']);
		   $SUP_COM_CITY = MySQL :: escape($_POST['SUP_COM_CITY']);
		   $SUP_COM_PROVINCE = MySQL :: escape($_POST['SUP_COM_PROVINCE']);
		   $SUP_COM_POSTCODE = MySQL :: escape($_POST['SUP_COM_POSTCODE']);
		   $SUP_COM_COUNTRY = MySQL :: escape($_POST['SUP_COM_COUNTRY']);
           $SUP_COM_TEL = MySQL :: escape($_POST['SUP_COM_TEL']);
		   $SUP_COM_EMAIL = MySQL :: escape($_POST['SUP_COM_MAIL']);
           $SUP_COM_WEBSITE = MySQL :: escape($_POST['SUP_COM_WEBSITE']);
		   $SUP_CON_NAME = MySQL :: escape($_POST['SUP_CON_NAME']);
		   $SUP_CON_EMAIL = MySQL :: escape($_POST['SUP_CON_MAIL']);
		   $SUP_CON_MOBILE = MySQL :: escape($_POST['SUP_CON_MOBILE']);
		   $SUP_CON_DES = MySQL :: escape($_POST['SUP_CON_DES']);

		   
           $CODE = $service->rand_str(8);
		   $ENSUP_PASWRD = md5($CODE);

		   if($mode=='add'){
		   $resultSet = $service->checkSupplierEmail($SUP_CON_EMAIL);
		   
		   if($resultSet != 0){
			   
			   echo "no";
			   
			   } else{
		   
		   $res = $add->registerSupplier($SUP_TYPE,$SUP_COM_NAME,$SUP_COM_STREET,$SUP_COM_CITY ,$SUP_COM_PROVINCE ,$SUP_COM_POSTCODE ,$SUP_COM_COUNTRY ,$SUP_COM_TEL,$SUP_COM_EMAIL,$SUP_COM_WEBSITE,$SUP_CON_NAME,$SUP_CON_EMAIL ,$SUP_CON_MOBILE ,$SUP_CON_DES,$ENSUP_PASWRD );
		   

		   $mails->SupplierRegistration($SUP_COM_NAME,$CODE,$SUP_CON_EMAIL);
			   }}
			   
			    if($mode=='edit'){
				
				$res = $edit->editSupplier($SUP_TYPE,$SUP_COM_NAME,$SUP_COM_STREET,$SUP_COM_CITY ,$SUP_COM_PROVINCE ,$SUP_COM_POSTCODE ,$SUP_COM_COUNTRY ,$SUP_COM_TEL,$SUP_COM_EMAIL,$SUP_COM_WEBSITE,$SUP_CON_NAME,$SUP_CON_EMAIL ,$SUP_CON_MOBILE ,$SUP_CON_DES,$SUP_ID );
				}
		   if($res){
			   echo 'ok';
			   }
			 
		   




?>