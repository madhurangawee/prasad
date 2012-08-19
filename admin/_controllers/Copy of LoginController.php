<?php
//start session
session_start();
require_once('../_config/config.php'); 
require_once('../_class/mysql.php');
require_once('../_class/Class.Add.php');
require_once('../_class/Class.Service.php');

  
	$ADMIN_USERNAME = $_POST['ADMIN_USERNAME'];//assigned posted value to variable
	$ADMIN_PSWRD = $_POST['ADMIN_PSWRD'];
	//$EN_ADMIN_PSWRD =md5($ADMIN_PSWRD); //Encryption for Password
  
			$Get_result = new Service;
			
			$resultStatus= $Get_result->Check_Username_Status($ADMIN_USERNAME);
			
			if($resultStatus == 1){
		    $result= $Get_result->Check_Username($ADMIN_USERNAME);
		
		//echo "asd";
				   if($result == NULL){
					   
		           $_SESSION['isLogged_client'] = false; //Not set User Name
				   echo "0";
                   }
				   
				   
				    else if(strcmp($result['ADMIN_PASSWORD'],$ADMIN_PSWRD)== 0) //chk whether entered password is matched with db password
					  { 
					  
	                   
					    //assigned variable to session for user Details
						//$_SESSION['CUS_ID'] = $result['SUP_ID'];
						//$_SESSION['CUS_NAME'] = $result['SUP_NAME'];
						//$_SESSION['sessid'] = session_id();
						//$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];  // assigned Session for Server IP
						//$_SESSION['id'] = $result['CUS_PSWRD'];
						//$_SESSION['isLogged_client'] = true;
						//header('Location: www.php.com');
						echo "1";
						
					      
					
						  
					}
					else{
					     echo "2";// not set password
						 }
			}else{
				echo "3";
				}

?>