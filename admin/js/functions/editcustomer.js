function editCustomer(){
	

var CUS_ID = document.getElementById('CUS_ID').value;
	var F_NAME = document.getElementById('F_NAME').value;
	var L_NAME = document.getElementById('L_NAME').value;
	var CUS_STREET = document.getElementById('CUS_STREET').value;
	var CUS_CITY = document.getElementById('CUS_CITY').value;
	var CUS_PROVINCE = document.getElementById('CUS_PROVINCE').value;
	var CUS_POSTCODE = document.getElementById('CUS_POSTCODE').value;
	var CUS_COUNTRY = document.getElementById('CUS_COUNTRY').value;
	var CUS_MAIL = document.getElementById('CUS_MAIL').value;
	var CUS_TEL = document.getElementById('CUS_TEL').value;
	var CUS_MOBILE = document.getElementById('CUS_MOBILE').value;
	var CUS_DES = document.getElementById('CUS_DES').value;
	
	
	if(document.getElementById('F_NAME').value =='' || document.getElementById('L_NAME').value =='' || document.getElementById('CUS_MAIL').value == '' ||document.getElementById('CUS_MOBILE').value == '' ){
		
		$('#msg').html('<p  class="warning"  ><strong>Please Enter all required fields.</strong></p>');
		
		
		}else{
			
   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   var address = document.getElementById('CUS_MAIL').value;
   if(reg.test(address) == false) {
     $('#msg').html('<p class="error" ><strong>Please enter Correct email address.</strong></p>');
      return false;
   }

	
	var dataURL = 'F_NAME='+F_NAME+ '&L_NAME=' + L_NAME+'&CUS_STREET='+CUS_STREET+'&CUS_CITY='+CUS_CITY+'&CUS_PROVINCE='+CUS_PROVINCE+'&CUS_POSTCODE='+CUS_POSTCODE+'&CUS_COUNTRY='+CUS_COUNTRY+'&CUS_MAIL='+CUS_MAIL+'&CUS_TEL='+CUS_TEL+'&CUS_MOBILE='+CUS_MOBILE + '&CUS_DES='+CUS_DES +'&CUS_ID='+CUS_ID;
	
	
	$('#msg').html('<p style="color:#007900" >please wait...</p>');
	
$.ajax({
   type: "POST",
   url: "_controllers/editCustomerController.php",
   data: dataURL,
   success: function(msg){
     //alert(msg);
	 if(msg == 'no'){
		 
		 $('#msg').html('<p class="info" >Your email address already register with the system. if you forgot the password please <strong><a href="#" >clickhere</a>.</strong> </p>');
		 
		 }else{
			 
	$('#msg').html('<p class="success" >Sucssesfully updated.</p>');
	 
	window.location = "viewCustomer.php";
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
   alert(msg);
	 
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
	
function chkNo(){
	
	if(isNaN(document.getElementById('CUS_TEL').value ) || (document.getElementById('CUS_TEL').value.length != 10)){
		$('#mobile_msg').html('<p style="color:#F30"  ><strong>Please enter Correct Number.</strong></p>');
		}else{
			$('#mobile_msg').html('(###) - ### - ####');
			}
	}
	
function chkNo2(){
	
	if(isNaN(document.getElementById('CUS_MOBILE').value )|| (document.getElementById('CUS_MOBILE').value.length != 10)){
		$('#mobile_msg2').html('<p style="color:#F30"  ><strong>Please enter Correct Number.</strong></p>');
		}else{
			$('#mobile_msg2').html('(###) - ### - ####');
			}
	}