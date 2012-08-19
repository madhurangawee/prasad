<?php
session_start();
include_once("../_config/config.php");
require_once('../_class/mysql.php');
require_once('../_class/Class.Add.php');
require_once('../_class/Class.Edit.php');
require_once('../_class/Class.Service.php');

       $service = new SERVICE;
	   $edit = new EDIT;
	   $add = new ADD;


		$resultset = $service ->view_Bill_details();
		
		
         foreach($resultset as $row)
		 {
			 if($row['ITEM_TYPE'] == 1)
			 {
				
				$resultset2 = $service ->getBooksDet($row['ITEM_ID']);
				
				$QTY = $resultset2['QUANTITY'] - $row['QTY'];

				 $update = $edit->updateBooks($row['ITEM_ID'],$QTY);
			 }else
			 {
			 $resultset2 = $service ->getProdDet($row['ITEM_ID']);
			 
			 $QTY = $resultset2['PROD_QUANTITY'] - $row['QTY'];
			
			 $update = $edit->updateProducts($row['ITEM_ID'],$row['QTY']);
	 
			 }
		 }
		 
		 $total = $service ->view_Bill_Total();
		 $add->addIncomeDetails($total[0]);
		
		 $resultset2 = $service ->view_Bill_details();
		
         foreach($resultset2 as $row2)
		 {
		 $getId = $service->getIncomeTableDetails();
		 $add->addBillDetails($getId[0],$row2['ITEM_ID'],$row2['ITEM_TYPE'],$row2['PRICE'],$row2['QTY'],$row2['TOTAL']);
		 }
		 $trnct = $service -> truncateTable();
		
		
		if($trnct =='true')
			echo $trnct;
		else
			echo "no";

		
		
?>