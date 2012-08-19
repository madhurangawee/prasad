<!--// eof: currencies //-->

<!--// bof: manufacturers //-->
      <div class="box" id="manufacturers" style="width:200px;">

            <div class="box-bottom">
				<div class="box-top">
					<div class="box-right">
						<div class="box-left">
							<div class="box-bottom-right">
								<div class="box-bottom-left">
									<div class="box-top-right">
										<div class="box-top-left">
										
											<div class="box-head">
    <script type="text/javascript">
		function getPublisherVice(id)
         {
	
	     /// alert(id);
	      window.location = "products_by_pub.php?id="+id;	

         }
                                            </script>
												<label><strong>Select Publisher</strong></label>											</div>
			<?php 
			/*include_once("_config/config.php");
            require_once('_class/mysql.php');
            require_once('_class/Class.Service.php');*/
			$result = new Service;
			$pubCat = $result->view_Publishers();
			
			?>
											<div class="box-body">
												<div id="manufacturersContent" class="sideBoxContent centeredContent">
  <select name="publisher_id" onchange="getPublisherVice(this.value);"  style="width: 90%; margin: auto;">
  <option value="" selected="selected">Please Select</option>
  <?php foreach($pubCat as $row){?>
                             <option value="<?php echo $row['PUB_ID'];?>"><?php echo $row['PUB_NAME'];?></option>
                                  <?php } ?>
</select>
</div>											</div> 
			
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
            
        </div>
<!--// eof: manufacturers //-->

<!--// bof: specials //-->
        <div class="box" id="specials" style="width:200px;">

            <div class="box-bottom">
				<div class="box-top">
					<div class="box-right">
						<div class="box-left">
							<div class="box-bottom-right">
								<div class="box-bottom-left">
									<div class="box-top-right">
										<div class="box-top-left">
										
											<div class="box-head">
												<a href="indexc0a3.html?main_page=specials">Specials</a>											</div>
			
											<div class="box-body">
												<div class="sideBoxContent centeredContent"><div class="img"><a href="index8c83.html?main_page=product_info&amp;cPath=3&amp;products_id=12"><img src="images/12.jpg" alt="Grimms Complete Fairy Tales" title=" Grimms Complete Fairy Tales " width="82" height="122" /></a><br /></div><a class="name" href="index8c83.html?main_page=product_info&amp;cPath=3&amp;products_id=12">Grimms Complete Fairy Tales</a><div class="price"><span class="normalprice">$124.00 </span>&nbsp;<span class="productSpecialPrice">$105.40</span></div><a href="index72b1.html?main_page=products_new&amp;action=buy_now&amp;products_id=12"><img src="images/buttons/english/add_to_cart.gif" alt="Add to Cart" title=" Add to Cart " width="89" height="25" /></a></div>											</div> 
			
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
            
        </div>
<!--// eof: specials //-->

<!--// bof: ezpages //-->
        <div class="box" id="ezpages" style="width:200px;">

            <div class="box-bottom">
				<div class="box-top">
					<div class="box-right">
						<div class="box-left">
							<div class="box-bottom-right">
								<div class="box-bottom-left">
									<div class="box-top-right">
										<div class="box-top-left">
										
											<div class="box-head">
												Important Links											</div>
			
											<div class="box-body">
												<div id="ezpagesContent" class="sideBoxContent">
<ul style="margin: 0; padding: 0; list-style-type: none;">
<li><a href="index9f26.html?main_page=page&amp;id=4">My Link</a></li>
<li><a href="indexe45f.html?main_page=page&amp;id=5">Anything</a></li>
<li><a href="indexa675.html?main_page=site_map">Site Map</a></li>
<li><a href="indexe0b7.html?main_page=page&amp;id=6">Shared</a></li>
<li><a href="index42b5.html?main_page=index&amp;cPath=21">Gift Certificates</a></li>
<li><a href="http://www.google.com/" target="_blank">Google</a></li>
</ul>
</div>											</div> 
			
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
            
        </div>
<!--// eof: ezpages //-->

<!--// bof: bannerboxall //-->
        <div class="box" id="bannerboxall" style="width:200px;">

            <div class="box-bottom">
				<div class="box-top">
					<div class="box-right">
						<div class="box-left">
							<div class="box-bottom-right">
								<div class="box-bottom-left">
									<div class="box-top-right">
										<div class="box-top-left">
										
											<div class="box-head">
												Sponsors											</div>
			
											<div class="box-body">
												<div id="bannerboxallContent" class="sideBoxContent centeredContent"><a href="index72b1.html?main_page=redirect&amp;action=banner&amp;goto=1"><img src="images/banner6.jpg" alt="Center STAGE" title=" Center STAGE " width="182" height="102" /></a><a href="index72b1.html?main_page=redirect&amp;action=banner&amp;goto=2"><img src="images/banner7.jpg" alt="order online" title=" order online " width="182" height="98" /></a></div>											</div> 
			
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
            
        </div>
<!--// eof: bannerboxall //-->

<!--// bof: whosonline //-->
<!--        <div class="box" id="" style="width:200px;">

            <div class="box-bottom">
				<div class="box-top">
					<div class="box-right">
						<div class="box-left">
							<div class="box-bottom-right">
								<div class="box-bottom-left">
									<div class="box-top-right">
										<div class="box-top-left">
										
											<div class="box-head">
												Who's Online											</div>
			
											<div class="box-body">
												<div id="whosonlineContent" class="sideBoxContent centeredContent">Online&nbsp;3&nbsp;guests&nbsp;</div>											</div> 
			
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
            
        </div>-->
<!--// eof: whosonline //-->

                </div>