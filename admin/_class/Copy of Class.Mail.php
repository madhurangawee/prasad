<?php
include("class.phpmailer.php");
include("class.smtp.php");

class MAIL{

public $admin_mail = "madhuranga@gmail.com";


	function sendMail($to , $subject , $message)
	{
	
		$mailSubject = $subject;
				
		//$mailHead="From:".$_REQUEST['senderName']." ".$_REQUEST['senderEmail']."\n";
		
		
		$mailHead="From: Prasad Book Shop info@prasadbookshop.com \n";
		$mailHead.="X-Sender:<info@prasadbookshop.com>\n";
		$mailHead.="X-Mailer:info@prasadbookshop.com \n";
		$mailHead.="X-Priority: 3\n";
		$mailHead.="MIME-Version: 1.0\r\n";
		$mailHead.="Content-Type: text/html; charset=iso-8859-1\n";
		
			mail($to,$mailSubject,$message,$mailHead);

	}
	
	
	
	function CustomerRegistration($F_NAME,$code,$to)
	{
		
		$EmailMessage="hi ".$F_NAME." . this is your code = ".$code;
		
		
			$subject = "Confirm your account ";
	
		$this->sendMail($to , $subject , $EmailMessage);	
		
		
	}
	
	function sendMailAbtAdminNote($F_NAME,$ADMIN_MSG,$to,$ID)
	{
		
		$EmailMessage="Order number :".$ID."  ".$F_NAME." . 
		this is your message = ".$ADMIN_MSG;
		
		
			$subject = "Admin send message About Your Order.";
	
		$this->sendMail($to , $subject , $EmailMessage);	
		
		
	}
	
	function sendDeliverMailToCus($F_NAME,$to,$ID)
	{
		
		$EmailMessage="hi mr.  ".$F_NAME."  
		your Ordered Items has been delivered . Order Id is ".$ID."
		thanx for businnes with us. 
		";
		
		
			$subject = "Your Order Delivered Today.";
	
		$this->sendMail($to , $subject , $EmailMessage);	
		
		
	}
	
}