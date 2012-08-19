<?php 
include_once("../_config/config.php");
//include_once("../_config/check-session.php");
require_once('../_class/mysql.php');
require_once('../_class/Class.Service.php');
require_once('../_class/paginator.class.php');


$order_id = $_GET['id'];
$CUS_ID = $_GET['cus_id'];
//$id = '2';
$service = new Service;

$resultset= $service->getCartData($order_id,$CUS_ID);
$resultset2= $service->getOrderDetails($order_id);

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
	<link rel="stylesheet" href="../css/screen.css" type="text/css" media="screen" title="no title" charset="utf-8" />	
	<link rel="stylesheet" href="../css/plugin.css" type="text/css" media="screen" title="no title" charset="utf-8" />	
	<link rel="stylesheet" href="../css/custom.css" type="text/css" media="screen" title="no title" charset="utf-8" />		
    <link rel="stylesheet" type="text/css" href="../css/jquery.lightbox-0.5.css" media="screen" />
    
	
	<script  type="text/javascript" src="../js/jquery/jquery.1.4.2.min.js"></script>
<script  type="text/javascript" src="../js/slate/slate.js"></script>
<script  type="text/javascript" src="../js/slate/slate.portlet.js"></script>
<script  type="text/javascript" src="../js/plugin.js"></script>
<script type="text/javascript" src="../js/ajaxupload.3.5.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.8.13.custom.min.js"></script>
<script type="text/javascript" src="../js/jquery.lightbox-0.5.js"></script>
<script type="text/javascript" src="../js/jquery.alerts.js"></script>



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
function addNote(id){
		
		var ADMIN_MSG = document.getElementById('ADMIN_MSG').value;
		
		var dataURL = "id=" + id +"&ADMIN_MSG="+ADMIN_MSG;
		
			$.ajax({
			   type: "POST",
			   url: "../_controllers/addNote.php",
			   data: dataURL,
			   success: function(msg)
			   {
			         alert(msg);
					 $('#msg').html('<p class="success" >Succesully Added.</p>');

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
url: "../_controllers/deleteCartItems.php",
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
		
		<div class="portlet x12">
			<div class="portlet-header"><h4>view Cart</h4></div>
			
			<div class="portlet-content">
				
				<h2><strong>Order <?php echo $order_id; ?></strong></h2>
                <hr />
			 
                
                <br/>
				<table cellpadding="0" cellspacing="0" border="0" >
					<thead>
						<tr>
							<th>Book Name</th>
							<th>Quantity</th>
							<th>Price(LKR)</th>
                            <th>Book Cover</th>
                            <!--<th>Action</th>-->
                           
                            
						</tr>
					</thead>
					<tbody>
                    <?php foreach($resultset as $row){ ?>
						<tr id="cart<?php echo $row['ID']; ?>" >
							<td><?php echo $row['BOOK_NAME']; ?></td>
							<td><?php echo $row['QUANTITY']; ?></td>
							<td><?php echo $row['PRICE'].".00"; ?></td>
                            <td><a href="../images/bookcover/<?php echo $row['IMAGE']; ?>" rel="lightbox" class="lightbox"><img  src="../images/bookcover/<?php echo $row['IMAGE']; ?>" title="click here to zoom"  width="40" height="50" /></a></td>
                           
						</tr>
						<?php } ?>
                    
                  </tbody>
              </table>
                       
                        							
						

<br /><br />
<br /><br />
			<div >
<div class="portlet x4">
			<div class="portlet-header"><h4>Delivery Address</h4></div>
			
			<div class="portlet-content">
			<?php echo $resultset2['SHIP_STREET']; ?><br/>
             <?php echo $resultset2['SHIP_CITY']; ?><br/>
             <?php echo $resultset2['SHIP_PROVINCE']; ?><br/>
             <?php echo $resultset2['SHIP_POSTCODE']; ?><br/>
			</div>
		</div>
                       
                   <div class="portlet x4" >
			<div class="portlet-header"><h4>User Comment</h4></div>
			
			<div class="portlet-content">
			<p><?php echo $resultset2['DESCRIPTION']; ?>.</p>
			</div>
		</div>  <div class="portlet x4" >
			<div class="portlet-header"><h4>Admin Note</h4></div>
			
			<div class="portlet-content">
			<p><textarea rows="5"  cols="40" name="ADMIN_MSG" id="ADMIN_MSG" ><?php echo $resultset2['ADMIN_MSG']; ?></textarea></p>
			</div>
		</div>  

                
              <div class="buttonrow" align="right">
                                <input type="button" class="btn" value="Add Note" onclick="return addNote(<?php echo $order_id; ?>);" />
                                <input type="button" class="btn" value="Back" onclick="window.location.href='viewOrders.php'" />
                                
				<div id="msg" ></div></div></div>
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