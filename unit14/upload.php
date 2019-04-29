<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
	if($_FILES['file']['error'] > 0) { echo 'Error during uploading, try again'; }


	$extsAllowed = array( 'jpg', 'jpeg', 'png', 'gif' );


	$extUpload = strtolower( substr( strrchr($_FILES['file']['name'], '.') ,1) ) ;

	if (in_array($extUpload, $extsAllowed) ) {


	$name = "img/{$_FILES['file']['name']}";
	$result = move_uploaded_file($_FILES['file']['tmp_name'], $name);

	if($result){echo "<img src='$name'/>";}

	} else { echo 'File is not valid. Please try again'; }

?>
