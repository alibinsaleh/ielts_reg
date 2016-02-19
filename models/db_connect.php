<?php

	$dsn = 'mysql:host=localhost;dbname=academy_intlaca';
	$username = 'academy_intlaca';
	$password = 'intlamazon2010';
	
	// $dsn = 'mysql:host=localhost;dbname=academy_intlaca';
	// $username = 'homestead';
	// $password = 'secret';

	// $dsn = 'mysql:host=localhost;dbname=ielts';
	// $username = 'homestead';
	// $password = 'secret';

	// $dsn = 'mysql:host=localhost;dbname=academy_intlaca';
	// $username = 'root';
	// $password = 'mysql';


	
	$db = new PDO($dsn, $username, $password);  // create PDO object
	// just to make things a lot easier for arabic characters.
	//$db->query('SET NAMES UTF8');
	
	




?>