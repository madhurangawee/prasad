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

unset($_SESSION['ID']);
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
                    
						<div class="centerColumn" id="checkoutConfirmDefault">

<h1 id="checkoutConfirmDefaultHeading">Step 2 of 2 - Order Confirmation</h1>


<div id="checkoutBillto">
<h2 id="checkoutConfirmDefaultBillingAddress">Payment Information</h2>

<fieldset>

<legend>Payment Method</legend>

<label for="pmt-moneyorder" class="radioButtonLabel"><strong>Check/Money Order</strong></label><br/><br/>
We still only Providing above option Only. Please saty with us. Paypal and Credit Card payment will be soon.
<br class="clearBoth" />

<br class="clearBoth" />

</fieldset>

<div class="important "  ><fieldset> 
  <p>Please make your check or money order payable to:<br>
    Prasad Stationers &amp; BookShop <br>
  <br>Mail your payment to:<br>
    No. 28A, </p>
  <p>2nd Cross Street <br>
    Piliyandala Sri Lanka.<br>
    <br>
    Customer Service: 0112 61 65 62<br>
    Your order will not ship until we receive payment.</p>
</fieldset></div>
<div class="important">
      </div>

<br class="clearBoth">
</div>

<div id="checkoutShipto">
<h2 id="checkoutConfirmDefaultShippingAddress">Delivery/Shipping Information</h2>

<fieldset>
<div class="buttonRow forward"><a href="chkout1_edit.php?id=<?php echo $resultSet['ID'];  ?>"><img src="images/buttons/english/small_edit.gif" alt="Edit" title=" Edit " width="45" height="25"></a></div>

<address><?php echo $resultSet['CUS_NAME'];  ?><br><?php echo $resultSet['SHIP_STREET'];  ?><br><?php echo $resultSet['SHIP_CITY'];  ?><br><?php echo $resultSet['SHIP_PROVINCE'];  ?><br><?php echo $resultSet['SHIP_POSTCODE'];  ?><br><?php echo $resultSet['SHIP_COUNTRY'];  ?></address>
</fieldset>

<h3 id="checkoutConfirmDefaultShipment">Shipping Method:</h3>

<h4 id="checkoutConfirmDefaultShipmentTitle"><?php echo $resultSet['SHIP_TYPE'];  ?></h4>

</div>
<br class="clearBoth">
<hr>

<h2 id="checkoutConfirmDefaultHeadingComments">Special Instructions or Order Comments</h2>
<div class="buttonRow forward"><a href="chkout1_edit.php?id=<?php echo $resultSet['ID'];  ?>"><img src="images/buttons/english/small_edit.gif" alt="Edit" title=" Edit " width="45" height="25"></a></div>
<div><?php echo $resultSet['DESCRIPTION'];  ?></div>
<br class="clearBoth">
<hr>

<h2 id="checkoutConfirmDefaultHeadingCart">Shopping Cart Contents</h2>

<div class="buttonRow forward"><a href="cart.php?id=edit"><img src="images/buttons/english/small_edit.gif" alt="Edit" title=" Edit " width="45" height="25"></a></div>
<br class="clearBoth">



      <table border="0" width="100%" cellspacing="0" cellpadding="0" id="cartContentsDisplay">
        <tbody><tr class="cartTableHeading">
        <th scope="col" id="ccQuantityHeading" width="30">Quantity</th>
        <th scope="col" id="ccProductsHeading">Item Name</th>
          <th scope="col" id="ccTotalHeading">Total</th>
        </tr>
        <?php foreach($result as $row){ ?>
        <tr class="rowEven">
          <td class="cartQuantity"><?php echo $row['QUANTITY']; ?>&nbsp;x</td>
          <td class="cartProductDisplay"><?php echo $row['BOOK_NAME']; ?></td>
          <td class="cartTotalDisplay"><?php echo $row['TOTAL'].".00"; ?> </td>
      </tr>
      <?php } ?>
      </tbody></table>
      <hr>

<div id="orderTotals"><div id="otsubtotal">
    <div class="totalBox larger forward"><?php echo $totalCart[0].".00"; ?></div>
    <div class="lineTitle larger forward">Sub-Total:</div>
</div>
<br class="clearBoth">
<div id="otshipping">
    <div class="totalBox larger forward">0.00</div>
    <div class="lineTitle larger forward"><?php echo $resultSet['SHIP_TYPE'];  ?>:</div>
</div>
<br class="clearBoth">
<div id="ottotal">
    <div class="totalBox larger forward"><?php echo $totalCart[0].".00"; ?></div>
    <div class="lineTitle larger forward">Total:</div>
</div>
<br class="clearBoth">
</div>

<div class="buttonRow forward"><input type="image" src="images/buttons/english/button_confirm_order.gif"  alt="Confirm Order" title=" Confirm Order " name="btn_submit" id="btn_submit" onclick="confirmCart();"></div>

<div class="buttonRow back"><strong>Final Step</strong><br>- continue to confirm your order. Thank you!</div>

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
