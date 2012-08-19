<?php 
session_start();
require_once('config.php'); 
if(!isset($_SESSION['CUS_ID'])){
	 echo "<script language=\"javascript\" type=\"text/javascript\">window.location.replace('".HTTP_PATH."register.php');</script>";
	exit;
}
?>