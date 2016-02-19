<?php 

	require 'models/db_connect.php';

	//$data = json_decode($_POST, true);
	
	$email = $_POST['socialEmail'];
	$instagram = $_POST['socialInstagram'];
	$facebook = $_POST['socialFacebook'];
	$twitter = $_POST['socialTwitter'];
	$skype = $_POST['socialSkype'];
	$phone = $_POST['phone'];
	$mobile = $_POST['mobile'];
	$updated_at = Date('Y-m-d');

	$sql = "UPDATE  ielts_socials SET email='$email', instagram='$instagram', facebook='$facebook', twitter='$twitter', skype='$skype', phone='$phone', mobile='$mobile', updated_at='$updated_at'";
	

	try {
		$db->query($sql);
		echo $sql;
	} catch (PDOException $e) {
		echo 'Sorry, Could not update data!!!';
	}

	



 ?>