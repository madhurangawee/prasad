<?php
session_start();
include_once("_config/config.php");
require_once('_class/mysql.php');
require_once('_class/Class.Service.php');
require_once('_class/2paginator.class.php');
$service = new Service;

$bookCat = $service->getBookCategory();

$_SESSION['sessid'] = session_id();
//echo $_SESSION['sessid'];
$BOOK_ID = $_GET['id'];
//$BOOK_ID = '2';;
$result1 = $service->getBooksDet($BOOK_ID);
///print_r($result);
$booktype = $service->get_Book_type($result1['BOOK_TYPE']);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en">
<meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
<head>
<title>Prasad Book shop</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<base  />

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
<script type="text/javascript" src="_js/jquery.nivo.slider.js"></script>
<script type="text/javascript" src="_js/functions/addToCart.js"></script>
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
    
				
            <td width="219" id="column-left" style="width:200px;">
            <?php include("includes/navigation.php"); ?> 
            </td>
            
			
		
        <td width="731" valign="top" id="column-center" >

                <div class="column-center-padding" style="width:auto">
                
                    <!--content_center-->
    
						<div class="centerColumn" id="productGeneral" style="width:auto">

<h1 id="productName" class="productGeneral"><?php echo $booktype['CATOGERY_NAME']; ?></h1>


<div class="tie">
	<div class="tie-indent">
	

<div class="page-content">

 
<div class="wrapper">



<div id="productMainImage" class="centeredContent back">
	<span class="image"><a href="admin/images/bookcover/<?php echo $result1['BOOK_COVER']; ?>"><img src="admin/images/bookcover/<?php echo $result1['BOOK_COVER']; ?>" alt="<?php echo $result1['BOOK_NAME']; ?>" title=" <?php echo $result1['BOOK_NAME']; ?> " width="82" height="122" />
    
    <span class="zoom"></span></a></span>
	
</div><!--eof Main Product Image-->


	<div class="name-type bot-border"><?php echo $result1['BOOK_NAME']; ?></div>
	
	
	<!--bof Product details list  -->
		<ul>
	  
	  
	  <li><?php if($result1['QUANTITY'] <= 0){ echo "<p style='color:red;'>Out Of Stock</p>";}else{echo $result1['QUANTITY']." Units in Stock";} ?> </li><br/>
      
      <li><strong> ISBN number :  </strong><?php echo $result1['ICBS_NO']; ?></li>
      <li><strong> Author :  </strong><?php echo $result1['BOOK_AUTHOR']; ?></li>
	  
	</ul>
		<!--eof Product details list -->
	
	<!--bof Product Price block -->
	<h2 id="productPrices" class="productGeneral">
		<span class="price-text">Price: &nbsp;</span>LKR
	<?php echo $result1['SELL_PRICE'].".00"; ?></h2>
	<!--eof Product Price block -->
	
	<!--bof Add to Cart Box -->
						  		<div id="cartAdd">
		<strong class="fleft text2">Add to Cart: &nbsp; &nbsp;<input type="text" class="qty" name="cart_quantity" id="quantity" value="1" maxlength="6" size="8" /></strong>&nbsp; &nbsp; &nbsp; <span class="buttonRow"><input type="image" src="images/buttons/english/button_in_cart.gif" alt="Add to Cart" title=" Add to Cart " onclick="addToCart(<?php echo $result1['BOOK_ID']; ?>);" /></span>	<span class="buttonRow"><input type="image" src="images/buttons/english/add_to_wish.gif" alt="Add to Wish List" title=" Add to Wish List " onclick="addToWishList(<?php echo $result1['BOOK_ID']; ?>);" /></span>		 </div>
	  		<!--eof Add to Cart Box-->
	<div id="msg" ></div>
</div>


 <!--bof Product description -->
<div id="productDescription" class="description biggerText"><strong>Details: </strong><?php echo $result1['DESCRIPTION']; ?></div>

<div class="wrapper bot-border">



<!--bof Prev/Next bottom position -->
<div class="navNextPrevWrapper centeredContent back">



<div class="navNextPrevList"><a href="viewproductTypes.php?id=<?php echo $result1['BOOK_TYPE']; ?>"><img src="images/buttons/english/button_return_to_product_list.gif" alt="Return to the Product List" title=" Return to the Product List " width="63" height="25" /></a></div>


</div><!--eof Prev/Next bottom position -->


<div class="prod-buttons">
<!--bof Tell a Friend button -->
<div id="productTellFriendLink" class="buttonRow forward"><a href="tell_a_frnd.php?id=<?php echo $result1['BOOK_ID']; ?>"><img src="images/buttons/english/button_TellAFriend.gif" alt="Tell a Friend" title=" Tell a Friend " width="144" height="25" /></a></div>
<!--eof Tell a Friend button -->

<!--bof Reviews button and count-->
<div id="productReviewLink" class="buttonRow forward"><a href="add_review.php?id=<?php echo $result1['BOOK_ID']; ?>"><img src="images/buttons/english/button_write_review.gif" alt="Write Review" title=" Write Review " width="106" height="25" /></a>&nbsp; &nbsp;</div>

<!--eof Reviews button and count -->
</div>

</div>
<div id="productReviewLink" class="buttonRow forward"><?php if($result1['SAMPLE_PDF'] != ""){ ?>Check Sample Pdf.<a href="admin/sample/booksample/<?php echo $result1['SAMPLE_PDF']; ?>" target="_blank" ><img src="images/buttons/english/downicon.png" alt="sample pdf" title=" Download sample pdf " width="106" height="30" /></a> <?php } ?>&nbsp; &nbsp;</div>
<div class="text2">

<p class="reviewCount"><strong>Current Reviews: 0</strong></p>

<!--bof Product date added/available-->
      <p id="productDateAdded" class="productGeneral centeredContent">This product was added to our catalog on <?php echo $result1['ADDED_DATE']; ?>.</p>

</div>
<div class="centerBoxWrapper" id="alsoPurchased">

<h2 class="centerBoxHeading">You may be Like to these Products.</h2>

    
<?php
	  
	   $service = new Service;
	   $resultset= $service->view_Books_LikeOnProductPage();
	      foreach($resultset as $row){ 
	  	   
	?> 
                  <div class="centerBoxContentsAlsoPurch" style="width:33%;">

	  

	  			<div class="product" align="center" >

					<div class="margin_col">

					<span class="image"><a href="viewproductTypes.php?id=<?php echo $row['BOOK_TYPE']; ?>"><img src="admin/images/bookcover/<?php echo $row['BOOK_COVER']; ?>" alt="Harry Potter and the Chamber of Secrets" title=" Harry Potter and the Chamber of Secrets " width="82" height="122" /></a></span><br /><a href="viewproductTypes.php?id=<?php echo $row['BOOK_TYPE']; ?>"><?php echo $row['BOOK_NAME']; ?></a>

					</div>

				</div><br />

					

					</div>
<?php } ?>
				
<br class="clearBoth" />

 

</div>

</div>

</div>
</div>

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



	<div id="footer">
     <?php include("includes/footer.php"); ?> 
</div>




    </div>



</body>
</html>
