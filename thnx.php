<?php
session_start();
include_once("_config/config.php");
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
				 
$result = $service->viewCart($sessID);
$totalCart = $service->get_Total_Cart($sessID);
$resultSet = $service->getOrderDet();


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


                    

						<div class="centerColumn" id="checkoutSuccess">




<h1 id="checkoutSuccessHeading">Thank You! We Appreciate your Business!</h1>

<div id="checkoutSuccessOrderNumber"><strong>Your Order Number is: </strong><?php echo $_SESSION['order_id']?></div>

<div id="checkoutSuccessMainContent" class="content">

<p><strong>Checkout Success ...</strong></p></div>


<div id="checkoutSuccessLogoff">

Thank you for shopping. Please click the Log Off link to ensure that your receipt and purchase information is not visible to the next person using this computer.<div class="buttonRow forward"><a href="clearSessions.php"><img src="images/buttons/english/button_logoff.gif" alt="Log Off" title=" Log Off " width="66" height="25" /></a></div>

</div>

<!--eof logoff-->

<br class="clearBoth" />

<!--bof -product notifications box-->

<fieldset id="csNotifications">

<legend>Please notify me of updates to these products</legend>



<input type="checkbox" name="notify[]" value="11" checked="checked" id="notify-0" /><label class="checkboxLabel" for="notify-0">Five Novels</label>

<br />

<div class="buttonRow forward"><input type="image" src="images/buttons/english/button_update.gif" alt="Update" title=" Update " /></div>



</fieldset>




<div id="checkoutSuccessOrderLink">You can view your order history by going to the <a href="" name="linkMyAccount">My Account</a> page and by clicking on "View All Orders".</div>



<div id="checkoutSuccessContactLink">Please direct any questions you have to <a href="" name="linkContactUs">customer service</a>.</div>



<h3 id="checkoutSuccessThanks" class="centeredContent">Thanks for shopping with us online!</h3>

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

</body>
</html>
