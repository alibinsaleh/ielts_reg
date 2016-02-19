<?php 

	require 'models/database.php';
	require 'models/ad.php';

	//$db = Database::getDB();



	$upload_errors = array(

		UPLOAD_ERR_OK			=> 'There is no error.',
		UPLOAD_ERR_INI_SIZE		=> 'The uploaded file exceeds the upload_max_filesize directive.',
		UPLOAD_ERR_FORM_SIZE	=> 'The uploaded file exceeds the MAX_FILE_SIZE directive.',
		UPLOAD_ERR_PARTIAL		=> 'The uploaded file was only partially uploaded.',
		UPLOAD_ERR_NO_FILE		=> 'No file was uploaded.',
		UPLOAD_ERR_NO_TMP_DIR	=> 'Missing a temporary folder.',
		UPLOAD_ERR_CANT_WRITE	=> 'Failed to write file to disk.',
		UPLOAD_ERR_EXTENSION	=> 'A PHP extension stopped the file upload.'

	);

	//$data = json_decode($_POST, true);
	$id = $_POST['adID'];

	$currentFileName = $_FILES['theFile']['name'];

	$title = $_POST['adTitle'];

	if (empty($_POST['active'])) {
		$active = 0;
	} else {
		$active = 1;
	}

	if (empty($_POST['adHeight'])) {
		$height = 100;
	} else {
		$height = $_POST['adHeight'];
	}
	if (empty($_POST['adWidth'])) {
		$width = 100;
	} else {
		$width = $_POST['adWidth'];
	}

	if (empty($_POST['adOrder'])) {
		$ad_order = 100;
	} else {
		$ad_order = $_POST['adOrder'];
	}
	
	
	$display_from = Date('Y-m-d');
	$uploaded_at = Date('Y-m-d');
	$updated_at = Date('Y-m-d');

	$temp_name = $_FILES['theFile']['tmp_name'];
	$file_name = $_FILES['theFile']['name'];
	$directory = getcwd() . '/assets/img/ads';

	var_dump($_POST);

	// $sql = "INSERT INTO  ielts_ads (title, active, height, width, file_name, display_from, uploaded_at, updated_at) VALUES ('$title', $active, $height, $width, '$file_name','$display_from', '$uploaded_at', '$updated_at')";
	if ( empty($currentFileName) ){
		$myAd = new Ad();
		$myAd->newAd($title, $active, $height, $width, $file_name, $display_from, $ad_order);
		$myAd->update_info($id);
	} else {
		if (move_uploaded_file($temp_name, $directory . DIRECTORY_SEPARATOR . $file_name)) {
			$message = 'File uploaded successfully!';
			$myAd = new Ad();
			$myAd->newAd($title, $active, $height, $width, $file_name, $display_from, $ad_order);
			$myAd->update($id);
		} else {
			$error = $_FILES['theFile']['error'];
			$message = $upload_errors[$error];
		}
	}
	

	




 ?>




		
		

		

		
		

		