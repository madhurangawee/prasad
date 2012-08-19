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
				 
	$order_id = $_GET['id'];			 
$result = $service->viewCartByOrder($order_id);
$resultSet = $service->getOrderDetByID($order_id);

$_SESSION['ID'] =  $resultSet['ID'];

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
function printContent(id){
str=document.getElementById(id).innerHTML
newwin=window.open('','printwin','left=100,top=100,width=400,height=400')
newwin.document.write('<HTML>\n<HEAD>\n')
newwin.document.write('<TITLE>Print Page</TITLE>\n')
newwin.document.write('<script>\n')
newwin.document.write('function chkstate(){\n')
newwin.document.write('if(document.readyState=="complete"){\n')
newwin.document.write('window.close()\n')
newwin.document.write('}\n')
newwin.document.write('else{\n')
newwin.document.write('setTimeout("chkstate()",2000)\n')
newwin.document.write('}\n')
newwin.document.write('}\n')
newwin.document.write('function print_win(){\n')
newwin.document.write('window.print();\n')
newwin.document.write('chkstate();\n')
newwin.document.write('}\n')
newwin.document.write('<\/script>\n')
newwin.document.write('</HEAD>\n')
newwin.document.write('<BODY onload="print_win()">\n')
newwin.document.write(str)
newwin.document.write('</BODY>\n')
newwin.document.write('</HTML>\n')
newwin.document.close()

this.getSubmitAndPrint();
}

</script>
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

                <div class="column-center-padding" id="print">


						<div class="centerColumn" id="accountHistInfo">



<div class="forward">Order Date: <?php echo $resultSet['ADDED_DATE']; ?></div>

<br class="clearBoth" />



<table border="0" width="100%" cellspacing="0" cellpadding="0" summary="Itemized listing of previous order, includes number ordered, items and prices">

<caption><h2 id="orderHistoryDetailedOrder">Order Information&nbsp;-&nbsp;Order #22</h2></caption>

    <tr class="tableHeading">

        <th scope="col" id="myAccountQuantity">Qty.</th>

        <th scope="col" id="myAccountProducts">Products</th>

        <th scope="col" id="myAccountTotal">Total</th>

    </tr>
<?php foreach($result as $row){ ?>
    <tr>

        <td class="accountQuantityDisplay"><?php echo $row['QUANTITY']; ?>&nbsp;ea.  </td>

        <td class="accountProductDisplay"><?php echo $row['BOOK_NAME']; ?>      </td>

        <td class="accountTotalDisplay">LKR <?php echo $row['TOTAL']; ?>.00</td>

    </tr>
<?php } ?>
</table>

<hr />

<div id="orderTotals">

     <div class="amount larger forward"><?php echo $resultSet['ORDER_TOTAL']; ?>.00</div>

     <div class="lineTitle larger forward">Sub-Total:</div>

<br class="clearBoth" />

     <div class="amount larger forward">LKR 0.00</div>

     <div class="lineTitle larger forward"><?php echo $resultSet['SHIP_TYPE']; ?> (Best Way):</div>

<br class="clearBoth" />

     <div class="amount larger forward">LKR <?php echo $resultSet['ORDER_TOTAL']; ?>.00</div>

     <div class="lineTitle larger forward">Total:</div>

<br class="clearBoth" />



</div>

<table border="0" width="100%" cellspacing="0" cellpadding="0" id="myAccountOrdersStatus" summary="Table contains the date, order status and any comments regarding the order">

<caption><h2 id="orderHistoryStatus">Status History &amp; Comments</h2></caption>

    <tr class="tableHeading">

        <th scope="col" id="myAccountStatusDate">Date</th>

        <th scope="col" id="myAccountStatus">Order Status</th>

        <th scope="col" id="myAccountStatusComments">Comments</th>

       </tr>

    <tr>

        <td><?php echo $resultSet['EDITED_DATE']; ?></td>

        <td><?php if($resultSet['STATUS'] == 1){ ?>Delivered<?php }else { ?>Pending <?php } ?></td>

        <td>&nbsp;<?php echo $resultSet['ADMIN_MSG']; ?></td> 

     </tr>

</table>



<hr />

<div id="myAccountShipInfo" class="floatingBox back">

<h3>Delivery Address</h3>

<address><?php echo $resultSet['SHIP_STREET']; ?><br><?php echo $resultSet['SHIP_CITY']; ?><br><?php echo $resultSet['SHIP_PROVINCE'].' '.$resultSet['SHIP_POSTCODE']; ?></address>





</div>



<div id="myAccountPaymentInfo" class="floatingBox forward">


<h4>Shipping Method</h4>

<div><?php echo $resultSet['SHIP_TYPE']; ?>  (Best Way)</div>

<br/>
<h4>Payment Method</h4>

<div>Check/Money Order</div>

</div>

<br class="clearBoth" />
<br class="clearBoth" />

</div>                    

       </div>        <a href="myAccount.php"><img src="images/buttons/english/button_back.gif" alt="Continue Shopping" title=" go back "  /></a> 
 <div class="buttonRow forward" style="padding-right:30px; padding-top:30px"><input type="image" src="images/buttons/english/print-button.png" alt="Print Now" title=" Print Now " onclick="printContent('print');" />
                	<div class="clear"></div>

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
