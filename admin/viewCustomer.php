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
   
		    $num_rows= $service->view_Client_Count($status);
            $pages = new Paginator;
            $pages->items_total = $num_rows;
            $pages->mid_range = 3; // Number of pages to display. Must be odd and > 3
            $pages->paginate();
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
<script type="text/javascript" src="js/functions/register.js"></script>


<script type="text/javascript" charset="utf-8">
$(function () 
{
	slate.init ();
	slate.portlet.init ();	
});
</script>
<script type="text/javascript">
function changePermission(id){
		
		
		var dataURL = "id=" + id +"&mode=Cus";
		
			$.ajax({
			   type: "POST",
			   url: "_controllers/statuschange-controller.php",
			   data: dataURL,
			   success: function(msg){
			//alert(msg);
				if(msg==1){
					document.getElementById("status"+id).src = "images/accept.png";
				}else if(msg==0){
					document.getElementById("status"+id).src = "images/deny.png";
				}
				
			   }
			 });
		
	
		//document.getElementById("status"+id).src = "images/accept.png";
	
	}
	
</script>
<script type="text/javascript" >

function deleteFunction(trid,action,id,msg){

//alert(id);
jConfirm(msg,'Please Confirm', function(result){
if (result) {
$.ajax({
type: "POST",
url: "_controllers/deleteCustomer.php",
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
    include("includes/header.php");
    ?>
    	</div> <!-- #top -->
	
	<div id="content" class="xfluid">
		
		<div class="portlet x12">
			<div class="portlet-header"><h4>view <?php echo $_GET['status'].' '; ?>Customer</h4></div>
			
			<div class="portlet-content">
				
				<h2>Data Table</h2>
			<div style="float:right;"><?php
      echo $pages->display_pages();
      echo "<span class=\"\">".$pages->display_jump_menu();
	   $service = new Service;
	   $resultset= $service->view_Customer($status,$pages);
	   
	?></div>  
				<table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">
					<thead>
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Address</th>
							<th>Country</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Status</th>
                            <th>Action</th>
                           
                            
						</tr>
					</thead>
					<tbody>
                    <?php foreach($resultset as $row){ ?>
						<tr id="customer<?php echo $row['CUS_ID']; ?>" >
							<td><?php echo $row['F_NAME']; ?></td>
							<td><?php echo $row['L_NAME']; ?></td>
							<td><?php echo $row['CUS_STREET'].' '.$row['CUS_CITY'].'<br/> '.$row['CUS_PROVINCE'].'  '.$row['CUS_POSTCODE']; ?></td>
							<td><?php echo $row['CUS_COUNTRY']; ?></td>
                            <td><?php echo $row['CUS_MAIL']; ?></td>
                            <td><?php echo $row['CUS_MOBILE']; ?></td>
                            <td class="align-center"><a href="javascript:changePermission(<?php echo $row['CUS_ID'];?>)" >
 <img id="status<?php echo $row["CUS_ID"];?>" src="images/<?php if($row["STATUS"]==1){ echo "accept.png"; } else { echo "deny.png"; } ; ?>" border="0" alt="" title="Change Permission" width="16" height="16" />
 
 </a>     </td>
                            <td>
                      
           <a href="editCustomer.php?id=<?php echo $row['CUS_ID']; ?>" >
			<img src="images/edit.png" width="16" height="16" alt="Edit Item" /></a>
            <a onclick="deleteFunction('customer<?php echo $row['CUS_ID']; ?>','deletecustomer',<?php echo $row['CUS_ID']; ?>,'Are you sure to delete Customer..!')">
			<img src="images/delete.png" width="16" height="16" alt="Delete Item" /></a>
           
           </td>
						</tr>
						<?php } ?>
                    
                        </tbody>
                        </table>
                       
                        							
						

<br /><br />
<br /><br />
				
			</div>
		</div>
		
		
		
		

		

		
	</div> <!-- #content -->
	
	<div id="footer">
		
		<p>Copyright &copy; 2011 <a href="javascript:;">PoweredMadhuranga</a>, all rights reserved.</p>
		
	</div> <!-- #footer -->
	
</div> <!-- #wrapper -->


	
</body>


</html>