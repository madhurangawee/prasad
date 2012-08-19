<?php
class ADD {
	 
	 
	 
	function registerCustomers($F_NAME,$L_NAME,$DOB,$CUS_MAIL,$CUS_PASWRD,$CUS_SUBCRIPTION, $CODE){
		 
		 $query = "INSERT INTO customer SET  F_NAME ='".$F_NAME."' , L_NAME = '".$L_NAME."' , DOB = '".$DOB."' , CUS_MAIL = '".$CUS_MAIL."' ,
		                                   CUS_PASWRD ='".$CUS_PASWRD."' , CUS_SUBCRIPTION = '".$CUS_SUBCRIPTION."',CONF_CODE = '".$CODE."' ";
										   
		 $ret =  MySQL :: query($query);
		 //echo $query;
		 if(MySQL ::countAffected()>0)
			return true;											
		else
			return false;								   
		 
		 }
		 
	function addToCart($BOOK_ID,$QUANTITY,$PRICE,$BOOK_NAME,$BOOK_COVER,$TOTAL,$sessID){
		 
		 
		 $query = "INSERT INTO temp_cart SET  SESSION_ID ='".$sessID."' , CUS_ID = '".$_SESSION['CUS_ID']."' , BOOK_ID = '".$BOOK_ID."' , BOOK_NAME = '".$BOOK_NAME."' , IMAGE = '".$BOOK_COVER."' , QUANTITY = '".$QUANTITY."' ,PRICE ='".$PRICE."' , TOTAL = '".$TOTAL."' , ADDED_DATE = CURDATE()";
										   
		 $ret =  MySQL :: query($query);
		 //echo $query;
		 if(MySQL ::countAffected()>0)
			return true;											
		else
			return false;								   
		 
		 }
		 
	function addDeliverDetails($CUS_NAME,$SHIP_STREET,$SHIP_CITY,$SHIP_PROVINCE,$SHIP_POSTCODE,$SHIP_COUNTRY,$SHIP_TYPE,$DESCRIPTION,$ORDER_TOTAL){
		 
		 
		 $query = "INSERT INTO orders SET  CUS_ID = '".$_SESSION['CUS_ID']."' , CUS_NAME = '".$CUS_NAME."' , SHIP_STREET = '".$SHIP_STREET."' , SHIP_CITY = '".$SHIP_CITY."' , SHIP_PROVINCE = '".$SHIP_PROVINCE."' ,SHIP_COUNTRY ='".$SHIP_COUNTRY."' , SHIP_POSTCODE = '".$SHIP_POSTCODE."' ,SHIP_TYPE = '".$SHIP_TYPE."' , ORDER_TOTAL = '".$ORDER_TOTAL."' , DESCRIPTION = '".$DESCRIPTION."' , ADDED_DATE = CURDATE()";
										   
		 $ret =  MySQL :: query($query);
		// echo $query;
		 return MySQL ::getLastId();
											   
		 
		 }
	function addToCartfromTemp($CART_ID,$BOOK_ID,$BOOK_NAME,$BOOK_COVER,$QUANTITY,$PRICE,$TOTAL){
		 
		 
		 $query = "INSERT INTO cart SET  CART_ID ='".$CART_ID."' , CUS_ID = '".$_SESSION['CUS_ID']."' , BOOK_ID = '".$BOOK_ID."' , BOOK_NAME = '".$BOOK_NAME."' , IMAGE = '".$BOOK_COVER."' , QUANTITY = '".$QUANTITY."' ,PRICE ='".$PRICE."' , TOTAL = '".$TOTAL."' , ADDED_DATE = CURDATE()";
										   
		 $ret =  MySQL :: query($query);
		 //echo $query;
		 if(MySQL ::countAffected()>0)
			return true;											
		else
			return false;								   
		 
		 }
		 function addToTempfromCart($BOOK_ID,$BOOK_NAME,$BOOK_COVER,$QUANTITY,$PRICE,$TOTAL){
		 
		 
		 $query = "INSERT INTO temp_cart SET  SESSION_ID = '0', CUS_ID = '".$_SESSION['CUS_ID']."' , BOOK_ID = '".$BOOK_ID."' , BOOK_NAME = '".$BOOK_NAME."' , IMAGE = '".$BOOK_COVER."' , QUANTITY = '".$QUANTITY."' ,PRICE ='".$PRICE."' , TOTAL = '".$TOTAL."' , ADDED_DATE = CURDATE()";
										   
		 $ret =  MySQL :: query($query);
		 //echo $query;
		 if(MySQL ::countAffected()>0)
			return true;											
		else
			return false;								   
		 
		 }
	function addToWishList($BOOK_ID){
		 
		 
		 $query = "INSERT INTO wish_list SET   CUS_ID = '".$_SESSION['CUS_ID']."' , BOOK_ID = '".$BOOK_ID."' , ADDED_DATE = CURDATE()";
										   
		 $ret =  MySQL :: query($query);
		 //echo $query;
		 if(MySQL ::countAffected()>0)
			return true;											
		else
			return false;								   
		 
		 }
	function addReviewData($COMMNT,$STAR,$BOOK_ID){
		 
		 
		 $query = "INSERT INTO review_books SET   CUS_ID = '".$_SESSION['CUS_ID']."' , BOOK_ID = '".$BOOK_ID."' ,COMMNT = '".$COMMNT."', STAR = '".$STAR."' , ADDED_DATE = CURDATE()";
										   
		 $ret =  MySQL :: query($query);
		 //echo $query;
		 if(MySQL ::countAffected()>0)
			return true;											
		else
			return false;								   
		 
		 }
	function addAdvance_result_toTable($KEY_WORD){
		 
		 
		 $query = "INSERT INTO search_keys SET 	SEARCH_WORD = '".$KEY_WORD."' , ADDED_DATE = CURDATE()";
										   
		 $ret =  MySQL :: query($query);
		 //echo $query;
		 if(MySQL ::countAffected()>0)
			return true;											
		else
			return false;								   
		 
		 }
		 function addUserCount(){
		 
		 
		 $query = "INSERT INTO user_count SET 	COUNT = '1' , DATE = CURDATE()";
										   
		 $ret =  MySQL :: query($query);
		 //echo $query;
		 if(MySQL ::countAffected()>0)
			return true;											
		else
			return false;								   
		 
		 }





}
		   




?>