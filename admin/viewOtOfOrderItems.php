<?php 
include_once("_config/config.php");
require_once('_class/mysql.php');
require_once('_class/Class.Service.php');
require_once('_class/paginator.class.php');
$service = new Service;

if($_GET['status']=='active'){
   $status='1';}
if($_GET['status']=='inactive'){
   $status='0';}
   
		   
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Prasad CMS </title>	
	<style type="text/css">
@import url("../css/paginator.css");
</style>
	<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="no title" charset="utf-8" />	
	<link rel="stylesheet" href="css/plugin.css" type="text/css" media="screen" title="no title" charset="utf-8" />	
	<link rel="stylesheet" href="css/custom.css" type="text/css" media="screen" title="no title" charset="utf-8" />		
    <link href="css/jquery.alerts.css" rel="stylesheet"  type="text/css" media="screen" title="no title" charset="utf-8"  />	
    <link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" media="screen" />
    
	
	<script  type="text/javascript" src="js/jquery/jquery.1.4.2.min.js"></script>
<script  type="text/javascript" src="js/slate/slate.js"></script>
<script  type="text/javascript" src="js/slate/slate.portlet.js"></script>
<script  type="text/javascript" src="js/plugin.js"></script>
<script type="text/javascript" src="js/ajaxupload.3.5.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.13.custom.min.js"></script>
<script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
<script type="text/javascript" src="js/jquery.alerts.js"></script>
<script  type="text/javascript" src="js/widgets.js"></script>


    
<script type="text/javascript"> 
$(document).ready(function(){
	
//Set default open/close settings

$('.accordion_container').accordion ();

$('.tab_container').tabs ();

 
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
       
		$('a.lightbox').lightBox();
    });
    </script>
<script type="text/javascript">
function changePermission(id){
		
		
		var dataURL = "id=" + id +"&mode=products";
		
			$.ajax({
			   type: "POST",
			   url: "../_controllers/statuschange-controller.php",
			   data: dataURL,
			   success: function(msg){
			//alert(msg);
				if(msg==1){
					document.getElementById("status"+id).src = "../images/accept.png";
					document.getElementById("status2"+id).src = "../images/accept.png";
				}else if(msg==0){
					document.getElementById("status"+id).src = "../images/deny.png";
					document.getElementById("status2"+id).src = "../images/deny.png";
				}
				
			   }
			 });
		
	
		//document.getElementById("status"+id).src = "images/accept.png";
	
	}
	
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
		
		<div class="portlet x12">
			<div class="portlet-header"><h4>view Products</h4></div>
			
			<div class="portlet-content">
				<div class="tab_container">
				    <ul class="tabs"> 
                     <li><a href="#books">Books</a></li> 
                   
					
				        <li><a href="#statinery">Statinery</a></li>  
                        
				      
				    </ul> 
				    
				    <div class="tab_content_container"> 
                    <div id="books" class="tab_content"> 
                  
                  
                 <?php
	  
	   $resultset= $service->view_OutOfStock_Books();
	  	   
	?> 
				<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
					<thead>
						<tr>
							<th>Book Name</th>
							<th>Book Type</th>
                            <th>ISBN</th>
                            <th>Quantity</th>
                            <th>Supplier</th>
                            <th>Price</th>
                            <th>Action</th>
                           
                            
						</tr>
					</thead>
					<tbody>
                    <?php foreach($resultset as $row){ ?>
						<tr id="book<?php echo $row['BOOK_ID']; ?>" >
							<td><?php echo $row['BOOK_NAME']; ?></td>
							<td><?php 
							 $resultset2= $service->get_Book_type($row['BOOK_TYPE']);
							echo $resultset2['CATOGERY_NAME']; ?></td>
							<td><?php  echo $row['ICBS_NO'];  ?></td>
							<td><?php echo $row['QUANTITY']; ?></td>
                            <td><a href="Supplier/editSupplier.php?id=<?php echo $row["SUP_ID"];?>"><?php 
							$resultset3= $service->getSupplierDet($row['SUP_ID']);
							echo $resultset3['SUP_COM_NAME']; ?></a></td>
                            <td class="align-center">  <?php echo $row['SELL_PRICE']; ?>.00 </td>
                            <td>
            <a href="invoice.php?id=<?php echo $row['BOOK_ID']; ?>&type=<?php echo $row['ITEM_TYPE']; ?>&supid=<?php echo $row["SUP_ID"];?>" >Send Invoice</a>
           
           </td>
						</tr>
						<?php } ?>
                    
                        </tbody>
                        </table>
                       
                        							
						

<br /><br />
<br /><br />
                  
                  
                    </div>
				    	 
				        <div id="statinery" class="tab_content"> 

                      
			<?php
      
	  
	   $resultset2= $service->view_OutOfStock_Products();
	  	   
	?>
				<table cellpadding="0" cellspacing="0" border="0" class="display"  id="example">
					<thead>
						<tr>
							<th>Product Name</th>
                            <th>Product Type</th>
							<th>Product sub type</th>
                            <th>Quantity</th>
                            <th>Supplier</th>
                            <th>Price</th>
                            <th>Action</th>
                           
                            
						</tr>
					</thead>
					<tbody>
                    <?php foreach($resultset2 as $row){ ?>
						<tr id="prod<?php echo $row['PROD_ID']; ?>" >
							<td><?php echo $row['PROD_NAME']; ?></td>
                            <td><?php 
							 $resultset2= $service->get_Product_type($row['PROD_TYPE']);
							echo $resultset2['CATOGERY_NAME']; ?></td>
							
							<td><?php 
							 $resultset3= $service->get_sub_Product_type($row['SUB_PROD_TYPE']);
							echo $resultset3['SUB_CATOGERY_NAME']; 
							    ?></td>
							<td><?php echo $row['PROD_QUANTITY']; ?></td>
                            <td><a href="Supplier/editSupplier.php?id=<?php echo $row["SUP_ID"];?>"><?php 
							$resultset3= $service->getSupplierDet($row['SUP_ID']);
							echo $resultset3['SUP_COM_NAME']; ?></a></td>
                            <td class="align-center"><?php echo $row['SELL_PRICE']; ?>.00</td>
                            <td>
           <a href="invoice.php?id=<?php echo $row['PROD_ID']; ?>&type=<?php echo $row['ITEM_TYPE']; ?>&supid=<?php echo $row["SUP_ID"];?>" >Send Invoice</a>
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
	
	</div>
    <div id="footer">
		
		<?php 
    include("includes/footer.php");
    ?>
    </div>
</body>


</html>