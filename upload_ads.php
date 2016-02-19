<?php 

	session_start();

    require 'models/db_functions.php';
    require_once 'models/ad.php';

    if (!isset($_SESSION['admin'])) {
        header('Location: login.php');
    } 
	
	$myAd = new Ad();
	$ads = $myAd->listAds();

	// if (isset($_POST['submitted'])){
		// echo '<pre>';
		// print_r($_FILES['file_upload']);
		// echo '</pre>';

		

	// 	$upload_errors = array(

	// 		UPLOAD_ERR_OK			=> 'There is no error.',
	// 		UPLOAD_ERR_INI_SIZE			=> 'The uploaded file exceeds the upload_max_filesize directive.',
	// 		UPLOAD_ERR_FORM_SIZE	=> 'The uploaded file exceeds the MAX_FILE_SIZE directive.',
	// 		UPLOAD_ERR_PARTIAL		=> 'The uploaded file was only partially uploaded.',
	// 		UPLOAD_ERR_NO_FILE		=> 'No file was uploaded.',
	// 		UPLOAD_ERR_NO_TMP_DIR	=> 'Missing a temporary folder.',
	// 		UPLOAD_ERR_CANT_WRITE	=> 'Failed to write file to disk.',
	// 		UPLOAD_ERR_EXTENSION	=> 'A PHP extension stopped the file upload.'

	// 	);

		
		

	// 	$temp_name = $_FILES['file_upload']['tmp_name'];
	// 	$file_name = $_FILES['file_upload']['name'];
	// 	$directory = getcwd() . '/uploads/ads';

		
		

	// 	if (move_uploaded_file($temp_name, $directory . DIRECTORY_SEPARATOR . $file_name)) {
	// 		$message = 'File uploaded successfully!';
	// 		$myAd->newAd('testing', 1, 200, 500, $file_name, date('Y-m-d'));
	// 		$myAd->save();
	// 	} else {
	// 		$error = $_FILES['file_upload']['error'];
	// 		$message = $upload_errors[$error];
	// 	}

	// }



	
	include 'admin_header.php'; 



 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	
 	<title>Document</title>
 	<meta http-equiv="Content-Type" content="Type=text/html; charset=utf-8">
 	<style>
 		img	 {
 			width: 35px;
 			height: 35px;
 		}
 	</style>
    
 </head>
 <body>

 	<!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    
                    <div class="row">

                        


                        <div class="col-sm-8 col-sm-offset-2 form-box content-head">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Ads Control Panel / لوحة التحكم في الاعلانات</h3>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-cog"></i>
                                </div>
                            </div>

					 	<table class="table table-condensed">
					 		<tr>
					 			<th>Ad Title</th>
					 			<th>Status</th>
					 			<th>Height</th>
					 			<th>Width</th>
					 			<th>Thumbnail</th>
					 		</tr>
					 		<?php foreach ($ads as $ad): ?>
					 		<tr>
					 			<td><?php echo $ad->title; ?></td>
					 			<td><?php echo $ad->active; ?></td>
					 			<td><?php echo $ad->height; ?></td>
					 			<td><?php echo $ad->width; ?></td>
					 			<td><img src="<?php echo 'uploads/ads/' . $ad->file_name; ?>" alt="PIC"></td>
					 		</tr>
					 		<?php endforeach; ?>
					 	</table>

					 	<form class="form-horizontal" enctype="multipart/form-data" role="form" id="adForm" action="add_ad.php" method="POST">

                                <div class="form-group">
                                    <label for="theFile" class="white-text">Advertisment /  الاعلان :</label>
                                    <input type="file" class="form-control" name="theFile" id="theFile">
                                </div>

                                <div class="form-group">
                                    <label for="adTitle" class="white-text">Ad. Title/ عنوان الاعلان :</label>
                                    <input type="text" class="form-control" name="adTitle" id="adTitle">
                                </div>

                                <div class="form-group">
                                    <label for="active" class="white-text">Active / فعال  :</label>
                                    <input type="checkbox"  name="active" id="active"  value="1">
                                </div>

                                <div class="form-group">
                                    <label for="adHeight" class="white-text">Ad. Height / طول الاعلان :</label>
                                    <input type="text" class="form-control" name="adHeight" id="adHeight">
                                </div>

                                <div class="form-group">
                                    <label for="adWidth" class="white-text">Ad. Width / عرض الاعلان :</label>
                                    <input type="text" class="form-control" name="adWidth" id="adWidth">
                                </div>

                                <div class="form-group">
                                    <label for="displayFrom" class="white-text">Display From / يعرض من تاريخ :</label>
                                    <input type="text" class="form-control" name="displayFrom" id="displayFrom">
                                </div>

                                

                                

                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" id="ad_post" value="Save Advertisment">
                                </div>

                            </form>

					</div>
				</div>
			</div>
		</div>

 	<?php include 'admin_footer.php'; ?>


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="assets/js/jquery.datetimepicker.js"></script>
        <script src="assets/js/main.js"></script>
 </body>
 </html>