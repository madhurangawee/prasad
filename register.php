<?php
session_start();
include_once("_config/config.php");
require_once('_class/mysql.php');
require_once('_class/Class.Service.php');
include("securimage/securimage.php");
$result = new Service;
$bookCat = $result->getBookCategory();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en">
<meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
<head>
<title>Prasad Book shop</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/QapTcha.jquery.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet_boxes.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet_css_buttons.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet_darkbox.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet_main.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet_tm.css" />
<link rel="stylesheet" type="text/css" href="css/style2.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet_tm.css" />
<link rel="stylesheet" type="text/css" media="print" href="css/print_stylesheet.css" />
<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.8.13.custom.css" />
<script type="text/javascript" src="_js/jquery-1.5.min.js"></script>
<script type="text/javascript" src="_js/jquery-ui-1.8.13.custom.min.js"></script>
<script type="text/javascript" src="_js/jscript_xdarkbox.js"></script>
<script type="text/javascript" src="_js/functions/register.js"></script>
<script type="text/javascript" src="_js/jquery-ui.js"></script>
<script type="text/javascript" src="_js/jquery.ui.touch.js"></script>
<script type="text/javascript" src="_js/QapTcha.jquery.js"></script>
<script type="text/javascript" src="_js/jquery.nivo.slider.js"></script>
<script src="_js/menu.js" type="text/javascript"></script>
<script type="text/javascript" src="_js/jscript_xtabs.js"></script>
<script type="text/javascript" src="_js/jscript_xtabs2.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
    
    <script type="text/javascript">
	$(function() {
		$( "#dob" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: '-50:-5'
			
		});
	});
	
	</script>
    <script type="text/javascript" >
	
   //$('#QapTcha').QapTcha({options});
   $(document).ready(function(){
     // Simple call
     $('#QapTcha').QapTcha();
   });

</script>
<style type="text/css">
#slider {
    /*position:left !important;*/
    width:650px; /* Change this to your images width */
    height:246px  !important; /* Change this to your images height */
    background:url(images/loading.gif) no-repeat 50% 50%;
	margin:5px !important;
	
}
#slider img {
    position:absolute;
    top:0px;
    left:0px;
    display:none;
}
#slider a {
    border:0;
    display:block;
}
#testcon {
	width:50px !important;
	color:#09F;
	}
</style>

</head>
<?php
	// captcha coding
	if(isset($_POST['submit']))
	{
		$response = '<div class="notice">';
		
		if(isset($_POST['iQapTcha']) && empty($_POST['iQapTcha']) && isset($_SESSION['iQaptcha']) && $_SESSION['iQaptcha'])
		{
			$response .= 'Form can be submited';
			unset($_SESSION['iQaptcha']);
		}
		else
			$response .= 'Form can not be submited';
			
		$response .= '</div>';
		
		echo $response;
	}
?>


<body >

<!-- ========== IMAGE BORDER TOP ========== -->

<div  class="main-width">
    
<div id="header">

	<?php include("includes/header.php"); ?> 
</div>

<table border="0" cellspacing="0" cellpadding="0" width="100%" id="contentMainWrapper" >
	<tr>
    
				
            <td id="column-left" style="width:200px;" >
            <?php include("includes/navigation.php"); ?> 
            </td>

           <td id="column-center" valign="top" >

                <div class="column-center-padding">

						<div class="centerColumn" id="loginDefault">



<h1 id="loginDefaultHeading">Welcome, Please Sign In</h1>



<div class="tie">

	<div class="tie-indent">

<!--BOF normal login-->

<fieldset>

<legend>Returning Customers: Please Log In</legend>



<label class="inputLabel" for="login-email-address">Email Address:</label>

<input type="text" name="email_address" size = "41" maxlength= "96" id="login-email-address" /><br class="clearBoth" />



<label class="inputLabel" for="login-password">Password:</label>

<input type="password" name="password" size = "41" maxlength = "40" id="login-password" /><br class="clearBoth" />

</fieldset>

<div id="loginmsg" ></div>

<div class="buttonRow back"><input type="image" src="images/buttons/english/button_login.gif" alt="Sign In" title="Sign In" onclick="signIn();"  /></div>


<div class="buttonRow back">&nbsp; &nbsp; &nbsp;<a href="forgotPassword.php">Forgot your password?</a></div>


<br class="clearBoth" />





<legend id="register">Register New User.</legend>


<div class="information"  >Create a customer profile with <strong>Prasad Online Books</strong> which allows you to shop faster, track the status of your current orders and review your previous orders.</div>
<div id="msg" class="information"  ></div>





<div class="alert forward">* Required information</div>

<br class="clearBoth" />

<fieldset>

<legend>Address Details</legend>

<input type="radio" name="gender" value="m" id="gender-male" /><label class="radioButtonLabel" for="gender-male">Mr.</label><input type="radio" name="gender" value="f" id="gender-female" /><label class="radioButtonLabel" for="gender-female">Ms.</label><span class="alert">*</span><br class="clearBoth" />



<label class="inputLabel" for="firstname">First Name:</label>

<input type="text" name="firstname" size = "33" maxlength = "32" id="firstname" /><span class="alert">*</span><br class="clearBoth" />



<label class="inputLabel" for="lastname">Last Name:</label>

<input type="text" name="lastname" size = "33" maxlength = "32" id="lastname" /><span class="alert">*</span><br class="clearBoth" />


<br class="clearBoth" />

</fieldset>



<fieldset>



<legend>Verify Your Age</legend>

<label class="inputLabel" for="dob">Date of Birth:</label>

<input type="text" name="dob" id="dob"  /><span class="alert">* (eg. 05/21/1970)</span><br class="clearBoth" />

</fieldset>



<fieldset>

<legend>Login Details</legend>

<label class="inputLabel" for="email-address">Email Address:</label>

<input type="email" name="email" size = "41" maxlength= "96" id="email" /><span class="alert">*</span><br class="clearBoth" />





<label class="inputLabel" for="password-new">Password:</label>

<input type="password" name="password" size = "21" maxlength= "40" id="password" /><span class="alert">* (at least 7 characters)</span><br class="clearBoth" />



<label class="inputLabel" for="password-confirm">Confirm Password:</label>

<input type="password" name="confirmation" size = "21" maxlength= "40" id="password-confirm" /><span class="alert">*</span><br class="clearBoth" />

</fieldset>



<fieldset>

<legend>Newsletter and Email Details</legend>

<input type="checkbox" name="newsletter" value="1" id="newsletter-checkbox" /><label class="checkboxLabel" for="newsletter-checkbox">Subscribe to Our Newsletter.</label><br class="clearBoth" />

<br class="clearBoth" />



<input type="radio" name="email_format" value="HTML" id="email-format-html" /><label class="radioButtonLabel" for="email-format-html">HTML</label><input type="radio" name="email_format" value="TEXT" checked="checked" id="email-format-text" /><label class="radioButtonLabel" for="email-format-text">TEXT-Only</label><br class="clearBoth" />

</fieldset>

</fieldset>


<div style="width: 430px; float: left; height: 90px; ">
      <img id="siimage" align="left" style="padding-right: 5px; border: 0" src="securimage/securimage_show.php?sid=<?php echo md5(time()) ?>" />

        <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="19" height="19" id="SecurImage_as3" align="middle">
			    <param name="allowScriptAccess" value="sameDomain" />
			    <param name="allowFullScreen" value="false" />
			    <param name="movie" value="securimage/securimage_play.swf?audio=securimage_play.php&bgColor1=#777&bgColor2=#fff&iconColor=#000&roundedCorner=5" />
			    <param name="quality" value="high" />
			
			    <param name="bgcolor" value="#ffffff" />
			    <embed src="securimage/securimage_play.swf?audio=securimage_play.php&bgColor1=#777&bgColor2=#fff&iconColor=#000&roundedCorner=5" quality="high" bgcolor="#ffffff" width="19" height="19" name="SecurImage_as3" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
			  </object>

        <br />
        
        <!-- pass a session id to the query string of the script to prevent ie caching -->
        <a tabindex="-1" style="border-style: none" href="#" title="Refresh Image" onClick="document.getElementById('siimage').src = 'securimage/securimage_show.php?sid=' + Math.random(); return false"><img src="securimage/images/refresh.gif" alt="Reload Image" border="0" onClick="this.blur()" align="bottom" /></a>
</div>
<div ><input type="text" name="code" id="code" size="12" /></div><br/>
<div ><input type="image" src="images/buttons/english/button_submit.gif" alt="Submit the Information" title=" Submit the Information " name="submit" onclick="return registerUser();" />	
</div>


<!--EOF normal login-->

<div class="message" id="message"></div>

	</div>

</div>                  


            </td>
			
		
            <td id="column_right" style="width:200px">
               <?php include("includes/side_menu_right.php"); ?> 
            </td>
			
                
    </tr>
</table>



<!-- ========== FOOTER ========== -->


	<div id="footer">
     <?php include("includes/footer.php"); ?> 
    </div>

<!-- ========== IMAGE BORDER BOTTOM ========== -->

  

<!-- ========================================= -->


</body>

</html>