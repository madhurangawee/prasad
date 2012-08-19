<?php
session_start();
require_once('../_config/config.php'); 
require_once('../_class/mysql.php');
require_once('../_class/Class.Add.php');
require_once('../_class/Class.Edit.php');
require_once('../_class/Class.Service.php');
require_once('../_class/Class.Mail.php');

           $mails = new MAIL();
           $edit = new EDIT();
		   $service = new SERVICE();
		   $add = new ADD();



           $review_text = MySQL :: escape($_POST['review_text']);
		   $star = MySQL :: escape($_POST['star']);
		   $book_id = MySQL :: escape($_POST['book_id']);
		   $mode = $_POST['mode'];
		   

		  if($mode=='add')
		   {
			  $chkCus = $service->chkCusReviewDet($book_id);
			  
			  if($chkCus == 0)
			  {
			      $res = $add->addReviewData($review_text,$star,$book_id);
			      $reviewAvg = $service->getReviewsAvg($book_id);

			      $review = round($reviewAvg[0], 0);
                  $updateBooks = $edit->addReviewTOBooks($review,$book_id);
			  }else{
				  
				    echo "no";
				   }
		   }
		   
            if($res){
				
				 echo 'ok';
				}
		   
?>