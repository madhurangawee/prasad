<?php
$uploaddir = '../sample/booksample/';
$info = pathinfo($_FILES['uploadfile']['name']);
$file = substr(basename($_FILES['uploadfile']['name']),0,-4)."-".time().".".$info['extension'];
if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $uploaddir.$file)) { 
  echo $file; 
} else {
	echo "error";
}
?>