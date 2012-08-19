<?php
session_start();
include_once("_config/config.php");
require_once('_class/mysql.php');
require_once('_class/Class.Service.php');

$result = new Service;
$bookCat = $result->getBookCategory();

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
<script type="text/javascript" src="_js/functions/addToCartAll.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>


<style type="text/css">
#slider {
    /*position:left !important;*/
    width:722px !important; /* Change this to your images width */
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
    
				
            <td id="column-left" style="width:200px;" rowspan="2">
            <?php include("includes/navigation.php"); ?> 
            </td>
            
			
		
            <td id="column-center" valign="top" colspan="2" >
            
        <div >
         
            <div id="slider" class="nivoSlider" >
                
                <img src="images/DSP_banner4.jpg" alt="" />
                <img src="images/banner-portfolio.jpg" />
               
               
            </div>
           
    </div>
    <tr ><td>
			            	
                <div class="column-center-padding">

                    
						<div class="centerColumn" id="indexDefault">




<!--<div id="" class="content"></strong></div>



<div id="" class="content"></div>-->


<div id="indexDefaultMainContent"></div>



<!-- bof: featured products  -->
<div class="centerBoxWrapper" id="featuredProducts">

	  <h2 class="centerBoxHeading">Featured Products</h2>
	  <?php
	  
	   $service = new Service;
	   $resultset= $service->view_Books_Featured();
	      foreach($resultset as $row){ 
	  	   
	?>
    <div class="centerBoxContentsFeatured centeredContent back vLine " style="width:25%;"><div class="product-col" >
				<div class="img">
					<a href="products.php?id=<?php echo $row['BOOK_ID']; ?>"><img src="admin/images/bookCover/<?php echo $row['BOOK_COVER']; ?>" alt="The MacGregor Brides" title="<?php echo $row['BOOK_NAME']; ?>" width="82" height="122" /></a>
				</div>
				<div class="prod-info">
					<a class="name" href="products.php?id=<?php echo $row['BOOK_ID']; ?>"><?php echo $row['BOOK_NAME']; ?></a>
				
					<div class="text">
						<?php echo substr($row['DESCRIPTION'], 0,20)."..."; ?>
					</div>
					<div class="wrapper">
						<div class="price">
							<span class="prc">Price:</span>
							<strong>LKR <?php echo $row['SELL_PRICE'].'.00'; ?></strong>
						</div>
						<div class="button"><img src="images/buttons/english/add_to_cart.gif" alt="Add to Cart" title=" Add to Cart " width="89" height="25" onclick="addToCart(<?php echo $row['BOOK_ID']; ?>);" style="cursor:pointer" /></div>
					</div>
				</div>
			</div></div>
            <?php } ?>
    <br class="clearBoth" />
 
</div>
<!-- eof: featured products  -->





</div>                    
                
                	<div class="clear"></div>
                    
                    <!--eof content_center-->
                
                </div>
									<div class="banners">
						<ul class="tabs2">
							<li><a href="#tab4">Clearance Zone</a></li>
							<li><a href="#tab5">Pre-Orders 50% off</a></li>
							<li class="last"><a href="#tab6">Top Offers</a></li>
						</ul>
					
					<div class="tab_container">
						<div id="tab4" class="tab_content2">
							<!-- BOF- BANNER #1 display -->
														
								<div id="bannerOne"><a href=""><img src="images/banner1.jpg" alt="Clearance Zone" title=" Clearance Zone " width="523" height="125" /></a></div>
														<!-- EOF- BANNER #1 display -->
						</div>
						<div id="tab5" class="tab_content2">
						   <!-- BOF- BANNER #2 display -->
																	<div id="bannerTwo"><a href=""><img src="images/banner2.jpg" alt="Pre-Orders 50% off" title=" Pre-Orders 50% off " width="523" height="125" /></a></div>
														<!-- EOF- BANNER #2 display -->
						</div>
						<div id="tab6" class="tab_content2">
						   <div class="inner">
						   		<div class="prod prod1">
									<a href="indexe2c4.html?main_page=product_info&amp;cPath=3&amp;products_id=51"><img src="includes/templates/images/book1.jpg" alt="" width="57" height="84" /></a>
									<div class="text">
										<h6>Breaking Dawn</h6>
										<p>By <a href="indexe2c4.html?main_page=product_info&amp;cPath=3&amp;products_id=51">Stephenie Meyer</a></p>
										<span class="trade">$ 13.79</span>
										<a  class="button" href="indexe2c4.html?main_page=product_info&amp;cPath=3&amp;products_id=51"><img src="includes/templates/buttons/english/button_add_to_cart.gif" alt="" width="89" height="25" /></a>
									</div>
								</div>
								<div class="prod">
									<a href="index9c6f.html?main_page=product_info&amp;cPath=3&amp;products_id=32"><img src="includes/templates/images/book2.jpg" alt="" width="57" height="84" /></a>
									<div class="text">
										<h6>Eclipse</h6>
										<p>By <a href="index9c6f.html?main_page=product_info&amp;cPath=3&amp;products_id=32">Stephenie Meyer</a></p>
										<span class="trade">$ 11.79</span>
										<a  class="button" href="index9c6f.html?main_page=product_info&amp;cPath=3&amp;products_id=32"><img src="includes/templates/buttons/english/button_add_to_cart.gif" alt="" width="89" height="25" /></a>
									</div>
								</div>
						   </div>
						</div>
					</div>
				</div>
				
				<div class="bot-banners">
					<h3 class="title">Why Prasad Online Books </h3>
					<!-- BOF- BANNER #3 display -->
												<div id="bannerThree"><a href=""><img src="images/banner3.jpg" alt="Free Shipping" title=" Free Shipping " width="152" height="59" /></a></div>
										<!-- EOF- BANNER #3 display -->
					<!-- BOF- BANNER #4 display -->
													<div id="bannerFour"><a href=""><img src="images/banner42.jpg" alt="5 months Free Credit" title=" 5 months Free Credit " width="168" height="59" /></a></div>
										<!-- EOF- BANNER #4 display -->
					<!-- BOF- BANNER #5 display -->
													<div id="bannerFive"><a href=""><img src="images/banner5.jpg" alt="Free Gifts" title=" Free Gifts " width="205" height="59" /></a></div>
										<!-- EOF- BANNER #5 display -->
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



</body>

</html>
