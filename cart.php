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
if($_GET['id'] == 'edit'){
	
	$_SESSION['ID'] =  2;
	}
	

unset($_SESSION['exceeded']);
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

						<div class="centerColumn" id="shoppingCartDefault">



<div class="help-cart"><a href='' >[help (?)]</a></div>
<h1 id="cartDefaultHeading">Your Shopping Cart Contents</h1>

<?php if(!$result) { ?>
	

<h2 id="cartEmptyText">Your Shopping Cart is empty.</h2>
<?php 
}else {?>



<div class="tie text2">

	<div class="tie-indent">
    <?php 
	  foreach($result as $row2){ 
	$result2 = $service->getBooksDet($row2['BOOK_ID']);
	  if($result2['QUANTITY']< $row2['QUANTITY']){
	$_SESSION['exceeded'] = 'true';
	  }
    
    }
if(isset($_SESSION['exceeded'])){
	?>
<div  class="warning">Products marked with *** are more than in the current Stock. But still you can  go to check out.. Our customer service officer will contact you immediately.. </div>

<?php } ?>
<div id="cartInstructionsDisplay" class="content">You need to login to the system before you checkout. </div>
  <div class="cartTotalsDisplay important">Total Items: <?php echo count($result); ?>&nbsp;&nbsp;&nbsp;&nbsp;Amount: <?php echo $totalCart[0]; ?>.00</div>

  <br class="clearBoth" />





<table  border="0" width="100%" cellspacing="0" cellpadding="0" id="cartContentsDisplay">

     <tr class="tableHeading">

       

        <th scope="col" id="scProductsHeading">Item Name</th>

        <th scope="col" id="scUnitHeading">Unit</th>
        
        <th scope="col" id="scQuantityHeading">Quantity</th>

        <th scope="col" id="scTotalHeading">Total</th>

        <th scope="col" id="scRemoveHeading">Action</th>

     </tr>

         <!-- Loop through all products /--><div id="cart" >
 <?php foreach($result as $row){ ?>
     <tr class="rowEven" id="cart<?php echo $row['ID']; ?>">

       <td class="cartProductDisplay">

<a href="products.php?id=<?php echo $row['BOOK_ID']; ?>"><span id="cartProdTitle"><?php echo $row['BOOK_NAME']; ?><span class="alert bold"></span></span><span id="cartImage" class="back"><img src="admin/images/bookcover/<?php echo $row['IMAGE']; ?>" alt="<?php echo $row['BOOK_NAME']; ?>" title=" <?php echo $row['BOOK_NAME']; ?> " width="50" height="70" /></span></a>

<br class="clearBoth" />

       </td>

       <td class="cartUnitDisplay price">LKR <?php echo $row['PRICE']; ?></td>
       
       <td class="cartQuantity">

       <?php $result1 = $service->getBooksDet($row['BOOK_ID']);
if($result1['QUANTITY']< $row['QUANTITY']){
	$_SESSION['exceeded'] = 'true';
	?><div style="color:#F32C2C; " >***</div><?php } ?><input type="text" name="quantity" id="quantity<?php echo $row['ID']; ?>" value="<?php echo $row['QUANTITY']; ?>" size="4"  /><br /><span class="alert bold"></span><br /><br />       </td>
       <td class=" price">LKR <strong><?php echo $row['TOTAL'].".00"; ?></strong></td>

       <td class="cartRemoveItemDisplay">

      <img  style="cursor:pointer;" src="images/buttons/english/error.png" onclick="deleteCartItem(<?php echo $row['ID']; ?>);" alt="Delete" title=" Delete " width="20" height="20" /><br/><br/>
      <img  style="cursor:pointer;" src="images/buttons/english/button_update.gif" onclick="editCart(<?php echo $row['ID']; ?>,<?php echo $row['BOOK_ID']; ?>);" alt="update" title=" update "  />
      </td>

     </tr>
<?php } ?>
</div>
      </table>



<div id="cartSubTotal">Sub-Total: <span class="price">LKR <?php echo $totalCart[0].".00"; ?></span></div>

<br class="clearBoth" />

<div class="wrapper">




	

		<div class="buttonRow forward"><input type="image" src="images/buttons/english/refresh.png" alt=""  title=" Referesh Cart" onclick="javascript:location.reload();" /></div>


	<?php if($_SESSION['ID'] == 2){ ?><a href="chkout1_edit.php"><?php }else {?> <a href="chkout1.php" > <?php } ?><img src="images/buttons/english/button_checkout.gif" alt="Checkout" title=" Checkout " width="110" height="25" /></a>&nbsp; &nbsp;	<a href="index.php"><img src="images/buttons/english/button_continue_shopping.gif" alt="Continue Shopping" title=" Continue Shopping " width="120" height="25" /></a>&nbsp; &nbsp;	
		

</div>

	<div class="clear"></div>

	</div>

</div>

</div>

    <?php } ?>                

                

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
