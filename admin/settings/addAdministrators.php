<?php
session_start();
include_once("../_config/config.php");
require_once('../_class/mysql.php');
require_once('../_class/Class.Service.php');

$result = new Service;

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">



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
<script type="text/javascript" src="../js/ajaxupload.3.5.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.8.13.custom.min.js"></script>
<script type="text/javascript" src="../js/functions/addAdmin.js"></script>


<script type="text/javascript">
var picFileName = "";
	$(function(){
		var btnUpload=$('#upload');
		var status=$('#status');
		new AjaxUpload(btnUpload, {
			action: '../_controllers/upload-img-ProdImage.php',
			name: 'uploadfile',
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
                    // extension is not allowed 
					status.text('Only JPG, PNG or GIF files are allowed');
					return false;
				}
				$("#status").html("<img src='../images/loading.gif' />");
			   },
			    onComplete: function(file, response){
				//On completion clear the status
				//alert(response);
				status.text('');
                 $('#status').html('<img src="../images/ProductPic/'+response+'" alt="" height="50px" width="50px"  /><br />').addClass('success-2');
                 picFileName = response;
                 //Add uploaded file to list
				
			}
		});
	   });
</script>

<script type="text/javascript" charset="utf-8">
$(function () 
{
	slate.init ();
	slate.portlet.init ();	
});
</script>


    
    <script type="text/javascript" >
	function Reset(){
		confirm("Are you sure to Reset all the data..?");
		
		}
    
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
			<div class="portlet-header">
			  <h4>Add Administrators</h4></div>
			
		  <div class="portlet-content" >
				
											
						<form  method="post" class="form label-inline" id="addAdmin" >
    	
							
                            <div class="field">
							  <label for="fname">Administrator Name </label> <input id="ADMIN_NAME" name="ADMIN_NAME" size="50" type="text" class="medium" /></div>
                              <div class="field">
								<label for="type">Administrator Type</label>	
                            <select id="ADMIN_TYPE"  >
                            <optgroup label="Admin type">
                              <option value="">--Please Select--</option>
                                 
                              <option value="Admin" >Admin</option> 
                             <option value="Manager" >Manager</option>
                            <option value="Clerk" >Clerk</option>
                            <option value="Supplier" >Supplier</option>
                                 
                              </optgroup>
                             </select>
							</div>
                            <div class="field">
							  <label for="fname">User Name </label> <input id="ADMIN_USER_NAME" name="ADMIN_USER_NAME" size="50" type="text" class="medium" /></div>
                              <div class="field">
							  <label for="fname">Password </label> <input id="ADMIN_PASSWORD" name="ADMIN_PASSWORD" size="20" type="text" class="small" /></div>
                              <div class="field">
							  <label for="fname">Password </label> <input id="ADMIN_C_PASSWORD" name="ADMIN_C_PASSWORD" size="20" type="text" class="medium" /><div onclick="passgen();" style="cursor:pointer" >Click here to Generate Password</div></div>
                             
                            
						  <div class="field"><label for="description">Description</label><textarea rows="5"  id="DESCRIPTION" name="DESCRIPTION" cols="40"></textarea>
                          <div id="msg" ></div></div>
                          
                              
                          
						  <br />
                            
							<div class="buttonrow">
                                <input type="button" class="btn" value="Submit" onclick="return addAdmin();" />
                                <input type="reset" class="btn" value="Reset" onclick="return Reset();"  />
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
				
				<div id="datepicker2"></div>
			</div>			
		</div>
		

		<script type="text/javascript">

	$(function() {
		$('#datepicker2').datepicker({inline: true});
	});
	
	</script>

		
	</div> <!-- #content -->
	
	<div id="footer">
		
		<p>Copyright &copy; 2010 <a href="javascript:;">MadeByAmp</a>, all rights reserved.</p>
		
	</div> <!-- #footer -->
	
</div> <!-- #wrapper -->


	
</body>


</html>