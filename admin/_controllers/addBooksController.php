<?php
session_start();
require_once('../_config/config.php'); 
require_once('../_class/mysql.php');
require_once('../_class/Class.Add.php');
require_once('../_class/Class.Edit.php');
require_once('../_class/Class.Service.php');


        $mode = $_POST['mode'];
        $BOOK_ID = MySQL :: escape($_POST['BOOK_ID']);
	
	    $BOOK_NAME = MySQL :: escape($_POST['BOOK_NAME']);
        $BOOK_TYPE = MySQL :: escape($_POST['BOOK_TYPE']);
        $ICBS_NO = MySQL :: escape($_POST['ICBS_NO']);
		$BOOK_AUTHOR = MySQL :: escape($_POST['BOOK_AUTHOR']);
		$BOOK_PUBLISHER = MySQL :: escape($_POST['BOOK_PUBLISHER']);
		$PURCHASE_PRICE = MySQL :: escape($_POST['PURCHASE_PRICE']);
		$SELL_PRICE = MySQL :: escape($_POST['SELL_PRICE']);
        $ISSUED_DATE = MySQL :: escape($_POST['ISSUED_DATE']);
		$QUANTITY = MySQL :: escape($_POST['QUANTITY']);
		$DESCRIPTION = MySQL :: escape($_POST['DESCRIPTION']);
		$BOOK_COVER = MySQL :: escape($_POST['BOOK_COVER']);
		$BOOK_SUP = MySQL :: escape($_POST['BOOK_SUP']);
		$SAMPLE_PDF = MySQL :: escape($_POST['SAMPLE_PDF']);
		
		//$ADDED_DATE = COUNTRY_DATE;
	

		if($mode=='add'){
		$ret = ADD :: addBooks($BOOK_NAME, $BOOK_TYPE,$ICBS_NO, $BOOK_AUTHOR, $BOOK_PUBLISHER, $PURCHASE_PRICE, $SELL_PRICE,$QUANTITY, $ISSUED_DATE, $DESCRIPTION, $BOOK_COVER, $SAMPLE_PDF,$BOOK_SUP);
		
		
		}
		
		if($mode=='edit'){
			$ret = EDIT :: editBooks($BOOK_NAME, $BOOK_TYPE,$ICBS_NO, $BOOK_AUTHOR, $BOOK_PUBLISHER, $PURCHASE_PRICE, $SELL_PRICE,$QUANTITY, $ISSUED_DATE, $DESCRIPTION, $BOOK_COVER, $SAMPLE_PDF,$BOOK_SUP,$BOOK_ID);

			
			}
			if($ret =='true')
			echo $ret;
		else
			echo "no";
		
		
?>