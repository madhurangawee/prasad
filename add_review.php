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

    
                    
						<div class="centerColumn" id="reviewsWrite">
<h1 id="reviewsWriteHeading"><?php echo $result1['BOOK_NAME']; ?> by <?php echo $result1['BOOK_AUTHOR']; ?></h1>

<!--bof Main Product Image -->
        <div id="reviewWriteMainImage" class="centeredContent back"> 


<div id="productMainImage" class="centeredContent back">
	<span class="image"><a href="admin/images/bookcover/<?php echo $result1['BOOK_COVER']; ?>"><img src="admin/images/bookcover/<?php echo $result1['BOOK_COVER']; ?>" alt="<?php echo $result1['BOOK_NAME']; ?>" title=" <?php echo $result1['BOOK_NAME']; ?> " width="82" height="122" />
    
    <span class="zoom"></span></a></span>
	
</div></div>

<!--eof Main Product Image-->
<div class="forward">
<div id="reviewsWriteProductPageLink" class="buttonRow"><a href="products.php?id=<?php echo $result1['BOOK_ID']; ?>"><img src="images/buttons/english/button_goto_prod_details.gif" alt="Go To This Product&#39;s Detailed Information" title=" Go To This Product&#39;s Detailed Information " width="108" height="25"></a></div>
<div class="buttonRow"><a href="view_review.php?id=<?php echo $result1['BOOK_ID']; ?>"><img src="images/buttons/english/button_reviews.gif" alt="Go to the Reviews Page" title=" Go to the Reviews Page " width="123" height="25"></a></div>
</div>

<h2 id="reviewsWritePrice">LKR <?php echo $result1['SELL_PRICE'].".00"; ?></h2>

<h3 id="reviewsWriteReviewer" class="">Write as: <?php  $cusDet =$service->getCustomerDet($_SESSION['CUS_ID']); echo $cusDet['F_NAME']?></h3>
<br class="clearBoth">


<div id="reviewsWriteReviewsRate" class="center">Choose a ranking for this item. 1 star is the worst and 5 stars is the best.</div>

<div class="ratingRow">
<input type="radio" name="rating" value="1" id="rating-1"><label class="" for="rating-1"><img src="images/buttons/english/stars_1_small.gif" alt="One Star" title=" One Star " width="86" height="16"></label> 
<input type="radio" name="rating" value="2" id="rating-2"><label class="" for="rating-2"><img src="images/buttons/english/stars_2_small.gif" alt="Two Stars" title=" Two Stars " width="86" height="16"></label>
<input type="radio" name="rating" value="3" id="rating-3"><label class="" for="rating-3"><img src="images/buttons/english/stars_3_small.gif" alt="Three Stars" title=" Three Stars " width="86" height="16"></label>
<input type="radio" name="rating" value="4" id="rating-4"><label class="" for="rating-4"><img src="images/buttons/english/stars_4_small.gif" alt="Four Stars" title=" Four Stars " width="86" height="16"></label>
<input type="radio" name="rating" value="5" id="rating-5"><label class="" for="rating-5"><img src="images/buttons/english/stars_5_small.gif" alt="Five Stars" title=" Five Stars " width="86" height="16"></label></div>

<label id="textAreaReviews" for="review-text">Please tell us what you think and share your opinions with others. Be sure to focus your comments on the product.</label>
<textarea name="review_text" cols="60" rows="5" id="review-text"></textarea>
    <div class="buttonRow forward"><input type="image" src="images/buttons/english/button_submit.gif" alt="Submit the Information" title=" Submit the Information " onclick="addReview(<?php echo $result1['BOOK_ID']; ?>);"></div>
<br class="clearBoth">
<div id="msg" ></div>
<div id="reviewsWriteReviewsNotice" class="notice">NOTE:</strong>  Reviews require prior approval before they will be displayed</div>

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
