function editCart(id,BOOK_ID)
{

	var quantity = document.getElementById('quantity'+id).value;
	//alert(quantity);
	if(quantity == "")
	{
		quantity = 1;
	}
	
	var dataURL = 'ID='+ id + '&quantity='+quantity + '&BOOK_ID='+BOOK_ID + '&mode=edit';

	
	$('#msg').html('<p style="color:#007900" >please wait...</p>');
	
$.ajax({
   type: "POST",
   url: "_controllers/shoppingCart.php",
   data: dataURL,
   success: function(msg){
    alert(msg);
	 if(msg){
		 
		location.reload(); 
	 
	
   }}
 });
}
function deleteCartItem(id)
{

var dataURL = 'id='+ id ;

$.ajax({
   type: "POST",
   url: "_controllers/deleteCartItem.php",
   data: dataURL,
   success: function(msg){
    // alert(msg);
	 if(msg){
		 
		document.getElementById('cart'+id).style.display='none';
	    window.location.reload();
	
   }}
 });

	
}
function goToChkout2(id)
{
    //alert(id);

	var firstname = document.getElementById('firstname').value;
	var lastname = document.getElementById('lastname').value;
	var street_address = document.getElementById('street_address').value;
	var city = document.getElementById('city').value;
	var province = document.getElementById('province').value;
	var postcode = document.getElementById('postcode').value;
	var country = document.getElementById('country').value;
	var description = document.getElementById('description').value;
	
	$("input[name='shipping']").each(function () {
        if ($(this).attr('checked')) {
            shipping_format = this.value;
        }
    });
	
	
	var dataURL = 'firstname='+ firstname + '&lastname='+lastname + '&street_address='+street_address + '&city='+city + '&province='+province +'&postcode='+postcode +'&country='+country +'&shipping_format='+shipping_format+'&description='+description + '&id='+id;

	
	$('#msg').html('<p style="color:#007900" >please wait...</p>');
	
$.ajax({
   type: "POST",
   url: "_controllers/shoppingCart2.php",
   data: dataURL,
   success: function(msg){
 /// alert(msg);

		window.location ="chkout2.php";
	 
	
   }
 });
}

function confirmCart()
{
	var id = 1;
	var dataURL = 'id='+ id ;
	
	$.ajax({
   type: "POST",
   url: "_controllers/shoppingCart3.php",
   data: dataURL,
   success: function(msg){
  // alert(msg);

		window.location ="thnx.php";
	 
	
   }
 });
   
}
function reOrderItems(id)
{
	if(confirm('Are you sure to Reorder again..?')){
	var dataURL = 'id='+ id ;
	
	$.ajax({
   type: "POST",
   url: "_controllers/reOrderItems.php",
   data: dataURL,
   success: function(msg){
  /// alert(msg);

		window.location ="cart.php";
	 
	
   }
 });
	}
}