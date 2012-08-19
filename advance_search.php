<?php
session_start();
include_once("_config/config.php");
require_once('_class/mysql.php');
require_once('_class/Class.Service.php');
require_once('_class/paginator.class.php');
$service = new Service;

$bookCat = $service->getBookCategory();


$keyword = trim($_GET['keyword']);

$booktype = $service->get_Book_type($BOOK_TYPE);
			
$bookCat = $service->getBookCategory();
$pubCat = $service->view_Publishers();
	   
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
<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.8.13.custom.css" />	
<script type="text/javascript" src="_js/jquery-1.5.min.js"></script>
<script type="text/javascript" src="_js/jquery-ui-1.8.13.custom.min.js"></script>
<script type="text/javascript" src="_js/jscript_xdarkbox.js"></script>
<script src="_js/menu.js" type="text/javascript"></script>
<script type="text/javascript" src="_js/jscript_xtabs.js"></script>
<script type="text/javascript" src="_js/jscript_xtabs2.js"></script>
<script type="text/javascript" src="_js/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
	$(function() {
		$( "#FRM_DATE" ).datepicker({
			dateFormat: 'yy-mm-dd',
			changeMonth: true,
			changeYear: true,
		});
	});
	
	</script>
   

     <script type="text/javascript">
	$(function() {
		$( "#TO_DATE" ).datepicker({
			dateFormat: 'yy-mm-dd',
			changeMonth: true,
			changeYear: true,
	
		});
	});
	
	</script>
  <script type="text/javascript" >
function chkAdSearch(){
	
	if(document.getElementById('keyword2').value == "" && document.getElementById('categories_id').value == "" && document.getElementById('publisher_id').value == "" && document.getElementById('pfrom').value == "" && document.getElementById('pto').value == "" && document.getElementById('FRM_DATE').value == "" && document.getElementById('TO_DATE').value == "" )
	{  return false; }
	
}


function chkNumber(){
	
	if(isNaN(document.getElementById('pto').value)){
		alert("Please Enter numbers Only..!");
		document.getElementById('pto').value = "";
		}
	}
function chkNumber2(){
	
	if(isNaN(document.getElementById('pfrom').value)){
		alert("Please Enter numbers Only..!");
		document.getElementById('pfrom').value = "";
		}
	}

	</script>
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
                

    
                    
						<div class="centerColumn" id="advSearchDefault">

    
<h1 id="advSearchDefaultHeading">Advanced Search</h1>
  
   <?php if(isset($_GET['keyword'])){?><div class="warning">  There is no product that matches the search criteria for <strong>'<?php echo $_GET['keyword']; ?>'</strong>.</div><?php } ?>
<form action="advance_search_result.php" method="post" >
<fieldset>
<legend>Choose Your Search Terms</legend>
<div class="forward"><a href="">Search Help [?]</a></div>
<br class="clearBoth">
    <div class="centeredContent"><input type="text" name="keyword" id="keyword2" value="<?php echo $keyword; ?>"  onfocus="RemoveFormatString(this, &#39;keywords&#39;)">&nbsp;&nbsp;&nbsp;</div>
    
<br class="clearBoth">
</fieldset>

<div style="width:49%; float:left;">
<fieldset class="floatingBox">
    <legend>Limit to Category:</legend>
    <div class="floatLeft"><select name="categories_id" id="categories_id">
  <option value="" selected="selected">All Categories</option>
  <?php foreach($bookCat as $row){?>
                             <option value="<?php echo $row['CATOGERY_ID'];?>"><?php echo $row['CATOGERY_NAME'];?></option>
                                  <?php } ?>
</select>
</div>
<input type="checkbox" name="inc_subcat" value="1" checked="checked" id="inc-subcat"><label class="checkboxLabel" for="inc-subcat">Include Subcategories</label>
<br class="clearBoth">
</fieldset>
</div>

<div style="width:49%; float:right;">
<fieldset class="floatingBox">
    <legend>Limit to Publisher</legend>
    <select name="publisher_id" id="publisher_id">
  <option value="" selected="selected">All Publishers</option>
  <?php foreach($pubCat as $row){?>
                             <option value="<?php echo $row['PUB_ID'];?>"><?php echo $row['PUB_NAME'];?></option>
                                  <?php } ?>
</select>
<br class="clearBoth">
</fieldset>
</div>
<div class="clear"></div>

<div style="width:49%; float:left;">
<fieldset class="floatingBox">
<legend>Search by Price Range</legend>
<fieldset class="floatLeft">
    <legend>Price From:</legend>
    <input type="text" name="pfrom" id="pfrom" onblur="chkNumber2();" ></fieldset>
<fieldset class="floatLeft">
    <legend>Price To:</legend>
    <input type="text" name="pto" id="pto" onblur="chkNumber();" ></fieldset>
</fieldset> 
</div>

<div style="width:49%; float:right;">
<fieldset class="floatingBox"> 
<legend>Search by Date Added</legend>
<fieldset class="floatLeft">
    <legend>Date From:</legend>
    <input type="text" name="dfrom"  id="FRM_DATE" ></fieldset> 
<fieldset class="floatLeft">
    <legend>Date To:</legend>
    <input type="text" name="dto"  id="TO_DATE"></fieldset> 
</fieldset> 
</div>
<div class="clear"></div>


<div class="buttonRow forward" ><input type="image" src="images/buttons/english/button_search.gif" alt="Search" title=" Search " onclick="return chkAdSearch();"   ></div>
<div class="buttonRow back"><a href=""><img src="images/buttons/english/button_back.gif" alt="Back" title=" Back " width="51" height="25"></a></div>

</form>
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

<!-- ========================================= -->



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

</html>
