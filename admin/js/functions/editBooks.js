function editbooks(){
	

var BOOK_ID = document.getElementById('BOOK_ID').value;
    var BOOK_NAME = document.getElementById('BOOK_NAME').value;
	var BOOK_TYPE = document.getElementById('BOOK_TYPE').value;
	var ICBS_NO = document.getElementById('ICBS_NO').value;
	var BOOK_AUTHOR = document.getElementById('BOOK_AUTHOR').value;
	var BOOK_PUBLISHER = document.getElementById('BOOK_PUBLISHER').value;
	var PURCHASE_PRICE = document.getElementById('PURCHASE_PRICE').value;
	var SELL_PRICE = document.getElementById('SELL_PRICE').value;
	var QUANTITY = document.getElementById('QUANTITY').value;
	var ISSUED_DATE = document.getElementById('ISSUED_DATE').value;
	var BOOK_SUP = document.getElementById('BOOK_SUP').value;
	
	//var DESCRIPTION = document.getElementById('DESCRIPTION').value;
	var DESCRIPTION = CKEDITOR.instances.DESCRIPTION.getData();
	alert(BOOK_ID);
	
	
	if(document.getElementById('BOOK_NAME').value =='' || document.getElementById('ICBS_NO').value =='' || document.getElementById('BOOK_AUTHOR').value == '' ||document.getElementById('BOOK_TYPE').value == '' || document.getElementById('BOOK_PUBLISHER').value =='' ){
		
		$('#msg').html('<p  class="warning" ><strong>Please Enter all required fields.</strong></p>');
		
		return false;
		}

	
	var dataURL = 'BOOK_NAME='+BOOK_NAME+ '&BOOK_TYPE=' + BOOK_TYPE+'&ICBS_NO='+ICBS_NO+'&BOOK_AUTHOR='+BOOK_AUTHOR+'&BOOK_PUBLISHER='+BOOK_PUBLISHER+'&PURCHASE_PRICE='+PURCHASE_PRICE+'&SELL_PRICE='+SELL_PRICE+'&BOOK_SUP='+BOOK_SUP+'&QUANTITY='+QUANTITY+'&ISSUED_DATE='+ISSUED_DATE + '&DESCRIPTION='+DESCRIPTION+ '&BOOK_COVER='+picFileName +'&SAMPLE_PDF=' + pdfFileName + '&mode=edit' +'&BOOK_ID=' + BOOK_ID;
	
		
	$('#msg').html('<p style="color:#007900" >please wait...</p>');
	
$.ajax({
   type: "POST",
   url: "../_controllers/addBooksController.php",
   data: dataURL,
   success: function(msg){
    // alert(msg);
	 if(msg == '1'){
			 
	$('#msg').html('<p class="success" >Succesully saved.</p>');
	 window.location = "viewBooks.php";
	
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