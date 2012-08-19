<?php

require_once('Class.Service.php');

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
		
		$EmailMessage= "<html>
<head>
<title>Registration Confirmation</title>
</head>

<body>
<table width=\"550\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">
  <tr>
    <td bgcolor=\"#CCCCCC\">&nbsp;</td>
  </tr>
  <tr>
    <td height=\"300\" valign=\"top\"><br />
      <br />
      Hi ".$F_NAME." <br>
      Welcome to the Prasad Online Book Shop, where success stories are created just a click away. <br>
      <br>
      Click on the ACTIVATE MY ACCOUNT and confirm your registration.<br>
      <br />
      <br />
      <font color=\"#666666\" face=\"Verdana, Arial, Helvetica, sans-serif\" pointsize=\"12\" ><strong>
      <p align=\"center\"><a href=\"".HTTP_PATH."confirm.php?id=".$code."\">ACTIVATE MY ACCOUNT</a></p>
      </strong></font><br />
      if the   above is not clickable, copy and paste the following link into address bar of your web   browser, to directly access it.<br>
      <br>
      <font color=\"#333333\" face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\" ><strong>".HTTP_PATH."confirm.php?id=".$code."&u=s</strong> <br />
      <p>If you still have the final step of the registration wizard open, you can input your confirmation code on that screen.</p>
      <p><br>
        Your confirmation code is:<strong> ".$code."</strong></p>
      <br />
      Good luck and May the best opening be yours!!!<br>
      <br>
      Best Regards,<br>
      Administrator<br>
      prasadbookshop.com<br>
      <br>
      <br>
------------------------------------------------------------------------------       <br>
      What's this??<br>
      This email is sent to verify an account created using this email address at www.prasadbookshop.com. If the mail is displaying your account details, which you have created recently please click on the go to your account or copy and paste the link on to the browser. If you think there has been a mistake in receiving this verification mail, please ignore it. The created account will be deleted upon failure of verification.<br></td>
  </tr>
  <tr>
    <td height=\"20\" bgcolor=\"#98C42F\">&nbsp;</td>
  </tr>
</table>
</body>
</html>
";
		
			$subject = "Confirm your account ";
	
		$this->sendMail($to , $subject , $EmailMessage);	
		
		
	}
	


   function sendMessageTofrnd($FROM_NAME,$FROM_EMAIL,$TO_NAME,$TO_EMAIL,$MESSAGE,$BOOK_ID, $BOOK_NAME ,$BOOK_AUTHOR)
    {
		
		$EmailMessage="<html>
		<head>
		<title>Receive new Post</title>
		</head>
		<body>
		<table width=\"550\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">
		  <tr>
			<td width=\"584\">&nbsp;</td>
		  </tr>
		  <tr>
			<td> </td>
		  </tr>
		  <tr>
			<td>
			  <p><strong> Hi ".$TO_NAME.", </strong> <br>
			 <br>
			 Hey there!!!<br>
<br>
You have a wonderful friend by the name ".$FROM_NAME.", Who has chosen this book is  describes you perfectly!!<br>
<br>
Following are the details of the Book; <br>
<br>
			
			<strong>Book Name : </strong> ". $BOOK_NAME."  <br>
			<strong>Author : </strong> ".$BOOK_AUTHOR."  </p>
			  <p>You can check more details by logging to our Web site.<br>
		      </p>
			  <p><a href=\"".HTTP_PATH."products.php?id=".$BOOK_ID.">click here</a> to more details.<br>

			<br>
			<br>
			    Best Regards,<br>
			    Administrator <br>
		    prasadBooks.com</p></td>
		
		  </tr>
		  <tr>
			<td height=\"300\" valign=\"top\">
			  <br />
			  <br />
			  What's this?<br>
			  You have no clue how you got this?? If so please ignore this mail. We are sorry for the inconvenience caused.<br>
			  Since you've already read this mail, why don't you go to www.prasadbookshop.com and check it out? Go on...  And it's only a click away...</td>
		  </tr>
		</table>
		</body>
		</html>";
		
		
			$subject = "Check this out!!! Great Book!!! ";
	
		$this->sendMail($TO_EMAIL , $subject , $EmailMessage);	
		
		
	}
	function sendOrderConfirmMailToCus($TO_EMAIL)
    {
		
		$service = new SERVICE;
		  $resultSet = $service->getOrderDet();
		
		
		$EmailMessage="<html>
<head>
</head>

<body>
<p>Order Confirmation from Prasad Online Books<br />
  <br />
   ".$resultSet['CUS_NAME']."<br />
  <br />
  Thanks for shopping with us today!<br />
  The following are the details of your order.<br />
  ------------------------------------------------------<br />
  Order Number: ".$_SESSION['order_id']."<br />
  Date Ordered: ".date(' jS \of F Y ')."<br />
  Detailed Invoice:<br />
  <a href='' >Click here to View Detailed Invoice</a><br />
  <br />
  Your Total: ".$resultSet['ORDER_TOTAL']."<br />
  <br />
  
  Delivery Address<br />
  ------------------------------------------------------<br />
  
  ".$resultSet['CUS_NAME']."<br />
  ".$resultSet['SHIP_STREET']."<br />
  ".$resultSet['SHIP_CITY']."<br />
  ".$resultSet['SHIP_POSTCODE'].", ".$resultSet['SHIP_PROVINCE']."<br />
  ".$resultSet['SHIP_COUNTRY']."<br />
  <br />
  <br />
  Payment Method<br />
  ------------------------------------------------------<br />
  Check/Money Order<br />
  <br />
  When you sending your Check or Money Order please mention your Order ID on ur Post. Or please send with printed invoice.<br />
  Please make your check or money order payable to:<br />
  <br />
  Prasad Stationers &amp; BookShop <br />
  <br />
Mail your payment to:</p>
<p>No. 28A,</p>
 <p>2nd Cross Street</br>
 </p>
<p> Piliyandala</br>
   Sri Lanka.
   
  </p>
 </p>
<p><br />
  Customer Service: 0112 61 65 62<br />
  <br />
  Your order will not ship until we receive payment.<br />
</p>
</body>
</html>";
		
			$subject = "Your Billing Details For Recent Purchase .";
	
		$this->sendMail($TO_EMAIL , $subject , $EmailMessage);	
		
		
	}
	function sendResetpasswordMail($newPassword,$CUS_MAIL)
	{
		
		$EmailMessage= "<html>
<head>
<title>Password Reset</title>
</head>

<body>
<table width=\"550\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#FFFFFF\">
  <tr>
    <td width=\"584\">&nbsp;</td>
  </tr>
  <tr>
    <td height=\"40\" bgcolor=\"#BF1313\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"3\" color=\"#FFFFFF\"><strong>&nbsp;Confirm Password Reset Request</strong></font> </td>
  </tr>
  <tr>
    <td height=\"300\" valign=\"top\">
      <br />
      Hello , <br />
      Welcome to the Prasad Online Book Shop, where success stories are created just a click away. <br>
      <br>
      This e-mail is sent to you, because we have received a notification saying that you forgot your password and requested for a new one. <br>
      <br>
      Your New Password : ".$newPassword."<br>
      
	  <br>
	  Best Regards,<br>
Administrator<br>
prasadbookshop.com<br>
  <br><br>
      ------------------------------------------------------------------------------       </a><br>
      <br>
      What's this??<br>
This email is sent to verify an account created using this email address at www.prasadbookshop.com. If the mail is displaying your account details, which you have created recently please click on the go to your account or copy and paste the link on to the browser. If you think there has been a mistake in receiving this verification mail, please ignore it. The created account will be deleted upon failure of verification.<br></td>
  </tr>
  <tr>
    <td height=\"20\" bgcolor=\"#98C42F\">&nbsp;</td>
  </tr>
</table>
</body>
</html>	
";
		
			$subject = "New Password from prasad book shop. ";
	
		$this->sendMail($CUS_MAIL , $subject , $EmailMessage);	
		
		//echo $EmailMessage;
	}
	function sendContactUsMail($contactname,$email,$message){
		
		
		
		$EmailMessage= "
		<html>
<body >

<table width='50%' cellpadding='5'>
<tr style='font:Verdana, Arial, Helvetica, sans-serif; color:#990000'>
<td colspan='2'>Contact us Request Information</td>
</tr>
<tr style='font:Verdana, Arial, Helvetica, sans-serif; color:#333333'>
<td colspan='2'>The following information has been submited by $fullname for your action<br/></td>
</tr>
<tr style='font:Verdana, Arial, Helvetica, sans-serif; color:#333333'>
<td width='31%'>Name</td>
<td width='69%'>".$contactname."</td>
</tr>
<tr style='font:Verdana, Arial, Helvetica, sans-serif; color:#333333'>
<td>Email:</td>
<td>".$email."</td>
</tr>
<tr style='font:Verdana, Arial, Helvetica, sans-serif; color:#333333'>
<td>Message:</td>
<td>".$message."</td>
</tr>

</table>

</body>
</html>";

$subject = "Contact Us message.";


		$this->sendMail($email , $subject , $EmailMessage);
		}

	
}
