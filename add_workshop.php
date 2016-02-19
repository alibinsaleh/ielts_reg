<?php 

	require 'models/db_connect.php';

	//$data = json_decode($_POST, true);
	
	$workshop_name_ar = $_POST['workshopName_ar'];
	$workshop_name_en = $_POST['workshopName_en'];
	$workshop_note = $_POST['note'];
	if (empty($_POST['active'])) {
		$workshop_active = 0;
	} else {
		$workshop_active = 1;
	}
	
	$created_at = Date('Y-m-d');
	$updated_at = Date('Y-m-d');

	$sql = "INSERT INTO  ielts_workshops (workshop_name_en, workshop_name_ar, note, active, created_at, updated_at) VALUES ('$workshop_name_en', '$workshop_name_ar', '$workshop_note', $workshop_active, '$created_at', '$updated_at')";
	

	try {
		$db->query('SET NAMES UTF8');
		$db->query($sql);
		echo $sql;
	} catch (PDOException $e) {
		echo 'Sorry, Could not Add Workshop!!!';
	}

	



 ?>