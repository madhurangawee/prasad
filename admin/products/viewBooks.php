<?php 
include_once("../_config/config.php");
require_once('../_class/mysql.php');
require_once('../_class/Class.Service.php');
require_once('../_class/paginator.class.php');
$service = new Service;

if($_GET['status']=='active'){
   $status='1';}
if($_GET['status']=='inactive'){
   $status='0';}
   
		    $num_rows= $service->view_book_Count($status);
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
@import url("../css/paginator.css");
</style>
	<link rel="stylesheet" href="../css/screen.css" type="text/css" media="screen" title="no title" charset="utf-8" />	
	<link rel="stylesheet" href="../css/plugin.css" type="text/css" media="screen" title="no title" charset="utf-8" />	
	<link rel="stylesheet" href="../css/custom.css" type="text/css" media="screen" title="no title" charset="utf-8" />		
    <link href="../css/jquery.alerts.css" rel="stylesheet"  type="text/css" media="screen" title="no title" charset="utf-8"  />	
    <link rel="stylesheet" type="text/css" href="../css/jquery.lightbox-0.5.css" media="screen" />
    
	
	<script  type="text/javascript" src="../js/jquery/jquery.1.4.2.min.js"></script>
<script  type="text/javascript" src="../js/slate/slate.js"></script>
<script  type="text/javascript" src="../js/slate/slate.portlet.js"></script>
<script  type="text/javascript" src="../js/plugin.js"></script>
<script type="text/javascript" src="../js/ajaxupload.3.5.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.8.13.custom.min.js"></script>
<script type="text/javascript" src="../js/jquery.lightbox-0.5.js"></script>
<script type="text/javascript" src="../js/jquery.alerts.js"></script>
<script type="text/javascript" src="../js/functions/addProducts.js"></script>


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
		
		
		var dataURL = "id=" + id +"&mode=books";
		
			$.ajax({
			   type: "POST",
			   url: "../_controllers/statuschange-controller.php",
			   data: dataURL,
			   success: function(msg){
			//alert(msg);
				if(msg==1){
					document.getElementById("status"+id).src = "../images/accept.png";
				}else if(msg==0){
					document.getElementById("status"+id).src = "../images/deny.png";
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
url: "../_controllers/deleteBook.php",
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
			<div class="portlet-header"><h4>view <?php echo $_GET['status'].' '; ?>Books</h4></div>
			
			<div class="portlet-content">
				
				<h2>Data Table</h2>
			<div style="float:right;"><?php
      echo $pages->display_pages();
      echo "<span class=\"\">".$pages->display_jump_menu();
	   $service = new Service;
	   $resultset= $service->view_Books($status,$pages);
	  	   
	?></div>  
				<table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">
					<thead>
						<tr>
							<th>Book Name</th>
							<th>ICBS number</th>
							<th>Book type</th>
                            <th>Author</th>
                            <th>Publisher</th>
                            <th>Book Cover</th>
                            <th>Status</th>
                            <th>Action</th>
                           
                            
						</tr>
					</thead>
					<tbody>
                    <?php foreach($resultset as $row){ ?>
						<tr id="book<?php echo $row['BOOK_ID']; ?>" >
							<td><?php echo $row['BOOK_NAME']; ?></td>
							<td><?php echo $row['ICBS_NO']; ?></td>
							<td><?php 
							 $resultset2= $service->get_Book_type($row['BOOK_TYPE']);
							echo $resultset2['CATOGERY_NAME']; 
							    ?></td>
							<td><?php echo $row['BOOK_AUTHOR']; ?></td>
                            <td><?php 
							 $resultset3= $service->getPublishers($row['BOOK_PUBLISHER']);
							echo $resultset3['PUB_NAME']; 
							    ?></td>
                            <td><a href="../images/bookcover/<?php echo $row['BOOK_COVER']; ?>" rel="lightbox" class="lightbox"><img  src="../images/bookcover/<?php echo $row['BOOK_COVER']; ?>" title="click here to zoom"  width="50" height="50" /></a></td>
                            <td class="align-center"><a href="javascript:changePermission(<?php echo $row['BOOK_ID'];?>)" >
 <img id="status<?php echo $row["BOOK_ID"];?>" src="../images/<?php if($row["STATUS"]==1){ echo "accept.png"; } else { echo "deny.png"; } ; ?>" border="0" alt="" title="Change Permission" width="16" height="16" />
 
 </a>     </td>
                            <td>
                      
           <a href="editBooks.php?id=<?php echo $row['BOOK_ID']; ?>" >
			<img src="../images/edit.png" width="16" height="16" alt="Edit Item" /></a>
            <a onclick="deleteFunction('book<?php echo $row['BOOK_ID']; ?>','deletebook',<?php echo $row['BOOK_ID']; ?>,'Are you sure to delete Book..!')">
			<img src="../images/delete.png" width="16" height="16" alt="Delete Item" /></a>
           
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
		
		<?php 
    include("../includes/footer.php");
    ?>
		
	</div> <!-- #footer -->
	
</div> <!-- #wrapper -->


	
</body>


</html>