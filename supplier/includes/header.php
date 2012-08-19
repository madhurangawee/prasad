
		<div id="header">
			<h1><a href="<?php echo HTTP_PATH; ?>index2.html"></a></h1>
			
			<div id="info">
				<h4>Welcome <?php echo $_SESSION['ADMIN_NAME']; ?></h4>
				
				<p>
					Logged in as <?php echo $_SESSION['ADMIN_TYPE']; ?>
					<br />
					You have <a href="javascript:;">5 messages</a>
				</p>
				
				<img src="<?php echo HTTP_PATH; ?>images/avatar.jpg" alt="avatar" />
			</div> <!-- #info -->
					
		</div> <!-- #header -->	
		
		
		<div id="nav">	
	
			<ul class="mega-container mega-grey">
	
				<li class="mega mega-current">
					<a href="<?php echo HTTP_PATH; ?>home.php" class="mega-link">Dashboard</a>	
				</li>
		
				<li class="mega">				
		<a href="javascript:;" class="mega-tab">
						Customer</a>
					
					<div class="mega-content mega-menu ">
						<ul>
							<li><a href="<?php echo HTTP_PATH; ?>addCustomer.php">Add Customer</a></li>
							<li><a href="javascript:;" class="hasSub">View Customer</a>
                             <ul>
									<li><a href="<?php echo HTTP_PATH; ?>viewCustomer.php?status=active">View Active Customer</a></li>
                                    <li><a href="<?php echo HTTP_PATH; ?>viewCustomer.php?status=inactive">View Inactive Customer</a></li>
									<li><a href="<?php echo HTTP_PATH; ?>viewCustomer.php">View All Customer</a></li>
								</ul>
                            </li>			
							<li><a href="sample_faq.html">FAQ</a></li>	
						</ul>
					</div>						
				</li>
		
				<li class="mega">				
					<a href="javascript:;" class="mega-tab hasSub">Supplier</a>	
					
					<div class="mega-content mega-menu ">						
								
						<ul>
							<li><a href="<?php echo HTTP_PATH; ?>addSupplier.php">Add Supplier</a></li>	
							<li>
								<a href="javascript:;" class="hasSub">View Supplier</a>
								
								<ul>
									<li><a href="<?php echo HTTP_PATH; ?>supplier/viewSupplier.php?status=active">View Active Supplier</a></li>
                                    <li><a href="<?php echo HTTP_PATH; ?>supplier/viewSupplier.php?status=inactive">View Inactive Supplier</a></li>
									<li><a href="<?php echo HTTP_PATH; ?>supplier/viewSupplier.php">View All Supplier</a></li>
								</ul>
							</li>		
												
						</ul>
					</div>				
				</li>						
				
                <li class="mega">				
					<a href="javascript:;" class="mega-tab hasSub">Products</a>
                    
                    <div class="mega-content mega-menu ">						
								
						<ul>
                            <li>
								<a href="javascript:;" class="hasSub">Add Products</a>
								
								<ul>
									<li><a href="<?php echo HTTP_PATH; ?>products/addBooks.php">Add Books</a></li>
									<li><a href="<?php echo HTTP_PATH; ?>products/addStationery.php">Add products</a></li>
								</ul>
							</li>	
							<li>
								<a href="javascript:;" class="hasSub">View Products</a>
								
								<ul>
									<li>
								<a href="javascript:;" class="hasSub">View Books</a>
								
								<ul>
									<li><a href="<?php echo HTTP_PATH; ?>products/viewBooks.php">View All Books</a></li>
									<li><a href="<?php echo HTTP_PATH; ?>products/viewBooks.php?status=active">View Active Books</a></li>
                                    <li><a href="<?php echo HTTP_PATH; ?>products/viewBooks.php?status=inactive">View Inactive Books</a></li>
								</ul>
							</li>
									<li>
                                    <a href="javascript:;" class="hasSub">View products</a>
                                   <ul>
									<li><a href="<?php echo HTTP_PATH; ?>products/viewProducts.php">View All products</a></li>
									<li><a href="<?php echo HTTP_PATH; ?>products/viewProducts.php?status=active">View Active products</a></li>
                                    <li><a href="<?php echo HTTP_PATH; ?>products/viewProducts.php?status=inactive">View Inactive products</a></li>
								   </ul>
                                    
                                    </li>
								</ul>
							</li>	
												
						</ul>
					</div>					
				</li>
                <li class="mega">				
					<a href="<?php echo HTTP_PATH; ?>reports/reportshome.php" class="mega-link">Reports</a>			
				</li>
                 <li class="mega">				
					<a href="<?php echo HTTP_PATH; ?>orders/viewOrders.php" class="mega-link">Orders</a>			
				</li>	
                
				<li class="mega">
					<a href="javascript:;" class="mega-tab hasSub">Settings</a>
					<div class="mega-content mega-menu ">
		
						<ul>
							<li><a href="<?php echo HTTP_PATH; ?>settings/addBooktypes.php">Add/View Book Types</a></li>
							<li>
								<a href="javascript:;" class="hasSub">Add/View Prodcut Type</a>
								
								<ul>
									<li><a href="<?php echo HTTP_PATH; ?>settings/addProdTypes.php">Add/View Prodcut main Type</a></li>
									<li><a href="<?php echo HTTP_PATH; ?>settings/addSubProdTypes.php">Add/View Sub Product Type</a></li>
								</ul>
							</li>
						<li><a href="javascript:;" class="hasSub">Administrators</a>
                        <ul>
									<li><a href="<?php echo HTTP_PATH; ?>settings/addAdministrators.php">Add Administrators</a></li>
									<li><a href="<?php echo HTTP_PATH; ?>settings/viewAdmins.php">View Administrators</a></li>
								</ul>
                        </li>
                        
						</ul>
					</div>						
				</li>
			</ul>
		</div> <!-- #nav -->
