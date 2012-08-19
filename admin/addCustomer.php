<?php 
include_once("_config/config.php");
require_once('_class/mysql.php');
require_once('_class/Class.Service.php');
require_once('_class/paginator.class.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Prasad CMS </title>	
	
	<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="no title" charset="utf-8" />	
	<link rel="stylesheet" href="css/plugin.css" type="text/css" media="screen" title="no title" charset="utf-8" />	
	<link rel="stylesheet" href="css/custom.css" type="text/css" media="screen" title="no title" charset="utf-8" />	
    <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.8.13.custom.css" />		
	
	<script  type="text/javascript" src="js/jquery/jquery.1.4.2.min.js"></script>
<script  type="text/javascript" src="js/slate/slate.js"></script>
<script  type="text/javascript" src="js/slate/slate.portlet.js"></script>
<script  type="text/javascript" src="js/plugin.js"></script>
<script type="text/javascript" src="js/functions/register.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.13.custom.min.js"></script>


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
    include("includes/header.php");
    ?>
    	</div> <!-- #top -->
	
	<div id="content" class="xfluid">
		
		<div class="portlet x9">
			<div class="portlet-header"><h4>Add Customer</h4></div>
			
			<div class="portlet-content">
				
											
						<form  method="post" class="form label-inline" id="addCustomer" >
	
							<div class="field"><label for="fname">First Name </label> <input id="F_NAME" name="fname" size="50" type="text" class="medium" /><span id="flyerNumInfo"></span></div>
				
							<div class="field"><label for="lname">Last Name </label> <input id="L_NAME" name="lname" size="50" type="text" class="medium" /></div>
							
							<div class="field"><label for="address1">Street </label> <input id="CUS_STREET" size="50" type="text" class="large" /></div>
							<div class="field"><label for="address2">City</label> <input id="CUS_CITY" size="50" type="text" class="large" /></div>
                            <div class="field"><label for="address2">Province</label> <input id="CUS_PROVINCE" size="50" type="text" class="large" /></div>
                            <div class="field"><label for="address2">Post Code</label> <input id="CUS_POSTCODE" size="12" type="text" class="medium" onblur="chkNo3();" />
                            <p class="field_help" id="postcode_msg"></p></div>
                            
							<div class="field phone_field"><label for="telephone">Telephone</label> <input id="CUS_TEL" size="15" type="text" class="medium" onblur="chkNo();" /> 

								<p class="field_help" id="mobile_msg">(###) - ### - ####</p>
				
							</div>
               <div class="field phone_field"><label for="telephone">Mobile</label> <input id="CUS_MOBILE" size="15" type="text" class="medium" onblur="chkNo2();"/> 

								<p class="field_help" id="mobile_msg2">(###) - ### - ####</p>
				
							</div>
							<div class="field" ><label for="address2">Email</label> <input id="CUS_MAIL" size="50" type="text" class="large" /></div>

							<div class="field"><label for="description">Description</label> <textarea rows="7" cols="50" name="CUS_DES" id="CUS_DES"></textarea>
                             <div id="msg" ></div>
                            </div>
							
							<br />
                           
							<div class="buttonrow">
                                <input type="button" class="btn" value="Submit" onclick="return registerCustomer();" />
                                <input type="reset" class="btn" value="Reset"  />
							</div>

						</form>

<br /><br />
<br /><br />
				
			</div>
		</div>
		
		
		<div class="portlet x3">
			<div class="portlet-header">
			  <h4>Calender</h4></div>
			
			<div class="portlet-content">
				
				<div id="datepicker"></div>
			</div>			
		</div>
		

		

		
	</div> <!-- #content -->
	
	<div id="footer">
		
		<p>Copyright &copy; 2011 <a href="javascript:;">PoweredMadhuranga</a>, all rights reserved.</p>
		
	</div> <!-- #footer -->
	
</div> <!-- #wrapper -->


	
</body>


</html>