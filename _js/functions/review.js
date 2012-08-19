function addReview(id)
  {
	
	var review_text = document.getElementById('review-text').value;

	if(document.getElementById('review-text').value == '' )
	{
		
		$('#msg').html('<p  class="warning"  ><strong>Please Enter some text.</strong></p>');
		return false;
		
	}
	
	$("input[type='radio']").each(function () {
        if ($(this).attr('checked')) {
            starMark = this.value;
        }
    });

 

	         var dataURL = 'review_text='+ review_text + '&star='+starMark + '&book_id='+id + '&mode=add' ;
	
	
	        $('#msg').html('<p style="color:#007900" >please wait...</p>');
	
$.ajax({
   type: "POST",
   url: "_controllers/review.php",
   data: dataURL,
   success: function(msg){
     //alert(msg);
	    if(msg == 'ok')
	    { 
		        document.getElementById('review-text').value = '';
			    $('#msg').html('<p class="success" >Thank you..Your review has been accepted for moderation.</p>');

	    }else if(msg == 'no'){
			
			    document.getElementById('review-text').value = '';
			    $('#msg').html('<p class="warning" >You already review for this Item.</p>');
			}
	 }
 });
}
