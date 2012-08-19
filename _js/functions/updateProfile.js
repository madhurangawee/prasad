function updateProfile(){
	
	
	var firstname = document.getElementById('firstname').value;
	var lastname = document.getElementById('lastname').value;
	var dob = document.getElementById('dateob').value;
	var email = document.getElementById('email').value;
	var telephone = document.getElementById('telephone').value;
	var mobile = document.getElementById('mobile').value;
	var street_address = document.getElementById('street_address').value;
	var city = document.getElementById('city').value;
	var state = document.getElementById('state').value;
	var postcode = document.getElementById('postcode').value;
	
	
	if(document.getElementById('firstname').value =='' || document.getElementById('lastname').value =='' || document.getElementById('dateob').value == '' ||document.getElementById('email').value == '' ||document.getElementById('street_address').value == '' ||document.getElementById('city').value == '' ||document.getElementById('state').value == '' || document.getElementById('postcode').value == '' || document.getElementById('telephone').value == '' ){
		
		$('#msg').html('<p  class="warning"  ><strong>Please Enter all required fields.</strong></p>');
		
		
		}else{
			
   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   var address = document.getElementById('email').value;
   if(reg.test(address) == false) {
     $('#msg').html('<p class="error" ><strong>Please enter Correct email address.</strong></p>');
      return false;
   }

if((((telephone.length != 10) || (mobile.length != 10))) || ((isNaN(telephone)) || (isNaN(mobile)))) {
	 $('#msg').html('<p class="error" ><strong>Please enter Correct telephone No. </strong></p>');
	return false;
	}
	
	var dataURL = 'firstname='+firstname+ '&lastname=' + lastname+'&dob='+dob+'&email='+email+'&telephone='+telephone+'&street_address='+street_address+'&city='+city+'&state='+state+'&postcode='+postcode+'&mobile='+mobile +'&mode=edit' ;
	
	
	$('#msg').html('<p style="color:#007900" >please wait...</p>');
	
$.ajax({
   type: "POST",
   url: "_controllers/updateProfile.php",
   data: dataURL,
   success: function(msg){
    alert(msg);
	 if(msg == 'ok'){
		 $('#msg').html('<p class="success" >Updated...</p>');
	window.location="myProfile.php";
	
   }else{
	    $('#msg').html('<p class="success" >Nothing Changed...</p>');
	   }}
 });
}}

function changePassword(){
	
	var passwordCurent = document.getElementById('password-current').value;
	var passwordNew = document.getElementById('password_new').value;
	var passwordConfirm = document.getElementById('password_confirm').value;
	
	var passowrdLenght = passwordNew.length;
	
	
	if(document.getElementById('password_confirm').value != document.getElementById('password_new').value){
		
		$('#msg').html('<p class="warning"  ><strong>Please enter same passwords.</strong></p>');
		return false;
		}
		if(document.getElementById('password-current').value =='' || document.getElementById('password_new').value =='' ){
		
		$('#msg').html('<p  class="warning"  ><strong>Please Enter all required fields.</strong></p>');
		
		return false;
		}
		if(passowrdLenght <= 6){
		$('#msg').html('<p class="warning"  ><strong>Passwords should be more than or 6 characters.</strong></p>');
		return false;
		}
		
		var dataURL = 'passwordCurent='+passwordCurent+ '&passwordConfirm=' + passwordConfirm +'&mode=editPass' ;
	
	
	$('#msg').html('<p style="color:#007900" >please wait...</p>');
	
$.ajax({
   type: "POST",
   url: "_controllers/updateProfile.php",
   data: dataURL,
   success: function(msg){
    //alert(msg);
	 if(msg == 'ok'){
		 $('#msg').html('<p class="success" >Password changed.!</p>');
		 
		document.getElementById('password-current').value = '';
	    document.getElementById('password_new').value = '';
	    document.getElementById('password_confirm').value = '';
		
	//window.location="myAccount.php";
   }else{
	  $('#msg').html('<p class="error" >Invalid Password ...</p>'); 
   }}
 });
 
	}