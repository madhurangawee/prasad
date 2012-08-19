function logIn(){
	
	var ADMIN_USERNAME = document.getElementById('ADMIN_USERNAME').value;
	var ADMIN_PSWRD = document.getElementById('ADMIN_PSWRD').value;
	
	var dataURL = "ADMIN_USERNAME="+ ADMIN_USERNAME + " &ADMIN_PSWRD=" + ADMIN_PSWRD;
	
	$.ajax({
   type: "POST",
   url: "_controllers/LoginController.php",
   data: dataURL,
   success: function(msg){
    //alert(msg);
	 
	     if(msg == 'admin')
	     {
		 window.location.replace('home.php');
		
		 }else if(msg == 'mgr')
		 {
		window.location.replace('home.php');
		 }else if(msg == 'clk')
		 {
		window.location.replace('billing/billingSystem.php');
		
		 }else if(msg == 'sup')
		 {
		window.location.replace('profileSup.php');
		
		 }else if(msg == '0')
		 {
			 
		 $('#loginmsg').html('<p class="error" style="width:350px" >The <b>username</b> or <b>password</b> you entered is incorrect.</p>');
		 
		 }else if(msg == '2')
		 {
			 $('#loginmsg').html('<p class="error" style="width:350px" >Please check your password . </p>');
	
         }else if(msg == '3')
         {
	    $('#loginmsg').html('<p class="error" style="width:350px" >Your Account has been Disabled..Please contact Administrator.. </p>');
	   }
   }
 });
	
	}