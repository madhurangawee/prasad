function forgotPassword()
  {
	
	var email = document.getElementById('email-address').value;

	if(document.getElementById('email-address').value == '' )
	{
		
		$('#msg').html('<p  class="warning"  ><strong>Please Enter all required fields.</strong></p>');
		return false;
		
	}
	
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   var address = document.getElementById('email-address').value;
   if(reg.test(address) == false) {
     $('#msg').html('<p class="error" ><strong>Please enter Correct email address.</strong></p>');
      return false;
   }



	         var dataURL = 'email='+ email ;
	
	
	        $('#msg').html('<p style="color:#007900" >please wait...</p>');
	
$.ajax({
   type: "POST",
   url: "_controllers/forgotPassword.php",
   data: dataURL,
   success: function(msg){
     //alert(msg);
	 if(msg == '1'){ 
			 
	$('#msg').html('<p class="error" >Your Email adress is not regstered with the system. .</p>');
	 
	document.getElementById('email-address').value= "";
	
	 }else{
			 
			 $('#passwordForgotten').html('<p class="success" >Your New Password sent to your mail address. ... You will be redirect to home page with in 3 seconds. </p>');
			 window.setTimeout('window.location="index.php"; ',3000);
			 }
	 }
 });
}
