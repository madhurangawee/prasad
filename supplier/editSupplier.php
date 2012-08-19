<?php
session_start();
include_once("../_config/config.php");
require_once('../_class/mysql.php');
require_once('../_class/Class.Service.php');

$SUP_ID = $_GET['id'];


       $service = new Service;
	   $resultset= $service->getSupplierDet($SUP_ID);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">


<!-- Mirrored from madebyamp.com/themes/slate/index2.html by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 18 May 2011 05:55:38 GMT -->
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Prasad CMS </title>	
	
	<link rel="stylesheet" href="../css/screen.css" type="text/css" media="screen" title="no title" charset="utf-8" />	
	<link rel="stylesheet" href="../css/plugin.css" type="text/css" media="screen" title="no title" charset="utf-8" />	
	<link rel="stylesheet" href="../css/custom.css" type="text/css" media="screen" title="no title" charset="utf-8" />	
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui-1.8.13.custom.css" />	
	
	<script  type="text/javascript" src="../js/jquery/jquery.1.4.2.min.js"></script>
<script  type="text/javascript" src="../js/slate/slate.js"></script>
<script  type="text/javascript" src="../js/slate/slate.portlet.js"></script>
<script  type="text/javascript" src="../js/plugin.js"></script>
<script type="text/javascript" src="../js/functions/editsupplier.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.8.13.custom.min.js"></script>


<script type="text/javascript" charset="utf-8">
$(function () 
{
	slate.init ();
	slate.portlet.init ();	
});
</script>
<script type="text/javascript">
	$(function() {
		$('#datepicker').datepicker({inline: true});
	});
	
	</script>
</head>

<body>
	
<div id="wrapper" class="clearfix">
	
	<div id="top">
    <?php 
    include("../includes/header.php");
    ?>
    	</div> <!-- #top -->
	
	<div id="content" class="xfluid">
		
		<div class="portlet x9">
			<div class="portlet-header"><h4>Add Supplier</h4></div>
			
			<div class="portlet-content">
				
											
						<form  method="post" class="form label-inline" id="addSupplier" >
	<div id="comp">
    
                          <div class="field">
								<label for="type">Supplier Type </label>
								<select id="SUP_TYPE" class="medium">

									<optgroup label="Type of Whatever">
										<option selected="selected" value="">select Type</option>
										<option value="2">Books</option>
                                        <option value="1">Individual</option>
                                        <option value="1">Individual</option>
                                        <option value="1">Individual</option>
				
									</optgroup>
								</select>
							</div>
							<div class="field"><label for="fname">Company Name </label> <input id="SUP_COM_NAME" name="fname" size="50" type="text" class="medium" value="<?php echo $resultset['SUP_COM_NAME'];  ?>" /></div>
				
							<div class="field"><label for="address1">Street </label> <input id="SUP_COM_STREET" size="50" type="text" class="large" value="<?php echo $resultset['SUP_COM_STREET'];  ?>" /></div>
							<div class="field"><label for="address2">City</label> <input id="SUP_COM_CITY" size="50" type="text" class="large" value="<?php echo $resultset['SUP_COM_CITY'];  ?>" /></div>
                            <div class="field"><label for="address2">Province</label> <input id="SUP_COM_PROVINCE" size="50" type="text" class="large" value="<?php echo $resultset['SUP_COM_PROVINCE'];  ?>" /></div>
                            <div class="field"><label for="address2">Post Code</label> <input id="SUP_COM_POSTCODE" size="12" type="text" class="medium" value="<?php echo $resultset['SUP_COM_POSTCODE'];  ?>" /></div>
							<div class="field"><label for="country" class="">Country </label> <input id="SUP_COM_COUNTRY" name="country" size="12" type="text" class="medium" value="<?php echo $resultset['SUP_COM_COUNTRY'];  ?>" /></div>
                            <div class="field phone_field"><label for="telephone">Telephone</label> <input id="SUP_COM_TEL" size="15" type="text" class="medium" value="<?php echo $resultset['SUP_COM_TEL'];  ?>" /> 
							</div>
							<div class="field"><label for="address2">Email</label> <input id="SUP_COM_MAIL" size="50" type="email" class="large" value="<?php echo $resultset['SUP_COM_EMAIL'];  ?>" /></div>
                            <div class="field"><label for="address2">Website</label> <input id="SUP_COM_WEBSITE" size="50" type="text" class="large" value="<?php echo $resultset['SUP_COM_WEBSITE'];  ?>" /></div>
                            
                           </div>
                           <!--this is for get book id--------------------------------------------->
                          <input type="hidden" value="<?php echo $SUP_ID; ?>" id="SUP_ID"  />
                          <!---------------------------------------------------------------------->
                           <br />
                           <div id="cont">
                            <div class="field">
                            <p class="field_help"><strong >Contact person details...</strong></p>
                            <label for="address2">Contact Person Name</label> <input id="SUP_CON_NAME" size="50" type="text" class="large" value="<?php echo $resultset['SUP_CON_NAME'];  ?>" /></div>
                            <div class="field"><label for="address2">Email</label> <input id="SUP_CON_MAIL" size="50" type="email" class="large" value="<?php echo $resultset['SUP_CON_EMAIL'];  ?>" /></div>
                            <div class="field phone_field"><label for="telephone">Mobile</label> <input id="SUP_CON_MOBILE" size="15" type="text" class="medium" value="<?php echo $resultset['SUP_CON_MOBILE'];  ?>" 
                            /> </div>
							<div class="field"><label for="description">Notes</label> <textarea rows="7" cols="50" name="SUP_CON_DES" id="SUP_CON_DES"></textarea>
                            <div id="msg" ></div>
                            </div>
                            
							</div>
							<br />
                            
							<div class="buttonrow">
                                <input type="button" class="btn" value="Submit" onclick="return editSupplier();" />
                                <input type="reset" class="btn" value="Reset"  />
							</div>

						</form>

<br /><br />
<br /><br />
				
			</div>
		</div>
		
		
		<div class="portlet x3">
			<div class="portlet-header"><h4>Calender</h4></div>
			
			<div class="portlet-content">
				
				<div id="datepicker"></div>
				
			</div>			
		</div>
		

		

		
	</div> <!-- #content -->
	
	<div id="footer">
		
		<?php 
    include("../includes/footer.php");
    ?>
		
	</div> <!-- #footer -->
	
</div> <!-- #wrapper -->


	
</body>


</html>