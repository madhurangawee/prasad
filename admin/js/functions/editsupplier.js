function editSupplier(){
	
    var SUP_ID = document.getElementById('SUP_ID').value;
    var SUP_TYPE = document.getElementById('SUP_TYPE').value;
	var SUP_COM_NAME = document.getElementById('SUP_COM_NAME').value;
	var SUP_COM_STREET = document.getElementById('SUP_COM_STREET').value;
	var SUP_COM_CITY = document.getElementById('SUP_COM_CITY').value;
	var SUP_COM_PROVINCE = document.getElementById('SUP_COM_PROVINCE').value;
	var SUP_COM_POSTCODE = document.getElementById('SUP_COM_POSTCODE').value;
	var SUP_COM_COUNTRY = document.getElementById('SUP_COM_COUNTRY').value;
	var SUP_COM_TEL = document.getElementById('SUP_COM_TEL').value;
	var SUP_COM_EMAIL = document.getElementById('SUP_COM_MAIL').value;
	var SUP_COM_WEBSITE = document.getElementById('SUP_COM_WEBSITE').value;
	var SUP_CON_NAME = document.getElementById('SUP_CON_NAME').value;
	var SUP_CON_EMAIL = document.getElementById('SUP_CON_MAIL').value;
	var SUP_CON_MOBILE = document.getElementById('SUP_CON_MOBILE').value;
	var SUP_CON_DES = document.getElementById('SUP_CON_DES').value;
	
	
	if(document.getElementById('SUP_COM_NAME').value =='' || document.getElementById('SUP_COM_TEL').value =='' || document.getElementById('SUP_COM_MAIL').value == '' ||document.getElementById('SUP_CON_NAME').value == '' || document.getElementById('SUP_CON_MOBILE').value =='' || document.getElementById('SUP_CON_MAIL').value ==''){
		
		$('#msg').html('<p  class="error"  ><strong>Please Enter all required fields.</strong></p>');
		
		
		}else {
			
   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   var address = document.getElementById('SUP_COM_MAIL').value;
   var address = document.getElementById('SUP_CON_MAIL').value;
   if(reg.test(address) == false) {
     $('#msg').html('<p class="error" ><strong>Please enter Correct email address.</strong></p>');
      return false;
	  
	  
   }

	
	var dataURL = 'SUP_COM_NAME='+SUP_COM_NAME+ '&SUP_COM_STREET=' + SUP_COM_STREET+'&SUP_COM_CITY='+SUP_COM_CITY+'&SUP_COM_PROVINCE='+SUP_COM_PROVINCE+'&SUP_COM_POSTCODE='+SUP_COM_POSTCODE+'&SUP_COM_COUNTRY='+SUP_COM_COUNTRY+'&SUP_COM_TEL='+SUP_COM_TEL+'&SUP_COM_MAIL='+SUP_COM_EMAIL+'&SUP_COM_WEBSITE='+SUP_COM_WEBSITE+'&SUP_CON_NAME='+SUP_CON_NAME + '&SUP_CON_MAIL='+SUP_CON_EMAIL+ '&SUP_CON_MOBILE='+SUP_CON_MOBILE+ '&SUP_CON_DES='+SUP_CON_DES +'&SUP_TYPE=' + SUP_TYPE+'&SUP_ID=' + SUP_ID+ '&mode=edit';
	
		
	$('#msg').html('<p style="color:#007900" >please wait...</p>');
	
$.ajax({
   type: "POST",
   url: "../_controllers/addSupplierController.php",
   data: dataURL,
   success: function(msg){
    // alert(msg);
	 if(msg == 'no'){
		 
		 $('#msg').html('<p class="info" >Your email address already register with the system. if you forgot the password please <strong><a href="#" >clickhere</a>.</strong> </p>');
		 
		 }else{
			 
	$('#msg').html('<p class="success" >Succesully inserted.</p>');
	 
	window.location="viewSupplier.php";
   }}
 });
}}