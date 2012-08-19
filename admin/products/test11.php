<?php
//session_start();

//require_once '../../dataaccess.php' ;


	
	$file        = $_POST['pic'];	
	$name1        = $_POST['catName'];
	$description = $_POST['des'];
	
	echo $type;
	
	
	 /*if ($type=="s"){
	 $emptymsg  = "Select a category type !";
						$_SESSION['emptymsg']= $emptymsg;
						$inserted="Yes";
						
		}
	 elseif ($name==""){				
	 $emptymsg  = "Type a category name !";
						$_SESSION['emptymsg']= $emptymsg;
						$inserted="Yes";
		}
	 else {
	$sql   = "INSERT INTO tbl_category (cat_typeId, cat_name, cat_description, cat_image) VALUES ('$type', '$name', '$description', '$catImage')";

	 
if (mysql_query($sql)){
						
						$msg  = "Category has been added successfully...";
						$_SESSION['msg']= $msg;
						$inserted="Yes";
						
	}
	else {
				
			$error = "Cannot add Category right now..Try again Later.";
			$_SESSION['error'] = $error;
			
	}
}		
   
    //header('location:addCat.php');
	exit;
	
}*/ 

/*function uploadImage($inputName, $uploadDir)
{
    $image     = $inputName;
    $imagePath = '';
    
    // if a file is given
    if (trim($_FILES['tmp_name']) != '') {
        // get the image extension
        $ext = substr(strrchr($_FILES['name'], "."), 1);

        // generate a random new file name to avoid name conflict
        $imagePath = md5(rand() * time()) . ".$ext";
        
        // check the image width. if it exceed the maximum
        // width we must resize it
        $size = getimagesize($_FILES['tmp_name']);
        
        if ($size[0] > 2000) {
            $imagePath = createThumbnail($_FILES['tmp_name'], $uploadDir . $imagePath, 2000);
        } else {
            // move the image to category image directory
            // if fail set $imagePath to empty string
            if (!move_uploaded_file($_FILES['tmp_name'], $uploadDir . $imagePath)) {
                $imagePath = '';
            }
        }    
    }

    
    return $imagePath;
}*/
?>