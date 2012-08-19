function addToCart(id){

		var quantity = 1;

	
	var dataURL = 'BOOK_ID='+ id + '&quantity='+quantity + '&mode=add';

	
	$('#msg').html('<p style="color:#007900" >please wait...</p>');
	
$.ajax({
   type: "POST",
   url: "_controllers/shoppingCart.php",
   data: dataURL,
   success: function(msg){
    // alert(msg);
	window.location = "cart.php";
   }
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
function deleteWishlistItem(id)
{
if(window.confirm('are you sure to delete Item.?')){
	
var dataURL = 'id='+ id ;

$.ajax({
   type: "POST",
   url: "_controllers/deleteWishlistItem.php",
   data: dataURL,
   success: function(msg){
    // alert(msg);
	 if(msg){
		 
		document.getElementById('list'+id).style.display='none';
	   // window.location.reload();
	
   }}
 });
}
	
}
function addCommentToWishList(id){

 //alert('tt');
  
var comment = document.getElementById('commnt'+id).value;

	var dataURL = 'ID='+ id +'&comment='+ comment + '&mode=addCom';

	
	$("#msg"+id).html("<img src='images/loading2.gif' />");
	
$.ajax({
   type: "POST",
   url: "_controllers/wishList.php",
   data: dataURL,
   success: function(msg){
     //alert(msg);
	 
		 $('#msg'+id).html(" ");
	 
	
   }
 });
}
