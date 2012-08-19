<?php 

session_start () ; 


    unset($_SESSION['logeduser']);
	unset($_SESSION['ID']);
	unset($_SESSION['sessid']);

	
session_destroy(); 

echo "<script language=\"javascript\" type=\"text/javascript\">window.location.replace('index.php');</script>";
?>