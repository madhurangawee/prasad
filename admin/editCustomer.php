<?php 
include_once("_config/config.php");
require_once('_class/mysql.php');
require_once('_class/Class.Service.php');
require_once('_class/paginator.class.php');

$CUS_ID = $_GET['id'];
 
$service = new Service;

$result = $service->getCustomerDet($CUS_ID);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>


	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Slate Admin</title>	
	
	<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="no title" charset="utf-8" />	
	<link rel="stylesheet" href="css/plugin.css" type="text/css" media="screen" title="no title" charset="utf-8" />	
	<link rel="stylesheet" href="css/custom.css" type="text/css" media="screen" title="no title" charset="utf-8" />		
	
	<script  type="text/javascript" src="js/jquery/jquery.1.4.2.min.js"></script>
<script  type="text/javascript" src="js/slate/slate.js"></script>
<script  type="text/javascript" src="js/slate/slate.portlet.js"></script>
<script  type="text/javascript" src="js/plugin.js"></script>
<script type="text/javascript" src="js/functions/editcustomer.js"></script>


<script type="text/javascript" charset="utf-8">

$(function () 
{
	slate.init ();
	slate.portlet.init ();	
});
</script>
</head>

<body>
	
<div id="wrapper" class="clearfix">
	
	<div id="top">
    <?php 
    include("includes/header.php");
    ?>
    	</div> <!-- #top -->
	
	<div id="content" class="xfluid">
		
		<div class="portlet x9">
			<div class="portlet-header"><h4>Edit Customer</h4></div>
			
			<div class="portlet-content">
				
											
						<form  method="post" class="form label-inline" id="addCustomer" >
	
			<div class="field"><label for="fname">First Name </label> <input id="F_NAME" name="fname" size="50" type="text" class="medium" value="<?php echo $result['F_NAME'];  ?>" /><span id="flyerNumInfo"></span></div>
				
							<div class="field"><label for="lname">Last Name </label> <input id="L_NAME" name="lname" size="50" type="text" class="medium" value="<?php echo $result['L_NAME'];  ?>" /></div>
							
			<div class="field"><label for="address1">Street </label> <input id="CUS_STREET" size="50" type="text" class="large" value="<?php echo $result['CUS_STREET'];  ?>" /></div>
							<div class="field"><label for="address2">City</label> <input id="CUS_CITY" size="50" type="text" class="large" value="<?php echo $result['CUS_CITY'];  ?>" /></div>
                            <div class="field"><label for="address2">Province</label> <input id="CUS_PROVINCE" size="50" type="text" class="large" value="<?php echo $result['CUS_PROVINCE'];  ?>" /></div>
                            <div class="field"><label for="address2">Post Code</label> <input id="CUS_POSTCODE" size="12" type="text" class="medium" value="<?php echo $result['CUS_POSTCODE'];  ?>" /></div>
							<div class="field"><label for="country" class="">Country </label> <input id="CUS_COUNTRY" name="country" size="12" type="text" class="medium" />
				<input type="hidden" value="<?php echo $CUS_ID; ?>" id="CUS_ID"  />
								<p class="field_help">Field help text.</p>
							</div>
                            
							<div class="field phone_field"><label for="telephone">Telephone</label> <input id="CUS_TEL" value="<?php echo $result['CUS_TEL'];  ?>" size="15" type="text" class="medium" onblur="chkNo();" /> 

								<p class="field_help" id="mobile_msg">(###) - ### - ####</p>
				
							</div>
               <div class="field phone_field"><label for="telephone">Mobile</label> <input id="CUS_MOBILE" size="15" value="<?php echo $result['CUS_MOBILE'];  ?>" type="text" class="medium" onblur="chkNo2();"/> 

								<p class="field_help" id="mobile_msg2">(###) - ### - ####</p>
				
							</div>
							<div class="field" ><label for="address2">Email</label> <input id="CUS_MAIL" value="<?php echo $result['CUS_MAIL'];  ?>" size="50" type="text" class="large" /></div>

							<div class="field"><label for="description">Description</label> <textarea rows="7" cols="50" name="CUS_DES" id="CUS_DES"><?php echo $result['CUS_DES'];  ?></textarea>
                             <div id="msg" ></div>
                            </div>
							
							<br />
                           
							<div class="buttonrow">
                                <input type="button" class="btn" value="Save changes" onclick="return editCustomer();" />
                                <input type="reset" class="btn" value="Reset"  />
							</div>

						</form>

<br /><br />
<br /><br />
				
			</div>
		</div>
		
		
		<div class="portlet x3">
			<div class="portlet-header"><h4>Sidebar</h4></div>
			
			<div class="portlet-content">
				
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				
			</div>			
		</div>
		

		

		
	</div> <!-- #content -->
	
	<div id="footer">
		
		<p>Copyright &copy; 2010 <a href="javascript:;">MadeByAmp</a>, all rights reserved.</p>
		
	</div> <!-- #footer -->
	
</div> <!-- #wrapper -->


	
</body>


</html>