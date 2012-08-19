<?php
session_start();
include_once("_config/config.php");
require_once('_class/mysql.php');
require_once('_class/Class.Service.php');
require_once('_class/paginator.class.php');
$service = new Service;

$bookCat = $service->getBookCategory();


$BOOK_ID = $_GET['id'];

$result = $service->getBooksDet($BOOK_ID);
$cusDet = $service->getCustomerDet($_SESSION['CUS_ID'])

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


                    

						<div class="centerColumn" id="tellAFriendDefault">





<fieldset>

<legend>Tell A Friend About '<?php echo $result['BOOK_NAME']; ?>'</legend>

<div class="alert forward">* Required information</div>

<br class="clearBoth" />



<label class="inputLabel" for="from-name">Your Name:</label>

<input type="text" name="from_name"  id="from_name" value="<?php echo $cusDet['F_NAME']; ?>" />&nbsp;<span class="alert">*</span><br class="clearBoth" />



<label class="inputLabel" for="from-email-address">Your Email:</label>

<input type="text"   id="from_email" value="<?php echo $cusDet['CUS_MAIL']; ?>" size="30"   />&nbsp;<span class="alert">*</span><br class="clearBoth" />



<label class="inputLabel" for="to-name">Friend's Name:</label>

<input type="text" name="to_name" id="to_name" />&nbsp;<span class="alert">*</span><br class="clearBoth" />



<label class="inputLabel" for="to-email-address">Friend's Email:</label>

<input type="text" name="to_email_address" id="to_email" size="30"  />&nbsp;<span class="alert">*</span><br class="clearBoth" />



<label for="email-message">Your Message:</label>

<textarea name="message" cols="30" rows="5" id="email_message"></textarea><br class="clearBoth" />
<div id="msg"></div>
</fieldset>



<div class="buttonRow back"><a href="products.php?id=<?php echo $BOOK_ID; ?>"><img src="images/buttons/english/button_back.gif" alt="Back" title=" Back " width="51" height="25" /></a></div>

<div class="buttonRow forward"><input type="image" src="images/buttons/english/button_send.gif" alt="Send Now" title=" Send Now " onclick="sendMsgToFrnd(<?php echo $BOOK_ID; ?>);" /></div>

<br class="clearBoth" />



<div id="tellAFriendAdvisory" class="advisory"><strong>This message is included with all emails sent from this site:</strong> 
<strong>IMPORTANT:</strong> For your protection and to prevent malicious use, all emails sent via this web site are logged and the contents recorded and available to the store owner. If you feel that you have received this email in error, please send an email to admin@tm.com
 
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
