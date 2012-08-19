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
				///$("#status").html("<img src='../images/loading.gif' />");
			   },
			    onComplete: function(file, response){
				//On completion clear the status
				//alert(response);
				//status.text('');
                 //$('#status').html('<img src="../images/bookCover/'+response+'" alt="" height="50px" width="50px"  /><br />').addClass('success-2');
                 picFileName = response;
				 document.getElementById('pic').value = picFileName; 
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
				
											
						<form  method="post" class="form label-inline" id="addSupplier" action="test11.php" >
    	
							
							<div class="field clearfix">								
								<label for="lname">Upload Book image  </label> 								
								
                                <input style="opacity: 0;" size="19" class="file" type="file" id="upload" /><div id="status"> </div>
                                <input type="hidden" name="pic" id="pic"  />							
							</div>
                           
                           
						  <br />
                            
							<div class="buttonrow">
                                 <input type="submit" class="btn" value="Add Catogery"  />
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
						
                        <input type="submit" class="btn" value="Add Catogery"  />
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