<?php
session_start();
require_once('../_config/config.php'); 
require_once('../_class/mysql.php');
require_once('../_class/Class.Add.php');
require_once('../_class/Class.Service.php');

  
	$ADMIN_USERNAME = $_POST['ADMIN_USERNAME'];//assigned posted value to variable
	$ADMIN_PSWRD = $_POST['ADMIN_PSWRD'];
	//$EN_ADMIN_PSWRD =md5($ADMIN_PSWRD); //Encryption for Password
  
			$Get_result = new Service;
			
			
		    $result= $Get_result->Check_Username($ADMIN_USERNAME);
		
		//echo "asd";
		 if($result == NULL)
		 {
					   
		  $_SESSION['isLogged_client'] = false; //Not set User Name
		  
			echo "0";
          }else 
		      {
				      
				  if(strcmp($result['ADMIN_PASSWORD'],$ADMIN_PSWRD)== 0) //chk whether entered password is matched with db password
				  { 
					  
					 $resultStatus= $Get_result->Check_Username_Status($ADMIN_USERNAME);
					  
					  if($resultStatus == 1)// check user is not disabled.
					  {
	                   //echo $result['ADMIN_TYPE'];
					    //assigned variable to session for user Details
						$_SESSION['ADMIN_ID'] = $result['ADMIN_ID'];
						$_SESSION['ADMIN_TYPE'] = $result['ADMIN_TYPE'];
						$_SESSION['sessid'] = session_id();
						$_SESSION['ADMIN_NAME'] = $result['ADMIN_NAME'];  
						//$_SESSION['id'] = $result['CUS_PSWRD'];
						//$_SESSION['isLogged_client'] = true;
						//header("Location:www.php.com");
						//header('location:home.php');
						if($result['ADMIN_TYPE'] == 'Admin')// check user is.
					  {
						echo "admin";
						
					  }else if($result['ADMIN_TYPE'] == 'Manager')
					  {
						 echo "mgr"; 
					  }else if($result['ADMIN_TYPE'] == 'Clerk')
					  {
						 echo "clk"; 
					  }else if($result['ADMIN_TYPE'] == 'Supplier')
					  {
						 echo "sup"; 
					  }
						
					  }else
					  {
						  echo "3"; // user is disabled 
					  }
					      
	  
				 }else
				 {
					  echo "2";// not set password
				 }
		     }
							
						
			

?>