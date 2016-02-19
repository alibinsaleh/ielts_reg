<?php 

	
	class Database {
		// private static $dsn = 'mysql:host=localhost;dbname=academy_intlaca';
		// private static $username = 'homestead';
		// private static $password = 'secret';
		// private static $db;

		private static $dsn = 'mysql:host=localhost;dbname=academy_intlaca';
		private static $username = 'academy_intlaca';
		private static $password = 'intlamazon2010';
		private static $db;

		private function __construct() {}

		public static function getDB() {
			if (!isset(self::$db)) {
				try {
					self::$db = new PDO(self::$dsn,
										self::$username,
										self::$password);

				} catch (PDOEXception $e) {
					$error_message = $e->getMessage();
					include('../errors/database_error.php');
					exit();
				}
			}
			return self::$db;
		}
	}


 ?>