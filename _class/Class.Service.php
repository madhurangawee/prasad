<?php
class SERVICE {
	 
	 
	 
	 

     function rand_str($length)
	 {
	        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
            $chars_length = (strlen($chars) - 1);
            $string = $chars{rand(0, $chars_length)};
              for ($i = 1; $i < $length; $i = strlen($string))
                {
                    $r = $chars{rand(0, $chars_length)};
                    if ($r != $string{$i - 1}) $string .=  $r;
                }
              return $string;
	 }

    function checkCustomerEmail($CUS_MAIL)
	{
		 
		 $query = "select * from customer where CUS_MAIL = '".$CUS_MAIL."'";					   
		 $ret =  MySQL :: query($query);
		 return $ret->num_rows;							   
		 
    }
	
	function  getCustomerDet($CUS_ID)
	{
		$query = "SELECT * FROM  customer WHERE CUS_ID = '".MySQL :: escape($CUS_ID)."' ";
		$ret =  MySQL :: query($query);	
		return $ret->row;
	}
			  
	function Check_Username_Password($email) 
	{ 
		$query = "SELECT * FROM customer WHERE CUS_MAIL='".$email."' AND STATUS = '1' AND CONFIRM_CODE_STATUS = '1' ";
		$ret =  MySQL :: query($query);	
		return $ret->row;	
	}
	
	function chkPasswordForChange($password) 
	{ 
		$query = "SELECT * FROM customer WHERE CUS_PASWRD='".$password."' AND CUS_ID = '".$_SESSION['CUS_ID']."'";
		$ret =  MySQL :: query($query);	
		return $ret->num_rows;		
	}

	function getBookCategory() 
	{ 
		$query = "SELECT * FROM book_catogery ";
		$ret =  MySQL :: query($query);	
		return $ret->rows;	
	}
	
	function view_Books_Featured() 
	{ 
		$query = "SELECT * FROM books ORDER BY RAND() LIMIT 4 ";
		$ret =  MySQL :: query($query);	
		return $ret->rows;	
	}
	function view_Books_LikeOnProductPage() 
	{ 
		$query = "SELECT * FROM books ORDER BY RAND() LIMIT 3 ";
		$ret =  MySQL :: query($query);	
		return $ret->rows;	
	}
	function view_book_Count_For_Type($type)
	{
	   	   
        $query = "SELECT * FROM  books where BOOK_TYPE ='".$type."' AND STATUS  = '1'";
		$ret =  MySQL :: query($query);	
		return $ret->num_rows;
		
	} 
	
	
	function view_Books($pages,$type)
	{
			  
		$query = "SELECT * FROM  books where STATUS  = '1' AND  BOOK_TYPE ='".$type."' ORDER BY BOOK_ID DESC $pages->limit ";
		$ret =  MySQL :: query($query);	
		return $ret->rows;		
    }
	function view_Books_JustIn()
	{
			  
		$query = "SELECT * FROM  books where STATUS  = '1' ORDER BY BOOK_ID DESC LIMIT 2 ";
		$ret =  MySQL :: query($query);	
		return $ret->rows;		
    }
	function view_Books_Under500()
	{
			  
		$query = "SELECT * FROM  books where STATUS  = '1' AND SELL_PRICE < '500' ORDER BY RAND() LIMIT 2 ";
		$ret =  MySQL :: query($query);	
		return $ret->rows;		
    }
	function view_Books_Popular()
	{
			  
		$query = "SELECT * FROM most_popular ORDER BY total DESC LIMIT 2 ";
		$ret =  MySQL :: query($query);	
		return $ret->rows;		
    }
   
    function  getBooksDet($BOOK_ID)
	{
		$query = "SELECT * FROM  books WHERE BOOK_ID = '".MySQL :: escape($BOOK_ID)."' ";
		$ret =  MySQL :: query($query);	
		return $ret->row;
	}
	function  checkWishList($BOOK_ID)
	{
		$query = "SELECT * FROM  wish_list WHERE BOOK_ID = '".MySQL :: escape($BOOK_ID)."' AND  CUS_ID = '".$_SESSION['CUS_ID']."'";
		$ret =  MySQL :: query($query);	
		return $ret->num_rows;
	}
	function  view_review_Count($BOOK_ID)
	{
		$query = "SELECT * FROM  review_books WHERE BOOK_ID = '".MySQL :: escape($BOOK_ID)."' AND STATUS = '1' ";
		$ret =  MySQL :: query($query);	
		return $ret->num_rows;
	}
	function  chkCusReviewDet($BOOK_ID)
	{
		$query = "SELECT * FROM  review_books WHERE BOOK_ID = '".MySQL :: escape($BOOK_ID)."' AND CUS_ID = '".$_SESSION['CUS_ID']."' ";
		$ret =  MySQL :: query($query);	
		return $ret->num_rows;
	}
	function  view_reviews($BOOK_ID,$pages)
	{
		$query = "SELECT * FROM  review_books WHERE BOOK_ID = '".MySQL :: escape($BOOK_ID)."' AND STATUS = '1' ORDER BY ID DESC $pages->limit ";
		$ret =  MySQL :: query($query);	
		return $ret->rows;
	}
	
	
	function get_Book_type($id) 
	{ 
		$query = "SELECT * FROM  book_catogery where CATOGERY_ID = '".$id."' ";
		$ret =  MySQL :: query($query);	
		return $ret->row;	
	}
	
	function viewCart($sessID) 
	{ 
		$query = "SELECT * FROM temp_cart where SESSION_ID ='".$sessID."' AND CUS_ID = '".$_SESSION['CUS_ID']."' ";
		$ret =  MySQL :: query($query);	
		return $ret->rows;	
	}
	function view_wish_list() 
	{ 
		$query = "SELECT * FROM wish_list where  CUS_ID = '".$_SESSION['CUS_ID']."' ";
		$ret =  MySQL :: query($query);	
		return $ret->rows;	
	}
	
	function get_Total_Cart($id) 
	{ 
		$query = "SELECT SUM(TOTAL) FROM temp_cart where SESSION_ID ='".$id."' AND CUS_ID = '".$_SESSION['CUS_ID']."'  ";
		$ret =  MySQL :: query($query);	
		return $ret->row;	
	}
	
	function checkCartDetails($BOOK_ID,$sessID)
	{
	      
        $query = "SELECT * FROM  temp_cart where BOOK_ID ='".$BOOK_ID."' AND SESSION_ID  = '".$sessID."' AND CUS_ID = '".$_SESSION['CUS_ID']."'";
		$ret =  MySQL :: query($query);	
		return $ret->num_rows;
		
	} 
	
	function makeAllSessidTozero($id) 
	{ 
		$query = "UPDATE  temp_cart SET CUS_ID = '".$_SESSION['CUS_ID']."' , SESSION_ID = '0' where SESSION_ID ='".$id."'  ";
		$ret =  MySQL :: query($query);	
		return true;	
	}
	
	function getCartDet($BOOK_ID,$sessID) 
	{ 
		$query = "SELECT * FROM temp_cart where BOOK_ID = '".$BOOK_ID."' AND SESSION_ID ='".$sessID."' AND CUS_ID = '".$_SESSION['CUS_ID']."'   ";
		$ret =  MySQL :: query($query);	
		return $ret->row;	
	}
	
	function getLastOrderID() 
	{ 
		$query = "SELECT ID FROM orders ORDER BY ID DESC LIMIT 1  ";
		$ret =  MySQL :: query($query);	
		return $ret->row;
	}
	
	function getOrderDet() 
	{ 
		$query = "SELECT * FROM orders where ID = '".$_SESSION['order_id']."'   ";
		$ret =  MySQL :: query($query);	
		return $ret->row;	
	}
	
	function getOrdersByCusID() 
	{ 
		$query = "SELECT * FROM orders where CUS_ID = '".$_SESSION['CUS_ID']."' ORDER BY ID DESC ";
		$ret =  MySQL :: query($query);	
		return $ret->rows;	
	}
	
	function viewCartByOrder($order_id) 
	{ 
		$query = "SELECT * FROM cart where CART_ID ='".$order_id."'  ";
		$ret =  MySQL :: query($query);	
		return $ret->rows;	
	}
	
	function getOrderDetByID($id) 
	{ 
		$query = "SELECT * FROM orders where ID = '".$id."'   ";
		$ret =  MySQL :: query($query);	
		return $ret->row;	
	}
	
	function chkconfirmationCode($code) 
	{ 
		$query = "SELECT * FROM customer where CONF_CODE = '".$code."' ";
		//echo $query;
		$ret =  MySQL :: query($query);	
		return $ret->num_rows;	
	}
	
	function chkconfirmationCodeStatus($code) 
	{ 
		$query = "SELECT * FROM customer where CONF_CODE = '".$code."' ";
		$ret =  MySQL :: query($query);	
		return $ret->row;	
	}
	
	function view_book_Count()
	{
  
		$query = "SELECT * FROM  books where STATUS  = '1'";
		$ret =  MySQL :: query($query);	
		return $ret->num_rows;
		
	} 
	function chkCountUser()
	{
  
		$query = "SELECT * FROM  user_count where DATE  = CURDATE()";
		$ret =  MySQL :: query($query);	
		return $ret->num_rows;
		
	}
	function getUserCount()
	{
  
		$query = "SELECT * FROM  user_count where DATE  = CURDATE()";
		$ret =  MySQL :: query($query);	
		return $ret->row;
		
	}
	function view_book_Count_Pub($id)
	{
  
		$query = "SELECT * FROM  books where STATUS  = '1' AND BOOK_PUBLISHER = '".$id."'";
		$ret =  MySQL :: query($query);	
		return $ret->num_rows;
		
	} 
	
	function view_book_Count_All()
	{
	     
		$query = "SELECT * FROM  books where STATUS  = '1'";  
		$ret =  MySQL :: query($query);	
		return $ret->num_rows;
		
	} 
	function getReviewsAvg($BOOK_ID)
	{
	     
		$query = "SELECT AVG(STAR) FROM  review_books where BOOK_ID  = '".$BOOK_ID."'";  
		$ret =  MySQL :: query($query);	
		return $ret->row;
		
	}
	
	function view_New_Books($pages)
	{
		   
        $query = "SELECT * FROM  books where STATUS  = '1' ORDER BY BOOK_ID DESC $pages->limit ";
		$ret =  MySQL :: query($query);	
		return $ret->rows;		
    }
	
	function view_All_Books($pages)
	{
 
		$query = "SELECT * FROM  books where STATUS  = '1' ORDER BY BOOK_NAME ASC $pages->limit ";
		$ret =  MySQL :: query($query);	
		return $ret->rows;		
    }
	function view_All_Books_Pub($pages,$id)
	{
 
		$query = "SELECT * FROM  books where STATUS  = '1' AND BOOK_PUBLISHER = '".$id."'  ORDER BY BOOK_NAME ASC $pages->limit ";
		$ret =  MySQL :: query($query);	
		return $ret->rows;		
    }
	function chkCustomerEmail($email) 
	{ 
		$query = "SELECT * FROM customer where CUS_MAIL = '".$email."' ";
		$ret =  MySQL :: query($query);	
		return $ret->num_rows;
	}
	function view_Publishers()
	{
		 $query = "SELECT * FROM  publishers";
		$ret =  MySQL :: query($query);	
		return $ret->rows;
		
	}
	function getPublishers($id) 
	{ 
		$query = "SELECT * FROM  publishers where PUB_ID  = '".$id."' ";
		$ret =  MySQL :: query($query);	
		return $ret->row;
	}
	/////////////////////////////////////////////////////////////////////////////
	
	function view_book_Result_Count($keyword)
	{
	   	   
        $query = "SELECT * FROM books AS b  
left join publishers AS P ON  b.BOOK_PUBLISHER = p.PUB_ID 
left join book_catogery AS c ON  b.BOOK_TYPE = c.CATOGERY_ID  

WHERE (BOOK_NAME LIKE '%".$keyword."%' OR ICBS_NO LIKE '%".$keyword."%' OR BOOK_AUTHOR LIKE '%".$keyword."%' OR PUB_NAME LIKE 

'%".$keyword."%' OR CATOGERY_NAME LIKE '%".$keyword."%' OR DESCRIPTION LIKE '%".$keyword."%' ) AND b.STATUS  = '1'";
		$ret =  MySQL :: query($query);	
		return $ret->num_rows;
		
	}
	function view_book_Result($pages,$keyword)
	{
	   	   
        $query = "SELECT * FROM books AS b  
left join publishers AS P ON  b.BOOK_PUBLISHER = p.PUB_ID 
left join book_catogery AS c ON  b.BOOK_TYPE = c.CATOGERY_ID  

WHERE (BOOK_NAME LIKE '%".$keyword."%' OR ICBS_NO LIKE '%".$keyword."%' OR BOOK_AUTHOR LIKE '%".$keyword."%' OR PUB_NAME LIKE 

'%".$keyword."%' OR CATOGERY_NAME LIKE '%".$keyword."%' OR DESCRIPTION LIKE '%".$keyword."%' ) AND b.STATUS  = '1' ORDER BY BOOK_ID DESC $pages->limit ";
		$ret =  MySQL :: query($query);	
		return $ret->rows;
		
	}
	function view_book_Advance_Result_Count($keyword,$categories_id,$publisher_id,$pfrom,$pto,$dfrom,$dto)
	{
	   	   
        $query = "SELECT * FROM books AS b  
left join publishers AS P ON  b.BOOK_PUBLISHER = p.PUB_ID 
left join book_catogery AS c ON  b.BOOK_TYPE = c.CATOGERY_ID 

WHERE (BOOK_NAME LIKE '%".$keyword."%' OR ICBS_NO LIKE '%".$keyword."%' OR BOOK_AUTHOR LIKE '%".$keyword."%' OR PUB_NAME LIKE 

'%".$keyword."%' OR CATOGERY_NAME LIKE '%".$keyword."%' OR DESCRIPTION LIKE '%".$keyword."%' ) AND b.STATUS  = '1'";

if($categories_id > 0){
	$query.=" AND b.BOOK_TYPE = '".$categories_id."'";
	}
if($categories_id > 0){
	$query.=" AND b.BOOK_PUBLISHER  = '".$publisher_id."'";
	}
if($pfrom != ""){
	$query.=" AND b.SELL_PRICE BETWEEN '".$pfrom."' ";
	}else{
		$query.=" AND b.SELL_PRICE BETWEEN '0'";
		}
if($pto != ""){
	$query.=" AND '".$pto."' ";
	}else{
		$query.=" AND '10000' ";
		}
if($dfrom != ""){
	$query.=" AND b.ADDED_DATE  BETWEEN '".$dfrom."' ";
	}else{
		$query.=" AND b.ADDED_DATE  BETWEEN '2010-09-30'";
		}
if($dto != ""){
	$query.=" AND '".$dto."' ";
	}else{
		$query.=" AND CURDATE() ";
		}
	
	//echo $query;
		$ret =  MySQL :: query($query);	
		return $ret->num_rows;
		
	}
	function view_book_Advance_Result($keyword,$categories_id,$publisher_id,$pfrom,$pto,$dfrom,$dto)
	{
	   	   
        $query = "SELECT * FROM books AS b  
left join publishers AS P ON  b.BOOK_PUBLISHER = p.PUB_ID 
left join book_catogery AS c ON  b.BOOK_TYPE = c.CATOGERY_ID 

WHERE (BOOK_NAME LIKE '%".$keyword."%' OR ICBS_NO LIKE '%".$keyword."%' OR BOOK_AUTHOR LIKE '%".$keyword."%' OR PUB_NAME LIKE 

'%".$keyword."%' OR CATOGERY_NAME LIKE '%".$keyword."%' OR DESCRIPTION LIKE '%".$keyword."%' ) AND b.STATUS  = '1'";

if($categories_id > 0){
	$query.=" AND b.BOOK_TYPE = '".$categories_id."'";
	}
if($categories_id > 0){
	$query.=" AND b.BOOK_PUBLISHER  = '".$publisher_id."'";
	}
if($pfrom != ""){
	$query.=" AND b.SELL_PRICE BETWEEN '".$pfrom."' ";
	}else{
		$query.=" AND b.SELL_PRICE BETWEEN '0'";
		}
if($pto != ""){
	$query.=" AND '".$pto."' ";
	}else{
		$query.=" AND '10000' ";
		}
if($dfrom != ""){
	$query.=" AND b.ADDED_DATE  BETWEEN '".$dfrom."' ";
	}else{
		$query.=" AND b.ADDED_DATE  BETWEEN '2010-09-30'";
		}
if($dto != ""){
	$query.=" AND '".$dto."' ";
	}else{
		$query.=" AND CURDATE() ";
		}
	
	//echo $query;
		$ret =  MySQL :: query($query);	
		return $ret->rows;
		
	}
	


 }

?>