function registerUser(){
	
	var gender = document.getElementsByName('gender').value;
	var firstname = document.getElementById('firstname').value;
	var lastname = document.getElementById('lastname').value;
	var dob = document.getElementById('dob').value;
	var email = document.getElementById('email').value;
	var passwordConfirm = document.getElementById('password-confirm').value;
	var password = document.getElementById('password').value;
	var code = document.getElementById('code').value;
	var email_format = '';
	/*$("input[type='radio']").each(function () {
        if ($(this).attr('checked')) {
            email_format = this.value;
        }
    });*/
	
	if(document.getElementById('firstname').value =='' || document.getElementById('lastname').value =='' || document.getElementById('dob').value == '' ||document.getElementById('password').value == '' ){
		
		$('#message').html('<p  class="warning"  ><strong>Please Enter all required fields.</strong></p>');
		
		
		}else{
			
   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   var address = document.getElementById('email').value;
   if(reg.test(address) == false) {
     $('#message').html('<p class="error" ><strong>Please enter Correct email address.</strong></p>');
      return false;
   }

	
	if(document.getElementById('password-confirm').value != document.getElementById('password').value){
		
		$('#message').html('<p class="warning"  ><strong>Please enter same passwords.</strong></p>');
		return false;
		}
	if(passwordConfirm.length < 7 )
	{
		$('#message').html('<p class="warning"  ><strong>Password should be more at least 7 letters.</strong></p>');
	    return false;
	}
 
  
	
	var dataURL = 'gender='+ gender + '&firstname='+firstname+ '&lastname=' + lastname+'&dob='+dob+'&email='+email+'&password='+passwordConfirm+'&email_format='+email_format+'&code='+code;
	
	
	$('#message').html('<p style="color:#007900" >please wait...</p>');
	
$.ajax({
   type: "POST",
   url: "_controllers/customerRegister.php",
   data: dataURL,
   success: function(msg){
     //alert(msg);
	 if(msg == 'no'){
		 
		 $('#message').html('<p class="info" >Your email address already register with the system. if you forgot the password please <strong><a href="forgotPassword.php" >clickhere</a>.</strong> </p>');
		 
		 }else if(msg == 'error')
		 {
			 $('#message').html('<p class="error" >Please Enter correct code </p>');
			 document.getElementById('code').value = "";
		 }
		 else{
			 
	$('#message').html('<p class="success" >Thank you for registering with <strong>Prasad Book Shop</strong>(Pvt) Ltd. Check your e-mail Inbox to confirm your Registration.</p>');
	 
	document.getElementById('firstname').value = "";
	document.getElementById('lastname').value = "" ;
	document.getElementById('dob').value = "" ;
	document.getElementById('email').value = "";
	document.getElementById('password-confirm').value= "";
	document.getElementById('password').value= "";
   }}
 });
}}


function signIn(){
	
	var email = document.getElementById('login-email-address').value;
	var password = document.getElementById('login-password').value;
	
	var dataURL = "email="+ email + " &password=" + password;
	
	$.ajax({
   type: "POST",
   url: "_controllers/LoginController.php",
   data: dataURL,
   success: function(msg){
    // alert(msg);
	 
	 if(msg == '1'){
		window.location.replace('index.php');
		 }else if(msg == '0'){
			 
		 $('#loginmsg').html('<p class="error" >please check your email address and password.</p>');
		 
		 }else{
			 $('#loginmsg').html('<p class="error" >please check your password . </p>');
	
   }
   }
 });
	
	}