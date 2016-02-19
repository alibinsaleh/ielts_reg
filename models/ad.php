<?php 

	require_once 'models/database.php';


	/**
	* 
	*/
	class Ad 
	{
		

		// private $id;
		private $title;
		private $active;
		private $height;
		private $width;
		private $file_name;
		private $display_from;
		private $ad_order;
		private $message;
		// private $uploaded_at;
		// private $updated_at;
		
		function __construct() {}

		function newAd($title, $active, $height, $width, $file_name, $display_from, $ad_order)
		{
			$this->title = $title;
			$this->active = $active;
			$this->height = $height;
			$this->width = $width;
			$this->file_name = $file_name;
			$this->display_from = $display_from;
			$this->ad_order = $ad_order;
		}

		function save(){
			$db = Database::getDB();



			$sql =  "INSERT INTO ielts_ads (title, active, height, width, file_name, display_from, ad_order, uploaded_at, updated_at) VALUES ("; 
			$sql .= "'" . $this->title . "', ";
			$sql .= $this->active . ", ";
			$sql .= $this->height . ", ";
			$sql .= $this->width . ", ";
			$sql .= "'" . $this->file_name . "', ";
			$sql .= "'" . $this->display_from . "', ";
			$sql .=  $this->ad_order . ", ";
			$sql .= "'" . date('Y-m-d') . "', ";
			$sql .= "'" . date('Y-m-d') . "')";



			$result = $db->query($sql);


			// echo $sql;

		}

		function update($id){
			$db = Database::getDB();

			$sql  =  "UPDATE ielts_ads SET title='" . $this->title . "', ";
			$sql .=  "active=" . $this->active . ", "; 
			$sql .=  "height=" . $this->height . ", "; 
			$sql .=  "width=" . $this->width . ", "; 
			$sql .=  "file_name='" . $this->file_name . "', "; 
			$sql .=  "display_from='" . $this->display_from . "', "; 
			$sql .=  "ad_order=" . $this->ad_order . ", "; 
			$sql .=  "uploaded_at='" . date('Y-m-d') . "', "; 
			$sql .=  "updated_at='" . date('Y-m-d') . "' ";
			$sql .=  "WHERE id=$id";

			

			$result = $db->query($sql);


			// echo $sql;

		}

		function update_info($id){
			$db = Database::getDB();

			$sql  =  "UPDATE ielts_ads SET title='" . $this->title . "', ";
			$sql .=  "active=" . $this->active . ", "; 
			$sql .=  "height=" . $this->height . ", "; 
			$sql .=  "width=" . $this->width . ", "; 
			// $sql .=  "file_name='" . $this->file_name . "', "; 
			$sql .=  "display_from='" . $this->display_from . "', "; 
			$sql .=  "ad_order=" . $this->ad_order . ", "; 
			$sql .=  "uploaded_at='" . date('Y-m-d') . "', "; 
			$sql .=  "updated_at='" . date('Y-m-d') . "' ";
			$sql .=  "WHERE id=$id";

			

			$result = $db->query($sql);


			// echo $sql;

		}


		function listAds() {
			$db = Database::getDB();

			$sql = "SELECT * FROM ielts_ads";
			$result = $db->query($sql);

			$ads = $result->fetchAll(PDO::FETCH_OBJ);

			return $ads;
		}

		function listActiveAds() {
			$db = Database::getDB();

			$sql = "SELECT * FROM ielts_ads WHERE active=1 ORDER BY ad_order ASC";
			$result = $db->query($sql);

			$ads = $result->fetchAll(PDO::FETCH_OBJ);

			return $ads;
		}
	}


 ?>