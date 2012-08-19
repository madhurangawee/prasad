function editProducts(){
	
	var PROD_ID = document.getElementById('PROD_ID').value;
    var PROD_NAME = document.getElementById('PROD_NAME').value;
	var PROD_TYPE = document.getElementById('PROD_TYPE').value;
	var SUB_PROD_TYPE = document.getElementById('SUB_PROD_TYPE').value;
	var PROD_SUP = document.getElementById('PROD_SUP').value;
	var PURCHASE_PRICE = document.getElementById('PURCHASE_PRICE').value;
	var SELL_PRICE = document.getElementById('SELL_PRICE').value;
	var QUANTITY = document.getElementById('QUANTITY').value;
	var DESCRIPTION = CKEDITOR.instances.DESCRIPTION.getData();
	
	
	
	if(document.getElementById('PROD_NAME').value =='' || document.getElementById('PURCHASE_PRICE').value == '' ||document.getElementById('SELL_PRICE').value == '' || document.getElementById('QUANTITY').value =='' ){
		
		$('#msg').html('<p  class="warning" ><strong>Please Enter all required fields.</strong></p>');
		
		return false;
		}

	
	var dataURL = 'PROD_NAME='+PROD_NAME+ '&PROD_TYPE=' + PROD_TYPE+ '&SUB_PROD_TYPE=' + SUB_PROD_TYPE+'&PROD_SUP='+PROD_SUP+'&PURCHASE_PRICE='+PURCHASE_PRICE+'&SELL_PRICE='+SELL_PRICE+'&QUANTITY='+QUANTITY+'&DESCRIPTION='+DESCRIPTION+ '&PROD_pic='+picFileName + '&mode=edit' + '&PROD_ID='+PROD_ID ;
	
		
	$('#msg').html('<p style="color:#007900" >please wait...</p>');
	
$.ajax({
   type: "POST",
   url: "../_controllers/addproductsController.php",
   data: dataURL,
   success: function(msg){
     alert(msg);
	 if(msg == '1'){
			 
	$('#msg').html('<p class="success" >Succesully save.</p>');
	 
	
	
	     }
	 }
 });
}

function addCategory(){
	
	if(document.getElementById('category').value == ""){
		$('#msgCat').html('<p  class="warning" ><strong>Please Enter Name.</strong></p>');
		return false;
		}
	var category = document.getElementById('category').value;
	var dataURL = 'category='+ category ;
	$.ajax({
   type: "POST",
   url: "../_controllers/addBooksCategoryController.php",
   data: dataURL,
   success: function(msg){
     //alert(msg);
	 if(msg == 'ok'){
		 window.location = "addBooks.php";
		 $('#msgCat').html('<p class="success" ><strong>Succesully inserted.</strong></p>');
		 
		 }
			 
   }
   });
	}
	
	function chkNo(id){
		//alert(id);
	
	if(isNaN(document.getElementById('ICBS_NO').value || document.getElementById('PURCHASE_PRICE').value || document.getElementById('SELL_PRICE').value || document.getElementById('QUANTITY').value)){
		$('#'+id).fadeIn('slow');
		//document.getElementsByName(id).focus;
		
		}else{
			$('#'+id).hide();
			}
	}