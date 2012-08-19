<?php
session_start();
include_once("_config/config.php");
include_once("_config/check-session.php");
require_once('_class/mysql.php');
require_once('_class/Class.Service.php');
require_once('_class/paginator.class.php');

$service = new Service;
$bookCat = $service->getBookCategory();

$BOOK_ID = $_GET['id'];
//$BOOK_ID = '2';;
$result1 = $service->getBooksDet($BOOK_ID);
///print_r($result);
$booktype = $service->get_Book_type($result1['BOOK_TYPE']);


$num_rows= $service->view_review_Count($BOOK_ID);
            $pages = new Paginator;
            $pages->items_total = $num_rows;
            $pages->mid_range = 3; // Number of pages to display. Must be odd and > 3
            $pages->paginate();
			
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
<script type="text/javascript" src="_js/functions/review.js"></script>
<script type="text/javascript" src="_js/functions/addToCartAll.js"></script>
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
                
    
                    
						<div class="centerColumn" id="reviewsInfoDefault">

<div class="tie">
	<div class="tie-indent">
		
		
		<div class="wrapper">
			<div class="fleft" style="width:23%">
								
				<div id="reviewsInfoDefaultProductImage" class="centeredContent back"> 


<div id="productMainImage" class="centeredContent back">
	<span class="image"><a href="admin/images/bookcover/<?php echo $result1['BOOK_COVER']; ?>"><img src="admin/images/bookcover/<?php echo $result1['BOOK_COVER']; ?>" alt="<?php echo $result1['BOOK_NAME']; ?>" title=" <?php echo $result1['BOOK_NAME']; ?> " width="82" height="122" />
    <span class="zoom"></span></a></span>
	
</div></div>
					
			</div>
			<div class="fleft" style="width:76%">
				<div class="name-type"><?php echo $result1['BOOK_NAME']; ?> by <?php echo $result1['BOOK_AUTHOR']; ?></div>
	<?php if($num_rows == 0){ ?>
		<div class="info" >Be the first to review this product..!</div>
		
		<?php }else {?>
				<h3 class="rating"><?php if($result1['REVIEW'] == 1){ ?>
                <img src="images/stars_1.gif" alt="" width="104" height="19"></h3>
				<?php } ?>
                <?php if($result1['REVIEW'] == 2){ ?>
                <img src="images/stars_2.gif" alt="" width="104" height="19"></h3>
				<?php } ?><?php if($result1['REVIEW'] == 3){ ?>
                <img src="images/stars_3.gif" alt="" width="104" height="19"></h3>
				<?php } ?><?php if($result1['REVIEW'] == 4){ ?>
                <img src="images/stars_4.gif" alt="" width="104" height="19"></h3>
				<?php } ?><?php if($result1['REVIEW'] == 5){ ?>
                <img src="images/stars_5.gif" alt="" width="104" height="19"></h3>
				<?php } ?>
                
                <div id="reviewsInfoDefaultMainContent" style="font-size:11px"><?php echo $result1['REVIEW']; ?>/5 from <?php  echo $num_rows;  ?> reviews</div>
                <br />
                
				<h2 id="reviewsInfoDefaultPrice" class=""><span class="price-text">Price: </span>LKR <?php echo $result1['SELL_PRICE'].".00"; ?></h2>
				
                <div style="float:right;"><?php

      echo $pages->display_pages();
      echo "<span class=\"\">".$pages->display_jump_menu();
	   
	   $resultset2= $service->view_reviews($BOOK_ID,$pages);
	  	   
	?></div> 
    <div class="clear"></div>
    <?php foreach($resultset2 as $row){ ?>
				<div class="date-added">Date Added: <?php echo $row['ADDED_DATE']; ?> &nbsp;by <?php $cusDet = $service->getCustomerDet($row['CUS_ID']); echo  $cusDet['F_NAME'];  ?> </div>
	
				
				<div id="reviewsInfoDefaultMainContent" class="content"><?php echo $row['COMMNT']; ?></div>
				<?php } ?>
                  <?php } ?>
				<div class="button-padding">
					<img src="images/buttons/english/button_in_cart.gif" alt="Add to Cart" title=" Add to Cart " width="133" height="25" onclick="addToCart(<?php echo $row['BOOK_ID']; ?>);" style="cursor:pointer">&nbsp;&nbsp; 					
					<a href="products.php?id=<?php echo $BOOK_ID; ?>"><img src="images/buttons/english/button_goto_prod_details.gif" alt="Go To This Product&#39;s Detailed Information" title=" Go To This Product&#39;s Detailed Information " width="108" height="25"></a>&nbsp;&nbsp;					
										
					<a href="add_review.php?id=<?php echo $BOOK_ID; ?>"><img src="images/buttons/english/button_write_review.gif" alt="Write Review" title=" Write Review " width="106" height="25"></a>				</div>
				
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



<!-- ========== FOOTER ========== -->


	<div id="footer">
     <?php include("includes/footer.php"); ?> 
</div>

    </div>




</body>
</html>
