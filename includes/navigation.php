				<div style="width:200px;">
					                     <!--// bof: categories //-->
        <div class="box" id="categories" style="width:200px;">


										
											<div class="box-head" >
												Categories											</div>
			
											<ul class="menu" style="width:200px;">
		<li class="expand" style="width:200px;">
			<a href="#">Book Categories </a>
			<ul class="acitem" style="width:200px;">
            <?php foreach($bookCat as $row){?>
                             
                             <li><a class="category-top_un" href="viewproductTypes.php?id=<?php echo $row['CATOGERY_ID'];?>"><?php echo $row['CATOGERY_NAME'];?></a></li>
                                  <?php } ?>
				
				
			</ul>
		</li>

		<li style="width:200px;">
			<a href="#">Stationery</a>
			<ul class="acitem" style="width:200px;">
				<li><a href="http://search.yahoo.com/">Books</a></li>
				<li><a href="http://www.google.com/">NoteBooks</a></li>
				<li><a href="http://www.ask.com/">Albums</a></li>
				<li><a href="">Pens</a></li>
                <li><a href="">Pensil</a></li>
			</ul>
		</li>
	</ul>	 
			

            
        </div>
<!--// eof: categories //-->
<!--// bof: bestsellers //-->
        <div class="box" id="bestsellers" style="width:200px;">


										
											<div class="box-head">
												Like US										</div>
			
											<div class="box-body">
												<div id="bestsellersContent" class="sideBoxContent">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-like-box" data-href="http://www.facebook.com/pages/Prasad-Book-Shop/159364087484626" data-width="200" data-show-faces="true" data-stream="false" data-header="true"></div>
</div>											</div> 
			

            
        </div>
<!--// eof: bestsellers //-->
                </div>