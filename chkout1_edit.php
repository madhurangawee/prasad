<?php
session_start();
include_once("_config/config.php");
include_once("_config/check-session.php");
require_once('_class/mysql.php');
require_once('_class/Class.Service.php');
require_once('_class/paginator.class.php');

$service = new Service;
$bookCat = $service->getBookCategory();

$resultSet = $service->getOrderDet();
$name = explode(" ",$resultSet['CUS_NAME']);
$fname = $name[0];
$lname = $name[1];
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
<script type="text/javascript" src="_js/functions/tell_a_frnd.js"></script>
<script type="text/javascript" src="_js/jquery.nivo.slider.js"></script>
<script type="text/javascript" src="_js/functions/Cart.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
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

						<div class="centerColumn" id="checkoutShipping">





<h1 id="checkoutShippingHeading">Step 1 of 2 - Delivery Information</h1>



<h2 id="checkoutShippingHeadingAddress">Shipping Information:</h2>

<!--<div class="buttonRow forward"><a href=""><img src="images/buttons/english/button_change_address.gif"  alt="Change Address" title=" Change Address " width="120" height="25" /></a></div>-->

<div id="checkoutShipto" class="floatingBox">



<div class=""><fieldset>

<legend>Address Details</legend>

<label class="inputLabel" for="firstname">First Name:</label>

<input type="text" name="firstname" size = "33" maxlength = "32" id="firstname" value="<?php echo $fname  ?>" /><span class="alert">*</span><br class="clearBoth" />



<label class="inputLabel" for="lastname">Last Name:</label>

<input type="text" name="lastname" size = "33" maxlength = "32" id="lastname" value="<?php echo $lname  ?>" /><span class="alert">*</span><br class="clearBoth" />



<label class="inputLabel" for="street-address">Street Address:</label>

  <input type="text" name="street_address" size = "41" maxlength= "64" id="street_address" value="<?php echo $resultSet['SHIP_STREET'];  ?>" /><span class="alert">*</span><br class="clearBoth" />



<label class="inputLabel" for="city">City:</label>

<input type="text" name="city" size = "33" maxlength = "32" id="city" value="<?php echo $resultSet['SHIP_CITY'];  ?>" /><span class="alert">*</span><br class="clearBoth" />





<label class="inputLabel" for="state" id="stateLabel">Province:</label>

<input type="text" name="state"  size = "33" maxlength = "32" id="province" value="<?php echo $resultSet['SHIP_PROVINCE'];  ?>"   />&nbsp;<span class="alert" id="stText">*</span><input type="hidden" name="zone_id" /><br class="clearBoth" />



<label class="inputLabel" for="postcode">Post Code:</label>

<input type="text" name="postcode" size = "11" maxlength = "10" id="postcode" value="<?php echo $resultSet['SHIP_POSTCODE'];  ?>" /><span class="alert">*</span><br class="clearBoth" />



<label class="inputLabel" for="country">Country:</label>

 <select name="country" id="country" > 
 <option value="">Please Choose Your Country</option> 
  <option value="Sri Lanka" selected="selected">Sri Lanka</option> 
 </select>
<span class="alert">*</span><br class="clearBoth" />

</fieldset></div>

</div>

<div class="floatingBox important">Your order will be shipped to the address at the TOP or you may change the shipping address by editing the <em>Address Details</em> .</div>

<br class="clearBoth" />





<h2 id="checkoutShippingHeadingMethod">Shipping Method:</h2>





<div id="checkoutShippingContentChoose" class="important">Please select the preferred shipping method to use on this order.</div>



<fieldset>

<legend>Free Shipping&nbsp;</legend>



<div class="important forward price">LKR 0.00</div>



<input type="radio" name="shipping" value="Free Shipping" id="ship-flat-flat" <?php if($resultSet['SHIP_TYPE'] == 'Free Shipping'){ ?> checked="checked" <?php }?> /><label for="ship-flat-flat" class="checkboxLabel" >Free Shipping With in Sri Lanka</label>

<!--</div>-->

<br class="clearBoth" />



</fieldset>



<fieldset>

<legend>Store Pickup&nbsp;</legend>



<div class="important forward price">LKR 0.00</div>



<input type="radio" name="shipping" value="Store pickup" id="ship-storepickup-storepickup" <?php if($resultSet['SHIP_TYPE'] == 'Store pickup'){ ?> checked="checked" <?php }?>   /><label for="ship-storepickup-storepickup" class="checkboxLabel" >Walk In</label>

<!--</div>-->

<br class="clearBoth" />



</fieldset>



<h3>Special Instructions or Comments About Your Order</h3>

<fieldset class="shipping" id="comments" >

<textarea name="comments" id="description" cols="45" rows="3"><?php echo $resultSet['DESCRIPTION'];  ?></textarea></fieldset>



<div class="buttonRow forward">

 <input type="image" src="images/buttons/english/button_continue_checkout.gif" alt="Continue" title=" Continue "  onclick="goToChkout2(<?php echo $_SESSION['order_id'];?>);"  /></div>


<div class="buttonRow back"><strong>Continue to Step 2</strong><br />- choose your payment method.</div>





</div>                    

                

                	<div class="clear"></div>

                    

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


<script type="text/javascript">
 var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-7078796-5']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();</script>

</body>
</html>
