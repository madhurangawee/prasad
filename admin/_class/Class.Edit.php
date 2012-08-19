<?php
class EDIT {
	 
	 
	 
	 function editCustomers($F_NAME,$L_NAME,$CUS_STREET,$CUS_CITY ,$CUS_PROVINCE ,$CUS_POSTCODE ,$CUS_COUNTRY ,$CUS_MAIL,$ENCUS_PASWRD,$CUS_TEL,$CUS_MOBILE,$CUS_DES,$CUS_ID){
		 
		 $query = "UPDATE customer SET  F_NAME ='".$F_NAME."' , L_NAME = '".$L_NAME."' , CUS_STREET = '".$CUS_STREET."' , CUS_CITY = '".$CUS_CITY."' ,CUS_PROVINCE = '".$CUS_PROVINCE."' ,CUS_POSTCODE = '".$CUS_POSTCODE."' ,CUS_COUNTRY = '".$CUS_COUNTRY."' ,CUS_MAIL = '".$CUS_MAIL."' ,CUS_TEL = '".$CUS_TEL."' ,CUS_MOBILE = '".$CUS_MOBILE."' ,CUS_PASWRD ='".$ENCUS_PASWRD."' , CUS_DES = '".$CUS_DES."',CONF_CODE = '".$CODE."' WHERE CUS_ID ='".$CUS_ID."'";
										   
		 $ret =  MySQL :: query($query);
		 //echo $query;
		 if(MySQL ::countAffected()>0)
			return true;											
		else
			return false;								   
		 
		 }

    function editSupplier($SUP_TYPE,$SUP_COM_NAME,$SUP_COM_STREET,$SUP_COM_CITY ,$SUP_COM_PROVINCE ,$SUP_COM_POSTCODE ,$SUP_COM_COUNTRY ,$SUP_COM_TEL,$SUP_COM_MAIL,$SUP_COM_WEBSITE,$SUP_CON_NAME,$SUP_CON_MAIL ,$SUP_CON_MOBILE ,$SUP_CON_DES ,$SUP_ID){
		 
		 $query = "UPDATE supplier SET  SUP_TYPE ='".$SUP_TYPE."' , SUP_COM_NAME = '".$SUP_COM_NAME."' , SUP_COM_STREET = '".$SUP_COM_STREET."' , SUP_COM_CITY = '".$SUP_COM_CITY."' ,SUP_COM_PROVINCE = '".$SUP_COM_PROVINCE."' ,SUP_COM_POSTCODE = '".$SUP_COM_POSTCODE."' ,SUP_COM_COUNTRY = '".$SUP_COM_COUNTRY."' ,SUP_COM_TEL = '".$SUP_COM_TEL."' ,SUP_COM_EMAIL = '".$SUP_COM_MAIL."' ,SUP_COM_WEBSITE = '".$SUP_COM_WEBSITE."' ,
		                                   SUP_CON_NAME ='".$SUP_CON_NAME."' , SUP_CON_EMAIL = '".$SUP_CON_MAIL."',SUP_CON_MOBILE = '".$SUP_CON_MOBILE."',SUP_DET = '".$SUP_CON_DES."',EDITED_DATE = CURDATE() where  SUP_ID = '".$SUP_ID."' ";
										   
		 $ret =  MySQL :: query($query);
		 //echo $query;
		 if(MySQL ::countAffected()>0)
			return true;											
		else
			return false;								   
		 
		 }
		 
		 function editBooks($BOOK_NAME, $BOOK_TYPE,$ICBS_NO, $BOOK_AUTHOR, $BOOK_PUBLISHER, $PURCHASE_PRICE, $SELL_PRICE,$QUANTITY, $ISSUED_DATE, $DESCRIPTION, $BOOK_COVER, $SAMPLE_PDF,$BOOK_SUP,$BOOK_ID){
		 
		 $query = "UPDATE books SET  BOOK_NAME ='".$BOOK_NAME."' , BOOK_TYPE = '".$BOOK_TYPE."' , ICBS_NO = '".$ICBS_NO."' , BOOK_AUTHOR = '".$BOOK_AUTHOR."' ,BOOK_PUBLISHER = '".$BOOK_PUBLISHER."' ,PURCHASE_PRICE = '".$PURCHASE_PRICE."' ,SELL_PRICE ='".$SELL_PRICE."' ,QUANTITY ='".$QUANTITY."' , ISSUED_DATE = '".$ISSUED_DATE."' ,DESCRIPTION = '".$DESCRIPTION."' ,BOOK_COVER = '".$BOOK_COVER."' ,SAMPLE_PDF = '".$SAMPLE_PDF."', SUP_ID = '".$BOOK_SUP."' ,EDITED_DATE = CURDATE() where BOOK_ID = '".$BOOK_ID."' ";
										   
		 $ret =  MySQL :: query($query);
		// echo $query;
	     return true;											
	 
		 }
		 
function editBookCat($CAT_ID,$CATOGERY_NAME){
	
	 $query = "UPDATE book_catogery SET  CATOGERY_NAME ='".$CATOGERY_NAME."' where CATOGERY_ID = '".$CAT_ID."'";
										   
		 $ret =  MySQL :: query($query);
		 
	     return true;
	
	}
function editProdCat($CAT_ID,$CATOGERY_NAME){
	
	 $query = "UPDATE prod_catogery SET  CATOGERY_NAME ='".$CATOGERY_NAME."' where CATOGERY_ID = '".$CAT_ID."'";
										   
		 $ret =  MySQL :: query($query);
		 
	     return true;
	
	}
	function editPublishers($PUB_NAME,$PUB_ID){
	
	 $query = "UPDATE publishers SET  PUB_NAME  ='".$PUB_NAME."' where PUB_ID  = '".$PUB_ID ."'";
										   
		 $ret =  MySQL :: query($query);
		 
	     return true;
	
	}
	function editSubProdCat($SUB_CAT_ID,$SubProdCat){
	
	 $query = "UPDATE prod_sub_catogery SET  SUB_CATOGERY_NAME ='".$SubProdCat."' where SUB_CATOGERY_ID = '".$SUB_CAT_ID."'";
										   
		 $ret =  MySQL :: query($query);
		 
	     return true;
	
	}

function editProducts($PROD_NAME, $PROD_TYPE, $SUB_PROD_TYPE ,$PROD_SUP, $PURCHASE_PRICE, $SELL_PRICE, $QUANTITY, $DESCRIPTION,$QUANTITY, $PROD_pic, $PROD_ID){
		 
		 $query = "UPDATE products SET  PROD_NAME ='".$PROD_NAME."' , PROD_TYPE = '".$PROD_TYPE."' , SUB_PROD_TYPE = '".$SUB_PROD_TYPE."' ,SUP_ID = '".$PROD_SUP."',PURCHASE_PRICE = '".$PURCHASE_PRICE."' ,SELL_PRICE ='".$SELL_PRICE."' ,PROD_QUANTITY ='".$QUANTITY."'  ,PROD_DESC = '".$DESCRIPTION."' ,PROD_PIC = '".$PROD_pic."',EDITED_DATE = CURDATE()  where PROD_ID ='".$PROD_ID."'  ";
										   
		 $ret =  MySQL :: query($query);
		//echo $query;
	     return true;											
	 
		 }
		 function editAdmin($ADMIN_NAME, $ADMIN_TYPE, $ADMIN_USER_NAME ,$ADMIN_ID,$DESCRIPTION){
		 
		 $query = "UPDATE admins SET  ADMIN_NAME ='".$ADMIN_NAME."' , ADMIN_TYPE = '".$ADMIN_TYPE."' , ADMIN_USERNAME = '".$ADMIN_USER_NAME."' ,DESCRIPTION = '".$DESCRIPTION."',EDITED_DATE = CURDATE()  where ADMIN_ID ='".$ADMIN_ID."'  ";
										   
		 $ret =  MySQL :: query($query);
		//echo $query;
	     return true;											
	 
		 }
		 
		 function editAdminPasword($ADMIN_ID ,$ADMIN_PASSWORD){
	
	 $query = "UPDATE admins SET  ADMIN_PASSWORD ='".$ADMIN_PASSWORD."' where ADMIN_ID = '".$ADMIN_ID."'";
										   
		 $ret =  MySQL :: query($query);
		 
	     return true;
	
	}
	function editBill($TEMP_BILL_ID,$ITEM_QTY,$TOTAL){
	
	 $query = "UPDATE  temp_bill SET QTY ='".$ITEM_QTY."', TOTAL ='".$TOTAL."' where TEMP_BILL_ID ='".$TEMP_BILL_ID."'";
										   
		 $ret =  MySQL :: query($query);
		 
	     return true;
	
	}
	function updateBooks($ID,$ITEM_QTY){
	
	 $query = "UPDATE  books SET QUANTITY ='".$ITEM_QTY."' where BOOK_ID ='".$ID."'";
										   
		 $ret =  MySQL :: query($query);
		 
	     return true;
	
	}
	function updateProducts($ID,$ITEM_QTY){
	
	 $query = "UPDATE  products SET PROD_QUANTITY  ='".$ITEM_QTY."' where PROD_ID ='".$ID."'";
										   
		 $ret =  MySQL :: query($query);
		 
	     return true;
	
	}
	function addAdminNote($ID,$ADMIN_MSG){
	
	 $query = "UPDATE  orders SET ADMIN_MSG  ='".$ADMIN_MSG."' , EDITED_DATE = CURDATE() where ID ='".$ID."'";
										   
		 $ret =  MySQL :: query($query);
		 
	     return true;
	
	}
	function changeDeliverStatus($ID){
	
	 $query = "UPDATE  orders SET STATUS  ='1' , EDITED_DATE = CURDATE() where ID ='".$ID."'";
										   
		 $ret =  MySQL :: query($query);
		 
	     return true;
	
	}
	



}
		   




?>