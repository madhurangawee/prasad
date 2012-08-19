<?php 
include_once("_config/config.php");
require_once('_class/mysql.php');
require_once('_class/Class.Service.php');
require_once('_class/paginator.class.php');

$item_ID = $_GET['id'];
$item_type = $_GET['type'];
$sup_id = $_GET['supid'];


$service = new SERVICE;
if($item_type == 1)
{
	$result = $service->getBooksDet($item_ID);
}
else{
	
     $result = $service->getProdDet($item_ID);
     }
	 
$supDet = $service->getSupplierDet($sup_id);
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
<script type="text/javascript" src="js/functions/invoice.js"></script>
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
    	</div> 
	
	<div id="content" class="xfluid">
		
		<div class="portlet x9">
			<div class="portlet-header">
			  <h4>INVOICE</h4></div>
			
			<div class="portlet-content">
				
						<form  method="post" class="form label-inline" id="addCustomer" >
                    <h4><strong>Supplier Name : <?php echo $supDet['SUP_COM_NAME'];  ?></strong></h4>
                    <div class="field">
                    <strong>Item Name : <?php echo $result['BOOK_NAME'];  ?><?php echo $result['PROD_NAME'];  ?></strong>
                    </div>
							<div class="field">
							  <label for="address1">Quantity</label> <input id="QUANTITY" size="10" type="text" class="small" value="0" onblur="getTotal();" /></div>
							<div class="field">
							  <label for="address2">Unit Price</label> <input id="PRICE" size="10" type="text" class="large" onblur="getTotal();" value="<?php echo $result['PURCHASE_PRICE'];  ?>" /></div>
                            <div class="field">
							  <label for="address2">Total Price</label> <input id="TOT_PRICE" size="10" type="text" class="large" readonly="readonly"  /></div>

							<div class="field"><label for="description">Note</label> <textarea rows="7" cols="50" name="CUS_DES" id="MESSAGE_ADMIN"></textarea>
                             <div id="msg" ></div>
                            </div>
							
							<br />
                           
							<div class="buttonrow">
                                <input type="button" class="btn" value="Send Invoice" onclick="return sendInvoice(<?php echo $item_ID;  ?>,<?php echo $item_type;  ?>,<?php echo $sup_id;  ?>);" />
                                <input type="reset" class="btn" value="Reset"  />
                                 <input type="reset" class="btn" value="Back" onclick="history.go(-1);"  />
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