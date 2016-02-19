<?php 

	require 'models/db_connect.php';

	//$data = json_decode($_POST, true);
	$workshop_id = $_POST['workshop_id'];
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

	$sql = "UPDATE  ielts_workshops SET workshop_name_en='$workshop_name_en', workshop_name_ar='$workshop_name_ar', note='$workshop_note', active=$workshop_active, created_at='$created_at', updated_at='$updated_at' WHERE id=$workshop_id";
	

	try {
		$db->query('SET NAMES UTF8');
		$db->query($sql);
		echo $sql;
	} catch (PDOException $e) {
		echo 'Sorry, Could not Add Workshop!!!';
	}

	



 ?>