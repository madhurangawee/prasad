<?php
session_start();
include_once("../../_config/config.php");
require_once('../../_class/mysql.php');
require_once('../../_class/Class.Add.php');
require_once('../../_class/Class.Edit.php');
require_once('../../_class/Class.Service.php');



        $mode = $_POST['mode'];
		$TEMP_BILL_ID = MySQL :: escape($_POST['id']);
        $ITEM_ID = MySQL :: escape($_POST['id']);
	    $ITEM_NAME = MySQL :: escape($_POST['Name']);
        $ITEM_TYPE = MySQL :: escape($_POST['type']);
		$ITEM_PRICE = MySQL :: escape($_POST['price']);
		$ITEM_QTY = MySQL :: escape($_POST['qty']);
		$TOTAL_EDIT = MySQL :: escape($_POST['total']);
        
		$service = new SERVICE;
	    $TOTAL = $ITEM_PRICE * $ITEM_QTY;

		if($mode=='add'){
		$ret = ADD :: addToBill($ITEM_ID, $ITEM_NAME, $ITEM_TYPE ,$ITEM_PRICE,$ITEM_QTY,$TOTAL);
		
		}
		if($mode=='edit'){
		$ret = EDIT :: editBill($TEMP_BILL_ID,$ITEM_QTY,$TOTAL_EDIT);
		
		}


		    
			//print_r($resultset);
			?>
            <div id="print" >
<table cellpadding="0" cellspacing="0" border="0" class="display" >
          <tr  >
          <td align="center" bgcolor="#dedede" style="padding:10px; border-right:1px #FFF solid;" > <strong>No</strong> </td>
            <td align="center" bgcolor="#dedede" style="padding:10px; border-right:1px #FFF solid;"  > <strong>Item Name</strong> </td>
             <td align="center" bgcolor="#dedede" style="padding:10px; border-right:1px #FFF solid;"  ><strong>Quantity</strong></td>
            <td align="center" bgcolor="#dedede" style="padding:10px; border-right:1px #FFF solid;"  ><strong>Total</strong></td>
            <td align="center" bgcolor="#dedede" style="padding:10px; border-right:1px #FFF solid;"  ><strong>Action</strong></td>
             </tr>
             <?php 
			$i = 1;
			 $resultset = $service->view_Bill_details();
			foreach($resultset as $row){
				?>
             <tr id="temp<?php echo $row['TEMP_BILL_ID']; ?>"  >
          <td align="center" > <?php   echo $i; ?> </td>
            <td align="center" > <?php echo $row['ITEM_NAME']; ?> </td>
             <td align="center" >
            <input id="QTY<?php echo $row['TEMP_BILL_ID']; ?>" type="text" value="<?php echo $row['QTY']; ?>"  onblur="CalculatetotalPrice(this.value,'<?php echo $row['TEMP_BILL_ID']; ?>','<?php echo $row['PRICE']; ?>');" /></td>
            <td align="center" >
            <input id="TOTAL<?php echo $row['TEMP_BILL_ID']; ?>" type="text" value="<?php echo $row['TOTAL'].".00"; ?>"   /></td>
            <td ><a onclick="deleteFunction('temp<?php echo $row['TEMP_BILL_ID']; ?>',<?php echo $row['TEMP_BILL_ID']; ?>,'Are you sure to delete Product..!')">
			<img src="../images/delete.png" width="16" height="16" alt="Delete Item" /></a></td>
              <?php
          
			++$i;
			?></tr><?php } ?>
            </table>
           
         <div id="SUM" align="right" style="padding-right:150px; font-size:18px; border:thick;" ><strong><font size="+2.5" >TOTAL   </font>                                
		 <?php 
		 
		 $resultset2 = $service->view_Bill_Total();
		 echo $resultset2[0].".00";
		 ?></strong></div>
         </div>
       <div id="SUM" align="right" style="padding-right:150px; padding-top:50px " ><input type="button" id="submit" value="Print The Bill" onclick="printContent('print');"  /></div>