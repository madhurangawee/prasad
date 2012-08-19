<?php 
session_start();
include_once("_config/config.php");
require_once('_class/mysql.php');
require_once('_class/Class.Service.php');
require_once('_class/paginator.class.php');

$service = new Service;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Prasad CMS </title>	
	<style type="text/css">
@import url("css/paginator.css");
</style>
	<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="no title" charset="utf-8" />	
	<link rel="stylesheet" href="css/plugin.css" type="text/css" media="screen" title="no title" charset="utf-8" />	
	<link rel="stylesheet" href="css/custom.css" type="text/css" media="screen" title="no title" charset="utf-8" />	
    <link href="css/jquery.alerts.css" rel="stylesheet"  type="text/css" media="screen" title="no title" charset="utf-8"  />
    
	
	<script  type="text/javascript" src="js/jquery/jquery.1.4.2.min.js"></script>
<script  type="text/javascript" src="js/slate/slate.js"></script>
<script  type="text/javascript" src="js/slate/slate.portlet.js"></script>
<script  type="text/javascript" src="js/plugin.js"></script>
<script type="text/javascript" src="js/jquery.alerts.js"></script>
<script type="text/javascript" src="js/functions/invoice.js"></script>


<script type="text/javascript" charset="utf-8">
$(function () 
{
	slate.init ();
	slate.portlet.init ();	
});
</script>

<script type="text/javascript" >


</script>
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
			<div class="portlet-header">
			  <h4>view Items</h4></div>
			
			<div class="portlet-content">
				
				<h2>Data Table</h2>
			<div style="float:right;"><?php

	  $resultset= $service->view_OutOfStock_Books();
	  $resultset2= $service->view_OutOfStock_Products();
	  	    $data = array_merge($resultset, $resultset2);
	?></div>  
				<table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">
					<thead>
						<tr>
							<th>Item Name</th>
							<th>Item type</th>
                            <th>Sub type / ICBS </th>
                            <th>Quantity </th>
                            <th>Price</th>
                            <th>Action</th>
                           
                            
						</tr>
					</thead>
					<tbody>
                    <?php foreach($data as $row){ ?>
						<tr  >
							<td><?php echo $row['BOOK_NAME'].$row['PROD_NAME']; ?></td>
							
							<td><?php 
							
							 $resultset2= $service->get_Book_type($row['BOOK_TYPE']);
							 $resultset3= $service->get_Product_type($row['PROD_TYPE']);
							echo $resultset2['CATOGERY_NAME'].$resultset3['CATOGERY_NAME']; 
							    ?></td>
                                <td><?php 
							 $resultset2= $service->get_sub_Product_type($row['SUB_PROD_TYPE']);
							echo $resultset2['SUB_CATOGERY_NAME'].$row['ICBS_NO']; 
							    ?></td>
                                <td><?php echo $row['QUANTITY'].$row['PROD_QUANTITY']; ?></td>
                            <td><?php echo $row['SELL_PRICE'].".00"; ?></td>
                            <td class="align-center" style="cursor:pointer;"><a onclick="return sendInvoice(<?php echo $row['ITEM_TYPE']?>,<?php echo $row['BOOK_ID'].$row['PROD_ID']; ?>,'<?php echo $row['BOOK_NAME'].$row['PROD_NAME']; ?>',<?php echo $row['SELL_PRICE']; ?>)"  ><strong>Send Invoice</strong></a> </td>
                            
						</tr>
						<?php } ?>
                    
                        </tbody>
                        </table>
                       
                        							
						

<br /><br />
<br /><br />
				<div id="test" class="portlet x8" align="right"  ></div>
			</div>
            
		</div>
		
		
		
		

		

		
	</div> <!-- #content -->
	
	<div id="footer">
		
		<?php 
    include("includes/footer.php");
    ?>
		
	</div> <!-- #footer -->
	
</div> <!-- #wrapper -->


	
</body>


</html>