<?php
class DELETE {
	
	
	 function deleteSupplier($SUP_ID){
		
		$sql = "delete from supplier where SUP_ID = '".$SUP_ID."'";
		$ret =  MySQL :: query($sql);
		//echo $sql;
		return true;
		
		}
		function deleteAdmin($ADMIN_ID){
		
		$sql = "delete from admins where ADMIN_ID = '".$ADMIN_ID."'";
		$ret =  MySQL :: query($sql);
		//echo $sql;
		return true;
		
		}
		
	 function deleteCustomer($CUS_ID){
		
		$sql = "delete from customer where CUS_ID  = '".$CUS_ID."'";
		$ret =  MySQL :: query($sql);
		//echo $sql;
		return true;
		
		}
		function deleteBook($BOOK_ID){
		
		$sql = "delete from books where BOOK_ID  = '".$BOOK_ID."'";
		$ret =  MySQL :: query($sql);
		//echo $sql;
		return true;
		
		}
		function deleteProducts($PROD_ID){
		
		$sql = "delete from products where PROD_ID  = '".$PROD_ID."'";
		$ret =  MySQL :: query($sql);
		//echo $sql;
		return true;
		
		}
		function deleteBookCat($CAT_ID){
		
		$sql = "delete from book_catogery where CATOGERY_ID  = '".$CAT_ID."'";
		$ret =  MySQL :: query($sql);
		//echo $sql;
		return true;
		
		}
		function deleteProdCat($CAT_ID){
		
		$sql = "delete from prod_catogery where CATOGERY_ID  = '".$CAT_ID."'";
		$ret =  MySQL :: query($sql);
		//echo $sql;
		return true;
		
		}
		function deleteSubProdCat($SUB_CAT_ID){
		
		$sql = "delete from prod_sub_catogery where SUB_CATOGERY_ID  = '".$SUB_CAT_ID."'";
		$ret =  MySQL :: query($sql);
		//echo $sql;
		return true;
		
		}
		function deletePublisher($PUB_ID ){
		
		$sql = "delete from publishers where PUB_ID   = '".$PUB_ID ."'";
		$ret =  MySQL :: query($sql);
		//echo $sql;
		return true;
		
		}
		
		function deleteTempBill($TEMP_BILL_ID){
		
		$sql = "delete from temp_bill where TEMP_BILL_ID   = '".$TEMP_BILL_ID ."'";
		$ret =  MySQL :: query($sql);
		//echo $sql;
		return true;
		
		}
		function deleteOrder($ID){
		
		$sql = "delete from orders where ID   = '".$ID ."'";
		$ret =  MySQL :: query($sql);
		//echo $sql;
		return true;
		
		}
		function deleteCartItems($ID){
		
		$sql = "delete from cart where ID   = '".$ID ."'";
		$ret =  MySQL :: query($sql);
		//echo $sql;
		return true;
		
		}
		function deleteReview($ID){
		
		$sql = "delete from review_books where ID   = '".$ID ."'";
		$ret =  MySQL :: query($sql);
		//echo $sql;
		return true;
		
		}
		
		
		
	  


}
?>