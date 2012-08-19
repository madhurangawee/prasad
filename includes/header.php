		<div class="wrapper">
			<div class="logo">
				<!-- ========== LOGO ========== -->
					<a href="index.php?mode=main"><img src="images/logo2.jpg" alt="" width="300" height="49" /></a>
				<!-- ========================== -->
			</div>
			<div class="right-head">
				<div class="lang">
					<!-- ========== LANGUAGES ========== -->
						Languages:
				
						<a href=""><img src="images/icon.gif" alt="English" title=" English " width="24" height="16"  style="vertical-align:middle;" /></a>					<!-- =============================== -->
				</div>

				<div class="menu">
					<!-- ========== MENU ========== -->
														<div id="navEZPagesTop">
	<ul>
  			
	
	  <li <?php if($_GET['mode'] == "main" ) echo "class='li_un selected'" ?> ><a href="index.php?mode=main"><span><span>Home</span></span></a></li>
	  
  
  			
	
	  <li <?php if($_GET['mode'] == "new_prod" ) echo "class='li_un selected'" ?> ><a href="new_product.php?mode=new_prod"><span><span>New products</span></span></a></li>
	  
  
  			
	
	  <li class=""><a href=""><span><span>Special</span></span></a></li>
	  
  
  			
	
	  <li <?php if($_GET['mode'] == "all_prod" ) echo "class='li_un selected'" ?> ><a href="all_products.php?mode=all_prod"><span><span>Products all </span></span></a></li>
	  
  
  			
	
	  <li <?php if($_GET['mode'] == "abt_us" ) echo "class='li_un selected'" ?>><a href="about_us.php?mode=abt_us"><span><span>About Us</span></span></a></li>
	  
  
  			
	
	  <li <?php if($_GET['mode'] == "con_us" ) echo "class='li_un selected'" ?> ><a href="contact_us.php?mode=con_us"><span><span>Contacts</span></span></a></li>
	  
  

    </ul>
</div>
												<!-- ========================== -->
				</div>
                
			</div>
		</div>
		<div class="wrapper box2">
				<div class="search">
					<!-- ========== SEARCH ========== -->
                    <script type="text/javascript" >
function validate(){
	
	if(document.getElementById('keyword').value == "" ){  return false; }
	
}
	</script>
						<span class="ttl">Search</span>
						<form  action="search_result.php" method="post">							<div>
						<span class="corner"></span>
						<input type="text" name="keyword" id="keyword" class="input1" value=""  />						<input type="image" src="images/buttons/english/search.png" alt="Search" title=" Search " class="input2" onclick="return validate();"  /><a class="adv" href="advance_search.php">Advanced Search</a>
							</div>
						</form>
					<!-- ============================ -->
				</div>
				
				<div class="cart">
                <?php 
require_once('_class/Class.Service.php');


$service = new Service;
				if(isset($_SESSION['CUS_ID']))
			{
				$sessID = '0';
			}else{
				$sessID = $_SESSION['sessid'];
				 }
				$totalCart = $service->get_Total_Cart($sessID);
				$result123 = $service->viewCart($sessID);
				?>
					<!-- ========== SHOPPING CART ========== -->
						<a href="cart.php"><span class="st1">Shopping cart: <?php echo count($result123); ?> items</span></a><span class="one"> Now cart Total: <a href="cart.php"><span class="st2"> LKR <?php if($totalCart[0] > 0){ echo $totalCart[0] ?>.00<?php } else{ echo "0.00" ; } ?></span></a></span> 
					<!-- =================================== -->
				</div>
                
		</div>
		<div class="wrapper box3">
			<div class="navigation">
				<!-- ========== NAVIGATION LINKS ========== -->
						<a href="index.php">Home</a>
                        <a href="myProfile.php">My Profile</a>
                        <a href="wishList.php">My WishList</a>
                        
						
										<?php if(isset($_SESSION['CUS_ID'])){?>	<a href="clearSessions.php">Log Off</a> <?php  } else{?> <a href="register.php">Log In</a> <?php }  ?>
					  
					
									<!-- ====================================== -->
			</div>
            
			<?php if(! isset($_SESSION['CUS_ID'])){?><a  class="sing" href="register.php#register">Sign Up</a><?php } ?>
            <a  class="sing" href="myProfile.php">Welcome <?php if(! isset($_SESSION['CUS_ID'])){?>Guest<?php } ?><?php $CusDet = $service->getCustomerDet($_SESSION['CUS_ID']); echo $CusDet['F_NAME']; ?></a>
		</div>