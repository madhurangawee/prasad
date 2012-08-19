<?php
session_start();
include_once("../_config/config.php");
require_once('../_class/mysql.php');
require_once('../_class/Class.Service.php');

$result = new Service;
$PRODCat = $result->getProdCategory();
$PRODSup = $result->getSupplier();
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
<script type="text/javascript" src="../../ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="../js/functions/addProducts.js"></script>

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
<script type="text/javascript" charset="utf-8">
function get_sub_type(id){
	
	 alert(id);
	 var dataURL = 'id='+id;
	$.ajax({
   type: "POST",
   url: "ajax_code/getSubType.php",
   data: dataURL,
   success: function(msg){
     alert(msg);
	 $('#sub_type').html(msg);
	 
	 }
 });
	
	}
</script>
  <script type="text/javascript">
	$(function() {
		$( "#ISSUED_DATE" ).datepicker({
			changeMonth: true,
			changeYear: true,
	
		});
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
			<div class="portlet-header"><h4>Add Products</h4></div>
			
		  <div class="portlet-content" >
				
											
						<form  method="post" class="form label-inline" id="addproduct" >
    	
							
                            <div class="field">
							  <label for="fname">Product Name </label> <input id="PROD_NAME" name="PROD_NAME" size="50" type="text" class="medium" /></div>
                              <div class="field">
								<label for="type">Product  Type </label>	
                            <select id="PROD_TYPE" onchange="get_sub_type(this.value)">
                            <optgroup label="Product type">
                              <option value="">--Please Select--</option>
                                 <?php foreach($PRODCat as $row){?>
                             <option value="<?php echo $row['CATOGERY_ID'];?>"><?php echo $row['CATOGERY_NAME'];?></option>
                                  <?php } ?>
                              </optgroup>
                             </select>
							</div>
                            <div class="field" id="sub_type">
								<label for="type">Product Sub Type </label>	
                            <select id="SUB_PROD_TYPE"  >
                            <optgroup label="Sub Product type">
                              <option>--Please Select--</option>
                                
                              </optgroup>
                             </select>
							</div>
                          <div class="field"><label for="supplier">Supplier</label> 
                            <select id="PROD_SUP" class="medium">

									<optgroup label="PROD Supplier">
                                    <option>--Please Select--</option>
										 <?php foreach($PRODSup as $row2){?>
                             <option value="<?php echo $row2['SUP_ID'];?>"><?php echo $row2['SUP_COM_NAME'];?></option>
                                  <?php } ?>
										
									</optgroup>
							  </select>
                          </div>
							
                            <div class="field phone_field"><label for="">Purchase Price</label> <input id="PURCHASE_PRICE" name="PURCHASE_PRICE_msg" size="15" type="text" class="medium" onblur="chkNo(this.name);" /> 
							<p class="field_help" style="display:none; color:#C00" id="PURCHASE_PRICE_msg"><strong>Please enter Numbers Only.</strong></p></div>
                            <div class="field phone_field"><label for="">Selling Price</label> <input id="SELL_PRICE" name="SELL_PRICE_msg" size="15" type="text" class="medium" onblur="chkNo(this.name);" /> 
							<p class="field_help" style="display:none; color:#C00" id="SELL_PRICE_msg"><strong>Please enter Numbers Only.</strong></p></div>
                            <div class="field phone_field"><label for="">Quantity</label> <input id="QUANTITY" name="QUANTITY_msg" size="15" type="text" class="medium" onblur="chkNo(this.name);" /> 
							<p class="field_help" style="display:none; color:#C00" id="QUANTITY_msg"><strong>Please enter Numbers Only.</strong></p></div>
							<div class="field clearfix">								
								<label for="lname">Upload Product image  </label> 								
								
                                <input style="opacity: 0;" size="19" class="file" type="file" id="upload" /><div id="status"> </div>
                                							
							</div>
                            
							<div class="field"><label for="description">Description</label></div>
                          <div class="field"> <textarea rows="5"  id="DESCRIPTION" name="DESCRIPTION"></textarea>
                              <div id="msg" ></div>
                            </div>
						  <br />
                            
							<div class="buttonrow">
                                <input type="button" class="btn" value="Submit" onclick="return addPRODs();" />
                                <input type="reset" class="btn" value="Reset" onclick="return Reset();"  />
							</div>

						</form>

<br /><br />
<br /><br />
			</div>
          
		</div>
		  
		
  <div class="portlet x3">
			<div class="portlet-header"><h4>Add PROD Category</h4></div>
			
			
				
	  <div class="portlet-content">
				
<form id="addcatogery" action="#"  class="form label-top">
					
					<div class="field"><label for="file_name">Catogery Name </label> <input id="category" name="category" size="30" type="text" value="" />
                    
                     <div id="msgCat" ></div></div>
         
					<div class="buttonrow">
						
                        <input type="button" class="btn" value="Add Catogery" onclick="return addCategory();" />
					</div> 		
				
					
		</form>
				
			
				
    </div>			
		</div>
		

		

		
	</div> <!-- #content -->
	
	<div id="footer">
		
		<p>Copyright &copy; 2010 <a href="javascript:;">MadeByAmp</a>, all rights reserved.</p>
		
	</div> <!-- #footer -->
	
</div> <!-- #wrapper -->


	
</body>
<script type="text/javascript">
	
	CKEDITOR.replace( 'DESCRIPTION',
    {
        toolbar : 'MyToolbar',
        
    });
</script>

</html>