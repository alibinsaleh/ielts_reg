<?php
	
	require 'models/db_functions.php';

	if($_POST) {

		// collect data

		$data = array(
			'workshop_name_ar'				=> $_POST['workshop_name_ar'],
			'workshop_name_en'				=> $_POST['workshop_name_en'],
			'max_subscribers'				=> $_POST['max_subscribers'],
			'next_workshop_date' 			=> $_POST['next_workshop_date'],
			'next_workshop_time'			=> $_POST['next_workshop_time'],
			'am_pm'							=> $_POST['am_pm'],
			'workshop_location_ar'			=> $_POST['workshop_location_ar'],
			'workshop_location_en'			=> $_POST['workshop_location_en'],
			'updated_at'					=> date("Y-m-d h:i:s"),
			'updated_by'					=> $_POST['updated_by']
		);

	}

		// save data to database, table ielts_settings
		if (save_settings($data)) {
			header("Location:settings.php");
		} else {
			echo "Saving Failure!!!";
		}
		
		
		



?>