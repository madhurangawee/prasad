function confirmAccount()
  {
	
	var confirm_code = document.getElementById('confirm_code').value;

	if(document.getElementById('confirm_code').value == '' )
	{
		
		$('#msg').html('<p  class="warning"  ><strong>Please Enter all required fields.</strong></p>');
		return false;
		
	}


	         var dataURL = 'confirm_code='+ confirm_code ;
	
	
	        $('#msg').html('<p style="color:#007900" >please wait...</p>');
	
$.ajax({
   type: "POST",
   url: "_controllers/confirmAccount.php",
   data: dataURL,
   success: function(msg){
     //alert(msg);
	 if(msg == '1'){ 
			 
	$('#msg').html('<p class="error" >Please enter correct Confirmation Code .</p>');
	 
	document.getElementById('confirm_code').value= "";
	
	 }else if(msg == '2'){
		 
		 $('#accountPassword').html('<p class="warning" >your Account alredy confirmed. .</p>');
		 window.setTimeout('window.location="register.php"; ',3000);
		 }else{
			 
			 $('#accountPassword').html('<p class="success" >Your Account confirmed. .</p>');
			 window.setTimeout('window.location="register.php"; ',3000);
			 }
	 }
 });
}
