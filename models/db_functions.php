<?php 


	require 'db_connect.php';

	function save($data) {
		global $db;



		if ( check_subscriber($data['email']) ){

			// IF you want to add the place and date of the previous master class uncomment the following two lines then comment out the next two uncommented ones
			// $sql  = "INSERT INTO ielts_subscribers "; 
			// $sql .= "(name, email, dob, mobile, qualification, work, masterclass, masterclass_place, masterclass_date, englishlevel, note) ";
			$sql  = "INSERT INTO ielts_subscribers "; 
			$sql .= "(name, email, dob, mobile, qualification, work, masterclass, englishlevel, note) ";
			$sql .= "VALUES ("
					."'{$data['name']}'" . ", "
					."'{$data['email']}'" . ", "
					//."'{date('d-m-Y',strtotime($data['dob']))}'" . ", "
					."'{$data['dob']}'" . ", "
					."'{$data['mobile']}'" . ", "
					."'{$data['qualification']}'" . ", "
					."'{$data['work']}'" . ", "
					."'{$data['masterclass']}'" . ", "
					//."'{$data['masterclass_place']}'" . ", "
					//."'{date('d-m-Y', strtotime($data['masterclass_date']))}'" . ", "
					//."'{$data['masterclass_date']}'" . ", "
					."'{$data['englishlevel']}'" . ", "
					."'{$data['note']}'" . ")";

			
			// if ($db->query($sql) === TRUE) {
			//     echo "New record created successfully";
			// } else {
			//     echo "Error: " . $sql . "<br>";
			// }

			// echo $sql;

			try {
				$db->query($sql);
				// echo "New record created successfully";

				// get the id of the last inserted record
				$subscriber_id = $db->lastInsertId();
				// save subscriber interests
	    		save_interests($subscriber_id, $data['workshops']);
				return true;
			} catch(PDOException $e) {
				// echo "Error: " . $sql . "<br>" . $e->getMessage();
				return false;
			}

		} else { // end check_subscriber()
			// echo 'Subscriber with this email is already registered!!';
			return false;
		}

		
	}

	function save_interests($subscriber_id, $interests) {
		global $db;

		if (!empty($interests)) {
			foreach ($interests as $interest) {
				$sql  = "INSERT INTO ielts_subscribers_interests ";
				$sql .= "(subscriber_id, workshop_id, timestamp) ";
				$sql .= "VALUES (";
				$sql .= "{$subscriber_id}, ";
				$sql .= "{$interest}, ";
				$sql .= "'" . date('Y-m-d') ."')";
				
				// echo $sql . '<br>';

				try {
					$db->query($sql);
					
				} catch (PDOException $e) {
					return false;
				}

			}
		}

		
	}

	function save_settings($data) {
		global $db;

		

		$sql = "UPDATE ielts_settings SET " . 
				"workshop_name_ar=" . "'{$data['workshop_name_ar']}'" .
				",workshop_name_en=" . "'{$data['workshop_name_en']}'" .
				",max_subscribers=" . "{$data['max_subscribers']}" .
				",next_workshop_date=" . "'{$data['next_workshop_date']}'" .
				",next_workshop_time=" . "'{$data['next_workshop_time']}'" .
				",am_pm=" . "'{$data['am_pm']}'" .
				",workshop_location_ar=" . "'{$data['workshop_location_ar']}'" .
				",workshop_location_en=" . "'{$data['workshop_location_en']}'" .
				",updated_at=" . "'{$data['updated_at']}'" . 
				",updated_by=" . "'{$data['updated_by']}'" . 
				" WHERE id=1";
		
		try {
			$db->query($sql);
			//echo "New record created successfully";
			//echo $sql;
			return true;
		} catch(PDOException $e) {
			return false;
		}

		

		
	}


	function check_subscriber($email) {
		global $db;

		$sql = "SELECT * FROM ielts_subscribers WHERE email = '{$email}'";

		$result = $db->query($sql);
		
		$count = $result->rowCount();

		if ($count == 0) {
			return true;
		} else {
			return false;
		}
	}

	function count_subscribers($category){
		global $db;

		$sql = "SELECT COUNT(*) FROM ielts_subscribers WHERE archived=$category";

		$result = $db->prepare($sql);
		$result->execute();
		$count = $result->fetch();
		
		//var_dump($sql) ;
		return $count[0];
	}

	function get_max_subscribers(){
		global $db;

		$sql = "SELECT * FROM ielts_settings";
		$result = $db->query($sql);

		$settings = $result->fetch(PDO::FETCH_OBJ);

		return $settings->max_subscribers;
	}

	function list_subscribers($category){
		global $db;

		$sql = "SELECT * FROM ielts_subscribers WHERE archived=$category";
		$result = $db->query($sql);

		return $result;
	}

	function archive_subscriber($id) {
		global $db;

		$sql = "UPDATE ielts_subscribers SET archived=1 WHERE id=$id";
		$result = $db->query($sql);

		return $result;
	}

	function unarchive_subscriber($id) {
		global $db;

		$sql = "UPDATE ielts_subscribers SET archived=0 WHERE id=$id";
		$result = $db->query($sql);

		return $result;
	}

	function get_settings() {
		global $db;

		

		$sql = "SELECT * FROM ielts_settings";
		$result = $db->query($sql);

		$settings = $result->fetch(PDO::FETCH_OBJ);

		return $settings;
	}

	function get_workshops() {
		global $db;

		$db->query('SET NAMES UTF8');
		
		$sql = "SELECT * FROM ielts_workshops";
		$result = $db->query($sql);

		$workshops = $result->fetchAll(PDO::FETCH_OBJ);

		return $workshops;
	}

	function get_socials() {
		global $db;

		$sql = "SELECT * FROM ielts_socials";
		$result = $db->query($sql);

		$socials = $result->fetch(PDO::FETCH_OBJ);

		return $socials;
	}

 ?>