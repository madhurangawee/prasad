function addToCart(id){

//alert(quantity);
  
	var quantity = document.getElementById('quantity').value;
	 
	if(quantity == "")
	{
		quantity = 1;
	}
	
	var dataURL = 'BOOK_ID='+ id + '&quantity='+quantity + '&mode=add';

	
	$('#msg').html('<p style="color:#007900" >please wait...</p>');
	
$.ajax({
   type: "POST",
   url: "_controllers/shoppingCart.php",
   data: dataURL,
   success: function(msg){
     alert(msg);
	 if(msg == 'exceeded')
	 {
		 window.location = "cart.php?mode=excd&id="+id;
	 }else{
	window.location = "cart.php";
   }}
 });
}
function addToWishList(id){

 //alert('tt');
  

	var dataURL = 'BOOK_ID='+ id + '&mode=add';

	
	$('#msg').html('<p style="color:#007900" >please wait...</p>');
	
$.ajax({
   type: "POST",
   url: "_controllers/wishList.php",
   data: dataURL,
   success: function(msg){
     alert(msg);
	 if(msg == '2')
	 {
		 $('#msg').html('<p class="warning" >This book already in your Wish List</p>').fadeOut(4000);
	 }else{
		    window.location = "wishList.php?id=added";
		 }
	
   }
 });
}
