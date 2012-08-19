<?php
session_start();
include_once("_config/config.php");
include_once("_config/check-session.php");
require_once('_class/mysql.php');
require_once('_class/Class.Service.php');
require_once('_class/paginator.class.php');

$service = new Service;
$bookCat = $service->getBookCategory();

if(isset($_SESSION['CUS_ID']))
			{
				$sessID = '0';
			}else{
				$sessID = $_SESSION['sessid'];
				 }
				 
$cusDet = $service->getCustomerDet($_SESSION['CUS_ID']);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en">
<meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
<head>
<title>Prasad Book shop</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<base  />
<style type="text/css">
@import url("admin/css/paginator.css");
</style>
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet_boxes.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet_css_buttons.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet_darkbox.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet_main.css" />
<link rel="stylesheet" type="text/css" href="css/style2.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet_tm.css" />
<link rel="stylesheet" type="text/css" media="print" href="css/print_stylesheet.css" />
<script type="text/javascript" src="_js/jquery-1.5.min.js"></script>
<script type="text/javascript" src="_js/jscript_xdarkbox.js"></script>
<script src="_js/menu.js" type="text/javascript"></script>
<script type="text/javascript" src="_js/jscript_xtabs.js"></script>
<script type="text/javascript" src="_js/jscript_xtabs2.js"></script>
<script type="text/javascript" src="_js/functions/updateProfile.js"></script>
<script type="text/javascript" src="_js/jquery.nivo.slider.js"></script>
<script type="text/javascript" src="_js/functions/Cart.js"></script>


</head>



<body id="indexBody">

<!-- ========== IMAGE BORDER TOP ========== -->

<div class="main-width" >

<div id="header">

	<?php include("includes/header.php"); ?> 
</div>

<table border="0" cellspacing="0" cellpadding="0" width="100%" id="contentMainWrapper">
	<tr>
    
				
            <td id="column-left" style="width:200px;">
            <?php include("includes/navigation.php"); ?> 
            </td>
            
			
		
        <td id="column-center" valign="top">

                <div class="column-center-padding">

    
                    
						<div class="centerColumn" id="accountEditDefault">



<fieldset>
<legend>My Account Information</legend>
<div class="alert forward">* Required information</div>
<br class="clearBoth">

<label class="inputLabel" for="firstname">First Name:</label>
<input type="text" name="fname1"  value="<?php echo $cusDet['F_NAME']; ?>"  id="firstname"><span class="alert">*</span><br class="clearBoth">

<label class="inputLabel" for="lastname">Last Name:</label>
<input type="text" name="lname1"  value="<?php echo $cusDet['L_NAME']; ?>"  id="lastname"><span class="alert">*</span><br class="clearBoth">

<label class="inputLabel" for="dob">Date of Birth:</label>
<input type="text" id="dateob" value="<?php echo $cusDet['DOB']; ?>"  /><span class="alert">* (eg. date/month/year)</span><br class="clearBoth">

<label class="inputLabel" for="email-address">Email Address:</label>
<input type="text"  value="<?php echo $cusDet['CUS_MAIL']; ?>"  id="email" size = "51" ><span class="alert">*</span><br class="clearBoth">

<label class="inputLabel" for="telephone">Telephone:</label>
<input type="text" name="telephone" value="<?php echo $cusDet['CUS_TEL']; ?>"  id="telephone"><span class="alert">*</span><br class="clearBoth">
<label class="inputLabel" for="telephone">Mobile:</label>
<input type="text" name="mobile" value="<?php echo $cusDet['CUS_MOBILE']; ?>"  id="mobile"><br class="clearBoth">
</fieldset>
<fieldset>
<legend>Delivery Address </legend>

<label class="inputLabel" for="street-address">Street Address:</label>

  <input type="text" name="street_address" value="<?php echo $cusDet['CUS_STREET']; ?>" size = "41" maxlength= "64" id="street_address" /><span class="alert">*</span><br class="clearBoth" />



<label class="inputLabel" for="city">City:</label>

<input type="text" name="city" size = "33" value="<?php echo $cusDet['CUS_CITY']; ?>" maxlength = "32" id="city" /><span class="alert">*</span><br class="clearBoth" />





<label class="inputLabel" for="state" id="stateLabel">Province:</label>

<input type="text"  size = "33" value="<?php echo $cusDet['CUS_PROVINCE']; ?>" maxlength = "32" id="state" />&nbsp;<span class="alert" id="stText">*</span><br class="clearBoth" />



<label class="inputLabel" for="postcode">Post Code:</label>

<input type="text" name="postcode" value="<?php echo $cusDet['CUS_POSTCODE']; ?>" size = "11" maxlength = "10" id="postcode" /><span class="alert">*</span><br class="clearBoth" />



<label class="inputLabel" for="country">Country:</label>

 <select name="country" id="country" > 
 <option value="">Please Choose Your Country</option> 
  <option value="94" selected="selected">Sri Lanka</option> 
 </select>

</fieldset>

<!--<fieldset>
<legend>Newsletter and Email Details</legend>
<input type="radio" name="email_format" value="HTML" id="email-format-html"><label class="radioButtonLabel" for="email-format-html">HTML</label><input type="radio" name="email_format" value="TEXT" checked="checked" id="email-format-text"><label class="radioButtonLabel" for="email-format-text">TEXT-Only</label><br class="clearBoth">
</fieldset>-->

<div class="buttonRow back"><a href="javascript:history.go(-1)"><img src="images/buttons/english/button_back.gif" alt="Back" title=" Back " width="51" height="25"></a></div>
<div class="buttonRow forward"><input type="image" src="images/buttons/english/button_update.gif" alt="Update" title="Update" onclick="updateProfile();"></div>
<br class="clearBoth">


</div>                    
                
                	<div class="clear"></div><div id="msg"></div>
                    
                    <!--eof content_center-->
                
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

    </div>

</body>
</html>
