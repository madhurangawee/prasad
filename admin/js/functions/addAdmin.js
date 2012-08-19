function addAdmin(){
	

    var ADMIN_NAME = document.getElementById('ADMIN_NAME').value;
	var ADMIN_TYPE = document.getElementById('ADMIN_TYPE').value;
	var ADMIN_USER_NAME = document.getElementById('ADMIN_USER_NAME').value;
	var ADMIN_PASSWORD = document.getElementById('ADMIN_PASSWORD').value;
	var DESCRIPTION = document.getElementById('DESCRIPTION').value;
	
	
	
	if(document.getElementById('ADMIN_NAME').value =='' || document.getElementById('ADMIN_TYPE').value == '' ||document.getElementById('ADMIN_USER_NAME').value == '' || document.getElementById('ADMIN_PASSWORD').value =='' ){
		
		$('#msg').html('<p  class="warning" ><strong>Please Enter all required fields.</strong></p>');
		
		return false;
		}
   if(document.getElementById('ADMIN_C_PASSWORD').value != document.getElementById('ADMIN_PASSWORD').value){
		
		$('#msg').html('<p class="error"  ><strong>Please enter same passwords.</strong></p>');
		return false;
		}
	
	var dataURL = 'ADMIN_NAME='+ADMIN_NAME+ '&ADMIN_TYPE=' + ADMIN_TYPE+ '&ADMIN_USER_NAME=' + ADMIN_USER_NAME+ '&ADMIN_PASSWORD='+ADMIN_PASSWORD+'&DESCRIPTION='+DESCRIPTION + '&mode=add'  ;
	
		
	$('#msg').html('<p style="color:#007900" >please wait...</p>');
	
$.ajax({
   type: "POST",
   url: "../_controllers/AdminController.php",
   data: dataURL,
   success: function(msg){
     alert(msg);
	 if(msg == '1'){
			 
	$('#msg').html('<p class="success" >Succesully inserted.</p>').fadeOut();
	 
	document.getElementById('ADMIN_NAME').value = "";
	document.getElementById('ADMIN_TYPE').value = "" ;
	document.getElementById('ADMIN_USER_NAME').value = "" ;
	document.getElementById('ADMIN_PASSWORD').value= "";
	document.getElementById('ADMIN_C_PASSWORD').value= "";
	document.getElementById('DESCRIPTION').value= "";
	
	
	     }
	 }
 });
}


	
	function chkUserName(id){
		//alert(id);
	
	if(isNaN(document.getElementById('ICBS_NO').value || document.getElementById('PURCHASE_PRICE').value || document.getElementById('SELL_PRICE').value || document.getElementById('QUANTITY').value)){
		$('#'+id).fadeIn('slow');
		//document.getElementsByName(id).focus;
		
		}else{
			$('#'+id).hide();
			}
	}
	
	
function passgen()
{
	var length=8;
  chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
  pass = "";
  for(x=0;x<length;x++)
  {
    i = Math.floor(Math.random() * 62);
    pass += chars.charAt(i);
  }
  document.getElementById('ADMIN_PASSWORD').value=pass;
   document.getElementById('ADMIN_C_PASSWORD').value=pass;
// return pass;



}