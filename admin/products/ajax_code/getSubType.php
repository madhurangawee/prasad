<?php
session_start();
include_once("../../_config/config.php");
require_once('../../_class/mysql.php');
require_once('../../_class/Class.Service.php');

$CATOGERY_ID = $_POST['id'];
$results = new Service;

$resultSet = $results->getSubTypes($CATOGERY_ID);
?>

<label for="type">Product Sub Type </label>	
 <select id="SUB_PROD_TYPE"  >
          <optgroup label="Sub Product type">
          <option>--Please Select--</option>
          <?php foreach($resultSet as $rowz){?>
      <option value="<?php echo $rowz['SUB_CATOGERY_ID'];?>"><?php echo $rowz['SUB_CATOGERY_NAME'];?></option>
    <?php } ?>
      </optgroup>
        </select>