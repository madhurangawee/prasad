<?php
session_start();
include_once("_config/config.php");
require_once('_class/mysql.php');
require_once('_class/Class.Service.php');
require_once('_class/2paginator.class.php');
$service = new Service;

$bookCat = $service->getBookCategory();

$num_rows= $service->view_book_Count();
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
@import url("css/paginator.css");
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

<div class="main-width">


    
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
                
    
                    
			<div class="centerColumn" id="newProductsDefault">

<h1 id="newProductsDefaultHeading">New Products</h1>


<div id="sorter" class="tie2">
<div class="tie2-indent">
	<label for="disp-order-sorter">Sort by: </label>
    <select name="disp_order" onchange="this.form.submit();" id="disp-order-sorter">
    <option value="1" >Product Name</option>
    <option value="2" >Product Name - desc</option>
    <option value="3" >Price - low to high</option>
    <option value="4" >Price - high to low</option>
    <option value="5" >Model</option>
    <option value="6" selected="selected">Date Added - New to Old</option>
    <option value="7" >Date Added - Old to New</option>
    </select>
	</div>	
</div>

<br class="clearBoth" />

<div id="newProductsDefaultListingTopNumber" class="navSplitPagesResult back">Displaying  <strong>4</strong> (of <strong><?php  echo $num_rows; ?></strong> new products)</div>
<div style="float:right;"><?php
      echo $pages->display_pages();
      echo "<span class=\"\">".$pages->display_jump_menu();
	   
	   $resultset= $service->view_New_Books($pages);
	  	   
	?></div>  
<br class="clearBoth" />

<?php foreach($resultset as $row){ ?>
<div class="wrapper">

 <div class="tie tie-margin1">
 	<div class="tie-indent">
	<div class="wrapper">
          <div class="fleft" style="width:23%">
              <span class="image"><a href="products.php?id=<?php echo $row['BOOK_ID']; ?>"><img src="admin/images/bookcover/<?php echo $row['BOOK_COVER']; ?>" alt="The Naked Pint" title=" The Naked Pint " width="82" height="122" /> </a></span><br clear="all" /><br clear="all" /><span class="stock">In Stock: <?php echo $row['QUANTITY']; ?></span>            </div>
            <div class="fleft" style="width:76%">
              Date Added: <?php echo $row['ADDED_DATE']; ?><br clear="all" /><br clear="all" /><hr /><br /><a class="name" href=""><strong><?php echo $row['BOOK_NAME']; ?></strong></a><br clear="all" /><br clear="all" />
              <strong>ISBN number: </strong><br />
              <?php echo $row['ICBS_NO']; ?><br clear="all" /><br clear="all" /><span class="price-text">Price: &nbsp;</span> <span class="price"> LKR <?php echo $row['SELL_PRICE']; ?>.00</span><br clear="all" /><br clear="all" /><img src="images/buttons/english/button_buy_now.gif" alt="Buy Now" title=" Buy Now " width="72" height="25" onclick="addToCart(<?php echo $row['BOOK_ID']; ?>);" style="cursor:pointer" />&nbsp;<br /><br clear="all" />            </div>
	</div>
	  <div class="wrapper">
		  <br /><div class="description"><strong>Details:</strong><?php echo substr($row['DESCRIPTION'], 0,400); ?><a href="products.php?id=<?php echo $row['BOOK_ID']; ?>"> ... more info</a></div>		</div>
		
		</div>
	</div>
</div>
<?php } ?>
  <div id="newProductsDefaultListingBottomNumber" class="navSplitPagesResult back">Displaying <strong>1</strong> to <strong>4</strong>  (of <strong><?php  echo $num_rows; ?></strong> new products)</div>
 <div style="float:right;"><?php
      echo $pages->display_pages();
      echo "<span class=\"\">".$pages->display_jump_menu();
 	   
	?></div>
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
