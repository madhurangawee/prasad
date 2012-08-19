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
		 
	function editCart($BOOK_ID,$QUANTITY,$TOTAL,$sessID)
	{
		 
		 
		 $query = "UPDATE temp_cart SET  CUS_ID = '".$_SESSION['CUS_ID']."' , QUANTITY = '".$QUANTITY."' , TOTAL = '".$TOTAL."' , ADDED_DATE = CURDATE() WHERE  BOOK_ID = '".$BOOK_ID."' AND SESSION_ID ='".$sessID."' AND CUS_ID = '".$_SESSION['CUS_ID']."'";
										   
		 $ret =  MySQL :: query($query);
		// echo $query;
		 if(MySQL ::countAffected()>0)
			return true;											
		else
			return false;								   
		 
	}
	
	function editINCart($QUANTITY,$TOTAL,$ID)
	{
		 
		 
		 $query = "UPDATE temp_cart SET  CUS_ID = '".$_SESSION['CUS_ID']."' , QUANTITY = '".$QUANTITY."' , TOTAL = '".$TOTAL."'  WHERE  ID = '".$ID."' ";
										   
		 $ret =  MySQL :: query($query);
		 //echo $query;
		 if(MySQL ::countAffected()>0)
			return true;											
		else
			return false;								   
		 
	}

   function addAdresToCustomer($CUS_STREET,$CUS_CITY ,$CUS_PROVINCE ,$CUS_POSTCODE ,$CUS_COUNTRY,$CUS_ID)
   {
		 
		 $query = "UPDATE customer SET  CUS_STREET = '".$CUS_STREET."' , CUS_CITY = '".$CUS_CITY."' ,CUS_PROVINCE = '".$CUS_PROVINCE."' ,CUS_POSTCODE = '".$CUS_POSTCODE."' ,CUS_COUNTRY = '".$CUS_COUNTRY."'  WHERE CUS_ID ='".$CUS_ID."'";
										   
		 $ret =  MySQL :: query($query);
		 //echo $query;
		 if(MySQL ::countAffected()>0)
			return true;											
		else
			return false;								   
		 
	}

function updateAddress($ID,$CUS_NAME,$SHIP_STREET,$SHIP_CITY,$SHIP_PROVINCE,$SHIP_POSTCODE,$SHIP_COUNTRY,$SHIP_TYPE,$DESCRIPTION,$ORDER_TOTAL){
		 
		 
		 $query = "UPDATE orders SET  CUS_NAME = '".$CUS_NAME."' , SHIP_STREET = '".$SHIP_STREET."' , SHIP_CITY = '".$SHIP_CITY."' , SHIP_PROVINCE = '".$SHIP_PROVINCE."' ,SHIP_COUNTRY ='".$SHIP_COUNTRY."' , SHIP_POSTCODE = '".$SHIP_POSTCODE."' ,SHIP_TYPE = '".$SHIP_TYPE."' , ORDER_TOTAL = '".$ORDER_TOTAL."' , DESCRIPTION = '".$DESCRIPTION."',ORDER_TOTAL  = '".$ORDER_TOTAL."' WHERE ID = '".$ID."'";
										   
		 $ret =  MySQL :: query($query);
		// echo $query;
		 if(MySQL ::countAffected()>0)
			return true;											
		else
			return false;								   
		 
		 }
	function updateProfile($F_NAME,$L_NAME,$DOB,$CUS_MAIL,$CUS_TEL,$CUS_MOBILE,$CUS_STREET,$CUS_CITY,$CUS_PROVINCE,$CUS_POSTCODE)
   {
		 
		 $query = "UPDATE customer SET  F_NAME = '".$F_NAME."' ,L_NAME = '".$L_NAME."' ,DOB = '".$DOB."' ,CUS_MAIL = '".$CUS_MAIL."' ,CUS_TEL = '".$CUS_TEL."' ,CUS_MOBILE = '".$CUS_MOBILE."' ,CUS_STREET = '".$CUS_STREET."' , CUS_CITY = '".$CUS_CITY."' ,CUS_PROVINCE = '".$CUS_PROVINCE."' ,CUS_POSTCODE = '".$CUS_POSTCODE."'   WHERE CUS_ID ='".$_SESSION['CUS_ID']."'";
										   
		 $ret =  MySQL :: query($query);
		// echo $query;
		 if(MySQL ::countAffected()>0)
			return true;											
		else
			return false;								   
		 
	}
	function updatePassword($CUS_PASWRD)
	{
		 
		 
		 $query = "UPDATE customer SET  CUS_PASWRD = '".$CUS_PASWRD ."'  WHERE  CUS_ID  = '".$_SESSION['CUS_ID']."' ";
										   
		 $ret =  MySQL :: query($query);
		 //echo $query;
		 if(MySQL ::countAffected()>0)
			return true;											
		else
			return false;								   
		 
	}
	function updateConfirmation($id)
	{
 
		 $query = "UPDATE customer SET  CONFIRM_CODE_STATUS = '1', STATUS = '1'  WHERE  CONF_CODE  = '".$id."' ";
										   
		 $ret =  MySQL :: query($query);
		 //echo $query;
		 if(MySQL ::countAffected()>0)
			return true;											
		else
			return false;								   
		 
	}
	function updateNewPassword($newENCPass,$CUS_MAIL)
	{
 
		 $query = "UPDATE customer SET  CUS_PASWRD = '".$newENCPass."'  WHERE  CUS_MAIL  = '".$CUS_MAIL."' ";
										   
		 $ret =  MySQL :: query($query);
		 //echo $query;
		 if(MySQL ::countAffected()>0)
			return true;											
		else
			return false;								   
		 
	}
	function updateCommentToWishList($ID,$comment)
	{
 
		 $query = "UPDATE wish_list SET  COMMENT = '".$comment."'  WHERE  ID  = '".$ID."' ";
										   
		 $ret =  MySQL :: query($query);
		 //echo $query;
		 if(MySQL ::countAffected()>0)
			return true;											
		else
			return false;								   
		 
	}
	function addReviewTOBooks($REVIEW,$BOOK_ID)
	{
 
		 $query = "UPDATE books SET  REVIEW = '".$REVIEW."'  WHERE  BOOK_ID  = '".$BOOK_ID."' ";
										   
		 $ret =  MySQL :: query($query);
		 //echo $query;
		 if(MySQL ::countAffected()>0)
			return true;											
		else
			return false;								   
		 
	}
	function updateUserCount($newCount)
	{
 
		 $query = "UPDATE user_count SET  COUNT = '".$newCount."'  WHERE  DATE  = CURDATE() ";
										   
		 $ret =  MySQL :: query($query);
		 //echo $query;
		 if(MySQL ::countAffected()>0)
			return true;											
		else
			return false;								   
		 
	}
	
	
}
		   




?>