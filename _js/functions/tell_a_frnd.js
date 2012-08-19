function sendMsgToFrnd(id)
  {
	
	var from_name = document.getElementById('from_name').value;
	var from_email = document.getElementById('from_email').value;
	var to_name = document.getElementById('to_name').value;
	var to_email = document.getElementById('to_email').value;
	var email_message = document.getElementById('email_message').value;
	


	
	if(document.getElementById('from_name').value =='' || document.getElementById('from_email').value =='' || document.getElementById('to_name').value == '' ||document.getElementById('to_email').value == '' )
	{
		
		$('#msg').html('<p  class="warning"  ><strong>Please Enter all required fields.</strong></p>');
		
		
	}else
		{
			
            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
             var address = document.getElementById('from_email').value;
            var address2 = document.getElementById('to_email').value;
              if(reg.test(address) == false || reg.test(address2) == false) 
			  {
               $('#msg').html('<p class="error" ><strong>Please enter Correct email address.</strong></p>');
               return false;
              }


	
	         var dataURL = 'from_name='+ from_name + '&from_email='+from_email+ '&to_name=' + to_name+'&to_email='+to_email+'&email_message='+email_message + '&book_id='+id;
	
	
	        $('#msg').html('<p style="color:#007900" >please wait...</p>');
	
$.ajax({
   type: "POST",
   url: "_controllers/sendMessagetofrnd.php",
   data: dataURL,
   success: function(msg){
     alert(msg);
	 if(msg == 'ok'){ 
			 
	$('#msg').html('<p class="success" >Your message succesfully sent.</p>');
	 
	document.getElementsByName('from_name').value= " ";
	document.getElementById('from_email').value= "";
	document.getElementById('to_name').value= "";
	document.getElementById('to_email').value= "";
	document.getElementById('email_message').value= "";
	 }
	 }
 });
}}
