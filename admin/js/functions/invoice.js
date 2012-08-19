function sendInvoice(id,type,sup_id){
	
	//alert(Name);
	var QUANTITY =  document.getElementById('QUANTITY').value;
	var PRICE = document.getElementById('PRICE').value;
	var MESSAGE_ADMIN = document.getElementById('MESSAGE_ADMIN').value;
	
	
	if(document.getElementById('TOT_PRICE').value == 0 || isNaN(QUANTITY) || isNaN(PRICE))
	{
		$('#msg').html('<p class="error" >Enter Numbers only/Enter all values.</p>');
		return false;
	}
	var dataURL = "id="+id+"&type="+type+"&sup_id="+sup_id+"&QUANTITY="+QUANTITY+"&PRICE="+PRICE+"&MESSAGE_ADMIN="+MESSAGE_ADMIN+"&mode=add";
	
	$('#msg').html('<p class="info" >Please Wait...</p>');
	
	$.ajax({
   type: "POST",
   url: "_controllers/invoiceController.php",
   data: dataURL,
   success: function(msg){
    //alert(msg );
	if(msg ){
	 $('#msg').html('<p class="success" >Succesully inserted.</p>');
	 window.setTimeout('window.location="viewOtOfOrderItems.php"; ',2000);
	}
   }
 });
	
	
}
function getTotal()
{
	document.getElementById('TOT_PRICE').value = document.getElementById('QUANTITY').value * document.getElementById('PRICE').value;
	
}