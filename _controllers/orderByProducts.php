<?php
session_start();
require_once('../_config/config.php'); 
require_once('../_class/mysql.php');
require_once('../_class/Class.Edit.php');
require_once('../_class/Class.Service.php');
require_once('../_class/Class.Mail.php');
require_once('../_class/2paginator.class.php');

           $mails = new MAIL();
           $edit = new EDIT();
		   $service = new SERVICE();



           $mode = MySQL :: escape($_POST['mode']);
		   
         $num_rows= $service->view_book_Count_All();
		 
		  $resultset= $service->view_All_Books($pages);
		 
		 
		 
		 
		  ?> <div class="centerColumn" id="newProductsDefault">

<h1 id='newProductsDefaultHeading'>All Products</h1>


<div id="sorter" class="tie2">
<div class="tie2-indent">
	<label for="disp-order-sorter">Sort by: </label>
    <select name="disp_order" onchange="changeOrderBy(this.value);" id="disp-order-sorter">
    <option value="1" >Product Name</option>
    <option value="2" >Product Name - desc</option>
    <option value="3" >Price - low to high</option>
    <option value="4" >Price - high to low</option>
    <option value="5" >Model</option>
    </select>
	</div>	
</div>

<br class="clearBoth" /><?php

            $pages = new Paginator;
            $pages->items_total = $num_rows;
            $pages->mid_range = 3; // Number of pages to display. Must be odd and > 3
            $pages->paginate();
 ?>

<div id="newProductsDefaultListingTopNumber" class="navSplitPagesResult back">Displaying  <strong>4</strong> (of <strong><?php  echo $num_rows; ?></strong> new products)</div>
<div style="float:right;"><?php

      echo $pages->display_pages();
      echo "<span class=\"\">".$pages->display_jump_menu();
	   
	  
	  	   
	?></div>  
<br class="clearBoth" />

<?php foreach($resultset as $row){ ?>
<div class="wrapper">

 <div class="tie tie-margin1">
 	<div class="tie-indent">
	<div class="wrapper">
          <div class="fleft" style="width:23%">
              <span class="image"><a href="products.php?id=<?php echo $row['BOOK_ID']; ?>"><img src="admin/images/bookcover/<?php echo $row['BOOK_COVER']; ?>" alt="The Naked Pint" title=" The Naked Pint " width="82" height="122" /> </a></span><br clear="all" /><br clear="all" /><span class="stock">In Stock: <?php echo $row['QUANTITY']; ?></span>            </div>
            <div class="fleft" style="width:76%">
              Date Added: <?php echo $row['ADDED_DATE']; ?><br clear="all" /><br clear="all" /><hr /><br /><a class="name" href=""><strong><?php echo $row['BOOK_NAME']; ?></strong></a><br clear="all" /><br clear="all" />
              <strong>ISBN number: </strong><br />
              <?php echo $row['ICBS_NO']; ?><br clear="all" /><br clear="all" /><span class="price-text">Price: &nbsp;</span> <span class="price"> LKR <?php echo $row['SELL_PRICE']; ?>.00</span><br clear="all" /><br clear="all" /><img src="images/buttons/english/button_buy_now.gif" alt="Buy Now" title=" Buy Now " width="72" height="25" onclick="addToCart(<?php echo $row['BOOK_ID']; ?>);" style="cursor:pointer" />&nbsp;<br /><br clear="all" />            </div>
	</div>
	  <div class="wrapper">
		  <br /><div class="description"><strong>Details:</strong><?php echo substr($row['DESCRIPTION'], 0,400); ?><a href="products.php?id=<?php echo $row['BOOK_ID']; ?>" target="_blank"> ... more info</a></div>		</div>
		
		</div>
	</div>
</div>
<?php } ?>
  <div id="newProductsDefaultListingBottomNumber" class="navSplitPagesResult back">Displaying <strong>1</strong> to <strong>4</strong> (of <strong>60</strong> new products)</div>
 <div style="float:right;"><?php
      echo $pages->display_pages();
      echo "<span class=\"\">".$pages->display_jump_menu();
 	   
	?></div>
<br class="clearBoth" />


</div>


?>