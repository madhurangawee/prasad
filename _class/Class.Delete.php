<?php
class DELETE {
	 
	 
	 
	function deleteCartItem($id)
	{
		$sql = "delete from temp_cart where ID = '".$id."'";
		$ret =  MySQL :: query($sql);
		//echo $sql;
		return true;
	}
	function deleteTempCartData($id)
	{
		$sql = "delete from temp_cart where CUS_ID = '".$id."'";
		$ret =  MySQL :: query($sql);
		//echo $sql;
		return true;
	}
	function deleteWishlistItem($id)
	{
		$sql = "delete from wish_list where ID = '".$id."'";
		$ret =  MySQL :: query($sql);
		//echo $sql;
		return true;
	}



}
		   




?>