<?php
session_start();
require_once('../_config/config.php'); 
require_once('../_class/mysql.php');
require_once('../_class/Class.Add.php');
require_once('../_class/Class.Edit.php');
require_once('../_class/Class.Service.php');
require_once('../_class/Class.Mail.php');

           $mails = new MAIL();
           $add = new ADD();
		   $edit= new EDIT();
		   $service = new SERVICE();

              $mode = $_POST['mode'];
           $BOOK_ID = MySQL :: escape($_POST['BOOK_ID']); 
		   $ID = MySQL :: escape($_POST['ID']);
		   $comment = MySQL :: escape($_POST['comment']);
		   
		   
		   
       if($mode == 'add'){
		   
           $result = $service-> checkWishList($BOOK_ID);
		   $resultSet = $service-> getBooksDet($BOOK_ID);
		   
		  

		   if($result == 0)
		   {
			  
			  $wishlist = $add->addToWishList($BOOK_ID);
		  
		   }else{
			   
			      echo '2';
			   
			    }
	   }
	   
	     if($mode == 'addCom'){
			 
			  $wishlist = $edit->updateCommentToWishList($ID,$comment);
			 
			 }
	   
		   if($wishlist){
			   
			   echo "1";
			   
			   } 




?>