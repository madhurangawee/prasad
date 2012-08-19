<?php
class ADD {
	 
	 
	 
	 function registerCustomers($F_NAME,$L_NAME,$CUS_STREET,$CUS_CITY ,$CUS_PROVINCE ,$CUS_POSTCODE ,$CUS_COUNTRY ,$CUS_MAIL,$ENCUS_PASWRD,$CUS_TEL,$CUS_MOBILE,$CUS_DES){
		 
		 $query = "INSERT INTO customer SET  F_NAME ='".$F_NAME."' , L_NAME = '".$L_NAME."' , CUS_STREET = '".$CUS_STREET."' , CUS_CITY = '".$CUS_CITY."' ,CUS_PROVINCE = '".$CUS_PROVINCE."' ,CUS_POSTCODE = '".$CUS_POSTCODE."' ,CUS_COUNTRY = '".$CUS_COUNTRY."' ,CUS_MAIL = '".$CUS_MAIL."' ,CUS_TEL = '".$CUS_TEL."' ,CUS_MOBILE = '".$CUS_MOBILE."' ,CUS_PASWRD ='".$ENCUS_PASWRD."' , CUS_DES = '".$CUS_DES."',CONF_CODE = '".$CODE."', ADDED_DATE = CURDATE(), STATUS = '1' ,CONFIRM_CODE_STATUS ='1'  ";
										   
		 $ret =  MySQL :: query($query);
		// echo $query;
		 if(MySQL ::countAffected()>0)
			return true;											
		else
			return false;								   
		 
		 }

    function registerSupplier($SUP_TYPE,$SUP_COM_NAME,$SUP_COM_STREET,$SUP_COM_CITY ,$SUP_COM_PROVINCE ,$SUP_COM_POSTCODE ,$SUP_COM_COUNTRY ,$SUP_COM_TEL,$SUP_COM_MAIL,$SUP_COM_WEBSITE,$SUP_CON_NAME,$SUP_CON_MAIL ,$SUP_CON_MOBILE ,$SUP_CON_DES,$ENSUP_PASWRD){
		 
		 $query = "INSERT INTO supplier SET  SUP_TYPE ='".$SUP_TYPE."' , SUP_COM_NAME = '".$SUP_COM_NAME."' , SUP_COM_STREET = '".$SUP_COM_STREET."' , SUP_COM_CITY = '".$SUP_COM_CITY."' ,SUP_COM_PROVINCE = '".$SUP_COM_PROVINCE."' ,SUP_COM_POSTCODE = '".$SUP_COM_POSTCODE."' ,SUP_COM_COUNTRY = '".$SUP_COM_COUNTRY."' ,SUP_COM_TEL = '".$SUP_COM_TEL."' ,SUP_COM_EMAIL = '".$SUP_COM_MAIL."' ,SUP_COM_WEBSITE = '".$SUP_COM_WEBSITE."' ,
		                                   SUP_CON_NAME ='".$SUP_CON_NAME."' , SUP_CON_EMAIL = '".$SUP_CON_MAIL."',SUP_CON_MOBILE = '".$SUP_CON_MOBILE."',SUP_DET = '".$SUP_CON_DES."' SUP_PASSWORD = '".$ENSUP_PASWRD."' ,ADDED_DATE = CURDATE(), STATUS = '1' ";
										   
		 $ret =  MySQL :: query($query);
		 //echo $query;
		 if(MySQL ::countAffected()>0)
			return true;											
		else
			return false;								   
		 
		 }
		 
		 function addBooks($BOOK_NAME, $BOOK_TYPE,$ICBS_NO, $BOOK_AUTHOR, $BOOK_PUBLISHER, $PURCHASE_PRICE, $SELL_PRICE,$QUANTITY, $ISSUED_DATE, $DESCRIPTION, $BOOK_COVER, $SAMPLE_PDF,$BOOK_SUP){
		 
		 $query = "INSERT INTO books SET  BOOK_NAME ='".$BOOK_NAME."' , BOOK_TYPE = '".$BOOK_TYPE."' , ICBS_NO = '".$ICBS_NO."' , BOOK_AUTHOR = '".$BOOK_AUTHOR."' ,BOOK_PUBLISHER = '".$BOOK_PUBLISHER."' ,PURCHASE_PRICE = '".$PURCHASE_PRICE."' ,SELL_PRICE ='".$SELL_PRICE."' ,QUANTITY ='".$QUANTITY."' , ISSUED_DATE = '".$ISSUED_DATE."' ,DESCRIPTION = '".$DESCRIPTION."' ,BOOK_COVER = '".$BOOK_COVER."' ,SAMPLE_PDF = '".$SAMPLE_PDF."' ,SUP_ID = '".$BOOK_SUP."',ADDED_DATE = CURDATE(), STATUS = '1' ";
										   
		 $ret =  MySQL :: query($query);
		 //echo $query;
	     return true;											
	 
		 }
		 
function addBooksCatogery($CATOGERY_NAME){
	
	 $query = "INSERT INTO book_catogery SET  CATOGERY_NAME ='".$CATOGERY_NAME."' , STATUS='1'";
										   
		 $ret =  MySQL :: query($query);
		 
	     return true;
	
	}

function addProducts($PROD_NAME, $PROD_TYPE,$SUB_PROD_TYPE ,$PROD_SUP, $PURCHASE_PRICE, $SELL_PRICE, $QUANTITY, $DESCRIPTION,$QUANTITY, $PROD_pic){
		 
		 $query = "INSERT INTO products SET  PROD_NAME ='".$PROD_NAME."' , PROD_TYPE = '".$PROD_TYPE."' ,SUB_PROD_TYPE = '".$SUB_PROD_TYPE."' , SUP_ID = '".$PROD_SUP."',PURCHASE_PRICE = '".$PURCHASE_PRICE."' ,SELL_PRICE ='".$SELL_PRICE."' ,PROD_QUANTITY ='".$QUANTITY."'  ,PROD_DESC = '".$DESCRIPTION."' ,PROD_PIC = '".$PROD_pic."',ADDED_DATE = CURDATE() , STATUS = '1' ";
										   
		 $ret =  MySQL :: query($query);
		 
	     return true;											
	 
		 }
function addProdType($PROD_TYPE){
	
	 $query = "INSERT INTO prod_catogery SET  CATOGERY_NAME ='".$PROD_TYPE."'";
										   
		 $ret =  MySQL :: query($query);
		 
	     return true;
	
	}
	function addPublishers($PUB_NAME){
	
	 $query = "INSERT INTO publishers SET  PUB_NAME ='".$PUB_NAME."'";
										   
		 $ret =  MySQL :: query($query);
		 
	     return true;
	
	}
function addSubProdType($SUB_PROD_TYPE,$PROD_TYPE){
	
	 $query = "INSERT INTO prod_sub_catogery SET  	SUB_CATOGERY_NAME ='".$SUB_PROD_TYPE."' , CATOGERY_ID ='".$PROD_TYPE."'";
										   
		 $ret =  MySQL :: query($query);
		 
	     return true;
	
	}
	function addAdmin($ADMIN_NAME, $ADMIN_TYPE, $ADMIN_USER_NAME ,$ADMIN_PASSWORD,$DESCRIPTION){
		 
		 $query = "INSERT INTO admins SET  ADMIN_NAME ='".$ADMIN_NAME."' , ADMIN_TYPE = '".$ADMIN_TYPE."' ,ADMIN_USERNAME = '".$ADMIN_USER_NAME."' , ADMIN_PASSWORD = '".$ADMIN_PASSWORD."',DESCRIPTION = '".$DESCRIPTION."' ,ADDED_DATE = CURDATE() , STATUS = '1' ";
										   
		 $ret =  MySQL :: query($query);
		 
	     return true;											
	 
		 }
		 function addToBill($ITEM_ID, $ITEM_NAME, $ITEM_TYPE ,$ITEM_PRICE,$ITEM_QTY,$TOTAL){
	
	 $query = "INSERT INTO temp_bill SET ITEM_ID ='".$ITEM_ID."' , ITEM_NAME ='".$ITEM_NAME."', ITEM_TYPE ='".$ITEM_TYPE."', PRICE ='".$ITEM_PRICE."', QTY ='".$ITEM_QTY."', TOTAL ='".$TOTAL."'";
										   
		 $ret =  MySQL :: query($query);
		 
	     return true;
	
	}
	function addIncomeDetails($AMOUNT){
	
	 $query = "INSERT INTO income SET AMOUNT ='".$AMOUNT."',ADDED_DATE = CURDATE(), ADDED_BY = '".$_SESSION['ADMIN_ID']."' ";
										   
		 $ret =  MySQL :: query($query);
		 
	     return true;
	
	}
	function addBillDetails($Bill_ID,$ITEM_ID,$ITEM_TYPE,$PRICE,$QTY,$TOTAL){
	
	 $query = "INSERT INTO billing SET Bill_ID ='".$Bill_ID."',ITEM_ID ='".$ITEM_ID."',ITEM_TYPE ='".$ITEM_TYPE."',PRICE ='".$PRICE."',QTY ='".$QTY."',TOTAL ='".$TOTAL."',ADDED_DATE = CURDATE(), ADDED_BY = '".$_SESSION['ADMIN_ID']."' ";
										   
		 $ret =  MySQL :: query($query);
		 
	     return true;
	
	}
	function add_invoice_details($PROD_ID,$SUP_ID,$PROD_TYPE,$PRICE,$QUANTITY,$MESSAGE_ADMIN){
	
	 $query = "INSERT INTO invoice SET PROD_ID ='".$PROD_ID."',SUP_ID ='".$SUP_ID."',PROD_TYPE ='".$PROD_TYPE."',PRICE ='".$PRICE."',QUANTITY ='".$QUANTITY."',MESSAGE_ADMIN ='".$MESSAGE_ADMIN."',ADDED_DATE = CURDATE() ";
										   
		 $ret =  MySQL :: query($query);
		 
	     return MySQL :: getLastId();
	
	}



}
		   




?>