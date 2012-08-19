<?php
include("class.phpmailer.php");
include("class.smtp.php");

class MAIL{

/*public $admin_mail = "madhuranga@gmail.com";*/


	/*function sendMail($to , $subject , $message)
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

	}*/
	function sendMail($to, $subject, $message){

$mail             = new PHPMailer();

$body             = $message; //$mail->getFile('contents.html');
$body             = eregi_replace("[\]",'',$body);

$mail->IsSMTP();
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the server
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port

$mail->Username   = "mpmadhuranga@gmail.com";  // GMAIL username
$mail->Password   = "snoop2134dogg";            // GMAIL password

$mail->From       = "mpmadhuranga@gmail.com";
$mail->FromName   = "Madhuranga";
$mail->Subject    = $subject;
$mail->AltBody    = $messageText; //Text Body
$mail->WordWrap   = 50; // set word wrap

$mail->MsgHTML($body);

//$mail->AddReplyTo("viranfernando@weblook.com","Webmaster");

//$mail->AddAttachment("/path/to/file.zip");             // attachment
//$mail->AddAttachment("/path/to/ivimage.jpg", "new.jpg"); // attachment

$mail->AddAddress("mpmadhuranga@yahoo.com","Madhuranga");
//$mail->AddAddress($customerEmail,$customerName);

$mail->IsHTML(true); // send as HTML

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message has been sent";
}


}
	
	
	
	function CustomerRegistration($F_NAME,$code,$to)
	{
		
		$EmailMessage="hi ".$F_NAME." . this is your Password = ".$code;
		
		
			$subject = "your account Password details ";
	
		$this->sendMail($to , $subject , $EmailMessage);	
		
		
	}
	function SupplierRegistration($F_NAME,$code,$to)
	{
		
		$EmailMessage="hi ".$F_NAME." . this is your Password = ".$code;
		
		
			$subject = "your account Password details ";
	
		$this->sendMail($to , $subject , $EmailMessage);	
		
		
	}
	
	function sendMailAbtAdminNote($F_NAME,$ADMIN_MSG,$to,$ID)
	{
		
		$EmailMessage="Order number : ".$ID."  ".$F_NAME." . 
		this is your message : ".$ADMIN_MSG;
		
		
			$subject = "Admin add Note About Your Order.";
	
		$this->sendMail($to , $subject , $EmailMessage);	
		
		
	}
	
	function sendDeliverMailToCus($F_NAME,$to,$ID)
	{
		
		$EmailMessage="hi mr.  ".$F_NAME."  
		your Ordered Items has been delivered . Order Id is ".$ID." <br/>
		thanx for businnes with us. 
		";
		
		
			$subject = "Your Order Delivered Today.";
	    echo $EmailMessage;
	//	$this->sendMail($to , $subject , $EmailMessage);	
		
		
	}
	function sendNoticeToSupplier($ID,$to,$F_NAME)
	{
		
		$EmailMessage="hi mr.  ".$F_NAME."  
		You have a invoice from a admin of prasad book shop. Invoice Id is ".$ID." <br/>
		thanx for businnes with us. 
		";
		
		
			$subject = "You got a new Invoice.";
	    //echo $EmailMessage;
		$this->sendMail($to , $subject , $EmailMessage);	
		
		
	}
	
}