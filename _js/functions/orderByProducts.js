function changeOrderBy(id)
  {

	         var dataURL = 'mode='+ id ;
 
	
$.ajax({
   type: "POST",
   url: "_controllers/orderByProducts.php",
   data: dataURL,
   success: function(msg){
     alert(msg);
	 if(msg){ 
			 
	$('#all').html(msg);
	 
	//document.getElementById('confirm_code').value= "";
	
	 }
	 }
 });
}
