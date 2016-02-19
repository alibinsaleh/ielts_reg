<?php 
	
	require 'models/db_connect.php';

	$id = $_POST['workshop_id'];

	$sql = "DELETE FROM ielts_workshops WHERE id=$id";
	try {
		$db->query($sql);
		echo $sql;
	} catch(PDOException $e) {
		echo 'Sorry, Could not Delete Workshop!!!';
	}

 ?>