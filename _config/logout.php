<?php
session_start();

	
	//unset all the session variable
	unset($_SESSION['logeduser']);
	unset($_SESSION['isLoggedADMIN']);
	unset($_SESSION['LOGINADMIN_ID']); 
	unset($_SESSION['sessid']);
	unset($_SESSION['admin_email']);
	unset($_SESSION['ip_ADMIN']);

	
	
	
	session_destroy();
	session_start();
	
	 echo "<script language=\"javascript\" type=\"text/javascript\">window.location.replace('../../index.php');</script>";
	
?>