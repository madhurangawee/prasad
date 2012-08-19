<?php
session_start();
include_once("../_config/config.php");
require_once('../_class/mysql.php');
require_once('../_class/Class.Service.php');

$result = new Service;
$bookCat = $result->getBookCategory();
$bookSup = $result->getSupplier();
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
<script type="text/javascript" src="../js/functions/addBooks.js"></script>

<script type="text/javascript">
var picFileName = "";
	$(function(){
		var btnUpload=$('#upload');
		var status=$('#status');
		new AjaxUpload(btnUpload, {
			action: '../_controllers/upload-img-bookCover.php',
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
                 $('#status').html('<img src="../images/bookCover/'+response+'" alt="" height="50px" width="50px"  /><br />').addClass('success-2');
                 picFileName = response;
                 //Add uploaded file to list
				
			}
		});
	   });
</script>
<script type="text/javascript">
var pdfFileName = "";
	$(function(){
		var btnUpload=$('#upload2');
		var status=$('#status2');
		new AjaxUpload(btnUpload, {
			action: '../_controllers/upload-pdf-book.php',
			name: 'uploadfile',
			onSubmit: function(file, ext){
				 if (! (ext && /^(pdf|doc|docx|gif)$/.test(ext))){ 
                    // extension is not allowed 
					status.text('Only PDF, DOC or DOCX files are allowed');
					return false;
				}
				$("#status2").html("<img src='../images/loading.gif'  />");
			   },
			    onComplete: function(file, response){
				//On completion clear the status
				//alert(response);
				status.text('');
                 $('#status2').html('<img src="../sample/booksample/'+response+'" alt="" height="50px" width="50px"  /><br />').addClass('success-2');
				 $('#status2').html('Succesfully uplaoded..!');
                 pdfFileName = response;
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
			<div class="portlet-header"><h4>Add Books</h4></div>
			
		  <div class="portlet-content" >
				
											
						<form  method="post" class="form label-inline" id="addSupplier" >
    	
							<div class="field">
								<label for="type">Book Category </label>	
                            <select id="BOOK_TYPE"  >
                            <optgroup label="Book type">
                              <option>--Please Select--</option>
                                 <?php foreach($bookCat as $row){?>
                             <option value="<?php echo $row['CATOGERY_ID'];?>"><?php echo $row['CATOGERY_NAME'];?></option>
                                  <?php } ?>
                              </optgroup>
                             </select>
							</div>
                            <div class="field">
							  <label for="fname">Book Name </label> <input id="BOOK_NAME" name="BOOK_NAME" size="50" type="text" class="medium" /></div>
							<div class="field"><label for="address2">ICBS No</label> <input id="ICBS_NO" name="ICBS_msg" size="50" type="text" class="large" onblur="chkNo(this.name);" />
                            <p class="field_help" style="display:none; color:#C00" id="ICBS_msg"><strong>Please enter Numbers Only.</strong></p></div>
                            <div class="field"><label for="address2">Author</label> <input id="BOOK_AUTHOR" size="50" type="text" class="large" /></div>
                            <div class="field"><label for="address2">Publisher</label> 
                            <select id="BOOK_PUBLISHER" class="medium">

									<optgroup label="Book Publisher">
										<option selected="selected">Corporate</option>
										<option>Individual</option>
				
									</optgroup>
							  </select>
                          </div>
                          <div class="field"><label for="supplier">Supplier</label> 
                            <select id="BOOK_SUP" class="medium">

									<optgroup label="Book Supplier">
                                    <option>--Please Select--</option>
										 <?php foreach($bookSup as $row2){?>
                             <option value="<?php echo $row2['SUP_ID'];?>"><?php echo $row2['SUP_COM_NAME'];?></option>
                                  <?php } ?>
										
									</optgroup>
							  </select>
                          </div>
							<div class="field"><label for="country" class="">Year </label> <input id="ISSUED_DATE" name="ISSUED_DATE" size="12" type="text" class="medium" /></div>
                            <div class="field phone_field"><label for="">Purchase Price</label> <input id="PURCHASE_PRICE" name="PURCHASE_PRICE_msg" size="15" type="text" class="medium" onblur="chkNo(this.name);" /> 
							<p class="field_help" style="display:none; color:#C00" id="PURCHASE_PRICE_msg"><strong>Please enter Numbers Only.</strong></p></div>
                            <div class="field phone_field"><label for="">Selling Price</label> <input id="SELL_PRICE" name="SELL_PRICE_msg" size="15" type="text" class="medium" onblur="chkNo(this.name);" /> 
							<p class="field_help" style="display:none; color:#C00" id="SELL_PRICE_msg"><strong>Please enter Numbers Only.</strong></p></div>
                            <div class="field phone_field"><label for="">Quantity</label> <input id="QUANTITY" name="QUANTITY_msg" size="15" type="text" class="medium" onblur="chkNo(this.name);" /> 
							<p class="field_help" style="display:none; color:#C00" id="QUANTITY_msg"><strong>Please enter Numbers Only.</strong></p></div>
							<div class="field clearfix">								
								<label for="lname">Upload Book image  </label> 								
								
                                <input style="opacity: 0;" size="19" class="file" type="file" id="upload" /><div id="status"> </div>
                                							
							</div>
                           
                            <div class="field clearfix">								
								<label for="lname">Uplaod Sample pages  </label> 								
								<input style="opacity: 0;" size="19" class="file" type="file" id="upload2" /><div id="status2"> </div>							
							</div>
                       
                            
							<div class="field"><label for="description">Description</label></div>
                          <div class="field"> <textarea rows="5"  id="DESCRIPTION" name="DESCRIPTION"></textarea>
                              <div id="msg" ></div>
                            </div>
						  <br />
                            
							<div class="buttonrow">
                                <input type="button" class="btn" value="Submit" onclick="return addbooks();" />
                                <input type="reset" class="btn" value="Reset" onclick="return Reset();"  />
							</div>

						</form>

<br /><br />
<br /><br />
			</div>
          
		</div>
		  
		
  <div class="portlet x3">
			<div class="portlet-header"><h4>Add Book Category</h4></div>
			
			
				
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