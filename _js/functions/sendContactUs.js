function sendContactUs(id)
  {
	
	var contactname = document.getElementById('contactname').value;
	var email = document.getElementById('email-address').value;
	var enquiry = document.getElementById('enquiry').value;

	
	if(document.getElementById('contactname').value =='' || document.getElementById('email-address').value =='' || document.getElementById('enquiry').value == '' )
	{
		
		$('#msg').html('<p  class="warning"  ><strong>Please Enter all required fields.</strong></p>');
		
		
	}else
		{
			
            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
             var address = document.getElementById('email-address').value;
              if(reg.test(address) == false) 
			  {
               $('#msg').html('<p class="error" ><strong>Please enter Correct email address.</strong></p>');
               return false;
              }


	
	         var dataURL = 'contactname='+ contactname + '&email='+email+ '&enquiry=' + enquiry;
	
	
	        $('#msg').html('<p style="color:#007900" >please wait...</p>');
	
$.ajax({
   type: "POST",
   url: "_controllers/sendContactUsMessage.php",
   data: dataURL,
   success: function(msg){
     ///alert(msg);
	 if(msg){ 
			 
	$('#msg').html('<p class="success" >Your inquiry succesfully sent. Thank you for contacting us..</p>');
	 
	document.getElementById('contactname').value= " ";
	document.getElementById('email-address').value= "";
	document.getElementById('enquiry').value= "";

	 }
	 }
 });
}}
