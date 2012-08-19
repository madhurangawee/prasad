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

        function checkCustomerEmail($CUS_MAIL){
		 
		 $query = "select * from customer where CUS_MAIL = '".$CUS_MAIL."'";					   
		 $ret =  MySQL :: query($query);
		 return $ret->num_rows;							   
		 
		      }
		function checkSupplierEmail($SUP_MAIL){
		 
		 $query = "select * from supplier where SUP_CON_EMAIL = '".$SUP_MAIL."'";					   
		 $ret =  MySQL :: query($query);
		 return $ret->num_rows;							   
		 
		      }
			  
		function Check_Username_Password($email) 
	{ 
		$query = "SELECT * FROM customer WHERE CUS_MAIL='".$email."'";
		$ret =  MySQL :: query($query);	
		return $ret->row;	
	}


///////////////////////////////////////		  
		function getBookCategory() 
	{ 
		$query = "SELECT * FROM book_catogery ";
		$ret =  MySQL :: query($query);	
		return $ret->rows;	
	}
	function view_BookCatogery() 
	{ 
		$query = "SELECT * FROM  book_catogery ";
		$ret =  MySQL :: query($query);	
		return $ret->rows;	
	}
////////////////////////////////////////	
		function getProdCategory() 
	{ 
		$query = "SELECT * FROM prod_catogery ";
		$ret =  MySQL :: query($query);	
		return $ret->rows;	
	}
	function getSubProdCategory() 
	{ 
		$query = "SELECT * FROM prod_sub_catogery ";
		$ret =  MySQL :: query($query);	
		return $ret->rows;	
	}
	
	function getSupplier() 
	{ 
		$query = "SELECT * FROM  supplier ";
		$ret =  MySQL :: query($query);	
		return $ret->rows;	
	}
	

    function get_Book_type($id) 
	{ 
		$query = "SELECT * FROM  book_catogery where CATOGERY_ID = '".$id."' ";
		$ret =  MySQL :: query($query);	
		return $ret->row;	
	}
	
     function view_Client_Count($status){
	   
		   if($status !=''){
		   $query = "SELECT * FROM  customer where STATUS  = '".MySQL :: escape($status)."'";
		   }
		   else {
			 $query = "SELECT * FROM  customer ";  
		   }
		$ret =  MySQL :: query($query);	
		return $ret->num_rows;
		
	}
	function view_book_Count($status){
	   
		   if($status !=''){
		   $query = "SELECT * FROM  books where STATUS  = '".MySQL :: escape($status)."'";
		   }
		   else {
			 $query = "SELECT * FROM  books ";  
			 
		   }
		$ret =  MySQL :: query($query);	
		return $ret->num_rows;
		
	} 
	function view_Order_Count($status){
	   
		   if($status !=''){
		   $query = "SELECT * FROM  orders where STATUS  = '".MySQL :: escape($status)."'";
		   }
		   else {
			 $query = "SELECT * FROM  orders ";  
			 
		   }
		$ret =  MySQL :: query($query);	
		return $ret->num_rows;
		
	} 
	 function view_products_Count($status){
	   
		   if($status !=''){
		   $query = "SELECT * FROM  products where STATUS  = '".MySQL :: escape($status)."'";
		   }
		   else {
			 $query = "SELECT * FROM  products ";  
		   }
		$ret =  MySQL :: query($query);	
		return $ret->num_rows;
		
	}
    function view_Supplier_Count($status){
	   
		   if($status !=''){
		   $query = "SELECT * FROM  supplier where STATUS  = '".MySQL :: escape($status)."'";
		   }
		   else {
			 $query = "SELECT * FROM  supplier ";  
		   }
		$ret =  MySQL :: query($query);	
		return $ret->num_rows;
		
	}
	function view_Admin_Count($status){
	   
		   if($status !=''){
		   $query = "SELECT * FROM  admins where STATUS  = '".MySQL :: escape($status)."'";
		   }
		   else {
			 $query = "SELECT * FROM  admins ";  
		   }
		$ret =  MySQL :: query($query);	
		return $ret->num_rows;
		
	}
	function  view_review_Count()
	{
		$query = "SELECT * FROM  review_books ";
		$ret =  MySQL :: query($query);	
		return $ret->num_rows;
	}
	function  view_reviews($pages)
	{
		$query = "SELECT * FROM  review_books  ORDER BY ID DESC $pages->limit ";
		$ret =  MySQL :: query($query);	
		return $ret->rows;
	}
	function view_products_Count_bySub($status,$ProdType){
	   
		   if($status !=''){
		   $query = "SELECT * FROM  products where STATUS  = '".MySQL :: escape($status)."' AND PROD_TYPE = '".$ProdType."'";
		   }
		   else {
			 $query = "SELECT * FROM  products where PROD_TYPE = '".$ProdType."' ";  
		   }
		$ret =  MySQL :: query($query);	
		return $ret->num_rows;
		
	}
     function view_Customer($status,$pages){
		
		   if($status !=''){
		   $query = "SELECT * FROM  customer where STATUS  = '".MySQL :: escape($status)."' ORDER BY CUS_ID DESC $pages->limit ";
		  
		   }
		   else {
			   
			 $query = "SELECT * FROM  customer ORDER BY CUS_ID DESC $pages->limit  ";  
		   }
		  
		$ret =  MySQL :: query($query);	
		return $ret->rows;		
    }
	function view_Books($status,$pages){
		
		   if($status !=''){
		   $query = "SELECT * FROM  books where STATUS  = '".MySQL :: escape($status)."' ORDER BY BOOK_ID DESC $pages->limit ";
		  
		   }
		   else {
			   
			 $query = "SELECT * FROM  books ORDER BY BOOK_ID DESC $pages->limit  ";  
			  
		   }
		  
		$ret =  MySQL :: query($query);	
		return $ret->rows;		
    }
	function view_Orders($status,$pages){
		
		   if($status !=''){
		   $query = "SELECT * FROM  orders where STATUS  = '".MySQL :: escape($status)."' ORDER BY ID DESC $pages->limit ";
		  
		   }
		   else {
			   
			 $query = "SELECT * FROM  orders ORDER BY ID DESC $pages->limit  ";  
			  
		   }
		  
		$ret =  MySQL :: query($query);	
		return $ret->rows;		
    }
	function view_Products($status,$pages){
		
		   if($status !=''){
		   $query = "SELECT * FROM  products where STATUS  = '".MySQL :: escape($status)."' ORDER BY PROD_ID DESC $pages->limit ";
		  
		   }
		   else {
			   
			 $query = "SELECT * FROM  products ORDER BY PROD_ID DESC $pages->limit  ";  
			  
		   }
		  
		$ret =  MySQL :: query($query);	
		return $ret->rows;		
    }
	function view_Supplier($status,$pages){
		
		   if($status !=''){
		   $query = "SELECT * FROM  supplier where STATUS  = '".MySQL :: escape($status)."' ORDER BY SUP_ID DESC $pages->limit ";
		  
		   }
		   else {
			   
			 $query = "SELECT * FROM  supplier ORDER BY SUP_ID DESC $pages->limit  ";  
			  
		   }
		  
		$ret =  MySQL :: query($query);	
		return $ret->rows;		
    }
	function view_Admin($status){
		
		   if($status !=''){
		   $query = "SELECT * FROM  admins where STATUS  = '".MySQL :: escape($status)."' ORDER BY ADMIN_ID DESC  ";
		  
		   }
		   else {
			   
			 $query = "SELECT * FROM  admins ORDER BY ADMIN_ID DESC  ";  
			  
		   }
		  
		$ret =  MySQL :: query($query);	
		return $ret->rows;		
    }
	
	function view_Products_bySub($status,$pages,$ProdType){
		
		   if($status !=''){
		   $query = "SELECT * FROM  products where STATUS  = '".MySQL :: escape($status)."' AND PROD_TYPE = '".$ProdType."'  ORDER BY PROD_ID DESC $pages->limit ";
		  
		   }
		   else {
			   
			 $query = "SELECT * FROM  products where  PROD_TYPE = '".$ProdType."' ORDER BY PROD_ID DESC $pages->limit  ";  
			  
		   }
		  
		$ret =  MySQL :: query($query);	
		return $ret->rows;		
    }
	
	function view_All_Books(){
		 $query = "SELECT * FROM  books";
		$ret =  MySQL :: query($query);	
		return $ret->rows;
		
		}
		function view_All_Products(){
		 $query = "SELECT * FROM  products";
		$ret =  MySQL :: query($query);	
		return $ret->rows;
		
		}
	function viewCustomer(){
		 $query = "SELECT * FROM  customer";
		$ret =  MySQL :: query($query);	
		return $ret->rows;
		
		}
		function view_Publishers(){
		 $query = "SELECT * FROM  publishers";
		$ret =  MySQL :: query($query);	
		return $ret->rows;
		
		}
	function changeCusStatus($id){
	
		$row_vac = $this->getCustomerDet($id);
		
		$perm = 0;
		if($row_vac["STATUS"]==0){
			$perm = 1;
		}if($row_vac["STATUS"]==1){
			$perm = 0;
		}
		$sql = "update customer set STATUS = '".$perm."' where CUS_ID ='".$id."'";
		
		$ret =  MySQL :: query($sql);	
		return $perm;
        }
	function changeBookStatus($id){
	
		$row_vac = $this->getBooksDet($id);
		
		$perm = 0;
		if($row_vac["STATUS"]==0){
			$perm = 1;
		}if($row_vac["STATUS"]==1){
			$perm = 0;
		}
		$sql = "update books set STATUS = '".$perm."' where BOOK_ID ='".$id."'";
		
		$ret =  MySQL :: query($sql);	
		return $perm;
        }
		function changeProductStatus($id){
	
		$row_vac = $this->getProdDet($id);
		
		$perm = 0;
		if($row_vac["STATUS"]==0){
			$perm = 1;
		}if($row_vac["STATUS"]==1){
			$perm = 0;
		}
		$sql = "update products set STATUS = '".$perm."' where PROD_ID ='".$id."'";
		
		$ret =  MySQL :: query($sql);	
		return $perm;
        }
		function changeSupStatus($id){
	
		$row_vac = $this->getSupplierDet($id);
		
		$perm = 0;
		if($row_vac["STATUS"]==0){
			$perm = 1;
		}if($row_vac["STATUS"]==1){
			$perm = 0;
		}
		$sql = "update supplier set STATUS = '".$perm."' where SUP_ID ='".$id."'";
		
		$ret =  MySQL :: query($sql);	
		return $perm;
        }
		function changeAdminStatus($id){
	
		$row_vac = $this->getAdminsDet($id);
		
		$perm = 0;
		if($row_vac["STATUS"]==0){
			$perm = 1;
		}if($row_vac["STATUS"]==1){
			$perm = 0;
		}
		$sql = "update admins set STATUS = '".$perm."' where ADMIN_ID ='".$id."'";
		
		$ret =  MySQL :: query($sql);	
		return $perm;
        }
		function changeReviewStatus($id){
	
		$row_vac = $this->getReviewDet($id);
		
		$perm = 0;
		if($row_vac["STATUS"]==0){
			$perm = 1;
		}if($row_vac["STATUS"]==1){
			$perm = 0;
		}
		$sql = "update review_books set STATUS = '".$perm."' where ID ='".$id."'";
		
		$ret =  MySQL :: query($sql);	
		return $perm;
        }

    function  getCustomerDet($CUS_ID)
	{
		$query = "SELECT * FROM  customer WHERE CUS_ID = '".MySQL :: escape($CUS_ID)."' ";
		$ret =  MySQL :: query($query);	
		return $ret->row;
	}
	function  getSupplierDet($SUP_ID)
	{
		$query = "SELECT * FROM  supplier WHERE SUP_ID = '".MySQL :: escape($SUP_ID)."' ";
		$ret =  MySQL :: query($query);	
		return $ret->row;
	}
	function  getBooksDet($BOOK_ID)
	{
		$query = "SELECT * FROM  books WHERE BOOK_ID = '".MySQL :: escape($BOOK_ID)."' ";
		$ret =  MySQL :: query($query);	
		return $ret->row;
	}
	function  getProdDet($PROD_ID)
	{
		$query = "SELECT * FROM  products WHERE PROD_ID = '".MySQL :: escape($PROD_ID)."' ";
		$ret =  MySQL :: query($query);	
		return $ret->row;
	}
	function  getAdminsDet($ADMIN_ID)
	{
		$query = "SELECT * FROM  admins WHERE ADMIN_ID = '".MySQL :: escape($ADMIN_ID)."' ";
		$ret =  MySQL :: query($query);	
		return $ret->row;
	}
	 function  getReviewDet($ID)
	{
		$query = "SELECT * FROM  review_books WHERE ID = '".MySQL :: escape($ID)."' ";
		$ret =  MySQL :: query($query);	
		return $ret->row;
	}
	function  viewAllBooksOftheSystem()
	{
		$query = "SELECT BOOK_NAME,BOOK_TYPE,QUANTITY,ADDED_DATE FROM  books ";
		$ret =  MySQL :: query($query);	
		return $ret->rows;
	}
	function  viewAllProductsOftheSystem()
	{
		$query = "SELECT PROD_NAME,PROD_TYPE,PROD_QUANTITY,ADDED_DATE FROM  products ";
		$ret =  MySQL :: query($query);	
		return $ret->rows;
	}
	function  viewCurrentBooksOftheSystem()
	{
		$query = "SELECT BOOK_NAME,BOOK_TYPE,QUANTITY,ADDED_DATE FROM  books  where QUANTITY > 0";
		$ret =  MySQL :: query($query);	
		return $ret->rows;
	}
    function  viewCurrentProductsOftheSystem()
	{
		$query = "SELECT PROD_NAME,PROD_TYPE,PROD_QUANTITY,ADDED_DATE FROM  products where PROD_QUANTITY > 0 ";
		$ret =  MySQL :: query($query);	
		return $ret->rows;
	}
	  function  viewOutOfStkProductsOftheSystem()
	{
		$query = "SELECT PROD_NAME,PROD_QUANTITY,ADDED_DATE FROM  products where PROD_QUANTITY <= 0 ";
		$ret =  MySQL :: query($query);	
		return $ret->rows;
	}
	function  viewOutOfStkBooksOftheSystem()
	{
		$query = "SELECT BOOK_NAME,QUANTITY,ADDED_DATE FROM  books  where QUANTITY <= 0";
		$ret =  MySQL :: query($query);	
		return $ret->rows;
	}

    function  viewDailyCustomers()
	{
		$query = "SELECT  * FROM customer where ADDED_DATE= DATE_SUB(curdate(), INTERVAL 1 DAY) ";
		$ret =  MySQL :: query($query);	
		return $ret->rows;
	}
	function  getSubTypes($id)
	{
		$query = "SELECT  * FROM prod_sub_catogery where CATOGERY_ID='".$id."' ";
		//echo $query;
		$ret =  MySQL :: query($query);	
		return $ret->rows;
	}
	function get_Product_type($id) 
	{ 
		$query = "SELECT * FROM  prod_catogery where CATOGERY_ID = '".$id."' ";
		$ret =  MySQL :: query($query);	
		return $ret->row;	
	}
	function get_sub_Product_type($id) 
	{ 
		$query = "SELECT * FROM  prod_sub_catogery where SUB_CATOGERY_ID = '".$id."' ";
		$ret =  MySQL :: query($query);	
		return $ret->row;	
	}
	function getsubProductByType($id) 
	{ 
		$query = "SELECT * FROM  prod_sub_catogery where CATOGERY_ID = '".$id."' ";
		$ret =  MySQL :: query($query);	
		return $ret->rows;	
	}
	function checkAdminStatus($id) 
	{ 
		$query = "SELECT * FROM  admins where ADMIN_ID = '".$id."' AND STATUS ='1' ";
		$ret =  MySQL :: query($query);	
		return $ret->num_rows;
	}
	
	function Check_Username_Status($id) 
	{ 
		$query = "SELECT * FROM  admins where ADMIN_USERNAME  = '".$id."' AND STATUS ='1' ";
		$ret =  MySQL :: query($query);	
		return $ret->num_rows;
	}
	function Check_Username($id) 
	{ 
		$query = "SELECT * FROM  admins where ADMIN_USERNAME  = '".$id."' ";
		$ret =  MySQL :: query($query);	
		return $ret->row;
	}
	function chkPublishers($id) 
	{ 
		$query = "SELECT * FROM  publishers where PUB_NAME  = '".$id."' ";
		$ret =  MySQL :: query($query);	
		return $ret->num_rows;
	}
	function getPublishers($id) 
	{ 
		$query = "SELECT * FROM  publishers where PUB_ID  = '".$id."' ";
		$ret =  MySQL :: query($query);	
		return $ret->row;
	}
	
	function view_Bill_details() 
	{ 
		$query = "SELECT * FROM  temp_bill ";
		$ret =  MySQL :: query($query);	
		return $ret->rows;
	}
	function view_Bill_Total() 
	{ 
		$query = "SELECT SUM(TOTAL) FROM  temp_bill ";
		$ret =  MySQL :: query($query);	
		return $ret->row;
	}
	function truncateTable() 
	{ 
		$query = "TRUNCATE TABLE temp_bill ";
		$ret =  MySQL :: query($query);	
		return true;
	}
	function getIncomeTableDetails() 
	{ 
		$query = "SELECT * FROM  income order by BILL_ID DESC limit 1";
		$ret =  MySQL :: query($query);	
		return $ret->row;
	}
	function getCartData($id,$CUS_ID) 
	{ 
		$query = "SELECT * FROM cart where CART_ID = '".$id."' AND CUS_ID = '".$CUS_ID."'  ";
		$ret =  MySQL :: query($query);	
		//echo $query;
		return $ret->rows;	
	}
	function getOrderDetails($id) 
	{ 
		$query = "SELECT * FROM  orders where ID = '".$id."'";
		$ret =  MySQL :: query($query);	
		return $ret->row;
	}
	function getTodayOrderCount() 
	{ 
		$query = "SELECT * FROM  orders where ADDED_DATE = CURDATE()";
		$ret =  MySQL :: query($query);	
		return $ret->num_rows;
	}
	function getTodayReviewCount() 
	{ 
		$query = "SELECT * FROM  review_books where ADDED_DATE = CURDATE()";
		$ret =  MySQL :: query($query);	
		return $ret->num_rows;
	}
	function getPReviewCount() 
	{ 
		$query = "SELECT * FROM  review_books where STATUS = '0' ";
		$ret =  MySQL :: query($query);	
		return $ret->num_rows;
	}
	function getCustomerdetForMail($id) 
	{ 
		$query = "SELECT * FROM customer WHERE CUS_ID IN(select CUS_ID from orders where ID = '".$id."')";
		$ret =  MySQL :: query($query);	
		return $ret->row;
	}
	// this function is using as duplicate coz have no time to get done with above one.. think both doing same thing. bt have to chk abt CUS_ID .. itz unusble. 
	function getCartDataDuplicate($id) 
	{ 
		$query = "SELECT * FROM cart where CART_ID = '".$id."' ";
		$ret =  MySQL :: query($query);	
		//echo $query;
		return $ret->rows;	
	}
	function getUserCount()
	{
  
		$query = "SELECT * FROM  user_count where DATE  = CURDATE()";
		$ret =  MySQL :: query($query);	
		return $ret->row;
		
	}
	function getmostActiveSearch()
	{
  
		$query = "SELECT * FROM most_search_keyword ORDER BY count DESC LIMIT 1 ";
		$ret =  MySQL :: query($query);	
		return $ret->row;
		
	}
	function view_OutOfStock_Books()
	{
 
		$query = "SELECT * FROM  books where STATUS  = '1' AND QUANTITY < 10 ORDER BY BOOK_NAME ASC ";
		$ret =  MySQL :: query($query);	
		return $ret->rows;		
    }
	function view_OutOfStock_Products(){
		 $query = "SELECT * FROM  products where STATUS  = '1' AND PROD_QUANTITY < 10 ORDER BY PROD_NAME ASC ";
		$ret =  MySQL :: query($query);	
		return $ret->rows;
		
		}
	
	
 }

?>