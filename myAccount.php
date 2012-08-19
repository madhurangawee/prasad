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
				 
$resultz = $service->getOrdersByCusID();
//print_r($result);

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
     
						
<div class="centerColumn" id="accountDefault">

<h1 id="accountDefaultHeading">My Order Information</h1>
<?php if(!$resultz) { ?>
	
<h2 id="cartEmptyText">You have No Previous Orders</h2>
<?php 
}else {?>
<p class="forward"></p>
<br class="clearBoth">
<table width="100%" border="0" cellpadding="0" cellspacing="0" id="prevOrders">


<caption><h2>Previous Orders</h2></caption>
    <tbody><tr class="tableHeading">
    <th scope="col">Date</th>
    <th scope="col">No.</th>
    <th scope="col">Ship To</th>
    <th scope="col">Status</th>
    <th scope="col">Total</th>
    <th scope="col">Action</th>
  </tr>
  <?php foreach($resultz as $row){ ?>
  <tr id="orders<?php echo $row['ID']; ?>">
    <td width="70px"><?php echo $row['ADDED_DATE']; ?></td>
    <td width="30px"># <?php echo $row['ID']; ?></td>
    <td><address><?php echo $row['SHIP_STREET']; ?><br><?php echo $row['SHIP_CITY']; ?><br><?php echo $row['SHIP_PROVINCE'].' '.$row['SHIP_POSTCODE']; ?></address></td>
    <td width="70px"><?php if($row['STATUS'] == 1){ ?>Delivered<?php }else { ?>Pending <?php } ?></td>
    <td width="70px" align="right">LKR <?php echo $row['ORDER_TOTAL']; ?>.00</td>
    <td align="right"><a href="invoice.php?id=<?php echo $row['ID']; ?>" style="font-family:Verdana, Geneva, sans-serif; color:#C30;"><strong> View Invoice</strong></a><div class="buttonRow " style="font-family:Verdana, Geneva, sans-serif; color:#C30; cursor:pointer;" align="center" onclick="reOrderItems(<?php echo $row['ID']; ?>)"   ><strong> Re Order</strong></div></td>
  </tr>
  	<?php } ?>

</tbody></table>
<?php } ?>
<br class="clearBoth">
<br class="clearBoth">
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
