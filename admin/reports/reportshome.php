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
	<title>Reports | Slate Admin</title>	
		
	<link rel="stylesheet" href="../css/screen.css" type="text/css" media="screen" title="no title" charset="utf-8" />	
	<link rel="stylesheet" href="../css/plugin.css" type="text/css" media="screen" title="no title" charset="utf-8" />	
	<link rel="stylesheet" href="../css/custom.css" type="text/css" media="screen" title="no title" charset="utf-8" />	
		
        <script  type="text/javascript" src="../js/jquery/jquery.1.4.2.min.js"></script>
<script  type="text/javascript" src="../js/slate/slate.js"></script>
<script  type="text/javascript" src="../js/slate/slate.portlet.js"></script>
<script  type="text/javascript" src="../js/plugin.js"></script>


<script type="text/javascript" charset="utf-8">
$(function () 
{
	slate.init ();
	slate.portlet.init ();	
});
</script>
</head>

<body>
	
<div id="wrapper">
	
<div id="top">
    <?php 
    include("../includes/header.php");
    ?>
    	</div> 	
	<div id="content" class="xfluid">

		<div class="portlet x12">
				
				<div class="portlet-content">
					<div id="big_stats" class="clearfix">
					<div class="stat">
						
						<h4>Visited users  Today</h4>
					  <span class="value">12</span></div>
					
					<div class="stat">
						
						<h4>Pending Sales Today</h4>
						<span class="value">23</span>
						<span class="view_all"><a href="javascript:;">View pending Sales</a></span>
						
					</div>
					
					<div class="stat">

						
						<h4>Items sales Today</h4>
						<span class="value">2</span>
						<span class="view_all"></span>
						
					</div>
				</div>
			</div> <!-- .portlet-content -->
			</div> <!-- .portlet -->
		
		<div class="portlet x6">
			
			<div class="portlet-header">
				<h4>Daily Site Visiting</h4>
				
				<ul class="portlet-tab-nav">
					<li class="portlet-tab-nav-active"><a href="#tab1" class="tooltip" title="Week To Date.">WTD</a></li>	
				</ul>
			</div> <!-- .portlet-header -->

			
			
			<div class="portlet-content">				
				<div id="tab1" class="portlet-tab-content portlet-tab-content-active">
					<table class="stats" title="line" width="100%" cellpadding="0" cellspacing="0">
						<caption>weekly Visited users (Million)</caption>
						<thead>
							<tr>
								<td class="no_input">&nbsp;</td>
								<th>Banking</th>
								<th>Beauty</th>
								<th>Insurance</th>
								<th>Internet</th>
								<th>Media</th>
							</tr>

						</thead>
						
						<tbody>
							
							<tr>
								<th>2010</th>
								<td>12</td>
								<td>15</td>
								<td>20</td>
								<td>11</td>
								<td>13</td>
							</tr>	
						</tbody>
					</table>

				</div> <!-- .portlet-tab-content -->
				
			</div> <!-- .portlet-content -->			
		</div> <!-- .portlet -->
		
		
		
		
		<div class="portlet x6">
			
			<div class="portlet-header">
				<h4>Sales Report</h4>
				
				<ul class="portlet-tab-nav">
					<li class="portlet-tab-nav-active"><a href="#tab4" class="tooltip" title="Week To Date.">WTD</a></li>
				</ul>
			</div> <!-- .portlet-header -->
			
			<div class="portlet-content">				
				<div id="tab4" class="portlet-tab-content portlet-tab-content-active">
					<table class="stats" title="bar" width="100%" cellpadding="0" cellspacing="0">
						<caption>2009/2010 Sales by industry (Million)</caption>
						<thead>
							<tr>
								<td class="no_input">&nbsp;</td>
								<th>Banking</th>
								<th>Beauty</th>

								<th>Insurance</th>
								<th>Internet</th>
								<th>Media</th>
							</tr>

						</thead>
						
						<tbody>
							<tr>
								<th>2009</th>
								<td>12</td>
								<td>15</td>
								<td>13</td>
								<td>11</td>
								<td>13</td>
							</tr>
							
							<tr>
								<th>2010</th>
								
								<td>5</td>
								<td>6</td>
								<td>4</td>
								<td>7</td>
								<td>9</td>
							</tr>	
						</tbody>
					</table>

				</div> <!-- .portlet-tab-content -->
				
			</div> <!-- .portlet-content -->			
		</div> <!-- .portlet -->
		
		<div class="xbreak"></div> <!-- .xbreak -->

		
		<div class="portlet x3">
			<div class="portlet-header"><h4>Inventory PDF Reports</h4></div>
			
			<div class="portlet-content">
				<table class="reports_table">
					
					<tr>
						<td class="description"><a href="allItemsOftheSystem.php" target="_blank">All Items In the System</a></td>
						
					</tr>
					<tr>
						<td class="description"><a href="currentItemsOftheSystem.php" target="_blank">Currently Avaiable Items</a></td>
						
					</tr>
					<tr>
						<td class="description"><a href="outOfStockItemsOftheSystem.php" target="_blank">Out of Stock Items</a></td>
						
					</tr>
					<tr>
						<td class="description"><a href="http://codecanyon.net/">Monthly Sales Details</a></td>
						
					</tr>
					<tr>
						<td class="description"><a href="http://madebyamp.com/">Annual Sales details</a></td>
						
					</tr>
                    <tr>
						<td class="description"><a href="http://madebyamp.com/">Customize Sales details</a></td>
						
					</tr>
					
				</table>
			</div>
		</div>
		
		
		<div class="portlet x3">
			<div class="portlet-header"><h4>Customer PDF Reports</h4></div>
			
			<div class="portlet-content">
				<table class="reports_table">
					
					<tr>
						<td class="description"><a href="dailyCustomers.php" target="_blank">Daily Customer details</a></td>
						
					</tr>
					<tr>
						<td class="description"><a href="javascript:;">Daily Customer details</a></td>
						
					</tr>
					<tr>
						<td class="description"><a href="javascript:;">Daily Customer details</a></td>
						
					</tr>
                    <tr>
						<td class="description"><a href="javascript:;">Customize Customer details</a></td>
						
					</tr>
					
					
				</table>
			</div>
		</div>
		<div class="portlet x3">
			<div class="portlet-header"><h4>Orders PDF Reports</h4></div>
			
			<div class="portlet-content">
				<table  class="reports_table">
					
					<tr>
							<td class="description"><a href="javascript:;">Daily Order Details</a></td>
					</tr>
					<tr>
							<td class="description"><a href="javascript:;">Weekly Order details</a></td>
					</tr>
					<tr>
							<td class="description"><a href="javascript:;">Monthly Order details</a></td>
					</tr>
					<tr>
							<td class="description"><a href="javascript:;">Annual Order details</a></td>
					</tr>
                    <tr>
							<td class="description"><a href="javascript:;">Customize Order details</a></td>
					</tr>
					
					
				</table>
			</div>
		</div>
	
		
		<div class="portlet x3">
			<div class="portlet-header"><h4>Income PDF Reports</h4></div>
			
			<div class="portlet-content">
				<table  class="reports_table">
					
					<tr>
							<td class="description"><a href="javascript:;">Daily Income Details</a></td>
					</tr>
					<tr>
							<td class="description"><a href="javascript:;">Weekly Income details</a></td>
					</tr>
					<tr>
							<td class="description"><a href="javascript:;">Monthly Income details</a></td>
					</tr>
					<tr>
							<td class="description"><a href="javascript:;">Annual Income details</a></td>
					</tr>
                    <tr>
							<td class="description"><a href="javascript:;">Customize Income details</a></td>
					</tr>
					
					
				</table>
			</div>
		</div>
	


	</div> <!-- #content -->
	
	<div id="footer">
		
		<p>Copyright &copy; 2010 <a href="javascript:;">MadeByAmp</a>, all rights reserved.</p>
		
	</div> <!-- #footer -->
	
</div> <!-- #wrapper -->


	
</body>

</html>