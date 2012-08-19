<?php
session_start();
require_once('../_config/config.php'); 
require_once('../_class/mysql.php');
require_once('../_class/Class.Add.php');
require_once('../_class/Class.Edit.php');
require_once('../_class/Class.Service.php');



        $mode = $_POST['mode'];
        $PROD_ID = MySQL :: escape($_POST['PROD_ID']);
	
	    $PROD_NAME = MySQL :: escape($_POST['PROD_NAME']);
        $PROD_TYPE = MySQL :: escape($_POST['PROD_TYPE']);
		$SUB_PROD_TYPE = MySQL :: escape($_POST['SUB_PROD_TYPE']);
        $PROD_SUP = MySQL :: escape($_POST['PROD_SUP']);
		$PURCHASE_PRICE = MySQL :: escape($_POST['PURCHASE_PRICE']);
		$SELL_PRICE = MySQL :: escape($_POST['SELL_PRICE']);
		$QUANTITY = MySQL :: escape($_POST['QUANTITY']);
		$DESCRIPTION = MySQL :: escape($_POST['DESCRIPTION']);
		$PROD_pic = MySQL :: escape($_POST['PROD_pic']);
		
		//$ADDED_DATE = COUNTRY_DATE;
	

		if($mode=='add'){
		$ret = ADD :: addProducts($PROD_NAME, $PROD_TYPE, $SUB_PROD_TYPE ,$PROD_SUP, $PURCHASE_PRICE, $SELL_PRICE, $QUANTITY, $DESCRIPTION,$QUANTITY, $PROD_pic);
		
		}
		if($mode=='edit'){
		$ret = EDIT:: editProducts($PROD_NAME, $PROD_TYPE, $SUB_PROD_TYPE ,$PROD_SUP, $PURCHASE_PRICE, $SELL_PRICE, $QUANTITY, $DESCRIPTION,$QUANTITY, $PROD_pic, $PROD_ID);
		
		}
		if($ret =='true')
			echo $ret;
		else
			echo "no";

		
		
?>