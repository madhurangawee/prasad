<?php
/*session_start();
//Check whether the session in valid
if(!isset($_SESSION['valid']) || $_SESSION['valid']!="yes"){
header("location:index.php");
exit();
}
$type = $_SESSION['user_type'];
require_once '../../dataaccess.php'; //Database Connectivity

$select=mysql_query("SELECT * FROM tbl_cattype;") or die .mysql_error();
*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
<title> "New Blooms" Flower Shop </title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" /> 
<link rel="stylesheet" type="text/css" href="../mainstyle.css" /> 
<script  type="text/javascript" src="../js/jquery/jquery.1.4.2.min.js"></script>
<script type="text/javascript" src="../js/ajaxupload.3.5.js"></script>

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
				//status.text('');
                 //$('#status').html('<img src="../images/bookCover/'+response+'" alt="" height="50px" width="50px"  /><br />').addClass('success-2');
                 picFileName = response;
				 document.getElementById('pic').value = picFileName; 
				 document.getElementById('upload').value = picFileName; 
                 //Add uploaded file to list
				
			}
		});
	   });
</script>

</head> 
<body>
<div id="wrap"> 
      <!--------- Banner and content --------->
       <div class="header"> 
       		<div class="logo"><img src="../images/logo.png" alt="" title="" border="0" /></a></div>            
          
            
            
</div> 
       <!--------- end of banner-------->
       
       <!------ center content-------->
        <div class="center_content">
		<div class="adminheader">
        <h1><b style="font-family: Verdana, Geneva, sans-serif">ADMINISTRATION AREA</b></h1>
        </div>
		<!---------- left side content------>
		<div class="left_content">
        

            <div id= "acct">
                <ul>
			      
			      <li class="selected"><a href="viewCat.php" >Categories</a></li>
                  <li><a href="../products/viewPro.php" >Products</a></li>
          		  <li><a href="../reports/reports.php" >Reports</a></li>
				  <li><a href="../deliveryList.php"> Delivery List</a></li>
                  <?php if($type == 'high_level'){
					  echo "<li><a href='../orders/orderList.php'>Orders</a></li>"; 
                  echo "<li><a href='../customers/cusList.php' >Customers</a></li>"; 
                  echo "<li><a href='../viewAdmin.php' >Administration</a></li> ";
					  } ?>
               </ul>
            </div> 
                 
              
        
        </div>
		

        <p>
          
          <!-------------- right side content----------->
        </p>
        <div class="right_content">
          
          <div class="list"> <table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="300" height="50"><u><a href="../changePsw.php">Change Password</a></u></td>
    <td width="300"><u><a href="../logOut.php">Log Out</a></u></td>
  </tr>
</table>
</div>
          
          <div class="title">Add Category</div><br />
<br /><br />
<?php

if (isset($_SESSION['emptymsg'])){
						
						print "<h3 align='center'>" .$_SESSION['emptymsg']. "</h3>";
						unset ($_SESSION['emptymsg']);
	}
else if (isset($_SESSION['msg'])){
						
						print "<h3 align='center'>" .$_SESSION['msg']. "</h3>";
						unset ($_SESSION['msg']);
	}
else if (isset($_SESSION['error'])){
						
						print "<h3 align='center'>" .$_SESSION['error']. "</h3>";
						unset ($_SESSION['error']);
	}	
?>

        <div class="form">
                
                 <form name="addCat" action="uploadCat.php" method="post" onsubmit=""> <br />
                 <div class="form_row">
                 
                 <label class="info"><strong>Category Type:</strong></label>
                <select name="catType" class="info_select">
                <option value="s" selected>-- Choose a Category Type -- </option>
                <?php
	while ($row = mysql_fetch_array($select))
{
?>
 <option value="<?php echo $row["cat_typeId"];?>"><?php echo $row["cat_type"];?></option>
 
 <?php
}
 ?>
                </select>
                 </div>

                	<div class="form_row">
                	  <label class="info"><strong>Category Name:</strong></label>
                    <input name="catName" input type="text" class="info_input"/>
                   </div>
                        
   
                    <div class="form_row">
                    <label class="info"><strong>Description:</strong></label>
                   <textarea name="des" type="text"   size="30" maxlength="50" class="info_textarea"></textarea>
                   
                   
           </div>
                    <div class="form_row">
                    <label class="info"><strong>Image:</strong></label>
                    	  <input name="file" type="file" id="upload" class="info_input"/><div id="status"> </div>
                   <input type="hidden" name="pic" id="pic"  />
           </div>
                   
                    <div class="form_row">
                    <input name="btnBack" type="button" class="button" value="Back" onclick="window.location.href='viewCat.php'" />
                   
                     <input type="submit" class="button" name="submit" value="Add" />
                     
                     <input name="btnCancel" type="button" class="button" value="Cancel" onclick="window.location.href='viewCat.php'" />
                    </div>   
          </form>     
                </div>
          
          
        </div>
     <!-------end of right side content------------>
        
        
       
       
       <div class="clear">
         <p>&nbsp;</p>
         <p>&nbsp;</p>
       </div>
       </div>
   <!---------------end of center content-------------->
       
              
      <div class="footer">COPYRIGHT (C) 2011 "NEW BLOOMS" FLOWER SHOP</div>  
        
       
     
    

</div>

</body>
</html>