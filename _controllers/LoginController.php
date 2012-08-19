<?php
//start session
session_start();
require_once('../_config/config.php');
include("../_class/Class.Service.php");
include("../_class/Class.Add.php");
include("../_class/Class.Edit.php");
require_once('../_class/mysql.php');

  
	$username = MySQL :: escape($_POST['email']);//assigned posted value to variable
	$password = $_POST['password'];
	$password =md5($password); //Encryption for Password
  
			$Get_result = new Service;
			$add = new Add;
			$edit = new Edit;
			
		    $result= $Get_result->Check_Username_Password($username);
		
		
				   if($result ==NULL){
					   
		           $_SESSION['isLogged_client'] = false; //Not set User Name
				   echo "0";
                   }
				   
				   
				    else if(strcmp($result['CUS_PASWRD'],$password)== 0) //chk whether entered password is matched with db password
					  { 
					  
	 
					    //assigned variable to session for user Details
						$_SESSION['CUS_ID'] = $result['CUS_ID'];
						$_SESSION['CUS_NAME'] = $result['CUS_NAME'];
						$_SESSION['sessid'] = session_id();
						$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];  // assigned Session for Server IP
						$_SESSION['id'] = $result['CUS_PSWRD'];
						$_SESSION['isLogged_client'] = true;
						$count = $Get_result->chkCountUser();
						
						if(count == 0)
						{
							$add->addUserCount();
						}else{
							$getCount = $Get_result->getUserCount();
							$newCount = $getCount['COUNT'] + 1;
							$edit->updateUserCount($newCount);
							
							}
						
						
						echo "1";
						
					      
					
						  
					}
					else{
					     echo "2";// not set password
						 }

?>