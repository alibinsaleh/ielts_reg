<?php 

	require_once 'models/db_connect.php';
	require_once 'models/db_functions.php';

	$success = archive_subscriber($_GET['id']);

	if ($success) {
		//echo 'Successful!!';
		
	} else {
		echo "Failed!!";
	}
	


 ?>