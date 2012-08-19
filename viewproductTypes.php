<?php
session_start();
include_once("_config/config.php");
require_once('_class/mysql.php');
require_once('_class/Class.Service.php');
require_once('_class/paginator.class.php');
$service = new Service;

$bookCat = $service->getBookCategory();


$BOOK_TYPE = $_GET['id'];
//$BOOK_TYPE = '40';
$booktype = $service->get_Book_type($BOOK_TYPE);
$num_rows= $service->view_book_Count_For_Type($BOOK_TYPE);
            $pages = new Paginator;
            $pages->items_total = $num_rows;
            $pages->mid_range = 3; // Number of pages to display. Must be odd and > 3
            $pages->paginate();
			
			
	
	   $resultset= $service->view_Books($pages,$BOOK_TYPE);
	 // print_r($resultset);
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
<script type="text/javascript" src="_js/jquery.nivo.slider.js"></script>
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

						<div class="centerColumn" id="indexProductList">

<h1 id="productListHeading"><?php echo $booktype['CATOGERY_NAME']; ?></h1>


<div class="tie3 text2 tie-margin1">
	
</div>


<br class="clearBoth" />


<div id="productListing">

<div id="productsListingListingTopLinks" class="navSplitPagesLinks forward"> &nbsp;</div>

<br class="clearBoth" />

<div class="tie tie-margin1">
	<div class="tie-indent">
		
				
		<br class="clearBoth" />
				<div style="float:right;"><?php
      echo $pages->display_pages();
      echo "<span class=\"\">".$pages->display_jump_menu();
	
	  	   
	?></div>  
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0" id="cat2Table" class="tabTable">
  <tr  class="productListing-rowheading">
   <th class="productListing-heading" align="center" scope="col" id="listCell0-0">Product Image</th>
   <th class="productListing-heading" scope="col" id="listCell0-1">Item Name</th>
   <th class="productListing-heading" align="right" width="125" scope="col" id="listCell0-2">Price</th>
  </tr>
   <?php foreach($resultset as $row){ ?>
  <tr  class="productListing">
   <td class="productListing-data" align="center"><a href="products.php?id=<?php echo $row['BOOK_ID']; ?>"><img src="admin/images/bookcover/<?php echo $row['BOOK_COVER']; ?>" alt="<?php echo $row['BOOK_NAME']; ?>" title=" <?php echo $row['BOOK_NAME']; ?> " width="82" height="122" class="listingProductImage" /></a></td>
   <td class="productListing-data"><h3 class="itemTitle"><a href="products.php?id=<?php echo $row['BOOK_ID']; ?>"><?php echo $row['BOOK_NAME']; ?> </a></h3><div class="listingDescription"><?php echo substr($row['DESCRIPTION'], 0,300)."..."; ?></div></td>
   <td class="productListing-data" align="right"><span class="price">LKR <?php echo $row['SELL_PRICE'].".00"; ?></span><br /><br /><div class="button"><img src="images/buttons/english/add_to_cart.gif" alt="Add to Cart" title=" Add to Cart " width="89" height="25" onclick="addToCart(<?php echo $row['BOOK_ID']; ?>);" style="cursor:pointer" /></div> <br /><br /></td>
  </tr>
  
 <?php } ?>
</table>	
	
		<div style="float:right;"><?php
      echo $pages->display_pages();
      echo "<span class=\"\">".$pages->display_jump_menu();
	
	  	   
	?></div>  <br class="clearBoth" />
				
		<br class="clearBoth" />
		</div>




	<div class="clear"></div>
</div>
</div>
					
                
    
<div  id="productsListingListingBottomLinks" class="navSplitPagesLinks forward"> &nbsp;</div>
<br class="clearBoth" />




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

<!-- ============================ -->



<!--bof- parse time display -->
<!--eof- parse time display -->



<!-- BOF- BANNER #6 display -->
<!-- EOF- BANNER #6 display -->




<!-- ========== IMAGE BORDER BOTTOM ========== -->

    </div>

<!-- ========================================= -->

<!--LIVEDEMO_00 -->

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
<!-- Mirrored from livedemo00.template-help.com/zencart_33226/index.php?main_page=index by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 14 Apr 2011 05:48:56 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=iso-8859-1"><!-- /Added by HTTrack -->
</html>
