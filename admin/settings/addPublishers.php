<?php
session_start();
include_once("../_config/config.php");
require_once('../_class/mysql.php');
require_once('../_class/Class.Service.php');


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
        <link href="../css/jquery.alerts.css" rel="stylesheet"  type="text/css" media="screen" title="no title" charset="utf-8"  />
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui-1.8.13.custom.css" />	
	
	<script  type="text/javascript" src="../js/jquery/jquery.1.4.2.min.js"></script>
<script  type="text/javascript" src="../js/slate/slate.js"></script>
<script  type="text/javascript" src="../js/slate/slate.portlet.js"></script>
<script  type="text/javascript" src="../js/plugin.js"></script>
<script type="text/javascript" src="../js/ajaxupload.3.5.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.8.13.custom.min.js"></script>
<script type="text/javascript" src="../../ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="../js/jquery.alerts.js"></script>


<script type="text/javascript">
function addPublishers(){
	
	if(document.getElementById('PUB_NAME').value == ""){
		$('#msgCat').html('<p  class="warning" ><strong>Please Enter Name.</strong></p>');
		return false;
		}
	var PUB_NAME = document.getElementById('PUB_NAME').value;
	var dataURL = 'PUB_NAME='+ PUB_NAME+ '&mode=add' ;
	$.ajax({
   type: "POST",
   url: "../_controllers/bookPublisherController.php",
   data: dataURL,
   success: function(msg){
     alert(msg);
	 if(msg == '1'){
		 window.location.reload(true);
		 $('#msgCat').html('<p class="success" ><strong>Succesully inserted.</strong></p>');
		 
		 }else{
			 $('#msgCat').html('<p class="warning" ><strong>This Publisher already in the System.</strong></p>');
			 }
			 
   }
   });
	}
	
	
</script>


<script type="text/javascript" >

function deleteFunction(trid,action,id,msg){

//alert(id);
jConfirm(msg,'Please Confirm', function(result){
if (result) {
$.ajax({
type: "POST",
url: "../_controllers/deletePublisher.php",
data: "id="+id ,
success: function(msg){
//alert(msg);
if(msg==1){
document.getElementById(trid).style.display='none';
}else{

}
}

});

}else{


}
});


}
</script>

<script type="text/javascript" charset="utf-8">
$(function () 
{
	slate.init ();
	slate.portlet.init ();	
});
</script>

  <script type="text/javascript">
	function showcatogeryeditdiv(id){	
	    document.getElementById('features_old'+id).style.display='none';
		document.getElementById('features_edit'+id).style.display='';

		document.getElementById('editbtn'+id).style.display='none';
		document.getElementById('savebtn'+id).style.display='';		
	}
		</script>
        
<script type="text/javascript">
function updatepublisher(id){	

   var PUB_NAME = document.getElementById('features'+id).value;
   $.ajax({
   type: "POST",
   url: "../_controllers/bookPublisherController.php",
   data: "id="+id + "& PUB_NAME="+PUB_NAME+ '&mode=edit',
   success: function(msg){
	   alert(msg);
	   if(msg==1){	 
	   		document.getElementById('features_edit'+id).style.display='none';
			document.getElementById('features_old'+id).style.display='';
		
			$('#features_old'+id).html(PUB_NAME);
			
	   	   document.getElementById('editbtn'+id).style.display='';
		   document.getElementById('savebtn'+id).style.display='none';		
           }else{
		    }
            } 
 });
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
		
		
			
			
		  <div class="portlet x4">
			<div class="portlet-header">
			  <h4>Add Book Publishers</h4></div>
			
			<div class="portlet-content">
			<form id="addcatogery" action="#"  class="form label-top">
					
					<div class="field">
					  <label for="file_name">Publisher Name </label> <input id="PUB_NAME" name="PUB_NAME" size="30" type="text" value="" />
                    
                     <div id="msgCat" ></div></div>
         
					<div class="buttonrow">
						
                        <input type="button" class="btn" value="Add" onclick="return addPublishers();" />
					</div> 		
				
					
		</form>
			</div>
		</div>
        <div class="portlet x8">
			<div class="portlet-header">
			  <h4>View Book Publishers</h4></div>
			
			<div class="portlet-content">
			
			<div style="float:right;"><?php
	   $service = new Service;
	   $resultset= $service->view_Publishers();
	   
	?></div>  
				<table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">
					<thead>
						<tr>
							<th>Publisher ID</th>
							<th>Publisher Name</th>
                            <th>Action</th>
                            
                           
                            
						</tr>
					</thead>
					<tbody>
                    <?php foreach($resultset as $row){ ?>
						<tr id="catogery<?php echo $row['PUB_ID']; ?>" >
							<td><?php echo $row['PUB_ID']; ?></td>
							<td><span id="features_old<?php echo $row['PUB_ID']; ?>"><?php echo $row['PUB_NAME']; ?></span>
                                                <span style="display:none;" id="features_edit<?php echo $row['PUB_ID']; ?>">
                          <input id="features<?php echo $row['PUB_ID']; ?>" type="text" value="<?php echo $row['PUB_NAME']; ?>"/></span></td>
                            
                            <td>
                      
           
     <a style="cursor:pointer;" id="editbtn<?php echo $row['PUB_ID']; ?>" title="Edit"><img src="../images/edit.png" alt="Edit" onclick="showcatogeryeditdiv(<?php echo $row['PUB_ID']; ?>)"/></a><a style="display:none;cursor:pointer;" id="savebtn<?php echo $row['PUB_ID']; ?>"  title="Save"><img src="../images/button_save.png" width="25" alt="Edit" onclick="updatepublisher(<?php echo $row['PUB_ID']; ?>)"/></a>
     
            <a onclick="deleteFunction('catogery<?php echo $row['PUB_ID']; ?>','deletecatogery',<?php echo $row['PUB_ID']; ?>,'Are you sure to delete book Catogery..?')">
			<img src="../images/delete.png" width="20" height="20" alt="Delete Item" /></a>
           
           </td>
           
					  </tr>
						<?php } ?>
                    
                        </tbody>
                        </table>
                       
                        							
						

<br /><br />
<br /><br />
				
			</div>
		</div>
		
		
			</div>
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