<?php
	// Email address verification
	function isEmail($email) {
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}

	require 'models/db_functions.php';

	if($_POST) {

		// collect data

		$data = array(
			'name' 				=> $_POST['name'],
			'dob'				=> $_POST['dob'],
			'mobile'			=> $_POST['mobile'],
			'email'				=> $_POST['email'],
			'qualification'		=> $_POST['qualification'],
			'work'				=> $_POST['work'],
			'masterclass'		=> $_POST['masterclass'],
			// 'masterclass_place'	=> $_POST['masterclass_place'],
			// 'masterclass_date'	=> $_POST['masterclass_date'],
			'englishlevel'		=> $_POST['englishlevel'],
			'workshops'			=> $_POST['workshops'],
			'note'				=> $_POST['note'],
			'timestamps'		=> date("d-m-Y H:i:s")
		);


		// Enter the email where you want to receive the message
	    $emailTo = 'info@intlaca.com';

	    $clientEmail = addslashes(trim($_POST['email']));
	    $subject = addslashes(trim($_POST['name']));
	    // $message = addslashes(trim($_POST['message']));

	    $message = '<html><head><meta charset="utf-8"></head><body>';
	    $message .= '<img src="http://intlaca.com/ielts_reg/assets/img/intlacademic2.png" alt="Intlacademic" />'; 
	    $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';

	    $message .= '<tr>';
		    $message .= '<td>';
		    $message .= '<strong>' .'Name' . '</strong>';
		    $message .= '</td>';
		    $message .= '<td>';
		    $message .= $_POST['name'];
		    $message .= '</td>';
		$message .= '</tr>';

		$message .= '<tr>';
		    $message .= '<td>';
		    $message .= '<strong>' .'Date Of Birth' . '</strong>';
		    $message .= '</td>';
		    $message .= '<td>';
		    $message .= date('d-m-Y', strtotime($_POST['dob']));
		    $message .= '</td>';
		$message .= '</tr>';

		$message .= '<tr>';
		    $message .= '<td>';
		    $message .= '<strong>' .'Mobile Number' . '</strong>';
		    $message .= '</td>';
		    $message .= '<td>';
		    $message .= $_POST['mobile'];
		    $message .= '</td>';
		$message .= '</tr>';

		$message .= '<tr>';
		    $message .= '<td>';
		    $message .= '<strong>' .'Email' . '</strong>';
		    $message .= '</td>';
		    $message .= '<td>';
		    $message .= $_POST['email'];
		    $message .= '</td>';
		$message .= '</tr>';

		

		$message .= '<tr>';
		    $message .= '<td>';
		    $message .= '<strong>' .'Qualification' . '</strong>';
		    $message .= '</td>';
		    $message .= '<td>';
		    $message .= $_POST['qualification'];
		    $message .= '</td>';
		$message .= '</tr>';

		$message .= '<tr>';
		    $message .= '<td>';
		    $message .= '<strong>' .'Current Job' . '</strong>';
		    $message .= '</td>';
		    $message .= '<td>';
		    $message .= $_POST['work'];
		    $message .= '</td>';
		$message .= '</tr>';

		$message .= '<tr>';
		    $message .= '<td>';
		    $message .= '<strong>' .'Master Class' . '</strong>';
		    $message .= '</td>';
		    $message .= '<td>';
		    $message .= $_POST['masterclass'];
		    $message .= '</td>';
		$message .= '</tr>';

		// if ($_POST['masterclass'] == 'Yes / نعم') {

		// 	$message .= '<tr>';
		// 	    $message .= '<td>';
		// 	    $message .= '<strong>' .'Master Class Place' . '</strong>';
		// 	    $message .= '</td>';
		// 	    $message .= '<td>';
		// 	    $message .= $_POST['masterclass_place'];
		// 	    $message .= '</td>';
		// 	$message .= '</tr>';

		// 	$message .= '<tr>';
		// 	    $message .= '<td>';
		// 	    $message .= '<strong>' .'Master Class Date' . '</strong>';
		// 	    $message .= '</td>';
		// 	    $message .= '<td>';
		// 	    $message .= date('d-m-Y', strtotime($_POST['masterclass_date']));
		// 	    $message .= '</td>';
		// 	$message .= '</tr>';
		// }

		$message .= '<tr>';
		    $message .= '<td>';
		    $message .= '<strong>' .'English Level' . '</strong>';
		    $message .= '</td>';
		    $message .= '<td>';
		    $message .= $_POST['englishlevel'];
		    $message .= '</td>';
		$message .= '</tr>';

		$message .= '<tr>';
		    $message .= '<td>';
		    $message .= '<strong>' .'Note' . '</strong>';
		    $message .= '</td>';
		    $message .= '<td>';
		    $message .= $_POST['note'];
		    $message .= '</td>';
		$message .= '</tr>';

	    $message .= '</table>';

	    $message .= '</body></html>';


	    $array = array('emailMessage' => '', 'subjectMessage' => '', 'messageMessage' => '');

	    if(!isEmail($clientEmail)) {
	        $array['emailMessage'] = 'Invalid email!';
	    }
	    if($subject == '') {
	        $array['subjectMessage'] = 'Empty subject!';
	    }
	    if($message == '') {
	        $array['messageMessage'] = 'Empty message!';
	    }
	    if(isEmail($clientEmail) && $subject != '' && $message != '') {
	    	// save data to database
	    	if ( save($data) ) {
	    		

		        // Send email
		        // Always set content-type when sending HTML email
		        
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= "From: " . $clientEmail . " <" . $clientEmail . ">" . "\r\n" . "Reply-To: " . $clientEmail;
				mail($emailTo, $subject . " - Master Class", $message, $headers);
				if ( count_subscribers(0) > get_max_subscribers() ) {
					header("Location: sorry_max.php");
				} else {
					header("Location: thankyou.php");
				}
				
				exit;
			} else {
				header("Location: duplicate_email.php");
			}
	    }

	    //echo $message . '<br>';
	    //save($data);
		
	}


?>

