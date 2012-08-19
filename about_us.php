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
<script type="text/javascript" src="_js/functions/sendContactUs.js"></script>
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
    
                    
						<div class="centerColumn" id="contactUsDefault">

<h1 id="gvFaqDefaultHeading">About Us</h1>

<div class="tie text2">
	<div class="tie-indent">


<fieldset id="contactUsForm">

<div >
  <p><strong>Prasadbookshop.com - a new Online bookstore<br /></strong>
  </p><br/>
  <p>Prasadbookshop.com is a website for  an extensive collection of books, stationery and magazines. Not only a &quot;one-stop shop&quot; for book lovers but also an interactive and innovative destination designed to make it fun and exciting to discover and shop for new books online.</p>
  <p>&nbsp;</p>
  <p> </p>
  <legend><p>Company Profile</p></legend>
  <p><br />
  </p>
  <p>Prasad Bookshop (Pvt) Ltd is a division of the Wiscom Stationery (PVT) Ltd . The bookshop first commenced business over 15 years ago in the township of Piliyandala. In 1973, it moved to a busier location and found its permanent home in Nugegoda. Within just a short period of time Sarasavi Bookshop expanded operations and activities in a network of Branches Island wide to better serve its customers.  <br />
    All our bookstores carry an extensive collection of books, stationery and magazines to cater to our broad and diverse customer base. Sarasavi Bookshop is also a direct importer and distributor of books from publishers worldwide. Books are reasonably priced and most of the best selling Sarasavi Books are now available online at our website sarasavi.lk for worldwide shipping.</p>
  <p>Prasad Bookshop (Pvt) Ltd which was established in 2000 is another subsidiary of the Sarasavi Group of Companies. It is the publishing and printing arm of Sarasavi, publishing over 100 titles per year.</p>
</div>
</fieldset>
<fieldset>
<legend>Pictures</legend>
<fieldset><div id="productMainImage" class="centeredContent back"><span class="image"><a href="images/20082011414.jpg"><img src="images/20082011414.jpg"  width="250" height="150" title="click to zoom" />
    
    <span class="zoom"></span></a></span>
    <span class="image"><a href="images/20082011410.jpg"><img src="images/20082011410.jpg"  width="250" height="150" title="click to zoom" />
    
    <span class="zoom"></span></a></span><br />
    <span class="image"><a href="images/20082011411.jpg"><img src="images/20082011411.jpg"  width="250" height="150" title="click to zoom"/>
    
    <span class="zoom"></span></a></span>
    <span class="image"><a href="images/20082011412.jpg"><img src="images/20082011412.jpg"  width="250" height="150" title="click to zoom"/>
    
    <span class="zoom"></span></a></span></div>
    
    
	
	
</fieldset>
</fieldset>



<div class="clear"></div>

	</div>
</div>

</div>                    
                
                	<div class="clear"></div>
                    
                    <!--eof content_center-->
                
                </div>
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
