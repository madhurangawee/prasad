<?php
 // Site Root Path
define('HTTP_PATH', 'http://prasadbookshop.0fees.net/');
define('DOC_ROOT', '/home/vol2/0fees.net/fees0_8686586/');
  
 
	
	define('DB_HOST', 'sql100.0fees.net');
    define('DB_USER', 'fees0_8686586');
    define('DB_PASSWORD', 'snoopdogg');
    define('DB_DATABASE', 'fees0_8686586_bookstore');
	
/*define('HTTP_PATH', 'http://192.168.1.2/BookStore/');
define('DOC_ROOT', 'D:/xampp/htdocs/BookStore/');
  
 
	
	define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'bookstore');*/
	
	
	$conn = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("can not connect server..");
	//create connecton to db
	$db = mysql_select_db(DB_DATABASE,$conn) or die("can not connect db..");

    
	$_SESSION['sessid'] = session_id();


?>